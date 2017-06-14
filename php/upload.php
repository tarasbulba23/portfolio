<?php
if(!isset($_POST) || !isset($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) !== 'xmlhttprequest'){
	exit;
}
if(isset($_POST) && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
	error_reporting(E_ALL);
	ini_set('display_errors',0);


	define( "FROM_SQL_ALL", true );
	require_once(dirname(__FILE__) . '/langSQL.class.php');
	$langsql = new langSql();
	require_once(dirname(__FILE__) . '/protected/bootstrap.php');

	if (empty($_POST['PHPSESSID']) || empty($_POST['PHPSESSIP'])) {
		stopAndResponseMessage('error', $langsql->getIni("CONTACT_SEND_ERROR_AJAX", true));
		exit;
    }

	if ( ($_COOKIE['PHPSESSID'] === $_POST['PHPSESSID']) && ($langsql->getIPAddress() === $langsql->getCryptDecrypt(false, $_POST['PHPSESSIP'])) ) {

		if(isset($_POST['file_del']) && ($_POST['file_del'] === "true" || $_POST['file_del'] === true)){
			if(unlink('../files/TZ/'.$_POST['file_name'])){
				sendResponse('upload', ['txt' => $langsql->getIni("FILE_LOAD_ERROR_FILE_DEL_SUCCESS", true)]);
				exit;
			}else{
				stopAndResponseMessage('error', $langsql->getIni("FILE_LOAD_ERROR_FILE_DEL_ERROR", true));
				exit;
			}
		}

		if (!IS_POST() || !$_FILES) {
			stopAndResponseMessage('error', $langsql->getIni("FILE_LOAD_ERROR_ONLY_POST", true));
		}

		$files = convertFileInformation($_FILES);

		if (!isset($files['file'])) {
			stopAndResponseMessage('error', $langsql->getIni("FILE_LOAD_ERROR_NO_SELECT_FILE", true));
		}

		$file = $files['file'];

		if ($file['error'] !== UPLOAD_ERR_OK) {
			stopAndResponseMessage('error', uploadCodeToMessage($file['error']));
		}

		$mimeType = guessMimeType($file['tmp_name']);
		if (!$mimeType) {
			stopAndResponseMessage('error', $langsql->getIni("FILE_LOAD_ERROR_UNKNOWN_TYPE_FILE", true));
		}

		$validMimeType = ['text/plain', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/pdf', 'application/x-rar-compressed', 'application/x-rar', 'application/zip'];

		if (!in_array($mimeType, $validMimeType)) {
			stopAndResponseMessage('error', $langsql->getIni("FILE_LOAD_ERROR_WRONG_TYPE_FILE", true));
		}

		$size = filesize($file['tmp_name']);
		if ($size > 16000 * 1024) {
			stopAndResponseMessage('error', $langsql->getIni("FILE_LOAD_ERROR_TO_BIG_SIZE", true));
		}

		$uploadDir = '../files/TZ';
		if (!is_writable($uploadDir)) {
			stopAndResponseMessage('error', $langsql->getIni("FILE_LOAD_ERROR_FOLDER_NO_WRITEBLE", true));
		}

		$filename = $_COOKIE['PHPSESSID'] . '.' . guessFileExtension($mimeType);

		if (!move_uploaded_file($file['tmp_name'], $uploadDir . '/' . $filename)) {
			stopAndResponseMessage('error', $langsql->getIni("FILE_LOAD_ERROR_FILE_NO_MOVE", true));
		}

		sendResponse('upload', ['url' => $filename]);

	/*
		#
		# if used php-fpm
		#   * send response (finish request)
		#   * clear old images (created >= 5 minutes ago)
		#*/
		if (!function_exists('fastcgi_finish_request'))
			exit;

		fastcgi_finish_request();

		//clearOldFiles($uploadDir, '/*.{jpg,png,jpeg}', 5);
	}else {
       stopAndResponseMessage('error', $langsql->getIni("CONTACT_SEND_ERROR_AJAX", true));
		exit;
    }
}else{
	exit;
}

?>