<?php 
use App\Helpers\HistoryHelper; 
?>

<form id="string-calculator-form" method="POST" onsubmit="onSubmitString(event)" class="flex flex-col items-center justify-center mx-auto max-w-lg p-2 border border-gray-600 rounded">
    <input type="text" id="string" name="string" value="" placeholder="Introduce una cadena de texto" class="w-full p-2 my-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-500">
    <input type="text" id="string2" name="string2" value="" placeholder="Introduce una segona cadena de text" class="w-full p-2 my-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-500">
    
    <div class="radio-container hidden">
        <div class="radio-group flex items-center my-2">
            <input type="radio" id="concat" name="operation" value="concat" class="mr-2">
            <label for="concat" class="text-white">Concatenar</label>
        </div>
        <div class="radio-group flex items-center my-2">
            <input type="radio" id="remove" name="operation" value="remove" class="mr-2">
            <label for="remove" class="text-white">Eliminar</label>
        </div>
    </div>

    <div class="action-container w-full flex flex-col items-center">
        <div class="submit-container flex gap-2 w-full my-2">
            <button type="button" onclick="submitStringForm('concat')" class="w-full bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition">Concatenar</button>
            <button type="button" onclick="submitStringForm('remove')" class="w-full bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600 transition">Eliminar</button>
        </div>
        <button type="reset" class="w-full bg-gray-500 text-white py-2 px-4 rounded my-2 hover:bg-gray-600 transition">Limpiar</button>
        <button type="button" onclick="openHistoryModal()" class="w-full bg-green-500 text-white py-2 px-4 rounded my-2 hover:bg-green-600 transition">Ver historial</button>
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
        <?php HistoryHelper::renderHistory(2); ?>
    </div>
</div>
