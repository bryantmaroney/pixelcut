<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0"/>

    <title>@yield('title')| Casper</title>

    {{--<link rel="icon" href="../../images/favicon.png" sizes="24x24" />--}}
    <link rel="icon" href="{{asset('assets/images/favicon.png')}}" sizes="24x24"/>
    {{--<link rel="apple-touch-icon-precomposed" href="../../images/favicon.png" />--}}
    <link rel="apple-touch-icon-precomposed" href="{{asset('assets/images/favicon.png')}}"/>

    {{--<link rel="stylesheet" href="../../css/style.css" />--}}
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}"/>
    {{--<link rel="stylesheet" href="../../css/responsive.css" />--}}
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}"/>
    {{--<link href="../../css/tagify.css" rel="stylesheet" type="text/css">--}}
    <link href="{{asset('assets/css/tagify.css')}}" rel="stylesheet" type="text/css">

    <!-- jquery ui styles -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    {{--<script src="../../js/tagify.js"></script>--}}
    <script src="{{asset('assets/js/tagify.js')}}"></script>

    <!-- ROBOTO GOOG FONT -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">
    <!-- OPEN SANS GOOG FONT -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&display=swap" rel="stylesheet">


    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/froala-editor@3.0.6/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@3.0.6/js/froala_editor.pkgd.min.js"></script>


{{--    <!-- Styles -->--}}
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
{{--    <!-- Scripts -->--}}
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}
    @stack('cs')
    <style>
        td.badge-approved {
            border-top: 1px solid #00D68F !important;
        }
        td.badge-proposed  {
            border-top: 1px solid #8F9BB3 !important;
        }
        td.badge-In-active  {
            border-top: 1px solid #8F9BB3 !important;
        }
        td.badge-write  {
            border-top: 1px solid #222B45 !important;
        }
        td.badge-write  {
            border-top: 1px solid #222B45 !important;
        }
        td.badge-idea  {
            border-top: 1px solid #222B45 !important;
        }
    </style>
</head>
<body>
<style>
    .submitBtn{
        width: 118px;
        height: 40px;
        line-height: 40px;
        text-align: center;
        color: #FFFFFF;
        font-weight: bold;
        font-size: 14px;
        font-family: 'Open Sans', sans-serif;
        background: #3366FF;
        border-radius: 4px;
        cursor: pointer;
        margin-left: 1055px;
    }
    .customTheadTr th {
        border-bottom: 0px !important;
        border-top: 0px !important;
        color: #8F9BB3;
        padding-top: 20px;
        padding-bottom: 6px;
        font-family: 'Open Sans', sans-serif;
        font-weight: 600;
        font-size: 15px;
    }
    .customTrStyle > td {
        /*border: 0px !important;*/
        padding-bottom: 10px;
        font-size: 13px;
        font-weight: 600;
        /*color: #222B45;*/
        font-family: 'Open Sans', sans-serif;
    }
    .btn-group .dash-page-listactions{
        margin-top:4px !important;
    }
</style>
@include('theme.partials.nav')

<div class="dash-right">
    @include('theme.partials.head')

    @yield('content')
</div>
<script src="{{asset('js/jquery.toast.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/jquery.toast.css')}}">
<script>

  $(document).ready(function () {
    var previousActiveTabIndex = 0;

    $(".tab-switcher").on('click keypress', function (event) {
      // event.which === 13 means the "Enter" key is pressed

      if ((event.type === "keypress" && event.which === 13) || event.type === "click") {

        var tabClicked = $(this).data("tab-index");
        giveActive(tabClicked);
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

    function giveActive(index){
      console.log('fnc called');
      $('.c0').removeClass('active');
      $('.c1').removeClass('active');
      $('.c2').removeClass('active');
      $('.c'+index).addClass('active');
    }
  });
</script>
@if(\Session::has('status'))
    <script>
      $(function () {
        $.toast({
          heading: 'Information',
          text: '{{\Session::get('status')}}',
          icon: 'info',
          loader: true,        // Change it to false to disable loader
          loaderBg: '#9EC600',  // To change the background
          position: 'top-right'
        })
      })
    </script>
@endif
@if(\Session::has('error'))
    <script>
      $(function () {
        $.toast({
          heading: 'Information',
          text: '{{\Session::get('error')}}',
          icon: 'error',
          loader: true,        // Change it to false to disable loader
          loaderBg: '#9EC600',  // To change the background
          position: 'top-right'
        })
      })
    </script>
@endif
@if(\Session::has('success'))
    <script>
      $(function () {
        $.toast({
          heading: 'Information',
          text: '{{\Session::get('success')}}',
          icon: 'info',
          loader: true,        // Change it to false to disable loader
          loaderBg: '#9EC600',  // To change the background
          position: 'top-right'
        })
      })
    </script>
@endif
@stack('js')
</body>
</html>
