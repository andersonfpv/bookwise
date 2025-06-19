<?php

$pesquisar = $_REQUEST['pesquisar'] ?? '';

$livros = (new DB)->query(
    query: "select * from livros where titulo like :filtro", 
    class: Livro::class, 
    params: ['filtro' => "%$pesquisar%"])->fetchAll();

view('index', compact('livros'));