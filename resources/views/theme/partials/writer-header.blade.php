<div class="dash-header">
    <div class="dash-header-arrow" onclick="window.location.href='{{url()->previous()}}'"></div>
    <div class="dash-header-title">
        Content Writter Dashboard
        <input type="button" value="Logout" class="dash-page-listactions" onclick="window.location.href='/logout'" style="float: right; margin-right: 25px; height: 40px">

        <input type="button" value="Edit Profile" class="dash-page-listactions" onclick="window.location.href='{{route('writerEditProfile')}}'" style="float: right; margin-right: 9px; height: 40px">
    </div>
</div>
