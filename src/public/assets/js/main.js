/** 
 * Main JS file for the application
 * Author: Ismael Semmar Galvez
 */

/** 
 * Function to destroy a session (General function)
 */

document.addEventListener('DOMContentLoaded', function() {
    if (window.location.href.includes('#session-destroyed')) {
        alert("Sesión eliminada correctamente");
    }
});

function destroySession() {
    fetch('/destroy-session', {
        method: 'POST'
    }).then(response => {
        if(response.status == 200)
        {
            alert("Sesión eliminada correctamente");
            window.location.href = "/";
        }
    }).catch(error => {
        alert("Error al eliminar la sesión");
    });
}

/* ======= Numeric calculator functions ======= */

function addElementToNumericExpression(element) {
    var expression = document.getElementById('expression');
    expression.value += element;
}

function onSubmitNumeric(event) {
    event.preventDefault();
    var form = document.getElementById('numeric-calculator-form');
    var expression = document.getElementById('expression').value;
    if (expression.match(/[a-zA-Z]/)) {
        alert('La expresión no es válida');
        return;
    }
    form.submit();
}

/* ======= String calculator functions ======= */

function submitStringForm(type) {
    var form = document.getElementById('string-calculator-form');
    var stringElement = document.getElementById('string');
    var string2Element = document.getElementById('string2');
    var concatElement = document.getElementById('concat');
    var removeElement = document.getElementById('remove');
    if(type == 'concat') concatElement.checked = true;
    else removeElement.checked = true;
    if (stringElement.value == '' || string2Element.value == '') {
        alert('Los campos de texto no pueden estar vacíos');
        return;
    }
    form.submit();
}

function onSubmitString(event) {
    event.preventDefault();
    var form = document.getElementById('string-calculator-form');
    form.submit();
}

/* ======= History modal functions ======= */

function openHistoryModal() {
    var historyModal = new bootstrap.Modal(document.getElementById('historyModal'));
    historyModal.show();
}