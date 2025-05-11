<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Blog</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <main>
        @auth
            <div class="container">
                <h1>Bem vindo {{ auth()->user()->name }}!</h1>
                <form action="/logout" method="post">
                    @csrf
                    <input type="submit" value="Logout">
                </form>
                <button class="btn" onclick="window.location.href='/posts'">Ver todos os posts</button>
            </div>
            

            <div class="container-posts">
                <div class="criar-post">
                    <h2>Criar Post</h2>
                    <form action="/create-post" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title">Título</label>
                            <input name="title" type="text" id="title" placeholder="Digite o título do post">
                        </div>
                        <div class="form-group">
                            <label for="body">Conteúdo</label>
                            <textarea name="body" id="body" placeholder="Digite o conteúdo do post"></textarea>
                        </div>
                        <input type="submit" value="Criar Post">
                    </form>
                </div>
                <div class="posts-list">
                    <h2>Meus Posts</h2>
                    @foreach ($posts as $post)
                        <div class="post">
                            <h3>{{ $post->title }}</h3>
                            <h4>Criado por: {{ $post->user->name }}</h4>
                            <p>{{ $post->body }}</p>
                            <button class="btn" onclick="window.location.href='/edit-post/{{$post->id}}'">Editar</button>
                            <form action="/delete-post/{{ $post->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Deletar">
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div class="login">
                <h2>Login</h2>
                <form action="/login" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="login_name">Nome</label>
                        <input name="login_name" type="text" id="login_name" placeholder="Digite seu nome">
                    </div>
                    <div class="form-group">
                        <label for="login_password">Senha</label>
                        <input name="login_password" type="password" id="login_password" placeholder="Digite sua senha">
                    </div>
                    <input type="submit" value="Login">
                </form>
                <button class="btn-registro">Me registrar</button>
            </div>


            <div class="registro">
                <h2>Registro</h2>
                <form action="/register" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input name="name" type="text" id="name" placeholder="Digite seu nome">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input name="email" type="email" id="email" placeholder="Digite seu email">
                    </div>
                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input name="password" type="password" id="password" placeholder="Digite sua senha">
                    </div>
                    <input type="submit" value="Registrar">
                </form>

                <button class="btn-login">Fazer login</button>
            </div>
            
        @endauth
    </main>
    <script src="{{ asset('js/home.js') }}"></script>
</body>
</html>