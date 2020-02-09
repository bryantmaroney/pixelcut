<div class="dash-left">
    <div class="dash-logoarea">
        <div class="dash-logo"></div>
    </div>
    <ul class="dash-sidebarlist">
        <li   onclick="window.location.href='{{route('writter-dash')}}'" @if(\Request::route()->getName() == 'writter-dash') class="active" @elseif(\Request::route()->getName() == 'writer-edit-content') class="active" @elseif(\Request::route()->getName() == 'team-edit-content') class="active" @endif>
            <span class="listicon"></span> Content
        </li>
        </li>
    </ul>
</div>
