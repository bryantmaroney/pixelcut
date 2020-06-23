@extends('theme.layout.app')
@section('title')
    Users
@endsection
@section('content')
    <style>
        ul.list-users-page li:nth-child(1), ul.list-users-page li ul li:nth-child(1) {
            width: calc(100% - 918px);
        }
        ul.list-users-page li:nth-child(2), ul.list-users-page li ul li:nth-child(2) {
            width: 97px;
        }
        ul.list-users-page li:nth-child(3), ul.list-users-page li ul li:nth-child(3) {
            width: 85px;
        }
        ul.list-users-page li:nth-child(4), ul.list-users-page li ul li:nth-child(4) {
            width: 96px;
        }
        ul.list-users-page li:nth-child(5), ul.list-users-page li ul li:nth-child(5) {
            width: 67px;
        }
        ul.list-users-page li:nth-child(7), ul.list-users-page li ul li:nth-child(7) {
            width: 252px;
        }
    </style>
    <div class="dash-contentarea">
        <div class="dash-contentarea-wrapper">
{{--            <div class="dash-page-title">USERS</div>--}}
            <div class="dash-page-title">Team Member Dashboard</div>
            <div class="dash-page-addcontent" onclick="window.location.href='{{route('add-user')}}'">ADD USER <span></span></div>

            <form method="get">
                <div class="dash-page-searcharea">
                    <div class="dashsearch">
                        <input type="text" placeholder="Search All Users" name="user">
                        <span></span>
                    </div>
                    <div class="dashdropdown-projects">
                        <select name="role">
                            <option value="" >Select Role</option>
                            <option value="1">Admin</option>
                            <option value="0">User</option>
                        </select>
                        <span></span>
                    </div>
                    <div class="dashdropdown-check">
                        <input type="checkbox" name="active" value="0"> Show Inactive
                        <button type="submit" class="dash-page-listactions" style="float:right;margin-left:34px;height:50px;margin-top: -18px;color:white;padding:0 35px;font-size:12px;">Search</button>
                    </div>
                </div>
            </form>

            <div class="dash-page-listarea">

                <table class="table table-striped">
                    <thead>
                    <tr class="customTheadTr">
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Date Added</th>
                        <th scope="col">Status</th>
                        <th scope="col">Role</th>
                        <th scope="col">Last Login</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($data) < 1)
                        <tr class="customTrStyle">
                            <td colspan="7">No Record Found</td>
                        </tr>
                    @endif
                    @foreach($data as $k => $v)
                        <tr class="customTrStyle">
                            <td >{{$v->first_name}}</td>
                            <td>{{$v->last_name}}</td>
                            <td>{{\Carbon\Carbon::parse($v->creatd_at)->toDateString()}}</td>
                            <td class="getstatus @if($v->status_name == 'Active')badge-active @else badge-In-active @endif">{{$v->status_name}}</td>
                            <td>{{$v->role_name}} </td>
                            <td>{{\Carbon\Carbon::parse($v->last_login)->toDateTimeString()}} </td>
                            <td>
                                <div class="btn-group">
                                    @if($v->is_admin == 1 || $v->is_admin == 2)
                                        <a href="{{route('inviteUser',$v->id)}}"  class="dash-page-listactions ml-1"> INVITE</a>

                                        <a href="{{route('editUser',$v->id)}}"  class="dash-page-listactions ml-1"> EDIT</a>
                                    @elseif($v->is_admin == 0)
                                        <a href="{{route('editUser',$v->id)}}"  class="dash-page-listactions ml-1"> EDIT</a>
                                    @endif
                                    @if($v->is_admin == 0 || $v->is_admin == 1 || $v->is_admin == 2)
                                        @if($v->status == 0)
                                            <a href="{{route('blockUser',[$v->id,1])}}"  class="dash-page-listactions ml-1"> ACTIVE</a>
                                        @else
                                            <a href="{{route('blockUser',[$v->id,0])}}"  class="dash-page-listactions ml-1"> DEACTIVE</a>
                                        @endif
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row ml-0 mt-2">
                    {{ $data->links('vendor.pagination.bootstrap-4') }}
                </div>
                
<script>                
$(document).ready(function(){
	//$('.badge-In-active').parent().hide();
	if (window.location.href.indexOf("active=0") > -1) {
	    $('.badge-In-active').parent().show();
	} else {
		$('.badge-In-active').parent().hide();
	}
});
</script>        
                




{{--                                <ul class="dash-page-listtitles list-users-page">--}}
{{--                    <li>First Name</li>--}}
{{--                    <li>Last Name</li>--}}
{{--                    <li>Date Added</li>--}}
{{--                    <li>Status</li>--}}
{{--                    <li>Role</li>--}}
{{--                    <li>Last Login</li>--}}
{{--                    <li>Actions</li>--}}
{{--                </ul>--}}
{{--                <ul class="list-users-page">--}}
{{--                    @if(count($data) == 0)--}}
{{--                        <li >--}}
{{--                            <ul>--}}
{{--                                <li style="width:1110px;">No Record Found</li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                    @else--}}
{{--                        @foreach($data as $k => $v)--}}
{{--                            <li style="width:100%;">--}}
{{--                                <ul>--}}
{{--                                    <li>{{$v->first_name}}</li>--}}
{{--                                    <li>{{$v->last_name}}</li>--}}
{{--                                    <li>{{\Carbon\Carbon::parse($v->creatd_at)->toDateString()}}</li>--}}
{{--                                    <li>--}}
{{--                                        <div--}}
{{--                                                class="team-projects-liststatus @if($v->status_name == 'Active')active @endif ">{{$v->status_name}}--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li>{{$v->role_name}}</li>--}}
{{--                                    <li>{{\Carbon\Carbon::parse($v->last_login)->toDateTimeString()}}</li>--}}
{{--                                    <li>--}}
{{--                                        @if($v->is_admin == 1 || $v->is_admin == 2)--}}
{{--                                            <div class="dash-page-listactions" onclick="window.location.href='{{route('inviteUser',$v->id)}}'">INVITE</div>--}}
{{--                                            <div class="dash-page-listactions" onclick="window.location.href='{{route('editUser',$v->id)}}'">Edit</div>--}}
{{--                                        @elseif($v->is_admin == 0)--}}
{{--                                            <div class="dash-page-listactions" onclick="window.location.href='{{route('editUser',$v->id)}}'">Edit</div>--}}
{{--                                        @endif--}}

{{--                                        @if($v->is_admin == 0 || $v->is_admin == 1 || $v->is_admin == 2)--}}
{{--                                            @if($v->status == 0)--}}
{{--                                                <div class="dash-page-listactions" onclick="window.location.href='{{route('blockUser',[$v->id,1])}}'">ACTIVE</div>--}}
{{--                                            @else--}}
{{--                                                <div class="dash-page-listactions" onclick="window.location.href='{{route('blockUser',[$v->id,0])}}'" >DEACTIVE</div>--}}
{{--                                            @endif--}}
{{--                                        @endif--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                        @endforeach--}}
{{--                    @endif--}}
{{--                </ul>--}}
            </div>
        </div>
    </div>
@endsection
