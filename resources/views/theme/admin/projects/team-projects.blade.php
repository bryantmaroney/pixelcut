@extends('theme.layout.app')
@section('title')
    Projects
@endsection
@section('content')
    <style>
        ul.team-projects-listtitles li:nth-child(1), ul.team-projects-list li ul li:nth-child(1) {
            width: calc(100% - 895px);
        }
        ul.team-projects-listtitles li:nth-child(5), ul.team-projects-list li ul li:nth-child(5) {
            width: 81px;
        }
    </style>

<script>
$(document).ready(function(){
	$('.dash-page-searcharea .dashdropdown-projects select, .dash-page-searcharea .dashdropdown-status select').css('color','rgba(137, 146, 163, 0.4)');
	$('.dash-page-searcharea .dashdropdown-projects select, .dash-page-searcharea .dashdropdown-status select').change(function() {
	    var current = $(this).val();
	    if (current != 'null') {
	        $(this).css('color','#333');
	    } else {
	        $(this).css('color','#8992A3');
	    }
	});
});
</script>
    
    <div class="dash-contentarea">
        <div class="dash-contentarea-wrapper">
{{--            <div class="dash-page-title">PROJECTS</div>--}}
            <div class="dash-page-title">Team Member Dashboard</div>
            <div class="dash-page-addcontent" onclick="window.location.href='{{route('add-new-project')}}'">ADD PROJECT <span></span></div>
            <form action="{{route('list-projects')}}" method="get">
                <div class="dash-page-searcharea">
                    <div class="dashsearch">
                        <input type="text" name="project" placeholder="Search All Projects">
                        <span></span>
                    </div>
                    <div class="dashdropdown-projects">
                        <select name="manager">
	                        <option style="color:#8992A3;" disabled="disabled" selected="selected" value="null">Select an Option</option>
                            <option value="">All Project Managers</option>
                            @foreach($projectManagers as $v)
                                <option value="{{$v->id}}">{{$v->user_name}}</option>
                            @endforeach
                        </select>
                        <span></span>
                    </div>
                    <div class="dashdropdown-status">
                        <select name="status">
	                        <option style="color:#8992A3;" disabled="disabled" selected="selected" value="null">Select an Option</option>
                            <option value="">All Statuses</option>
                            <option value="1" @if($status == 1) selected  @endif>Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        <span></span>
                    </div>
                    <div class="dashdropdown-check">
{{--                        <input type="checkbox" name="discarded"  value="0"> Show Inactive--}}
                        <button type="submit" class="dash-page-listactions" style="font-family: 'Open Sans', sans-serif;font-weight: 600;float: right;height: 50px;margin-top: -18px;color: white;padding: 0 39px;margin-left: 17px;font-size: 11px;">SEARCH</button>
                    </div>
                </div>
            </form>
            <div class="dash-page-listarea">

                <table class="table table-striped ">
                    <thead>
                    <tr class="customTheadTr">
                        <th scope="col">Project Name</th>
                        <th scope="col">Project Manager</th>
{{--                        <th scope="col">Date Added</th>--}}
                        <th scope="col">Status</th>
                        <th scope="col">In Progress</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($projects) < 1)
                        <tr class="customTrStyle">
                            <td colspan="5">No Record Found</td>
                        </tr>
                    @endif
                    @foreach($projects as $k => $v)
                        <tr class="customTrStyle">
                            <td >{{$v->project_name}}</td>
                            <td>{{$v->projectManager['first_name'] . ' ' . $v->projectManager['last_name'] }}</td>
{{--                            <td>{{$v->created_at}}</td>--}}
                            <td  class="@if($v->status_name == 'Active')badge-active @else badge-proposed @endif" >{{$v->status_name}}</td>
                            <td>{{$v->articles->count()}} Articles</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('editProject',$v->id)}}?tab=view" class="dash-page-listactions">View Article</a>
                                    <a href="{{route('editProject',$v->id)}}?tab=edit"  class="dash-page-listactions ml-1"> Edit Article</a>
                                    @if($v->status == 0)
                                        <a href="{{route('changeStatus',[$v->id,1])}}"  class="dash-page-listactions ml-1">Activate</a>
                                    @else
                                        <a href="{{route('changeStatus',[$v->id,0])}}"  class="dash-page-listactions ml-1">Deactivate</a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row ml-0 mt-2">
                    {{ $projects->links('vendor.pagination.bootstrap-4') }}
                </div>













{{--                <ul class="dash-page-listtitles team-projects-listtitles">--}}
{{--                    <li>Project Name</li>--}}
{{--                    <li>Project Manager</li>--}}
{{--                    <li>Date Added</li>--}}
{{--                    <li>Status</li>--}}
{{--                    <li>In Progress</li>--}}
{{--                    <li>Actions</li>--}}
{{--                </ul>--}}
{{--                <ul class="team-projects-list">--}}
{{--                    @if(count($projects) < 1)--}}
{{--                        <li >--}}
{{--                            <ul>--}}
{{--                                <li style="width:97.8%;">No Record Found</li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                    @endif--}}
{{--                    @foreach($projects as $k => $v)--}}
{{--                    <li>--}}
{{--                        <ul>--}}
{{--                            <li>{{$v->project_name}}</li>--}}
{{--                            <li>{{$v->projectManager['first_name'] . ' ' . $v->projectManager['last_name'] }}</li>--}}
{{--                            <li>{{$v->created_at}}</li>--}}
{{--                            <li>--}}
{{--                                <div class="team-projects-liststatus @if($v->status_name == 'Active')active @endif">--}}
{{--                                    {{$v->status_name}}--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li>{{$v->articles->count()}} Articles</li>--}}
{{--                            <li>--}}
{{--                                <div class="dash-page-listactions" onclick="window.location.href='{{route('viewProject',$v->id)}}'">VIEW</div>--}}
{{--                                <div class="dash-page-listactions" onclick="window.location.href='{{route('editProject',$v->id)}}'">EDIT</div>--}}
{{--                                    @if($v->status == 0)--}}
{{--                                        <div class="dash-page-listactions" onclick="window.location.href='{{route('changeStatus',[$v->id,1])}}'">ACTIVE</div>--}}
{{--                                    @else--}}
{{--                                        <div class="dash-page-listactions" onclick="window.location.href='{{route('changeStatus',[$v->id,0])}}'" >DEACTIVE</div>--}}
{{--                                    @endif--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                     @endforeach--}}
{{--                </ul>--}}
            </div>
        </div>
    </div>
@endsection
