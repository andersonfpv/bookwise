<?php

class DB {

    private $db;

    public function __construct()
    {
        $this -> db = new PDO('sqlite:database.sqlite');
    }
    /**
    * Retorna todos os livros do banco de dados
    * 
    * @return array[Livro]
    */
    public function livros($pesquisa = ''){
        
        $prepare = $this->db->prepare("select * from livros where usuario_id = 1 and titulo like :pesquisa");
        
        $prepare->bindValue('pesquisa', "%$pesquisa%");
        
        $prepare->execute();

        $items = $prepare->fetchAll();

        return array_map(fn($item) => Livro::make($item), $items);

    }

    public function livro($id){
        $sql = "select * from livros";

        $sql .= " where id = " . $id;

        $query = $this->db->query($sql);

        $items = $query->fetchAll();

        return array_map(fn($item) => Livro::make($item), $items)[0];
    }
}