<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    //
    public function index(Post $post)
    {
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);
        // get() performs SELECT * FROM table. 
    }

    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);
    }

    public function create(Post $post)
    {
        return view('posts.create');
    }

    public function store(PostRequest $request, Post $post)
    {
        // Request $request 
        // ユーザーからのリクエストに含まれるデータを扱う場合、Requestインスタンスを利用する。
        // Post $post
        // 今回はユーザーの入力データをDBのpostsテーブルにアクセスし保存する必要があるため、空のPostインスタンスを利用。
        $input = $request['post'];
        // postをキーに持つリクエストパラメータを取得できる
        // ここのpostは、リクエストデータのキーとして機能。
        // HTMLのフォームタグ内のname属性と一致させる。
        $post->fill($input)->save();
        // fill()は、$inputを$postインスタンスにセット。
        // fill()を使うには、PostModel側で、fillableというプロパティにfillが可能なプロパティを指定しておく必要がある。
        return redirect('/posts/' . $post->id);
        // 処理が終わったら、今回保存したpostのIDを含んだURLにリダイレクトされる。
    }


}
