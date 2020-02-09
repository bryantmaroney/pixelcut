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
			<div class="dash-page-title">Add New Project</div>
			
			<form><!-- start form -->
				
				<div class="add-project-name">
					<div>
						<label>PROJECT NAME*</label>
						<input type="text">
					</div>
					<div>
						<label>CLIENT WEBSITE</label>
						<input type="text">
					</div>
					<div>
						<label>PROJECT MANAGER</label>
						<select class="addcontent-projectdrop">
							<option value="volvo">Volvo</option>
							<option value="saab">Saab</option>
							<option value="mercedes">Mercedes</option>
							<option value="audi">Audi</option>
						</select>
					</div>
				</div>
				
				<div class="add-project-points">
					<label>POINTS OF CONTACT</label>
					<input type="text" placeholder="Search All Users">
					<span></span>
					<ul>
						<li>John Doe</li>
						<li>John Doe</li>
					</ul>
				</div>
				
				<div class="add-project-autofill">
					<label>AUTO-FILL VOICE NOTES</label>
					<textarea></textarea>
				</div>
				
				<div class="add-project-pillars">
					<div>
						<label>PILLARS</label>
						<textarea name="pillars" class="textarea"></textarea>
					</div>
					<div class="clustertext">
						<label>CLUSTERS</label>
						<textarea name="clusters" class="textarea"></textarea>
					</div>
				</div>
				
				<div class="team-addcontent-bottombuttons add-project-bottombuttoms">
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