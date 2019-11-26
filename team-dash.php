<?php include('includes/header.php');?>

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
			<img src="images/usericon.jpg">
		</div>
	</div>
	<div class="dash-contentarea">
		<div class="dash-contentarea-wrapper">
			<div class="dash-page-title">Content</div>
			<div class="dash-page-addcontent">ADD CONTENT <span></span></div>
			<div class="dash-page-searcharea">
				<div class="dashsearch">
					<input type="text" placeholder="Search All Content">
					<span></span>
				</div>
				<div class="dashdropdown-projects">
					<select>
						<option value="all">All Projects</option>
						<option value="fill1">Filler 1</option>
						<option value="fill2">Filler 1</option>
						<option value="fill3">Filler 3</option>
					</select>
					<span></span>
				</div>
				<div class="dashdropdown-status">
					<select>
						<option value="all">All Projects</option>
						<option value="fill1">Filler 1</option>
						<option value="fill2">Filler 1</option>
						<option value="fill3">Filler 3</option>
					</select>
					<span></span>
				</div>
				<div class="dashdropdown-check">
					<input type="checkbox" name="discarded" value="discarded"> Show Discarded
				</div>
			</div>
			<div class="dash-page-listarea">
				<ul class="dash-page-listtitles">
					<li>Due Date <span></span></li>
					<li>Writer</li>
					<li>Title</li>
					<li>Project</li>
					<li>Status</li>
					<li>Actions</li>
				</ul>
				<ul>
					<li>
						<ul>
							<li>3 Days Ago</li>
							<li>Not Assigned</li>
							<li>Five Signs You Need a New Water Heater</li>
							<li>Acme Plumbing</li>
							<li>
								<div class="dash-page-liststatus">TOPIC PROPOSED</div>
							</li>
							<li>
								<div class="dash-page-listactions">EDIT</div>
							</li>
						</ul>
					</li>
					<li>
						<ul>
							<li>3 Days Ago</li>
							<li>Not Assigned</li>
							<li>Five Signs You Need a New Water Heater</li>
							<li>Acme Plumbing</li>
							<li>
								<div class="dash-page-liststatus">TOPIC PROPOSED</div>
							</li>
							<li>
								<div class="dash-page-listactions">EDIT</div>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>