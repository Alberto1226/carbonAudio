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
          <form  id="miFormulario2" method="POST" enctype="multipart/form-data"> 
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
            <button type="submit" class="form-control btn btn-success btnEnviar2">Enviar</button>
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
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
    $("#miFormulario2").submit(function (e) {
        e.preventDefault(); // Evita que el formulario se envíe de forma tradicional

        // Obtener los valores del formulario
        var nombres = $("#nombre").val();
        var app = $("#app").val();
        var apm = $("#apm").val();
        var dom = $("#dom").val();
        var prop = $("#prop").val();

        // Validar que todos los campos estén llenos
        if (nombres === '' || app === '' || apm === '' || dom === '' || prop === '') {
            alert("Por favor, complete todos los campos antes de enviar el formulario.");
            return;
        }

        // Realizar la solicitud AJAX
        $.ajax({
            type: "POST",
            url: "<?= base_url().'/Views/Contacto/email/enviar2.php'?>", // Cambia esto por la ubicación de tu script PHP
            data: {
                nombres: nombres,
                app: app,
                apm: apm,
                dom: dom,
                prop: prop
            },
            success: function (response) {
                // Mostrar la respuesta en el div resultado
                $("#resultado").html(response);
                //console.log(response);
                alert("Envío exitoso");
                // Limpiar el formulario después del envío
                $("#miFormulario2")[0].reset();
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