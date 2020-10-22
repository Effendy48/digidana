<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Master\Article;
use App\Model\Account;

use DB;


class HomeController extends Controller
{
    //
    function index()
    {
        $headline = Article::where('is_deleted', 'N')->select('id_post', 'cover_post', 'title_preview_post')->orderBy('id_post', 'desc')->first();
        $article = Article::where('is_deleted', 'N')->orderBy('id_post', 'desc')->get();
        $member = Account::where('is_deleted', 'N')->select('first_name', 'last_name', 'status', 'photo_profile')->get();

        foreach($article as $art)
        {
            $account = DB::table('account')->where('id_account', $art->created_by)->first();
            $art->created_by_account = $account->first_name."".$account->last_name;
        }

        // return $article;
        // return $member;
        // return $headline;
        return view('home.home', compact('headline', 'article', 'member'));
    }

    function category($params)
    {
        $params = str_replace("-", " ", $params);
        $article = Article::where('is_deleted', 'N')->orderBy('id_post', 'desc')->where('tag_post', 'LIKE', '%'.$params.'%')->get();

        return view('home.category', compact('article'));
    }

    function detailArticle($id)
    {
        $headline = Article::where('is_deleted', 'N')->select('id_post', 'cover_post', 'title_preview_post')->orderBy('id_post', 'desc')->first();
        $article = Article::where('is_deleted', 'N')->where('id_post', $id)->orderBy('id_post', 'desc')->first();

        return view('home.detailArticle', compact('article', 'headline'));
    }
}
