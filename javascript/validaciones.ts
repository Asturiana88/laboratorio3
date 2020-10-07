export default function AdministrarValidaciones(e : any) {
    // Valida todos los campos para la creacion de empleados

    var sueldo = (<HTMLInputElement> document.getElementById('txtSueldo'))
    var sueldoMaximo = ObtenerSueldoMaximo(ObtenerTurnoSeleccionado())
    var sueldoMaximoSuperado : boolean = false;
    // por defecto escondemos el * advertencia de sueldo
    // y seteamos el valor sueldo maximo superado a false
    AdministrarSpanError(sueldo.id+'Span', false)
    if (parseInt(sueldo.value) > sueldoMaximo){
        // De ser superado seteamos el sueldo superado a true y mostramos el *
        sueldoMaximoSuperado = true
        AdministrarSpanError(sueldo.id+'Span', true)
    }
    
    // listamos los inputs a ser evaluados
    var inputIds = [
        'txtSueldo', 'txtDni', 'txtNomb', 'txtApe', 'txtLegajo', 'fileToUpload']

    for (let index = 0; index < inputIds.length; index++) {
        // por cada elemento verificamos si tiene campos vacios
        // si esta vacio agregamos el * de error
        AdministrarSpanError(
            inputIds[index]+'Span', !ValidarCamposVacios(inputIds[index]))
    }

    if ( !VerificarValidacionesLogin()
            || !validarCombo("sex", "---")
            || sueldoMaximoSuperado) {
        e.preventDefault()
    }
}

function ObtenerTurnoSeleccionado():string {
        console.log("Validar turno seleccionado");
        const rbturno = <HTMLInputElement> document.querySelector(
                                                'input[name="turno"]:checked');
        return rbturno.value;
}

function ObtenerSueldoMaximo(turno:string): number{
    switch (turno) {
        case "Mañana":
            return 20000
        case "Tarde":
            return 18500
        default:
            return 25000;     
    }
}

function validarCombo(idCombo:string, invalidValue:string):boolean{
    var sexo = (<HTMLInputElement> document.getElementById(idCombo))
    return sexo.value != invalidValue
}

export function ValidarCamposVacios(id:string):boolean {
    var elemento_a_evaluar = (<HTMLInputElement> document.getElementById(id))
    return Boolean(elemento_a_evaluar && elemento_a_evaluar.value)
}

function validarRangoNumerico(sueldo: number, min:number, max:number):boolean{
    console.log("Validar sueldos");
    if(sueldo > max || sueldo < min){
        alert("Sueldo fuera de rango")
        return false
    }else {return true}
 }

 function AdministrarSpanError(elemento:string, error: boolean): void{
    var elemSpan = (<HTMLElement> document.getElementById(elemento))
    if(elemSpan){
        elemSpan.style.display = 'none'
        if (error){
            elemSpan.style.display = 'block'
            elemSpan.style.color = 'red'
        }
    }
}  

export function VerificarValidacionesLogin(): boolean{
    var spanList = document.querySelectorAll('span')
    for (let index = 0; index < spanList.length; index++) {
        const span = spanList[index];
        if(span.style.display == 'block'){
            return false
        }
    }
    return true
}