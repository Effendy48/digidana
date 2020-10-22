@extends('dashboard.index')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="ml-auto text-right">
            <nav aria-label="breadcrumb"> 
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Setting</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Menu</li>
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
            <table id="zero_config" class="table table-striped table-bordered" width="100%">
                <thead>
                    <tr align="center">
                        <th>#</th>
                        <th>Menu</th>
                        <th>Type Menu</th>
                        <th>Route</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach($menu as $mn)
                <tbody>
                    <tr>
                        <td><i class="{{ $mn->icon }}"></i></td>
                        <td>{{ $mn->menu }}</td>
                        <td>{{ $mn->type_menu }}</td>
                        <td>{{ $mn->route }}</td>
                        <td><a href="#" class="btn-hapus" data-id="{{ $mn->id_menu }}">Hapus</a>&nbsp;
                        <a href="#" class="btn-edit" data-id="{{ $mn->id_menu }}"> Edit</a></td>
                    </tr>
                    @foreach($mn->sub_menu as $sub_menu)
                    <tr style="background: #d4ff81;">
                        <td><i class="{{ $sub_menu->icon }}"></i></td>
                        <td>- {{ $sub_menu->menu }}</td>
                        <td>- {{ $sub_menu->type_menu }}</td>
                        <td>{{ $sub_menu->route }}</td>
                        <td><a href="#" class="btn-hapus" data-id="{{ $sub_menu->id_menu }}">Hapus</a>&nbsp;
                        <a href="#" class="btn-edit" data-id="{{ $sub_menu->id_menu }}"> Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
                @endforeach
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
                        <input type="hidden" id="id_menu">
                        <tr>
                            <td>Menu</td>
                            <td>:</td>
                            <td><input type="text" name="menu" class="form-control" id="menu" required=""></td>
                        </tr>
                        <tr>
                            <td>Icon Menu</td>
                            <td>:</td>
                            <td><input type="text" name="icon_menu" class="form-control" id="icon_menu" required=""></td>
                        </tr>
                        <tr>
                            <td>Type Menu</td>
                            <td>:</td>
                            <td><select name="type_menu" id="type_menu" class="form-control">
                                <option value="MENU">MENU</option>
                                <option value="SUBMENU">SUBMENU</option>
                                <option value="TITLEMENU">TITLEMENU</option>
                            </select></td>
                        </tr>
                        <tr id="content_sub_menu" style="display: none;">
                            <td>Sub Menu</td>
                            <td>:</td>
                            <td><select name="sub_menu" id="sub_menu" class="form-control">
                                    <option value=""></option>
                                @foreach($titleMenu as $tm)
                                    <option value="{{ $tm->id_menu }}">{{ $tm->menu }}</option>
                                @endforeach
                            </select></td>
                        </tr>
                        <tr>
                            <td>Route Menu</td>
                            <td>:</td>
                            <td><input type="text" name="route_menu" class="form-control" id="route_menu"></td>
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

    $(document).ready(function(){
        var action;
        var modalForm = $('#modalForm');
        var modalTitle = $('.modalTitle');
        var form = $(modalForm).find('form');

        //Object Form
        var id_menu = $('#id_menu');
        var menu = $('#menu');
        var icon_menu = $('#icon_menu');
        var sub_menu = $('#sub_menu');
        var content_sub_menu = $('#content_sub_menu');
        var type_menu = $('#type_menu');
        var route_menu = $('#route_menu');

        $(type_menu).on("change", function (){
            var selectedCountry = $(this).children("option:selected").val();

            if(selectedCountry == "SUBMENU")
            {
                $(content_sub_menu).css("display","");
            }else{
                $(content_sub_menu).css("display","none");
            }
            console.log(selectedCountry);
        });

        //Function Clear Form
        function clearForm()
        {
           $(id_menu).val('');
           $(menu).val(''); 
           $(icon_menu).val('');
           $(type_menu).val('');
           $(route_menu).val('');
        }

        //Modal Tambah
        $('.btn-tambah').on('click', function(e){
            action = "tambah";
            modalTitle.html("Add Menu");
            clearForm();
            $(modalForm).modal('show');
        });

        //Hapus
        $('.table').on('click', '.btn-hapus', function(e){
            e.preventDefault();
            var id = this.getAttribute('data-id');
            console.log(id);

            if(confirm("Apakah Anda Yakin ?")){
                $.ajax({
                    url : "{{ route('menu.index') }}/hapus/"+id,
                    type: "GET",
                    data: {id},
                    success: function(data){
                        alert('Success Delete Data');
                        document.location = "{{ route('menu.index') }}";
                    }
                });
            }
        });

        //View Edit 
        $('.table').on('click', '.btn-edit', function(e){
            e.preventDefault();
            action = 'edit';
            var id = this.getAttribute('data-id');
            clearForm();
            $.ajax({
                url: "{{ route('menu.index') }}/edit/"+id,
                type: "GET",
                success: function(data){
                    console.log(data.menu.id_sub_menu);
                    $(id_menu).val(data.menu.id_menu);
                    $(menu).val(data.menu.menu);
                    $(icon_menu).val(data.menu.icon);
                    $(route_menu).val(data.menu.route);
                    $(type_menu).val(data.menu.type_menu).change();
                    if(data.menu.type_menu == "SUBMENU")
                    {
                        $(content_sub_menu).css("display","");
                        $(sub_menu).val(data.menu.id_sub_menu).change();
                    }else{
                        $(content_sub_menu).css("display","none");
                    }
                    
                }
            });

            $(modalTitle).html("Edit Menu");
            $(modalForm).modal('show');
        });


        //Submit Form
        $(form).on('submit', function(e){
            e.preventDefault();
            if(action === 'tambah')
            {
                url  = "{{ route('menu.simpan') }}";
                type = 'POST'; 
            }else{
                var id = $(id_menu).val();
                url = "{{ route('menu.index') }}/edit/"+id;
                type = "PATCH";   
            }

            $.ajax({
                url: url,
                type: type,
                data: $(form).serialize(),
                success: function (data) {
                    $(modalForm).modal('hide');
                    alert('Success');
                    document.location = "{{ route('menu.index') }}";
                }
            });

        });

    }); 
</script>
@stop