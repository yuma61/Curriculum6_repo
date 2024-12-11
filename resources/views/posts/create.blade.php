<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h1>Blog Name</h1>
        <form action="/posts" method="POST">
        <!-- 
        form is used to collect user input.
        The user often sent to as server for processing.

        action属性にはリクエストを送信するURIを定義する。
        今回はRESTの思想に則り、リソースであるpostsをURIに含める。
        
        action="/posts"
        It specifies the URL to which the form data will be submitted.
        In this case, the data will be sent to the /posts route.

        method="POST"
        It specifies that the HTTP POST method will be used to submit the form data.
        POST is typically used for creating new resources.

        フォームはデータの作成のため、POST

        -->
            @csrf
            <!-- 
            Laravel requires a CSRF (Cross-site Request Forgery) token for security purpose when handling POST requests.
            It generates a hidden input field with the CSRF token, ensuring the form submission is valid and protected against malicious attacks
            -->
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="post[title]" placeholder="タイトル"/>
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
                <!-- 
                The name attribute indicates the key under which this data will be sent, following the Laravel's convention for nested data.
                post[tile] is a way to organize and structure the form data

                If the name attribute is not stated for an input field, the data from that field will not be sent with the form submission.
                When the form is submitted, only inputs with a name attribute will appear in the request payload.
                -->
            </div>
            <div class="category">
                <h2>Category</h2>
                <select name='post[category_id]'>
                <!-- nameはPHP側でデータを受け取りたい入力項目について必須となる。-->
                    @foreach($categories as $category)
                    <!-- This $categories comes from Post.php create function. -->
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select> 
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea name="post[body]" placeholder="今日も1日お疲れさまでした。"></textarea>
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            <input type="submit" value="store"/>
            <!-- 
            type="submit" indicates that this input element is a submit button. 
            When it is clicked, it triggers the submission of the form it belongs to. 

            value="store" defines the test displayed on the button. 
            In this case, the button will display the word "store" to the user.
            -->
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>