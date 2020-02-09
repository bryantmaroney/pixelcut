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
			<div class="dash-page-title">Add New User</div>
			
			<form><!-- start form -->
				
				<div class="add-users-box">
					<div>
						<label>FIRST NAME*</label>
						<input type="text" placeholder="John">
					</div>
					<div>
						<label>LAST NAME*</label>
						<input type="text" placeholder="Doe">
					</div>
					<div>
						<label>ROLE*</label>
						<select class="addcontent-projectdrop">
							<option value="volvo">Volvo</option>
							<option value="saab">Saab</option>
							<option value="mercedes">Mercedes</option>
							<option value="audi">Audi</option>
						</select>
					</div>
					<div>
						<label>EMAil ADDRESS*</label>
						<input type="text" placeholder="john.doe@exmaple.com">
					</div>
				</div>
				
				<div class="team-addcontent-bottombuttons add-users-bottombuttoms">
					<div>
						<input type="submit" value="CREATE USER">
						<input type="submit" value="CREATE & INVITE USER">
					</div>
				</div>
			
			</form><!-- end form -->	
			
		</div><!-- dash contentarea-wrapper -->
	</div>
</div>