<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ asset('../frontend/assets/js/wow.min.js') }}"></script>
<script src="{{ asset('../frontend/assets/js/default/active.js') }}"></script>


<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>


<script src="{{ asset('../frontend/assets/js/bootstrap-notify.min.js') }}"></script>

<script>
    @if(\Illuminate\Support\Facades\Session::has('success'))
        $.notify("Success: {{\Illuminate\Support\Facades\Session::get('success')}}", {
            animate: {
                enter: 'animated fadeInRight',
                exit: 'animated fadeOutRight'
            }
        });
    @endif

    @php
        \Illuminate\Support\Facades\Session::forget('success')
    @endphp

    @if(\Illuminate\Support\Facades\Session::has('error'))
        $.notify("Sorry: {{\Illuminate\Support\Facades\Session::get('error')}}", {
            animate: {
                enter: 'animated fadeInRight',
                exit: 'animated fadeOutRight'
            }
        });
    @endif

    @php
        \Illuminate\Support\Facades\Session::forget('error')
    @endphp
</script>





<script>
    setTimeout(function(){ $('#alert').slideUp();},4000);
</script>
