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
                            <h1 class="nav-title text-black">Notes - {{$patients->name}} ({{$notes->date ?? 'NULL'}})</h1>
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
                                    <li class="list-group-item"><i class="icon icon-mobile text-primary"></i><strong class="s-12">Phone</strong></br> <span class="s-12">{{$patients->phone}}</span></li>
                                    <li class="list-group-item"><i class="icon icon-mail text-success"></i><strong class="s-12">Email</strong></br> <span class="s-12">{{$patients->email}}</span></li>
                                    <li class="list-group-item"><i class="icon icon-address-card-o text-warning"></i><strong class="s-12">Address</strong></br> <span class="s-12">{{$patients->address}}</span></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-9">
                            <div class="row">
                            </div>

                            <div class="row my-3">
                                <!-- bar charts group -->
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header white">
                                            <h6>Patient Notes</h6>
                                        </div>
                                        <div class="card-body">

                                        </div>
                                    </div>
                                </div>
                                <!-- /bar charts group -->


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
