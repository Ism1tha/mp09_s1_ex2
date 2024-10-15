<?php 

use App\Helpers\HistoryHelper; 

?>


<form id="string-calculator-form" method="POST" onsubmit="onSubmitString(event)">
    <input type="text" id="string" name="string" value="" placeholder="Introduce una cadena de text"d>
    <input type="text" id="string2" name="string2" value="" placeholder="Introduce una segona cadena de text">
    <div class="radio-container">
        <div class="radio-group">
            <input type="radio" id="concat" name="operation" value="concat">
            <label for="concat">Concatenar</label>
        </div>
        <div class="radio-group">
            <input type="radio" id="remove" name="operation" value="remove">
            <label for="remove">Eliminar</label>
        </div>
    </div>
    <div class="action-container">
        <div class="submit-container">
            <button type="button" onclick="submitStringForm('concat')">Concatenar</button>
            <button type="button" onclick="submitStringForm('remove')">Eliminar</button>
        </div>
        <button type="reset">Limpiar</button>
        <button type="button" onclick="openHistoryModal()">Ver historial</button>
    </div>
</form>
<!-- Result -->
<?php if($request['request_method'] == 'POST'): ?>
    <div class="result">
        <h2>Resultado de la operación</h2>
        <p>
            <?php echo $result->getExpression(); ?> = <?php echo $result->getResult(); ?>
        </p>
    </div>
<?php endif; ?>
<!-- History modal -->
<div id="history-modal-wrapper" class="hidden">
    <div id="history-modal">
        <span class="close" onclick="closeHistoryModal()">&times;</span>
        <?php HistoryHelper::renderHistory(2); ?>
    </div>
</div>