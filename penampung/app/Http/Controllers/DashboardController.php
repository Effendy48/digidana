<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Account;
use App\Model\Master\Article;

use Auth;

class DashboardController extends Controller
{
    //
    function index()
    {
        $article = Article::where('id_account', Auth::user()->id_account)->where('is_deleted', 'N')->get();
        $account = Account::where('is_deleted', 'N')->count();
        return view('dashboard.dashboard', compact('article', 'account'));
    }
}
