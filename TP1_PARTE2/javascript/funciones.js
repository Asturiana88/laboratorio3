function AdministrarValidaciones(e) {
    var maniana = document.getElementById('mañana');
    var tarde = document.getElementById('tarde');
    var noche = document.getElementById('noche');
    var sueldo = document.getElementById('txtSueldo');
    console.log("Admin validaciones!!!");
    validarCombo("sex", "---");
    ObtenerSueldoMaximo(ObtenerTurnoSeleccionado());
    e.preventDefault();
    var turnosRb = [maniana, tarde, noche];
    var min = 8000;
    for (var index = 0; index < turnosRb.length; index++) {
        var turno = turnosRb[index];
        if (turno.checked && turno == maniana) {
            validarRangoNumerico(parseInt(sueldo.value), min, 20000);
        }
        if (turno.checked && turno == tarde) {
            validarRangoNumerico(parseInt(sueldo.value), min, 18500);
        }
        if (turno.checked && turno == noche) {
            validarRangoNumerico(parseInt(sueldo.value), min, 25000);
        }
    }
    var inputIds = ['txtSueldo', 'txtDni', 'txtNomb', 'txtApe', 'txtLegajo'];
    for (var index = 0; index < inputIds.length; index++) {
        var element = inputIds[index];
        if (!ValidarCamposVacios(element)) {
            alert(element);
            alert("Falta completar campos, verificar");
            return;
        }
    }
}
function ObtenerTurnoSeleccionado() {
    console.log("Validar turno seleccionado");
    var rbturno = document.querySelector('input[name="rdoTurno"]:checked');
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
    alert("Validando Combos");
    var sexo = document.getElementById(idCombo);
    return sexo.value != invalidValue;
}
function ValidarCamposVacios(id) {
    var elemento_a_evaluar = document.getElementById(id);
    return Boolean(elemento_a_evaluar && elemento_a_evaluar.value);
}
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
