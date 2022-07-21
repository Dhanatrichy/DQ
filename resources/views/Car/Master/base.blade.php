@extends('layouts.app-template')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Car
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-car"></i> Car</a></li>
        <li class="active">Car Master</li>
      </ol>
    </section>
    @yield('action-content')
    <!-- /.content -->
  </div>
@endsection