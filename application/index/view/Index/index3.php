<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Title -->
    <title>HSD服务管理</title>

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{$Think.const.HSD_PATH}js/main/vendor/bootstrap/css/bootstrap.min.css">
    <!--<link rel="stylesheet" type="text/css" href="{$Think.const.HSD_PATH}bootstrap/css/bootstrap.min.css" />-->

    <link rel="stylesheet" href="{$Think.const.HSD_PATH}js/main/vendor/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="{$Think.const.HSD_PATH}js/main/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{$Think.const.HSD_PATH}js/main/vendor/animate.css/animate.min.css">
    <link rel="stylesheet" href="{$Think.const.HSD_PATH}js/main/vendor/jscrollpane/jquery.jscrollpane.css">
    <link rel="stylesheet" href="{$Think.const.HSD_PATH}js/main/vendor/waves/waves.min.css">
    <link rel="stylesheet" href="{$Think.const.HSD_PATH}js/main/vendor/chartist/chartist.min.css">
    <link rel="stylesheet" href="{$Think.const.HSD_PATH}js/main/vendor/switchery/dist/switchery.min.css">
    <link rel="stylesheet" href="{$Think.const.HSD_PATH}js/main/vendor/morris/morris.css">
    <link rel="stylesheet" href="{$Think.const.HSD_PATH}js/main/vendor/jvectormap/jquery-jvectormap-2.0.3.css">
    <!-- Neptune CSS -->
    <link rel="stylesheet" href="{$Think.const.HSD_PATH}css/tabulator/tabulator.css">

    <link rel="stylesheet" href="{$Think.const.HSD_PATH}js/main/html/css/core.css">
    <link rel="stylesheet" href="{$Think.const.HSD_PATH}js/main/html/css/style.css">
    <link rel="stylesheet" href="{$Think.const.HSD_PATH}css/tabulator/jquery-ui.theme.min.css">
    <link rel="stylesheet" href="{$Think.const.HSD_PATH}css/tabulator/tabulator.css">

    <link rel="stylesheet" href="{$Think.const.HSD_PATH}js/main/cj/alert/BeAlert.css">

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <![endif]-->
</head>
<body class="large-sidebar fixed-sidebar fixed-header content-appear">
<div class="wrapper">


    <div class="preloader"></div>
    <!-- Sidebar -->
    <div class="site-sidebar-overlay"></div>
    <div class="site-sidebar">
        <a class="logo" href="index.html">
            <span class="l-text" style="text-transform:capitalize ">HSD Management</span>
            <!--<span class="l-icon"></span>-->
        </a>
        <div class="custom-scroll custom-scroll-light">
            <ul class="sidebar-menu">
                <li class="menu-title m-t-0-5">MENU</li>
                <li class="with-sub">
                    <a href="#" class="waves-effect  waves-light">
                        <span class="s-caret"><i class="fa fa-angle-down"></i></span>
                        <span class="s-icon"><i class="ti-dashboard"></i></span>
                        <span class="s-text">系统项目管理</span>
                    </a>
                    <ul><li>
                            {volist name="menu1" id="menu1" key="key"}
                            <ul>
                                <li><a href="{:U('index')}">{$menu1.menu_des}</a></li>

                            </ul>
                            {/volist}
                        </li>
                    </ul>
                </li>
                <li class="with-sub">
                    <a href="#" class="waves-effect  waves-light">
                        <span class="s-caret"><i class="fa fa-angle-down"></i></span>
                        <span class="s-icon"><i class="ti-package"></i></span>
                        <span class="s-text">系统基础设置</span>
                    </a>
                    <ul><li>
                            {volist name="menu2" id="menu2" key="key"}
                            <ul>
                                <li><a href="#">{$menu2.menu_des}</a></li>
                            </ul>
                            {/volist}
                        </li>
                    </ul>
                </li>
                <li class="with-sub">
                    <a href="#" class="waves-effect  waves-light">
                        <span class="s-caret"><i class="fa fa-angle-down"></i></span>
                        <span class="s-icon"><i class="ti-paint-bucket"></i></span>
                        <span class="s-text">系统控制器设置</span>
                    </a>
                    <ul><li>
                            {volist name="menu3" id="menu3" key="key"}
                            <ul>
                                <li><a href="#">{$menu3.menu_des}</a></li>
                            </ul>
                            {/volist}
                        </li>
                    </ul>
                </li>
                <li class="with-sub">
                    <a href="#" class="waves-effect  waves-light">
                        <span class="s-caret"><i class="fa fa-angle-down"></i></span>
                        <span class="s-icon"><i class="ti-pencil-alt"></i></span>
                        <span class="s-text">系统查询与报表</span>
                    </a>
                    <ul><li>
                            {volist name="menu4" id="menu4" key="key"}
                            <ul>
                                <li class="with-sub"><a href="#">{$menu4.menu_des}</a></li>
                            </ul>
                            {/volist}
                        </li>
                    </ul>
                </li>
                <li class="with-sub">
                    <a href="#" class="waves-effect  waves-light">
                        <span class="s-caret"><i class="fa fa-angle-down"></i></span>
                        <span class="s-icon"><i class="ti-menu-alt"></i></span>
                        <span class="s-text">客户菜单</span>
                    </a>
                    <ul>
                        <li>
                            {volist name="menu5" id="menu5" key="key"}
                            <ul>
                                <li><a href="#">{$menu5.menu_des}</a></li>
                            </ul>
                            {/volist}
                        </li>

                    </ul>
                </li>
                <li class="with-sub">
                    <a href="#" class="waves-effect  waves-light">
                        <span class="s-caret"><i class="fa fa-angle-down"></i></span>
                        <span class="s-icon"><i class="ti-gallery"></i></span>
                        <span class="s-text">客户查询与报表</span>
                    </a>
                    <ul><li>
                            {volist name="menu6" id="menu6" key="key"}
                            <ul>
                                <li><a href="#" style="text-indent: 15px">{$menu6.menu_des}</a></li>
                            </ul>
                            {/volist}
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <!-- Sidebar second -->
    <div class="site-sidebar-second custom-scroll custom-scroll-dark">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab">Chat</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-2" role="tab">Activity</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-3" role="tab">Todo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-4" role="tab">Settings</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab-1" role="tabpanel">
                <div class="sidebar-chat animated fadeIn">
                    <div class="sidebar-group">
                        <h6>Favorites</h6>
                        <a class="text-black" href="#">
                            <span class="sc-status bg-success"></span>
                            <span class="sc-name">John Doe</span>
                            <span class="sc-writing"> typing...<i class="ti-pencil"></i></span>
                        </a>
                        <a class="text-black" href="#">
                            <span class="sc-status bg-success"></span>
                            <span class="sc-name">Vance Osborn</span>
                        </a>
                        <a class="text-black" href="#">
                            <span class="sc-status bg-danger"></span>
                            <span class="sc-name">Wolfe Stevie</span>
                            <span class="tag tag-primary">7</span>
                        </a>
                        <a class="text-black" href="#">
                            <span class="sc-status bg-warning"></span>
                            <span class="sc-name">Jonathan Mel</span>
                        </a>
                        <a class="text-black" href="#">
                            <span class="sc-status bg-secondary"></span>
                            <span class="sc-name">Carleton Josiah</span>
                        </a>
                    </div>
                    <div class="sidebar-group">
                        <h6>Work</h6>
                        <a class="text-black" href="#">
                            <span class="sc-status bg-secondary"></span>
                            <span class="sc-name">Larry Hal</span>
                        </a>
                        <a class="text-black" href="#">
                            <span class="sc-status bg-success"></span>
                            <span class="sc-name">Ron Carran</span>
                            <span class="sc-writing"> typing...<i class="ti-pencil"></i></span>
                        </a>
                    </div>
                    <div class="sidebar-group">
                        <h6>Social</h6>
                        <a class="text-black" href="#">
                            <span class="sc-status bg-success"></span>
                            <span class="sc-name">Lucius Skyler</span>
                            <span class="tag tag-primary">3</span>
                        </a>
                        <a class="text-black" href="#">
                            <span class="sc-status bg-danger"></span>
                            <span class="sc-name">Landon Graham</span>
                        </a>
                    </div>
                </div>
                <div class="sidebar-chat-window animated fadeIn">
                    <div class="scw-header clearfix">
                        <a class="text-grey pull-xs-left" href="#"><i class="ti-angle-left"></i> Back</a>
                        <div class="pull-xs-right">
                            <strong>Jonathan Mel</strong>
                            <div class="avatar box-32">
                                <img src="{$Think.const.HSD_PATH}js/login/index/img/avatars/5.jpg" alt="">
                                <span class="status bg-success top right"></span>
                            </div>
                        </div>
                    </div>
                    <div class="scw-item">
                        <span>Hello!</span>
                    </div>
                    <div class="scw-item self">
                        <span>Meeting at 16:00 in the conference room. Remember?</span>
                    </div>
                    <div class="scw-item">
                        <span>No problem. Thank's for reminder!</span>
                    </div>
                    <div class="scw-item self">
                        <span>Prepare to be amazed.</span>
                    </div>
                    <div class="scw-item">
                        <span>Good. Can't wait!</span>
                    </div>
                    <div class="scw-form">
                        <form>
                            <input class="form-control" type="text" placeholder="Type...">
                            <button class="btn btn-secondary" type="button"><i class="ti-angle-right"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab-2" role="tabpanel">
                <div class="sidebar-activity animated fadeIn">
                    <div class="notifications">
                        <div class="n-item">
                            <div class="media">
                                <div class="media-left">
                                    <div class="avatar box-48">
                                        <img class="b-a-radius-circle" src="{$Think.const.HSD_PATH}js/login/index/img/avatars/1.jpg" alt="">
                                        <span class="n-icon bg-danger"><i class="ti-pin-alt"></i></span>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="n-text"><a class="text-black" href="#">John Doe</a> <span class="text-muted">uploaded <a class="text-black" href="#">monthly report</a></div>
                                    <div class="text-muted font-90">12 minutes ago</div>
                                </div>
                            </div>
                        </div>
                        <div class="n-item">
                            <div class="media">
                                <div class="media-left">
                                    <div class="avatar box-48">
                                        <img class="b-a-radius-circle" src="{$Think.const.HSD_PATH}js/login/index/img/avatars/3.jpg" alt="">
                                        <span class="n-icon bg-success"><i class="ti-comment"></i></span>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="n-text"><a class="text-black" href="#">Vance Osborn</a> <span class="text-muted">commented </span> <a class="text-black" href="#">Project</a></div>
                                    <div class="n-comment m-y-0-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</div>
                                    <div class="text-muted font-90">3 hours ago</div>
                                </div>
                            </div>
                        </div>
                        <div class="n-item">
                            <div class="media">
                                <div class="media-left">
                                    <div class="avatar box-48">
                                        <img class="b-a-radius-circle" src="{$Think.const.HSD_PATH}js/login/index/img/avatars/2.jpg" alt="">
                                        <span class="n-icon bg-danger"><i class="ti-email"></i></span>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="n-text"><a class="text-black" href="#">Ron Carran</a> <span class="text-muted">send you files</span></div>
                                    <div class="row row-sm m-y-0-5">
                                        <div class="col-xs-4">
                                            <img class="img-fluid" src="{$Think.const.HSD_PATH}js/login/index/img/photos-1/1.jpg" alt="">
                                        </div>
                                        <div class="col-xs-4">
                                            <img class="img-fluid" src="{$Think.const.HSD_PATH}js/login/index/img/photos-1/2.jpg" alt="">
                                        </div>
                                        <div class="col-xs-4">
                                            <img class="img-fluid" src="{$Think.const.HSD_PATH}js/login/index/img/photos-1/3.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="text-muted font-90">30 minutes ago</div>
                                </div>
                            </div>
                        </div>
                        <div class="n-item">
                            <div class="media">
                                <div class="media-left">
                                    <div class="avatar box-48">
                                        <img class="b-a-radius-circle" src="{$Think.const.HSD_PATH}js/login/index/img/avatars/4.jpg" alt="">
                                        <span class="n-icon bg-primary"><i class="ti-plus"></i></span>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="n-text"><a class="text-black" href="#">Larry Hal</a> <span class="text-muted">invited you to </span><a class="text-black" href="#">Project</a></div>
                                    <div class="text-muted font-90">10:58</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab-3" role="tabpanel">
                <div class="sidebar-todo animated fadeIn">
                    <div class="sidebar-group">
                        <h6>Important</h6>
                        <div class="st-item">
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">Mock up</span>
                            </label>
                        </div>
                        <div class="st-item">
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" checked>
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">Prototype iPhone</span>
                            </label>
                        </div>
                        <div class="st-item">
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">Build final version</span>
                            </label>
                        </div>
                        <div class="st-item">
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">Approval docs</span>
                            </label>
                        </div>
                    </div>
                    <div class="sidebar-group">
                        <h6>Secondary</h6>
                        <div class="st-item">
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" checked>
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">Website redesign</span>
                            </label>
                        </div>
                        <div class="st-item">
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" checked>
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">Skype call</span>
                            </label>
                        </div>
                        <div class="st-item">
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">Blog post</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab-4" role="tabpanel">
                <div class="sidebar-settings animated fadeIn">
                    <div class="sidebar-group">
                        <h6>Main</h6>
                        <div class="ss-item">
                            <div class="text-truncate">Anyone can register</div>
                            <div class="ss-checkbox"><input type="checkbox" class="js-switch" data-size="small" data-color="#3e70c9" checked></div>
                        </div>
                        <div class="ss-item">
                            <div class="text-truncate">Allow commenting</div>
                            <div class="ss-checkbox"><input type="checkbox" class="js-switch" data-size="small" data-color="#3e70c9"></div>
                        </div>
                        <div class="ss-item">
                            <div class="text-truncate">Allow deleting</div>
                            <div class="ss-checkbox"><input type="checkbox" class="js-switch" data-size="small" data-color="#3e70c9"></div>
                        </div>
                    </div>
                    <div class="sidebar-group">
                        <h6>Notificatiоns</h6>
                        <div class="ss-item">
                            <div class="text-truncate">Commits</div>
                            <div class="ss-checkbox"><input type="checkbox" class="js-switch" data-size="small" data-color="#3e70c9"></div>
                        </div>
                        <div class="ss-item">
                            <div class="text-truncate">Messages</div>
                            <div class="ss-checkbox"><input type="checkbox" class="js-switch" data-size="small" data-color="#3e70c9" checked></div>
                        </div>
                    </div>
                    <div class="sidebar-group">
                        <h6>Security</h6>
                        <div class="ss-item">
                            <div class="text-truncate">Daily backup</div>
                            <div class="ss-checkbox"><input type="checkbox" class="js-switch" data-size="small" data-color="#3e70c9" checked></div>
                        </div>
                        <div class="ss-item">
                            <div class="text-truncate">API Access</div>
                            <div class="ss-checkbox"><input type="checkbox" class="js-switch" data-size="small" data-color="#3e70c9" checked></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--Template options -->
    <div class="template-options custom-scroll custom-scroll-dark">
        <div class="to-toggle"><i class="ti-settings"></i></div>
        <div class="to-content">
            <h6>Layouts</h6>
            <div class="row m-b-2 text-xs-center">
                <div class="col-xs-6 m-b-2">
                    <a href="index.html">
                        <img src="{$Think.const.HSD_PATH}js/login/index/img/layouts/1.png" class="img-fluid">
                    </a>
                    <div class="text-muted">Default</div>
                </div>
                <div class="col-xs-6 m-b-2">
                    <label>
                        <input name="compact-sidebar" type="checkbox">
                        <div class="to-icon"><i class="ti-check"></i></div>
                        <img src="{$Think.const.HSD_PATH}js/login/index/img/layouts/2.png" class="img-fluid">
                    </label>
                    <div class="text-muted">Compact Sidebar</div>
                </div>
                <div class="col-xs-6 m-b-2">
                    <label>
                        <input name="fixed-header" type="checkbox" checked>
                        <div class="to-icon"><i class="ti-check"></i></div>
                        <img src="{$Think.const.HSD_PATH}js/login/index/img/layouts/3.png" class="img-fluid">
                    </label>
                    <div class="text-muted">Fixed Header</div>
                </div>
                <div class="col-xs-6 m-b-2">
                    <label>
                        <input name="boxed-wrapper" type="checkbox">
                        <div class="to-icon"><i class="ti-check"></i></div>
                        <img src="{$Think.const.HSD_PATH}js/login/index/img/layouts/4.png" class="img-fluid">
                    </label>
                    <div class="text-muted">Boxed Wrapper</div>
                </div>
            </div>
            <h6>Skins</h6>
            <div class="row">
                <div class="col-xs-3 m-b-2">
                    <label>
                        <input name="skin" value="skin-default" type="radio" checked>
                        <div class="to-icon"><i class="ti-check"></i></div>
                        <div class="to-skin">
                            <span class="skin-first bg-white"></span>
                            <span class="skin-second skin-dark-blue"></span>
                            <span class="skin-third bg-info"></span>
                        </div>
                    </label>
                </div>
                <div class="col-xs-3 m-b-2">
                    <label>
                        <input name="skin" value="skin-1" type="radio">
                        <div class="to-icon"><i class="ti-check"></i></div>
                        <div class="to-skin">
                            <span class="skin-first skin-dark-blue-2"></span>
                            <span class="skin-second bg-white"></span>
                            <span class="skin-third bg-danger"></span>
                        </div>
                    </label>
                </div>
                <div class="col-xs-3 m-b-2">
                    <label>
                        <input name="skin" value="skin-2" type="radio">
                        <div class="to-icon"><i class="ti-check"></i></div>
                        <div class="to-skin">
                            <span class="skin-first bg-white"></span>
                            <span class="skin-second bg-black"></span>
                            <span class="skin-third bg-success"></span>
                        </div>
                    </label>
                </div>
                <div class="col-xs-3 m-b-2">
                    <label>
                        <input name="skin" value="skin-3" type="radio">
                        <div class="to-icon"><i class="ti-check"></i></div>
                        <div class="to-skin">
                            <span class="skin-first bg-white"></span>
                            <span class="skin-second skin-grey"></span>
                            <span class="skin-third bg-purple"></span>
                        </div>
                    </label>
                </div>
                <div class="col-xs-3 m-b-2">
                    <label>
                        <input name="skin" value="skin-4" type="radio">
                        <div class="to-icon"><i class="ti-check"></i></div>
                        <div class="to-skin">
                            <span class="skin-first skin-dark-blue"></span>
                            <span class="skin-second skin-dark-blue-2"></span>
                            <span class="skin-third bg-warning"></span>
                        </div>
                    </label>
                </div>
                <div class="col-xs-3 m-b-2">
                    <label>
                        <input name="skin" value="skin-5" type="radio">
                        <div class="to-icon"><i class="ti-check"></i></div>
                        <div class="to-skin">
                            <span class="skin-first bg-primary"></span>
                            <span class="skin-second bg-white"></span>
                            <span class="skin-third bg-primary"></span>
                        </div>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <!--Header -->
    <div class="site-header">
        <nav class="navbar navbar-light">
            <ul class="nav navbar-nav">
                <li class="nav-item m-r-1 hidden-lg-up">
                    <a class="nav-link collapse-button" href="#">
                        <i class="ti-menu"></i>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav pull-xs-right">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" data-toggle="dropdown" aria-expanded="false">
                        <i class="ti-check"></i>
                        <span class="tag tag-success top">3</span>
                    </a>
                    <div class="dropdown-tasks dropdown-menu dropdown-menu-right animated slideInUp">
                        <div class="t-item">
                            <div class="m-b-0-5">
                                <a class="text-black" href="#">First Task</a>
                                <span class="pull-xs-right text-muted">75%</span>
                            </div>
                            <progress class="progress progress-danger progress-sm" value="75" max="100">100%</progress>
									<span class="avatar box-32">
										<img src="{$Think.const.HSD_PATH}js/login/index/img/avatars/2.jpg" alt="">
									</span>
                            <a class="text-black" href="#">John Doe</a>, <span class="text-muted">5 min ago</span>
                        </div>
                        <div class="t-item">
                            <div class="m-b-0-5">
                                <a class="text-black" href="#">Second Task</a>
                                <span class="pull-xs-right text-muted">40%</span>
                            </div>
                            <progress class="progress progress-purple progress-sm" value="40" max="100">100%</progress>
									<span class="avatar box-32">
										<img src="{$Think.const.HSD_PATH}js/login/index/img/avatars/3.jpg" alt="">
									</span>
                            <a class="text-black" href="#">John Doe</a>, <span class="text-muted">15:07</span>
                        </div>
                        <div class="t-item">
                            <div class="m-b-0-5">
                                <a class="text-black" href="#">Third Task</a>
                                <span class="pull-xs-right text-muted">100%</span>
                            </div>
                            <progress class="progress progress-warning progress-sm" value="100" max="100">100%</progress>
									<span class="avatar box-32">
										<img src="{$Think.const.HSD_PATH}js/login/index/img/avatars/4.jpg" alt="">
									</span>
                            <a class="text-black" href="#">John Doe</a>, <span class="text-muted">yesterday</span>
                        </div>
                        <div class="t-item">
                            <div class="m-b-0-5">
                                <a class="text-black" href="#">Fourth Task</a>
                                <span class="pull-xs-right text-muted">60%</span>
                            </div>
                            <progress class="progress progress-success progress-sm" value="60" max="100">100%</progress>
									<span class="avatar box-32">
										<img src="{$Think.const.HSD_PATH}js/login/index/img/avatars/5.jpg" alt="">
									</span>
                            <a class="text-black" href="#">John Doe</a>, <span class="text-muted">3 days ago</span>
                        </div>
                        <a class="t-item text-black text-xs-center" href="#">
                            <strong>View all tasks</strong>
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" data-toggle="dropdown" aria-expanded="false">
                        <i class="ti-bell"></i>
                        <span class="tag tag-danger top">12</span>
                    </a>
                    <div class="dropdown-messages dropdown-tasks dropdown-menu dropdown-menu-right animated slideInUp">
                        <div class="m-item">
                            <div class="mi-icon bg-info"><i class="ti-comment"></i></div>
                            <div class="mi-text"><a class="text-black" href="#">John Doe</a> <span class="text-muted">commented post</span> <a class="text-black" href="#">Lorem ipsum dolor</a></div>
                            <div class="mi-time">5 min ago</div>
                        </div>
                        <div class="m-item">
                            <div class="mi-icon bg-danger"><i class="ti-heart"></i></div>
                            <div class="mi-text"><a class="text-black" href="#">John Doe</a> <span class="text-muted">liked post</span> <a class="text-black" href="#">Lorem ipsum dolor</a></div>
                            <div class="mi-time">15:07</div>
                        </div>
                        <div class="m-item">
                            <div class="mi-icon bg-purple"><i class="ti-user"></i></div>
                            <div class="mi-text"><a class="text-black" href="#">John Doe</a> <span class="text-muted">followed</span> <a class="text-black" href="#">Kate Doe</a></div>
                            <div class="mi-time">yesterday</div>
                        </div>
                        <div class="m-item">
                            <div class="mi-icon bg-danger"><i class="ti-heart"></i></div>
                            <div class="mi-text"><a class="text-black" href="#">John Doe</a> <span class="text-muted">liked post</span> <a class="text-black" href="#">Lorem ipsum dolor</a></div>
                            <div class="mi-time">3 days ago</div>
                        </div>
                        <a class="t-item text-black text-xs-center" href="#">
                            <strong>View all notifications</strong>
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" data-toggle="dropdown" aria-expanded="false">
                        <div class="avatar box-32">
                            <img src="{$Think.const.HSD_PATH}js/login/index/img/avatars/1.jpg" alt="">
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right animated flipInY">
                        <a class="dropdown-item" href="#">
                            <i class="ti-email m-r-0-5"></i> Inbox
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="ti-user m-r-0-5"></i> Profile
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="ti-settings m-r-0-5"></i> Settings
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"><i class="ti-help m-r-0-5"></i> Help</a>
                        <a class="dropdown-item" href="#"><i class="ti-power-off m-r-0-5"></i> Sign out</a>
                    </div>
                </li>
                <li class="nav-item hidden-md-up">
                    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapse-1">
                        <i class="ti-more"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link site-sidebar-second-toggle" href="#" data-toggle="collapse">
                        <i class="ti-arrow-left"></i>
                    </a>
                </li>
            </ul>
            <div class="navbar-toggleable-sm collapse" id="collapse-1">
                <div class="header-form pull-md-left m-md-r-1">
                    <form>
                        <input type="text" class="form-control b-a" placeholder="Search for...">
                        <button type="submit" class="btn bg-white b-a-0">
                            <i class="ti-search"></i>
                        </button>
                    </form>
                </div>
                <ul class="nav navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                            Add
                        </a>
                        <div class="dropdown-menu animated flipInY">
                            <a class="dropdown-item" href="#">
                                Link
                                <span class="tag tag-primary">3</span>
                            </a>
                            <a class="dropdown-item" href="#">Another link</a>
                            <a class="dropdown-item" href="#">
                                Something else here
                                <span class="tag tag-success">7</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="site-content" style="background: white">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="row-fluid">
                        <div class="btn-group" role="group" aria-label="Basic example" style="width: 100%;height: 100%">
                            <button  class="btn btn-secondary" onclick="selectAll()">全选</button>
                            <button  class="btn btn-secondary">取消全选</button>
                            <button  class="btn btn-secondary" onclick="btnTest()">Right</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <button class=" btn-success btn-block" onclick="btnAdd()">Add</button>
                        </div>
                        <div class="col-md-3">
                            <button class=" btn-warning btn-block" onclick="btnRefresh()">Refresh</button>
                        </div>
                        <div class="col-md-3">
                            <button class=" btn-danger btn-block" onclick="btnDel()">Delete</button>
                        </div>
                        <div class="col-md-3">
                            <button class=" btn-default btn-block" onclick="btnSave()">Save</button>
                        </div>
                    </div>

                    <div id="prjGrid"></div>


                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="footer">
            <!--<div class="container-fluid">-->
            <!--2016 © Neptune-->
            <!--</div>-->
        </footer>
    </div>

