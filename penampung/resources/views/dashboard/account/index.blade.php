@extends('dashboard.index')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="ml-auto text-right">
            <nav aria-label="breadcrumb"> 
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Master</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Account</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table>
                    <tr>
                        <?php echo htmlspecialchars_decode($add_component); ?>
                    </tr>
                </table>
                
            </div>
        </div>
        <div class="table-responsive" style="margin-top: 30px;">    
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                    <tr align="center">
                        <th width="10%">No</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Jenis Kelamin</th>
                        <th width="20%">Action</th>
                    </tr>
                </thead>
                <tbody align="center">
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop
@section('script')
<script>

    var table = $('#zero_config').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('account.datatables') }}",
        columns: [
            {'data' : 'id_account'},
            {'data' : 'first_name'},
            {'data' : 'last_name'},
            {'data' : 'email'},
            {'data' : 'jenis_kelamin'},
            {'data' : 'action'}
        ]
    });

    $(document).ready(function (){    
        //Delete
        $('.table').on('click', '.btn-delete', function(e){
            e.preventDefault();
            var id = this.getAttribute('data-id');
            console.log(id);

            if(confirm("Apakah Anda Yakin ?")){
                $.ajax({
                    url : "{{ route('account.index') }}/delete/"+id,
                    type: "GET",
                    data: {id},
                    success: function(data){
                        alert('Delete Data Success');
                        table.ajax.reload();
                    }
                });
            }
        });


    });
</script>
@stop