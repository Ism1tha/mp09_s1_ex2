<?php 

use App\Helpers\HistoryHelper; 

?>

<!-- Calculator Form -->
<form id="numeric-calculator-form" method="POST" onsubmit="onSubmitNumeric(event)" class="flex flex-col justify-center items-center">
    <!-- Input for expression -->
    <input type="text" id="expression" name="expression" placeholder="Introduzca una expresión" required
        autocomplete="off" autofocus class="w-full p-2 mb-2 border border-gray-400 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
    
    <!-- Grid template for buttons -->
    <div class="grid grid-cols-4 gap-2 w-full p-2 border border-gray-700 rounded">
        <button type="button" class="bg-gray-700 text-white p-2 rounded hover:bg-gray-600" onclick="addElementToNumericExpression('1')">1</button>
        <button type="button" class="bg-gray-700 text-white p-2 rounded hover:bg-gray-600" onclick="addElementToNumericExpression('2')">2</button>
        <button type="button" class="bg-gray-700 text-white p-2 rounded hover:bg-gray-600" onclick="addElementToNumericExpression('3')">3</button>
        <button type="button" class="bg-gray-700 text-white p-2 rounded hover:bg-gray-600" onclick="addElementToNumericExpression('+')">+</button>
        <button type="button" class="bg-gray-700 text-white p-2 rounded hover:bg-gray-600" onclick="addElementToNumericExpression('4')">4</button>
        <button type="button" class="bg-gray-700 text-white p-2 rounded hover:bg-gray-600" onclick="addElementToNumericExpression('5')">5</button>
        <button type="button" class="bg-gray-700 text-white p-2 rounded hover:bg-gray-600" onclick="addElementToNumericExpression('6')">6</button>
        <button type="button" class="bg-gray-700 text-white p-2 rounded hover:bg-gray-600" onclick="addElementToNumericExpression('-')">-</button>
        <button type="button" class="bg-gray-700 text-white p-2 rounded hover:bg-gray-600" onclick="addElementToNumericExpression('7')">7</button>
        <button type="button" class="bg-gray-700 text-white p-2 rounded hover:bg-gray-600" onclick="addElementToNumericExpression('8')">8</button>
        <button type="button" class="bg-gray-700 text-white p-2 rounded hover:bg-gray-600" onclick="addElementToNumericExpression('9')">9</button>
        <button type="button" class="bg-gray-700 text-white p-2 rounded hover:bg-gray-600" onclick="addElementToNumericExpression('*')">*</button>
        <button type="button" class="bg-gray-700 text-white p-2 rounded hover:bg-gray-600" onclick="addElementToNumericExpression('0')">0</button>
        <button type="button" class="bg-gray-700 text-white p-2 rounded hover:bg-gray-600" onclick="addElementToNumericExpression('.')">.</button>
        <button type="button" class="bg-gray-700 text-white p-2 rounded hover:bg-gray-600" onclick="addElementToNumericExpression('/')">/</button>
        <button type="button" class="bg-gray-700 text-white p-2 rounded hover:bg-gray-600" onclick="addElementToNumericExpression('('">(</button>
        <button type="button" class="bg-gray-700 text-white p-2 rounded hover:bg-gray-600" onclick="addElementToNumericExpression(')')">)</button>
        <button type="button" class="bg-gray-700 text-white p-2 rounded hover:bg-gray-600" onclick="addElementToNumericExpression('^')">^</button>
        <button type="button" class="bg-gray-700 text-white p-2 rounded hover:bg-gray-600" onclick="addElementToNumericExpression('!')">!</button>
    </div>

    <div class="w-full flex flex-col items-center justify-center mt-4">
        <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-500">Calcular</button>
        <button type="reset" class="w-full bg-gray-500 text-white p-2 mt-2 rounded hover:bg-gray-400">Limpiar</button>
        <button type="button" class="w-full bg-green-600 text-white p-2 mt-2 rounded hover:bg-green-500" onclick="openHistoryModal()">Ver historial</button>
    </div>
</form>

<!-- Result -->
<?php if($request['request_method'] == 'POST'): ?>
    <div class="mt-4 p-4 bg-gray-800 text-white rounded">
        <h2 class="text-xl font-semibold mb-2">Resultado de la operación</h2>
        <p><?php echo $result->getExpression(); ?> = <?php echo $result->getResult(); ?></p>
    </div>
<?php endif; ?>

<!-- History modal -->
<div id="history-modal-wrapper" class="hidden fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center">
    <div id="history-modal" class="bg-gray-800 text-white p-6 rounded-lg relative w-11/12 max-w-xl">
        <span class="absolute top-2 right-2 text-2xl cursor-pointer hover:text-blue-500" onclick="closeHistoryModal()">&times;</span>
        <?php HistoryHelper::renderHistory(1); ?>
    </div>
</div>
