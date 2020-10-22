@extends('dashboard.index')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="ml-auto text-right">
            <nav aria-label="breadcrumb"> 
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Setting</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Level</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table>
                    <tr>
                        <td align="center"><a href="#" class="btn-tambah" align="center"><i class="mdi mdi-library-plus"></i> Tambah | </a></td>
                        <td align="center"><a href="" align="center"><i class="mdi mdi-delete-sweep"></i> Trash</a></td>
                    </tr>
                </table>
                
            </div>
        </div>
        <div class="table-responsive" style="margin-top: 30px;">    
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                    <tr align="center">
                        <th>No</th>
                        <th>Level</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="modalForm">
    <div class="modal-dialog">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <h4 class="modalTitle"></h4>
            </div>
            <form method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <table width="100%">
                        <input type="hidden" id="id_level">
                        <tr>
                            <td><h5>Level</h5></td>
                            <td>:</td>
                            <td><input type="text" name="level" class="form-control" id="level" required=""></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info"> Simpan</button>
                    <button class="btn btn-danger" data-dismiss="modal"> Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>

@stop
@section('script')
<script>
    var table = $('#zero_config').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('level.datatables') }}",
        columns: [
            {'data' : 'id_level'},
            {'data' : 'level'},
            {'data' : 'action'}
        ]
    });

    $(document).ready(function (){    
        var action;
        var modalForm = $('#modalForm');
        var modalTitle = $('.modalTitle');
        var form = $(modalForm).find('form');

        var id_level = $(modalForm).find('#id_level');
        var level = $(modalForm).find('#level');

        //Clear Form 

        function clearForm()
        {
            level.val('');
        }
        //View Edit 
        $('.table').on('click', '.btn-edit', function(e){
            e.preventDefault();
            action = 'edit';
            var id = this.getAttribute('data-id');
            clearForm();
            $.ajax({
                url: "{{ route('level.index') }}/edit/"+id,
                type: "GET",
                success: function(data){
                    $(id_level).val(data.level.id_level);
                    $(level).val(data.level.level);
                }
            });

            $(modalTitle).html("Edit Level");
            $(modalForm).modal('show');
        });

        //Hapus
        $('.table').on('click', '.btn-delete', function(e){
            e.preventDefault();
            var id = this.getAttribute('data-id');
            console.log(id);

            if(confirm("Apakah Anda Yakin ?")){
                $.ajax({
                    url : "{{ route('level.index') }}/hapus/"+id,
                    type: "GET",
                    data: {id},
                    success: function(data){
                        alert('Data Berhasil Di Hapus');
                        table.ajax.reload();
                    }
                });
            }
        });

        //Modal Tambah
        $('.btn-tambah').on('click', function(e){
            action = "tambah";
            modalTitle.html("Add Level");
            clearForm();    
            $(modalForm).modal('show');
        });

        //Submit Form 
        $(form).on('submit', function(e){
            e.preventDefault();
            if(action === 'tambah'){
                url  = "{{ route('level.simpan') }}";
                type = 'POST';
            }else{
                var id = $(id_level).val();
                url = "{{ route('level.index') }}/edit/"+id;
                type = "PATCH";
            }

            $.ajax({
                url: url,
                type: type,
                data: $(form).serialize(),
                success: function (data) {
                    $(modalForm).modal('hide');
                    alert('Success');
                    table.ajax.reload();
                }
            });
        });
    });
</script>
@stop