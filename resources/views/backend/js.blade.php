<!-- Essential javascripts for application to work-->
<script src="{{asset('public/backend/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('public/backend/js/popper.min.js')}}"></script>
<script src="{{asset('public/backend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/backend/js/main.js')}}"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="{{asset('public/backend/js/plugins/pace.min.js')}}"></script>
<!-- Page specific javascripts-->
<script type="text/javascript" src="{{asset('public/backend/js/plugins/chart.js')}}"></script>
<!-- Plugin used-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
@if (Session::has('message'))
var type = "{{ Session::get('alert-type', 'info') }}"
switch(type){
    case 'info':

        toastr.options.timeOut = 10000;
        toastr.info("{{Session::get('message')}}");
        var audio = new Audio('audio.mp3');
        audio.play();
        break;
    case 'success':

        toastr.options.timeOut = 10000;
        toastr.success("{{Session::get('message')}}");
        var audio = new Audio('audio.mp3');
        audio.play();

        break;
    case 'warning':

        toastr.options.timeOut = 10000;
        toastr.warning("{{Session::get('message')}}");
        var audio = new Audio('audio.mp3');
        audio.play();

        break;
    case 'error':

        toastr.options.timeOut = 10000;
        toastr.error("{{Session::get('message')}}");
        var audio = new Audio('audio.mp3');
        audio.play();

        break;
}
@endif

</script>