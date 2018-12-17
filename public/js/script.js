$(document).ready(function () {
    $("#toogle-opener-for-sidebar").on('click', function (e) {
        e.preventDefault();
        $("body").hasClass('sidebar-none')?
            $('body').removeClass('sidebar-none')
            :
            $('body').addClass('sidebar-none');
    });
})