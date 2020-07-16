<!DOCTYPE html>
<html lang="en">

<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8">
    <title>{{$title}}</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="@if(\App\Settings::first()->img!=null){{asset(\App\Settings::first()->img)}} @else {{asset('uploads/logo/logo-defult.png')}} @endif" type="image/x-icon">

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('libs/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('libs/bootstrap/css/bootstrap-rtl.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/line-awesome/css/line-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/open-sans/styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/dinnext/styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/boraq/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('libs/tether/css/tether.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('libs/jscrollpane/jquery.jscrollpane.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('libs/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/common.min.css')}}">

    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN THEME STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/themes/primary.min.css')}}">
    <link class="sidebar-dark-style" rel="stylesheet" type="text/css" href="{{ asset('assets/styles/themes/sidebar-black.min.css')}}">
    <!-- END THEME STYLES -->

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/kosmo/styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('libs/izi-modal/css/iziModal.min.css')}}"> <!-- Original -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/libs/izi-modal/izi-modal.min.css')}}"> <!-- Original -->
    <link rel="stylesheet" type="text/css" href="{{ asset('libs/c3js/c3.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('libs/noty/noty.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/widgets/panels.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('libs/bootstrap-touchspin/jquery.bootstrap-touchspin.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/libs/touchspin/touchspin.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('libs/sweetalert/sweetalert.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/libs/sweetalert/sweetalert.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('libs/select2/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/libs/select2/select2.min.css')}}">
    {{--    <link rel="stylesheet" type="text/css" href="{{ asset('libs/prism/prism.css')}}"> <!-- original -->--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('libs/flatpickr/flatpickr.min.css')}}"> <!-- original -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/libs/flatpickr/flatpickr.min.css')}}"> <!-- customization -->
    <script src="{{ asset('libs/jquery/jquery.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>

    @yield('css')
</head>
<!-- END HEAD -->

<body class="navbar-fixed sidebar-sections sidebar-position-fixed page-header-fixed theme-primary page-loading"> <!-- remove page-header-fixed to unfix header -->

