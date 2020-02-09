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
        <div class="changelog-status @if($v->type == 10 || $v->type == 14 ) created  @elseif($v->type == 11 || $v->type == 15 ) edited  @elseif($v->type  == 7) proposed @elseif($v->type  == 4) proposed @elseif($v->type  == 1) proposed @elseif($v->type  == 2) approved @elseif($v->type  == 3) writing @elseif($v->type  == 5) writing @elseif($v->type  == 6) approved  @elseif($v->type  == 8) created @elseif($v->type  == 9) approved @endif">
            @if($v->type == 10 || $v->type == 14 )
                Created
            @elseif($v->type == 11 || $v->type == 15 )
                Edited
            @elseif($v->type == 1)
                Topic Proposed
            @elseif($v->type == 2)
                Topic Approved
            @elseif($v->type == 3)
                Writing
            @elseif($v->type == 4)
                Client Reviewing
            @elseif($v->type == 5)
                Ready To Review
            @elseif($v->type == 6)
                Ready To Publish
            @elseif($v->type == 7)
                Publish
            @elseif($v->type == 8)
                Idea
            @elseif($v->type == 9)
                Assign To Writer
            @endif
        </div>
        <div class="changelog-time"><span>{{\Carbon\Carbon::parse($v->created_at)->toDateString()}}</span> @ {{Carbon\Carbon::parse($v->created_at)->format('H:i:s A')}}
        </div>
        <div class="changelog-content">{{$v->comment}}</div>
    </li>
@endforeach

