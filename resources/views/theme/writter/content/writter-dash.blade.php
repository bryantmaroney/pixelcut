@extends('theme.layout.app')
@section('title')
    My Content Assigments
@endsection
@section('content')
    <div class="dash-contentarea">
        <div class="dash-contentarea-wrapper">
{{--            <div class="dash-page-title">My Content Assigments</div>--}}
            <div class="dash-page-title">Writer Dashboard</div>
            <form action="{{route('writter-dash')}}" method="get">
                   <div class="dash-page-searcharea">
                    <div class="dashsearch">
                        <input type="text" name="title" placeholder="Search All Content">
                        <span></span>
                    </div>
                    <div class="dashdropdown-projects">
                        <select name="project">
                            <option value="">All Projects</option>
                            @foreach($projects as $k => $v)
                                <option value="{{$v->id}}">{{$v->project_name}}</option>
                            @endforeach
                        </select>
                        <span></span>
                    </div>
                    <div class="dashdropdown-status">
                        <select name="status" style="width: calc(185px - 10px);">
                            <option value="">All Statuses</option>
                            <option value="1">Topic Proposed</option>
                            <option value="2">Topic Approved</option>
                            <option value="3">Writing</option>
                            <option value="4">Client Reviewing</option>
                            <option value="5">Ready To Review</option>
                            <option value="6">Ready To Publish</option>
                            <option value="7">Publish</option>
                        </select>
                        <span></span>
                    </div>
                    <div class="dashdropdown-check writer-dash-search-button">
{{--                        <input type="checkbox" name="discarded" value="discarded"> Place yout text--}}
                        <button type="submit" class="dash-page-listactions">SEARCH</button>
                    </div>
                </div>
            </form>
            <div class="dash-page-listarea">
                <table class="table table-striped">
                    <thead>
                    <tr class="customTheadTr">
                        <th scope="col">Due Date</th>
                        <th scope="col">Writer</th>
                        <th scope="col">Title</th>
                        <th scope="col">Project</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($Contents) < 1)
                        <tr class="customTrStyle">
                            <td colspan="6">No Record Found</td>
                        </tr>
                    @endif
                    @foreach($Contents as $k => $v)
                           <tr class="customTrStyle">
                            <td @if(\Carbon\Carbon::now()->toDateString() == \Carbon\Carbon::parse($v->planned_published_date)->toDateString()) class="text-orange"
                                         @elseif( \Carbon\Carbon::now()->toDateString() > \Carbon\Carbon::parse($v->planned_published_date)->toDateString() ) class="text-red"
                                    @endif>{{\Carbon\Carbon::parse($v->planned_published_date)->toDateString()}}</td>
                            <td>{{$v->writer->user_name}}</td>
                            <td>{{$v->title}}</td>
                            <td>{{$v->project->project_name}}</td>
                            <td class=" @if($v->status_name == 'Publish') badge-proposed @elseif($v->status_name == 'Client Reviewing') badge-proposed @elseif($v->status_name == 'Topic Proposed') badge-proposed @elseif($v->status_name == 'Topic Approved') badge-approved @elseif($v->status_name == 'Writing') badge-write @elseif($v->status_name == 'Ready To Review') badge-ready @elseif($v->status_name == 'Ready To Publish') badge-published @elseif($v->status_name == 'Idea') badge-idea @elseif($v->status_name == 'Assign To Writer') badge-approved @endif ">{{$v->status_name}}</td>
                            <td>
                                <a href="{{route('writer-edit-content',$v->id)}}" class="dash-page-listactions" style="margin-top: 4px">Edit</a>
                            </td>
                        </tr>
                           @endforeach
                    </tbody>
                </table>


