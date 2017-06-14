<?php
if( !defined("FROM_SQL_ALL") ) exit(0);
define( "FROM_SQL_DB", true ); require_once(dirname(__FILE__) . '/safemysql.class.php');
error_reporting(E_ALL);
ini_set('display_errors',0);
/**
 *
 */
class langSql {

    //sql connection and get tables
    private $sqlconnect = array('host' => "127.0.0.1", 'user' => "root", 'pass' => "", 'db' => "graphicb_db");
    private $tables = array('en' => "en_article", 'ru' => "ru_article", 'pl' => "pl_article", 'uk' => "uk_article", 'f' => 'frontArticle', 'p' => 'projectWork');
    private $connect;

    private $lang;
    public $data_ini;

    private $from_email = ""; //adress from send
    public $to_email = ""; //send to email

    private $secret = ""; //secret key from google captcha

    private $key = ""; //key for crypt



    public function __construct(){
        $this->connect = new SafeMysql($this->sqlconnect);
        if (isset($_COOKIE['lang']) && !empty($_COOKIE['lang'])) {
            //$allowed = array("pl","uk","en","ru");
            $allowed = array("pl","uk","ru");
            $data = $this->connect->whiteList($_COOKIE['lang'],$allowed);
            if (!empty($data)) {
                $this->lang = $_COOKIE['lang'];
            }else {
                $this->lang = $this->getLangFB();
            }
        }else {
            $this->lang = $this->getLangFB();
            setcookie("lang", $this->lang, time()+3600*24*365, "/", "");
        }
    }

    public function getLang(){
        return $this->lang;
    }

    private function getLangFB(){
        preg_match_all('/([a-z]{1,8}(?:-[a-z]{1,8})?)(?:;q=([0-9.]+))?/', strtolower($_SERVER["HTTP_ACCEPT_LANGUAGE"]),$matches); // Получаем массив $matches с соответствиями
		$langs = array_combine($matches[1], $matches[2]); // Создаём массив с ключами $matches[1] и значениями $matches[2]
		foreach ($langs as $n => $v)
		$langs[$n] = $v ? $v : 1; // Если нет q, то ставим значение 1
		arsort($langs); // Сортируем по убыванию q
		$default_lang = key($langs); // Берём 1-й ключ первого (текущего) элемента (он же максимальный по q)
		if (strpos($default_lang, "ru") !== false) return "ru";
		//elseif (strpos($default_lang, "en") !== false) return "en";
		elseif (strpos($default_lang, "pl") !== false) return "pl";
		elseif (strpos($default_lang, "uk") !== false) return "uk";
        else return "ru";
    }

    public function request_url($how = true) {
        $result = ''; // Пока результат пуст
        $default_port = 80; // Порт по-умолчанию

        // А не в защищенном-ли мы соединении?
        if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on')) {
            // В защищенном! Добавим протокол...
            $result .= 'https://';
            // ...и переназначим значение порта по-умолчанию
            $default_port = 443;
        } else {
            // Обычное соединение, обычный протокол
            $result .= 'http://';
        }
        // Имя сервера, напр. site.com или www.site.com
        $result .= $_SERVER['SERVER_NAME'];

