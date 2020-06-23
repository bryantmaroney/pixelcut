@extends('theme.layout.app')
@section('title')
	Add Project
@endsection
@section('content')
	<style>

		.tagify__input--outside{
			display: block;
			max-width: 600px;
			border: 1px solid #DDD;
			margin-top: 1.5em;
			margin-bottom: 1em;
		}
		.tags-look .tagify__dropdown__item{
			display: inline-block;
			border-radius: 3px;
			padding: .3em .5em;
			border: 1px solid #CCC;
			background: #F3F3F3;
			margin: .2em;
			font-size: .85em;
			color: black;
			transition: 0s;
		}
		.tags-look .tagify__dropdown__item--active{
			color: black;
		}
		.tags-look .tagify__dropdown__item:hover{
			background: lightyellow;
			border-color: gold;
		}

	</style>
	<div class="dash-contentarea">
		<div class="dash-contentarea-wrapper">
{{--			<div class="dash-page-title">Add New Project</div>--}}
			<div class="dash-page-title">Team Member Dashboard</div>
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
			<form method="post" action="{{route('save-project')}}"><!-- start form -->
				@csrf
				<div class="add-project-name">
					<div>
						<label>PROJECT NAME*</label>
						<input type="text" name="p_name" value="{{old('p_name')}}" >
					</div>
					<div>
						<label>CLIENT WEBSITE</label>
						<input type="text" name="website" value="{{old('website')}}">
					</div>
					<div>
						<label>PROJECT MANAGER</label>
						<select class="addcontent-projectdrop" name="p_manager">
							@foreach($projectManagers as $v)
								<option value="{{$v->id}}" {{old('p_manager') == $v->id ? 'selected' :''}}>{{$v->first_name}} {{$v->last_name}}</option>
							@endforeach
						</select>
					</div>
					<div>
						<label>Status</label>
						<select class="addcontent-projectdrop" name="status">
								<option value="1" selected >Active</option>
								<option value="0" >Inactive</option>
						</select>
					</div>
				</div>

				<div class="add-project">
					<label>POINTS OF CONTACT</label>
					<input type="text" name='user_name' class="tags-look" placeholder='Search All Users' value="{{old('user_name')}}">
				</div>
{{--					<div class="tagify__input--outside"></div>--}}
{{--				<div class="add-project-points">--}}
{{--					<label>POINTS OF CONTACT</label>--}}
{{--					<input type="text" placeholder="Search All Users" name="user_name" >--}}
{{--					<span></span>--}}
{{--					<ul>--}}
{{--						<li>John Doe</li>--}}
{{--						<li>John Doe</li>--}}
{{--					</ul>--}}
{{--				</div>--}}

				<div class="add-project-autofill">
					<label>AUTO-FILL VOICE NOTES</label>
					<textarea name="voice">{{old('voice')}}</textarea>
				</div>

				<div class="add-project-pillars">
					<div class="set-pillar">
						<label>PILLARS</label>
						<textarea name="pillars" class="textarea">{{old('pillars')}}</textarea>
					</div>
					<div class="clustertext">
						<label>CLUSTERS</label>
						<textarea name="clusters" class="textarea">{{old('clusters')}}</textarea>
					</div>
				</div>
				<div class="team-addcontent-bottombuttons add-project-bottombuttoms" style="	margin-right: 48px;">
					<div>
						<input type="submit" value="CREATE PROJECT">
					</div>
				</div>

			</form><!-- end form -->

		</div><!-- dash contentarea-wrapper -->
	</div>
</div>

<script>
// TAGIFY
new Tagify(document.querySelector('input[name=value_empty_JSON]'))
new Tagify(document.querySelector('input[name=value_JSON]'))
</script>

<script data-name="textarea">
(function(){
var input = document.querySelector('textarea[name=pillars]'),
    tagify = new Tagify(input, {
        backspace        : "edit",
        enforceWhitelist : false,
        whitelist        : [""],
        callbacks        : {
            add    : console.log,  // callback when adding a tag
            remove : console.log   // callback when removing a tag
        }
    });
})();
(function(){
var cinput = document.querySelector('textarea[name=clusters]'),
    tagify = new Tagify(cinput, {
        backspace        : "edit",
        enforceWhitelist : false,
        whitelist        : [""],
        callbacks        : {
            add    : console.log,  // callback when adding a tag
            remove : console.log   // callback when removing a tag
        }
    });
})();
</script>
	<script>
		var input = document.querySelector('input[name="user_name"]'),
				// init Tagify script on the above inputs
				tagify = new Tagify(input, {
					whitelist: {!! $users !!},
					maxTags: 10,
					dropdown: {
						maxItems: 20,           // <- mixumum allowed rendered suggestions
						classname: "tags-look",
						enabled: 0, // <- show suggestions on focus
						closeOnSelect: false    // <- do not hide the suggestions dropdown once an item has been selected
					}
				});
				// tagify.DOM.input.classList.add('tagify__input--outside');
				// tagify.DOM.scope.parentNode.insertBefore(tagify.DOM.input, tagify.DOM.scope);
	</script>

@endsection
