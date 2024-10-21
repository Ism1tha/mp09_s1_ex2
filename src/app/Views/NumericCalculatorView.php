<?php 

use App\Helpers\HistoryHelper; 

?>

<!-- Calculator Form -->
<form id="numeric-calculator-form" method="POST" onsubmit="onSubmitNumeric(event)" class="d-flex flex-column align-items-center justify-content-center">
    <!-- Input for expression -->
    <input type="text" id="expression" name="expression" placeholder="Introduzca una expresión" required
        autocomplete="off" autofocus class="form-control mb-2">

    <!-- Grid template for buttons -->
    <div class="row g-2 w-100 p-2 border border-gray-700 rounded">
        <div class="col-3">
            <button type="button" class="btn btn-secondary w-100" onclick="addElementToNumericExpression('1')">1</button>
        </div>
        <div class="col-3">
            <button type="button" class="btn btn-secondary w-100" onclick="addElementToNumericExpression('2')">2</button>
        </div>
        <div class="col-3">
            <button type="button" class="btn btn-secondary w-100" onclick="addElementToNumericExpression('3')">3</button>
        </div>
        <div class="col-3">
            <button type="button" class="btn btn-secondary w-100" onclick="addElementToNumericExpression('+')">+</button>
        </div>
        <div class="col-3">
            <button type="button" class="btn btn-secondary w-100" onclick="addElementToNumericExpression('4')">4</button>
        </div>
        <div class="col-3">
            <button type="button" class="btn btn-secondary w-100" onclick="addElementToNumericExpression('5')">5</button>
        </div>
        <div class="col-3">
            <button type="button" class="btn btn-secondary w-100" onclick="addElementToNumericExpression('6')">6</button>
        </div>
        <div class="col-3">
            <button type="button" class="btn btn-secondary w-100" onclick="addElementToNumericExpression('-')">-</button>
        </div>
        <div class="col-3">
            <button type="button" class="btn btn-secondary w-100" onclick="addElementToNumericExpression('7')">7</button>
        </div>
        <div class="col-3">
            <button type="button" class="btn btn-secondary w-100" onclick="addElementToNumericExpression('8')">8</button>
        </div>
        <div class="col-3">
            <button type="button" class="btn btn-secondary w-100" onclick="addElementToNumericExpression('9')">9</button>
        </div>
        <div class="col-3">
            <button type="button" class="btn btn-secondary w-100" onclick="addElementToNumericExpression('*')">*</button>
        </div>
        <div class="col-3">
            <button type="button" class="btn btn-secondary w-100" onclick="addElementToNumericExpression('0')">0</button>
        </div>
        <div class="col-3">
            <button type="button" class="btn btn-secondary w-100" onclick="addElementToNumericExpression('.')">.</button>
        </div>
        <div class="col-3">
            <button type="button" class="btn btn-secondary w-100" onclick="addElementToNumericExpression('/')">/</button>
        </div>
        <div class="col-3">
            <button type="button" class="btn btn-secondary w-100" onclick="addElementToNumericExpression('(')"> ( </button>
        </div>
        <div class="col-3">
            <button type="button" class="btn btn-secondary w-100" onclick="addElementToNumericExpression(')')">)</button>
        </div>
        <div class="col-3">
            <button type="button" class="btn btn-secondary w-100" onclick="addElementToNumericExpression('^')">^</button>
        </div>
        <div class="col-3">
            <button type="button" class="btn btn-secondary w-100" onclick="addElementToNumericExpression('!')">!</button>
        </div>
    </div>

    <div class="w-100 d-flex flex-column align-items-center justify-content-center mt-4">
        <button type="submit" class="btn btn-primary w-100">Calcular</button>
        <button type="reset" class="btn btn-secondary w-100 mt-2">Limpiar</button>
        <button type="button" class="btn btn-success w-100 mt-2" onclick="openHistoryModal()">Ver historial</button>
    </div>
</form>

<!-- Result -->
<?php if($request['request_method'] == 'POST'): ?>
    <div class="mt-4 p-4 bg-dark text-white rounded">
        <h2 class="h5 mb-2">Resultado de la operación</h2>
        <p><?php echo $result->getExpression(); ?> = <?php echo $result->getResult(); ?></p>
    </div>
<?php endif; ?>

<!-- History modal -->
<div class="modal fade" id="historyModal" tabindex="-1" aria-labelledby="historyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title" id="historyModalLabel">Historial</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php HistoryHelper::renderHistory(1); ?>
            </div>
        </div>
    </div>
</div>

