<div class="dash-left">
    <div class="dash-logoarea">
        <div class="dash-logo"></div>
    </div>
    <ul class="dash-sidebarlist">
        <li   onclick="window.location.href='{{route('client-dash')}}'" @if(\Request::route()->getName() == 'client-dash') class="active" @endif>
            <span class="listicon"></span> Projects
        </li>
{{--        <li   @if(\Request::route()->getName() == 'content-review') class="active" @endif>--}}
{{--            <span class="listicon"></span> Content--}}
{{--        </li>--}}

    </ul>
</div>
