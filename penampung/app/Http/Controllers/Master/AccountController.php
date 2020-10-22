<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\OptionController;

use Datatables;
use DB;
use Auth;

use App\Model\Account;
use App\Model\Master\Level;
use App\Model\Master\Article;

class AccountController extends Controller
{
    //
    function __construct()
    {
        $this->route = "account.index";
        $this->option = new OptionController();
    }

    function datatables(){

        //This Variable For Identify User Login
        $level = Auth::user()->id_level;

        //This Route For Rules 
        $route = $this->route;

        //Role From Option Controller
        $role = $this->option->role($level, $route);
        $role_delete = $role->delete;
        $role_modify = $role->modify;


        $data = array();
        $account = Account::where('is_deleted', 'N')->get();
        foreach($account as $act)
        {
            $view_edit = "<a href='".route('account.edit', $act->id_account)."' data-id='".$act->id_account."' class='btn-edit'><i class='fa fa-edit'></i></a>&nbsp;";
            $view_delete = "<a href='#' data-id='".$act->id_account."' class='btn-delete'><i class='fa fa-trash-alt'></i></a>&nbsp;";
            $view_detail = "<a href='".route('account.detail', $act->id_account)."'><i class='fa fa-search'></i></a>";

            $hapus = $role_delete == "Y" ? $view_delete : "";
            $edit = $role_modify == "Y" ? $view_edit : "";
            $detail = $view_detail;

            $act->action = $edit.$hapus.$detail;
            $data[] = $act;
        }
        return datatables::of($data)->escapecolumns([])->make(true);
    }

    function index()
    {
        $level = Auth::user()->id_level;
        $route = $this->route;
        $role = $this->option->role($level, $route);

        if($role->access == 'Y')
        {
            if($role->input == 'Y'){
                $add_component = '<td align="center"><a href="'.route('account.input').'" class="btn-tambah" align="center"><i class="mdi mdi-library-plus"></i> Tambah</a></td>';
            }else{
                $add_component = "";
            }
            $view = view('dashboard.account.index', compact('add_component'));
        }else{
            $view = "";
        }
        return $view;
    }

    function delete($id)
    {
        $level = Auth::user()->id_level;
        $route = $this->route;
        $role = $this->option->role($level, $route);

        $account = Account::findOrFail($id);
        $account->deleted_by = Auth::user()->id_account;
        $account->deleted_date = date('Y-m-d H:i:s');
        $account->is_deleted = "Y";

        if($role->delete == 'Y')
        {
            $account->update();
            $response = response()->json(['status' => 'success', 'account' => $account], 200);
        }else{
            $response = response()->json(['status' => 'error'], 404);
        }

        return $response;
    }

    function input()
    {
        $level = Auth::user()->id_level;
        $route = $this->route;
        $role = $this->option->role($level, $route);

        $mLevel = Level::where('is_deleted', 'N')->get();
        $page = "Input";
        if($role->input == 'Y'){
            $view = view('dashboard.account.input', compact('page', 'mLevel'));
        }else{
            $view = "";
        }

        
        return $view;
    }

    function save(Request $request)
    {

        $level = Auth::user()->id_level;
        $route = $this->route;
        $role = $this->option->role($level, $route);


        $foto = $request->file('photo_profile');
        $ext_foto = $foto->getClientOriginalExtension();
        $newName = rand(100000, 1001238912).".".$ext_foto;
        $foto->move('dist/img/member', $newName);

        $account = new Account;
        $account->first_name = $request->first_name;
        $account->last_name = $request->last_name;
        $account->email = $request->email;
        $account->tempat_lahir = $request->birth_place;
        $account->tgl_lahir = date('Y-m-d', strtotime($request->birth_date));
        $account->jenis_kelamin = $request->gender;
        $account->id_level = $request->level;
        $account->photo_profile = $newName;
        $account->status = $request->status;
        $account->password = $request->password;
        $account->created_by = Auth::user()->id_account;
        $account->created_date = date('Y-m-d');

        if($role->input == 'Y')
        {
            $account->save();

            // $send_mail = $this->option->sendMail($request->email, asset('asset/img/'.Auth::user()->foto), Auth::user()->name, $request->name, $generateUsername, str_replace(" ", "", $request->name));
            
            $view = "<script>alert('Input Account Berhasil');
            document.location='".route('account.index')."'</script>";
        }else{
            $view = view('errors.404');
        }

        return $view;
    }

    function edit($id)
    {
        $level = Auth::user()->id_level;
        $route = $this->route;
        $role = $this->option->role($level, $route);

        $mLevel = Level::where('is_deleted', 'N')->get();
        $account = Account::findOrFail($id);
        $page = "Edit";

        if($role->modify == 'Y'){
            $view = view('dashboard.account.edit', compact('page', 'mLevel', 'account'));
        }else{
            $view = "";
        }

        
        return $view;
    }

    function update($id, Request $request)
    {

        $level = Auth::user()->id_level;
        $route = $this->route;
        $role = $this->option->role($level, $route);


        $foto = $request->file('photo_profile');
        $ext_foto = $foto->getClientOriginalExtension();
        $newName = rand(100000, 1001238912).".".$ext_foto;
        $foto->move('dist/img/member', $newName);

        $account = Account::findOrFail($id);
        $account->first_name = $request->first_name;
        $account->last_name = $request->last_name;
        $account->email = $request->email;
        $account->tempat_lahir = $request->birth_place;
        $account->tgl_lahir = date('Y-m-d', strtotime($request->birth_date));
        $account->jenis_kelamin = $request->gender;
        $account->id_level = $request->level;
        $account->photo_profile = $newName;
        $account->password = $request->password;
        $account->status = $request->status;
        $account->updated_by = Auth::user()->id_account;
        $account->updated_date = date('Y-m-d');

        if($role->modify == 'Y')
        {
            $account->update();

            // $send_mail = $this->option->sendMail($request->email, asset('asset/img/'.Auth::user()->foto), Auth::user()->name, $request->name, $generateUsername, str_replace(" ", "", $request->name));
            
            $view = "<script>alert('Edit Account Berhasil');
            document.location='".route('account.index')."'</script>";
        }else{
            $view = view('errors.404');
        }

        return $view;
    }

    function detail($id)
    {
        $page = "Detail";
        $account = Account::findOrFail($id);
        $account->article = Article::select('cover_post', 'title_preview_post', 'summary_content_preview', 'created_date')->where('id_account', $account->id_account)->where('is_deleted', 'N')->get();

        // return $account;

        return view('dashboard.account.detail', compact('page', 'account'));
    }
}
