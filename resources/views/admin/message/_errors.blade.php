@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <script>
            $(function() {
                var msg = '{{ $error }}';
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

                    toastr['error'](msg);
                }

            })
        </script>
    @endforeach
@endif
