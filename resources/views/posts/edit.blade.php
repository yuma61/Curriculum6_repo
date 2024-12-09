<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="title">編集画面</h1>
        <div class="content">
            <form action="/posts/{{ $post->id }}" method="POST">
                @csrf
                @method('PUT')
                <!--
                PUTは指定したURIの場所にリソースを作成または、変更したいときに使われる。
                ただ、PUTリクエストは、Formタグではmethod属性ではサポートされていない。
                だから、Form属性のタグのmethod属性はPOSTを指定した上で、Formタグの内側で＠method('PUT')で定義
                -->
                <div class='content__title'>
                    <h2>タイトル</h2>
                    <input type='text' name='post[title]' value="{{ $post->title }}">
                <!-- 
                name specifies the key for submitting the data.
                When the form is submitted, the value of the input field will be sent as part of the request payload.    
                -->
                </div>
                <div class='content__body'>
                    <h2>本文</h2>
                    <input type='text' name='post[body]' value="{{ $post->body }}">
                </div>
                <input type="submit" value="保存">
            </form>
        </div>
    </body>
</html>