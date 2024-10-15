<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_ENV['APP_NAME'] . ' - ' . $title ?></title>
    <link rel="stylesheet" href="/public/assets/css/main.css">
    <script src="/public/assets/js/main.js"></script>
</head>
<header>
    <h1><?= $_ENV['APP_NAME'] . ' - ' . $title ?></h1>
    <?php if($return_path != null): ?>
    <a href="<?= $return_path ?>">Volver</a>
    <?php endif; ?>
</header>
<body>
    <div>
        <?= $content ?>
    </div>
</body>
<footer>
    <p>© <?= date('Y') ?> - <?= $_ENV['APP_NAME'] ?> - <?= $_ENV['APP_AUTHOR'] ?> / Factorial method: <?= $_ENV['CALCULATOR_NUMERIC_FACTORIAL_METHOD'] ?></p>
</footer>
</html>