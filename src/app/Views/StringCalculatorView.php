<?php 
use App\Helpers\HistoryHelper; 
?>

<form id="string-calculator-form" method="POST" onsubmit="onSubmitString(event)" class="d-flex flex-column align-items-center justify-content-center mx-auto max-w-lg p-2 border border-secondary rounded">
    <input type="text" id="string" name="string" value="" placeholder="Introduce una cadena de texto" class="form-control mb-2">
    <input type="text" id="string2" name="string2" value="" placeholder="Introduce una segona cadena de text" class="form-control mb-2">

    <div class="radio-container d-none">
        <div class="radio-group form-check my-2">
            <input type="radio" id="concat" name="operation" value="concat" class="form-check-input me-2">
            <label for="concat" class="form-check-label">Concatenar</label>
        </div>
        <div class="radio-group form-check my-2">
            <input type="radio" id="remove" name="operation" value="remove" class="form-check-input me-2">
            <label for="remove" class="form-check-label">Eliminar</label>
        </div>
    </div>

    <div class="action-container w-100 d-flex flex-column align-items-center">
        <div class="submit-container d-flex gap-2 w-100 my-2">
            <button type="button" onclick="submitStringForm('concat')" class="btn btn-primary w-100">Concatenar</button>
            <button type="button" onclick="submitStringForm('remove')" class="btn btn-danger w-100">Eliminar</button>
        </div>
        <button type="reset" class="btn btn-secondary w-100 my-2">Limpiar</button>
        <button type="button" onclick="openHistoryModal()" class="btn btn-success w-100 my-2">Ver historial</button>
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
                <?php HistoryHelper::renderHistory(2); ?>
            </div>
        </div>
    </div>
</div>
