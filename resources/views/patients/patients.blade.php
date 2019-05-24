@extends('layouts.app')

@section('content')
    <style>
        #search-patient-result:not(#search-patient-result:empty){
            height:10em;overflow: scroll;overflow-x: hidden;
        }

        #search-patient-result .search-patient-result-item:hover {
            background-color: #F5F8FA;
        }

        #search-patient-result .search-patient-result-item span {
            color: #86939e;
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
                        <input id="search-patient" name="search" data-provide="typeahead" type="text" class="form-control" placeholder="Search Patient" autocomplete="off"/>
                        <ul id="search-patient-result" class="list-group list-group-flush" style="">

                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card r-0 shadow">
                        <div class="table-responsive">
                            <form>
                                <table class="table table-striped table-hover r-0" style="table-layout: fixed">
                                    <thead>
                                    <tr class="no-b">
                                        <th width="250px">NAME</th>
                                        <th>PHONE</th>
                                        <th>ADDRESS</th>
                                        <th width="80px">ACTIONS</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($patients as $patient)
                                        <tr>
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
                                            <td>
                                                <a href="/patients/{{$patient->id}}"><i class="icon-eye mr-3"></i></a>
                                                <a href="/patients/{{$patient->id}}/edit"><i class="icon-pencil"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                {{$patients->links()}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){

            function fetch_customer_data(query = '')
            {
                $.ajax({
                    url:"{{ url('psearch') }}",
                    method:'GET',
                    data:{query:query},
                    dataType:'json',
                    success:function(data)
                    {
                        $('#search-patient-result').html(data.table);
                    }
                })
            }

            $(document).on('keyup', '#search-patient', function(){
                let query = $(this).val();
                fetch_customer_data(query);
            });
        });
    </script>
@endsection
