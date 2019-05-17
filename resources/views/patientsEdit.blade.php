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
                            <h1 class="nav-title text-black">Patient - {{$patients->name}}</h1>
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
                            <div class="card mt-3 mb-3">
                                <div class="card-header bg-white">
                                    <strong class="card-title">Appointments</strong>
                                </div>
                                <div>
                                    <ul class="list-group list-group-flush">
                                        @if($appointments->count() > 0)
                                            @foreach($appointments as $appt)
                                            <li class="list-group-item">
                                                <h6 class="p-t-10">{{$appt->date}}</h6>
                                                <span>{{$appt->created_by}} | Room {{$appt->room}} | {{$appt->department_id}}</span>
                                            </li>
                                            @endforeach
                                        @else
                                            <li class="list-group-item">
                                                <h6 class="p-t-10">No Appointments</h6>
                                                <span>NULL | Room NULL | NULL</span>
                                            </li>
                                        @endif
                                    </ul>
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
                                                @if($notes->count() > 0)
                                                    @foreach($notes as $note)
                                                    <li class="my-1">
                                                        <div class="card no-b p-3">
                                                            <div class="">
                                                                <div class="float-right">
                                                                    <a href="#" class="btn-fab btn-fab-sm btn-primary r-5">
                                                                        <i class="icon-eye p-0"></i>
                                                                    </a>
                                                                    <a href="#" class="btn-fab btn-fab-sm btn-success r-5">
                                                                        <i class="icon-pencil p-0"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="image mr-3  float-left">
                                                                    <img class="w-40px" src="assets/img/dummy/u1.png" alt="User Image">
                                                                </div>
                                                                <div>
                                                                    <div>
                                                                        <strong></strong>
                                                                    </div>
                                                                    <small>{{$note->date}} | {{$note->created_by}}</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                @else
                                                    <li class="my-1">
                                                        <div class="card no-b p-3">
                                                            <div class="">
                                                                <div class="float-right">
                                                                    <a href="#" class="btn-fab btn-fab-sm btn-primary r-5">
                                                                        <i class="icon-eye p-0"></i>
                                                                    </a>
                                                                    <a href="#" class="btn-fab btn-fab-sm btn-success r-5">
                                                                        <i class="icon-pencil p-0"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="image mr-3  float-left">
                                                                    <img class="w-40px" src="{{ Avatar::create($patients->name)->toBase64() }}" alt="User Image">
                                                                </div>
                                                                <div>
                                                                    <div>
                                                                        <strong>Seems that this patient has no notes yet!</strong>
                                                                    </div>
                                                                    <small>NULL | NULL</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endif
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

                                            <ul class="list-inline mt-3">
                                                <li class="list-inline-item ">
                                                    <img src="assets/img/dummy/u13.png" alt="" class="img-responsive w-40px circle mb-3">
                                                </li>
                                                <li class="list-inline-item">
                                                    <img src="assets/img/dummy/u12.png" alt="" class="img-responsive w-40px circle mb-3">
                                                </li>
                                                <li class="list-inline-item">
                                                    <img src="assets/img/dummy/u11.png" alt="" class="img-responsive w-40px circle mb-3">
                                                </li>
                                                <li class="list-inline-item">
                                                    <img src="assets/img/dummy/u10.png" alt="" class="img-responsive w-40px circle mb-3">
                                                </li>
                                                <li class="list-inline-item">
                                                    <img src="assets/img/dummy/u9.png" alt="" class="img-responsive w-40px circle mb-3">
                                                </li>
                                                <li class="list-inline-item">
                                                    <img src="assets/img/dummy/u8.png" alt="" class="img-responsive w-40px circle mb-3">
                                                </li>
                                                <li class="list-inline-item ">
                                                    <img src="assets/img/dummy/u7.png" alt="" class="img-responsive w-40px circle mb-3">
                                                </li>
                                                <li class="list-inline-item">
                                                    <img src="assets/img/dummy/u6.png" alt="" class="img-responsive w-40px circle mb-3">
                                                </li>
                                                <li class="list-inline-item">
                                                    <img src="assets/img/dummy/u5.png" alt="" class="img-responsive w-40px circle mb-3">
                                                </li>
                                                <li class="list-inline-item">
                                                    <img src="assets/img/dummy/u4.png" alt="" class="img-responsive w-40px circle mb-3">
                                                </li>
                                                <li class="list-inline-item">
                                                    <img src="assets/img/dummy/u3.png" alt="" class="img-responsive w-40px circle mb-3">
                                                </li>
                                                <li class="list-inline-item">
                                                    <img src="assets/img/dummy/u2.png" alt="" class="img-responsive w-40px circle mb-3">
                                                </li>
                                            </ul>
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
