<div class="dash-page-listarea">
    <table class="table table-striped">
        <thead>
        <tr class="customTheadTr">
            <th scope="col">Month </th>
            <th scope="col">Type</th>
            <th scope="col">Title</th>
            <th scope="col">Project</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @if(count($Contents) < 1)
            <tr class="customTrStyle">
                <td colspan="7">No Record Found</td>
            </tr>
        @endif

        @foreach($Contents as $k => $v)
            <tr class="customTrStyle">
                <td scope="row">{{\Carbon\Carbon::parse($v->planned_published_date)->toDateString()}}</td>
                <td>{{$v->content_name}}</td>
                <td>{{$v->title}}</td>
                <td>{{$v->project->project_name}}</td>
                <td class=" @if($v->status_name == 'Publish') badge-proposed @elseif($v->status_name == 'Client Reviewing') badge-proposed @elseif($v->status_name == 'Topic Proposed') badge-proposed @elseif($v->status_name == 'Topic Approved') badge-approved @elseif($v->status_name == 'Writing') badge-write @elseif($v->status_name == 'Ready To Review') badge-ready @elseif($v->status_name == 'Ready To Publish') badge-published @endif ">{{$v->status_name}}</td>
                <td>
                    <a  class="dash-page-listactions" href="{{route('team-edit-content',$v->id)}}" style="margin-top: 4px">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>





{{--	<ul class="dash-page-listtitles">--}}
{{--		<li>Month <span></span></li>--}}
{{--		<li>Type</li>--}}
{{--		<li>Title</li>--}}
{{--		<li>Project</li>--}}
{{--		<li>Status</li>--}}
{{--		<li>Actions</li>--}}
{{--	</ul>--}}
{{--	<ul>--}}
{{--		<li>--}}
{{--			<ul>--}}
{{--				<li class="list-red">3 Days Ago</li>--}}
{{--				<li>Not Assigned</li>--}}
{{--				<li>Five Signs You Need a New Water Heater</li>--}}
{{--				<li>Acme Plumbing</li>--}}
{{--				<li>--}}
{{--					<div class="dash-page-liststatus">TOPIC PROPOSED</div>--}}
{{--				</li>--}}
{{--				<li>--}}
{{--					<div class="dash-page-listactions">Approve</div>--}}
{{--					<div class="dash-page-listactions">Discard</div>--}}
{{--				</li>--}}
{{--			</ul>--}}
{{--		</li>--}}
{{--		<li>--}}
{{--			<ul>--}}
{{--				<li class="list-orange">Due Today</li>--}}
{{--				<li>Not Assigned</li>--}}
{{--				<li>Five Signs You Need a New Water Heater</li>--}}
{{--				<li>Acme Plumbing</li>--}}
{{--				<li class="topic-approved">--}}
{{--					<div class="dash-page-liststatus">TOPIC APPROVED</div>--}}
{{--				</li>--}}
{{--				<li>--}}
{{--					<div class="dash-page-listactions">Review & Approve</div>--}}
{{--				</li>--}}
{{--			</ul>--}}
{{--		</li>--}}

{{--	</ul>--}}
</div>
