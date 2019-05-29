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
                            <h1 class="nav-title @settings('darkMode') text-white @endsettings">Admin - Settings</h1>
                        </div>
                    </div>
                </div>
                @include('components.navbar')
            </div>
        </div>
        <div class="container-fluid relative animatedParent animateOnce my-3">
            <div class="row my-3">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{route('admin.settingSave')}}" class="form-material">
                                @csrf
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        Application Name
                                        <div class="float-right">
                                            <input id="appName" class="form-control" name="appName" type="text" value="{{$settings['appName']}}">
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        Dark Mode
                                        <div class="material-switch float-right">
                                            <input type='hidden' value='off' name='darkMode'>
                                            <input id="darkMode" name="darkMode" type="checkbox" @if($settings['darkMode'] == 'on') checked @endif>
                                            <label for="darkMode" class="bg-secondary"></label>
                                        </div>
                                    </li>
                                </ul>

                                <input type="submit" class="my-3 btn btn-primary"/>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
