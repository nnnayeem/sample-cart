@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-xs-12 col-md-4 col-lg-3">
            <x-adminlte-small-box
                text="Total Users"
                title="{{$summary->users->total??0}}"
                theme="gradient-primary"
                icon="fas fa-lg fa-user-friends"
                icon-theme="white"></x-adminlte-small-box>
        </div>
        <div class="col-xs-12 col-md-4 col-lg-3">
            <x-adminlte-small-box
                text="Total Active Users"
                title="{{$summary->users->active}}"
                theme="gradient-success"
                icon="fas fa-lg fa-user-friends"
                icon-theme="white"></x-adminlte-small-box>
        </div>
        <div class="col-xs-12 col-md-4 col-lg-3">
            <x-adminlte-small-box
                text="Total Inactive Users"
                title="{{$summary->users->inactive}}"
                theme="gradient-danger"
                icon="fas fa-lg fa-user-friends"
                icon-theme="white"></x-adminlte-small-box>
        </div>
        <div class="col-xs-12 col-md-4 col-lg-3">
            <x-adminlte-small-box
                text="Total Customers"
                title="{{$summary->users->customers}}"
                theme="gradient-info"
                icon="fas fa-lg fa-user-friends"
                icon-theme="white"></x-adminlte-small-box>
        </div>
        <div class="col-xs-12 col-md-4 col-lg-3">
            <x-adminlte-small-box
                text="Total Orders"
                title="{{$summary->orders->total}}"
                theme="gradient-primary"
                icon="fas fa-lg fa-cart-arrow-down"
                icon-theme="white"></x-adminlte-small-box>
        </div>

        <div class="col-xs-12 col-md-4 col-lg-3">
            <x-adminlte-small-box
                text="Total Pending Orders"
                title="{{$summary->orders->pending}}"
                theme="gradient-warning"
                icon="fas fa-lg fa-cart-arrow-down"
                icon-theme="white"></x-adminlte-small-box>
        </div>

        <div class="col-xs-12 col-md-4 col-lg-3">
            <x-adminlte-small-box
                text="Total Accepted Orders"
                title="{{$summary->orders->accepted}}"
                theme="gradient-success"
                icon="fas fa-lg fa-cart-arrow-down"
                icon-theme="white"></x-adminlte-small-box>
        </div>

        <div class="col-xs-12 col-md-4 col-lg-3">
            <x-adminlte-small-box
                text="Total Cancelled Orders"
                title="{{$summary->orders->cancelled}}"
                theme="gradient-danger"
                icon="fas fa-lg fa-cart-arrow-down"
                icon-theme="white"></x-adminlte-small-box>
        </div>

        <div class="col-xs-12 col-md-4 col-lg-3">
            <x-adminlte-small-box
                text="Total Delivered Orders"
                title="{{$summary->orders->delivered}}"
                theme="gradient-success"
                icon="fas fa-lg fa-cart-arrow-down"
                icon-theme="white"></x-adminlte-small-box>
        </div>

        <div class="col-xs-12 col-md-4 col-lg-3">
            <x-adminlte-small-box
                text="Total Delivering info"
                title="{{$summary->orders->delivering}}"
                theme="gradient-primary"
                icon="fas fa-lg fa-cart-arrow-down"
                icon-theme="white"></x-adminlte-small-box>
        </div>


    </div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
