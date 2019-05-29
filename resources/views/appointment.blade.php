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
                            <h1 class="nav-title @settings('darkMode') text-white @endsettings">Appointments</h1>
                        </div>
                    </div>
                </div>
                @include('components.navbar')
            </div>
        </div>
        <div class="container-fluid relative animatedParent animateOnce my-3">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card r-0 b-0 @settings('darkMode') shadow @endsettings">
                                <div class="card-header ">
                                    <h6>Find an appointment</h6>
                                </div>

                                <div class="card-body b-t pt-2 pb-2 no-b">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="MRN" @settings('darkMode') style="background: transparent;" @endsettings/>
                                        </div>

                                        <button type="submit" class="btn btn-primary mt-2"><i class="icon-search mr-2"></i>Search
                                        </button>
                                    </div>
                                </div>
                            <!-- /.box-body -->
                        </div>

                        <div class="card r-0 b-0 shadow mt-2">
                            <form class="form-material" method="post">
                                @csrf

                                <div class="card-header ">
                                    <h6>Create a new appointment</h6>
                                </div>

                                <div class="card-body b-t pt-2 pb-2 no-b">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">MRN</label>
                                            <input id="mrn" type="text" class="form-control" name="mrn" @settings('darkMode') style="background: transparent;" @endsettings>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <label class="form-label">Date</label>
                                        <div class="form-line">

                                            <input id="date" name="date" type="text" class="date-time-picker form-control"
                                                   data-options='{
                                                   "mask":true,
                                                   "format":"d/m/Y H:i",
                                                    "allowTimes":["08:00", "08:30", "09:00", "09:30", "10:00", "10:30", "11:00", "11:30","12:00","14:00","14:30","15:00","15:30","16:00"]}' @settings('darkMode') style="background: transparent;" @endsettings/>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary mt-2"><i class="icon-search mr-2"></i>Search
                                    </button>
                                </div>
                            </form>
                            <!-- /.box-body -->
                        </div>

                        <!-- /. box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card no-r no-b shadow">
                            <div class="card-body p-0">
                                <div id='calendar'></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="appointmentInfoModal" tabindex="-1" role="dialog" aria-labelledby="appointmentInfoModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="appointmentInfoModalLabel">Appointment Info</h5>
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

    @settings('darkMode')
        <style>
            .fc-toolbar {
                background-color: #272C33 !important;
            }

            .fc-today {
                background-color: #303841 !important;
            }
        </style>
    @endsettings
    <script>
        $(document).ready(function() {
            let calendarEl = document.getElementById('calendar');
            window.calendar = new window.FullCalendar(calendarEl, {
                plugins: [ window.timeGridPlugin ],
                defaultView: 'timeGridWeek',
                events: {!! $appointments !!},
                eventClick: function(info) {
                    info.jsEvent.preventDefault(); // don't let the browser navigate

                    //window.open('/appointments/'+info.event.id);

                    $('#modal-content').html(''); // leave it blank before ajax call

                    $.ajax({
                        url: '/appointments/'+info.event.id,
                        type: 'GET',
                        dataType: 'html'
                    })
                        .done(function(data){
                            console.log(data);
                            $('#appointmentInfoModal').modal('show')
                            $('#modal-content').html('');
                            $('#modal-content').html(data); // load response
                        })
                        .fail(function(){
                            $('#modal-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
                        });
                },
                eventMouseEnter: function(info){
                    info.el.style.cursor = 'pointer';
                }
            });

            window.calendar.render();
        });

        function submit() {
            var d = $('#date').datetimepicker('getValue');
            var mrn = "MRN: "+$('#mrn').val();
            window.calendar.addEvent({
                title: mrn,
                start: d,
            });
        };
    </script>
@endsection
