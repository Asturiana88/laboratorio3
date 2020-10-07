function AdministrarValidacionesLogin(e) {
    var inputIds = ['txtDni', 'txtApe'];
    inputIds.forEach(function (inputId) {
        AdministrarSpanError(inputId + 'Span', false);
        if (!ValidarCamposVacios(inputId)) {
            AdministrarSpanError(inputId + 'Span', true);
            alert('Hay campos obligatorios vacios, completarlos para continuar');
            e.preventDefault();
        }
    });
}
