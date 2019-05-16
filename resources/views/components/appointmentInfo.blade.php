<div class="row">
    <div class="col-md-6">
        <div class="card ">
            <div class="card-header white">
                <h6>Patient Info</h6>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><i class="icon icon-mobile text-primary"></i><strong class="s-12">Name</strong> </br><span class="float-right s-12">{{$patient->name}}</span></li>
                <li class="list-group-item"><i class="icon icon-mobile text-primary"></i><strong class="s-12">MRN</strong> </br><span class="float-right s-12">{{$patient->mrn}}</span></li>
                <li class="list-group-item"><i class="icon icon-mobile text-primary"></i><strong class="s-12">Phone</strong> </br><span class="float-right s-12">{{$patient->phone}}</span></li>
            </ul>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card ">
            <div class="card-header white">
                <h6>Appointment Info</h6>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><i class="icon icon-mobile text-primary"></i><strong class="s-12">Date</strong> </br><span class="float-right s-12">{{$appointment->date}}</span></li>
                <li class="list-group-item"><i class="icon icon-mobile text-primary"></i><strong class="s-12">Department</strong> </br><span class="float-right s-12">{{$appointment->department_id}}</span></li>
                <li class="list-group-item"><i class="icon icon-mobile text-primary"></i><strong class="s-12">Room</strong> </br><span class="float-right s-12">{{$appointment->room}}</span></li>
            </ul>
        </div>
    </div>
</div>
