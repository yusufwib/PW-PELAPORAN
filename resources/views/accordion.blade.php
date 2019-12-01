@if(Session::has('namasession'))

@endif
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Notification - Sobat Sarpra</title>
    <link rel = "icon" href = "assets/images/icon/logo.png"
        type = "image/x-icon"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <!-- amcharts css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css"
        media="all" />
    <!-- style css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<style>
    /* Removes the clear button from date inputs */
    /* input[type="date"]::-webkit-clear-button {
    display: none;
}

/* Removes the spin button */
    /* input[type="date"]::-webkit-inner-spin-button { 
    display: none;
} */

    /* Always display the drop down caret */
    /* input[type="date"]::-webkit-calendar-picker-indicator {
    color: #2c3e50;
}  */

    /* A few custom styles for date inputs */
    input[type="date"] {
        margin-top: 25px;
        margin-right: 25px;

        margin-left: 25px;
        appearance: none;
        border: 1px solid #353C4B;
        border-radius: 4px;
        /* -webkit-appearance: none; */
        color: #95a5a6;
        font-size: 14px;
        background: #ecf0f1;
        padding: 5px;
        height : 40px;  
        /* display: inline-block !important; */
        /* visibility: visible !important; */
    }

    /* input[type="date"], focus {
    color: #95a5a6;
    box-shadow: none;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
} */

