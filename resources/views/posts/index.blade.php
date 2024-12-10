<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- 
The code above is setting the lang attributes based on the application's current locate.
-->

    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Blog Name</h1>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <h2 class='title'>
                        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                        <!-- a tag creates a link for navigation.
                        post part injects the id of the specific post into the URL. 
                        When the title is clicked, it will go to the page of that id's post.
                        -->
                    </h2>
                    <p class='body'>{{ $post->body }}</p>
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                        @csrf 
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $post->id }})">delete blog {{ $post->id }}</button>
                    </form>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
            <!-- 
            links() is a method provided by Laravel's LengthAwarePaginator class.
            It generates HTML pagination links for navigating through paginated data.

            2 primary purpose
            1. Connecting paginated data to the HTML view
            2. Linking between pages of paginated data
            -->
        </div>
        <a href='/posts/create'>作成</a>

        <script>
            function deletePost(id) {
                'use strict'
                // This function is for confirming deletion of the blog.

                if (confirm("削除すると復元できません。\n本当に削除しますか?")) {
                    document.getElementById(`form_${id}`).submit();
                    // The reason of form_ is to intead of just id is 
                    // to make the id unique.
                    // For example, if there was another data from another table, 
                    // and it also uses id for the instances to be unique.
                    // Without the prefix form_ the program would not know which which table's id is it.
                }
            }
        </script>
    </body>
</html>