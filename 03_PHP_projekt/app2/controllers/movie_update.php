<?php
    require_once '../models/Database.php';
    require_once '../models/Movie.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = (int)$_POST['id'];
        $title = htmlspecialchars($_POST['title']);
        $director = htmlspecialchars($_POST['author']);
        $subcategory = !empty($_POST['subcategory']) ? htmlspecialchars($_POST['subcategory']) : null;
        $year = intval($_POST['year']);
        $price = floatval($_POST['price']);
        
        $db = (new Database())->getConnection();
        $bookModel = new Book($db);

        $success = $bookModel->update(
            $id,
            $title,
            $director,
            $subcategory,
            $year,
            $price,
            
        );

        if ($success) {
            header("Location: ../views/movies/movies_edit_delete.php");
            exit();
        } else {
            echo "Chyba při aktualizaci knihy.";
        }
    } else {
        echo "Neplatný požadavek.";
    }