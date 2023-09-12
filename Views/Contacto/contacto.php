<?php 
headerTienda($data);
$banner = $data['page']['portada'];
$idpagina = $data['page']['idpost'];

 ?>
<script>
 	document.querySelector('header').classList.add('header-v4');
 </script>
<!-- Title page -->

<!-- Content page -->
<section class="bg0 p-t-104 p-b-116 dondoContacto">
	<div class="container">
	<form id="miFormulario">
        <div class="form-group">
            <input type="text" class="form-control" id="nombres" name="nombres" placeholder="NOMBRE(S) COMPLETO" require>
        </div>
        <div class="form-group">
            <input type="email" class="form-control" id="email" name="email" placeholder="EMAIL" require>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="asunto" name="asunto" placeholder="ASUNTO" require>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="DESCRIPCIÓN" require>
        </div>
        <button type="submit" class="form-control btn btn-success btnEnviar">MANDAR</button>
    </form>
	</div>
	
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
    $("#miFormulario").submit(function (e) {
        e.preventDefault(); // Evita que el formulario se envíe de forma tradicional

        // Obtener los valores del formulario
        var nombres = $("#nombres").val();
        var email = $("#email").val();
        var asunto = $("#asunto").val();
        var descripcion = $("#descripcion").val();

        // Validar que todos los campos estén llenos
        if (nombres === '' || email === '' || asunto === '' || descripcion === '') {
            alert("Por favor, complete todos los campos antes de enviar el formulario.");
            return;
        }

        // Realizar la solicitud AJAX
        $.ajax({
            type: "POST",
            url: "<?= base_url().'/Views/Contacto/email/enviar.php'?>", // Cambia esto por la ubicación de tu script PHP
            data: {
                nombres: nombres,
                email: email,
                asunto: asunto,
                descripcion: descripcion
            },
            success: function (response) {
                // Mostrar la respuesta en el div resultado
                $("#resultado").html(response);
                //console.log(response);
                alert("Envío exitoso");
                // Limpiar el formulario después del envío
                $("#miFormulario")[0].reset();
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
</section>	
<img src="<?= base_url().'/Assets/cba/ubicaciones.png'?>" alt="" class="imgfooterContacto">
<?php 
	
	footerTienda($data);
?>