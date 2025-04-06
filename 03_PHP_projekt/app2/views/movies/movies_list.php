<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přidat film</title>

    <!-- Bootstrap CSS -->
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

    <h2>Výpis filmů</h2>

    <?php if(!empty($movies)): ?>
        <h3>Tabulkový výpis</h3>
        <table class="table table-bordered table-hover">
            <thead class="table-primary">
                <tr>
                    <th>Název</th>
                    <th>Režisér</th>
                    <th>Žánr</th>
                    <th>Rok</th>
                    <th>Cena</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($movies as $movie): ?>
                    <tr>
                        <td><?= htmlspecialchars($movie['title']) ?></td>
                        <td><?= htmlspecialchars($movie['director']) ?></td>
                        <td><?= htmlspecialchars($movie['subcategory']) ?></td>
                        <td><?= htmlspecialchars($movie['year']) ?></td>
                        <td><?= htmlspecialchars($movie['price']) ?> Kč</td>
                        
                    </tr>
                <?php endforeach; ?>    
            </tbody>
        </table>    
    <?php else: ?>
        <div class="alert alert-info">Nebyly načteny žádné filmy.</div>
    <?php endif; ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
