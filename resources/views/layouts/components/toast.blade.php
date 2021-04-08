<div class="states-messages" id="_status_messages">
    @if ($errors->any())
    <script>
        $(document).ready(function () {
            setTimeout(function () {
                toastr.clear();
                NioApp.Toast('Unprocessable entity', 'error', {
                position: 'top-right'
                });
            },100)
        })
    </script>
    @elseif (session()->get('flash_success'))
    <script>
        $(document).ready(function () {
            setTimeout(function () {
                toastr.clear();
                NioApp.Toast('{!! session()->get('flash_success') !!}', 'success', {
                position: 'top-right'
                });
            },100)
        })
    </script>
    @elseif (session()->get('flash_warning'))
    <script>
        $(document).ready(function () {
            setTimeout(function () {
                toastr.clear();
                NioApp.Toast('{!! session()->get('flash_warning') !!}', 'warning', {
                position: 'top-right'
                });
            },100)
        })
    </script>
    @elseif (session()->get('flash_info'))
    <script>
        $(document).ready(function () {
            setTimeout(function () {
                toastr.clear();
                NioApp.Toast('{!! session()->get('flash_info') !!}', 'info', {
                position: 'top-right'
                });
            },100)
        })
    </script>
    @elseif (session()->get('flash_danger'))
    <script>
        $(document).ready(function () {
            setTimeout(function () {
                toastr.clear();
                NioApp.Toast('{!! session()->get('flash_danger') !!}', 'error', {
                position: 'top-right'
                });
            },100)
        })
    </script>
    @elseif (session()->get('flash_message'))
    <script>
        $(document).ready(function () {
            setTimeout(function () {
                toastr.clear();
                NioApp.Toast('{!! session()->get('flash_message') !!}', 'info', {
                position: 'top-right'
                });
            },100)
        })
    </script>
    @endif
</div>