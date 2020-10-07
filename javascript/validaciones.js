"use strict";
exports.__esModule = true;
exports.VerificarValidacionesLogin = exports.ValidarCamposVacios = void 0;
function AdministrarValidaciones(e) {
    // Valida todos los campos para la creacion de empleados
    var sueldo = document.getElementById('txtSueldo');
    var sueldoMaximo = ObtenerSueldoMaximo(ObtenerTurnoSeleccionado());
    var sueldoMaximoSuperado = false;
    // por defecto escondemos el * advertencia de sueldo
    // y seteamos el valor sueldo maximo superado a false
    AdministrarSpanError(sueldo.id + 'Span', false);
    if (parseInt(sueldo.value) > sueldoMaximo) {
        // De ser superado seteamos el sueldo superado a true y mostramos el *
        sueldoMaximoSuperado = true;
        AdministrarSpanError(sueldo.id + 'Span', true);
    }
    // listamos los inputs a ser evaluados
    var inputIds = [
        'txtSueldo', 'txtDni', 'txtNomb', 'txtApe', 'txtLegajo', 'fileToUpload'
    ];
    for (var index = 0; index < inputIds.length; index++) {
        // por cada elemento verificamos si tiene campos vacios
        // si esta vacio agregamos el * de error
        AdministrarSpanError(inputIds[index] + 'Span', !ValidarCamposVacios(inputIds[index]));
    }
    if (!VerificarValidacionesLogin()
        || !validarCombo("sex", "---")
        || sueldoMaximoSuperado) {
        e.preventDefault();
    }
}
exports["default"] = AdministrarValidaciones;
function ObtenerTurnoSeleccionado() {
    console.log("Validar turno seleccionado");
    var rbturno = document.querySelector('input[name="turno"]:checked');
    return rbturno.value;
}
function ObtenerSueldoMaximo(turno) {
    switch (turno) {
        case "Mañana":
            return 20000;
        case "Tarde":
            return 18500;
        default:
            return 25000;
    }
}
function validarCombo(idCombo, invalidValue) {
    var sexo = document.getElementById(idCombo);
    return sexo.value != invalidValue;
}
function ValidarCamposVacios(id) {
    var elemento_a_evaluar = document.getElementById(id);
    return Boolean(elemento_a_evaluar && elemento_a_evaluar.value);
}
exports.ValidarCamposVacios = ValidarCamposVacios;
function validarRangoNumerico(sueldo, min, max) {
    console.log("Validar sueldos");
    if (sueldo > max || sueldo < min) {
        alert("Sueldo fuera de rango");
        return false;
    }
    else {
        return true;
    }
}
function AdministrarSpanError(elemento, error) {
    var elemSpan = document.getElementById(elemento);
    if (elemSpan) {
        elemSpan.style.display = 'none';
        if (error) {
            elemSpan.style.display = 'block';
            elemSpan.style.color = 'red';
        }
    }
}
function VerificarValidacionesLogin() {
    var spanList = document.querySelectorAll('span');
    for (var index = 0; index < spanList.length; index++) {
        var span = spanList[index];
        if (span.style.display == 'block') {
            return false;
        }
    }
    return true;
}
exports.VerificarValidacionesLogin = VerificarValidacionesLogin;
