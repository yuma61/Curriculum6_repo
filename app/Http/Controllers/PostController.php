<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\PostRequest;


class PostController extends Controller
{
    //
    public function index(Post $post)
    {
        // クライアントインスタンス生成
        $client = new \GuzzleHttp\Client(
            ['verify' => config('app.env') !== 'local'],
        );
        // 'verify' option in the Guzzle HTTP client configuration 
        // determines whether SSL certificate verification should be 
        // performned when making HTTPS requests

        // ['verify' => config('app.env') !== 'local'],
        // When the application us running in a local development environment,
        // SSL verification is diabled.
        // This is useful because local development servers often use self-signed certificates
        // or do not have SSL configured, which can cause errors during API requests


        // GET通信URL
        $url = 'https://teratail.com/api/v1/questions';

        // リクエスト送信と返却データの取得
        // Bearerトークンにアクセストークンを指定して認証を行う
        $response = $client->request(
            'GET',
            $url,
            ['Bearer' => config('services.teratail.token')]
        );
        
        // This sends a HTTP GET request to the URL stored in $url
        // Bearer is intended to set the authorization header with a Bearer token

        // API通信で取得したデータはJson形式なので、PHPファイルに対応した連想配列にデコード
        $questions = json_decode($response->getBody(), true);


        return view('posts.index')->with([
            'posts' => $post->getPaginateByLimit(),
            'questions' => $questions['questions'],
        ]);
        // get() performs SELECT * FROM table. 
    }

    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);
    }

    public function create(Category $category)
    {
        return view('posts.create')->with(['categories' => $category->get()]);
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

    public function edit(Post $post) 
    {
        return view('posts.edit')->with(['post' => $post]);
    }

    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
        return redirect('/posts/' . $post->id);
    }

    public function delete(Post $post) 
    {
        $post->delete();
        return redirect('/');
    }
}
