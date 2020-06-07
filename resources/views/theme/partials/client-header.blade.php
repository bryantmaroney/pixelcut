<div class="dash-header">
    <div class="dash-header-arrow" onclick="window.location.href='{{url()->previous()}}'"></div>
    <div class="dash-header-title">Client Dashboard
        <input type="button" value="Logout" class="dash-page-listactions" onclick="window.location.href='/logout'" style="float:right;margin-right:25px;background-color: transparent;border: none;color: #8F9BB3;font-family: 'Open Sans';font-size: 13px;font-weight: 900;text-transform: uppercase;margin-top:20px;">

        <input type="button" value="EDIT PROFILE" class="dash-page-listactions" onclick="window.location.href='{{route('editProfile')}}'" style="float:right;margin-right:9px; height:40px;font-weight:800;">
    </div>
{{--    <div class="dash-header-usericon">--}}
{{--        <img src="../../images/usericon.jpg">--}}
{{--    </div>--}}
</div>