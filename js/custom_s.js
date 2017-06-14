$(window).ready(function() {
    $('button.list-group-item').on('click', function () {
        $('.list-group-item, .active').removeClass('active');
        var ithem = $(this).addClass('active');
        if($(this).hasClass('filter-all')){
            $(".not-my").each(function() {
                $(this).addClass('hide');
                $(".progress-bar, progress-bar-striped").addClass('active');
                $("#skills").addClass('active');
            });
        }else {
            $(".not-my").each(function() {
                $(this).removeClass('hide');
                $(".progress-bar, progress-bar-striped").addClass('active');
				$("#skills").addClass('active');
            });
        }
    });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
});