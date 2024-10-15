<?php 

/* Carrega el autoload de Composer per carregar les classes del projecte */
require_once __DIR__ . '/../vendor/autoload.php';

/* Carreguem les variables d'entorn */
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

/* Carreguem les classes del nostre projecte */
use App\Core\Router;
use App\Core\Session;

use App\Controllers\AppController;
use App\Controllers\NumericCalculatorController;
use App\Controllers\StringCalculatorController;

/* Iniciem la sessió */
Session::start();

/* Obtenim la ruta actual per enviar-ho al enrutador */
$currentUrl = $_SERVER['REQUEST_URI'];

/* Creem la instancia del enrutador i afegim les rutes de l'aplicació */
$router = new Router();

$router->add('/', AppController::class, 'index');
$router->add('/numeric-calculator', NumericCalculatorController::class, 'index', 'GET');
$router->add('/numeric-calculator', NumericCalculatorController::class, 'calculate', 'POST');
$router->add('/string-calculator', StringCalculatorController::class, 'index', 'GET');
$router->add('/string-calculator', StringCalculatorController::class, 'calculate', 'POST');
$router->add('/destroy-session', AppController::class, 'destroySession', 'GET');


/* Processem la ruta actual utilitzant l'enrutador */
$requestData = $_REQUEST;
$requestMethod = $_SERVER['REQUEST_METHOD'];
$router->dispatch($currentUrl, $requestMethod, $requestData);