        // А порт у нас по-умолчанию?
        if ($_SERVER['SERVER_PORT'] != $default_port) {
            // Если нет, то добавим порт в URL
            $result .= ':'.$default_port;
        }
        // Последняя часть запроса (путь и GET-параметры).
        if ($how) {
            //якщо true то виводить тільки домен
            return $result;
        } else {
            //return substr($result .= $_SERVER['REQUEST_URI'], 0, -4);
            return $result .= $_SERVER['REQUEST_URI'];
        }
    }

    public function setLang($lang = "en"){
        $this->lang = $lang;
        setcookie("lang", $this->lang, time()+3600*24*365, "/", "");
    }

    public function getIni($one_only = true, $path = false){
        if($path == true){
            $this->data_ini = parse_ini_file("../lang/sys_".$this->lang.".ini");
        }else {
            $this->data_ini = parse_ini_file("lang/sys_".$this->lang.".ini");
        }
        if (is_bool($one_only) && $one_only == true) {
            return $this->data_ini;
        }else {
            settype($one_only, "string");
            return $this->data_ini[$one_only];
        }

    }

    public function getFront($front = true){
        $sqldata = null;
        $where = $this->connect->parse("WHERE `lang` = ?s", $this->lang);
        if ($front === true) {
            $sqldata = $this->connect->getRow("SELECT `hello`, `sub_hello`, `article`, `link_4_pdf` FROM ?n ?p", $this->tables['f'], $where);
        }elseif ($front === false) {
            $sqldata = $this->connect->getRow("SELECT `fullArticleMe`, `fullArticleExpert`, `fullArticleCan`, `fullArticleLang`, `fullArticleHobby` FROM ?n ?p", $this->tables['f'], $where);
        }else {
            return null;
        }
        unset($where);
        return $sqldata;
    }

    public function getAllArc($article = true, $id = 0){
        if ($article === true) {
            $data = $this->connect->getAll("SELECT `articleID`, `articleTitle`, `shortDescription`, `articlePreviewImage` FROM ?n", $this->tables[$this->lang]);
            return $data;
        }elseif ($article === false) {
            $where = $this->connect->parse("WHERE `articleID` = ?i", $id);
            $data = $this->connect->getRow("SELECT `articleID`, `articleTitle`, `articleText`, `articleSoft`, `fullArticle` FROM ?n ?p", $this->tables[$this->lang], $where);
            return $data;
        }else {
            return null;
        }

    }

    public function sendMail($subject_form, $message_form, $file_form = null, $filename = "", $content_type = null) {
        $to = $this->to_email; //Кому
        $from = $this->from_email; //От кого
        $subject = $subject_form; //Тема
        $message = $message_form; //Текст письма
        $boundary = "---__DIVADE__---"; //Разделитель
        /* Заголовки */
        $headers = "From: $from\nReply-To: $from\n";
        $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"";
        $body = "--$boundary\n";
        /* Присоединяем текстовое сообщение */
        $body .= "Content-type: text/html; charset='utf-8'\n";
        $body .= "Content-Transfer-Encoding: quoted-printablenn";
        if ($file_form !== null) {
            $body .= "Content-Disposition: attachment; filename==?utf-8?B?".base64_encode($filename)."?=\n\n";
        }
        $body .= $message."\n";
		//$body .= wordwrap($message, 70, "\r\n");
        if ($file_form !== null) {
            $body .= "--$boundary\n";
            $file = fopen($filename, "r"); //Открываем файл
            $text = fread($file, filesize($filename)); //Считываем весь файл
            fclose($file); //Закрываем файл
            /* Добавляем тип содержимого, кодируем текст файла и добавляем в тело письма */
            if ($content_type !== null) {
                $body .= "Content-Type: ".$content_type."; name==?utf-8?B?".base64_encode($filename)."?=\n";
            }else {
                $body .= "Content-Type: application/octet-stream; name==?utf-8?B?".base64_encode($filename)."?=\n";
            }
            $body .= "Content-Transfer-Encoding: base64\n";
            $body .= "Content-Disposition: attachment; filename==?utf-8?B?".base64_encode($filename)."?=\n\n";
            $body .= chunk_split(base64_encode($text))."\n";
        }
        $body .= "--".$boundary ."--\n";
        $res = mail($to, $subject, $body, $headers); //Отправляем письмо
        return $res;
    }

    function getIPAddress() {
        $reg = '/^([0-9]|[0-9][0-9]|[01][0-9][0-9]|2[0-4][0-9]|25[0-5])(\.([0-9]|[0-9][0-9]|[01][0-9][0-9]|2[0-4][0-9]|25[0-5])){3}$/';
        if (!empty($_SERVER['HTTP_X_REAL_IP']) && preg_match($reg, $_SERVER['HTTP_X_REAL_IP'])) //check ip from share internet
        {
            $ip = $_SERVER['HTTP_X_REAL_IP'];
        }
        elseif(!empty($_SERVER['HTTP_CLIENT_IP']) && preg_match($reg, $_SERVER['HTTP_CLIENT_IP'])) //check ip from share internet
        {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR']) && preg_match($reg, $_SERVER['HTTP_X_FORWARDED_FOR'])) //to check ip is pass from proxy
        {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    public function reCaptcha($recaptcha_code){

        $resp = null;
        $ip = $this->getIPAddress();

        require('php/autoload.php');
        $recaptcha = new \ReCaptcha\ReCaptcha($this->secret);
        $resp = $recaptcha->verify($recaptcha_code, $ip);
        if ($resp->isSuccess()) {
            return true;
        } else {
            return false;
        }
    }

    public function checkData(array $data){
        $gdata = array();
        foreach($data as $key => $value) {
            if ( isset($value) && !empty($value) && (strlen($value) >= 3 ) ) {
                $value = stripslashes($value);
                $value = htmlspecialchars($value);
                $value = trim($value);
                if ($key === "email") {
                    if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $value)) {
                        return false;
                    }
                }
                $gdata[$key] = $value;
            }else {
                return false;
            }
        }
        return $gdata;
    }

    public function getCryptDecrypt($how, $str) {
        //key
        settype($str, "string");

        //crypt
        $mc_d = mcrypt_module_open(MCRYPT_BLOWFISH, '', MCRYPT_MODE_CFB, '');
        if ($how) {
            $iv_size = mcrypt_enc_get_iv_size($mc_d);
            $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
            mcrypt_generic_init($mc_d, $this->key, $iv);
            $crypt_text = mcrypt_generic($mc_d, $str);
            mcrypt_generic_deinit($mc_d);
            mcrypt_module_close($mc_d);
            $crypt_text = base64_encode($iv.$crypt_text);
            if ($crypt_text !== $str) {
                return $crypt_text;
            }
        }

        //decrypt
        elseif($how == false) {
            $str = base64_decode($str);
            //return $str;
            $iv_size = mcrypt_enc_get_iv_size($mc_d);
            //return $iv_size;
            $iv = substr($str, 0, $iv_size);
            //return $iv;
            $crypt_text = substr($str, $iv_size);
            mcrypt_generic_init($mc_d, $this->key, $iv);
            $text = mdecrypt_generic($mc_d, $crypt_text);
            mcrypt_generic_deinit($mc_d);
            mcrypt_module_close($mc_d);

            return $text;
        }
    }

    public function setWorkDB(array $data_array, $mime = false){
        foreach ($data_array as $key => $value) {
            $data_array["project_".$key] = $value;
            unset($data_array[$key]);
        }
        if (is_bool($mime) && $mime === false) {
            $where = $this->connect->parse(" ?u ", $data_array);
            $where = " `project_data` = NOW(), ".$where;
            $query = $this->connect->query("INSERT INTO ?n SET ?p", $this->tables['p'], $where);
            $from = "From Email: ".$data_array['project_email']."\n".$data_array['project_text'];
            $message = $this->sendMail($data_array['project_subject'], $from);
            return ($message && $query) ? true : false;
        }else{
            $where = $this->connect->parse(" ?u ", $data_array);
            $where = " `project_data` = NOW(), ".$where;
            $query = $this->connect->query("INSERT INTO ?n SET ?p", $this->tables['p'], $where);
			$from = "From Email: ".$data_array['project_email']."\n"." Text: ".$data_array['project_text'];
            $message = $this->sendMail($data_array['project_subject'], $from, true, $data_array['project_file_name'], $mime);
            return ($message && $query) ? true : false;
        }
    }

    private function echoData($echo_txt, $success = false){
        if ($success) {
            setcookie("success", $echo_txt, time()+3600, "/");
            return 0;
        }else {
            setcookie("error", $echo_txt, time()+3600, "/");
            return 0;
        }
        return 0;
    }

     public function setWork($data){

        if (empty($data['PHPSESSID']) || empty($data['PHPSESSIP'])) {
            $this->echoData($this->getIni("CONTACT_SEND_ERROR_AJAX"));
            return 0;
        }

        if ( ($_COOKIE['PHPSESSID'] === $data['PHPSESSID']) && ($this->getIPAddress() === $this->getCryptDecrypt(false, $data['PHPSESSIP'])) ) {


            $captcha = $this->reCaptcha($data["g-recaptcha-response"]);
            if ($captcha === false) {
                $this->echoData($this->getIni("CONTACT_SEND_WRONG_CAPTCHA"));
                return 0;
            }

            $dir = "files/TZ/";

            unset($data['file']);
            unset($data['PHPSESSID']);
            unset($data['PHPSESSIP']);
            unset($data['g-recaptcha-response']);
            $check_data = $this->checkData($data);
            if ($check_data !== false) {
                if (!empty($data['file_name']) && file_exists($dir.$data['file_name'])) {
					$name_file = $data['file_name'];
                    $data['file_name'] = $dir.$data['file_name'];
                    try{
                        $mime = mime_content_type($data['file_name']);
                    }catch (Exception $e) {
                        $this->echoData($this->getIni("CONTACT_SEND_ERROR"));
                        return 0;
                    }
					if(copy($data['file_name'], "files/fin/".$name_file)){
						rename("files/fin/".$name_file, "files/fin/".time()."__".$name_file);
						unlink($data['file_name']);
						$data['file_name'] = "files/fin/".time()."__".$name_file;
					}else{
						$this->echoData($this->getIni("CONTACT_SEND_ERROR_AJAX"));
            			return 0;
					}

                    $send = $this->setWorkDB($data, $mime);
                    if ($send) {
                        $this->echoData($this->getIni("CONTACT_SEND_SUCCESS"), true);
                        return 0;
                    }else {
                        $this->echoData($this->getIni("CONTACT_SEND_ERROR"));
                        return 0;
                    }
                }else {
                    $send = $this->setWorkDB($data);
                    if ($send) {
                        $this->echoData($this->getIni("CONTACT_SEND_SUCCESS"), true);
                        return 0;
                    }else {
                        $this->echoData($this->getIni("CONTACT_SEND_ERROR"));
                        return 0;
                    }
                }
            }else {
                $this->echoData($this->getIni("CONTACT_SEND_ERROR_DATA_EMPTY"));
                return 0;
            }

        }else {
            $this->echoData($this->getIni("CONTACT_SEND_ERROR_AJAX"));
            return 0;
        }
    }

}


?>
