<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Datatables;
use DB;
use Auth;

use App\Model\Master\Menu;
class MenuController extends Controller
{
    //
    function datatables()
    {
        $no = 1;
        $menu = Menu::where('is_deleted', 'N');
        $role = $menu->where('id_sub_menu', null)->get();
        foreach($role as $role_menu)
        {
            $sub_menu = Menu::where('id_sub_menu', $role_menu->id_menu)->where('is_deleted', 'N')->get();
        
            $role_menu->no = $no++;
            $role_menu->sub_menu = $sub_menu;
        }

        return $role;
    }
    function index()
    {
        $menu = $this->datatables();
        $titleMenu = Menu::where('type_menu', 'TITLEMENU')->where('is_deleted', 'N')->get();
        return view('dashboard.pages.menu.index', compact('titleMenu', 'menu'));
    }
    function simpan(Request $request)
    {
        $type_menu = $request->type_menu;
        $id_sub_menu = null;

        if($type_menu == "SUBMENU"){
            $id_sub_menu = $request->sub_menu;
        }else{
            $id_sub_menu = null;
        }

        $menu = new Menu;
        $menu->menu = $request->menu;
        $menu->icon = $request->icon_menu;
        $menu->type_menu = $type_menu;
        $menu->id_sub_menu = $id_sub_menu;
        $menu->route = $request->route_menu;
        $menu->created_by = Auth::user('administrator')->id_admin;
        $menu->created_date = date('Y-m-d H:i:s');
        $menu->save();

        return response()->json(['status' => 'success', 'menu' => $menu], 200);
    }
    function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return response()->json(['status' => 'success', 'menu' => $menu], 200);
    }
    function update($id, Request $request)
    {
        $type_menu = $request->type_menu;
        $id_sub_menu = null;

        if($type_menu == "SUBMENU"){
            $id_sub_menu = $request->sub_menu;
        }else{
            $id_sub_menu = null;
        }

        $menu = Menu::findOrFail($id);
        $menu->menu = $request->menu;
        $menu->icon = $request->icon_menu;
        $menu->type_menu = $type_menu;
        $menu->id_sub_menu = $id_sub_menu;
        $menu->route = $request->route_menu;
        $menu->updated_by = Auth::user('administrator')->id_admin;
        $menu->updated_date = date('Y-m-d H:i:s');
        $menu->update();

        return response()->json(['status' => 'success', 'menu' => $menu], 200);
    }
    function delete($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->is_deleted = "Y";
        $menu->deleted_by = Auth::user('administrator')->id_admin;
        $menu->deleted_date = date('Y-m-d H:i:s');
        $menu->update();

        return response()->json(['status' => 'success', 'menu' => $menu], 200);
    }
}
