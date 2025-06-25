@extends('layouts.app')

@section('content')
<div class="dashboard-boxes">
    <div class="dashboard-box">
        <div class="box-icon"></div>
        <div class="box-title">Users</div>
        <div class="box-value">{{ $userCount }}</div>
    </div>

    <div class="dashboard-box">
        <div class="box-icon"></div>
        <div class="box-title">Packages</div>
        <div class="box-value">{{ $packageCount }}</div>
    </div>

    <div class="dashboard-box">
        <div class="box-icon"></div>
        <div class="box-title">Services</div>
        <div class="box-value">{{ $serviceCount }}</div>
    </div>
</div>
@endsection
