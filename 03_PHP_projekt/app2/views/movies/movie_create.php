<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přidat film</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Filmová knihovna</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../../views/movies/movie_create.php">Přidat film</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../controllers/movies_list.php">Výpis filmů</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    <h2>Přidat nový film</h2>
                </div>
                <div class="card-body">
                    <form action="../../controllers/MovieController.php" method="post" enctype="multipart/form-data">

                        <div class="mb-3">
                            <label for="title" class="form-label">Název filmu: <span class="text-danger">*</span></label>
                            <input type="text" id="title" name="title" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="director" class="form-label">Režisér: <span class="text-danger">*</span></label>
                            <input type="text" id="director" name="director" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="subcategory" class="form-label">Podžánr:</label>
                            <input type="text" id="subcategory" name="subcategory" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="year" class="form-label">Rok vydání: <span class="text-danger">*</span></label>
                            <input type="number" id="year" name="year" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Cena: <span class="text-danger">*</span></label>
                            <input type="number" id="price" name="price" class="form-control" step="0.01" required>
                        </div>

                      
                       
                     
                        <button type="submit" class="btn btn-success w-100">Uložit film</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
