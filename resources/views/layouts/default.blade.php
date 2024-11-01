<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	@include('includes.head')
    <script src="https://kit.fontawesome.com/5405ceca9d.js" crossorigin="anonymous"></script>


    <script src="{{ asset('tabla/assets/plugins/chart.umd.js') }}"></script>

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <!-- Enlace al archivo vendor.min.css -->
    <link href="{{ asset('css/blog/vendor.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/blog/card.list.css') }}" rel="stylesheet" />

    <!-- Enlace al archivo app.min.css -->
    <link href="{{ asset('css/blog/app.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/blog/layout.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">






</head>
@php
	$bodyClass = (!empty($appBoxedLayout)) ? 'boxed-layout ' : '';
	$bodyClass .= (!empty($paceTop)) ? 'pace-top ' : $bodyClass;
	$bodyClass .= (!empty($bodyClass)) ? $bodyClass . ' ' : $bodyClass;
	$appSidebarHide = (!empty($appSidebarHide)) ? $appSidebarHide : '';
	$appHeaderHide = (!empty($appHeaderHide)) ? $appHeaderHide : '';
	$appSidebarTwo = (!empty($appSidebarTwo)) ? $appSidebarTwo : '';
	$appSidebarSearch = (!empty($appSidebarSearch)) ? $appSidebarSearch : '';
	$appTopMenu = (!empty($appTopMenu)) ? $appTopMenu : '';

	$appClass = (!empty($appTopMenu)) ? 'app-with-top-menu ' : '';
	$appClass .= (!empty($appHeaderHide)) ? 'app-without-header ' : ' app-header-fixed ';
	$appClass .= (!empty($appSidebarEnd)) ? 'app-with-end-sidebar ' : '';
	$appClass .= (!empty($appSidebarWide)) ? 'app-with-wide-sidebar ' : '';
	$appClass .= (!empty($appSidebarHide)) ? 'app-without-sidebar ' : '';
	$appClass .= (!empty($appSidebarMinified)) ? 'app-sidebar-minified ' : '';
	$appClass .= (!empty($appSidebarTwo)) ? 'app-with-two-sidebar app-sidebar-end-toggled ' : '';
	$appClass .= (!empty($appSidebarHover)) ? 'app-with-hover-sidebar ' : '';
	$appClass .= (!empty($appContentFullHeight)) ? 'app-content-full-height ' : '';

	$appContentClass = (!empty($appContentClass)) ? $appContentClass : '';
@endphp
<body class="{{ $bodyClass }}">
	@include('includes.component.page-loader')

	<div id="app" class="app app-sidebar-fixed {{ $appClass }}">

		@includeWhen(!$appHeaderHide, 'includes.header')

		@includeWhen($appTopMenu, 'includes.top-menu')

		@includeWhen(!$appSidebarHide, 'includes.sidebar')

		@includeWhen($appSidebarTwo, 'includes.sidebar-right')

		<div id="content" class="app-content {{ $appContentClass }}">
			@yield('content')
		</div>

		@include('includes.component.scroll-top-btn')

		@include('includes.component.theme-panel')

	</div>

	@yield('outside-content')

	@include('includes.page-js')
</body>
</html>
