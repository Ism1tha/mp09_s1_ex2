<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_ENV['APP_NAME'] . ' - ' . $title ?></title>
    <link rel="stylesheet" href="/public/assets/css/main.css">
    <script src="/public/assets/js/main.js"></script>
</head>
<header class="bg-gray-800 text-white md-flex md-justify-between md-items-center px-4 py-4">
    <h1><?= $_ENV['APP_NAME'] . ' - ' . $title ?></h1>
</header>
<body>
    <div class="w-full  p-4 md:w-3/4 md:mx-auto">
        <?= $content ?>
    </div>
</body>
<footer class="bg-gray-800 text-white text-center py-8">
    <p>© <?= date('Y') ?> - <?= $_ENV['APP_NAME'] ?> - <?= $_ENV['APP_AUTHOR'] ?> / Factorial method: <?= $_ENV['CALCULATOR_NUMERIC_FACTORIAL_METHOD'] ?></p>
</footer>
</html>