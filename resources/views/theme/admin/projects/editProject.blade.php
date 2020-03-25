@extends('theme.layout.app')
@section('title')
    Edit Project
@endsection
@section('content')
    <div class="dash-contentarea">
        <div class="dash-contentarea-wrapper">
{{--            <div class="dash-page-title">Project: {{$project->project_name}}</div>--}}
            <div class="dash-page-title">Team Member Dashboard</div>

            <ul class="tabs-switch">
                <li class="tab-switcher c0 @if($tab == 'view') active @endif" data-tab-index="0" tabindex="0">CONTENT</li>
                <li class="tab-switcher c1" data-tab-index="1" tabindex="0">PERSONAS</li>
                <li class="tab-switcher c2 @if($tab == 'edit') active @endif" data-tab-index="2" tabindex="0">PROJECT INFO</li>
            </ul>
            <div id="allTabsContainer">
                <div class="tab-container" data-tab-index="0"  @if($tab == 'edit') style="display:none;" @elseif($tab == 'persona')  style="display:none;"  @endif>
                    @include('theme.admin.content.dash-content')
                </div>
                <div class="tab-container" data-tab-index="1" @if($tab == 'edit') style="display:none;" @elseif($tab == 'view')  style="display:none;"  @endif >
                    @include('theme.admin.content.dash-personas')
                </div>
                <div class="tab-container" data-tab-index="2" @if($tab == 'view') style="display:none;" @elseif($tab == 'persona')  style="display:none;"  @endif>
                    @include('theme.admin.content.dash-project')
                </div>
            </div>

        </div>
    </div>
@endsection
