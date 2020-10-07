function AdministrarValidacionesLogin(e:any):void{
    const inputIds = ['txtDni','txtApe'];

    inputIds.forEach(inputId => {
        AdministrarSpanError(inputId+'Span', false);
        if(!ValidarCamposVacios(inputId)){
            AdministrarSpanError(inputId+'Span', true);
            alert('Hay campos obligatorios vacios, completarlos para continuar')
            e.preventDefault();
        }
    });
}
