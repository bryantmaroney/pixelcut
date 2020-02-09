@include('theme.partials.header')

<div class="logo-wrapper">
    <div class="logo-margin">
        <div class="login-logo"></div>
        <div class="login-box forgotpass-box">
            <div class="setuppass-title">Forgot Your Password? No Biggie.</div>
            <div class="login-welcome setuppass-welcome">To reset your lost password, enter the email<br>address
                connected to your account and we’ll send a password reset link. <strong>Easy Peasy</strong>.
            </div>
                @if(\Session::has('status'))
                <script>
                  $(function () {
                    $.toast({
                      heading: 'Information',
                      text: '{{\Session::get('status')}}',
                      icon: 'info',
                      loader: true,        // Change it to false to disable loader
                      loaderBg: '#9EC600',  // To change the background
                      position: 'top-right'
                    })
                  })
                </script>
                @endif
            <form class="login-formarea" action="/password/email" id="reset" method="POST">
                @csrf
                <div>
                    <label>EMAIL ADDRESS</label>
                    <input type="text" name="email">
                    <span class="login-at"></span>
                </div>
                <div>
                    <submit onclick="$('#reset').submit()" style="width:172px;">RESET PASSWORD</submit>
                </div>
            </form>
        </div>
    </div>
</div>
