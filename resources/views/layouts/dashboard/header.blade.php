<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> TECHMARKET - {{$metadata }}</title>
    <meta name="description" content="Tech Market Solution" />
    <!--Keywords -->
    <meta name="keywords" content="Tech Market Solutions" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!--Favicon -->
    <link rel="icon" type="image/png" href="{{ asset ('assets/img/favicon.png') }}" />
   
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/main.css')}}"> --}}

     <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">



 

 @livewireStyles
  </head>
  <body>
  