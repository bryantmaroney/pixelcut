@if(count($data) < 1)
    <li>
        <div class="changelog-line"></div>
        <div class="changelog-status now">NOW</div>
        <div class="changelog-time"><span>{{\Carbon\Carbon::now()->toDateString()}}</span> @ {{Carbon\Carbon::now()->format('H:i:s A')}}</div>
        <div class="changelog-content">No Activity Log Exist</div>
    </li>
@endif
@foreach($data as $k => $v)
    <li>
        <div class="changelog-line"></div>
        <div class="changelog-status @if($v->type == 10 || $v->type == 14 ) created  @elseif($v->type == 11 || $v->type == 15 ) edited @endif">
            @if($v->type == 10 || $v->type == 14 )
                Created
            @elseif($v->type == 11 || $v->type == 15 )
                Edited
            @endif
        </div>
        <div class="changelog-time"><span>{{\Carbon\Carbon::parse($v->created_at)->toDateString()}}</span> @ {{Carbon\Carbon::parse($v->created_at)->format('H:i:s A')}}
        </div>
        <div class="changelog-content">{{$v->comment}}</div>
    </li>
@endforeach

