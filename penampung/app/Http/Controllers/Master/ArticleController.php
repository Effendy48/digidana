<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Master\Article;
use App\Model\Account;
use Auth;


include "sdk/simple_dom/simple_html_dom.php";

class ArticleController extends Controller
{
    
    function index()
    {
        $article = $this->dataArticle();
        // return $article;
        return view('dashboard.pages.article.index', compact('article'));        
    }

    function dataArticle()
    {
        $article = Article::where('is_deleted', 'N');

        if(Auth::user()->id_level == 1)
        {
            $article = $article->get();
        }else{
            $article = $article->where('id_account', Auth::user()->id_account)->get();
        }
        // paginate(10);
        foreach($article as $art){
            $account = Account::where('id_account', $art->id_account)->select('first_name', 'last_name')->first();

            $tagging = explode(",", $art->tag_post);
            $art->tagging = $tagging;   
            $art->count_tagging = count($tagging);
            $art->publish_by = $account->first_name." ".$account->last_name;
        }

        return $article;
    }

    function input()
    {
        return view('dashboard.pages.article.input');
    }

    function previewPost($id)
    {
        $image_preview = "";
        $content_preview = "";
        
        $display_p = "";
        $display_h1 = "";
        $display_h2 = "";
        $display_h3 = "";
        $display_h4 = "";
        $display_pre = "";
        $title = "";


        $article = Article::where('is_deleted', 'N')->where('id_post', $id)->first();
        $title_url = str_get_html($article->title_post);
        $content_post = str_get_html($article->content_post);
        
        if($article->content_post == null){
            $content_preview = "";
        }else{
            foreach($content_post->find('p') as $cp_p){
                $content_preview .= $cp_p->plaintext;
            }
        }
        

        foreach($title_url->find('img') as $img){
            $image_preview .= $img->src."|";
        }

        foreach($title_url->find('p') as $p){
            $display_p = $p->plaintext;
        }
        foreach($title_url->find('h1') as $h1){
            $display_h1 = $h1->plaintext;
        }

        foreach($title_url->find('h2') as $h2){
            $display_h2 = $h2->plaintext;
        }

        foreach($title_url->find('h3') as $h3){
            $display_h3 = $h3->plaintext;
        }

        foreach($title_url->find('h4') as $h4){
            $display_h4 = $h4->plaintext;
        }

        foreach($title_url->find('pre') as $pre){
            $display_pre = $pre->plaintext;
        }

        if($display_p != null)
        {
            $title .= $display_p;
        }else if($display_h1 != null){
            $title .= $display_h1;
        }else if($display_h2 != null){
            $title .= $display_h2;
        }else if($display_h3 != null){
            $title .= $display_h3;
        }else if($display_h4 != null){
            $title .= $display_h4;
        }else if($display_pre != null){
            $title .= $display_pre;
        }


        $image_preview = explode("|", $image_preview);
        $image_preview = $image_preview[0];

        // return $title;
        return view('dashboard.pages.article.input_detail', compact('title', 'image_preview', 'content_preview'));
    }

    function simpan(Request $request)
    {
        $article = new Article;
        $article->id_account = Auth::user()->id_account;
        $article->title_post = $request->title_post;
        $article->content_post = $request->content_post;
        $article->created_by = Auth::user()->id_account;
        $article->created_date = date('Y-m-d H:i:s');
        $article->save();

        $article_last = Article::orderby('id_post', 'desc')->first();

        return redirect()->route('article.preview', $article_last->id_post);
    }

    function update($id, Request $request)
    {
        $article = Article::findOrFail($id);
        $article->id_account = Auth::user()->id_account;
        $article->cover_post = $request->cover_post;
        $article->title_preview_post = $request->title_preview_post;
        $article->summary_content_preview = $request->summary_content_preview;
        $article->tag_post = $request->tag;
        $article->status = "PUBLISH";
        $article->created_by = Auth::user()->id_account;
        $article->created_date = date('Y-m-d H:i:s');
        $article->save();

        return redirect()->route('article.index');
    }

    function delete($id, Request $request)
    {
        $article = Article::findOrFail($id);
        $article->deleted_by = Auth::user()->id_account;
        $article->deleted_date = date('Y-m-d H:i:s');
        $article->is_deleted = "Y";
        $article->save();

        return redirect()->route('article.index');
    }


}
