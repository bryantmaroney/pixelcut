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
<form method="post" action="{{route('client.updateProject')}}"><!-- start form -->
	@csrf
	<input type="hidden" name="rowId" value="{{$project->id}}" >
	<div class="add-project-name">
		<div>
			<label>PROJECT NAME*</label>
			<input type="text" name="p_name" value="{{$project->project_name}}">
		</div>
		<div>
			<label>CLIENT WEBSITE</label>
			<input type="text" name="website" value="{{$project->client_website}}">
		</div>
		<div class="client-dash-project-manager-drop">
			<label>PROJECT MANAGER</label>
			<select class="addcontent-projectdrop" name="p_manager">
				@foreach($projectManagers as $v)
					<option value="{{$v->id}}" @if($v->id == $project->project_manager_id) selected @endif>{{$v->user_name}}</option>
				@endforeach
			</select>
			<span></span>
		</div>
		<div class="client-dash-status-drop">
			<label>STATUS</label>
			<select class="addcontent-projectdrop" name="status">
				<option value="1" @if($project->status == 1) selected @endif>Active</option>
				<option value="0" @if($project->status == 0) selected @endif>In Active</option>
			</select>
			<span></span>
		</div>
	</div>

	<div class="add-project client-dash-add-contact">
		<label>POINTS OF CONTACT</label>
		<input type="text" name='user_name' class="tags-look" value="{{$clientNames}}" readonly>
{{--		<input type="text" name="user_name" placeholder="Search All Users" value="{{$clientNames}}">--}}
{{--		<span></span>--}}
{{--		<ul>--}}
{{--			<li>John Doe</li>--}}
{{--			<li>John Doe</li>--}}
{{--		</ul>--}}
	</div>
	<div class="add-project-autofill">
		<label>AUTO-FILL VOICE NOTES</label>
		<textarea name="voice">{{$project->voice}}</textarea>
	</div>

	<div class="add-project-pillars">
		<div>
			<label>PILLARS</label>
			<textarea name="pillars" class="textarea">{{$project->pillars}}</textarea>
		</div>
		<div class="clustertext">
			<label>CLUSTERS</label>
			<textarea name="clusters" class="textarea">{{$project->clusters}}</textarea>
		</div>
	</div>

	<div class="team-addcontent-bottombuttons add-project-bottombuttoms" style="margin-right: 47px;
    margin-top: 20px;">
		<div>
			<input type="submit" value="UPDATE PROJECT">
		</div>
	</div>

</form><!-- end form -->

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
