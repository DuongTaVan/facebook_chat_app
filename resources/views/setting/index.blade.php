@include('backend.v2.header')
<?php $shop = ShopifyApp::shop(); ?>
@include('backend.v2.preloader')
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">

    @include('backend.v2.layouts.app-header')
    <div class="app-main">
        @include('backend.v2.layouts.app-sidebar')
        <div class="app-main__outer">
            <div class="app-main__inner">
                <div class="app-page-title">
                    <div class="page-title-wrapper">
                        <div class="page-title-heading">
                            <div class="page-title-icon">
                                <i class="fa fa-bell icon-gradient bg-mean-fruit">
                                </i>
                            </div>
                            <div class="main-card card">
                                <div class="card-body">
                                    @if(session()->has('message'))
                                        <div class="text-success">
                                            <span style="font-size: 14px;">{{ session()->get('message') }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!--end app-page-title-->
                <style>
                    .bg-light {
                        background-color: #fff !important;
                        border: 1px solid #ebebeb;
                        margin: 0 0 20px 0px;
                    }

                    ul#pills-tab {
                        margin-left: 126px;
                    }

                    .navbar-light .navbar-brand {
                        color: rgb(255 0 0);
                        border: 1px solid #f1efef;
                        padding: 5px;
                        border-top: 4px solid;
                    }

                    .step-number-around {
                        display: inline-block;
                        border-radius: 100px;
                        background-color: #da3637;
                        width: 32px;
                        height: 32px;
                        float: left;
                    }

                    .step-number {
                        width: 100%;
                        height: 100%;
                        font-family: "HelveticaNeue-Bold";
                        background-color: #da3637;
                        color: #fff;
                        border-radius: 100px;
                        float: left;
                        text-align: center;
                        font-size: 15px;
                        line-height: 32px;
                    }

                    #left_layout .step-title span {
                        display: inline-block;
                        font-size: 16px;
                        color: #212121;
                        width: 70%;
                        line-height: 32px;
                        /* font-family: "HelveticaNeue-Bold"; */
                        margin-left: 5px;
                    }

                    .icons {
                        float: left;
                        margin-right: 59px;
                    }

                    ul.list-icons {
                        list-style: none;
                        margin: 0;
                        padding: 0;
                    }

                    .list-icons li {
                        background-color: #69626226;
                        width: 34px;
                        height: 34px;
                        display: inline-block;
                        text-align: center;
                    }

                    .list-icons li i {
                        line-height: 34px;
                    }

                    .text-btn {
                        margin-top: 24px;
                    }

                    div#first_step_setting {
                        /* width: 200px; */
                        height: 52px;
                    }

                    .row1 ul .active {
                        background-color: #da3637;
                    }

                    .btn_size {
                        background: #768082;
                        border-color: #768082;
                    }

                    .icons-size .active {
                        background-color: #2e9d64;
                    }

                    .slider-hit-area {
                        background-color: #1b171738;
                        width: 447px;
                        height: 2px;
                        position: relative;
                        top: 2px;
                        cursor: pointer;
                    }

                    a.ui-slider-handle.ui-state-default.ui-corner-all {
                        width: 6px;
                        height: 6px;
                        position: absolute;
                        top: 246px;
                        background-color: #da3637;
                        border-radius: 100px;
                        box-shadow: 0 0 1px rgba(0, 0, 0, 0.5);
                        box-sizing: content-box;
                        border: 5px solid #fff;
                    }

                    #right_layout .step-title span {
                        display: inline-block;
                        font-size: 16px;
                        color: #212121;
                        width: 70%;
                        line-height: 32px;
                        /* font-family: "HelveticaNeue-Bold"; */
                        margin-left: 5px;
                    }

                    div#second_step_setting {
                        margin-bottom: 20px;
                    }

                    #exampleModal1 .modal-dialog {
                        max-width: 800px;
                    }

                    .enabling_checkbox {
                        display: none;
                    }

                    .enabling_label {
                        position: relative;
                        display: block;
                        padding-left: 34px;
                        margin-right: 10px;
                        width: auto;
                        height: 24px;
                        background-image: url(https://zotabox.com/media/zbv2/image/tick.png);
                        background-repeat: no-repeat;
                        cursor: pointer;
                        float: left;
                        margin-bottom: 10px;
                    }

                    #dropdownMenuButton {
                        color: #72787d;
                        background-color: #ffffff;
                        border-color: #e3e4e8;
                        width: 100%;
                        text-align: inherit;
                    }

                    .ndn-js-add {
                        width: 100px;
                        border: 1px solid #da3637;
                        text-align: center;
                        height: 35px;
                        color: #da3637;
                        margin-top: 10px;
                        background-color: #8c6c6c61;
                        cursor: pointer;
                        border-radius: 100px;
                    }

                    .ndn-js-add1 {
                        width: 100px;
                        border: 1px solid #da3637;
                        text-align: center;
                        height: 35px;
                        color: #da3637;
                        margin-top: 10px;
                        background-color: #8c6c6c61;
                        cursor: pointer;
                        border-radius: 100px;
                    }

                    .ndn-js-add:hover {
                        background-color: #989494;
                        color: #e60001;
                    }

                    .fieldtype {
                        height: calc(2.25rem + 2px);
                        padding: .375rem .75rem;
                        font-size: 14px;
                        font-weight: 400;
                        line-height: 1.5;
                        color: #495057;
                        background-color: #fff;
                        background-clip: padding-box;
                        border: 1px solid #ced4da;
                        border-radius: .25rem;
                    }

                    .fieldname, .remove {
                        height: calc(2.25rem + 2px);
                        padding: .375rem .75rem;
                        font-size: 14px;
                        font-weight: 400;
                        line-height: 1.5;
                        color: #495057;
                        background-color: #fff;
                        background-clip: padding-box;
                        border: 1px solid #ced4da;
                        border-radius: .25rem;
                    }

                    .btn_top {
                        /* float: right; */
                        margin-left: 407px;
                    }

                    .ft {
                        width: 421px;
                        text-align: center;
                        margin: auto;
                    }

                    .ct {
                        background-color: #f7f8fc;
                        transition: 0.5s;
                    }

                    .ct1 {
                        cursor: pointer;
                        transition: 0.5s;
                    }

                    .gt12 {
                        float: left;
                        transition: 0.5s;
                    }

                    .ct1_1 {
                        cursor: pointer;
                        transition: 0.5s;
                    }

                    .gt1 {
                        /* color: #495057; */
                        font-size: 21px;
                        /* margin-left: 311px; */
                        transform: rotate(270deg);
                        float: right;
                        margin-right: 7px;
                        transition: 0.5s;
                    }

                    .gt1_1 {
                        transform: rotate(90deg);
                        transition: 0.5s;
                    }

                    .ct2 select.form-control {
                        width: 250px;
                    }

                    .ztb-tab-container {
                        z-index: 9;
                        position: fixed;
                        cursor: pointer;
                        box-sizing: border-box;
                        bottom: 20px;
                        min-width: 40px;
                        right: auto;
                        left: {{$setting->locator}}%;
                    }

                    .ztb-fbc-button {
                        padding: 4px;
                        width: auto;
                        height: auto;
                        background: {{$setting->theme_color}};
                        color: #ffffff;
                        font-family: arial, helvetica, sans-serif;
                        font-size: 0px;
                        font-weight: normal;
                        text-decoration: none;
                        line-height: 32px;
                        border: medium none;
                        border-radius: 10px;
                        cursor: pointer;
                        float: left;
                        border-radius: 100px;
                    }

                    .ztb-fbc-button span {
                        font-size: 18px;
                        vertical-align: middle;
                    }

                    .tab-content1 {

                    }

                    .slidecontainer {
                        width: 100%;
                    }

                    .slider {
                        -webkit-appearance: none;
                        width: 100%;
                        height: 25px;
                        background: #1111;
                        outline: none;
                        opacity: 0.7;
                        -webkit-transition: .2s;
                        transition: opacity .2s;
                    }

                    .slider:hover {
                        opacity: 1;
                    }

                    .slider::-webkit-slider-thumb {
                        -webkit-appearance: none;
                        appearance: none;
                        width: 25px;
                        height: 25px;
                        background: #111;
                        cursor: pointer;
                    }

                    .slider::-moz-range-thumb {
                        width: 25px;
                        height: 25px;
                        background: #111;
                        cursor: pointer;
                    }

                    .btn-actions-pane-right {
                        margin: 33px 200px;
                        /* padding: 10px; */
                    }

                    .btn-actions-pane-right span {
                        padding: 10px;
                    }

                    span.tab_content0 i {
                        font-size: 50px;
                        padding: 3px;
                    }

                    textarea#logged_in_greeting {
                        height: auto;
                        position: relative;
                    }

                    textarea#logged_out_greeting {
                        height: auto;
                        position: relative;
                    }

                    small#count_in {
                        position: absolute;
                        /* margin-bottom: -10px; */
                        top: 331px;
                        left: 385px;
                    }

                    small#count_out {
                        position: absolute;
                        /* margin-bottom: -10px; */
                        top: 468px;
                        left: 385px;
                    }

                    a.btn.btn-primary {
                        color: white;
                    }

                </style>
                {{--                {{dd($_SESSION['email'])}}--}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-card mb-3 card">
                            <div class="card-header">Setting Tabs
                            </div>
                            <div class="card-body table-responsive">
                                <div class="ndn-content">
                                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                                        <button style="margin-right: 10px;" type="button" class="btn btn-primary">
                                            Basic Settings
                                        </button>
                                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                                data-target="#navbarSupportedContent"
                                                aria-controls="navbarSupportedContent" aria-expanded="false"
                                                aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon"></span>
                                        </button>

                                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                            <ul class="navbar-nav mr-auto">
                                                <li class="nav-item active">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                            data-target="#exampleModal1">
                                                        Display Options
                                                    </button>
                                                </li>
                                            </ul>

                                        </div>
                                    </nav>

                                    <div class="row">
                                        <div id="left_layout" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <div class="tab-settings white_rectangle col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div id="first_step_setting" class="step-title">
                                                    <div class="step-number-around">
                                                        <div class="step-number">1</div>
                                                    </div>
                                                    <span>Customize Your Tab</span>
                                                </div>
                                                <div class="navs">
                                                    <div class="row2">
                                                        <div class="slidecontainer form-group">
                                                            <p>Default range left slider:</p>
                                                            <input class="myRange form-control" type="range"
                                                                   min="0" max="93"
                                                                   value="{{$setting->locator}}">
                                                        </div>
                                                    </div>
                                                    <div class="row1">
                                                        <div class="slidecontainer form-group">
                                                            <p>Default range top slider:</p>
                                                            <input class="myRange1 form-control" type="range"
                                                                   min="0" max="93"
                                                                   value="{{$setting->locator_top}}">
                                                        </div>
                                                    </div>
                                                    <div class="row1">
                                                        <div class="form-group">
                                                            <label>Theme color</label>
                                                            <input type="color" class="form-control theme_color"
                                                                   value="{{$setting->theme_color}}">
                                                            <small class="form-text text-muted">Supports any hexidecimal
                                                                color code with a leading number sign (e.g. #0084FF),
                                                                except white. We highly recommend you choose a color
                                                                that has a high contrast to white.</small>

                                                        </div>
                                                    </div>
                                                    <div class="row3">
                                                        <div class="form-group">
                                                            <label>Logged in greeting</label>
                                                            <textarea id="logged_in_greeting" maxlength="80" type="text"
                                                                      class="form-control"
                                                                      placeholder="...">{{$setting->logged_in_greeting}}</textarea>
                                                            <small id="count_in"></small>
                                                            <small class="form-text text-muted">The greeting text that
                                                                will be displayed if the user is currently logged in to
                                                                Facebook. Maximum 80 characters.</small>

                                                        </div>
                                                    </div>
                                                    <div class="row6">
                                                        <div class="form-group">
                                                            <label>Logged out greeting</label>
                                                            <textarea id="logged_out_greeting" maxlength="80"
                                                                      type="text" class="form-control"
                                                                      placeholder="...">{{$setting->logged_out_greeting}}</textarea>
                                                            <small id="count_out"></small>
                                                            <small class="form-text text-muted">he greeting text that
                                                                will be displayed if the user is currently not logged in
                                                                to Facebook. Maximum 80 characters.</small>

                                                        </div>
                                                    </div>
                                                    <div class="row4">
                                                        <div class="form-group">
                                                            <label>Greeting dialog display</label>
                                                            <select class="form-control" name=""
                                                                    id="greeting_dialog_display">
                                                                <option value="show" {{$setting->greeting_dialog_display == 'show' ? "selected='selected'" : ''}}>
                                                                    show
                                                                </option>
                                                                <option value="fade" {{$setting->greeting_dialog_display == 'fade' ? "selected='selected'" : ''}}>
                                                                    fade
                                                                </option>
                                                                <option value="hide" {{$setting->greeting_dialog_display == 'hide' ? "selected='selected'" : ''}}>
                                                                    hide
                                                                </option>
                                                            </select>
                                                            <small class="form-text text-muted">Defaults to show on
                                                                desktop and hide on mobile.</small>
                                                        </div>
                                                    </div>
                                                    <div class="row5">
                                                        <div class="form-group">
                                                            <label>Greeting dialog delay</label>
                                                            <input id="greeting_dialog_delay" type="number"
                                                                   class="form-control"
                                                                   placeholder="..."
                                                                   value="{{$setting->greeting_dialog_delay}}">
                                                            <small class="form-text text-muted">Sets the number of
                                                                seconds of delay before the greeting dialog is shown
                                                                after the plugin is loaded. This can be used to
                                                                customize when you want the greeting dialog to
                                                                appear.</small>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="right_layout" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <div id="banner_properties" class="white_rectangle col-xs-12">
                                                <div id="second_step_setting" class="step-title">
                                                    <div class="step-number-around">
                                                        <div class="step-number">2</div>
                                                    </div>
                                                    <span>Connect Your Facebook Fanpage</span>
                                                </div>
                                                <div class="form-group">
                                                    <style>
                                                        .fb_iframe_widget {
                                                            margin-left: 170px;
                                                        }
                                                    </style>
                                                    <fb:login-button scope="public_profile,email,pages_show_list,pages_read_engagement,pages_manage_metadata,pages_messaging" onlogin="checkLoginState();">
                                                        <a id="connect_with_page_facebook"
                                                           {{--                                                                                                              href="{{ url('/auth/redirect/facebook') }}"--}}
                                                           {{--                                                        href="https://www.facebook.com/v9.0/dialog/oauth?response_type=token&display=popup&client_id=1019783021844319&redirect_uri=https%3A%2F%2Fdevelopers.facebook.com%2Ftools%2Fexplorer%2Fcallback%3Fmethod%3DGET%26path%3Dme%252Faccounts%26version%3Dv9.0&scope=pages_read_engagement"--}}
                                                           href="{{ route('setting.loginFB') }}"
                                                           class="btn btn-primary" target="_blank">Connect
                                                            with Facebook</a>
                                                    </fb:login-button>
                                                    <small class="form-text text-muted">If your fanpage keeps loading, please turn off the popup blocker on your browser</small>
                                                </div>
                                            </div>
                                            <div id="banner_properties" class="white_rectangle col-xs-12">
                                                <div id="second_step_setting" class="step-title">
                                                    <div class="step-number-around">
                                                        <div class="step-number">3</div>
                                                    </div>
                                                    <span>Whitelist your domain</span>
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" type="text" placeholder="Copy and paste your website from your browser here">
                                                    <small class="form-text text-muted">If your fanpage keeps loading, please turn off the popup blocker on your browser</small>
                                                </div>

                                            </div>
                                            <div id="banner_properties" class="white_rectangle col-xs-12">
                                                <div id="second_step_setting" class="step-title">
                                                    <div class="step-number-around">
                                                        <div class="step-number">4</div>
                                                    </div>
                                                    <span>Status</span>
                                                </div>
                                                <form id="setting-form" class="form-group" method="GET"
                                                      enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    <div class="form-group row">
                                                        <label for="status"
                                                               class="col-sm-3 col-form-label">Status</label>
                                                        <div class="col-sm-9">
                                                            <label class="switch checkbox" data-toggle="tooltip"
                                                                   data-placement="right"
                                                                   title=""
                                                                   data-original-title="Click to Enable/Disable">
                                                                <input class="form-control" type="checkbox" id="status"
                                                                       name="status"
                                                                       @if($setting->status == 1)checked="checked"@endif
                                                                >
                                                                <span class="slider round"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="btn-actions-pane-right">
                                                        <div role="group" class="btn-group-sm btn-group">
                                                            <a class="btn btn-primary save_setting" href="">
                                                                <span><i class="fa fa-plus-circle"></i> Save </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cnt_chat">
                                        <div class="ztb-tab-container ztb-left-button" style="min-width: 259px;">

                                            <div id="ztb-fbc-show-widget" class="ztb-fbc-button">
                                                <span class="tab_content0"><i
                                                            class="fab fa-facebook-messenger"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('backend.v2.other-apps')
            </div>
            @include('backend.v2.layouts.footer-wrapper')
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">DISPLAY OPTIONS</h5>
                <div class="btn_top">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-5 col-sm-5 col-md-5 col-lg-5 col-xl-5">
                        <div class="ndn-content2">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Example select</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Example select</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Example select</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input class="enabling_checkbox" name="active[isOn]" type="checkbox"
                                       id="active_time_enable">
                                <label class="enabling_label dropdown_label" for="active_time_enable">
                                    Activate date/time
                                </label>
                                <input style="display: none" class="form-control ip_datte1" type="datetime-local"
                                       value="2018-07-22">
                            </div>
                            <div>
                                <div class="form-group">
                                    <label style="font-size: 11px;">* Tool will turn on/off automatically at selected
                                        time</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-7 col-sm-7 col-md-7 col-lg-7 col-xl-7">
                        <div class="ndn-content2">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Example select</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Example select</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Example select</label>
                                    <select class="form-control" id="ndn_select1">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option value="sl_4">Show on selectpage</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div style="display: none" class="ndn-js-1">
                                    <div id="buildyourform">

                                    </div>
                                    <div class="ndn-js-add">
                                        <div class="add_item1">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                            <span style="line-height: 35px;" id="add_page_text">Add page</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="ct">
                                    <div class="ct1 form-group">
                                        <div class="ct1_1">
                                            <div class="gt12">General Settings</div>
                                            <div class="gt1">></div>
                                        </div>
                                        <div style="clear: both"></div>
                                    </div>
                                    <div style="display: none" class="ct2">
                                        <select id="ndn_select2" class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option value="sl_5">Show on selectpage</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <div style="display: none" class="ndn-js-2">
                                        <div id="buildyourform1">

                                        </div>
                                        <div class="ndn-js-add1">
                                            <div class="add_item1">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                                <span style="line-height: 35px;" id="add_page_text">Add page</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div style="font-size: 11px;" class="ft">Get new ideas for your site with our display option user guide.
                    Advanced display options not available in preview mode
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function () {
        $('.list-icons li').click(function (e) {
            e.preventDefault();
            $('.list-icons li').removeClass('active');
            $(this).addClass('active');
        });
        $('.icons-size .btn_size').click(function () {
            $('.icons-size button').removeClass('active');
            $(this).addClass('active');
        });
        $(".enabling_label").click(function () {
            if ($('.enabling_checkbox')[0].checked == true) {
                $(".enabling_label").css('background-position', 'top 0 left 0');
            } else
                $(".enabling_label").css('background-position', 'top -79px left 0');
            $(".ip_datte1").toggle();
        });
        $('#ndn_select1').change(function () {
            if ($('#ndn_select1').val() == 'sl_4') {
                $('.ndn-js-1').css('display', 'block');
            } else
                $('.ndn-js-1').css('display', 'none');
        })
        $('.ndn-js-add').click(function () {
            var lastField = $("#buildyourform div:last");
            var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
            var fieldWrapper = $("<div class=\"fieldwrapper\" id=\"field" + intId + "\"/>");
            fieldWrapper.data("idx", intId);
            var fName = $("<input type=\"text\" class=\"fieldname\" />");
            var fType = $("<select class=\"fieldtype\"><option value=\"checkbox\">Checked</option><option value=\"textbox\">Text</option><option value=\"textarea\">Paragraph</option></select>");
            var removeButton = $("<input type=\"button\" class=\"remove\" value=\"-\" />");
            removeButton.click(function () {
                $(this).parent().remove();
            });
            fieldWrapper.append(fType);
            fieldWrapper.append(fName);
            fieldWrapper.append(removeButton);
            $("#buildyourform").append(fieldWrapper);
        });
        $('.ct1_1').click(function () {
            $('.gt1').toggleClass('gt1_1');
            $('.ndn-js-2').css('display', 'none');
            $('.ct2').toggle();
        });
        $('#ndn_select2').change(function () {
            if ($('#ndn_select2').val() == 'sl_5') {
                $('.ndn-js-2').css('display', 'block');
            } else
                $('.ndn-js-2').css('display', 'none');
        })
        $('.ndn-js-add1').click(function () {
            var lastField = $("#buildyourform1 div:last");
            var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
            var fieldWrapper = $("<div class=\"fieldwrapper\" id=\"field" + intId + "\"/>");
            fieldWrapper.data("idx", intId);
            var fName = $("<input type=\"text\" class=\"fieldname\" />");
            var fType = $("<select class=\"fieldtype\"><option value=\"checkbox\">Checked</option><option value=\"textbox\">Text</option><option value=\"textarea\">Paragraph</option></select>");
            var removeButton = $("<input type=\"button\" class=\"remove\" value=\"-\" />");
            removeButton.click(function () {
                $(this).parent().remove();
            });
            fieldWrapper.append(fType);
            fieldWrapper.append(fName);
            fieldWrapper.append(removeButton);
            $("#buildyourform1").append(fieldWrapper);
        });


        $('.text_in').keyup(function () {
            let text = $(this).val();
            $('.tab-content1').html(text).css('padding-right', '10px');
        });
        $('.myRange').on('input', function () {
            let dag = $(this).val();
            $('.ztb-tab-container').css('left', dag + '%');
        });
        $('.myRange1').on('input', function () {
            let dag = $(this).val();
            $('.ztb-tab-container').css('top', dag + '%');
        });
        $("#logged_in_greeting").keyup(function () {
            $("#count_in").text($(this).val().length + "/80 character");
            console.log($(this).val().length);
        });
        $("#logged_out_greeting").keyup(function () {
            $("#count_out").text($(this).val().length + "/80 character");
        });
        $(".theme_color").change(function () {
            $('#ztb-fbc-show-widget').css('background-color', $(this).val());
        });
        $("#connect_with_page_facebook").on("click", function (e){
            e.preventDefault();
            $( "._li" ).trigger( "click" );
        })

    });
</script>
<script>
    $(function () {
        $('.save_setting').click(function (e) {
            e.preventDefault();
            let locator = $('.myRange').val();
            let locator_top = $('.myRange1').val();
            let theme_color = $('.theme_color').val();
            let logged_in_greeting = $('#logged_in_greeting').val();
            let logged_out_greeting = $('#logged_out_greeting').val();
            let greeting_dialog_display = $('#greeting_dialog_display').val();
            let greeting_dialog_delay = $('#greeting_dialog_delay').val();
            let status = $('#setting-form').serialize();
            let length = status.length;
            status = status.substr(length - 2);
            let route = '{{route('setting.update')}}';

            //alert(status);
            $.ajax({
                url: route,
                data: {
                    theme_color: theme_color,
                    logged_in_greeting: logged_in_greeting,
                    logged_out_greeting: logged_out_greeting,
                    greeting_dialog_display: greeting_dialog_display,
                    locator: locator,
                    locator_top: locator_top,
                    greeting_dialog_delay: greeting_dialog_delay,
                    status: status
                }
            })
                .done(function (data) {
                    console.log(data.message);
                });
        });
    })
</script>
<script>

    function statusChangeCallback(response) {  // Called with the results from FB.getLoginStatus().
        console.log('statusChangeCallback');
        console.log(response);                   // The current login status of the person.
        if (response.status === 'connected') {   // Logged into your webpage and Facebook.
            testAPI();
            let url = '{{route('setting.loginFB')}}';
            let accessToken = response.authResponse.accessToken;
            //console.log(accessToken);
        // $.ajax({
        //         method: "POST",
        //         url: url,
        //         data: { accessToken: accessToken}
        //     })
        //         .done(function( msg ) {
        //             alert( "Data Saved: ");
        //         });
        }
    }


    function checkLoginState() {               // Called when a person is finished with the Login Button.
        FB.getLoginStatus(function(response) {   // See the onlogin handler
            statusChangeCallback(response);
        });
    }


    window.fbAsyncInit = function() {
        FB.init({
            appId      : '1019783021844319',
            cookie     : true,                     // Enable cookies to allow the server to access the session.
            xfbml      : true,                     // Parse social plugins on this webpage.
            version    : 'v9.0'           // Use this Graph API version for this call.
        });


        FB.getLoginStatus(function(response) {   // Called after the JS SDK has been initialized.
            statusChangeCallback(response);        // Returns the login status.
        });
    };

    function testAPI() {                      // Testing Graph API after login.  See statusChangeCallback() for when this call is made.
        console.log('Welcome!  Fetching your information.... ');
        FB.api('/me', function(response) {
            console.log('Successful login for: ' + response.name);
            document.getElementById('status').innerHTML =
                'Thanks for logging in, ' + response.name + '!';
        });
    }

</script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
@include('backend.v2.footer')