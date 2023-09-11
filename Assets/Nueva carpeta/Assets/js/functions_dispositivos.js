document.write(`<script src="${base_url}/Assets/js/plugins/JsBarcode.all.min.js"></script>`);
let tableDis;
let rowTable = "";
$(document).on('focusin', function(e) {
    if ($(e.target).closest(".tox-dialog").length) {
        e.stopImmediatePropagation();
    }
});
tableDis = $('#tableDispositivos').dataTable( {
    "aProcessing":true,
    "aServerSide":true,
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
    },
    "ajax":{
        "url": " "+base_url+"/Dispositivos/getDispositivos",
        "dataSrc":""
    },
    "columns":[
        {"data":"id_gps"},
        {"data":"serie_gps"},
        {"data":"modelo_gps"},
        {"data":"fecha_compra"},
        {"data":"status_gps"},
        {"data":"numero_sim"},
        {"data":"operador_sim"},
        {"data":"fecha_compra_sim"},
        {"data":"status_sim"},
        {"data":"nombres"},
        {"data":"apellidos"},
        {"data":"duracionBarr"},
        {"data":"options"}
    ],
    "columnDefs": [
        { 'className': "textcenter", "targets": [ 3 ] },
        { 'className': "textright", "targets": [ 4 ] },
        { 'className': "textcenter", "targets": [ 5 ] },
        { 'className': "textcenter", "targets": [ 6 ] },
        { 'className': "textright", "targets": [ 7 ] },
        { 'className': "textcenter", "targets": [ 8 ] },
        { 'className': "textright", "targets": [ 9 ] },
        { 'className': "textcenter", "targets": [ 10 ] },
        { 'className': "textcenter", "targets": [ 11 ] }
                  ],       
    'dom': 'lBfrtip',
    'buttons': [
        {
            "extend": "copyHtml5",
            "text": "<i class='far fa-copy'></i> Copiar",
            "titleAttr":"Copiar",
            "className": "btn btn-secondary",
            "exportOptions": { 
                "columns": [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10] 
            }
        },{
            "extend": "excelHtml5",
            "text": "<i class='fas fa-file-excel'></i> Excel",
            "titleAttr":"Esportar a Excel",
            "className": "btn btn-success",
            "exportOptions": { 
                "columns": [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
            }
            
        },{
            "extend": "pdfHtml5",
            "text": "<i class='fas fa-file-pdf'></i> PDF",
            "titleAttr":"Esportar a PDF",
            "className": "btn btn-danger",
            "exportOptions": { 
                "columns": [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
            },
            "customize": function (doc) {
                doc.defaultStyle.fontSize = 7; // Ajustar el tamaño de fuente del PDF
              }
        },{
            "extend": "csvHtml5",
            "text": "<i class='fas fa-file-csv'></i> CSV",
            "titleAttr":"Esportar a CSV",
            "className": "btn btn-info",
            "exportOptions": { 
                "columns": [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
            }
        }
    ],
    "resonsieve":"true",
    "bDestroy": true,
    "iDisplayLength": 10,
    "order":[[0,"desc"]]  
});

/*insertar masivo*/
var formDisMasivo = document.querySelector("#formDispositivosMasivo");
formDisMasivo.onsubmit = function(e) {
    e.preventDefault();

    var inputFile = document.querySelector('#csvFileDis');
    var file = inputFile.files[0];

    if (!file) {
        swal("Atención", "Por favor, seleccione un archivo CSV.", "error");
        return false;
    }

    divLoading.style.display = "flex";
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'/Dispositivos/setDisFromCSV';
    var formData = new FormData();
    formData.append('csvFileDis', file);
    request.open("POST", ajaxUrl, true);
    request.send(formData);

    request.onreadystatechange = function(){
       if(request.readyState == 4 && request.status == 200) {
            var objData = JSON.parse(request.responseText);
            if(objData.status) {
                $('#modalFormDispositivosMasivo').modal("hide");
                inputFile.value = '';
                swal("Dispositivos", objData.msg, "success");
                tableDis.api().ajax.reload();
            } else {
                swal("Error", objData.msg, "error");
            }              
        }
        divLoading.style.display = "none";
        return false;
    }
}
/*fin de masivo*/

function openModal()
{
    rowTable = "";
    document.querySelector('#idProducto').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Producto";
    document.querySelector("#formProductos").reset();
    document.querySelector("#divBarCode").classList.add("notblock");
    document.querySelector("#containerGallery").classList.add("notblock");
    document.querySelector("#containerImages").innerHTML = "";
    $('#modalFormProductos').modal('show');

}

function openModal2(){
    $('#modalFormDispositivosMasivo').modal('show');
}