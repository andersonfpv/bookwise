<?php

$db = new DB();

$livros = $db->livros();

view('index', compact('livros'));