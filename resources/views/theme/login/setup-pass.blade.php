@include('theme.partials.header')

<div class="logo-wrapper">
	<div class="logo-margin">
		<div class="login-logo"></div>
		<div class="login-box setuppass-box">
			<div class="login-newpasstitle">Set Your New Password</div>
			<form class="login-formarea" method="POST" action="/password/reset">
                @csrf
                <input type="hidden" value="{{\Session::get('token')}}">
				<div>
					<label>Email</label>
					<input type="email" value="{{\Session::get('email')}}">
					<span class="login-lock"></span>
				</div>
				<div>
					<label>SETUP YOUR PASSWORD</label>
					<input type="password">
					<span class="login-lock"></span>
				</div>
				<div>
					<label>CONFIRM YOUR PASSWORD</label>
					<input type="password">
					<span class="login-lock"></span>
				</div>
				<div>
					<submit onclick="window.location='/client-dash'">SIGN IN</submit>
				</div>
			</form>
		</div>
	</div>
</div>

</body>
</html>
