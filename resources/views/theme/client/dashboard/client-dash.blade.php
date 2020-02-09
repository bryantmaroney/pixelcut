@extends('theme.layout.app')
@section('content')
    <div class="dash-contentarea">
        <div class="dash-contentarea-wrapper">
            <div class="dash-page-title">Project: {{$project->project_name}}</div>

            <ul class="tabs-switch">
                <li class="tab-switcher c0 active" data-tab-index="0" tabindex="0">CONTENT</li>
                <li class="tab-switcher c1" data-tab-index="1" tabindex="0">PERSONAS</li>
                <li class="tab-switcher c2" data-tab-index="2" tabindex="0">PROJECT INFO</li>
            </ul>
            <div id="allTabsContainer">
                <div class="tab-container" data-tab-index="0" >
                    @include('theme.client.content.dash-content')
                </div>
                <div class="tab-container" data-tab-index="1" style="display:none;">
                    @include('theme.client.content.dash-personas')
                </div>
                <div class="tab-container" data-tab-index="2" style="display:none;">
                    @include('theme.client.content.dash-project')
                </div>
            </div>

        </div>
    </div>
@endsection
