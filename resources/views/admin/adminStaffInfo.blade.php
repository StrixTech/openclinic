@extends('layouts.app')

@section('content')
    <a href="#" data-toggle="push-menu" class="paper-nav-toggle left ml-2 fixed">
        <i></i>
    </a>
    <div class="has-sidebar-left has-sidebar-tabs">
        @include('components.searchbar')
        <div class="sticky">
            <div class="navbar navbar-expand d-flex justify-content-between bd-navbar white shadow">
                <div class="relative">
                    <div class="d-flex">
                        <div class="d-none d-md-block">
                            <h1 class="nav-title @settings('darkMode') text-white @endsettings"><a href="{{route('staff.index')}}">Staff</a> / {{$staff->name}}</h1>
                        </div>
                    </div>
                </div>
                @include('components.navbar')
            </div>
        </div>
        <div class="container-fluid relative animatedParent animateOnce my-3">
            <div class="row my-3">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card ">

                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><i class="icon icon-mobile text-primary"></i><strong class="s-12">Phone</strong></br> <span class="s-12">{{$staff->phone}}</span></li>
                                    <li class="list-group-item"><i class="icon icon-mail text-success"></i><strong class="s-12">Email</strong></br> <span class="s-12">{{$staff->email}}</span></li>
                                    <li class="list-group-item"><i class="icon icon-address-card-o text-warning"></i><strong class="s-12">Address</strong></br> <span class="s-12">{{$staff->address}}</span></li>
                                </ul>
                            </div>
                            <div class="card mt-3 mb-3">
                                <div class="card-header bg-white">
                                    <strong class="card-title">Appointments</strong>
                                </div>
                                <div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card r-3">
                                        <div class="p-4">
                                            <div class="float-right">
                                                <span class="icon-award text-light-blue s-48"></span>
                                            </div>
                                            <div class="counter-title">Notes Count</div>
                                            <h5 class="sc-counter mt-3"></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card r-3">
                                        <div class="p-4">
                                            <div class="float-right"><span class="icon-stop-watch3 s-48"></span>
                                            </div>
                                            <div class="counter-title ">Absence</div>
                                            <h5 class="sc-counter mt-3">12</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="white card">
                                        <div class="p-4">
                                            <div class="float-right"><span class="icon-orders s-48"></span>
                                            </div>
                                            <div class="counter-title">Roll Number</div>
                                            <h5 class="sc-counter mt-3">26</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row my-3">
                                <!-- bar charts group -->
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header white">
                                            <h6>Patient Notes</h6>
                                        </div>
                                        <div class="card-body">
                                            <ul class="list-unstyled">

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- /bar charts group -->


                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header white">
                                            <h6>New Followers <span class="badge badge-success r-3">30+</span></h6>
                                        </div>
                                        <div class="card-body">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
