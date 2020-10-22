<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\OptionController;

use Datatables;
use App\Model\Master\Subscriber;
use App\Model\Master\Article;

use Auth;

class SubscriberController extends Controller
{
    //
    function __construct()
    {
        $this->route = "subscriber.index";
        $this->option = new OptionController();
        // $this->middleware('auth');
    }

    function sendEmail()
    {
        $headline = Article::where('is_deleted', 'N')->select('id_post', 'cover_post', 'title_preview_post')->orderBy('id_post', 'desc')->first();
        $headline->link = route('home.detail-article', $headline->id_post);
        $related_article = Article::where('is_deleted', 'N')->orderBy('id_post', 'desc')->get();
        
        
        $email = "wahyupradana729@gmail.com";
        $send_mail = $this->option->sendMail($email, $headline, $related_article);
        return $send_mail;
    }


    function index()
    {
        $level = Auth::user()->id_level;
        $route = $this->route;
        $role = $this->option->role($level, $route);

        if($role->access == 'Y')
        {
            if($role->input == 'Y'){
                $add_component = "<td align='center'><a href='#' class='btn-tambah' align='center'><i class='mdi mdi-library-plus'></i> Tambah</a></td>";
            }else{
                $add_component = "";
            }
            $view = view('dashboard.pages.subscriber.index', compact('add_component'));
        }else{
            $view = "";
        }

        return $view;
        // return view('dashboard.pages.subscriber.index');
    }

    function datatables()
    {
        $data = array();

        //This Variable For Identify User Login
        $level = Auth::user()->id_level;

        //This Route For Rules 
        $route = $this->route;

        //Role From Option Controller
        $role = $this->option->role($level, $route);
        $role_delete = $role->delete;
        $role_modify = $role->modify;


        $subscriber = Subscriber::where('is_deleted', 'N')->get();
        $no = 1;


        foreach($subscriber as $subs)
        {
            $view_edit = "<a href='#' data-id='".$subs->id_subscriber."' class='btn-edit'><i class='fa fa-pencil-alt'></i></a>&nbsp";
            $view_delete = "<a href='#' data-id='".$subs->id_subscriber."' class='btn-delete'><i class='fa fa-trash-alt'></i></a>";

            $edit = $role_modify == "Y" ? $view_edit : "";
            $delete = $role_delete == "Y" ? $view_delete : "";
            $subs->no = $no++;
            $subs->action = $edit.$delete;
            $data[] = $subs;
        }
        return datatables::of($data)->escapecolumns([])->make(true);

    }

    function simpan(Request $request)
    {
        $subscriberCheck = Subscriber::where('email_subscriber', $request->email)->count();

        if($subscriberCheck >= 1)
        {
            $subscriber = [];
        }else{
            $subscriber = new Subscriber;
            $subscriber->email_subscriber = $request->email;
            $subscriber->created_date = date('Y-m-d H:i:s');
            $subscriber->save();
        }
        
        return response()->json(['status' => 'success', 'subscriber' => $subscriber], 200);
    }

    function saveFrontEnd(Request $request)
    {
        $subscriberCheck = Subscriber::where('email_subscriber', $request->email)->count();

        if($subscriberCheck >= 1)
        {
            return '<script>alert("'.$request->email.' is already a list member");
            document.location="'.route('home.index').'"</script>';
        }else{
            
            $subscriber = new Subscriber;
            $subscriber->email_subscriber = $request->email;
            $subscriber->created_date = date('Y-m-d H:i:s');
            $subscriber->save();
            
            return "<script>alert('Terima Kasih '".$request->email."' Telah Subcribe');
            document.location='".route('home.index')."'</script>";
        }
    }
    function edit($id)
    {
        $subscriber = Subscriber::findOrFail($id);
        return response()->json(['status' => 'success', 'subscriber' => $subscriber], 200);
    }
    function update($id, Request $request)
    {
        $subscriber = Subscriber::findOrFail($id);
        $subscriber->email_subscriber = $request->email;
        $subscriber->update();

        return response()->json(['status' => 'success', 'subscriber' => $subscriber], 200);
    }

    function delete($id)
    {
        $subscriber = Subscriber::findOrFail($id);
        $subscriber->is_deleted = "Y";
        $subscriber->update();

        return response()->json(['status' => 'success', 'subscriber' => $subscriber], 200);
    }
    
}
