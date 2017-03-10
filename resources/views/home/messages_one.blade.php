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
                            <li>
                                <a href="{{ url('/home/statistics') }}"><span class="glyphicon glyphicon-signal"></span>Statistika</a>
                            </li>
                            <li>
                                <a href="{{ url('/home/application') }}"><span class="glyphicon glyphicon-phone"></span>Mobilna aplikacija</a>
                            </li>
                            <li>
                                <a href="{{ url('/home/pictures') }}"><span class="glyphicon glyphicon-picture"></span>Slike</a>
                            </li>
                            <li class="active">
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
                                <a href="{{ route('settings') }}" class="no-ajax"><span class="glyphicon glyphicon-cog"></span>Nastavitve</a>
                            </li>
                            <!--<li class="visible-xs">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="no-ajax">
                                    <span class="glyphicon glyphicon-off"></span>Sign Out
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>-->
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
                                <a href="{{ url('/home') }}" class="no-ajax"><span class="glyphicon glyphicon-home"></span>Dashboard</a>
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
            @include('layouts.company_header', ['page' => 'Sporočila'])
            <!-- end Main Header -->

            <!-- Main Container -->
            <div class="rw-container" id="frame"><!-- use .rw-container instead of .container on private_template -->
                <header>
                    <div>
                        <h1>Sporočila</h1>
                    </div>
                    <div class="buttons pull-right">
                        <h1><a class="icon" title="Novo" href="{{ route('messages.new') }}"><span class="glyphicon glyphicon-plus"></span></a></h1>
                    </div>
                </header><hr/>
                @if(count($ticket))
                    <div class="messages default clearfix">
                        <ul class="rw-messages">
                            <li class="{{ $ticket[0]['status'] == 'Zaprto' ? 'blue' : 'green' }} active">
                                <a href="{{ route('messages.one', $ticket[0]['ticket_group']) }}">
                                    <span class="dot"><span></span></span>
                                    <div class="body">
                                        <span class="title">{{ $ticket[0]['title'] }}</span>
                                        <span class="value">{{ $ticket[0]['naslov'] }}</span>
                                    </div>
                                    <span class="time ago" data-timer="0" title="Wed Feb 19 2014 04:30:30 GMT+0100 (Central Europe Standard Time)">{{ $ticket[0]['created_at'] }}</span>
                                </a>
                                <div class="content">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <table class="table rw-table table-hover">
                                                <tr>
                                                    <td>Status:</td>
                                                    <td class="colorize">{{ $ticket[0]['status'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Naslov:</td>
                                                    <td>{{ $ticket[0]['naslov'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>ID:</td>
                                                    <td>{{ $ticket[0]['ticket_group'] }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-md-6">
                                            <table class="table rw-table table-hover">
                                                <tr>
                                                    <td>Odprto:</td>
                                                    <td>{{ $ticket[0]['created_at'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Zadnja sprememba:</td>
                                                    <td>{{ $ticket[0]['updated_at'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Zaprto:</td>
                                                    <td>{{ (!is_null($ticket[0]['closed_at'])) ? $ticket[0]['closed_at'] : '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Agent:</td>
                                                    <td>{{ $agent }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    @foreach($ticket as $comment)
                                        <div class="support-message">
                                            <h3>{{ $comment->user->name }}</h3>
                                            <span class="time ago" data-timer="0" title="Wed Feb 19 2014 04:30:30 GMT+0100 (Central Europe Standard Time)">{{ $comment->created_at }}</span>
                                            <div class="text">
                                                {!! nl2br($comment->message) !!}
                                            </div>
                                        </div>
                                    @endforeach
                                    <hr/>
                                    @if(is_null($ticket[0]['closed_at']))
                                    <div>
                                        <form class="inline-support-form" method="POST" action="{{ route('messages.one.post', $ticket[0]['ticket_group']) }}">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label" for="sporocilo">Sporočilo</label>
                                                        <textarea class="textarea" rows="3" id="sporocilo" name="sporocilo" required></textarea>
                                                    </div>
                                                </div>
                                                @if ($errors->has('sporocilo'))
                                                    <span class="help-block"><strong>{{ $errors->first('sporocilo') }}</strong></span>
                                                @endif
                                            </div>
                                            <div class="row form-buttons">
                                                <div class="col-md-6">
                                                    <button type="submit" class="btn btn-lg btn-primary">Potrdi</button>
                                                </div>
                                                <div class="col-md-6">
                                                    <a href="{{ route('messages') }}" class="btn btn-lg btn-default">Prekliči</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    @endif
                                </div>
                            </li>
                        </ul>
                    </div>
                @else
                    Error.
                @endif
            </div>
            <!-- end RW Container -->
        </div>
        <!-- end Right Panel - Main Content -->
    </div><!-- end Main Container -->
    <!-- Scripts -->
    <script type="text/javascript" charset="utf-8" src="../../js/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="../../js/highstock.js"></script>
    <script type="text/javascript" charset="utf-8" src="../../js/bootstrap.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="../../js/jquery.history.js"></script>
    <!--<script type="text/javascript" charset="utf-8" src="js/socket.io.min.js"></script>-->
    <script type="text/javascript" charset="utf-8" src="../../js/jQueryRotate.2.2.js"></script>
    <!--<script type="text/javascript" charset="utf-8" src="js/rw.js"></script>-->
    <script type="text/javascript" charset="utf-8" src="../../js/rw_alpha.js"></script>
    <!--<script type="text/javascript" charset="utf-8" src="js/app.js"></script>-->
    </body>
@endsection
