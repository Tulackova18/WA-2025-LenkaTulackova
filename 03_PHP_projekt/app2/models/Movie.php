<?php

class Movie {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($title, $director, $subcategory, $year, $price) {
        $sql = "INSERT INTO movies (title, director, subcategory, year, price) 
                VALUES (:title, :director, :subcategory, :year, :price)";
        
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute([
            ':title' => $title,
            ':director' => $director,
            ':subcategory' => $subcategory ?: null,
            ':year' => $year,
            ':price' => $price
   
            
        ]);
    }

    public function getAll() {
        $sql = "SELECT * FROM movies ORDER BY created_at DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }
}
