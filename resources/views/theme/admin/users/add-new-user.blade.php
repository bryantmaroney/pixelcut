@extends('theme.layout.app')
@section('title')
	Add User
@endsection
@section('content')
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
	<div class="dash-contentarea">
		<div class="dash-contentarea-wrapper">
{{--			<div class="dash-page-title">Add New User</div>--}}
			<div class="dash-page-title">Team Member Dashboard</div>

			<form method="POST" action="{{route('insert-user')}}"><!-- start form -->
                @csrf
				<div class="add-users-box">
					<div>
						<label>FIRST NAME*</label>
						<input type="text" placeholder="John" name="first_name" value="{{old('first_name')}}">
					</div>
					<div>
						<label>LAST NAME*</label>
						<input type="text" placeholder="Doe" name="last_name"   value="{{old('last_name')}}">
					</div>
					<div>
						<label>ROLE*</label>
						<select class="addcontent-projectdrop" name="is_admin" >
							<option value="1" {{old('is_admin') == 1 ? 'selected' : ''}}>Admin</option>
							<option value="0" {{old('is_admin') == 0 ? 'selected' : ''}}>Client</option>
							<option value="2" {{old('is_admin') == 2 ? 'selected' : ''}}>Writter</option>
						</select>
					</div>
					<div>
						<label>EMAil ADDRESS*</label>
						<input type="text" placeholder="john.doe@exmaple.com" name="email" value="{{old('email')}}">
					</div>
					<div style="margin-top: 20px">
						<label>Password*</label>
						<input type="password" name="password" >
					</div>
					<div style="margin-top: 20px">
						<label>Status*</label>
                        <select class="addcontent-projectdrop" name="status" >
                            <option value="1" selected>Active</option>
                            <option value="0" >Inactive</option>
                        </select>
					</div>
				</div>

				<div class="team-addcontent-bottombuttons add-users-bottombuttoms">
					<div>
						<input type="submit" value="CREATE USER" name="buttonType1">
						<input type="submit" value="CREATE & INVITE USER" name="buttonType2">
					</div>
				</div>

			</form><!-- end form -->

		</div><!-- dash contentarea-wrapper -->
	</div>
</div>
@endsection
