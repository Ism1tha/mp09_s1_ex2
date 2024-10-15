<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_ENV['APP_NAME'] . ' - ' . $title ?></title>
    <link rel="stylesheet" href="/public/assets/css/main.css">
    <script src="/public/assets/js/main.js"></script>
</head>

<body>
    <header>
        <div class="title"><?= $title ?></div>
        <?php if ($return_path != null): ?>
            <a class="return-btn" href="<?= $return_path ?>">
                Regresar
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="white" d="M19 7v4H5.83l3.58-3.59L8 6l-6 6l6 6l1.41-1.41L5.83 13H21V7z"/></svg>
            </a>
        <?php endif; ?>
    </header>
    <div class="container">
        <?= $content ?>
    </div>
    <footer>
        <p>Método factorial: <?= $_ENV['CALCULATOR_NUMERIC_FACTORIAL_METHOD'] == 0 ? 'Recursivo' : 'Iterativo' ?></p>
        <p>© <?= date('Y') ?> - <?= $_ENV['APP_NAME'] ?> - <?= $_ENV['APP_AUTHOR'] ?></p>
    </footer>
</body>

</html>