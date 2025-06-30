<?php

$mensagem = $_REQUEST['mensagem'] ?? '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];

    $senha = $_POST['senha'];

    // $validacao = Validacao::validar([

    //     'email' => ['required', 'email'],
    //     'senha' => ['required']

    // ], $_POST);

    // if ($validacao->naoPassou('login')) {

    //     header("Location: /login");

    //     exit();

    // }

    $usuario = $database->query(

        query: " select * from usuarios where email = :email and senha = :senha",

        // class: Usuario::class,

        params: compact('email', 'senha')

    )->fetch();

    if ($usuario) {

        // $senhaDoPost = $_POST['senha'];

        // $senhaDoBanco = $usuario->senha;

        // if (! password_verify($senhaDoPost, $senhaDoBanco)) {

        //     flash()->push('validacoes_login', ['Usuário ou senha estão incorretos!']);

        //     header('Location: /login');

        //     exit();

        // }

        $_SESSION['auth'] = $usuario;
        $_SESSION['menssagem'] = 'Seja bem vindo '. $usuario['nome'] . '!';

        // flash()->push('mensagem', "Seja bem-vindo " . $usuario->nome . "!");

        header("Location: /");

        exit();

    }

}

view('login', compact('mensagem'));