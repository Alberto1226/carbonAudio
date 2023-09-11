<?php 
headerTienda($data);
//$arrProductos = $data['productos'];
 ?>
<br><br><br>
<hr>
<div class="container condis">
      <div class="row">
        <div class="col-sm">
        <h2 style="padding:2vw; font-size:20px;">¿QUIERES SER DISTRIBUIDOR?</h2>
          <form>
            <div class="form-group">
              
              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="NOMBRES:">
            </div>
            <div class="form-group">
              
              <input type="text" class="form-control" id="app" name="app" placeholder="APELLIDO PATERNO:">
            </div>
            <div class="form-group">
              
              <input type="text" class="form-control" id="apm" name="apm" placeholder="APELLIDO MATERNO:">
            </div>
            <div class="form-group">
              
              <input type="text" class="form-control" id="dom" name="dom" placeholder="DOMICILIO DEL NEGOCIO:">
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">ADJUNTA FOTOS DE TU NEGOCIO O LOCAL:</label>
              <input type="file" class="form-control" id="files" name="files" placeholder="Another input">
            </div>
            <div class="form-group">
              <textarea class="form-control" aria-label="With textarea" id="prop" name="prop" placeholder="TE ESCUCHAMOS…."></textarea>
            </div>
            <button type="button" class="form-control btn btn-success btnEnviar">Enviar</button>
          </form>
        </div>
        <div class="col-sm">
        <h2 style=" margin-top:2vw; font-size:20px;">¿Quieres empezar tu propio negocio?</h2>
        <h2 style=" font-size:20px;">¿Deseas vender equipos?</h2>
        <h2 style=" font-size:20px;">¿Quieres ser parte de nuestro equipo de competencia profesional open show SPL?</h2>
        <h2 style=" font-size:20px;">Contáctanos y te atenderemos a la brevedad</h2>
        <img src="<?= base_url().'/Assets/cba/logo1.png'?>" class="imgLogoDis" alt=""  >
        </div>
      </div>
    </div>
<script>
	$(document).ready(function () {
    $(".btnEnviar").click(function () {
        // Obtener los valores del formulario
        var nombres = $("#nombre").val();
        var apellidoPaterno = $("#app").val();
        var apellidoMaterno = $("#apm").val();
        var domicilioNegocio = $("#dom").val();
        var descripcion = $("#prop").val();

        // Validar que todos los campos estén llenos
        if (nombres === '' || apellidoPaterno === '' || apellidoMaterno === '' || domicilioNegocio === '' || descripcion === '') {
            alert("Por favor, complete todos los campos antes de enviar el formulario.");
            return;
        }

        // Obtener la referencia al elemento de entrada de archivos
        var fileInput = document.getElementById('files');
        var files = fileInput.files;

        // Verificar si se seleccionaron archivos
        if (files.length === 0) {
            alert("Por favor, seleccione al menos una imagen antes de enviar el formulario.");
            return;
        }

        // Crear un objeto FormData para enviar archivos
        var formData = new FormData();

        // Agregar archivos al objeto FormData
        for (var i = 0; i < files.length; i++) {
            formData.append('files[]', files[i]);
        }

        // Agregar otros datos al objeto FormData
        formData.append('nombre', nombres);
        formData.append('app', apellidoPaterno);
        formData.append('apm', apellidoMaterno);
        formData.append('dom', domicilioNegocio);
        formData.append('prop', descripcion);

        // Realizar la solicitud AJAX
        $.ajax({
            type: "POST",
            url: "<?= base_url().'/Views/Contacto/email/enviar2.php'?>", // Cambia esto por la ubicación de tu script PHP
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                // Mostrar la respuesta en el div resultado o realizar cualquier otra acción que desees
                // $("#resultado").html(response);
                console.log(response);
                alert("Envío exitoso");
                // Limpiar el formulario después del envío
                $("form")[0].reset();
            },
            error: function (error) {
                // Manejar errores si es necesario
                console.log("Error: " + error);
                //alert("error");
            }
        });
    });
});


</script>
   
<?php 
	footerTienda($data);
?>