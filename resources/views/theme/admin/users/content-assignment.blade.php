@extends('theme.layout.app')
@push('cs')
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote-lite.min.css" rel="stylesheet">
@endpush
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
	<div class="dash-contentarea">
		<div class="dash-contentarea-wrapper">
			<div class="dash-page-title">Review & Approve Content</div>

			<form><!-- start form -->

{{--				<div class="team-addcontent-changelog">View Change Log</div>--}}

				<div class="content-assign-topbox">
					<ul>
						<li>
							<label>TITLE</label>
							<div>Five Signs You Need a New Water Heater</div>
						</li>
						<li>
							<label>PROJECT</label>
							<div>Acme Plumbing <a href="">[Visit Website]</a></div>
						</li>
						<li>
							<label>CONTENT TYPE</label>
							<div>Resource/Guide <a href="">[Example]</a></div>
						</li>
						<li>
							<label>DUE DATE</label>
							<div>12/8/2020 (in 16 days)</div>
						</li>
						<li>
							<label>PERSONA</label>
							<div>The Administrator <a href="">[Open Persona]</a></div>
						</li>
					</ul>
					<ul>
						<li>
							<label>CONTENT TACTIC</label>
							<div>Expert Guide [Example]</div>
						</li>
						<li>
							<label>TARGET KEYWORD</label>
							<div>Water Heater</div>
						</li>
						<li>
							<label>FRAMING KEYWORDS (?)</label>
							<div>Best Water Heater, Top Water Heaters, Check Water Heater Lifespan, When do I need a new water heater?</div>
						</li>
						<li>
							<label>PILLAR/CLUSTER</label>
							<div>OnSite SEO/eCommerce</div>
						</li>
					</ul>
					<ul>
						<li>
							<label>MINIMUM WORD COUNT</label>
							<div>3,500 Words</div>
						</li>
						<li>
							<label>VOICE</label>
							<div>Use words like “I” and “me” and remember the customer is the hero.</div>
						</li>
					</ul>
				</div>

				<div class="content-assign-middlebox">
					<div>
						<label>Notes</label>
						<div>Placeholder for notes from project manager</div>
					</div>
				</div>

				<div class="textEditor" >
						<textarea id="summernote" name="editordata"></textarea>
				</div>

				<div class="team-addcontent-bottombuttons add-users-bottombuttoms">
					<div>
						<input type="submit" value="SAVE DRAFT">
						<input type="submit" value="APPROVE FOR PUBLISHING">
					</div>
				</div>

			</form><!-- end form -->

		</div><!-- dash contentarea-wrapper -->
	</div>
</div>

@endsection
@push('js')
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote-lite.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote-lite.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#summernote').summernote();
		});
	</script>
@endpush
