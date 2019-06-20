@extends('layouts.app')

@section('content')
    <style>
        .nav-link {
            @settings('darkMode') color:#fff; @else color:#000; @endsettings
        }

        .nav .active {
            color:#03a9f4;
        }

        .nav-link .icon {
            margin-right: 24px;
        }
        
        .settings-section {
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
        }

        .theme-dark .settings-section {
            background-color: rgb(32,33,36);
            box-shadow: rgba(0,0,0,.3) 0 1px 2px 0, rgba(0,0,0,.15) 0 1px 3px 1px;
        }

        .settings-item {
            border:0;
            @settings('darkMode') border-top:1px solid rgba(255,255,255,.1) !important; @else border-top:1px solid rgba(0,0,0,.1) !important; @endsettings
            border-radius: 0 !important;
            display: inline-flex;
            justify-content: space-between;
            font-size: 13px;
        }

        .settings-item p, .settings-item a {
            font-size: 13px;
        }

        .settings-item:first-child {
            border-top:0 !important;
        }

        .settings-item-noflex {
            border:0;
            @settings('darkMode') border-top:1px solid rgba(255,255,255,.1) !important; @else border-top:1px solid rgba(0,0,0,.1) !important; @endsettings
            border-radius: 0 !important;
            font-size: 13px;
        }

        .settings-item-noflex p, .settings-item-noflex a {
            font-size:13px;
        }

        .settings-item-noflex:first-child {
            border-top:0 !important;
        }

        .text-white .secondary {
            color:rgb(154,160,166) !important;
        }

        .icon-container {
            min-width: 32px;
            text-align: center;
            margin-inline-end: 10px;
        }

        .drop .show {
            margin-top:10px;
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
                            <h1 class="nav-title @settings('darkMode') text-white @endsettings">Admin - Settings</h1>
                        </div>
                    </div>
                </div>
                @include('components.navbar')
            </div>
        </div>
        <div class="container-fluid relative animatedParent animateOnce my-3">
            <div class="row my-3">
                    <div class="col-2">
                        <div class="nav flex-column " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="settings-main-tab" data-toggle="pill" href="#settings-main" role="tab" aria-controls="settings-main" aria-selected="true"><i class="icon fas fa-wrench"></i>Main</a>
                            <a class="nav-link" id="settings-theme-tab" data-toggle="pill" href="#settings-theme" role="tab" aria-controls="settings-theme" aria-selected="false"><i class="icon fas fa-palette"></i>Appearance</a>
                            <a class="nav-link" id="settings-language-tab" data-toggle="pill" href="#settings-language" role="tab" aria-controls="settings-language" aria-selected="false"><i class="icon fas fa-globe"></i>Language</a>
                            <a class="nav-link" id="settings-security-tab" data-toggle="pill" href="#settings-security" role="tab" aria-controls="settings-security" aria-selected="false"><i class="icon fas fa-shield-alt"></i>Security</a>
                        </div>
                    </div>
                    <div class="col-10">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade active show" id="settings-main" role="tabpanel" aria-labelledby="settings-main-tab">
                                <div class="card border-0 r-0 mb-3" style="background-color: transparent !important;">
                                    <div class="card-title p-10 m-0 @settings('darkMode') text-white @else text-black @endsettings">
                                        Main Settings
                                    </div>
                                    <div class="card-body p-0 settings-section">
                                        <form method="post" action="{{route('admin.settingSave')}}" class="form-material">
                                            @csrf
                                            <ul class="list-group">
                                                <li class="list-group-item settings-item" style="background-color: transparent !important;">
                                                    <p class="my-auto @settings('darkMode') text-white @else text-black @endsettings">Site Name</p>
                                                    <div class="float-right">
                                                        <input id="appName" class="form-control" name="appName" type="text" value="{{$settings['appName']}}">
                                                    </div>
                                                </li>
                                                <li class="list-group-item settings-item" style="background-color: transparent !important;">
                                                    <p class="my-auto @settings('darkMode') text-white @else text-black @endsettings">Option 2</p>
                                                </li>
                                            </ul>

                                            <button type="submit" class="m-3 btn btn-primary @settings('darkMode') text-white @else text-black @endsettings"><i class="fas fa-save"></i></button>
                                        </form>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <div class="card border-0 r-0" style="background-color: transparent !important;">
                                            <div class="card-title p-10 m-0 @settings('darkMode') text-white @else text-black @endsettings">
                                                Licensing
                                            </div>
                                            <div class="card-body p-0 settings-section">
                                                <ul class="list-group">
                                                    <li class="list-group-item settings-item justify-content-start" style="background-color: transparent !important;">
                                                        <div class="icon-container my-auto">
                                                            <i class="fas fa-check-circle my-auto" style="color:rgb(138,180,284);"></i>
                                                        </div>
                                                        <div class="message">
                                                            <div id="updateStatusMessage">
                                                                <div class="@settings('darkMode') text-white @else text-black @endsettings">Licensing is active</div>
                                                            </div>
                                                            <div class="secondary">{SHOW LICENSE INFO}</div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="card border-0 r-0" style="background-color: transparent !important;">
                                            <div class="card-title p-10 m-0 @settings('darkMode') text-white @else text-black @endsettings">
                                                Version Info
                                            </div>
                                            <div class="card-body p-0 settings-section">
                                                <ul class="list-group">
                                                    <li class="list-group-item settings-item justify-content-start" style="background-color: transparent !important;">
                                                        <div class="icon-container my-auto">
                                                            <i class="fas fa-check-circle my-auto" style="color:rgb(138,180,284);"></i>
                                                        </div>
                                                        <div class="message">
                                                            <div id="updateStatusMessage">
                                                                <div class="@settings('darkMode') text-white @else text-black @endsettings">openClinic is up to date</div>
                                                            </div>
                                                            <div class="secondary">Version 1.0.0 (Official Build) beta</div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="card border-0 r-0" style="background-color: transparent !important;">
                                            <div class="card-title p-10 m-0 @settings('darkMode') text-white @else text-black @endsettings">
                                                Support
                                            </div>
                                            <div class="card-body p-0 settings-section">
                                                <ul class="list-group">
                                                    <li class="list-group-item settings-item" style="background-color: transparent !important;">
                                                        <p class="my-auto @settings('darkMode') text-white @else text-black @endsettings">Get help</p>
                                                        <a href="#" class="my-auto @settings('darkMode') text-white @else text-black @endsettings"><i class="fas fa-external-link-alt"></i> </a>
                                                    </li>
                                                    <li class="list-group-item settings-item" style="background-color: transparent !important;">
                                                        <p class="my-auto @settings('darkMode') text-white @else text-black @endsettings">Report an issue</p>
                                                        <a href="#" class="my-auto @settings('darkMode') text-white @else text-black @endsettings"><i class="fas fa-external-link-alt"></i> </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="settings-theme" role="tabpanel" aria-labelledby="settings-theme-tab">
                                <div class="card border-0 r-0" style="background-color: transparent !important;">
                                    <div class="card-title p-10 m-0 @settings('darkMode') text-white @else text-black @endsettings">
                                        Appearance
                                    </div>
                                    <div class="card-body p-0 settings-section">
                                        <form method="post" action={{route('admin.settingSave')}} class="form-material">
                                            @csrf
                                            <ul class="list-group">
                                                <li class="list-group-item settings-item" style="background-color: transparent !important;">
                                                    <p class="my-auto @settings('darkMode') text-white @else text-black @endsettings">Dark Mode <br><span class="secondary">Activates dark mode througout the system</span></p>
                                                    <div class="material-switch float-right my-auto">
                                                        <input type='hidden' value='off' name='darkMode'>
                                                        <input id="darkMode" name="darkMode" type="checkbox" @if($settings['darkMode'] == 'on') checked @endif>
                                                        <label for="darkMode" class="bg-secondary"></label>
                                                    </div>
                                                </li>
                                            </ul>

                                            <button type="submit" class="m-3 btn btn-primary @settings('darkMode') text-white @else text-black @endsettings"><i class="fas fa-save"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="settings-language" role="tabpanel" aria-labelledby="settings-language-tab">
                                <div class="card border-0 r-0" style="background-color: transparent !important;">
                                    <div class="card-title p-10 m-0 @settings('darkMode') text-white @else text-black @endsettings">
                                        Languages
                                    </div>
                                    <div class="card-body p-0 settings-section">
                                        <ul class="list-group">
                                            <li class="list-group-item settings-item-noflex" style="background-color: transparent !important;">
                                                <div class="row">
                                                    <div class="col-12" style="display:flex;justify-content: space-between">
                                                        <p class="my-auto @settings('darkMode') text-white @else text-black @endsettings">Language <br> <span class="secondary">English</span></p>
                                                        <a class="my-auto" data-toggle="collapse" href="#language-collapse" role="button" aria-expanded="false" aria-controls="language-collapse"><i class="@settings('darkMode') text-white @else text-black @endsettings fas fa-chevron-down"></i></a>
                                                    </div>
                                                </div>
                                                <div class="row m-t-10">
                                                    <div class="col-12 drop">
                                                        <div class="collapse" id="language-collapse">
                                                            <div class="card card-body border-0" style="background-color: transparent !important;">
                                                                <div class="card-title @settings('darkMode') text-white @else text-black @endsettings">The current language offered by the app</div>
                                                                <div class="card-body p-t-0">
                                                                    <form method="post" action="#" class="form-material">
                                                                        @csrf
                                                                        <div class="@settings('darkMode') bg-white @else bg-black @endsettings">
                                                                            <select class="select2" name="language" >
                                                                                <option value="ms">Bahasa Malaysia</option>
                                                                                <option value="en-us" selected>English (United States)</option>
                                                                            </select>
                                                                        </div>
                                                                        <input type="submit" class="mt-3 p-0 btn text-white" style="font-size: 13px;" value="Change language"/>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="settings-security" role="tabpanel" aria-labelledby="settings-security-tab">
                                <div class="card border-0 r-0 mb-3" style="background-color: transparent !important;">
                                    <div class="card-title p-10 m-0 @settings('darkMode') text-white @else text-black @endsettings">
                                        Security
                                    </div>
                                    <div class="card-body p-0 settings-section">
                                        <ul class="list-group">
                                            <li class="list-group-item settings-item" style="background-color: transparent !important;">
                                                <p class="my-auto @settings('darkMode') text-white @else text-black @endsettings">Get help</p>
                                                <a href="#" class="my-auto @settings('darkMode') text-white @else text-black @endsettings"><i class="fas fa-external-link-alt"></i> </a>
                                            </li>
                                            <li class="list-group-item settings-item" style="background-color: transparent !important;">
                                                <p class="my-auto @settings('darkMode') text-white @else text-black @endsettings">Report an issue</p>
                                                <a href="#" class="my-auto @settings('darkMode') text-white @else text-black @endsettings"><i class="fas fa-external-link-alt"></i> </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <div class="card border-0 r-0" style="background-color: transparent !important;">
                                            <div class="card-title p-10 m-0 @settings('darkMode') text-white @else text-black @endsettings">
                                                Roles
                                            </div>
                                            <div class="card-body p-0 settings-section">
                                                <div class="p-3" style="border-bottom:1px solid rgba(255,255,255,.1);">
                                                    Create, Delete, and Assign Permissions to roles
                                                </div>
                                                <ul class="list-group">
                                                    @foreach(\Spatie\Permission\Models\Role::all() as $role)
                                                        <li class="list-group-item settings-item" style="background-color: transparent !important;">
                                                            <p class="my-auto @settings('darkMode') text-white @else text-black @endsettings">{{$role->name}}</p>
                                                            <div class="my-auto">
                                                                <a href="#" class="view-role btn @settings('darkMode') text-white @else text-black @endsettings" data-id="{{$role->id}}"><i class="icon-pencil"></i></a>
                                                                <a href="#" class="delete-role btn @settings('darkMode') text-white @else text-black @endsettings" data-id="{{$role->id}}"><i class="icon-trash"></i></a>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="roleInfoModal" tabindex="-1" role="dialog" aria-labelledby="roleInfoModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content shadow1" @settings('darkMode') style="background-color: #121212;" @endsettings>
                <div class="modal-header p-3">
                    <button type="button" class="close @settings('darkMode') text-white @else text-black @endsettings" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="modal-content">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.create-role').click(function(e) {
                e.preventDefault();

                let name = $("input[name=role-name]").val();

                $.ajax
                ({
                    url: '/admin/task/create-role',
                    type: 'POST',
                    data: {name: name, "_token": "{{ csrf_token() }}"},
                    beforeSend: function(){
                        // Show image container
                        $("#loader").show();
                    },
                    complete:function(data){
                        // Hide image container
                        $("#loader").hide();
                    },
                    success: function (data) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });

                        Toast.fire({
                            type: 'success',
                            title: 'Role created'
                        })
                    }
                }).done(function (data) {
                    $('.table-content').html(data.html);
                    //console.log(data);
                });
            });

            $('.delete-role').click(function(){

                var role_id = $(this).data('id');

                $.ajax
                ({
                    url: '/admin/roles/' + role_id + '/delete',
                    type: 'GET',
                    beforeSend: function(){
                        // Show image container
                        $("#loader").show();
                    },
                    complete:function(data){
                        // Hide image container
                        $("#loader").hide();
                    }
                }).done(function (data) {
                    $('#row-'+role_id).remove();
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });

                    Toast.fire({
                        type: 'success',
                        title: 'Role deleted'
                    })
                });
            });

            $('.view-role').click(function(){

                var role_id = $(this).data('id');

                $.ajax
                ({
                    url: '/admin/roles/' + role_id,
                    type: 'GET',
                    dataType: 'html',
                    beforeSend: function(){
                        // Show image container
                        $("#loader").show();
                    },
                    complete:function(data){
                        // Hide image container
                        $("#loader").hide();
                    }
                }).done(function(data){
                    console.log(data);
                    $('#roleInfoModal').modal('show');
                    $('#modal-content').html('');
                    $('#modal-content').html(data); // load response
                }).fail(function(){
                    $('#modal-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
                });
            });
        });
    </script>
@endsection
