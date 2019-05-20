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
                            <h1 class="nav-title text-black">Roles</h1>
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
                        <div class="card-header"><span>Create a role</span></div>
                        <div class="card-body">
                            <form method="post" class="form-material">
                                @csrf

                                <div class="form-group">
                                    <div class="form-line">
                                        <input name="role-name" type="text" class="form-control" placeholder="Role Name" autocomplete="off"/>
                                    </div>
                                </div>

                                <button class="create-role btn btn-default">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card r-0 shadow">
                        <div class="table-responsive">
                            <form>
                                <table class="table table-striped table-hover r-0" style="table-layout: fixed">
                                    <thead>
                                    <tr class="no-b">
                                        <th>NAME</th>
                                        <th width="80px">ACTIONS</th>
                                    </tr>
                                    </thead>

                                    <tbody class="table-content">
                                    @foreach($roles as $role)
                                        <tr id="row-{{$role->id}}">
                                            <td>
                                                <div>
                                                    <div>
                                                        <strong>{{$role->name}}</strong>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#" class="view-role" data-id="{{$role->id}}"><i class="icon-pencil"></i></a>
                                                <a href="#" class="delete-role" data-id="{{$role->id}}"><i class="icon-trash"></i></a>
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

    <!-- Modal -->
    <div class="modal fade" id="roleInfoModal" tabindex="-1" role="dialog" aria-labelledby="roleInfoModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="roleInfoModalLabel">Appointment Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                    dataType: 'html'
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
