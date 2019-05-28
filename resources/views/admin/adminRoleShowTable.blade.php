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

    <script>
        $(document).ready(function() {
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
@endforeach
