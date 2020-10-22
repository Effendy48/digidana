<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Datatables;

use App\Model\Master\Role;
use App\Model\Master\Level;
use App\Model\Master\Menu;
class RoleController extends Controller
{
    //
    function index()
    {
        $level = Level::where('is_deleted', 'N')->get();

        return view('dashboard.pages.role.index', compact('level'));
    }
    function datatables(){
        $data = array();
        $level = Level::where('is_deleted', 'N')->get();
        foreach($level as $lvl)
        {
            $lvl->action = "
            <a href='".route('role.setting', $lvl->id_level)."'><i class='mdi mdi-account-settings-variant'></i> Setting</a>&nbsp
            ";
            $data[] = $lvl;
        }
        return datatables::of($data)->escapecolumns([])->make(true);
    }
    function setting($id)
    {
        $no = 1;
        $menu = Menu::where('is_deleted', 'N');
        $role = $menu->where('id_sub_menu', null)->get();
        foreach($role as $role_menu)
        {
            $sub_menu = Menu::where('id_sub_menu', $role_menu->id_menu)->where('is_deleted', 'N')->get();
            foreach($sub_menu as $sm)
            {
                $role_setting = Role::where('id_level', $id)
                ->where('id_menu', $sm->id_menu)
                ->where('is_deleted', 'N')
                ->select('id_menu','access', 'input', 'modify', 'delete')
                ->first();

                $sm->role_setting = $role_setting;
            }
            $role_setting = Role::where('id_level', $id)
            ->where('id_menu', $role_menu->id_menu)
            ->where('is_deleted', 'N')
            ->select('id_menu','access', 'input', 'modify', 'delete')
            ->first();

            $role_menu->no = $no++;
            $role_menu->role_setting = $role_setting; 
            $role_menu->sub_menu = $sub_menu;
        }
        return view('dashboard.pages.role.setting', compact('role'));
    }   
    function save_role($id, Request $request)
    {
        $role = Role::where('id_level',$id);
        $role->delete();

        $menu = Menu::where('is_deleted', 'N')->get();
        foreach($menu as $m)
        {
            $data = array();
            $data['id_level'] = $id;
            $data['id_menu'] = $m->id_menu;

            if(!empty($_POST['access'][$m->id_menu])){
                $data['access'] = "Y";
            }

            if(!empty($_POST['input'][$m->id_menu])){
                $data['input'] = "Y";
            }

            if(!empty($_POST['modify'][$m->id_menu])){
                $data['modify'] = "Y";
            }
            
            if(!empty($_POST['delete'][$m->id_menu])){
                $data['delete'] = "Y";
            }
            
            Role::create($data);
        }

        return redirect()->route('role.index');
    }
}
