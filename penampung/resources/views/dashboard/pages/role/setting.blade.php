@extends('dashboard.index')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="ml-auto text-right">
            <nav aria-label="breadcrumb"> 
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Setting</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Role</li>
                </ol>
            </nav>
        </div>
        <?php 
            $id = Request()->route('id');
        ?>
        <div class="table-responsive" style="margin-top: 30px;">
            <form method="post" action="{{ route('role.save', $id) }}">
            {{ csrf_field() }}
                <table id="zero_config" class="table table-striped table-bordered" style="font-size: 12px;">
                    <thead>
                        <th><b>Icon</b></th>
                        <th><b>Menu</b></th>
                        <th><b>Type Menu</b></th>
                        <th><b>Can Access</b></th>
                        <th><b>Can Create</b></th>
                        <th><b>Can Modify</b></th>
                        <th><b>Can Delete</b></th>
                    </thead>
                    @foreach($role as $rl)
                    <tr>
                        <td><i class="{{ $rl->icon }}"></i></td>
                        <td>{{ $rl->menu }}</td>
                        <td>{{ $rl->type_menu }}</td>
                        <td align="center"><input type="checkbox" name="access[{{ $rl->id_menu }}]" <?php echo @$rl['role_setting']['access'] == "Y" ? "checked" : null; ?> value="Y"></td>
                        <td align="center"><input type="checkbox" name="input[{{ $rl->id_menu }}]" <?php echo @$rl['role_setting']['input'] == "Y" ? "checked" : null; ?> value="Y"></td>
                        <td align="center"><input type="checkbox" name="modify[{{ $rl->id_menu }}]" <?php echo @$rl['role_setting']['modify'] == "Y" ? "checked" : null; ?> value="Y"></td>
                        <td align="center"><input type="checkbox" name="delete[{{ $rl->id_menu }}]" <?php echo @$rl['role_setting']['delete'] == "Y" ? "checked" : null; ?> value="Y"></td>
                    </tr>
                        <?php $no = 1; ?>
                        @foreach($rl->sub_menu as $sub_menu)
                        <tr style="background: #d4ff81;">
                            <td><i class="{{ $sub_menu->icon }}"></i></td>
                            <td>- {{ $sub_menu->menu }}</td>
                            <td>{{ $sub_menu->type_menu }}</td>
                            <td align="center"><input type="checkbox" name="access[{{ $sub_menu->id_menu }}]" <?php echo @$sub_menu['role_setting']['access'] == "Y" ? "checked" : null; ?>   value="Y"></td>
                            <td align="center"><input type="checkbox" name="input[{{ $sub_menu->id_menu }}]" <?php echo @$sub_menu['role_setting']['input'] == "Y" ? "checked" : null; ?>  value="Y"></td>
                            <td align="center"><input type="checkbox" name="modify[{{ $sub_menu->id_menu }}]" <?php echo @$sub_menu['role_setting']['modify'] == "Y" ? "checked" : null; ?>  value="Y"></td>
                            <td align="center"><input type="checkbox" name="delete[{{ $sub_menu->id_menu }}]" <?php echo @$sub_menu['role_setting']['delete'] == "Y" ? "checked" : null; ?>  value="Y"></td>
                        </tr>
                        @endforeach
                    @endforeach
                </table>
                <button type="submit" class="btn btn-info"><i class="mdi mdi-account-settings-variant"></i>  Update Role</button>
            </form>
        </div>
    </div>
</div>
@stop