@extends('layouts.app')

@section('content')
    <body><!-- Mind class names -->

    <!-- Alpha -->
    <!--<div class="log_widget" id="log">

        <h1>Log</h1>
        <div class="data" id="alpha_clients" style="margin-bottom: 20px;"></div>
        <div class="data" id="alpha_data"></div>

    </div>-->
    <!-- end Alpha -->




    <!-- Main Container -->
    <div class="rw-main-container">

        <!-- Left Panel - Main Navigation -->
        <div class="rw-left-panel hidden-print">

            <!-- Navigation -->
            <nav class="navbar rw-navbar-static-left" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse-main">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}">BeActive</a>
                </div><!-- end .nav-header -->
                <div class="navbar-collapse collapse navbar-collapse-main">

                    <div class="rw-panel">

                        <!-- Dashboard Menu -->
                        <ul class="nav nav-stacked rw-front card active">
                            <li>
                                <a href="{{ url('/home') }}"><span class="glyphicon glyphicon-home"></span>Dashboard</a>
                            </li>
                            <li data-active="user-statistics" class="active">
                                <a href="{{ url('/home/statistics') }}"><span class="glyphicon glyphicon-signal"></span>Statistika</a>
                            </li>
                            <li>
                                <a href="{{ url('/home/application') }}"><span class="glyphicon glyphicon-phone"></span>Mobilna aplikacija</a>
                            </li>
                            <li>
                                <a href="{{ url('/home/pictures') }}"><span class="glyphicon glyphicon-picture"></span>Slike</a>
                            </li>
                            <li>
                                <a href="{{ url('/home/messages') }}"><span class="glyphicon glyphicon-envelope"></span>Sporočila</a>
                            </li>
                            <li>
                                <a href="{{ url('/home/facebook') }}"><span class="glyphicon glyphicon-folder-open"></span>FB Objave</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="no-ajax">
                                    <span class="glyphicon glyphicon-log-out"></span>Odjava
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                            <li class="visible-xs"><!-- Small screen only -->
                                <a href="#" class="no-ajax"><span class="glyphicon glyphicon-cog"></span>Nastavitve</a>
                            </li>
                            <li class="visible-xs">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="no-ajax">
                                    <span class="glyphicon glyphicon-off"></span>Sign Out
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>

                        <!-- Settings Menu -->
                        <ul class="nav nav-stacked rw-back card">
                            <li data-active="user-settings"><!-- Active item has class .active on li element -->
                                <a href="#"><span class="glyphicon glyphicon-cog"></span>Nastavitve</a>
                                <ul class="nav">
                                    <li data-activex="user-settings"><a href="#"><span class="dot"></span>Bank Account</a></li><!-- Active item has class .active on li element -->
                                    <li data-activex="user-settings-change-password"><a href="#"><span class="dot"></span>Change Password</a></li>
                                    <li data-activex="user-settings-notifications"><a href="#"><span class="dot"></span>Notifications</a></li>
                                    <li data-activex="user-settings-deactivate"><a href="#"><span class="dot"></span>Deactivate Account</a></li>
                                </ul>
                            </li>
                            <li data-active="user-security">
                                <a href="#"><span class="glyphicon glyphicon-lock"></span>Security</a>
                                <ul class="nav">
                                    <li data-activex="user-security"><a href="#"><span class="dot"></span>Two-factor Authentication</a></li>
                                    <li data-activex="user-security-email-confirmations"><a href="#"><span class="dot"></span>E-mail Confirmations</a></li>
                                    <li data-activex="user-security-api-access"><a href="#"><span class="dot"></span>API Access</a></li>
                                </ul>
                            </li>
                            <li class="visible-xs"><!-- Small screen only -->
                                <a href="{{ route('settings') }}" class="no-ajax"><span class="glyphicon glyphicon-home"></span>Nastavitve</a>
                            </li>
                        </ul>

                    </div><!-- end .panel -->

                </div><!-- end .navbar-collapse -->
            </nav>
            <!-- end Navigation -->

            <!-- Footer -->
            <div class="footer hidden-xs"><!-- This is hidden on small devices -->
                <!-- Footer Navigation -->
                <div class="rw-footer-navigation">
                    <ul>
                        <li class="settings"><a href="{{ route('settings') }}" data-toggle="tooltip" data-placement="top" title="Settings" id="settings-nav-trigger"><span class="glyphicon glyphicon-cog"></span>Nastavitve</a></li>
                        <li class="dashboard rw-hide"><a id="dashboard-nav-trigger" data-toggle="tooltip" data-placement="top" title="Dashboard"><span class="glyphicon glyphicon-home"></span>Dashboard</a></li>
                    </ul>
                </div>
                <!-- end Footer Navigation -->
            </div>
            <!-- end Footer -->

        </div>
        <!-- end Left Panel - Main Navigation -->


        <!-- Right Panel - Main Content -->
        <div class="rw-right-panel">

            <!-- Main Header -->
            @include('layouts.company_header', ['page' => 'Statistika'])
            <!-- end Main Header -->

            <!-- Main Container -->
            <div class="rw-container" id="frame"><!-- use .rw-container instead of .container on private_template -->


                <!-- Dashboard Container -->
                <div class="rw-dashboard-container dashboard-main clearfix">

                    <div class="row">
                        <div class="col-md-4">
                            <ul class="dashboard-list">
                                <li>
                                    <span class="title">Statistics</span>
                                </li>
                            </ul>
                            <!--<a href="#" class="btn btn-lg btn-primary ajax">Withdraw</a>-->
                        </div>
                        <!--<div class="col-md-4">
                            <ul class="dashboard-list">
                                <li>
                                    <span class="title">Account ID</span>
                                    <span class="value">795236548</span>
                                </li>
                                <li>
                                    <span class="title">Last Payment</span>
                                    <span class="value">2 days ago</span>
                                </li>
                            </ul>
                            <a href="#" class="btn btn-lg btn-primary ajax">Create invoice</a>
                        </div>
                        <div class="col-md-4">
                            <div class="circle-graph-wrap">
                                <div class="circle-value">24</div>
                                <div id="payments-circle" class="circle-graph"></div>
                                <h2>Total Payments <span>Last week</span></h2>
                                <ul>
                                    <li>
                                        <span class="value blue" data-value="null">12</span>
                                        <span class="name">completed</span>
                                    </li>
                                    <li>
                                        <span class="value magenta" data-value="null">6</span>
                                        <span class="name">canceled</span>
                                    </li>
                                    <li>
                                        <span class="value green" data-value="null">6</span>
                                        <span class="name">active</span>
                                    </li>
                                </ul>
                            </div>
                            <a href="#" class="btn btn-lg btn-primary ajax">Payments</a>
                        </div>-->
                    </div>

                    <!--<header class="clearfix">
                        <h1>Payments Chart <span class="small">Last week</span></h1>

                        <div class="right clearfix"><a href="#" class="btn btn-link ajax">Go to statistics</a></div>
                    </header>

                    <div class="chart-container">
                        <div class="loading">Loading chart...</div>
                        <div id="chart-dashboard" class="chart"></div>
                    </div>-->

                </div>
                <!-- end Dashboard Container -->


                <!-- Right -->
                <!--<div class="dashboard-messages">

                    <ul class="rw-messages">
                        <li class="magenta">
                            <a href="#?id=1" class="ajax">
                                <span class="dot"><span></span></span>
                                <div class="body">
                                    <span class="title">Payment canceled</span>
                                    <span class="value">100.00 USD</span>
                                </div>
                                <span class="time ago" data-timer="0" title="Wed Feb 19 2014 04:30:30 GMT+0100 (Central Europe Standard Time)">?</span>
                            </a>
                        </li>
                        <li class="green">
                            <a href="#?id=1" class="ajax">
                                <span class="dot"><span></span></span>
                                <div class="body">
                                    <span class="title">Payment active</span>
                                    <span class="value">100.00 USD</span>
                                </div>
                                <span class="time ago" data-timer="100" title="Wed Feb 19 2014 04:30:30 GMT+0100 (Central Europe Standard Time)">?</span>
                            </a>
                        </li>
                        <li class="blue">
                            <a href="#?id=1" class="ajax">
                                <span class="dot"><span></span></span>
                                <div class="body">
                                    <span class="title">Payment completed</span>
                                    <span class="value">100.00 USD</span>
                                </div>
                                <span class="time ago" data-timer="100" title="Wed Feb 19 2014 04:30:30 GMT+0100 (Central Europe Standard Time)">?</span>
                            </a>
                        </li>
                        <li class="black">
                            <a href="#?id=1" class="ajax">
                                <span class="dot"><span></span></span>
                                <div class="body">
                                    <span class="title">Withdrawal Active</span>
                                    <span class="value">100.00 USD</span>
                                </div>
                                <span class="time ago" data-timer="100" title="Wed Feb 19 2014 04:30:30 GMT+0100 (Central Europe Standard Time)">?</span>
                            </a>
                        </li>
                        <li class="orange">
                            <a href="#?id=1" class="ajax">
                                <span class="dot"><span></span></span>
                                <div class="body">
                                    <span class="title">Support</span>
                                    <span class="value">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi viverra non arcu et pellentesque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi viverra non arcu et pellentesque. </span>
                                </div>
                                <span class="time ago" data-timer="100" title="Wed Feb 19 2014 04:30:30 GMT+0100 (Central Europe Standard Time)">?</span>
                            </a>
                        </li>
                    </ul>

                    <div class="empty">
                        <h3>Nothing more to show</h3>
                        <span class="dot"></span>
                    </div>
                </div>-->
                <!-- end Right -->


                <!-- Feature Dashboard
                <div class="rw-feature-dashboard clearfix">
                    <div class="rw-row-edge">
                        <div class="col-md-4">
                            <h2>Welcome to your dashboard</h2>
                        </div>
                        <div class="col-md-8">
                            <a href="#" class="btn btn-lg btn-primary">Create Invoice</a>
                            <a href="#" class="btn btn-lg btn-primary">Design Invoice</a>
                            <a href="#" class="btn btn-lg btn-primary">API Setup</a>
                        </div>
                    </div>
                </div>
                end Feature Dashboard -->

                <!-- Scripts -->
                <script type="text/javascript" charset="utf-8" src="../js/jquery-2.1.0.min.js"></script>
                <script type="text/javascript" charset="utf-8" src="../js/highstock.js"></script>
                <script type="text/javascript" charset="utf-8" src="../js/bootstrap.min.js"></script>
                <script type="text/javascript" charset="utf-8" src="../js/jquery.history.js"></script>
                <!--<script type="text/javascript" charset="utf-8" src="js/socket.io.min.js"></script>-->
                <script type="text/javascript" charset="utf-8" src="../js/jQueryRotate.2.2.js"></script>
                <!--<script type="text/javascript" charset="utf-8" src="js/rw.js"></script>-->
                <script type="text/javascript" charset="utf-8" src="../js/rw_alpha.js"></script>
                <!--<script type="text/javascript" charset="utf-8" src="js/app.js"></script>-->

            </div>
            <!-- end RW Container -->

        </div>
        <!-- end Right Panel - Main Content -->

    </div><!-- end Main Container -->

    </body>
@endsection
