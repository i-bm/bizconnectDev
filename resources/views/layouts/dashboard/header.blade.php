<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <!-- Meta tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta name="description" content="">
<meta name="keywords" content="">
<!-- /meta tags -->
 <title> {{config('app.name')}}</title>

<!-- Site favicon -->
<link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico1')}}" type="image/x-icon">
<!-- /site favicon -->

<!-- Font Icon Styles -->
{{-- <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')}}"> --}}
<link rel="stylesheet" href="{{ asset('assets/vendors/gaxon-icon/styles.css')}}">
<!-- /font icon Styles -->

<!-- Perfect Scrollbar stylesheet -->
<link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/css/perfect-scrollbar.css')}}">
<!-- /perfect scrollbar stylesheet -->

<!-- Load Styles -->    <link rel="stylesheet" href="{{ asset('assets/css/semidark-style-1.min.css')}}">
    <!-- /load styles -->
 @livewireStyles
</head>
<body class="dt-sidebar--fixed dt-header--fixed">
<!-- Loader -->
<div class="dt-loader-container">
  <div class="dt-loader">
    <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"></circle>
    </svg>
  </div>
</div>
<!-- /loader -->

<style>.dt-content-wrapper{background:#F9FAFB}
.bg-gray-50 {
    background-color: rgba(249,250,251);
}
</style>