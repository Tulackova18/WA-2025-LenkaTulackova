<?php
    require_once '../models/Database.php';
    require_once '../models/Movie.php';

    if (isset($_GET['id'])) {
        $id = (int)$_GET['id'];

        $db = (new Database())->getConnection();
        $movieModel = new Movie($db);

        if ($movieModel->delete($id)) {
            header("Location: ../views/movies/movies_edit_delete.php");
            exit();
        } else {
            echo "Chyba při mazání knihy.";
        }
    } else {
        echo "Neplatný požadavek.";
    }
