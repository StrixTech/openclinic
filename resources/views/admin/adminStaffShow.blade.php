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
                            <h1 class="nav-title text-black">Staff</h1>
                        </div>
                    </div>
                </div>
                @include('components.navbar')
            </div>
        </div>
        <div class="container-fluid relative animatedParent animateOnce my-3">
            <div class="row my-3">
                <div class="col-md-3">
                    <div class="counter-box white r-5 p-3">
                        <div class="p-4">
                            <div class="float-right">
                                <span class="icon icon-person_outline text-light-blue s-48"></span>
                            </div>
                            <div class="counter-title">Number of staff</div>
                            <h5 class="sc-counter mt-3">{{ $staffs->count() }}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-md-3">
                    <div class="card r-0 shadow">
                        <div class="card-header"><span>Create staff</span></div>
                        <div class="card-body">
                        </div>
                    </div>
                    <div class="card r-0 shadow">
                        <input id="search-staff" name="search" data-provide="typeahead" type="text" class="form-control" placeholder="Search" autocomplete="off"/>
                        <ul id="search-staff-result" class="list-group list-group-flush" style="">

                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card r-0 shadow">
                        <div class="table-responsive">
                                <table class="table table-striped table-hover r-0" style="table-layout: fixed">
                                    <thead>
                                    <tr class="no-b">
                                        <th>NAME</th>
                                        <th>STAFF ID</th>
                                        <th width="80px">ACTIONS</th>
                                    </tr>
                                    </thead>

                                    <tbody class="table-content">
                                    @foreach($staffs as $staff)
                                        <tr id="row-{{$staff->id}}">
                                            <td>
                                                <div>
                                                    <div>
                                                        <strong>{{$staff->name}}</strong>
                                                    </div>
                                                    <small>{{$staff->email}} | {{$staff->phone}}</small>
                                                </div>
                                            </td>
                                            <td>{{$staff->staff_id}}</td>
                                            <td>
                                                <a href="#" class="view-staff" data-id="{{$staff->id}}"><i class="icon-pencil"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            {{$staffs->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staffInfoModal" tabindex="-1" role="dialog" aria-labelledby="staffInfoModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staffInfoModalLabel">Staff Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="staffInfomodal-content">

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

            $('.view-staff').click(function(){

                var role_id = $(this).data('id');

                $.ajax
                ({
                    url: '/admin/staff/' + role_id,
                    type: 'GET',
                    dataType: 'json'
                }).done(function(data){
                    console.log(data.html);
                    $('#staffInfoModal').modal('show');
                    $('#staffInfomodal-content').html('');
                    $('#staffInfomodal-content').html(data.html); // load response
                }).fail(function(){
                        $('#staffInfomodal-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
                });
            });

            function fetch_customer_data(query = '')
            {
                $.ajax({
                    url:"{{ url('assearch') }}",
                    method:'GET',
                    data:{query:query},
                    dataType:'json',
                    success:function(data)
                    {
                        $('#search-staff-result').html(data.table);
                    }
                })
            }

            $(document).on('keyup', '#search-staff', function(){
                let query = $(this).val();
                fetch_customer_data(query);
            });
        });
    </script>
@endsection
