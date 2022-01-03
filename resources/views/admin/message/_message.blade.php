@foreach (['danger', 'warning', 'success', 'info'] as $msg)
  @if(session()->has($msg))

    <script>
        $(function() {

            var msg = '{{ session()->get($msg) ?? 0 }}';
            var nickname = '{{ Auth::user()->name }}';
            if(msg != 0){

                // 消息提醒
                toastr.options = {
                    closeButton: false,
                    debug: false,
                    progressBar: true,
                    positionClass: "toast-top-center",
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    timeOut: "2000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut"
                };

                toastr.success(msg);
            }

        })
    </script>
  @endif
@endforeach
