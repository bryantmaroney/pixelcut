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
		<div class="dash-header-title">Client Dashboard</div>
		<div class="dash-header-usericon">
			<img src="../../images/usericon.jpg">
		</div>
	</div>
	<div class="dash-contentarea">
		<div class="dash-contentarea-wrapper">
			<div class="dash-page-title">Project: Apple, Inc.</div>
			
			<ul class="tabs-switch">
				<li class="tab-switcher active" data-tab-index="0" tabindex="0">CONTENT</li>
				<li class="tab-switcher" data-tab-index="1" tabindex="0">PERSONAS</li>
				<li class="tab-switcher" data-tab-index="2" tabindex="0">PROJECT INFO</li>
			</ul>
			
			
			<div id="allTabsContainer">
				<div class="tab-container" data-tab-index="0" style="display:none;">
					<?php include('client-dash-content.php');?>
				</div>
				<div class="tab-container" data-tab-index="1">
					<?php include('client-dash-personas.php');?>
				</div>
				<div class="tab-container" data-tab-index="2" style="display:none;">
					<?php include('client-dash-project.php');?>
				</div>
			</div>
			
		</div>
	</div>
</div>

<script>
$(document).ready(function () {
    var previousActiveTabIndex = 0;

    $(".tab-switcher").on('click keypress', function (event) {
        // event.which === 13 means the "Enter" key is pressed

        if ((event.type === "keypress" && event.which === 13) || event.type === "click") {

            var tabClicked = $(this).data("tab-index");

            if(tabClicked != previousActiveTabIndex) {
                $("#allTabsContainer .tab-container").each(function () {
                    if($(this).data("tab-index") == tabClicked) {
                        $(".tab-container").hide();
                        $(this).show();
                        previousActiveTabIndex = $(this).data("tab-index");
                        return;
                    }
                });
            }
        }
    });
});
</script>