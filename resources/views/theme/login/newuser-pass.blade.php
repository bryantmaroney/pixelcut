@include('theme.partials.header')
<style>
	.danger{
		background-color: red;
		clear: left;
		padding: 10px;
		border-radius: 6px;
		color: white;
		margin: 10px;
	}
</style>
<div class="logo-wrapper">
	<div class="logo-margin">
		<div class="login-logo"></div>
		<div class="login-box setuppass-box">
			<div class="setuppass-title">Let’s Get This Party Started 🎉</div>
			<div class="login-welcome setuppass-welcome">Content is vital for SEO. We’ve built a dashboard<br>that streamlines the content creation process. All you need to do to get started is set a password.</div>

			@if ($errors->any())
				<div class="danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif

			<form class="login-formarea" method="POST" action="{{url('register')}}" id="register">
				@csrf
				<div>
					<label>YOUR Name</label>
					<input type="text" name="name" placeholder="enter your name" class="@error('name') is-invalid @enderror" value="{{ old('name') }}">
				</div>
				<div>
					<label>YOUR EMAIL ADDRESS</label>
					<input type="text" name="email" placeholder="enter your email" class="@error('email') is-invalid @enderror"  value="{{ old('email') }}">
				</div>
				<div>
					<label>SETUP YOUR PASSWORD</label>
					<input type="password" name="password" class="@error('password') is-invalid @enderror" value="{{ old('password') }}" >
					<span class="login-lock"></span>
				</div>
				<div>
					<label>CONFIRM YOUR PASSWORD</label>
					<input type="password" name="password_confirmation">
					<span class="login-lock"></span>
				</div>
				<div>
{{--					<button type="submit" class="submitBtn">SIGN Up</button>--}}
					<submit onclick="$('#register').submit()"  >SIGN Up</submit >
				</div>
			</form>
		</div>
	</div>
</div>

</body>
</html>