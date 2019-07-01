function mayus(e) {
    e.value = e.value.toUpperCase();
}

function validar(e) {
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla == 8) return true; // 3
    //patron =/[A-Za-z\s]/; // 4
    patron = /[A-Za-z]/; // 4
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
}

function validar_numeros(e) {
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla == 8) return true; // 3
    //patron =/[A-Za-z\s]/; // 4
    patron = /[0-9]/; // 4
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
}

function validar_numeros_puntos(e) {
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla == 8) return true; // 3
    //patron =/[A-Za-z\s]/; // 4
    patron = /[0-9.]/; // 4
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
}

function validar_string(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla == 8) return true; // 3
    //patron =/[A-Za-z\s]/; // 4
    patron = /[A-Za-z0-9]/; // 4
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
}

function validar_string_puntos(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla == 8) return true; // 3
    //patron =/[A-Za-z\s]/; // 4
    patron = /[A-Za-z0-9\s.,&]/; // 4
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
}

function validar_string_direccion(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla == 8) return true; // 3
    //patron =/[A-Za-z\s]/; // 4
    patron = /[A-Za-z0-9\s.,&#]/; // 4
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
}

function validar_saltos(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla == 8) return true; // 3
    //patron =/[A-Za-z\s]/; // 4
    patron = /[A-Za-z\s]/; // 4
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
}

function EliminarCliente() {
    if (confirm("Estas seguro que deseas eliminar este cliente?")) {
        document.getElementById('frmCliente').submit()

    }
}

function EliminarPartida() {
    if (confirm("Estas seguro que deseas eliminar este producto de la factura?")) {
        document.getElementById('frmEliminar').submit()

    }
}

function EliminarFactura() {
    if (confirm("Estas seguro que deseas eliminar esta factura?")) {
        document.getElementById('frmFactura').submit()

    }
}

function CancelarFactura() {
    if (confirm("Estas seguro que deseas cancelar esta factura?")) {
        document.getElementById('frmFacturaCancelar').submit()

    }
}

function FacturaDuplicar() {
    if (confirm("Estas seguro que deseas duplicar esta factura?")) {
        document.getElementById('frmFacturaDuplicar').submit()

    }
}



function EliminarLogo(id) {
    if (confirm("Estas seguro que deseas eliminar el Logo actual?")) {

        window.location = 'borrar_logo/' + id;

    }
}



function calculaIva(retencion, iva) {
    retVal = 0;
    if (retencion == true) {
        retVal = 10.6666;
    }
    return retVal;
}

function calculaIsr(retencion) {
    retVal = 0;
    if (retencion == true) {
        retVal = 10;
    }
    return retVal;
}

function addenda_change() {
    var addenda = $('#addenda').val();
    if (addenda === 'KN') {
        $('#div_oculto').css('display', 'block');
    } else {
        $('#div_oculto').css('display', 'none');
    }
}

function cambio_de_moneda() {
    var moneda = $('#moneda').val();
    if (moneda === 'USD') {
        $('#div_tipo_cambio').css('display', 'block');
    }
}

function VerFacturaPrueba(){
        document.getElementById('frm_pruebapdf').submit()
}