<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <title>Consulta SUNAT</title>  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>-->
  <script src="https://code.jquery.com/jquery.min.js"></script>
  
</head>
<body>
<section class="contenedor">
    <h1>Consulta Sunat en tu Web</h1>
    <form method="post">
        <input type="text" class="ruc" id="ruc" name="ruc">
        <button id="botoncito" class="botoncito"><i class="fa fa-search"></i> Buscar</button>

    </form>
    <div>RUC: <span id="numero_ruc"></span></div>
    <div>RAZON SOCIAL: <span id="razon_social"></span></div>
    <div>INICIO DE ACTIVIDAD: <span id="fecha_actividad"></span></div>
    <div>CONDICIÓN: <span id="condicion"></span></div>
    <div>TIPO DE CONTRIBUYENTE: <span id="tipo"></span></div>
    <div>ESTADO DE CONTRIBUYENTE: <span id="estado"></span></div>
    <div>FECHA DE INSCRIPCION: <span id="fecha_inscripcion"></span></div>
    <div>DOMICILIO: <span id="domicilio"></span></div>
    <div>EMISION ELECTRONICA: <span id="emision"></span></div>
</section>
<script>
$(function(){
    $('#botoncito').on('click',function(){
     var ruc = $('#ruc').val();
     var url = 'consulta_sunat.php';
     $('.ajaxgif').removeClass('hide');
     //ajax
     $.ajax({
        type:'POST',
        url:url,
        data:'ruc='+ruc,
        success:function(datos_dni){
            $('.ajaxgif').addClass('hide');
            var datos = eval('datos_dni');
            var nada ='nada';
            if (datos[0]=nada){
               alert('DNIo RUC no valido o no registrado');
            }else{
               $('#numero_ruc').text(datos[0]);
               $('#razon_social').text(datos[1]);
               $('#fecha_actividad').text(datos[2]);
               $('#condicion').text(datos[3]);
               $('#tipo').text(datos[4]);
               $('#estado').text(datos[5]);
               $('#fecha_inscripcion').text(datos[6]);
               $('#domicilio').text(datos[7]);
               $('#emision').text(datos[8]);

            }
        }
     });
      return false;
    });
});

</script>
</body>
</html>