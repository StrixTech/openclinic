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
                            <h1 class="nav-title text-black"><a href="{{url('patients')}}">Patients</a> / <a href="{{url('patients')}}/{{$patient->id}}">{{$patient->mrn}}</a> / Create Note</h1>
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
                        <div class="col-md-12">
                            <div class="row">
                            </div>

                            <div class="row my-3">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header white">
                                            <h6>Patient Notes</h6>
                                        </div>
                                        <div class="card-body">
                                            <form class="form-material" action="{{route('notes.store')}}" method="post">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <label for="name">Patient Name:</label>
                                                                <input class="form-control" type="text" id="name" name="name" value="{{$patient->name}}" readonly/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <label for="mrn">Patient MRN:</label>
                                                                <input class="form-control" type="text" id="mrn" name="mrn" value="{{$patient->mrn}}" readonly/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="note" name="note"></textarea>
                                                </div>
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </form>
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

    <script>
        $(document).ready(function(){
            tinymce.init({
                selector:'textarea.note',
            });
        });
    </script>
@endsection
