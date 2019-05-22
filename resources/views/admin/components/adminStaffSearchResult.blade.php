@if($isNull == true)
    <li class="list-group-item">
        <h6 class="p-t-10">No Staff Found</h6>
        <span>NULL | NULL</span>
    </li>
@else
    <a href="{{route('staff.show',$row->id)}}">
        <li class="list-group-item search-patient-result-item">
            <h6 class="p-t-10 mb-2">{{$row->name}}</h6>
            <span>
            <span class="icon-phone"></span> {{$row->phone}} | <span class="icon-people"></span>  {{$row->staff_id}}</span>
        </li>
    </a>
@endif