<!-- BEGIN HEADER -->
<nav class="navbar navbar">
    <!-- BEGIN HEADER INNER -->
    <!-- BEGIN LOGO -->
    <div href="index.html" class="navbar-brand">
        <!-- BEGIN RESPONSIVE SIDEBAR TOGGLER -->
        <a href="#" class="sidebar-toggle"><i class="icon la la-bars" aria-hidden="true"></i></a>
        <a href="#" class="sidebar-mobile-toggle"><i class="icon la la-bars" aria-hidden="true"></i></a>
        <!-- END RESPONSIVE SIDEBAR TOGGLER -->

        <div class="navbar-logo">
            <a href="{{url('/')}}" class="logo">{{\App\Settings::first()->name}}</a>

            {{--<span class="nav-item dropdown dropdown-grid-images">--}}
                {{--<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"></a>--}}
                {{--<div class="dropdown-menu info scrollable" aria-labelledby="Preview" data-height="260">--}}
                    {{--<div class="scroll-wrapper">--}}
                        {{--<a href="#" class="grid-item">--}}
                            {{--<img class="icon" src="{{asset('assets/img/menu-grid/dashboard.png')}}">--}}
                            {{--<span class="text">الرئيسية</span>--}}
                        {{--</a>--}}
                        {{--<a href="#" class="grid-item">--}}
                            {{--<img class="icon" src="{{asset('assets/img/menu-grid/flask.png')}}">--}}
                            {{--<span class="text">Projects</span>--}}
                        {{--</a>--}}
                        {{--<a href="#" class="grid-item">--}}
                            {{--<img class="icon" src="{{asset('assets/img/menu-grid/calendar.png')}}">--}}
                            {{--<span class="text">Calendar</span>--}}
                        {{--</a>--}}
                        {{--<a href="#" class="grid-item">--}}
                            {{--<img class="icon" src="{{asset('assets/img/menu-grid/profile.png')}}">--}}
                            {{--<span class="text">Profile</span>--}}
                        {{--</a>--}}
                        {{--<a href="#" class="grid-item">--}}
                            {{--<img class="icon" src="{{asset('assets/img/menu-grid/ticket.png')}}">--}}
                            {{--<span class="text">Tickets</span>--}}
                        {{--</a>--}}
                        {{--<a href="#" class="grid-item">--}}
                            {{--<img class="icon" src="{{asset('assets/img/menu-grid/settings.png')}}">--}}
                            {{--<span class="text">Settings</span>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</span>--}}

            <!-- END GRID NAVIGATION -->
        </div>
    </div>
    <!-- END LOGO -->

    <!-- BEGIN MENUS -->
    <div class="wrapper">
        <nav class="nav navbar-nav">
            <!-- BEGIN NAVBAR MENU -->
            <div class="navbar-menu">
                {{--<form class="search-form">--}}
                    {{--<a class="search-open" href="#">--}}
                        {{--<span class="la la-search"></span>--}}
                    {{--</a>--}}
                    {{--<div class="wrapper">--}}
                        {{--<div class="input-icon icon-right icon icon-lg icon-color-primary">--}}
                            {{--<input id="input-group-icon-text" type="text" class="form-control" placeholder="بحث...">--}}
                            {{--<span class="icon-addon">--}}
                                {{--<span class="la la-search icon"></span>--}}
                            {{--</span>--}}
                        {{--</div>--}}
                        {{--<a class="search-close" href="#">--}}
                            {{--<span class="la la-close"></span>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</form>--}}
                <a class="nav-item nav-link" href="{{url('/')}}">الرئيسية</a>
                <a class="nav-item nav-link btn-danger add_player" href="{{url('/addplayers')}}">إضافة مشترك جديد</a>
                <a class="nav-item nav-link" href="{{url('/players')}}">قائمة المشتركين</a>

            </div>
            <!-- END NAVBAR MENU -->

            <!-- BEGIN NAVBAR ACTIONS -->
            <div class="navbar-actions">


                <!-- BEGIN NAVBAR MESSAGES -->
                {{--<div class="nav-item dropdown messages">--}}
                    {{--<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">--}}
                        {{--<span class="la la-envelope icon" aria-hidden="true">--}}
                            {{--<span class="badge badge-pill badge-info">3</span>--}}
                        {{--</span>--}}
                        {{--<span class="text">Messages</span>--}}
                    {{--</a>--}}
                    {{--<div class="dropdown-menu dropdown-menu-left" aria-labelledby="Preview">--}}
                        {{--<section class="tabs-actions">--}}
                            {{--<a href="#"><i class="la la-plus icon"></i></a>--}}
                            {{--<a href="#"><i class="la la-search icon"></i></a>--}}
                        {{--</section>--}}
                        {{--<ul class="nav nav-tabs nav-tabs info" role="tablist">--}}
                            {{--<li class="nav-item">--}}
                                {{--<a class="nav-link active" href="#" data-toggle="tab" data-target="#navbar-messages-inbox" role="tab">Inbox</a>--}}
                            {{--</li>--}}
                            {{--<li class="nav-item">--}}
                                {{--<a class="nav-link" href="#" data-toggle="tab" data-target="#navbar-messages-sent" role="tab">Sent</a>--}}
                            {{--</li>--}}
                            {{--<li class="nav-item">--}}
                                {{--<a class="nav-link" href="#" data-toggle="tab" data-target="#navbar-messages-archive" role="tab">Archive</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                        {{--<div class="tab-content">--}}
                            {{--<div class="tab-pane messages-tab active" id="navbar-messages-inbox" role="tabpanel">--}}
                                {{--<div class="wrapper scrollable">--}}
                                    {{--<a href="#" class="message">--}}
                                        {{--<div class="avatar online">--}}
                                            {{--<img src="{{asset('assets/img/avatars/avatar-1.jpg')}}" width="36" height="36">--}}
                                        {{--</div>--}}
                                        {{--<div class="info">--}}
                                            {{--<div class="user-name">Emily Carter</div>--}}
                                            {{--<div class="text">In golf, Danny Willett (pictured) wins the M...</div>--}}
                                            {{--<div class="datetime">1 minute ago</div>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                    {{--<a href="#" class="message">--}}
                                        {{--<div class="avatar online">--}}
                                            {{--<img src="{{asset('assets/img/avatars/avatar-5.jpg')}}" width="36" height="36">--}}
                                        {{--</div>--}}
                                        {{--<div class="info">--}}
                                            {{--<div class="user-name">Emily Carter</div>--}}
                                            {{--<div class="text">In golf, Danny Willett (pictured) wins the M...</div>--}}
                                            {{--<div class="datetime">1 minute ago</div>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                    {{--<a href="#" class="message">--}}
                                        {{--<div class="avatar offline">--}}
                                            {{--<img src="{{asset('assets/img/avatars/placeholders/ava-36.png')}}" width="36" height="36">--}}
                                        {{--</div>--}}
                                        {{--<div class="info">--}}
                                            {{--<div class="user-name">Emily Carter</div>--}}
                                            {{--<div class="text">In golf, Danny Willett (pictured) wins the M...</div>--}}
                                            {{--<div class="datetime">1 minute ago</div>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                    {{--<a href="#" class="message">--}}
                                        {{--<div class="avatar offline">--}}
                                            {{--<img src="{{asset('assets/img/avatars/avatar-4.jpg')}}" width="36" height="36">--}}
                                        {{--</div>--}}
                                        {{--<div class="info">--}}
                                            {{--<div class="user-name">Emily Carter</div>--}}
                                            {{--<div class="text">In golf, Danny Willett (pictured) wins the M...</div>--}}
                                            {{--<div class="datetime">1 minute ago</div>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                                {{--<div class="view-all">--}}
                                    {{--<a href="#">View all</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="tab-pane empty" id="navbar-messages-sent" role="tabpanel">--}}
                                {{--There are no messages.--}}
                            {{--</div>--}}
                            {{--<div class="tab-pane empty" id="navbar-messages-archive" role="tabpanel">--}}
                                {{--There are no messages.--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <!-- END NAVBAR MESSAGES -->

                <!-- BEGIN NAVBAR NOTIFICATIONS -->
                {{--<div class="nav-item dropdown notifications">--}}
                    {{--<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">--}}
                        {{--<span class="la la-bell icon" aria-hidden="true">--}}
                            {{--<span class="badge badge-pill badge-info">7</span>--}}
                        {{--</span>--}}
                        {{--<span class="text">Notifications</span>--}}
                    {{--</a>--}}
                    {{--<div class="dropdown-menu dropdown-menu-left" aria-labelledby="Preview">--}}
                        {{--<ul class="nav nav-tabs nav-tabs info" role="tablist">--}}
                            {{--<li class="nav-item">--}}
                                {{--<a class="nav-link active" href="#" data-toggle="tab" data-target="#navbar-notifications-all" role="tab">All</a>--}}
                            {{--</li>--}}
                            {{--<li class="nav-item">--}}
                                {{--<a class="nav-link" href="#" data-toggle="tab" data-target="#navbar-notifications-activity" role="tab">Activity</a>--}}
                            {{--</li>--}}
                            {{--<li class="nav-item">--}}
                                {{--<a class="nav-link" href="#" data-toggle="tab" data-target="#navbar-notifications-comments" role="tab">Comments</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                        {{--<div class="tab-content">--}}
                            {{--<div class="tab-pane notifications-tab active" id="navbar-notifications-all" role="tabpanel">--}}
                                {{--<div class="wrapper scrollable">--}}
                                    {{--<a href="#" class="notification">--}}
                                        {{--<div class="avatar">--}}
                                            {{--<img src="{{asset('assets/img/avatars/avatar-3.jpg')}}" width="36" height="36">--}}
                                        {{--</div>--}}
                                        {{--<div class="info">--}}
                                            {{--<div class="user-name">Emily Carter <span class="description">has uploaded 1 file</span></div>--}}
                                            {{--<div class="text"><span class="la la-file-text-o icon"></span> logo vector doc</div>--}}
                                            {{--<div class="datetime">1 minute ago</div>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                    {{--<a href="#" class="notification">--}}
                                        {{--<div class="action">--}}
                                            {{--<span class="default">--}}
                                                {{--<span class="la la-briefcase icon"></span>--}}
                                            {{--</span>--}}
                                        {{--</div>--}}
                                        {{--<div class="info">--}}
                                            {{--<div class="user-name">New project created</div>--}}
                                            {{--<div class="text">Dashboard UI</div>--}}
                                            {{--<div class="datetime">1 minute ago</div>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                    {{--<a href="#" class="notification">--}}
                                        {{--<div class="action">--}}
                                            {{--<span class="error">--}}
                                                {{--<span class="la la-times-circle icon"></span>--}}
                                            {{--</span>--}}
                                        {{--</div>--}}
                                        {{--<div class="info">--}}
                                            {{--<div class="user-name">File upload error</div>--}}
                                            {{--<div class="text"><span class="la la-file-text-o icon"></span> logo vector doc</div>--}}
                                            {{--<div class="datetime">10 minutes ago</div>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</div>--}}

                                {{--<div class="view-all">--}}
                                    {{--<a href="#">Show more</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="tab-pane empty" id="navbar-notifications-activity" role="tabpanel">--}}
                                {{--There are no activities.--}}
                            {{--</div>--}}
                            {{--<div class="tab-pane empty" id="navbar-notifications-comments" role="tabpanel">--}}
                                {{--There are no comments.--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <!-- END NAVBAR NOTIFICATIONS -->

                <!-- BEGIN NAVBAR USER -->
                <div class="nav-item dropdown user">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="avatar">
                            <img src="{{asset('')}}thumb.php?src={{Auth::user()->img }}&size=36x36" >
                        </span>
                        <span class="info">
                            <span class="name"> {{Auth::user()->name}}</span>
                            <span class="description">@if(Auth::user()->role==1) مدير @else مشرف @endif</span>
                        </span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="Preview">
                        {{--<a class="dropdown-item" href="#">--}}
                            {{--<span class="la la-user icon"></span>--}}
                            {{--<span>الصفحة الشخصية</span>--}}
                        {{--</a>--}}
                        {{--<a class="dropdown-item" href="{{asset('cpanel/updateInformation/')}}">--}}
                            {{--<span class="la la-wrench icon" aria-hidden="true"></span>--}}
                            {{--<span> تعديل بياناتي</span>--}}
                        {{--</a>--}}
                        {{--<a class="dropdown-item" href="#">--}}
                            {{--<span class="la la-question-circle icon" aria-hidden="true"></span>--}}
                            {{--<span>مساعدة</span>--}}
                        {{--</a>--}}
                        <a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <span class="la la-sign-out icon" aria-hidden="true"></span>
                            <span> تسجيل الخروج
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form></span>
                        </a>
                    </div>
                </div>
                <!-- END NAVBAR USER -->
            </div>
            <!-- END NAVBAR ACTIONS -->
        </nav>

        <!-- BEGIN NAVBAR ACTIONS TOGGLER -->
        <nav class="nav navbar-nav navbar-actions-toggle">
            <a class="nav-item nav-link" href="#">
                <span class="la la-ellipsis-h icon open"></span>
                <span class="la la-close icon close"></span>
            </a>
        </nav>
        <!-- END NAVBAR ACTIONS TOGGLER -->

        <!-- BEGIN NAVBAR MENU TOGGLER -->
        <nav class="nav navbar-nav navbar-menu-toggle">
            <a class="nav-item nav-link" href="#">
                <span class="la la-th icon open"></span>
                <span class="la la-close icon close"></span>
            </a>
        </nav>
        <!-- END NAVBAR MENU TOGGLER -->
    </div>
    <!-- END MENUS -->
    <!-- END HEADER INNER -->
</nav>
<!-- END HEADER -->

<div class="page-container dashboard-tabbed-sidebar-fixed-tabs">

    <!-- BEGIN DEFAULT SIDEBAR -->
    <div class="column sidebar info">
        <div class="wrapper">
            <section>
                {{--<h5 class="header">Main</h5>--}}
                <ul class="nav nav-pills nav-stacked">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/')}}">
                            <span class="icon la la-home"></span>
                            <span>الرئيسية</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/addplayers')}}"><span class="icon la la-user-plus"></span><span>إضافة مشترك جديد</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle"  href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="icon la la-newspaper-o"></span>
                            <span>قائمة المشتركين</span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" style="border-bottom:1px solid #434950 !important;" href="{{url('/players')}}">كافة المشتركين</a>
                            @if(Auth::user()->role==1)<a class="dropdown-item" style="border-bottom:1px solid #434950 !important;" href="{{url('/maleplayers')}}">المشتركين الذكور</a>@endif
                            @if(Auth::user()->role==1)<a class="dropdown-item" style="border-bottom:1px solid #434950 !important;" href="{{url('/femaleplayers')}}">المشتركين الإناث</a>@endif
                            <a class="dropdown-item" style="border-bottom:1px solid #434950 !important;" href="{{url('/endregplayers')}}">المشتركين المنتهي تسجيلهم</a>
                            <a class="dropdown-item" style="border-bottom:1px solid #434950 !important;" href="{{url('/todayplayers')}}">المشتركين المسجلين اليوم</a>
                            <a class="dropdown-item" style="border-bottom:1px solid #434950 !important;" href="{{url('/publishedplayers')}}">المشتركين الفعالين</a>
                            <a class="dropdown-item" style="border-bottom:1px solid #434950 !important;" href="{{url('/nopublishplayers')}}">المشتركين الغير فعالين</a>
                            <a class="dropdown-item" style="border-bottom:1px solid #434950 !important;" href="{{url('/deletedplayers')}}">سلة المهملات</a>

                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/updatesettings')}}"><span class="icon la la-cog"></span><span>الإعدادات</span></a>
                    </li>

                </ul>
            </section>
        </div>
    </div>
    <!-- END DEFAULT SIDEBAR -->

    @yield('content')


</div>



<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ asset('libs/responsejs/response.min.js')}}"></script>
<script src="{{ asset('libs/loading-overlay/loadingoverlay.min.js')}}"></script>
<script src="{{ asset('libs/tether/js/tether.min.js')}}"></script>
<script src="{{ asset('libs/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('libs/jscrollpane/jquery.jscrollpane.min.js')}}"></script>
<script src="{{ asset('libs/jscrollpane/jquery.mousewheel.js')}}"></script>
<script src="{{ asset('libs/flexibility/flexibility.js')}}"></script>
<script src="{{ asset('libs/noty/noty.min.js')}}"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{ asset('assets/scripts/common.min.js')}}"></script>
<script src="{{ asset('libs/sweetalert/sweetalert.min.js')}}"></script>
<!-- END THEME LAYOUT SCRIPTS -->

<script src="{{ asset('libs/c3js/c3.min.js')}}"></script>
<script src="{{ asset('libs/noty/noty.min.js')}}"></script>
<script src="{{ asset('libs/izi-modal/js/iziModal.min.js')}}"></script>
<script src="{{ asset('libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>
<script src="{{ asset('libs/select2/js/select2.min.js')}}"></script>
<script src="{{ asset('libs/flatpickr/flatpickr.min.js')}}"></script>
{{--    <script src="{{ asset('libs/prism/prism.js')}}"></script>--}}
<script type="application/javascript">
    (function ($) {
        $(document).ready(function() {
            $('.flatpickr').flatpickr();
        });
    })(jQuery);
</script>
<script>
    (function ($) {
        $(document).ready(function() {
            $('#touchspin-vertical-buttons').TouchSpin({
                verticalbuttons: true,
                verticalupclass: 'la la-plus',
                verticaldownclass: 'la la-minus',
                min: 1,
                max: 30
            });

            $('#touchspin-button').TouchSpin({
                postfix: "button",
                postfix_extraclass: "btn btn-default"

            });
        });
    })(jQuery);
</script>


@yield('js')

<div class="mobile-overlay"></div>
</body>
</html>
</div>
<!-- / main menu-->

















<!-- ////////////////////////////////////////////////////////////////////////////-->
