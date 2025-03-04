<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>{{ $title ?? "Admin" }}</title>

    <link rel="icon" href="{{asset('img/icon/fa.png')}}">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="{{ asset('admin/assets/css/default/app.min.css')}} " rel="stylesheet" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN PAGE LEVEL CSS STYLE ================== -->
    <link href="{{ asset('admin/assets/plugins/jvectormap-next/jquery-jvectormap.css')}}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/plugins/bootstrap-calendar/css/bootstrap_calendar.css')}}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/plugins/gritter/css/jquery.gritter.css')}}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/plugins/nvd3/build/nv.d3.css')}}" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">


    <!-- ================== END PAGE LEVEL CSS STYLE ================== -->
    <style>
        #gritter-notice-wrapper{
            display: none;
        }
        #page-container > div.theme-panel.theme-panel-lg{
            display: none;
        }
    </style>
</head>


