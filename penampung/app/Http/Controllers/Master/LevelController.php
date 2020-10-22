<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Master\Level;

use DB;
use Auth;
use Datatables;


class LevelController extends Controller
{
    //
    function datatables(){
        $data = array();
        $level = Level::where('is_deleted', 'N')->get();
        foreach($level as $lvl)
        {
            $lvl->action = "
            <a href='#' data-id='".$lvl->id_level."' class='btn-edit'><i class='mdi mdi-pencil'></i> Edit</a>&nbsp;
            <a href='#' data-id='".$lvl->id_level."' class='btn-delete'><i class='mdi mdi-delete'></i> Delete</a>
            ";
            $data[] = $lvl;
        }
        return datatables::of($data)->escapecolumns([])->make(true);
    }
    
    function index()
    {
        return view('dashboard.pages.level.index');
    }
    function simpan(Request $request)
    {
        $level = new Level;
        $level->level = $request->level;
        $level->created_by = Auth::user('administrator')->id_admin;
        $level->created_date = date('Y-m-d H:i:s');
        $level->save();

        return response()->json(['status' => 'success', 'level' => $level], 200);
    }
    function edit($id)
    {
        $level = Level::findOrFail($id);
        return response()->json(['status' => 'success', 'level' => $level], 200);
    }
    function update($id, Request $request)
    {
        $level = Level::findOrFail($id);
        $level->level = $request->level;
        $level->updated_by = Auth::user('administrator')->id_admin;
        $level->updated_date = date('Y-m-d H:i:s');
        $level->update();

        return response()->json(['status' => 'success', 'level' => $level], 200);
    }
    function delete($id)
    {
        $level = Level::findOrFail($id);
        $level->is_deleted = "Y";
        $level->deleted_by = Auth::user('administrator')->id_admin;
        $level->deleted_date = date('Y-m-d H:i:s');
        $level->update();

        return response()->json(['status' => 'success', 'level' => $level], 200);
    }
}
