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
                    <h2 class='title'>{{ $post->title }}</h2>
                    <p class='body'>{{ $post->body }}</p>
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
    </body>
</html>