</style>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="index.html"><img src="assets/images/icon/logo.png" alt="logo"></a>
                </div>
            </div>

            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i
                                        class="ti-dashboard"></i><span>dashboard</span></a>
                                <ul class="collapse">
                                    <li class="active"><a href="#">Notification</a></li>
                                    <li><a href="dashboard">Daily Record</a></li>
                                    <li><a href="form">Add New User</a></li>
                                </ul>
                            </li>
                            <li>
                                <a data-toggle="modal" data-target="#exampleModal" style="color : white;"
                                    aria-expanded="true"><i
                                        class="fa fa-exclamation-triangle"></i><span>logout</span></a>

                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="logout" class="btn btn-danger">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li id="full-view"><i class="ti-fullscreen"></i></li>
                            <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                            <li class="dropdown">

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="dashboard">Home</a></li>
                                <li><span>Notification</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}<i
                                    class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="mr-2" data-provide="datepicker">
                    <h4 style ="margin-top : 20px; color : #353C4B">TIME RANGE</h4>
                    <form name="form" action="accordion" method="post">
                        @csrf
                        <div class="row">

                            <input type="date" class="datepicker" name="tgl" id="tgl">
                            <b style="margin-top : 22px; font-size : 30px"> -</b>
                            <input type="date" class="datepicker" name="akhir" id="tgl1">

                            <button type="submit"
                                style="background-color: #FF306E; border: none;color: white;padding: 11px 11px;border-radius: 5px;text-align: center;text-decoration: none;display: inline-block;font-size: 14px; height : 40px; margin-top : 25px;">SUBMIT</button>

                        </div>
                    </form>
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                </div>
                <!-- accroding start -->
                <div class="row">
                    <!-- accordion style 3 end -->
                    <!-- accordion style 4 start -->
                    <div class="col-lg-4 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Requested</h4>
                                <div id="accordion4" class="according accordion-s3 gradiant-bg-1">
                                    <!-- //foreach  -->

                                    @foreach($result as $res)

                                    @if($res->status == "menunggu")
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="card-link" data-toggle="collapse" href="#{{ $res->id }}">
                                                Ruang : {{ $res->ruang }}

                                            </a>
                                        </div>
                                        <div id="{{ $res->id }}" style="background-color : #F0F4F5" class="collapse"
                                            data-parent="#accordion4">
                                            <!-- <br> -->
                                            <div class="card-body">
                                                <strong>TANGGAL LAPORAN</strong> <br>
                                                {{ $res->created_at }}
                                                <hr>
                                                <strong>NAMA PELAPOR </strong> <br> {{ $res->name }} <br>

                                                <strong>NIS : </strong> <br> {{ $res->nis }} <br>
                                                <hr>
                                                <img src="{{ $res->gambar }}" alt="">
                                                <br>
                                                {{ $res->isi }}
                                                <br>
                                                <br>
                                                <div class="row">
                                                    <form action="/putProses/{{ $res->id }}" method="POST">
                                                        @csrf
                                                        <button type="submit"
                                                            style="background-color: #18BAAF; border: none;color: white;padding: 6px 6px;border-radius: 5px;margin : 0 10px;text-align: center;text-decoration: none;display: inline-block;font-size: 14px;">ACCEPT</button>
                                                    </form>
                                                    <form action="/delReport/{{ $res->id }}" method="POST">
                                                        @csrf
                                                        <button type="submit"
                                                            style="background-color: none;   border: 2px solid #FF306E;color: #FF306E;padding: 4px 6px;border-radius: 5px;text-align: center;text-decoration: none;display: inline-block;font-size: 14px;">REJECT</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif


                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">On Going</h4>
                                <div id="accordion4" class="according accordion-s3 gradiant-bg-2">
                                    <!-- //foreach  -->
                                    @foreach($result as $res)
                                    @if($res->status == "proses")
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="card-link" data-toggle="collapse" href="#{{ $res->id }}">
                                                Ruang : {{ $res->ruang }}

                                            </a>
                                        </div>
                                        <div id="{{ $res->id }}" style="background-color : #FEF3DC" class="collapse"
                                            data-parent="#accordion4">
                                            <!-- <br> -->
                                            <div class="card-body">
                                                <strong>ACCEPTED AT</strong> <br>
                                                {{ $res->updated_at }}
                                                <hr>
                                                <strong>TANGGAL LAPORAN</strong> <br>
                                                {{ $res->created_at }}
                                                <hr>
                                                <strong>NAMA PELAPOR </strong> <br> {{ $res->name }} <br>

                                                <strong>NIS : </strong> <br> {{ $res->nis }} <br>
                                                <hr>
                                                <img src="{{ $res->gambar }}" alt="">
                                                <br>
                                                {{ $res->isi }}
                                                <br>
                                                <br>
                                                <div class="row">
                                                    <form action="/putFinish/{{ $res->id }}" method="POST">
                                                        @csrf
                                                        <button type="submit"
                                                            style="background-color: #18BAAF; border: none;color: white;padding: 6px 6px;border-radius: 5px;margin : 0 10px;text-align: center;text-decoration: none;display: inline-block;font-size: 14px;">FINISH</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif


                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Finished</h4>
                                <div id="accordion4" class="according accordion-s3 gradiant-bg-3">
                                    <!-- //foreach  -->
                                    @foreach($result as $res)
                                    @if($res->status == "selesai")
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="card-link" data-toggle="collapse" href="#{{ $res->id }}">
                                                Ruang : {{ $res->ruang }}

                                            </a>
                                        </div>
                                        <div id="{{ $res->id }}" style="background-color : #E8F8F7" class="collapse"
                                            data-parent="#accordion4">
                                            <!-- <br> -->
                                            <div class="card-body">
                                                <strong>FINISHED AT</strong> <br>
                                                {{ $res->updated_at }}
                                                <hr>
                                                <strong>TANGGAL LAPORAN</strong> <br>
                                                {{ $res->created_at }}
                                                <hr>
                                                <strong>NAMA PELAPOR </strong> <br> {{ $res->name }} <br>

                                                <strong>NIS : </strong> <br> {{ $res->nis }} <br>
                                                <hr>
                                                <img src="{{ $res->gambar }}" alt="">
                                                <br>
                                                {{ $res->isi }}
                                                <br>
                                                <br>
                                                <div class="row">
                                                    <form action="/putFinish/{{ $res->id }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-secondary m-2 p-1"
                                                            disabled>FINISHED</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif


                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-4 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">On Going</h4>
                                <div id="accordion4" class="according accordion-s3 gradiant-bg">
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="card-link" data-toggle="collapse" href="#accordion41">Collapsible Group
                                                Item #1</a>
                                        </div>
                                        <div id="accordion41" class="collapse show" data-parent="#accordion4">
                                            <div class="card-body">
                                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo eaque porro alias assumenda accusamus incidunt odio molestiae maxime quo atque in et quaerat, vel unde aliquam aperiam quidem consectetur omnis dicta officiis? Dolorum, error dolorem!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="collapsed card-link" data-toggle="collapse" href="#accordion42">Collapsible
                                                Group Item #2</a>
                                        </div>
                                        <div id="accordion42" class="collapse" data-parent="#accordion4">
                                            <div class="card-body">
                                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo eaque porro alias assumenda accusamus incidunt odio molestiae maxime quo atque in et quaerat, vel unde aliquam aperiam quidem consectetur omnis dicta officiis? Dolorum, error dolorem!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="collapsed card-link" data-toggle="collapse" href="#accordion43">Collapsible
                                                Group Item #3</a>
                                        </div>
                                        <div id="accordion43" class="collapse" data-parent="#accordion4">
                                            <div class="card-body">
                                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo eaque porro alias assumenda accusamus incidunt odio molestiae maxime quo atque in et quaerat, vel unde aliquam aperiam quidem consectetur omnis dicta officiis? Dolorum, error dolorem!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Finished</h4>
                                <div id="accordion4" class="according accordion-s3 gradiant-bg">
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="card-link" data-toggle="collapse" href="#accordion41">Collapsible Group
                                                Item #1</a>
                                        </div>
                                        <div id="accordion41" class="collapse show" data-parent="#accordion4">
                                            <div class="card-body">
                                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo eaque porro alias assumenda accusamus incidunt odio molestiae maxime quo atque in et quaerat, vel unde aliquam aperiam quidem consectetur omnis dicta officiis? Dolorum, error dolorem!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="collapsed card-link" data-toggle="collapse" href="#accordion42">Collapsible
                                                Group Item #2</a>
                                        </div>
                                        <div id="accordion42" class="collapse" data-parent="#accordion4">
                                            <div class="card-body">
                                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo eaque porro alias assumenda accusamus incidunt odio molestiae maxime quo atque in et quaerat, vel unde aliquam aperiam quidem consectetur omnis dicta officiis? Dolorum, error dolorem!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="collapsed card-link" data-toggle="collapse" href="#accordion43">Collapsible
                                                Group Item #3</a>
                                        </div>
                                        <div id="accordion43" class="collapse" data-parent="#accordion4">
                                            <div class="card-body">
                                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo eaque porro alias assumenda accusamus incidunt odio molestiae maxime quo atque in et quaerat, vel unde aliquam aperiam quidem consectetur omnis dicta officiis? Dolorum, error dolorem!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
            </div>
            <!-- accroding end -->
        </div>
    </div>
    <!-- main content area end -->
    <!-- footer area start-->
    <footer>

        <div class="footer-area">
            <p>© Copyright 2019. All right reserved.</p>
        </div>
    </footer>
    <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- offset area start -->
    <div class="offset-area">
        <div class="offset-close"><i class="ti-close"></i></div>
        <ul class="nav offset-menu-tab">
            <li><a class="active" data-toggle="tab" href="#activity">Activity</a></li>
            <li><a data-toggle="tab" href="#settings">Settings</a></li>
        </ul>
        <div class="offset-content tab-content">
            <div id="activity" class="tab-pane fade in show active">
                <div class="recent-activity">
                    <div class="timeline-task">
                        <div class="icon bg1">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa fa-check"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Added</h4>
                            <span class="time"><i class="ti-time"></i>7 Minutes Ago</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa fa-exclamation-triangle"></i>
                        </div>
                        <div class="tm-title">
                            <h4>You missed you Password!</h4>
                            <span class="time"><i class="ti-time"></i>09:20 Am</span>
                        </div>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="fa fa-bomb"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Member waiting for you Attention</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="ti-signal"></i>
                        </div>
                        <div class="tm-title">
                            <h4>You Added Kaji Patha few minutes ago</h4>
                            <span class="time"><i class="ti-time"></i>01 minutes ago</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg1">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Ratul Hamba sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Hello sir , where are you, i am egerly waiting for you.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa fa-exclamation-triangle"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa fa-exclamation-triangle"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="fa fa-bomb"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="ti-signal"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                </div>
            </div>
            <div id="settings" class="tab-pane fade">
                <div class="offset-settings">
                    <h4>General Settings</h4>
                    <div class="settings-list">
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Notifications</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch1" />
                                    <label for="switch1">Toggle</label>
                                </div>
                            </div>
                            <p>Keep it 'On' When you want to get all the notification.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Show recent activity</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch2" />
                                    <label for="switch2">Toggle</label>
                                </div>
                            </div>
                            <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Show your emails</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch3" />
                                    <label for="switch3">Toggle</label>
                                </div>
                            </div>
                            <p>Show email so that easily find you.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Show Task statistics</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch4" />
                                    <label for="switch4">Toggle</label>
                                </div>
                            </div>
                            <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Notifications</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch5" />
                                    <label for="switch5">Toggle</label>
                                </div>
                            </div>
                            <p>Use checkboxes when looking for yes or no answers.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- offset area end -->
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script>
        $('.datepicker').datepicker({
            format: 'mm/dd/yyyy',
            startDate: '-3d'
        });

    </script>
</body>

</html>
