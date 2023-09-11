document.write(`<script src="${base_url}/Assets/js/plugins/JsBarcode.all.min.js"></script>`);
let tablePlanes;
let rowTable = "";
$(document).on('focusin', function(e) {
    if ($(e.target).closest(".tox-dialog").length) {
        e.stopImmediatePropagation();
    }
});
tablePlanes = $('#tablePlanes').dataTable( {
    "aProcessing":true,
    "aServerSide":true,
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
    },
    "ajax":{
        "url": " "+base_url+"/PlanesPrepago/getPlanesPrepago",
        "dataSrc":""
    },
    "columns":[
        {"data":"id_planRenta"},
        {"data":"descripcion_plan"},
        {"data":"monto_plan"},
        {"data":"duracion"},
        {"data":"options"}
    ],
    "columnDefs": [
                    
                  ],       
    'dom': 'lBfrtip',
    'buttons': [
        {
            "extend": "copyHtml5",
            "text": "<i class='far fa-copy'></i> Copiar",
            "titleAttr":"Copiar",
            "className": "btn btn-secondary",
            "exportOptions": { 
                "columns": [ 0, 1, 2, 3] 
            }
        },{
            "extend": "excelHtml5",
            "text": "<i class='fas fa-file-excel'></i> Excel",
            "titleAttr":"Esportar a Excel",
            "className": "btn btn-success",
            "exportOptions": { 
                "columns": [ 0, 1, 2, 3] 
            }
        },{
            "extend": "pdfHtml5",
            "text": "<i class='fas fa-file-pdf'></i> PDF",
            "titleAttr":"Esportar a PDF",
            "className": "btn btn-danger",
            "exportOptions": { 
                "columns": [ 0, 1, 2, 3] 
            }
        },{
            "extend": "csvHtml5",
            "text": "<i class='fas fa-file-csv'></i> CSV",
            "titleAttr":"Esportar a CSV",
            "className": "btn btn-info",
            "exportOptions": { 
                "columns": [ 0, 1, 2, 3] 
            }
        }
    ],
    "resonsieve":"true",
    "bDestroy": true,
    "iDisplayLength": 10,
    "order":[[0,"desc"]]  
});


 //NUEVO PLAN
 var formPlanes = document.querySelector("#formPlanes");
 formPlanes.onsubmit = function(e) {
     e.preventDefault();

     var intIdRol = document.querySelector('#idPlanes').value;
     var strNombre = document.querySelector('#txtNombrePlan').value;
     var strDescripcion = document.querySelector('#txtMontoplan').value;
     var strDuracion = document.querySelector('#txtDuracion').value;
         
     if(strNombre == '' || strDescripcion == '' || strDuracion == '')
     {
         swal("Atención", "Todos los campos son obligatorios." , "error");
         return false;
     }
     divLoading.style.display = "flex";
     var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
     var ajaxUrl = base_url+'/PlanesPrepago/setPlanes'; 
     var formData = new FormData(formPlanes);
     request.open("POST",ajaxUrl,true);
     request.send(formData);
     request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
             
             var objData = JSON.parse(request.responseText);
             if(objData.status)
             {
                 $('#modalFormPlanes').modal("hide");
                 formPlanes.reset();
                 swal("Planes Prepago", objData.msg ,"success");
                 tablePlanes.api().ajax.reload();
             }else{
                 swal("Error", objData.msg , "error");
             }              
         } 
         divLoading.style.display = "none";
         return false;
     }

     
 }

//ELIMINAR PLAN
function fntDelPlan(idrol){
    var idrol = idrol;
    swal({
        title: "Eliminar Plan",
        text: "¿Realmente quiere eliminar el Plan?",
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
//FIN ELIMINAR PLAN

//Editar
function fntEditPlan(idrol){
    document.querySelector('#titleModal').innerHTML ="Actualizar Plan";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML ="Actualizar";

    var idrol = idrol;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl  = base_url+'/PlanesPrepago/getPlan/'+idrol;
    request.open("GET",ajaxUrl ,true);
    request.send();

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            
            var objData = JSON.parse(request.responseText);
            /*if(objData.status)
            {*/
                

                document.querySelector("#idPlanes").value = objData.data.id_planRenta;
                document.querySelector("#txtNombrePlan").value = objData.data.descripcion_plan;
                document.querySelector("#txtMontoplan").value = objData.data.monto_plan;
                document.querySelector("#txtDuracion").value = objData.data.duracion;

                
                //document.querySelector("#listStatus").innerHTML = htmlSelect;
                $('#modalFormPlanes').modal('show');
            /*}else{
                swal("Error", objData.msg , "error");
            }*/
        }
    }

}
//fin editar


function openModal()
{
    rowTable = "";
    document.querySelector('#idPlanes').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Plan";
    document.querySelector("#formPlanes").reset();
    //document.querySelector("#divBarCode").classList.add("notblock");
    //document.querySelector("#containerGallery").classList.add("notblock");
    //document.querySelector("#containerImages").innerHTML = "";
    $('#modalFormPlanes').modal('show');

}

window.addEventListener('load', function() {
    /*fntEditRol();
    fntDelRol();
    fntPermisos();*/
}, false);