</div>

<!-- Vendor JS -->
<script type="text/javascript" src="{$Think.const.HSD_PATH}js/main/vendor/jquery/jquery-1.12.3.min.js"></script>
<script type="text/javascript" src="{$Think.const.HSD_PATH}js/main/vendor/tether/js/tether.min.js"></script>
<script type="text/javascript" src="{$Think.const.HSD_PATH}js/main/vendor/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{$Think.const.HSD_PATH}js/main/vendor/detectmobilebrowser/detectmobilebrowser.js"></script>
<script type="text/javascript" src="{$Think.const.HSD_PATH}js/main/vendor/jscrollpane/jquery.mousewheel.js"></script>
<script type="text/javascript" src="{$Think.const.HSD_PATH}js/main/vendor/jscrollpane/mwheelIntent.js"></script>
<script type="text/javascript" src="{$Think.const.HSD_PATH}js/main/vendor/jscrollpane/jquery.jscrollpane.min.js"></script>
<script type="text/javascript" src="{$Think.const.HSD_PATH}js/main/vendor/waves/waves.min.js"></script>
<!--<script type="text/javascript" src="{$Think.const.HSD_PATH}js/main/vendor/chartist/chartist.min.js"></script>-->
<script type="text/javascript" src="{$Think.const.HSD_PATH}js/main/vendor/switchery/dist/switchery.min.js"></script>
<!--<script type="text/javascript" src="{$Think.const.HSD_PATH}js/main/vendor/flot/jquery.flot.min.js"></script>-->
<!--<script type="text/javascript" src="{$Think.const.HSD_PATH}js/main/vendor/flot/jquery.flot.resize.min.js"></script>-->
<!--<script type="text/javascript" src="{$Think.const.HSD_PATH}js/main/vendor/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>-->
<!--<script type="text/javascript" src="{$Think.const.HSD_PATH}js/main/vendor/CurvedLines/curvedLines.js"></script>-->
<script type="text/javascript" src="{$Think.const.HSD_PATH}js/main/vendor/TinyColor/tinycolor.js"></script>
<script type="text/javascript" src="{$Think.const.HSD_PATH}js/main/vendor/sparkline/jquery.sparkline.min.js"></script>
<script type="text/javascript" src="{$Think.const.HSD_PATH}js/main/vendor/raphael/raphael.min.js"></script>
<script type="text/javascript" src="{$Think.const.HSD_PATH}js/main/vendor/morris/morris.min.js"></script>
<script type="text/javascript" src="{$Think.const.HSD_PATH}js/main/vendor/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
<script type="text/javascript" src="{$Think.const.HSD_PATH}js/main/vendor/jvectormap/jquery-jvectormap-world-mill.js"></script>
<script type="text/javascript" src="{$Think.const.HSD_PATH}script/jquery-ui-11.4/jquery-ui.min.js"></script>
<script type="text/javascript" src="{$Think.const.HSD_PATH}js/main/cj/alert/BeAlert.js"></script>

<script type="text/javascript" src="{$Think.const.HSD_PATH}js/tabulator/tabulator.js"></script>


<!-- Neptune JS -->
<script type="text/javascript" src="{$Think.const.HSD_PATH}js/main/html/js/app.js"></script>
<script type="text/javascript" src="{$Think.const.HSD_PATH}js/main/html/js/demo.js"></script>
<script type="text/javascript" src="{$Think.const.HSD_PATH}js/main/html/js/index.js"></script>
<script type="text/javascript" src="{$Think.const.HSD_PATH}js/main/main.js"></script>

</body>
</html>

