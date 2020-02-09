@if(\Auth::user()->is_admin == 1)
    @include('theme.partials.adminLeftNav')
@elseif(\Auth::user()->is_admin == 2)
    @include('theme.partials.writerLeftNav')
@else
    @include('theme.partials.clientLeftNav')
@endif