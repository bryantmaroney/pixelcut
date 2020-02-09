@if(\Auth::user()->is_admin == 1)
    @include('theme.partials.admin-header')
@elseif(\Auth::user()->is_admin == 2)
    @include('theme.partials.writer-header')
@else
    @include('theme.partials.client-header')
@endif
