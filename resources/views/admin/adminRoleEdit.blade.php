<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header white">
                <h6>Edit Role - {{$role->name}}</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{url('admin/roles/'.$role->id.'/edit')}}" class="form-material">
                            @method('put')
                            <div class="form-group">
                                <div class="row">
                                    @foreach($permissions as $perm)
                                        <?php
                                        $per_found = null;

                                        if( isset($role) ) {
                                            $per_found = $role->hasPermissionTo($perm->name);
                                        }
                                        ?>

                                        <div class="col-md-4">
                                            <div class="checkbox">
                                                <input type="checkbox" name="{{$perm->id}}" <?php $per_found ? print('checked') : '' ?>>{{$perm->name}}</input>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <input type="submit" class="btn btn-default">Save</input>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
