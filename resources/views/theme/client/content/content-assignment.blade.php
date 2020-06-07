@extends('theme.layout.app')
@section('title')
	Review Content
@endsection
@section('content')
	<style>
		.textEditor{
			float: left;
			width: calc(100% - 48px);
			background: #FFFFFF;
			box-shadow: 0 2px 10px 0 rgba(0,0,0,0.1);
			border-radius: 4px;
			padding: 24px;
			margin-top: 30px;
		}
	</style>
	@if ($errors->any())
		@foreach ($errors->all() as $error)
			<script>
				$(function () {
					$.toast({
						heading: 'error',
						text: '{{$error}}',
						icon: 'error',
						loader: true,        // Change it to false to disable loader
						loaderBg: '#9EC600',  // To change the background
						position: 'top-right'
					})
				})
			</script>
		@endforeach
	@endif
	<div class="dash-contentarea">
		<div class="dash-contentarea-wrapper">
{{--			<div class="dash-page-title">Review & Approve Content</div>--}}
			<div class="dash-page-title">Client Dashboard</div>

			<form method="post" action="{{route('contentReviewSave')}}"><!-- start form -->
				@csrf
				<input type="hidden" name="contentId" value="{{$content->id}}">
				<input type="hidden" name="projectId" value="{{$content->project->id}}">
				<input type="hidden" name="article" value="{{isset($article->article) ? $article->article : ''}}">
				<div class="content-assign-topbox">
					<ul>
						<li>
							<label>TITLE</label>
							<div>{{$content->title}}</div>
						</li>
						<li>
							<label>PROJECT</label>
							<div>{{$content->project->project_name}}<a href="">[Visit Website]</a></div>
						</li>
						<li>
							<label>CONTENT TYPE</label>
							<div>{{$content->content_name}} <a href="">[Example]</a></div>
						</li>
						<li>
							<label>DUE DATE</label>
{{--							<div>12/8/2020 (in 16 days)</div>--}}
							<div>{{\Carbon\Carbon::parse($content->creatd_at)->toDateString()}}</div>
						</li>
						<li>
							<label>PERSONA</label>
							<div>{{$content->persona_name}} <a href="">[Open Persona]</a></div>
						</li>
					</ul>
					<ul>
						<li>
							<label>CONTENT TACTIC</label>
							<div>{{$content->tatic_name}} [Example]</div>
						</li>
						<li>
							<label>TARGET KEYWORD</label>
							<div>{{$content->target_keyword}}</div>
						</li>
						<li>
							<label>FRAMING KEYWORDS (?)</label>
							<div>{{$content->framing_keywords}}</div>
						</li>
						<li>
							<label>PILLAR/CLUSTER</label>
							<div>{{$content->pillar_name}}/{{$content->cluster_name}}</div>
						</li>
					</ul>
					<ul>
						<li>
							<label>MINIMUM WORD COUNT</label>
							<div>{{number_format($content->min_words_count)}} Words</div>
						</li>
						<li>
							<label>VOICE</label>
							<div>{{$content->voice}}</div>
						</li>
					</ul>
				</div>

{{--				<div class="content-assign-middlebox">--}}
{{--					<div>--}}
{{--						<label>Notes</label>--}}
{{--						<div>Placeholder for notes from project manager</div>--}}
{{--					</div>--}}
{{--				</div>--}}

{{--				<div class="textEditor" >--}}
{{--						<textarea id="summernote" name="article"></textarea>--}}
{{--				</div>--}}

				<div class="team-addEditor" style="width:calc(100% - 48px);">
					<textarea id="Froala" name="article">{{isset($article->article) ? $article->article :''}}</textarea>
				</div>

				<div class="team-addcontent-bottombuttons add-users-bottombuttoms">
					<div>
						<input type="submit" value="SAVE DRAFT" name="draft">
						<input type="submit" value="APPROVE FOR PUBLISHING" name="publish">
					</div>
				</div>

			</form><!-- end form -->

		</div><!-- dash contentarea-wrapper -->
	</div>
</div>

@endsection
@push('js')
	<script>
		// $(document).ready(function() {
		// 	$('#summernote').summernote();
		// });

		$(document).ready(function() {
			var editor = new FroalaEditor('#Froala')
		});
	</script>
@endpush
