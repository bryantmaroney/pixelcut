@include('theme.partials.header')
<style>
    .danger {
        background-color: red;
        clear: left;
        padding: 10px;
        border-radius: 6px;
        color: white;
        margin: 10px;
    }
</style>
<script>
$(document).ready(function(){
	$('.login-formarea div input').keypress(function (e) {
		if (e.which == 13) {
			$('#login').submit();
			return false;    
		}
	});
});
</script>

<div class="logo-wrapper">
    <div class="logo-margin">
        <div class="login-logo"></div>
        <div class="login-box">
            <div class="login-welcome">
                Welcome back!<br>
                Log into your account below:
            </div>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <script>
                      $(function () {
                        $.toast({
                          heading: 'error',
                          text: '{{$error}}',
                          icon: 'error',
                          loader: true,        // Change it to false to disable loader
                          loaderBg: '#9EC600',  // To change the background
                          position: 'top-right'
                        })
                      })
                    </script>
                @endforeach
            @endif
            <form class="login-formarea" method="POST" action="{{ route('login') }}" id="login">
                @csrf
                <div>
                    <label>EMAIL ADDRESS</label>
                    <input type="text" name="email">
                    <span class="login-at"></span>
                </div>
                <div>
                    <label>PASSWORD</label>
                    <span onclick="window.location='/forgot-pass'" class="login-forgotpass">Forgot Password?</span>
                    <input type="password" name="password">
                    <span class="login-lock"></span>
                </div>
                <div>
{{--                    <button type="submit" class="submitBtn">SIGN IN</button>--}}
                    <submit  onclick="$('#login').submit()"  >SIGN IN</submit>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
