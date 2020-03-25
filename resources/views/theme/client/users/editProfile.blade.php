@extends('theme.layout.app')
@section('title')
    Edit Profile
@endsection
@section('content')
    <style>
        .add-users-box div:nth-child(2) input {
            width: 267px;
        }
        .box{
            width: 231px;
        }
        .lb{
            margin-top: -19px;
           }
        .mt{
            margin-top: -39px;
        }
    </style>
    <div class="dash-contentarea">
        <div class="dash-contentarea-wrapper">
{{--            <div class="dash-page-title">Edit Profile</div>--}}
            <div class="dash-page-title">Client Dashboard</div>

            <form method="POST" action="{{route('updateProfile')}}"><!-- start form -->
                @csrf
                <input type="hidden" name="userId" value="{{$user->id}}">
                <div class="add-users-box">
                    <div>
                        <label>FIRST NAME*</label>
                        <input type="text"  name="first_name" required value="{{$user->first_name}}">
                    </div>
                    <div>
                        <label>LAST NAME*</label>
                        <input type="text"  name="last_name" required value="{{$user->last_name}}">
                    </div>
                    <div style="margin-top: 20px">
                        <label class="lb">Password*</label>
                        <input type="password" name="password" class="box">
                    </div>
                </div>

                <div class="team-addcontent-bottombuttons add-users-bottombuttoms">
                    <div>
                        <input type="submit" value="Update Profile" class="mt">
                    </div>
                </div>

            </form><!-- end form -->

        </div><!-- dash contentarea-wrapper -->
    </div>
    </div>
@endsection
