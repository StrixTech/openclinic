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
                            <h1 class="nav-title text-black">Patients</h1>
                        </div>
                    </div>
                </div>
                @include('components.navbar')
            </div>
        </div>
        <div class="container-fluid relative animatedParent animateOnce my-3">
            <div class="row my-3">
                <div class="col-md-3">
                    <div class="card r-0 shadow">

                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card r-0 shadow">
                        <div class="table-responsive">
                            <form>
                                <table class="table table-striped table-hover r-0" style="table-layout: fixed">
                                    <thead>
                                    <tr class="no-b">
                                        <th style="width: 30px">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" id="checkedAll" class="custom-control-input"><label
                                                    class="custom-control-label" for="checkedAll"></label>
                                            </div>
                                        </th>
                                        <th>NAME</th>
                                        <th>PHONE</th>
                                        <th>ADDRESS</th>
                                        <th>ROLE</th>
                                        <th>ACTIONS</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($patients as $patient)
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input checkSingle"
                                                           id="user_id_1" required><label
                                                        class="custom-control-label" for="user_id_1"></label>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="avatar avatar-md mr-3 mt-1 float-left">
                                                    <img src="{{ Avatar::create($patient->name)->toBase64() }}" class="avatar-md circle"></img>
                                                </div>
                                                <div>
                                                    <div>
                                                        <strong>{{$patient->name}}</strong>
                                                    </div>
                                                    <small>MRN: {{$patient->mrn}}</small>
                                                </div>
                                            </td>
                                            <td>{{$patient->phone}}</td>
                                            <td>{{$patient->address}}</td>
                                            <td><span class="r-3 badge badge-success ">Administrator</span></td>
                                            <td>
                                                <a href="/patients/{{$patient->id}}"><i class="icon-eye mr-3"></i></a>
                                                <a href="/patients/{{$patient->id}}/edit"><i class="icon-pencil"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
