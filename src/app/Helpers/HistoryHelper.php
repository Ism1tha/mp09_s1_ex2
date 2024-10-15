<?php

namespace App\Helpers;

use App\Core\Session;

class HistoryHelper {

    /* Mètode per renderitzar l'historial */
    public static function renderHistory($type) {
        $history = Session::get('history');
        $history_count = 0;
        echo '<div class="history">';
        echo '<h2>Historial de operaciones</h2>';
        if (empty($history)) {
            echo "No hay operaciones registradas en el historial";
            echo '</div>';
            return;
        }
        foreach ($history as $result) {
            if ($result->getType() == $type) {
                echo '<div>';
                echo $result->getExpression() . ' = ' . $result->getResult();
                echo '</div>';
                $history_count++;
            }
        }
        if ($history_count == 0) {
            echo "No hay operaciones registradas en el historial";
        }
        echo '</div>';
    }
    
}
