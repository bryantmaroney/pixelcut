@extends('theme.layout.app')
@section('title')
    Edit User
@endsection
@section('content')
    <div class="dash-contentarea">
        <div class="dash-contentarea-wrapper">
{{--            <div class="dash-page-title">Edit User</div>--}}
            <div class="dash-page-title">Team Member Dashboard</div>
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

            <form method="POST" action="{{route('updateUser')}}"><!-- start form -->
                @csrf
                <input type="hidden" name="userId" value="{{$user->id}}">
                <div class="add-users-box">
                    <div>
                        <label>FIRST NAME*</label>
                        <input type="text"  name="first_name"  value="{{$user->first_name}}">
                    </div>
                    <div>
                        <label>LAST NAME*</label>
                        <input type="text"  name="last_name"  value="{{$user->last_name}}">
                    </div>
                    <div>
                        <label>ROLE*</label>
                        <select class="addcontent-projectdrop" name="is_admin" >
                            <option value="1" @if($user->is_admin == 1) selected @endif>Admin</option>
                            <option value="0" @if($user->is_admin == 0) selected @endif>Client</option>
                            <option value="2" @if($user->is_admin == 2) selected @endif>Writter</option>
                        </select>
                    </div>
                    <div style="margin-top: 20px">
                        <label>EMAIL ADDRESS*</label>
                        <input type="text"  name="email"  value="{{$user->email}}">
                    </div>
                    <div style="margin-top: 20px">
                        <label>PASSWORD*</label>
                        <input type="password" name="password" >
                    </div>
                    <div style="margin-top: 20px">
                        <label>STATUS*</label>
                        <select class="addcontent-projectdrop" name="status" >
                            <option value="1" @if($user->status == 1) selected @endif >Active</option>
                            <option value="0" @if($user->status == 0) selected @endif >In-Active</option>
                        </select>
                    </div>
                </div>

                <div class="team-addcontent-bottombuttons add-users-bottombuttoms">
                    <div>
                        <input type="submit" value="Update USER">
                    </div>
                </div>

            </form><!-- end form -->

        </div><!-- dash contentarea-wrapper -->
    </div>
    </div>
@endsection
