$('.log').click(function() {
    if ($('.user').val() != '' && $('.pass').val() != '') {
        form.sumit();
    }
});
if (window.matchMedia("(max-width: 768px)").matches) 
    $('body').addClass('responsive');

