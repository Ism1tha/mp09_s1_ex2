<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_ENV['APP_NAME'] . ' - ' . $title ?></title>
    <link rel="stylesheet" href="/public/assets/css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/public/assets/js/main.js"></script>
</head>

<body class="bg-dark">
    <header class="text-white p-4 d-flex justify-content-between align-items-center">
        <div class="h5"><?= $title ?></div>
        <?php if ($return_path != null): ?>
            <a class="btn btn-primary" href="<?= $return_path ?>">
                Regresar
                <svg class="ms-1" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                    <path fill="white" d="M19 7v4H5.83l3.58-3.59L8 6l-6 6l6 6l1.41-1.41L5.83 13H21V7z"/>
                </svg>
            </a>
        <?php endif; ?>
    </header>
    <div class="container py-4">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <?= $content ?>
            </div>
        </div>
    </div>
    <footer class="text-white text-center py-4">
        <p>Método factorial: <?= $_ENV['CALCULATOR_NUMERIC_FACTORIAL_METHOD'] == 0 ? 'Recursivo' : 'Iterativo' ?></p>
        <p>© <?= date('Y') ?> - <?= $_ENV['APP_NAME'] ?> - <?= $_ENV['APP_AUTHOR'] ?></p>
    </footer>
</body>

</html>