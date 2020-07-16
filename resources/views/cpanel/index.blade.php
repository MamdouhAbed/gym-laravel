@extends('cpanel.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/weather/css/weather-icons.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/widgets/payment.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/dashboard/tabbed-sidebar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/boraq/style.css')}}">

@stop

@section('content')
    <div class="column page">
        <div class="header">
            <section class="title-and-subtitle">
                <div class="title-block">
                    <h3 class="main-title">الرئيسية</h3>
                    <div class="sub-title">لوحة القيادة </div>
                </div>

                {{--<button class="btn btn-secondary-outline light no-text tabbed-sidebar-navigation-block-toggle" data-block-toggle=".dashboard-tabbed-sidebar-sidebar">--}}
                    {{--<span class="icon la la-bars"></span>--}}
                {{--</button>--}}
            </section>
        </div>

        <div class="content">
            <div class="body">
                <div class="dashboard-tabbed-sidebar">
                    <div class="dashboard-tabbed-sidebar-widgets">
                        <div class="row">
                            <style>
                                .card-widget .card-header{
                                    font-size: 16px;
                                }
                            </style>
                            <div class="col-xl-3">
                                <div class="card card-widget widget-payment-total-amount purple-light">
                                    <h5 class="card-header">
                                        إجمالي عدد المشتركين
                                    </h5>
                                    <div class="card-block">
                                        <div class="payment-total-amount-item-icon-block">
                                            <span class="la la-user icon"></span>
                                        </div>

                                        <div class="payment-total-amount-item-body">
                                            <div class="payment-total-amount-item-amount">
                                                <span class="amount">{{$total}}</span>
                                            </div>
                                            <div class="payment-total-amount-item-description">
                                                مشتركين فعالين
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(Auth::user()->role==1) <div class="col-xl-3">
                                <div class="card card-widget widget-payment-total-amount green-light">
                                    <h5 class="card-header">
                                        عدد المشتركين الذكور


                                    </h5>
                                    <div class="card-block">
                                        <div class="payment-total-amount-item-icon-block">
                                            <span class="la la-male icon"></span>
                                        </div>

                                        <div class="payment-total-amount-item-body">
                                            <div class="payment-total-amount-item-amount">
                                                <span class="amount">{{$male}}</span>
                                            </div>
                                            <div class="payment-total-amount-item-description">
                                                مشتركين فعالين ذكور
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>@endif
                            @if(Auth::user()->role==1)
                                <div class="col-xl-3">
                                <div class="card card-widget widget-payment-total-amount pink-light">
                                    <h5 class="card-header">
                                        عدد المشتركين الإناث


                                    </h5>
                                    <div class="card-block">
                                        <div class="payment-total-amount-item-icon-block">
                                            <span class="la la-female icon"></span>
                                        </div>

                                        <div class="payment-total-amount-item-body">
                                            <div class="payment-total-amount-item-amount">
                                                <span class="amount">{{$female}}</span>
                                            </div>
                                            <div class="payment-total-amount-item-description">
                                                مشتركين فعالين إناث
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="col-xl-3">
                                <div class="card card-widget widget-payment-total-amount orange-light">
                                    <h5 class="card-header">
                                        عدد المشتركين المنتهي تسجيلهم


                                    </h5>
                                    <div class="card-block">
                                        <div class="payment-total-amount-item-icon-block">
                                            <span class="la la-area-chart icon"></span>
                                        </div>

                                        <div class="payment-total-amount-item-body">
                                            <div class="payment-total-amount-item-amount">
                                                <span class="amount">{{$endreg}}</span>
                                            </div>
                                            <div class="payment-total-amount-item-description">
                                                فعالين لم يتم تجديد اشتراكهم
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(Auth::user()->role==1)
                        </div>

                        <div class="row">
                            @endif
                            <div class="col-lg-3">
                                <div class="card widget-payment-simple-amount-item purple" @if(Auth::user()->role==2) style="padding: 47px 20px;" @endif>
                                    <div class="payment-simple-amount-item-icon-block">
                                        <span class="la la-money icon"></span>
                                    </div>

                                    <div class="payment-simple-amount-item-body">
                                        <h5 style="margin-bottom: 5px">إجمالي المدفوعات الشهرية</h5>
                                        <div class="payment-simple-amount-item-amount">
                                            <span class="amount">{{$totalpaid}} <span style="font-size: 16px;font-weight: 400">شيكل</span></span>
                                            <span class="amount-icon icon-circled-up-right"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(Auth::user()->role==1) <div class="col-lg-3">
                                <div class="card widget-payment-simple-amount-item green">
                                    <div class="payment-simple-amount-item-icon-block">
                                        <span class="la la-male icon"></span>
                                    </div>

                                    <div class="payment-simple-amount-item-body">
                                        <h5 style="margin-bottom: 5px">المدفوعات الشهرية للذكور</h5>
                                        <div class="payment-simple-amount-item-amount">
                                            <span class="amount">{{$malepaid}} <span style="font-size: 16px;font-weight: 400">شيكل</span></span>
                                            <span class="amount-icon icon-circled-up-right"></span>
                                        </div>

                                    </div>
                                </div>
                            </div>@endif
                            @if(Auth::user()->role==1) <div class="col-lg-3">
                                <div class="card widget-payment-simple-amount-item pink">
                                    <div class="payment-simple-amount-item-icon-block">
                                        <span class="la la-female icon"></span>
                                    </div>

                                    <div class="payment-simple-amount-item-body">
                                        <h5 style="margin-bottom: 5px">المدفوعات الشهرية للإناث</h5>
                                        <div class="payment-simple-amount-item-amount">
                                            <span class="amount">{{$femalepaid}} <span style="font-size: 16px;font-weight: 400">شيكل</span></span>
                                            <span class="amount-icon icon-circled-up-right"></span>
                                        </div>

                                    </div>
                                </div>
                            </div>@endif
                            <div class="col-lg-3">
                                <div class="card widget-payment-simple-amount-item orange"  @if(Auth::user()->role==2) style="padding: 47px 20px;" @endif>
                                    <div class="payment-simple-amount-item-icon-block">
                                        <span class="la la-area-chart icon"></span>
                                    </div>

                                    <div class="payment-simple-amount-item-body">
                                        <h5 style="margin-bottom: 5px">إجمالي الديون المستحقة</h5>
                                        <div class="payment-simple-amount-item-amount">
                                            <span class="amount">{{$totalpaidremainder}} <span style="font-size: 16px;font-weight: 400">شيكل</span></span>
                                            <span class="amount-icon icon-circled-down-left"></span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card card-widget widget-table">
                                    <h5 class="card-header">
                                        آخر 5 مشتركين تم تسجيلهم

                                        <div class="controls">
                                            <a href="{{url('/players')}}" class="control-link">عرض كافة المشتركين</a>
                                        </div>
                                    </h5>
                                    <div class="card-block">
                                        <table class="table payment-table-invoicing">
                                            <tr>
                                                <th width="1">#</th>
                                                <th>اسم المشترك</th>
                                                @if(Auth::user()->role==1)<th>الجنس</th>@endif
                                                <th>جوال</th>
                                                <th>الحالة</th>
                                                <th>تاريخ التسجيل</th>
                                                <th>تاريخ انتهاء التسجيل</th>
                                            </tr>
                                            @foreach($players as $player)
                                                <tr>
                                                    <td>{{$player->id}}</td>
                                                    <td>{{$player->name}}</td>
                                                    @if(Auth::user()->role==1)
                                                        <td>{{$player->getCategory()->name}}</td>
                                                    @endif
                                                    <td>{{$player->phone}}</td>
                                                    <td><span class="@if($player->paid_id==1)badge badge-mantis @elseif($player->paid_id==2)badge badge-crusta @elseif($player->paid_id==3)badge badge-cranberry @endif">{{$player->getPaid()->name}} </span></td>
                                                    <td>{{ArabicDate2($player->reg_date)}}</td>
                                                    <td>{{ArabicDate2($player->reg_end_date)}}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(Auth::user()->role==1)
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="card widget-payment-simple-amount-item purple">
                                    <div class="payment-simple-amount-item-icon-block">
                                        <span class="la la-male icon"></span>
                                    </div>
                                    <div class="payment-simple-amount-item-body">
                                        <h5 style="margin-bottom: 5px">عدد المنتهي تسجيلهم ذكور</h5>
                                        <div class="payment-simple-amount-item-amount">
                                            <span class="amount">{{$endregmale}} <span style="font-size: 16px;font-weight: 400">مشترك</span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card widget-payment-simple-amount-item purple">
                                    <div class="payment-simple-amount-item-icon-block">
                                        <span class="la la-female icon"></span>
                                    </div>
                                    <div class="payment-simple-amount-item-body">
                                        <h5 style="margin-bottom: 5px">عدد المنتهي تسجيلهم إناث</h5>
                                        <div class="payment-simple-amount-item-amount">
                                            <span class="amount">{{$endregfemale}} <span style="font-size: 16px;font-weight: 400">مشترك</span></span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card widget-payment-simple-amount-item orange">
                                    <div class="payment-simple-amount-item-icon-block">
                                        <span class="la la-male icon"></span>
                                    </div>

                                    <div class="payment-simple-amount-item-body">
                                        <h5 style="margin-bottom: 5px">الديون المستحقة من الذكور</h5>
                                        <div class="payment-simple-amount-item-amount">
                                            <span class="amount">{{$paidremaindermale}} <span style="font-size: 16px;font-weight: 400">شيكل</span></span>
                                            <span class="amount-icon icon-circled-down-left"></span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card widget-payment-simple-amount-item orange">
                                    <div class="payment-simple-amount-item-icon-block">
                                        <span class="la la-female icon"></span>
                                    </div>

                                    <div class="payment-simple-amount-item-body">
                                        <h5 style="margin-bottom: 5px">الديون المستحقة من الإناث</h5>
                                        <div class="payment-simple-amount-item-amount">
                                            <span class="amount">{{$paidremainderfemale}} <span style="font-size: 16px;font-weight: 400">شيكل</span></span>
                                            <span class="amount-icon icon-circled-down-left"></span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif




                    </div>
                    {{--<div class="dashboard-tabbed-sidebar-sidebar">--}}
                        {{--<div class="tabs-container tabs-default tabs-with-separator tabs-header-default tabs-info">--}}
                            {{--<ul class="nav nav-tabs">--}}
                                {{--<li class="nav-item">--}}
                                    {{--<a class="nav-link active" href="#" data-toggle="tab" data-target="#tabbed-sidebar-activity">--}}
                                        {{--<span class="icon la la-flash">--}}
                                            {{--<span class="amount">3</span>--}}
                                        {{--</span>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li class="nav-item">--}}
                                    {{--<a class="nav-link" href="#" data-toggle="tab" data-target="#tabbed-sidebar-comments">--}}
                                        {{--<span class="icon la la-comments">--}}
                                            {{--<span class="amount">1</span>--}}
                                        {{--</span>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li class="nav-item">--}}
                                    {{--<a class="nav-link" href="#" data-toggle="tab" data-target="#tabbed-sidebar-posts">--}}
                                        {{--<span class="icon la la-book">--}}
                                            {{--<span class="amount">6</span>--}}
                                        {{--</span>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li class="nav-item">--}}
                                    {{--<a class="nav-link" href="#" data-toggle="tab" data-target="#tabbed-sidebar-favourites">--}}
                                        {{--<span class="icon la la-star-o">--}}
                                            {{--<span class="amount">4</span>--}}
                                        {{--</span>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                            {{--<div class="tab-content">--}}
                                {{--<div class="tab-pane active" id="tabbed-sidebar-activity" role="tabpanel">--}}
                                    {{--<div class="tab-pane-content">--}}
                                        {{--<div class="tabbed-sidebar-activity">--}}
                                            {{--<div class="tabbed-sidebar-tab-content-header">--}}
                                                {{--<h5>نشاطات المستخدمين</h5>--}}
                                                {{--<div class="input-icon icon-left icon icon-lg icon-color-primary">--}}
                                                    {{--<input id="input-group-icon-text" type="text" class="form-control" placeholder="بحث">--}}
                                                    {{--<span class="icon-addon">--}}
                                                        {{--<span class="la la-search"></span>--}}
                                                    {{--</span>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}

                                            {{--<div class="tabbed-sidebar-activity-items scrollable" data-auto-height>--}}
                                                {{--<div class="tabbed-sidebar-activity-item activity-item-status-active">--}}
                                                    {{--<div class="action-wrapper">--}}
                                                        {{--<img src="assets/img/avatars/avatar-6.jpg" alt="" class="avatar rounded-circle" width="25" height="25">--}}
                                                        {{--<a href="#" class="action-message">Hi, What you think about new deal</a>--}}
                                                    {{--</div>--}}
                                                    {{--<span class="badge badge-primary sm">New</span>--}}
                                                {{--</div>--}}
                                                {{--<div class="tabbed-sidebar-activity-item activity-item-status-active">--}}
                                                    {{--<div class="action-wrapper">--}}
                                                        {{--<img src="assets/img/avatars/avatar-11.jpg" alt="" class="avatar rounded-circle" width="25" height="25">--}}
                                                        {{--<a href="#" class="action-message">Hi, What you think about new deal</a>--}}
                                                    {{--</div>--}}
                                                    {{--<span class="badge badge-success sm">Completed</span>--}}
                                                {{--</div>--}}
                                                {{--<div class="tabbed-sidebar-activity-item activity-item-status-active">--}}
                                                    {{--<div class="action-wrapper">--}}
                                                        {{--<span class="action-icon">--}}
                                                            {{--<span class="la la-star color-warning icon"></span>--}}
                                                        {{--</span>--}}
                                                        {{--<a href="#" class="action-message">GOOG:US, 300 @ 145.32 opportunity</a>--}}
                                                    {{--</div>--}}
                                                    {{--<span class="badge badge-danger sm">Canceled</span>--}}
                                                {{--</div>--}}
                                                {{--<div class="tabbed-sidebar-activity-item">--}}
                                                    {{--<div class="action-wrapper">--}}
                                                        {{--<span class="action-icon">--}}
                                                            {{--<span class="la la-check color-success icon"></span>--}}
                                                        {{--</span>--}}
                                                        {{--<a href="#" class="action-message">Filled — Forson Inc. — 300 — $5,600</a>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="tabbed-sidebar-activity-item">--}}
                                                    {{--<div class="action-wrapper">--}}
                                                        {{--<span class="action-icon">--}}
                                                            {{--<span class="la la-check color-success icon"></span>--}}
                                                        {{--</span>--}}
                                                        {{--<a href="#" class="action-message">Filled — Marta Skyson — 2000 — $34,600</a>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="tabbed-sidebar-activity-item">--}}
                                                    {{--<div class="action-wrapper">--}}
                                                        {{--<img src="assets/img/avatars/avatar-5.jpg" alt="" class="avatar rounded-circle" width="25" height="25">--}}
                                                        {{--<a href="#" class="action-message">Hi, What you think about new deal</a>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="tabbed-sidebar-activity-item">--}}
                                                    {{--<div class="action-wrapper">--}}
                                                        {{--<span class="action-icon">--}}
                                                            {{--<span class="la la-flash icon"></span>--}}
                                                        {{--</span>--}}
                                                        {{--<a href="#" class="action-message">Gold (-1,22%), estimated 3% loss</a>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="tabbed-sidebar-activity-item">--}}
                                                    {{--<div class="action-wrapper">--}}
                                                        {{--<span class="action-icon">--}}
                                                            {{--<span class="la la-star color-warning icon"></span>--}}
                                                        {{--</span>--}}
                                                        {{--<a href="#" class="action-message">Samsung Note 7 Users Urged to Turn Phone</a>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="tabbed-sidebar-activity-item">--}}
                                                    {{--<div class="action-wrapper">--}}
                                                        {{--<span class="action-icon">--}}
                                                            {{--<span class="la la-plus-circle color-info icon"></span>--}}
                                                        {{--</span>--}}
                                                        {{--<a href="#" class="action-message">New — Shell Inc. — 120 — $5600</a>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="tabbed-sidebar-activity-item">--}}
                                                    {{--<div class="action-wrapper">--}}
                                                        {{--<img src="assets/img/avatars/avatar-2.jpg" alt="" class="avatar rounded-circle" width="25" height="25">--}}
                                                        {{--<a href="#" class="action-message">Hi Konstantin, Sent you quarter report</a>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="tabbed-sidebar-activity-item">--}}
                                                    {{--<div class="action-wrapper">--}}
                                                        {{--<span class="action-icon">--}}
                                                            {{--<span class="la la-star color-pink icon"></span>--}}
                                                        {{--</span>--}}
                                                        {{--<a href="#" class="action-message">Asset Reporting Lored</a>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="tabbed-sidebar-activity-item">--}}
                                                    {{--<div class="action-wrapper">--}}
                                                        {{--<span class="action-icon">--}}
                                                            {{--<span class="la la-archive color-gray icon"></span>--}}
                                                        {{--</span>--}}
                                                        {{--<a href="#" class="action-message">Gold (-1,22%), estimated 3% loss</a>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="tabbed-sidebar-activity-item">--}}
                                                    {{--<div class="action-wrapper">--}}
                                                        {{--<span class="action-icon">--}}
                                                            {{--<span class="la la-calendar color-info icon"></span>--}}
                                                        {{--</span>--}}
                                                        {{--<a href="#" class="action-message">Gold (-1,22%), estimated 3% loss</a>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="tabbed-sidebar-activity-item">--}}
                                                    {{--<div class="action-wrapper">--}}
                                                        {{--<span class="action-icon">--}}
                                                            {{--<span class="la la-plus-circle color-info icon"></span>--}}
                                                        {{--</span>--}}
                                                        {{--<a href="#" class="action-message">New — Shell Inc. — 120 — $5600</a>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="tabbed-sidebar-activity-item">--}}
                                                    {{--<div class="action-wrapper">--}}
                                                        {{--<img src="assets/img/avatars/avatar-3.jpg" alt="" class="avatar rounded-circle" width="25" height="25">--}}
                                                        {{--<a href="#" class="action-message">Hi Konstantin, Sent you quarter report</a>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="tabbed-sidebar-activity-item">--}}
                                                    {{--<div class="action-wrapper">--}}
                                                        {{--<span class="action-icon">--}}
                                                            {{--<span class="la la-star color-pink icon"></span>--}}
                                                        {{--</span>--}}
                                                        {{--<a href="#" class="action-message">Asset Reporting Lored</a>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="tabbed-sidebar-activity-item">--}}
                                                    {{--<div class="action-wrapper">--}}
                                                        {{--<span class="action-icon">--}}
                                                            {{--<span class="la la-archive color-gray icon"></span>--}}
                                                        {{--</span>--}}
                                                        {{--<a href="#" class="action-message">Gold (-1,22%), estimated 3% loss</a>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="tabbed-sidebar-activity-item">--}}
                                                    {{--<div class="action-wrapper">--}}
                                                        {{--<span class="action-icon">--}}
                                                            {{--<span class="la la-calendar color-info icon"></span>--}}
                                                        {{--</span>--}}
                                                        {{--<a href="#" class="action-message">Gold (-1,22%), estimated 3% loss</a>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="tabbed-sidebar-activity-item">--}}
                                                    {{--<div class="action-wrapper">--}}
                                                        {{--<span class="action-icon">--}}
                                                            {{--<span class="la la-plus-circle color-success icon"></span>--}}
                                                        {{--</span>--}}
                                                        {{--<a href="#" class="action-message">New — Shell Inc. — 120 — $5600</a>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="tabbed-sidebar-activity-item">--}}
                                                    {{--<div class="action-wrapper">--}}
                                                        {{--<img src="assets/img/avatars/avatar-8.jpg" alt="" class="avatar rounded-circle" width="25" height="25">--}}
                                                        {{--<a href="#" class="action-message">Hi Konstantin, Sent you quarter report</a>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="tabbed-sidebar-activity-item">--}}
                                                    {{--<div class="action-wrapper">--}}
                                                        {{--<span class="action-icon">--}}
                                                            {{--<span class="la la-bookmark-o color-danger icon"></span>--}}
                                                        {{--</span>--}}
                                                        {{--<a href="#" class="action-message">Asset Reporting Lored</a>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="tabbed-sidebar-activity-item">--}}
                                                    {{--<div class="action-wrapper">--}}
                                                        {{--<span class="action-icon">--}}
                                                            {{--<span class="la la-archive color-gray icon"></span>--}}
                                                        {{--</span>--}}
                                                        {{--<a href="#" class="action-message">Gold (-1,22%), estimated 3% loss</a>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="tabbed-sidebar-activity-item">--}}
                                                    {{--<div class="action-wrapper">--}}
                                                        {{--<span class="action-icon">--}}
                                                            {{--<span class="la la-calendar color-info icon"></span>--}}
                                                        {{--</span>--}}
                                                        {{--<a href="#" class="action-message">Gold (-1,22%), estimated 3% loss</a>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="tab-pane" id="tabbed-sidebar-comments" role="tabpanel">--}}
                                    {{--<div class="tab-pane-content">--}}
                                        {{--<div class="tabbed-sidebar-comments">--}}
                                            {{--<div class="tabbed-sidebar-tab-content-header">--}}
                                                {{--<h5>Comments</h5>--}}
                                                {{--<div class="input-icon icon-right icon icon-lg icon-color-primary">--}}
                                                    {{--<input type="text" class="form-control" placeholder="Search">--}}
                                                    {{--<span class="icon-addon">--}}
                                                        {{--<span class="la la-search"></span>--}}
                                                    {{--</span>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}

                                            {{--<div class="tabbed-sidebar-comment-items scrollable" data-auto-height>--}}
                                                {{--<div class="tabbed-sidebar-comment-item">--}}
                                                    {{--<div class="tabbed-sidebar-comment-action">--}}
                                                        {{--<img src="assets/img/avatars/avatar-3.jpg" class="avatar" width="25" height="25">--}}
                                                        {{--<div class="action">--}}
                                                            {{--<a href="#" class="name">Matthew Arnold</a>--}}
                                                            {{--<span class="description">added a new task to the project <a href="#" class="color-info">Website redesign</a></span>--}}

                                                            {{--<div class="datetime">--}}
                                                                {{--September 18, 2016 at 12:38 PM--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="tabbed-sidebar-comment-item-message">--}}
                                                        {{--Perhaps you'll take me out one day - or do I have to make an appointment?--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="tabbed-sidebar-comment-item">--}}
                                                    {{--<div class="tabbed-sidebar-comment-action">--}}
                                                        {{--<img src="assets/img/avatars/avatar-4.jpg" class="avatar" width="25" height="25">--}}
                                                        {{--<div class="action">--}}
                                                            {{--<a href="#" class="name">Rachel Matthews</a>--}}
                                                            {{--<span class="description">leave a comment <a href="#" class="color-info">Lake Hall Beer and Pizza</a></span>--}}

                                                            {{--<div class="datetime">--}}
                                                                {{--September 26, 2016 at 19:25 PM--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="tabbed-sidebar-comment-item-message">--}}
                                                        {{--It had to end sometime. Apple’s incredible growth that saw the company report record quarterly earnings over a span of 13 years was untenable.--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="tabbed-sidebar-comment-item">--}}
                                                    {{--<div class="tabbed-sidebar-comment-action">--}}
                                                        {{--<img src="assets/img/avatars/avatar-10.jpg" class="avatar" width="25" height="25">--}}
                                                        {{--<div class="action">--}}
                                                            {{--<a href="#" class="name">Marilyn Fox</a>--}}
                                                            {{--<span class="description">leave a comment <a href="#" class="color-info">Sample Post</a></span>--}}

                                                            {{--<div class="datetime">--}}
                                                                {{--September 17, 2016 at 11:00 PM--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="tabbed-sidebar-comment-item-message">--}}
                                                        {{--Perhaps you'll take me out one day - or do I have to make an appointment?--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="tabbed-sidebar-comment-item">--}}
                                                    {{--<div class="tabbed-sidebar-comment-action">--}}
                                                        {{--<img src="assets/img/avatars/avatar-3.jpg" class="avatar" width="25" height="25">--}}
                                                        {{--<div class="action">--}}
                                                            {{--<a href="#" class="name">Matthew Arnold</a>--}}
                                                            {{--<span class="description">added a new task to the project <a href="#" class="color-info">Website redesign</a></span>--}}

                                                            {{--<div class="datetime">--}}
                                                                {{--September 18, 2016 at 12:38 PM--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="tabbed-sidebar-comment-item-message">--}}
                                                        {{--Perhaps you'll take me out one day - or do I have to make an appointment?--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="tabbed-sidebar-comment-item">--}}
                                                    {{--<div class="tabbed-sidebar-comment-action">--}}
                                                        {{--<img src="assets/img/avatars/avatar-3.jpg" class="avatar" width="25" height="25">--}}
                                                        {{--<div class="action">--}}
                                                            {{--<a href="#" class="name">Matthew Arnold</a>--}}
                                                            {{--<span class="description">added a new task to the project <a href="#" class="color-info">Website redesign</a></span>--}}

                                                            {{--<div class="datetime">--}}
                                                                {{--September 18, 2016 at 12:38 PM--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="tabbed-sidebar-comment-item-message">--}}
                                                        {{--Perhaps you'll take me out one day - or do I have to make an appointment?--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="tabbed-sidebar-comment-item">--}}
                                                    {{--<div class="tabbed-sidebar-comment-action">--}}
                                                        {{--<img src="assets/img/avatars/avatar-3.jpg" class="avatar" width="25" height="25">--}}
                                                        {{--<div class="action">--}}
                                                            {{--<a href="#" class="name">Matthew Arnold</a>--}}
                                                            {{--<span class="description">added a new task to the project <a href="#" class="color-info">Website redesign</a></span>--}}

                                                            {{--<div class="datetime">--}}
                                                                {{--September 18, 2016 at 12:38 PM--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="tabbed-sidebar-comment-item-message">--}}
                                                        {{--Perhaps you'll take me out one day - or do I have to make an appointment?--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="tabbed-sidebar-comment-item">--}}
                                                    {{--<div class="tabbed-sidebar-comment-action">--}}
                                                        {{--<img src="assets/img/avatars/avatar-3.jpg" class="avatar" width="25" height="25">--}}
                                                        {{--<div class="action">--}}
                                                            {{--<a href="#" class="name">Matthew Arnold</a>--}}
                                                            {{--<span class="description">added a new task to the project <a href="#" class="color-info">Website redesign</a></span>--}}

                                                            {{--<div class="datetime">--}}
                                                                {{--September 18, 2016 at 12:38 PM--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="tabbed-sidebar-comment-item-message">--}}
                                                        {{--Perhaps you'll take me out one day - or do I have to make an appointment?--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="tabbed-sidebar-comment-item">--}}
                                                    {{--<div class="tabbed-sidebar-comment-action">--}}
                                                        {{--<img src="assets/img/avatars/avatar-3.jpg" class="avatar" width="25" height="25">--}}
                                                        {{--<div class="action">--}}
                                                            {{--<a href="#" class="name">Matthew Arnold</a>--}}
                                                            {{--<span class="description">added a new task to the project <a href="#" class="color-info">Website redesign</a></span>--}}

                                                            {{--<div class="datetime">--}}
                                                                {{--September 18, 2016 at 12:38 PM--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="tabbed-sidebar-comment-item-message">--}}
                                                        {{--Perhaps you'll take me out one day - or do I have to make an appointment?--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="tabbed-sidebar-comment-item">--}}
                                                    {{--<div class="tabbed-sidebar-comment-action">--}}
                                                        {{--<img src="assets/img/avatars/avatar-3.jpg" class="avatar" width="25" height="25">--}}
                                                        {{--<div class="action">--}}
                                                            {{--<a href="#" class="name">Matthew Arnold</a>--}}
                                                            {{--<span class="description">added a new task to the project <a href="#" class="color-info">Website redesign</a></span>--}}

                                                            {{--<div class="datetime">--}}
                                                                {{--September 18, 2016 at 12:38 PM--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="tabbed-sidebar-comment-item-message">--}}
                                                        {{--Perhaps you'll take me out one day - or do I have to make an appointment?--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class="tab-pane" id="tabbed-sidebar-posts" role="tabpanel">--}}
                                    {{--<div class="tab-pane-content">--}}
                                        {{--<div class="tabbed-sidebar-posts">--}}
                                            {{--<div class="tabbed-sidebar-tab-content-header">--}}
                                                {{--<h5>Posts</h5>--}}
                                                {{--<div class="input-icon icon-right icon icon-lg icon-color-primary">--}}
                                                    {{--<input type="text" class="form-control" placeholder="Search">--}}
                                                    {{--<span class="icon-addon">--}}
                                                        {{--<span class="la la-search"></span>--}}
                                                    {{--</span>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}

                                            {{--<div class="tabbed-sidebar-post-items scrollable" data-auto-height>--}}
                                                {{--<a href="#" class="tabbed-sidebar-post-item">--}}
                                                    {{--<img src="assets/img/thumbs/ph-1.png" alt="" class="thumb" width="36" height="36">--}}
                                                    {{--<span href="#" class="description">--}}
                                                        {{--<span class="name">Road trip essentials</span>--}}
                                                        {{--<span class="extra-info">--}}
                                                            {{--<span class="amount-block">1200 views</span>--}}
                                                            {{--<span class="amount-block">34 comments</span>--}}
                                                        {{--</span>--}}
                                                    {{--</span>--}}
                                                {{--</a>--}}
                                                {{--<a href="#" class="tabbed-sidebar-post-item">--}}
                                                    {{--<img src="assets/img/thumbs/ph-2.png" alt="" class="thumb" width="36" height="36">--}}
                                                    {{--<span href="#" class="description">--}}
                                                        {{--<span class="name">Road trip essentials</span>--}}
                                                        {{--<span class="extra-info">--}}
                                                            {{--<span class="amount-block">1200 views</span>--}}
                                                            {{--<span class="amount-block">34 comments</span>--}}
                                                        {{--</span>--}}
                                                    {{--</span>--}}
                                                {{--</a>--}}
                                                {{--<a href="#" class="tabbed-sidebar-post-item">--}}
                                                    {{--<img src="assets/img/thumbs/ph-3.png" alt="" class="thumb" width="36" height="36">--}}
                                                    {{--<span href="#" class="description">--}}
                                                        {{--<span class="name">Road trip essentials</span>--}}
                                                        {{--<span class="extra-info">--}}
                                                            {{--<span class="amount-block">1200 views</span>--}}
                                                            {{--<span class="amount-block">34 comments</span>--}}
                                                        {{--</span>--}}
                                                    {{--</span>--}}
                                                {{--</a>--}}
                                                {{--<a href="#" class="tabbed-sidebar-post-item">--}}
                                                    {{--<img src="assets/img/thumbs/ph-4.png" alt="" class="thumb" width="36" height="36">--}}
                                                    {{--<span href="#" class="description">--}}
                                                        {{--<span class="name">Road trip essentials</span>--}}
                                                        {{--<span class="extra-info">--}}
                                                            {{--<span class="amount-block">1200 views</span>--}}
                                                            {{--<span class="amount-block">34 comments</span>--}}
                                                        {{--</span>--}}
                                                    {{--</span>--}}
                                                {{--</a>--}}
                                                {{--<a href="#" class="tabbed-sidebar-post-item">--}}
                                                    {{--<img src="assets/img/thumbs/ph-5.png" alt="" class="thumb" width="36" height="36">--}}
                                                    {{--<span href="#" class="description">--}}
                                                        {{--<span class="name">Road trip essentials</span>--}}
                                                        {{--<span class="extra-info">--}}
                                                            {{--<span class="amount-block">1200 views</span>--}}
                                                            {{--<span class="amount-block">34 comments</span>--}}
                                                        {{--</span>--}}
                                                    {{--</span>--}}
                                                {{--</a>--}}
                                                {{--<a href="#" class="tabbed-sidebar-post-item">--}}
                                                    {{--<img src="assets/img/thumbs/ph-1.png" alt="" class="thumb" width="36" height="36">--}}
                                                    {{--<span href="#" class="description">--}}
                                                        {{--<span class="name">Road trip essentials</span>--}}
                                                        {{--<span class="extra-info">--}}
                                                            {{--<span class="amount-block">1200 views</span>--}}
                                                            {{--<span class="amount-block">34 comments</span>--}}
                                                        {{--</span>--}}
                                                    {{--</span>--}}
                                                {{--</a>--}}
                                                {{--<a href="#" class="tabbed-sidebar-post-item">--}}
                                                    {{--<img src="assets/img/thumbs/ph-1.png" alt="" class="thumb" width="36" height="36">--}}
                                                    {{--<span href="#" class="description">--}}
                                                        {{--<span class="name">Road trip essentials</span>--}}
                                                        {{--<span class="extra-info">--}}
                                                            {{--<span class="amount-block">1200 views</span>--}}
                                                            {{--<span class="amount-block">34 comments</span>--}}
                                                        {{--</span>--}}
                                                    {{--</span>--}}
                                                {{--</a>--}}
                                                {{--<a href="#" class="tabbed-sidebar-post-item">--}}
                                                    {{--<img src="assets/img/thumbs/ph-1.png" alt="" class="thumb" width="36" height="36">--}}
                                                    {{--<span href="#" class="description">--}}
                                                        {{--<span class="name">Road trip essentials</span>--}}
                                                        {{--<span class="extra-info">--}}
                                                            {{--<span class="amount-block">1200 views</span>--}}
                                                            {{--<span class="amount-block">34 comments</span>--}}
                                                        {{--</span>--}}
                                                    {{--</span>--}}
                                                {{--</a>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="tab-pane" id="tabbed-sidebar-favourites" role="tabpanel">--}}
                                    {{--<div class="tab-pane-content">--}}
                                        {{--<div class="tabbed-sidebar-favourites">--}}
                                            {{--<div class="tabbed-sidebar-tab-content-header">--}}
                                                {{--<h5>Favourites</h5>--}}
                                                {{--<div class="input-icon icon-right icon icon-lg icon-color-primary">--}}
                                                    {{--<input type="text" class="form-control" placeholder="Search">--}}
                                                    {{--<span class="icon-addon">--}}
                                                        {{--<span class="la la-search"></span>--}}
                                                    {{--</span>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}

                                            {{--<div class="tabbed-sidebar-favourites-items scrollable" data-auto-height>--}}
                                                {{--<a href="#" class="tabbed-sidebar-favourite-item">--}}
                                                    {{--<img src="assets/img/thumbs/ph-1.png" alt="" class="thumb" width="36" height="36">--}}
                                                    {{--<span href="#" class="description">--}}
                                                        {{--<span class="name">Road trip essentials</span>--}}
                                                        {{--<span class="extra-info">--}}
                                                            {{--<span class="amount-block">1200 views</span>--}}
                                                            {{--<span class="amount-block">34 comments</span>--}}
                                                        {{--</span>--}}
                                                    {{--</span>--}}

                                                    {{--<button class="btn btn-primary-outline light no-text remove">--}}
                                                        {{--<span class="la la-trash-o icon"></span>--}}
                                                    {{--</button>--}}
                                                {{--</a>--}}
                                                {{--<a href="#" class="tabbed-sidebar-favourite-item">--}}
                                                    {{--<span class="action-icon action-file">--}}
                                                        {{--<span class="la la-file-word-o color-info icon"></span>--}}
                                                    {{--</span>--}}
                                                    {{--<span href="#" class="description">--}}
                                                        {{--<span class="name">annual_report_2016.docx</span>--}}
                                                        {{--<span class="extra-info">--}}
                                                            {{--<span class="amount-block">156 KB</span>--}}
                                                        {{--</span>--}}
                                                    {{--</span>--}}

                                                    {{--<button class="btn btn-primary-outline light no-text remove">--}}
                                                        {{--<span class="la la-trash-o icon"></span>--}}
                                                    {{--</button>--}}
                                                {{--</a>--}}
                                                {{--<a href="#" class="tabbed-sidebar-favourite-item">--}}
                                                    {{--<span class="action-icon action-file">--}}
                                                        {{--<span class="la la-file-pdf-o color-danger icon"></span>--}}
                                                    {{--</span>--}}
                                                    {{--<span href="#" class="description">--}}
                                                        {{--<span class="name">certificate.pdf</span>--}}
                                                        {{--<span class="extra-info">--}}
                                                            {{--<span class="amount-block">88 KB</span>--}}
                                                        {{--</span>--}}
                                                    {{--</span>--}}

                                                    {{--<button class="btn btn-primary-outline light no-text remove">--}}
                                                        {{--<span class="la la-trash-o icon"></span>--}}
                                                    {{--</button>--}}
                                                {{--</a>--}}
                                                {{--<a href="#" class="tabbed-sidebar-favourite-item">--}}
                                                    {{--<img src="assets/img/avatars/avatar-7.jpg" alt="" class="avatar" width="36" height="36">--}}
                                                    {{--<span href="#" class="description">--}}
                                                        {{--<span class="name">Barbara Curtis</span>--}}
                                                        {{--<span class="extra-info">Product Manager</span>--}}
                                                    {{--</span>--}}

                                                    {{--<button class="btn btn-primary-outline light no-text remove">--}}
                                                        {{--<span class="la la-trash-o icon"></span>--}}
                                                    {{--</button>--}}
                                                {{--</a>--}}
                                                {{--<a href="#" class="tabbed-sidebar-favourite-item">--}}
                                                    {{--<span class="action-icon">--}}
                                                        {{--<span class="la la-link icon"></span>--}}
                                                    {{--</span>--}}
                                                    {{--<span href="#" class="description">--}}
                                                        {{--<span class="name">The Verge</span>--}}
                                                        {{--<span class="extra-info color-info">HTTP://www.theverge.com</span>--}}
                                                    {{--</span>--}}

                                                    {{--<button class="btn btn-primary-outline light no-text remove">--}}
                                                        {{--<span class="la la-trash-o icon"></span>--}}
                                                    {{--</button>--}}
                                                {{--</a>--}}
                                                {{--<a href="#" class="tabbed-sidebar-favourite-item">--}}
                                                    {{--<img src="assets/img/thumbs/ph-3.png" alt="" class="thumb" width="36" height="36">--}}
                                                    {{--<span href="#" class="description">--}}
                                                        {{--<span class="name">Road trip essentials</span>--}}
                                                        {{--<span class="extra-info">--}}
                                                            {{--<span class="amount-block">1200 views</span>--}}
                                                            {{--<span class="amount-block">34 comments</span>--}}
                                                        {{--</span>--}}
                                                    {{--</span>--}}

                                                    {{--<button class="btn btn-primary-outline light no-text remove">--}}
                                                        {{--<span class="la la-trash-o icon"></span>--}}
                                                    {{--</button>--}}
                                                {{--</a>--}}
                                                {{--<a href="#" class="tabbed-sidebar-favourite-item">--}}
                                                    {{--<span class="action-icon action-file">--}}
                                                        {{--<span class="la la-file-word-o color-info icon"></span>--}}
                                                    {{--</span>--}}
                                                    {{--<span href="#" class="description">--}}
                                                        {{--<span class="name">annual_report_2016.docx</span>--}}
                                                        {{--<span class="extra-info">--}}
                                                            {{--<span class="amount-block">156 KB</span>--}}
                                                        {{--</span>--}}
                                                    {{--</span>--}}

                                                    {{--<button class="btn btn-primary-outline light no-text remove">--}}
                                                        {{--<span class="la la-trash-o icon"></span>--}}
                                                    {{--</button>--}}
                                                {{--</a>--}}
                                                {{--<a href="#" class="tabbed-sidebar-favourite-item">--}}
                                                    {{--<span class="action-icon action-file">--}}
                                                        {{--<span class="la la-file-pdf-o color-danger icon"></span>--}}
                                                    {{--</span>--}}
                                                    {{--<span href="#" class="description">--}}
                                                        {{--<span class="name">certificate.pdf</span>--}}
                                                        {{--<span class="extra-info">--}}
                                                            {{--<span class="amount-block">88 KB</span>--}}
                                                        {{--</span>--}}
                                                    {{--</span>--}}

                                                    {{--<button class="btn btn-primary-outline light no-text remove">--}}
                                                        {{--<span class="la la-trash-o icon"></span>--}}
                                                    {{--</button>--}}
                                                {{--</a>--}}
                                                {{--<a href="#" class="tabbed-sidebar-favourite-item">--}}
                                                    {{--<img src="assets/img/avatars/avatar-7.jpg" alt="" class="avatar" width="36" height="36">--}}
                                                    {{--<span href="#" class="description">--}}
                                                        {{--<span class="name">Barbara Curtis</span>--}}
                                                        {{--<span class="extra-info">Product Manager</span>--}}
                                                    {{--</span>--}}

                                                    {{--<button class="btn btn-primary-outline light no-text remove">--}}
                                                        {{--<span class="la la-trash-o icon"></span>--}}
                                                    {{--</button>--}}
                                                {{--</a>--}}
                                                {{--<a href="#" class="tabbed-sidebar-favourite-item">--}}
                                                    {{--<span class="action-icon">--}}
                                                        {{--<span class="la la-link icon"></span>--}}
                                                    {{--</span>--}}
                                                    {{--<span href="#" class="description">--}}
                                                        {{--<span class="name">The Verge</span>--}}
                                                        {{--<span class="extra-info color-info">HTTP://www.theverge.com</span>--}}
                                                    {{--</span>--}}

                                                    {{--<button class="btn btn-primary-outline light no-text remove">--}}
                                                        {{--<span class="la la-trash-o icon"></span>--}}
                                                    {{--</button>--}}
                                                {{--</a>--}}
                                                {{--<a href="#" class="tabbed-sidebar-favourite-item">--}}
                                                    {{--<img src="assets/img/thumbs/ph-2.png" alt="" class="thumb" width="36" height="36">--}}
                                                    {{--<span href="#" class="description">--}}
                                                        {{--<span class="name">Road trip essentials</span>--}}
                                                        {{--<span class="extra-info">--}}
                                                            {{--<span class="amount-block">1200 views</span>--}}
                                                            {{--<span class="amount-block">34 comments</span>--}}
                                                        {{--</span>--}}
                                                    {{--</span>--}}

                                                    {{--<button class="btn btn-primary-outline light no-text remove">--}}
                                                        {{--<span class="la la-trash-o icon"></span>--}}
                                                    {{--</button>--}}
                                                {{--</a>--}}
                                                {{--<a href="#" class="tabbed-sidebar-favourite-item">--}}
                                                    {{--<span class="action-icon action-file">--}}
                                                        {{--<span class="la la-file-word-o color-info icon"></span>--}}
                                                    {{--</span>--}}
                                                    {{--<span href="#" class="description">--}}
                                                        {{--<span class="name">annual_report_2016.docx</span>--}}
                                                        {{--<span class="extra-info">--}}
                                                            {{--<span class="amount-block">156 KB</span>--}}
                                                        {{--</span>--}}
                                                    {{--</span>--}}

                                                    {{--<button class="btn btn-primary-outline light no-text remove">--}}
                                                        {{--<span class="la la-trash-o icon"></span>--}}
                                                    {{--</button>--}}
                                                {{--</a>--}}
                                                {{--<a href="#" class="tabbed-sidebar-favourite-item">--}}
                                                    {{--<span class="action-icon action-file">--}}
                                                        {{--<span class="la la-file-pdf-o color-danger icon"></span>--}}
                                                    {{--</span>--}}
                                                    {{--<span href="#" class="description">--}}
                                                        {{--<span class="name">certificate.pdf</span>--}}
                                                        {{--<span class="extra-info">--}}
                                                            {{--<span class="amount-block">88 KB</span>--}}
                                                        {{--</span>--}}
                                                    {{--</span>--}}

                                                    {{--<button class="btn btn-primary-outline light no-text remove">--}}
                                                        {{--<span class="la la-trash-o icon"></span>--}}
                                                    {{--</button>--}}
                                                {{--</a>--}}
                                                {{--<a href="#" class="tabbed-sidebar-favourite-item">--}}
                                                    {{--<img src="assets/img/avatars/avatar-7.jpg" alt="" class="avatar" width="36" height="36">--}}
                                                    {{--<span href="#" class="description">--}}
                                                        {{--<span class="name">Barbara Curtis</span>--}}
                                                        {{--<span class="extra-info">Product Manager</span>--}}
                                                    {{--</span>--}}

                                                    {{--<button class="btn btn-primary-outline light no-text remove">--}}
                                                        {{--<span class="la la-trash-o icon"></span>--}}
                                                    {{--</button>--}}
                                                {{--</a>--}}
                                                {{--<a href="#" class="tabbed-sidebar-favourite-item">--}}
                                                    {{--<span class="action-icon">--}}
                                                        {{--<span class="la la-link icon"></span>--}}
                                                    {{--</span>--}}
                                                    {{--<span href="#" class="description">--}}
                                                        {{--<span class="name">The Verge</span>--}}
                                                        {{--<span class="extra-info color-info">HTTP://www.theverge.com</span>--}}
                                                    {{--</span>--}}

                                                    {{--<button class="btn btn-primary-outline light no-text remove">--}}
                                                        {{--<span class="la la-trash-o icon"></span>--}}
                                                    {{--</button>--}}
                                                {{--</a>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')

    <script src="{{ asset('libs/d3/d3.min.js')}}"></script>
    <script src="{{ asset('libs/maplace/maplace.min.js')}}"></script>
    <script src="https://maps.google.com/maps/api/js?libraries=geometry&v=3.26&key=AIzaSyBBjLDxcCjc4s9ngpR11uwBWXRhyp3KPYM"></script>
    <script type="application/javascript">
        (function ($) {
            $(document).ready(function () {
                c3.generate({
                    bindto: '#next-payout-chart',
                    data: {
                        columns: [
                            ['data1', 6, 5, 6, 5, 7, 8, 7]
                        ],
                        types: {
                            data1: 'area'
                        },
                        colors: {
                            data1: '#81c159'
                        }
                    },
                    legend: {
                        show: false
                    },
                    tooltip: {
                        show: false
                    },
                    point: {
                        show: false
                    },
                    axis: {
                        x: {show: false},
                        y: {show: false}
                    }
                });

                c3.generate({
                    bindto: '#total-earning-chart',
                    data: {
                        columns: [
                            ['data1', 6, 5, 6, 5, 7, 8, 7]
                        ],
                        types: {
                            data1: 'area'
                        },
                        colors: {
                            data1: '#4e54a8'
                        }
                    },
                    legend: {
                        show: false
                    },
                    tooltip: {
                        show: false
                    },
                    point: {
                        show: false
                    },
                    axis: {
                        x: {show: false},
                        y: {show: false}
                    }
                });

                c3.generate({
                    bindto: '.chart-orders-block',
                    data: {
                        columns: [
                            ['Revenue', 150, 200, 220, 280, 400, 160, 260, 400, 300, 400, 500, 420, 500, 300, 200, 100, 400, 600, 300, 360, 600],
                            ['Profit', 350, 300, 200, 140, 200, 30, 200, 100, 400, 600, 300, 200, 100, 50, 200, 600, 300, 500, 30, 200, 320]
                        ],
                        colors: {
                            'Revenue': '#f88528',
                            'Profit': '#81c159'
                        }
                    },
                    point: {
                        r: 5
                    },
                    grid: {
                        y: {
                            show: true
                        }
                    }
                });


                @if (session()->has('flash_notification.success'))
                        setTimeout(function () {
                        new Noty({
                            text: '<strong>مرحباً بك يا {{Auth::user()->name}} في لوحة التحكم </strong>! <br> تم دخولك بنجاح.',
                            type: 'information',
                            theme: 'mint',
                            layout: 'topLeft',
                            timeout: 3000
                        }).show();
                    }, 1500);
                 @endif

                var maplace = new Maplace({
                    map_div: '#payment-widget-table-and-map-map',
                    controls_on_map: false
                });
                maplace.Load();

            });
        })(jQuery);
    </script>
@stop
