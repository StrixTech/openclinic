@extends('layouts.app')

@section('content')
    <style>
        .settings-box {
            align-items: center;
            display: flex;
        @settings('darkMode') border-top:1px solid rgba(255,255,255,.1) !important; @else border-top:1px solid rgba(0,0,0,.1) !important; @endsettings
        }

        .icon-container {
            min-width: 32px;
            text-align: center;
            margin-inline-end: 10px;
        }

        .secondary {
            font-size:11px;
        }
    </style>
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
                            <h1 class="nav-title @settings('darkMode') text-white @endsettings">Admin</h1>
                        </div>
                    </div>
                </div>
                @include('components.navbar')
            </div>
        </div>
        <div class="container-fluid relative animatedParent animateOnce my-3">
            <div class="row my-3">
                <div class="col-md-8">
                    <div class="card counter-box @settings('darkMode') bg-silver @else white @endsettings r-5 p-3">
                        <div class="p-4">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card @settings('darkMode') bg-silver @else white @endsettings r-5">
                        <div class="card-title p-10 m-0 @settings('darkMode') text-white @else text-black @endsettings">
                            About openClinic
                        </div>
                        <div class="card-body p-0">
                            <div class="p-t-10 p-b-10 settings-box">
                                <div class="icon-container">
                                    <i class="fas fa-check-circle" style="width:24px;height: 24px;color:rgb(138,180,284);"></i>
                                </div>
                                <div class="message">
                                    <div id="updateStatusMessage">
                                        <div class="@settings('darkMode') text-white @else text-black @endsettings">openClinic is up to date</div>
                                        <a target="_blank" href="#" hidden="">
                                            Learn more
                                        </a>
                                    </div>
                                    <div class="secondary">Version 1.0.0 (Official Build) beta</div>
                                </div>
                            </div>

                            <div class="p-t-10 p-b-10 settings-box">
                                <div class="icon-container">
                                    <i class="icon icon-check-circle"></i>
                                </div>
                                <div class="message">
                                    <div id="updateStatusMessage">
                                        <div>openClinic is up to date</div>
                                        <a target="_blank" href="#" hidden="">
                                            Learn more
                                        </a>
                                    </div>
                                    <div class="secondary">Version 1.0.0 (Official Build) beta</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
