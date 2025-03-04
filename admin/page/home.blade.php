@extends('admin.start');

@section('content')
<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <!-- end page-header -->
    <!-- begin row -->
    <div class="row">
        <!-- begin col-3 -->
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-teal">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-globe fa-fw"></i></div>
                <div class="stats-content">
                    <div class="stats-title">Online All</div>
                    <div class="stats-number">{{$userOnline['allUser']->total}}</div>
                    <div class="stats-progress progress">
                        <div class="progress-bar" style="width: 70.1%;"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-teal">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-globe fa-fw"></i></div>
                <div class="stats-content">
                    <div class="stats-title">Provider Online</div>
                    <div class="stats-number">{{$userOnline['provider']->total}}</div>
                    <div class="stats-progress progress">
                        <div class="progress-bar" style="width: 70.1%;"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-teal">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-globe fa-fw"></i></div>
                <div class="stats-content">
                    <div class="stats-title">Client Online</div>
                    <div class="stats-number">{{$userOnline['client']->total}}</div>
                    <div class="stats-progress progress">
                        <div class="progress-bar" style="width: 70.1%;"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-teal">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-globe fa-fw"></i></div>
                <div class="stats-content">
                    <div class="stats-title">Guest Online</div>
                    <div class="stats-number">{{$userOnline['guest']->total}}</div>
                    <div class="stats-progress progress">
                        <div class="progress-bar" style="width: 70.1%;"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-teal">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-globe fa-fw"></i></div>
                <div class="stats-content">
                    <div class="stats-title">Buy bump</div>
                    <div class="stats-number">Today: {{$getBumpToDayBuy}} bumps</div>
                    <div class="stats-progress progress">
                        <div class="progress-bar" style="width: 100%;"></div>
                    </div>
                    <div class="stats-desc">All time: {{$getTotalBumpBuy}} bumps</div>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-dollar-sign fa-fw"></i></div>
                <div class="stats-content">
                    <div class="stats-title">Used bumps</div>
                    <div class="stats-number">Today: {{$bumpToDay}} bumps</div>
                    <div class="stats-progress progress">
                        <div class="progress-bar" style="width: 100%;"></div>
                    </div>
                    <div class="stats-desc">All time: {{$getTotalBump}} bumps</div>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-indigo">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-archive fa-fw"></i></div>
                <div class="stats-content">
                    <div class="stats-title">New Operations (Bump & USD)</div>
                    <div class="stats-number">{{$newOrders}}</div>
                    <div class="stats-progress progress">
                        <div class="progress-bar" style="width: 76.3%;"></div>
                    </div>
                    <div class="stats-desc">Better than last week (76.3%)</div>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-dark">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-comment-alt fa-fw"></i></div>
                <div class="stats-content">
                    <div class="stats-title">NEW COMMENTS</div>
                    <div class="stats-number">{{$totalCommetnToDay}}</div>
                    <div class="stats-progress progress">
                        <div class="progress-bar" style="width: 100%;"></div>
                    </div>
                    <div class="stats-desc">All time: {{$totalCommetnAllTime[0]->total}}</div>
                </div>
            </div>
        </div>
        <!-- end col-3 -->

        <!-- begin col-3 -->
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-dark">
                <div class="stats-icon stats-icon-lg"><i class="fa fa fa-dollar-sign fa-fw fa-fw"></i></div>
                <div class="stats-content">
                    <div class="stats-title">Payouts today</div>
                    <div class="stats-number">
                        Today: {{$totalPayToDay[0]->amount_usd}} USD ({{$totalPayToDay[0]->amount_btc}} BTC)
                    </div>
                    <div class="stats-progress progress">
                        <div class="progress-bar" style="width: 100%;"></div>
                    </div>
                    <div class="stats-desc">All time: {{$totalPay[0]->amount_usd}} USD ({{$totalPay[0]->amount_btc}} BTC)</div>
                </div>
            </div>
        </div>
        <!-- end col-3 -->



    </div>
    <!-- end row -->
    <!-- begin row -->
    <div class="row">
        <!-- begin col-8 -->
        <div class="col-xl-8">
            <div class="widget-chart with-sidebar inverse-mode">
                <div class="widget-chart-content bg-dark">
                    <h4 class="chart-title">
                        Visitors Analytics
                        <small>Where do our visitors come from</small>
                    </h4>
                    <div id="visitors-line-chart" class="widget-chart-full-width nvd3-inverse-mode" style="height: 260px;"></div>
                </div>
                <div class="widget-chart-sidebar bg-dark-darker">
                    <div class="chart-number">
                        1,225,729
                        <small>Total visitors</small>
                    </div>
                    <div class="flex-grow-1 d-flex align-items-center">
                        <div id="visitors-donut-chart" class="nvd3-inverse-mode" style="height: 180px"></div>
                    </div>
                    <ul class="chart-legend f-s-11">
                        <li><i class="fa fa-circle fa-fw text-blue f-s-9 m-r-5 t-minus-1"></i> 34.0% <span>New Visitors</span></li>
                        <li><i class="fa fa-circle fa-fw text-teal f-s-9 m-r-5 t-minus-1"></i> 56.0% <span>Return Visitors</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end col-8 -->
        <!-- begin col-4 -->
        <div class="col-xl-4">
            <div class="panel panel-inverse" data-sortable-id="index-1">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        Visitors Origin
                    </h4>
                </div>
                <div id="visitors-map" class="bg-dark-darker" style="height: 179px;"></div>
                <div class="list-group">
                    <a href="javascript:;" class="list-group-item list-group-item-action list-group-item-inverse d-flex justify-content-between align-items-center text-ellipsis">
                        1. United State
                        <span class="badge bg-teal f-s-10">20.95%</span>
                    </a>
                    <a href="javascript:;" class="list-group-item list-group-item-action list-group-item-inverse d-flex justify-content-between align-items-center text-ellipsis">
                        2. India
                        <span class="badge bg-blue f-s-10">16.12%</span>
                    </a>
                    <a href="javascript:;" class="list-group-item list-group-item-action list-group-item-inverse d-flex justify-content-between align-items-center text-ellipsis">
                        3. Mongolia
                        <span class="badge bg-silver-darker f-s-10">14.99%</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- end col-4 -->
        <div class="col-xl-12">
            <div class="panel panel-inverse">
                <!-- begin panel-heading -->
                <div class="panel-heading">
                    <h4 class="panel-title"></h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <!-- end panel-heading -->
                <!-- begin panel-body -->
                <div class="panel-body" style="overflow: auto">
                    <table id="data-table-default" class=" table-hover tableOrder  table table-striped table-bordered table-td-valign-middle">
                        <thead>
                        <tr>
                            <th width="1%">ID</th>
                            <th class="text-nowrap">Order ID</th>
                            <th class="text-nowrap">Date Create</th>
                            <th class="text-nowrap">Date Update</th>
                            <th class="text-nowrap">Login</th>
                            <th class="text-nowrap">Amount BTC</th>
                            <th class="text-nowrap">Amount USD</th>
                            <th class="text-nowrap">Ctatus</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($payment as $p)
                            <tr class="odd gradeX">
                                <td width="1%" class="f-s-600 text-inverse">{{$p->id}}</td>
                                <td width="1%" class="f-s-600 text-inverse">{{$p->order_id}}</td>
                                <td  class="text-center">{{$p->created_at}}</td>
                                <td  class="text-center">{{$p->updated_at}}</td>
                                <td>{{$p->name}}</td>
                                <td>{{$p->amount_btc}}</td>
                                <td>{{$p->amount_usd}}</td>
                                <td>@if($p->status_id == 1) Waiting @else Successfully @endif</td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- end panel-body -->
            </div>



        </div>
    </div>
    <!-- end row -->
    <!-- begin row -->
    <div class="row">
        <!-- begin col-4 -->
        <div class="col-xl-4 col-lg-6">
            <!-- begin panel -->
{{--            <div class="panel panel-inverse" data-sortable-id="index-2">--}}
{{--                <div class="panel-heading">--}}
{{--                    <h4 class="panel-title">Chat History</h4>--}}
{{--                    <span class="label label-teal">4 message</span>--}}
{{--                </div>--}}
{{--                <div class="panel-body bg-light">--}}
{{--                    <div class="chats" data-scrollbar="true" data-height="225px">--}}
{{--                        <div class="left">--}}
{{--                            <span class="date-time">yesterday 11:23pm</span>--}}
{{--                            <a href="javascript:;" class="name">Sowse Bawdy</a>--}}
{{--                            <a href="javascript:;" class="image"><img alt="" src="../assets/img/user/user-12.jpg" /></a>--}}
{{--                            <div class="message">--}}
{{--                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit volutpat. Praesent mattis interdum arcu eu feugiat.--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="right">--}}
{{--                            <span class="date-time">08:12am</span>--}}
{{--                            <a href="javascript:;" class="name"><span class="label label-primary">ADMIN</span> Me</a>--}}
{{--                            <a href="javascript:;" class="image"><img alt="" src="../assets/img/user/user-13.jpg" /></a>--}}
{{--                            <div class="message">--}}
{{--                                Nullam posuere, nisl a varius rhoncus, risus tellus hendrerit neque.--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="left">--}}
{{--                            <span class="date-time">09:20am</span>--}}
{{--                            <a href="javascript:;" class="name">Neck Jolly</a>--}}
{{--                            <a href="javascript:;" class="image"><img alt="" src="../assets/img/user/user-10.jpg" /></a>--}}
{{--                            <div class="message">--}}
{{--                                Euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="left">--}}
{{--                            <span class="date-time">11:15am</span>--}}
{{--                            <a href="javascript:;" class="name">Shag Strap</a>--}}
{{--                            <a href="javascript:;" class="image"><img alt="" src="../assets/img/user/user-14.jpg" /></a>--}}
{{--                            <div class="message">--}}
{{--                                Nullam iaculis pharetra pharetra. Proin sodales tristique sapien mattis placerat.--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="panel-footer">--}}
{{--                    <form name="send_message_form" data-id="message-form">--}}
{{--                        <div class="input-group">--}}
{{--                            <input type="text" class="form-control" name="message" placeholder="Enter your message here.">--}}
{{--                            <span class="input-group-append">--}}
{{--										<button class="btn btn-primary" type="button"><i class="fa fa-camera"></i></button>--}}
{{--										<button class="btn btn-primary" type="button"><i class="fa fa-link"></i></button>--}}
{{--									</span>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
            <!-- end panel -->
        </div>
        <!-- end col-4 -->
        <!-- begin col-4 -->

        <!-- end col-4 -->
        <!-- begin col-4 -->
        <div class="col-xl-12 col-lg-12">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <!-- begin panel-heading -->
                <div class="panel-heading">
                    <h4 class="panel-title"></h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <!-- end panel-heading -->
                <!-- begin panel-body -->
                <div class="panel-body" style="overflow: auto">
                    <table id="data-table-default" class=" table-hover tableOrder  table table-striped table-bordered table-td-valign-middle">
                        <thead>
                        <tr>
                            <th class="text-nowrap">User Type</th>
                            <th class="text-nowrap">Login</th>
                            <th class="text-nowrap">IP</th>
                            <th class="text-nowrap">Country Name</th>
                            <th class="text-nowrap">Country Code</th>
                            <th class="text-nowrap">Region Name</th>
                            <th class="text-nowrap">City Name</th>
                            <th class="text-nowrap">Zip Code</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($usersGeo as $user)
                            <tr>
                                <td width="1%" class="f-s-600 text-inverse">{{$user->userType}}</td>
                                <td width="1%" class="f-s-600 text-inverse">{{$user->name}}</td>
                                <td width="1%" class="f-s-600 text-inverse">{{$user->ip->ip}}</td>
                                <td width="1%" class="f-s-600 text-inverse">{{$user->ip->countryName}}</td>
                                <td width="1%" class="f-s-600 text-inverse">{{$user->ip->countryCode}}</td>
                                <td width="1%" class="f-s-600 text-inverse">{{$user->ip->regionName}}</td>
                                <td width="1%" class="f-s-600 text-inverse">{{$user->ip->cityName}}</td>
                                <td width="1%" class="f-s-600 text-inverse">{{$user->ip->zipCode}}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- end panel-body -->
            </div>


            <!-- end panel -->
        </div>
        <!-- end col-4 -->
    </div>
    <!-- end row -->
</div>
<!-- end #content -->
@endsection


