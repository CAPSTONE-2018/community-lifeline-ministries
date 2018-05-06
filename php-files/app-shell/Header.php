<?php
session_start();
if (!isset($_SESSION['loggedIn'])) {
    header("Location: ../../index.html");
}
$account = $_SESSION['account'];
$userLoggedIn = $_SESSION['loggedIn'];
include("../app-shell/TimeZoneFormat.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CLM</title>
    <!-- CDN Link to Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.6/combined/css/gijgo.min.css">

<!--    <link rel="stylesheet" type="text/css"-->
<!--          href="https://cdn.datatables.net/v/bs4/dt-1.10.16/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/r-2.2.1/sc-1.4.4/sl-1.2.5/datatables.min.css"/>-->

    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/bs4-4.0.0/dt-1.10.16/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/datatables.min.css"/>



    <!-- CSS Plugins -->
    <link rel="stylesheet" href="../../css/plugins/gijgo/gijgo.min.css"/>
    <link rel="stylesheet" href="../../css/plugins/application-shell/main.min.css"/>
    <link rel="stylesheet" href="../../css/plugins/mdl-inputs/mdl-input-styles.css"/>
    <link rel="stylesheet" href="../../css/plugins/pretty-drop-downs/pretty-drop-downs.css"/>
    <!-- Our Custom Stylesheets -->
    <link rel="stylesheet" href="../../css/search-bar-styles.css"/>
    <link rel="stylesheet" href="../../css/show-all-table-styles.css"/>
    <link rel="stylesheet" href="../../css/form-styles.css"/>
    <link rel="stylesheet" href="../../css/toggle-switch.css"/>
    <link rel="stylesheet" href="../../css/table-styles.css"/>
    <link rel="stylesheet" href="../../css/radio-styles.css"/>
    <link rel="stylesheet" href="../../css/attendance-page-styles.css"/>
    <link rel="stylesheet" href="../../css/dashboard.css"/>
    <link rel="stylesheet" href="../../css/slide-out-modal.css"/>

    <!-- Scripts that must remain in the header -->
    <script src="../../js/plugins/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.6/combined/js/gijgo.min.js"></script>
</head>
<body class="app sidebar-mini rtl pace-done ">
<!-- Nav-bar-->
<header class="app-header col-12">
    <!-- Sidebar toggle button -->
    <a class="app-sidebar__toggle col-2" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <!-- Main CLM Logo -->
    <!--    <a class="app-header__logo" href="#">CLM</a>-->
    <!--    <a class="app-header__logo" href="../index-login/menu.php">-->
    <!--        <img src="../../images/new-logo.png" alt="CLM Logo" height="25px">-->
    <!--    </a>-->
    <div class="text-center col-8">

        <div class="navbar-user text-white">
            Signed In As: <?php echo $userLoggedIn ?>
            <div id="timer"></div>
        </div>
    </div>
    <!-- Nav-bar Right Menu-->
    <ul class="app-nav col-2">
        <!--Notification Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i
                        class="fa fa-bell-o fa-lg"></i></a>
            <ul class="app-notification dropdown-menu dropdown-menu-right">
                <li class="app-notification__title">You have 4 new notifications.</li>
                <div class="app-notification__content">
                    <li>
                        <a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span
                                        class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i
                                            class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                            <div>
                                <p class="app-notification__message">Lisa sent you a mail</p>
                                <p class="app-notification__meta">2 min ago</p>
                            </div>
                        </a></li>
                    <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span
                                        class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i
                                            class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                            <div>
                                <p class="app-notification__message">Mail server not working</p>
                                <p class="app-notification__meta">5 min ago</p>
                            </div>
                        </a></li>
                    <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span
                                        class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i
                                            class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                            <div>
                                <p class="app-notification__message">Transaction complete</p>
                                <p class="app-notification__meta">2 days ago</p>
                            </div>
                        </a></li>
                    <div class="app-notification__content">
                        <li><a class="app-notification__item" href="javascript:;"><span
                                        class="app-notification__icon"><span class="fa-stack fa-lg"><i
                                                class="fa fa-circle fa-stack-2x text-primary"></i><i
                                                class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                                <div>
                                    <p class="app-notification__message">Lisa sent you a mail</p>
                                    <p class="app-notification__meta">2 min ago</p>
                                </div>
                            </a></li>
                        <li><a class="app-notification__item" href="javascript:;"><span
                                        class="app-notification__icon"><span class="fa-stack fa-lg"><i
                                                class="fa fa-circle fa-stack-2x text-danger"></i><i
                                                class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                                <div>
                                    <p class="app-notification__message">Mail server not working</p>
                                    <p class="app-notification__meta">5 min ago</p>
                                </div>
                            </a></li>
                        <li><a class="app-notification__item" href="javascript:;"><span
                                        class="app-notification__icon"><span class="fa-stack fa-lg"><i
                                                class="fa fa-circle fa-stack-2x text-success"></i><i
                                                class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                                <div>
                                    <p class="app-notification__message">Transaction complete</p>
                                    <p class="app-notification__meta">2 days ago</p>
                                </div>
                            </a></li>
                    </div>
                </div>
                <li class="app-notification__footer"><a href="#">See all notifications.</a></li>
            </ul>
        </li>
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i
                        class="fa fa-user fa-lg"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li><a class="dropdown-item" href="#"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
                <li><a class="dropdown-item" href="#"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                <li><a class="dropdown-item" href="#"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
            </ul>
        </li>
    </ul>
</header>