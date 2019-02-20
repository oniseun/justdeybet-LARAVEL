 <!--close modal -->
    <script  type="text/javascript" src="/js/jquery.js"></script>

    <script type="text/javascript" src="/js/formdata.js"></script>
    <script  type="text/javascript" src="/js/custom.js"></script>

        <script src="/js/bootstrap.min.js"></script>
<script src="/js/flatpickr.js"></script>
<script>
$(function(){

    $(".datetime-picker").flatpickr();

    $('body') .css({'margin-top': (($('.navbar-fixed-top').height()) + 1 )+'px'});
    $(window).resize(function()
    {
        $('body') .css({'margin-top': (($('.navbar-fixed-top').height()) + 1 )+'px'});
    });
});

function open_dialog(pageURL, title, w, h)
{
  var left = (screen.width - w) / 2;
  var top = (screen.height - h) / 4;
  var targetWin = window.open(pageURL, title,
    'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' +
     w + ', height=' + h + ', top=' + top + ', left=' + left);
}

</script>
