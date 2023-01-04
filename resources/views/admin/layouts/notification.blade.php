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
