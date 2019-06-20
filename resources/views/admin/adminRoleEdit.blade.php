<div class="row mb-3">
    <div class="col-12">
        <div class="card border-0 r-0" style="background-color: transparent !important;">
            <div class="card-title p-10 m-0 @settings('darkMode') text-white @else text-black @endsettings">
                Role Info
            </div>
            <div class="card-body p-0 settings-section">
                <ul class="list-group">
                    <li class="list-group-item settings-item justify-content-start" style="background-color: transparent !important;">
                        <div class="message">
                            <div id="updateStatusMessage">
                                <div class="@settings('darkMode') text-white @else text-black @endsettings">Role Name</div>
                            </div>
                            <div class="secondary">{{$role->name}}</div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-12">
        <div class="card border-0 r-0" style="background-color: transparent !important;">
            <div class="card-title p-10 m-0 @settings('darkMode') text-white @else text-black @endsettings">
                Role Permissions
            </div>
            <div class="card-body p-0 settings-section">
                <form action="{{url('admin/roles/'.$role->id.'/edit')}}" class="form-material p-3">
                    @method('put')
                    <div class="form-group p-3">
                        <div class="row">
                            @foreach($permissions as $perm)
                                <?php
                                $per_found = null;

                                if (isset($role)) {
                                    $per_found = $role->hasPermissionTo($perm->name);
                                }
                                ?>

                                <div class="col-md-4">
                                    <div class="checkbox d-flex">
                                        <input type="checkbox" class="my-auto" name="{{$perm->id}}" <?php $per_found ? print('checked') : '' ?>>
                                        <span class="text-capitalize @settings('darkMode') text-white @else text-black @endsettings">{{$perm->name}}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <button type="submit" class="mx-auto btn btn-sm btn-primary">Update Permissions</button>
                </form>
            </div>
        </div>
    </div>
</div>
