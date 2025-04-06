<?php
require_once '../models/Database.php';
require_once '../models/Movie.php';

class MovieController {
    private $db;
    private $movieModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->movieModel = new Movie($this->db);
    }

    public function createMovie() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = htmlspecialchars($_POST['title']);
            $director = htmlspecialchars($_POST['director']);
            $subcategory = !empty($_POST['subcategory']) ? htmlspecialchars($_POST['subcategory']) : null;
            $year = intval($_POST['year']);
            $price = floatval($_POST['price']);
       

        

            // Uložení filmu do DB
            if ($this->movieModel->create($title, $director, $subcategory, $year, $price)) {
                header("Location: ../controllers/movies_list.php"); 
                exit();
            } else {
                echo "Chyba při ukládání filmu.";
            }
        }
    }

    public function listMovies() {
        $movies = $this->movieModel->getAll();
        include '../views/movies/movies_list.php'; 
    }
}

// Volání metody při odeslání formuláře
$controller = new MovieController();
$controller->createMovie();
