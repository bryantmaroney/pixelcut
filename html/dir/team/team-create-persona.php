<?php include('../../includes/header.php');?>

<div class="dash-left">
	<div class="dash-logoarea">
		<div class="dash-logo"></div>
	</div>
	<ul class="dash-sidebarlist">
		<li class="active">
			<span class="listicon"></span> Content
		</li>
		<li>
			<span class="projecticon"></span> Projects
		</li>
		<li>
			<span class="usericon"></span> Users
		</li>
	</ul>
</div>
<div class="dash-right">
	<div class="dash-header">
		<div class="dash-header-arrow"></div>
		<div class="dash-header-title">Team Member Dashboard</div>
		<div class="dash-header-usericon">
			<img src="../../images/usericon.jpg">
		</div>
	</div>
	<div class="dash-contentarea">
		<div class="dash-contentarea-wrapper">
			<div class="dash-page-title">Add a New Persona</div>
			
			<form><!-- start form -->
				
				<div class="top-area-title">Background Details</div>
				
				<div class="add-persona-name">
					<div>
						<label>PERSONA ARCHETYPE NAME</label>
						<input type="text">
					</div>
					<div>
						<label>JOB</label>
						<input type="text">
					</div>
					<div>
						<label>CAREER PATH</label>
						<input type="text">
					</div>
					<div>
						<label>FAMILY</label>
						<input type="text">
					</div>
				</div>
				
				<div class="top-area-title">Interests</div>
				
				<div class="add-interest-hobby">
					<label>HOBBIES</label>
					<textarea></textarea>
				</div>
				
				<div class="add-interest-hobby">
					<label>LEISURE TIME</label>
					<textarea></textarea>
				</div>
				
				<div class="add-interest-hobby" style="margin-right: 0;">
					<label>MEDIA</label>
					<textarea></textarea>
				</div>
				
				<div class="add-interest-hobby">
					<label>INFLUENCERS</label>
					<textarea></textarea>
				</div>
				
				<div class="add-interest-hobby" style="margin-right: 0;">
					<label>WEBSITES</label>
					<textarea></textarea>
				</div>
				
				<div class="top-area-title">Identifiers</div>
				
				<div class="add-interest-hobby">
					<label>DEMEANER</label>
					<textarea></textarea>
				</div>
				
				<div class="add-interest-hobby">
					<label>COMMUNICATION PREFERENCES</label>
					<textarea></textarea>
				</div>
				
				
				<div class="team-addcontent-bottombuttons add-project-bottombuttoms" style="clear:left;">
					<div>
						<input type="submit" value="CREATE PERSONA">
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