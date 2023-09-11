document.write(`<script src="${base_url}/Assets/js/plugins/JsBarcode.all.min.js"></script>`);
let tableSim;
let rowTable = "";
$(document).on('focusin', function(e) {
    if ($(e.target).closest(".tox-dialog").length) {
        e.stopImmediatePropagation();
    }
});
tableSim = $('#tableSim').dataTable( {
    "aProcessing":true,
    "aServerSide":true,
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
    },
    "ajax":{
        "url": " "+base_url+"/Sim/getSim",
        "dataSrc":""
    },
    "columns":[
        {"data":"id_sim"},
        {"data":"numero_sim"},
        {"data":"operador_sim"},
        {"data":"fecha_compra_sim"},
        {"data":"status_sim"},
        {"data":"options"}
    ],
    "columnDefs": [
                    { 'className': "textcenter", "targets": [ 3 ] },
                    { 'className': "textright", "targets": [ 4 ] },
                    { 'className': "textcenter", "targets": [ 5 ] }
                  ],       
    'dom': 'lBfrtip',
    'buttons': [
        {
            "extend": "copyHtml5",
            "text": "<i class='far fa-copy'></i> Copiar",
            "titleAttr":"Copiar",
            "className": "btn btn-secondary",
            "exportOptions": { 
                "columns": [ 0, 1, 2, 3, 4] 
            }
        },{
            "extend": "excelHtml5",
            "text": "<i class='fas fa-file-excel'></i> Excel",
            "titleAttr":"Esportar a Excel",
            "className": "btn btn-success",
            "exportOptions": { 
                "columns": [ 0, 1, 2, 3, 4] 
            }
        },{
            "extend": "pdfHtml5",
            "text": "<i class='fas fa-file-pdf'></i> PDF",
            "titleAttr":"Esportar a PDF",
            "className": "btn btn-danger",
            "exportOptions": { 
                "columns": [ 0, 1, 2, 3, 4] 
            }
        },{
            "extend": "csvHtml5",
            "text": "<i class='fas fa-file-csv'></i> CSV",
            "titleAttr":"Esportar a CSV",
            "className": "btn btn-info",
            "exportOptions": { 
                "columns": [ 0, 1, 2, 3, 4] 
            }
        }
    ],
    "resonsieve":"true",
    "bDestroy": true,
    "iDisplayLength": 10,
    "order":[[0,"desc"]]  
});

//NUEVO SIM
var formSim = document.querySelector("#formSim");
formSim.onsubmit = function(e) {
    e.preventDefault();

    var intIdSim = document.querySelector('#idSim').value;
    var strNumero = document.querySelector('#txtNumero').value;
    var strOperador = document.querySelector('#txtOperador').value;
    var strFecha = document.querySelector('#txtFechaHora').value;
    var strStatus = document.querySelector('#txtSelelct').value;
        
    if(strNumero == '' || strOperador == '' || strFecha == '' || strStatus == '')
    {
        swal("Atención", "Todos los campos son obligatorios." , "error");
        return false;
    }
    divLoading.style.display = "flex";
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'/Sim/setSim'; 
    var formData = new FormData(formSim);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function(){
       if(request.readyState == 4 && request.status == 200){
            
            var objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                $('#modalFormSim').modal("hide");
                formSim.reset();
                swal("Sim", objData.msg ,"success");
                tableSim.api().ajax.reload();
            }else{
                swal("Error", objData.msg , "error");
            }              
        } 
        divLoading.style.display = "none";
        return false;
    }

    
}

/*ELIMINAR SIM
function fntDelPlan(idrol){
    var idrol = idrol;
    swal({
        title: "Eliminar SIM",
        text: "¿Realmente quiere eliminar el SIM?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm) {
        
        if (isConfirm) 
        {
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/PlanesPrepago/delPlan/';
            var strData = "idPlanes="+idrol;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    var objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        swal("Eliminar!", objData.msg , "success");
                        tablePlanes.api().ajax.reload();
                    }else{
                        swal("Atención!", objData.msg , "error");
                    }
                }
            }
        }

    });
}
//FIN ELIMINAR SIM*/
//Editar
function fntEditSim(idsim){
    document.querySelector('#titleModal').innerHTML ="Actualizar Sim";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML ="Actualizar";

    var idsim = idsim;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl  = base_url+'/Sim/getsimin/'+idsim;
    request.open("GET",ajaxUrl ,true);
    request.send();

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            
            var objData = JSON.parse(request.responseText);
           
                document.querySelector("#idSim").value = objData.data.id_sim;
                document.querySelector("#txtNumero").value = objData.data.numero_sim;
                document.querySelector("#txtOperador").value = objData.data.operador_sim;
                document.querySelector("#txtFechaHora").value = objData.data.fecha_compra_sim;
                document.querySelector("#txtSelelct").value = objData.data.status_sim;

                
                $('#modalFormSim').modal('show');
           
        }
    }

}
//fin editar

/*insertar masivo*/
var formSimMasivo = document.querySelector("#formSimMasivo");
formSimMasivo.onsubmit = function(e) {
    e.preventDefault();

    var inputFile = document.querySelector('#csvFile');
    var file = inputFile.files[0];

    if (!file) {
        swal("Atención", "Por favor, seleccione un archivo CSV.", "error");
        return false;
    }

    divLoading.style.display = "flex";
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'/Sim/setSimFromCSV';
    var formData = new FormData();
    formData.append('csvFile', file);
    request.open("POST", ajaxUrl, true);
    request.send(formData);

    request.onreadystatechange = function(){
       if(request.readyState == 4 && request.status == 200) {
            var objData = JSON.parse(request.responseText);
            if(objData.status) {
                $('#modalFormSimMasivo').modal("hide");
                inputFile.value = '';
                swal("Sim", objData.msg, "success");
                tableSim.api().ajax.reload();
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
    document.querySelector('#idSim').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Sim";
    document.querySelector("#formSim").reset();
    //document.querySelector("#divBarCode").classList.add("notblock");
    //document.querySelector("#containerGallery").classList.add("notblock");
    //document.querySelector("#containerImages").innerHTML = "";
    $('#modalFormSim').modal('show');

}

function openModal2(){
    $('#modalFormSimMasivo').modal('show');
}