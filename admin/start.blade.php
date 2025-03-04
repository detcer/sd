
@include('admin.head.head');

<body>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-150088019-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-150088019-1');
</script>
<style>

    .toggleSpin {
        -moz-transition:    all 0.5s;
        -webkit-transition: all 0.5s;
        transition: all 0.5s;
    }

    .flip {
        transform: rotate(-180deg);
    }

</style>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- end #page-loader -->

	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
		<!-- begin #header -->
        @include('admin.head.header');
		<!-- end #header -->


		<!-- begin #sidebar -->
        @include('admin.part.sideBar');
		<!-- end #sidebar -->

        @yield('content');

		<!-- begin theme-panel -->
		<div class="theme-panel theme-panel-lg">
			<a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i class="fa fa-cog"></i></a>
			<div class="theme-panel-content">
				<h5>App Settings</h5>
				<ul class="theme-list clearfix">
					<li><a href="javascript:;" class="bg-red" data-theme="red" data-theme-file=/admin/assets/css/default/theme/red.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Red">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-pink" data-theme="pink" data-theme-file=/admin/assets/css/default/theme/pink.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Pink">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-orange" data-theme="orange" data-theme-file=/admin/assets/css/default/theme/orange.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Orange">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-yellow" data-theme="yellow" data-theme-file=/admin/assets/css/default/theme/yellow.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Yellow">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-lime" data-theme="lime" data-theme-file=/admin/assets/css/default/theme/lime.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Lime">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-green" data-theme="green" data-theme-file=/admin/assets/css/default/theme/green.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Green">&nbsp;</a></li>
					<li class="active"><a href="javascript:;" class="bg-teal" data-theme="default" data-theme-file="" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Default">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-aqua" data-theme="aqua" data-theme-file=/admin/assets/css/default/theme/aqua.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Aqua">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-blue" data-theme="blue" data-theme-file=/admin/assets/css/default/theme/blue.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Blue">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-purple" data-theme="purple" data-theme-file=/admin/assets/css/default/theme/purple.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Purple">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-indigo" data-theme="indigo" data-theme-file=/admin/assets/css/default/theme/indigo.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Indigo">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-black" data-theme="black" data-theme-file=/admin/assets/css/default/theme/black.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Black">&nbsp;</a></li>
				</ul>
				<div class="divider"></div>
				<div class="row m-t-10">
					<div class="col-6 control-label text-inverse f-w-600">Header Fixed</div>
					<div class="col-6 d-flex">
						<div class="custom-control custom-switch ml-auto">
							<input type="checkbox" class="custom-control-input" name="header-fixed" id="headerFixed" value="1" checked />
							<label class="custom-control-label" for="headerFixed">&nbsp;</label>
						</div>
					</div>
				</div>
				<div class="row m-t-10">
					<div class="col-6 control-label text-inverse f-w-600">Header Inverse</div>
					<div class="col-6 d-flex">
						<div class="custom-control custom-switch ml-auto">
							<input type="checkbox" class="custom-control-input" name="header-inverse" id="headerInverse" value="1" />
							<label class="custom-control-label" for="headerInverse">&nbsp;</label>
						</div>
					</div>
				</div>
				<div class="row m-t-10">
					<div class="col-6 control-label text-inverse f-w-600">Sidebar Fixed</div>
					<div class="col-6 d-flex">
						<div class="custom-control custom-switch ml-auto">
							<input type="checkbox" class="custom-control-input" name="sidebar-fixed" id="sidebarFixed" value="1" checked />
							<label class="custom-control-label" for="sidebarFixed">&nbsp;</label>
						</div>
					</div>
				</div>
				<div class="row m-t-10">
					<div class="col-6 control-label text-inverse f-w-600">Sidebar Grid</div>
					<div class="col-6 d-flex">
						<div class="custom-control custom-switch ml-auto">
							<input type="checkbox" class="custom-control-input" name="sidebar-grid" id="sidebarGrid" value="1" />
							<label class="custom-control-label" for="sidebarGrid">&nbsp;</label>
						</div>
					</div>
				</div>
				<div class="row m-t-10">
					<div class="col-md-6 control-label text-inverse f-w-600">Sidebar Gradient</div>
					<div class="col-md-6 d-flex">
						<div class="custom-control custom-switch ml-auto">
							<input type="checkbox" class="custom-control-input" name="sidebar-gradient" id="sidebarGradient" value="1" />
							<label class="custom-control-label" for="sidebarGradient">&nbsp;</label>
						</div>
					</div>
				</div>
				<div class="divider"></div>
				<h5>Admin Design (5)</h5>
				<div class="theme-version">
					<a href=/html/index_v2.html" class="active">
						<span style="background-image: url(/admin/assets/img/theme/default.jpg);"></span>
					</a>
					<a href=/transparent/index_v2.html">
						<span style="background-image: url(/admin/assets/img/theme/transparent.jpg);"></span>
					</a>
				</div>
				<div class="theme-version">
					<a href=/apple/index_v2.html">
						<span style="background-image: url(/admin/assets/img/theme/apple.jpg);"></span>
					</a>
					<a href=/material/index_v2.html">
						<span style="background-image: url(/admin/assets/img/theme/material.jpg);"></span>
					</a>
				</div>
				<div class="theme-version">
					<a href=/facebook/index_v2.html">
						<span style="background-image: url(/admin/assets/img/theme/facebook.jpg);"></span>
					</a>
				</div>
				<div class="divider"></div>
				<h5>Language Version (7)</h5>
				<div class="theme-version">
					<a href=/html/index_v2.html" class="active">
						<span style="background-image: url(/admin/assets/img/version/html.jpg);"></span>
					</a>
					<a href=/ajax/">
						<span style="background-image: url(/admin/assets/img/version/ajax.jpg);"></span>
					</a>
				</div>
				<div class="theme-version">
					<a href=/angularjs/">
						<span style="background-image: url(/admin/assets/img/version/angular1x.jpg);"></span>
					</a>
					<a href=/angularjs8/">
						<span style="background-image: url(/admin/assets/img/version/angular8x.jpg);"></span>
					</a>
				</div>
				<div class="theme-version">
					<a href=/laravel/">
						<span style="background-image: url(/admin/assets/img/version/laravel.jpg);"></span>
					</a>
					<a href=/vuejs/">
						<span style="background-image: url(/admin/assets/img/version/vuejs.jpg);"></span>
					</a>
				</div>
				<div class="theme-version">
					<a href=/reactjs/">
						<span style="background-image: url(/admin/assets/img/version/reactjs.jpg);"></span>
					</a>
				</div>
				<div class="divider"></div>
				<h5>Frontend Design (4)</h5>
				<div class="theme-version">
					<a href=/../frontend/one-page-parallax/">
						<span style="background-image: url(/admin/assets/img/theme/one-page-parallax.jpg);"></span>
					</a>
					<a href=/../frontend/e-commerce/">
						<span style="background-image: url(/admin/assets/img/theme/e-commerce.jpg);"></span>
					</a>
				</div>
				<div class="theme-version">
					<a href=/../frontend/blog/">
						<span style="background-image: url(/admin/assets/img/theme/blog.jpg);"></span>
					</a>
					<a href=/../frontend/forum/">
						<span style="background-image: url(/admin/assets/img/theme/forum.jpg);"></span>
					</a>
				</div>
				<div class="divider"></div>
				<div class="row m-t-10">
					<div class="col-md-12">
						<a href="https://seantheme.com/color-admin/documentation/" class="btn btn-inverse btn-block btn-rounded" target="_blank"><b>Documentation</b></a>
						<a href="javascript:;" class="btn btn-default btn-block btn-rounded" data-click="reset-local-storage"><b>Reset Local Storage</b></a>
					</div>
				</div>
			</div>
		</div>
		<!-- end theme-panel -->

		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->

    @include('admin.footer.footer');
