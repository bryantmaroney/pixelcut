<div class="dash-left">
    <div class="dash-logoarea">
        <div class="dash-logo"></div>
    </div>
    <ul class="dash-sidebarlist">
        <li   onclick="window.location.href='{{route('team-dash')}}'" @if(\Request::route()->getName() == 'team-dash') class="active" @elseif(\Request::route()->getName() == 'team-add-content') class="active" @elseif(\Request::route()->getName() == 'team-edit-content') class="active" @endif>
            <span class="listicon"></span> Content
        </li>
        <li  onclick="window.location.href='{{route('list-projects',"&status=1")}}'" @if(\Request::route()->getName() == 'list-projects') class="active" @elseif(\Request::route()->getName() == 'add-new-project') class="active" @elseif(\Request::route()->getName() == 'editProject') class="active" @endif>
            <span class="projecticon"></span> Projects
        </li>
        <li onclick="window.location.href='{{route('list-users')}}'" @if(\Request::route()->getName() == 'list-users') class="active" @elseif(\Request::route()->getName() == 'add-user') class="active" @elseif(\Request::route()->getName() == 'editUser') class="active"  @endif>
            <span class="usericon"></span> Users
        </li>
{{--        <li onclick="window.location.href='{{route('list-Persona')}}'" @if(\Request::route()->getName() == 'list-Persona') class="active" @elseif(\Request::route()->getName() == 'add-persona') class="active" @elseif(\Request::route()->getName() == 'editPersona') class="active"  @endif>--}}
{{--            <span class="usericon"></span> Personas--}}
{{--        </li>--}}
    </ul>
</div>
