<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todos os Posts</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <main>
        <div class="container">
            <h1>Logado como {{ auth()->user()->name }}</h1>
            @auth
                <form action="/logout" method="post" style="display: inline;">
                    @csrf
                    <input type="submit" value="Logout" class="btn">
                </form>
            @endauth
            <a href="/" class="btn">Voltar</a>
        </div>

        <div class="container-posts">
            <h1>Todos os Posts</h1>
            <div class="posts-list">
                @foreach ($posts as $post)
                    <div class="post">
                        <h3>{{ $post->title }}</h3>
                        <h4>Criado por: {{ $post->user->name }}</h4>
                        <p>{{ $post->body }}</p>
                        @if (auth()->check() && auth()->user()->id === $post->user_id)
                            <p><a href="/edit-post/{{$post->id}}" class="btn">Editar</a></p>
                            <form action="/delete-post/{{ $post->id }}" method="post" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Deletar" class="btn btn-danger">
                            </form>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </main>
</body>
</html>