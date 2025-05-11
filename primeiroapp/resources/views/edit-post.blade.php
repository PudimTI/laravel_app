<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Post</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <main>
        <div class="container">
            <h1>Editar Post</h1>
            <a href="/" class="btn">Voltar</a>
        </div>

        <div class="container-posts">
            <div class="criar-post">
                <form action="/edit-post/{{ $post->id }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Título</label>
                        <input type="text" name="title" id="title" value="{{ $post->title }}" placeholder="Digite o título do post">
                    </div>
                    <div class="form-group">
                        <label for="body">Conteúdo</label>
                        <textarea name="body" id="body" placeholder="Digite o conteúdo do post">{{ $post->body }}</textarea>
                    </div>
                    <input type="submit" value="Salvar Alterações" class="btn">
                </form>
            </div>
        </div>
    </main>
</body>
</html>