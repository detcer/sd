@php
    $usersCount     = DB::table('users')->count();
    $providerCount  = DB::table('users')->where('userType', 'provider')->count();
    $clientCount    = DB::table('users')->where('userType', 'client')->count();

@endphp

<!-- begin #sidebar -->
<div id="sidebar" class="sidebar">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
            <li class="nav-profile">
                <a href="javascript:;" data-toggle="nav-profile">
                    <div class="cover with-shadow"></div>
                    <div class="image">
                        <img src="/admin/assets/img/user/user-13.jpg" alt="" />
                    </div>
{{--                    <div class="info">--}}
{{--                        <b class="caret pull-right"></b>--}}
{{--                        Sean Ngu--}}
{{--                        <small>Front end developer</small>--}}
{{--                    </div>--}}
                </a>
            </li>
{{--            <li>--}}
{{--                <ul class="nav nav-profile">--}}
{{--                    <li><a href="javascript:;"><i class="fa fa-cog"></i> Settings</a></li>--}}
{{--                    <li><a href="javascript:;"><i class="fa fa-pencil-alt"></i> Send Feedback</a></li>--}}
{{--                    <li><a href="javascript:;"><i class="fa fa-question-circle"></i> Helps</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
        </ul>
        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul class="nav">
            <li class="nav-header">Навигация</li>
            <li>
                <a href="{{ route('admin-root') }}">
                    <i class="fa fa-th-large"></i>
                    <span>Главная  </span>
                </a>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <span class="badge pull-right">{{$usersCount}}</span>
                    <i class="fa fa-hdd"></i>
                    <span>Пользователи </span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{{route('admin.users.client')}}"  >Client                       <span class="badge pull-right">{{$clientCount}}</span></a></li>
                    <li><a href="{{route('admin.users.provider')}}">Provider                     <span class="badge pull-right">{{$providerCount}}</span></a></li>
                </ul>
            </li>

            <li class="has-sub">
                <a href="javascript:;">
                    <span class="badge pull-right">{{$providerCount}}</span>
                    <i class="fa fa-hdd"></i>
                    <span>Bumps & USD</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{{route('admin.users.money')}}"> Все пользователи </a></li>
                </ul>
            </li>

            <li>
                <a href="{{route('admin.users.reviews')}}">
                    <i class="fas fa-hands-helping"></i>
                    <span>Отзывы</span>
                </a>
            </li>
            <li>
                <a href="{{ route( 'admin.categories.index' ) }} ">
                    <i class="fas fa-list-alt"></i>
                    <span>Категории</span>
                </a>
            </li>

            <li>
                <a href="{{route('admin.users.complaints')}}">
                    <i class="far fa-angry"></i>
                    <span>Жалобы</span>
                </a>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <i class="fas fa-edit"></i>
                    <span>Страницы </span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{{route('admin.pageEdit.info')}}"      >Info             </a></li>
                    <li><a href="{{route('admin.pageEdit.termOfService')}}">Terms of service </a></li>
                    <li><a href="{{route('admin.pageEdit.privacyPolicy')}}">Privacy Policy   </a></li>
                    <li><a href="{{route('admin.filter.state')}}"     >For state     </a></li>
                    <li><a href="{{route('admin.filter.city')}}"     >For city     </a></li>
                    <li><a href="{{route('admin.filter.services')}}"     >For service     </a></li>
                    <li><a href="{{route('admin.page.other')}}"     >Other page    </a></li>
                    <li><a href="{{route('admin.pageAdd')}}"     >Add page +    </a></li>
                </ul>
            </li>

{{--            <li class="has-sub">--}}
{{--                <a href="javascript:;">--}}
{{--                    <span class="badge pull-right">10</span>--}}
{{--                    <i class="fa fa-hdd"></i>--}}
{{--                    <span>Email</span>--}}
{{--                </a>--}}
{{--                <ul class="sub-menu">--}}
{{--                    <li><a href="email_inbox.html">Inbox</a></li>--}}
{{--                    <li><a href="email_compose.html">Compose</a></li>--}}
{{--                    <li><a href="email_detail.html">Detail</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="widget.html">--}}
{{--                    <i class="fab fa-simplybuilt"></i>--}}
{{--                    <span>Widgets <span class="label label-theme">NEW</span></span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="has-sub">--}}
{{--                <a href="javascript:;">--}}
{{--                    <b class="caret"></b>--}}
{{--                    <i class="fa fa-gem"></i>--}}
{{--                    <span>UI Elements <span class="label label-theme">NEW</span></span>--}}
{{--                </a>--}}
{{--                <ul class="sub-menu">--}}
{{--                    <li><a href="ui_general.html">General <i class="fa fa-paper-plane text-theme"></i></a></li>--}}
{{--                    <li><a href="ui_typography.html">Typography</a></li>--}}
{{--                    <li><a href="ui_tabs_accordions.html">Tabs & Accordions</a></li>--}}
{{--                    <li><a href="ui_unlimited_tabs.html">Unlimited Nav Tabs</a></li>--}}
{{--                    <li><a href="ui_modal_notification.html">Modal & Notification <i class="fa fa-paper-plane text-theme"></i></a></li>--}}
{{--                    <li><a href="ui_widget_boxes.html">Widget Boxes</a></li>--}}
{{--                    <li><a href="ui_media_object.html">Media Object</a></li>--}}
{{--                    <li><a href="ui_buttons.html">Buttons  <i class="fa fa-paper-plane text-theme"></i></a></li>--}}
{{--                    <li><a href="ui_icons.html">Icons</a></li>--}}
{{--                    <li><a href="ui_simple_line_icons.html">Simple Line Icons</a></li>--}}
{{--                    <li><a href="ui_ionicons.html">Ionicons</a></li>--}}
{{--                    <li><a href="ui_tree.html">Tree View</a></li>--}}
{{--                    <li><a href="ui_language_bar_icon.html">Language Bar & Icon</a></li>--}}
{{--                    <li><a href="ui_social_buttons.html">Social Buttons</a></li>--}}
{{--                    <li><a href="ui_tour.html">Intro JS</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="bootstrap_4.html">--}}
{{--                    <div class="icon-img">--}}
{{--                        <img src="../assets/img/logo/logo-bs4.png" alt="" />--}}
{{--                    </div>--}}
{{--                    <span>Bootstrap 4 <span class="label label-theme">NEW</span></span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="has-sub">--}}
{{--                <a href="javascript:;">--}}
{{--                    <b class="caret"></b>--}}
{{--                    <i class="fa fa-list-ol"></i>--}}
{{--                    <span>Form Stuff <span class="label label-theme">NEW</span></span>--}}
{{--                </a>--}}
{{--                <ul class="sub-menu">--}}
{{--                    <li><a href="form_elements.html">Form Elements <i class="fa fa-paper-plane text-theme"></i></a></li>--}}
{{--                    <li><a href="form_plugins.html">Form Plugins <i class="fa fa-paper-plane text-theme"></i></a></li>--}}
{{--                    <li><a href="form_slider_switcher.html">Form Slider + Switcher</a></li>--}}
{{--                    <li><a href="form_validation.html">Form Validation</a></li>--}}
{{--                    <li><a href="form_wizards.html">Wizards</a></li>--}}
{{--                    <li><a href="form_wizards_validation.html">Wizards + Validation</a></li>--}}
{{--                    <li><a href="form_wysiwyg.html">WYSIWYG</a></li>--}}
{{--                    <li><a href="form_editable.html">X-Editable</a></li>--}}
{{--                    <li><a href="form_multiple_upload.html">Multiple File Upload</a></li>--}}
{{--                    <li><a href="form_summernote.html">Summernote</a></li>--}}
{{--                    <li><a href="form_dropzone.html">Dropzone</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class="has-sub">--}}
{{--                <a href="javascript:;">--}}
{{--                    <b class="caret"></b>--}}
{{--                    <i class="fa fa-table"></i>--}}
{{--                    <span>Tables</span>--}}
{{--                </a>--}}
{{--                <ul class="sub-menu">--}}
{{--                    <li><a href="table_basic.html">Basic Tables</a></li>--}}
{{--                    <li class="has-sub">--}}
{{--                        <a href="javascript:;"><b class="caret"></b> Managed Tables</a>--}}
{{--                        <ul class="sub-menu">--}}
{{--                            <li><a href="table_manage.html">Default</a></li>--}}
{{--                            <li><a href="table_manage_autofill.html">Autofill</a></li>--}}
{{--                            <li><a href="table_manage_buttons.html">Buttons</a></li>--}}
{{--                            <li><a href="table_manage_colreorder.html">ColReorder</a></li>--}}
{{--                            <li><a href="table_manage_fixed_columns.html">Fixed Column</a></li>--}}
{{--                            <li><a href="table_manage_fixed_header.html">Fixed Header</a></li>--}}
{{--                            <li><a href="table_manage_keytable.html">KeyTable</a></li>--}}
{{--                            <li><a href="table_manage_responsive.html">Responsive</a></li>--}}
{{--                            <li><a href="table_manage_rowreorder.html">RowReorder</a></li>--}}
{{--                            <li><a href="table_manage_scroller.html">Scroller</a></li>--}}
{{--                            <li><a href="table_manage_select.html">Select</a></li>--}}
{{--                            <li><a href="table_manage_combine.html">Extension Combination</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class="has-sub">--}}
{{--                <a href="javascript:;">--}}
{{--                    <b class="caret"></b>--}}
{{--                    <i class="fa fa-star"></i>--}}
{{--                    <span>Front End</span>--}}
{{--                </a>--}}
{{--                <ul class="sub-menu">--}}
{{--                    <li><a href="../../frontend/one-page-parallax/" target="_blank">One Page Parallax</a></li>--}}
{{--                    <li><a href="../../frontend/blog/" target="_blank">Blog</a></li>--}}
{{--                    <li><a href="../../frontend/forum/" target="_blank">Forum</a></li>--}}
{{--                    <li><a href="../../frontend/e-commerce/" target="_blank">E-Commerce</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class="has-sub">--}}
{{--                <a href="javascript:;">--}}
{{--                    <b class="caret"></b>--}}
{{--                    <i class="fa fa-envelope"></i>--}}
{{--                    <span>Email Template</span>--}}
{{--                </a>--}}
{{--                <ul class="sub-menu">--}}
{{--                    <li><a href="email_system.html">System Template</a></li>--}}
{{--                    <li><a href="email_newsletter.html">Newsletter Template</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class="has-sub">--}}
{{--                <a href="javascript:;">--}}
{{--                    <b class="caret"></b>--}}
{{--                    <i class="fa fa-chart-pie"></i>--}}
{{--                    <span>Chart <span class="label label-theme">NEW</span></span>--}}
{{--                </a>--}}
{{--                <ul class="sub-menu">--}}
{{--                    <li><a href="chart-flot.html">Flot Chart</a></li>--}}
{{--                    <li><a href="chart-morris.html">Morris Chart</a></li>--}}
{{--                    <li><a href="chart-js.html">Chart JS</a></li>--}}
{{--                    <li><a href="chart-d3.html">d3 Chart</a></li>--}}
{{--                    <li><a href="chart-apex.html">Apex Chart <i class="fa fa-paper-plane text-theme"></i></a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li><a href="calendar.html"><i class="fa fa-calendar"></i> <span>Calendar</span></a></li>--}}
{{--            <li class="has-sub">--}}
{{--                <a href="javascript:;">--}}
{{--                    <b class="caret"></b>--}}
{{--                    <i class="fa fa-map"></i>--}}
{{--                    <span>Map</span>--}}
{{--                </a>--}}
{{--                <ul class="sub-menu">--}}
{{--                    <li><a href="map_vector.html">Vector Map</a></li>--}}
{{--                    <li><a href="map_google.html">Google Map</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class="has-sub">--}}
{{--                <a href="javascript:;">--}}
{{--                    <b class="caret"></b>--}}
{{--                    <i class="fa fa-image"></i>--}}
{{--                    <span>Gallery</span>--}}
{{--                </a>--}}
{{--                <ul class="sub-menu">--}}
{{--                    <li><a href="gallery.html">Gallery v1</a></li>--}}
{{--                    <li><a href="gallery_v2.html">Gallery v2</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class="has-sub">--}}
{{--                <a href="javascript:;">--}}
{{--                    <b class="caret"></b>--}}
{{--                    <i class="fa fa-cogs"></i>--}}
{{--                    <span>Page Options</span>--}}
{{--                </a>--}}
{{--                <ul class="sub-menu">--}}
{{--                    <li><a href="page_blank.html">Blank Page</a></li>--}}
{{--                    <li><a href="page_with_footer.html">Page with Footer</a></li>--}}
{{--                    <li><a href="page_without_sidebar.html">Page without Sidebar</a></li>--}}
{{--                    <li><a href="page_with_right_sidebar.html">Page with Right Sidebar</a></li>--}}
{{--                    <li><a href="page_with_minified_sidebar.html">Page with Minified Sidebar</a></li>--}}
{{--                    <li><a href="page_with_two_sidebar.html">Page with Two Sidebar</a></li>--}}
{{--                    <li><a href="page_with_line_icons.html">Page with Line Icons</a></li>--}}
{{--                    <li><a href="page_with_ionicons.html">Page with Ionicons</a></li>--}}
{{--                    <li><a href="page_full_height.html">Full Height Content</a></li>--}}
{{--                    <li><a href="page_with_wide_sidebar.html">Page with Wide Sidebar</a></li>--}}
{{--                    <li><a href="page_with_light_sidebar.html">Page with Light Sidebar</a></li>--}}
{{--                    <li><a href="page_with_mega_menu.html">Page with Mega Menu</a></li>--}}
{{--                    <li><a href="page_with_top_menu.html">Page with Top Menu</a></li>--}}
{{--                    <li><a href="page_with_boxed_layout.html">Page with Boxed Layout</a></li>--}}
{{--                    <li><a href="page_with_mixed_menu.html">Page with Mixed Menu</a></li>--}}
{{--                    <li><a href="page_boxed_layout_with_mixed_menu.html">Boxed Layout with Mixed Menu</a></li>--}}
{{--                    <li><a href="page_with_transparent_sidebar.html">Page with Transparent Sidebar</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class="has-sub">--}}
{{--                <a href="javascript:;">--}}
{{--                    <b class="caret"></b>--}}
{{--                    <i class="fa fa-gift"></i>--}}
{{--                    <span>Extra</span>--}}
{{--                </a>--}}
{{--                <ul class="sub-menu">--}}
{{--                    <li><a href="extra_timeline.html">Timeline</a></li>--}}
{{--                    <li><a href="extra_coming_soon.html">Coming Soon Page</a></li>--}}
{{--                    <li><a href="extra_search_results.html">Search Results</a></li>--}}
{{--                    <li><a href="extra_invoice.html">Invoice</a></li>--}}
{{--                    <li><a href="extra_404_error.html">404 Error Page</a></li>--}}
{{--                    <li><a href="extra_profile.html">Profile Page</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class="has-sub">--}}
{{--                <a href="javascript:;">--}}
{{--                    <b class="caret"></b>--}}
{{--                    <i class="fa fa-key"></i>--}}
{{--                    <span>Login & Register</span>--}}
{{--                </a>--}}
{{--                <ul class="sub-menu">--}}
{{--                    <li><a href="login.html">Login</a></li>--}}
{{--                    <li><a href="login_v2.html">Login v2</a></li>--}}
{{--                    <li><a href="login_v3.html">Login v3</a></li>--}}
{{--                    <li><a href="register_v3.html">Register v3</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class="has-sub">--}}
{{--                <a href="javascript:;">--}}
{{--                    <b class="caret"></b>--}}
{{--                    <i class="fa fa-cubes"></i>--}}
{{--                    <span>Version <span class="label label-theme">NEW</span></span>--}}
{{--                </a>--}}
{{--                <ul class="sub-menu">--}}
{{--                    <li><a href="javascript:;">HTML</a></li>--}}
{{--                    <li><a href="../ajax/">AJAX</a></li>--}}
{{--                    <li><a href="../angularjs/">ANGULAR JS</a></li>--}}
{{--                    <li><a href="../angularjs8/">ANGULAR JS 8 <i class="fa fa-paper-plane text-theme"></i></a></li>--}}
{{--                    <li><a href="../laravel/">LARAVEL <i class="fa fa-paper-plane text-theme"></i></a></li>--}}
{{--                    <li><a href="../vuejs/">VUE JS <i class="fa fa-paper-plane text-theme"></i></a></li>--}}
{{--                    <li><a href="../reactjs/">REACT JS <i class="fa fa-paper-plane text-theme"></i></a></li>--}}
{{--                    <li><a href="../material/">MATERIAL DESIGN</a></li>--}}
{{--                    <li><a href="../apple/">APPLE DESIGN</a></li>--}}
{{--                    <li><a href="../transparent/">TRANSPARENT DESIGN <i class="fa fa-paper-plane text-theme"></i></a></li>--}}
{{--                    <li><a href="../facebook/">FACEBOOK DESIGN <i class="fa fa-paper-plane text-theme"></i></a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class="has-sub">--}}
{{--                <a href="javascript:;">--}}
{{--                    <b class="caret"></b>--}}
{{--                    <i class="fa fa-medkit"></i>--}}
{{--                    <span>Helper</span>--}}
{{--                </a>--}}
{{--                <ul class="sub-menu">--}}
{{--                    <li><a href="helper_css.html">Predefined CSS Classes</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class="has-sub">--}}
{{--                <a href="javascript:;">--}}
{{--                    <b class="caret"></b>--}}
{{--                    <i class="fa fa-align-left"></i>--}}
{{--                    <span>Menu Level</span>--}}
{{--                </a>--}}
{{--                <ul class="sub-menu">--}}
{{--                    <li class="has-sub">--}}
{{--                        <a href="javascript:;">--}}
{{--                            <b class="caret"></b>--}}
{{--                            Menu 1.1--}}
{{--                        </a>--}}
{{--                        <ul class="sub-menu">--}}
{{--                            <li class="has-sub">--}}
{{--                                <a href="javascript:;">--}}
{{--                                    <b class="caret"></b>--}}
{{--                                    Menu 2.1--}}
{{--                                </a>--}}
{{--                                <ul class="sub-menu">--}}
{{--                                    <li><a href="javascript:;">Menu 3.1</a></li>--}}
{{--                                    <li><a href="javascript:;">Menu 3.2</a></li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                            <li><a href="javascript:;">Menu 2.2</a></li>--}}
{{--                            <li><a href="javascript:;">Menu 2.3</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <li><a href="javascript:;">Menu 1.2</a></li>--}}
{{--                    <li><a href="javascript:;">Menu 1.3</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <!-- begin sidebar minify button -->--}}
{{--            <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>--}}
            <!-- end sidebar minify button -->
        </ul>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>
<!-- end #sidebar -->
