<?php
require_once '../../models/Database.php';
require_once '../../models/Movie.php';

$db = (new Database())->getConnection();
$movieModel = new Movie($db);
$movies = $movieModel->getAll();

$editMode = false;
$movieToEdit = null;

if (isset($_GET['edit'])) {
    $editId = (int)$_GET['edit'];
    $movieToEdit = $movieModel->getById($editId);
    if ($movieToEdit) {
        $editMode = true;
    }
}
?>


<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editace a mazání filmů</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Knihovna</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Přepnout navigaci">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="../views/movies/book_create.php">Přidat knihu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Výpis knih</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <?php if ($editMode): ?>
            <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                    <h2>Upravit knihu: <?= htmlspecialchars($movieToEdit['title']) ?></h2>
                    </div>
                    <div class="card-body">
                        <form action="../../controllers/book_update.php" method="post">
                            <input type="hidden" name="id" value="<?= $movieToEdit['id'] ?>">
                            <div class="mb-3">
                                <label class="form-label">ID knihy:</label>
                                <input type="text" class="form-control" value="<?= $movieToEdit['id'] ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Název knihy:</label>
                                <input type="text" id="title" name="title" class="form-control" required value="<?= htmlspecialchars($movieToEdit['title']) ?>">
                            </div>

                            <div class="mb-3">
                                <label for="author" class="form-label">Autor:</label>
                                <input type="text" id="author" name="author" class="form-control" required value="<?= htmlspecialchars($movieToEdit['author']) ?>">
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">Kategorie:</label>
                                <input type="text" id="category" name="category" class="form-control" value="<?= htmlspecialchars($movieToEdit['category']) ?>">
                            </div>

                            <div class="mb-3">
                                <label for="subcategory" class="form-label">Podkategorie:</label>
                                <input type="text" id="subcategory" name="subcategory" class="form-control" value="<?= htmlspecialchars($movieToEdit['subcategory']) ?>">
                            </div>

                            <div class="mb-3">
                                <label for="year" class="form-label">Rok vydání:</label>
                                <input type="number" id="year" name="year" class="form-control" required value="<?= htmlspecialchars($movieToEdit['year']) ?>">
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">Cena:</label>
                                <input type="number" id="price" name="price" class="form-control" step="0.01" required value="<?= htmlspecialchars($movieToEdit['price']) ?>">
                            </div>

                            <div class="mb-3">
                                <label for="isbn" class="form-label">ISBN:</label>
                                <input type="text" id="isbn" name="isbn" class="form-control" required value="<?= htmlspecialchars($movieToEdit['isbn']) ?>">
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Popis:</label>
                                <textarea id="description" name="description" class="form-control" rows="3"><?= htmlspecialchars($movieToEdit['description']) ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="link" class="form-label">Odkaz:</label>
                                <input type="url" id="link" name="link" class="form-control" value="<?= htmlspecialchars($movieToEdit['link']) ?>">
                            </div>

                            <button type="submit" class="btn btn-success w-100">Uložit změny</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <h2>Výpis knih</h2>
        <?php if (!empty($movies)): ?>
            <table class="table table-bordered table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Název</th>
                        <th>Režiser</th>
                        <th>Kategorie</th>
                        <th>Rok</th>
                        <th>Cena</th>
                        <th>Akce</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($movies as $movie): ?>
                    <tr>
                        <td><?= htmlspecialchars($movie['id']) ?></td>
                        <td><?= htmlspecialchars($movie['title']) ?></td>
                        <td><?= htmlspecialchars($movie['director']) ?></td>
                        <td><?= htmlspecialchars($movie['subcategory']) ?></td>
                        <td><?= htmlspecialchars($movie['year']) ?></td>
                        <td><?= number_format($movie['price'], 2, ',', ' ') ?> Kč</td>

                        
                        <td>
                            <a href="?edit=<?= $movie['id'] ?>" class="btn btn-sm btn-primary">Upravit</a>
                            <a href="../../controllers/book_delete.php?id=<?= $movie['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Opravdu chcete smazat tuto knihu?');">Smazat</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
                        
            <?php else: ?>
            <div class="alert alert-info">Žádný film nebyl nalezen.</div>
        <?php endif; ?>




        
        






    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>