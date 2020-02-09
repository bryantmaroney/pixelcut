@extends('theme.layout.app')
@section('content')
    <div class="dash-contentarea">
        <div class="dash-contentarea-wrapper">
            <div class="dash-page-title">My Content Assignments</div>
            <div class="dash-page-searcharea">
                <div class="dashsearch">
                    <input type="text" placeholder="Search All Content">
                    <span></span>
                </div>
                <div class="dashdropdown-projects">
                    <select>
                        <option value="all">All Projects</option>
                        <option value="fill1">Filler 1</option>
                        <option value="fill2">Filler 1</option>
                        <option value="fill3">Filler 3</option>
                    </select>
                    <span></span>
                </div>
                <div class="dashdropdown-status">
                    <select>
                        <option value="all">All Statuses</option>
                        <option value="fill1">Filler 1</option>
                        <option value="fill2">Filler 1</option>
                        <option value="fill3">Filler 3</option>
                    </select>
                    <span></span>
                </div>
            </div>
            <div class="dash-page-listarea">
                <ul class="dash-page-listtitles">
                    <li>Due Date <span></span></li>
                    <li>Writer</li>
                    <li>Title</li>
                    <li>Project</li>
                    <li>Status</li>
                    <li>Actions</li>
                </ul>
                <ul>
                    <li>
                        <ul>
                            <li class="list-blue">3 Days Ago</li>
                            <li>Not Assigned</li>
                            <li>Five Signs You Need a New Water Heater</li>
                            <li>Acme Plumbing</li>
                            <li>
                                <div class="dash-page-liststatus">WRITING</div>
                            </li>
                            <li>
                                <div class="dash-page-listactions">EDIT</div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li class="list-green">Due Today</li>
                            <li>Not Assigned</li>
                            <li>Five Signs You Need a New Water Heater</li>
                            <li>Acme Plumbing</li>
                            <li class="topic-approved">
                                <div class="dash-page-liststatus">FINALIZED</div>
                            </li>
                            <li>
                                <div class="dash-page-listactions">VIEW</div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
