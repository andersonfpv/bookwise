<?php

$livros = (new DB)->livros();

view('index', compact('livros'));