{{--                <ul class="dash-page-listtitles">--}}
{{--                    <li>Due Date </li>--}}
{{--                    <li>Writer</li>--}}
{{--                    <li>Title</li>--}}
{{--                    <li>Project</li>--}}
{{--                    <li>Status</li>--}}
{{--                    <li>Actions</li>--}}
{{--                </ul>--}}
{{--                <ul>--}}
{{--                    @if(count($Contents) < 1)--}}
{{--                        <li >--}}
{{--                            <ul>--}}
{{--                                <li style="width:97.8%;">No Record Found</li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                    @endif--}}
{{--                    @foreach($Contents as $k => $v)--}}
{{--                    <li>--}}
{{--                        <ul>--}}
{{--                            <li class="list-red">{{\Carbon\Carbon::parse($v->planned_published_date)->toDateString()}}</li>--}}
{{--                            <li>{{$v->writer->user_name}}</li>--}}
{{--                            <li>{{$v->title}}</li>--}}
{{--                            <li>{{$v->project->project_name}}</li>--}}
{{--                            <li>--}}
{{--                                <div class="dash-page-liststatus">{{$v->status_name}}</div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="dash-page-listactions" onclick="window.location.href='{{route('team-edit-content',$v->id)}}'">EDIT</div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--                {{ $Contents->links('vendor.pagination.simple-default') }}--}}
{{--                <ul>--}}
{{--                    <li>--}}
{{--                        <ul>--}}
{{--                            <li class="list-red">3 Days Ago</li>--}}
{{--                            <li>Not Assigned</li>--}}
{{--                            <li>Five Signs You Need a New Water Heater</li>--}}
{{--                            <li>Acme Plumbing</li>--}}
{{--                            <li>--}}
{{--                                <div class="dash-page-liststatus">TOPIC PROPOSED</div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="dash-page-listactions">EDIT</div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <ul>--}}
{{--                            <li class="list-orange">Due Today</li>--}}
{{--                            <li>Not Assigned</li>--}}
{{--                            <li>Five Signs You Need a New Water Heater</li>--}}
{{--                            <li>Acme Plumbing</li>--}}
{{--                            <li class="topic-approved">--}}
{{--                                <div class="dash-page-liststatus">TOPIC APPROVED</div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="dash-page-listactions">ASSIGN TO WRITER</div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <ul>--}}
{{--                            <li>Due Today</li>--}}
{{--                            <li>Not Assigned</li>--}}
{{--                            <li>Five Signs You Need a New Water Heater</li>--}}
{{--                            <li>Acme Plumbing</li>--}}
{{--                            <li class="topic-writing">--}}
{{--                                <div class="dash-page-liststatus">WRITING</div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="dash-page-listactions">REVIEW</div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <ul>--}}
{{--                            <li>Due Today</li>--}}
{{--                            <li>Not Assigned</li>--}}
{{--                            <li>Five Signs You Need a New Water Heater</li>--}}
{{--                            <li>Acme Plumbing</li>--}}
{{--                            <li class="topic-ready">--}}
{{--                                <div class="dash-page-liststatus">READY TO REVIEW</div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="dash-page-listactions">PUBLISH</div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <ul>--}}
{{--                            <li>Due Today</li>--}}
{{--                            <li>Not Assigned</li>--}}
{{--                            <li>Five Signs You Need a New Water Heater</li>--}}
{{--                            <li>Acme Plumbing</li>--}}
{{--                            <li class="topic-reviewing">--}}
{{--                                <div class="dash-page-liststatus">CLIENT REVIEWING</div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="dash-page-listactions">RESTORE</div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <ul>--}}
{{--                            <li>Due Today</li>--}}
{{--                            <li>Not Assigned</li>--}}
{{--                            <li>Five Signs You Need a New Water Heater</li>--}}
{{--                            <li>Acme Plumbing</li>--}}
{{--                            <li class="topic-readyview">--}}
{{--                                <div class="dash-page-liststatus">READY TO PUBLISH</div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="dash-page-listactions">EDIT</div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <ul>--}}
{{--                            <li>Due Today</li>--}}
{{--                            <li>Not Assigned</li>--}}
{{--                            <li>Five Signs You Need a New Water Heater</li>--}}
{{--                            <li>Acme Plumbing</li>--}}
{{--                            <li class="topic-published">--}}
{{--                                <div class="dash-page-liststatus">PUBLISHED</div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="dash-page-listactions">PROPOSE TOPIC</div>--}}
{{--                                <div class="dash-page-listactions">EDIT</div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <ul>--}}
{{--                            <li>Due Today</li>--}}
{{--                            <li>Not Assigned</li>--}}
{{--                            <li>Five Signs You Need a New Water Heater</li>--}}
{{--                            <li>Acme Plumbing</li>--}}
{{--                            <li class="topic-discarded">--}}
{{--                                <div class="dash-page-liststatus">DISCARDED</div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="dash-page-listactions">EDIT</div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <ul>--}}
{{--                            <li>Due Today</li>--}}
{{--                            <li>Not Assigned</li>--}}
{{--                            <li>Five Signs You Need a New Water Heater</li>--}}
{{--                            <li>Acme Plumbing</li>--}}
{{--                            <li class="topic-idea">--}}
{{--                                <div class="dash-page-liststatus">IDEA</div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="dash-page-listactions">EDIT</div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                </ul>--}}
            </div>
        </div>
    </div>
@endsection
