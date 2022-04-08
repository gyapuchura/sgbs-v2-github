<?php include("inc.config.php");?>
<?php
date_default_timezone_set('UTC');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

$gestion       =  date("Y");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Above Multi-purpose Free Bootstrap Responsive Template</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="http://webthemez.com" />
<!-- css -->
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/fancybox/jquery.fancybox.css" rel="stylesheet">
<link href="css/jcarousel.css" rel="stylesheet" />
<link href="css/flexslider.css" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" />

<link rel="stylesheet" type="text/css" href="css/datatables.min.css"/>
 
<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body>
<div id="wrapper">

	<!-- start header -->

    <?php include ("menu_sgbs.php");?>
    
    <!-- end header -->
	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">VER TODOS LOS TRÁMITES DE CONTRATACIÓN</h2>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	    <div class="container">
		
        <div class="row">
        <div class="col-12">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
      <th>Nro.</th>
      <th>OBJETO DE CONTRATACIÓN</th>
      <th>ESTADO DEL PROCESO</th>
      <th>MOSTRAR FORMULARIO SE SOLICITUD</th>
	  <th>MOSTRAR HISTORICO</th>
      <th>MOSTRAR CARTA</th>
      <th>MOSTRAR ORDEN</th>
      <th>INFORME DE CONFORMIDAD</th>
      <th>HISTOGRAMA</th>
            </tr>
        </thead>
        <tbody>

<?php
$sql = " SELECT  idproceso, objeto, fecha_solic, preventivo, proceso_dgaa, observaciones, est_proceso, proceso_concluido, ";
$sql.= " fecha_conformidad, idnombre, tipoproceso, artista, modalidad FROM procesos ORDER BY idproceso  DESC ";
$result = mysqli_query($link, $sql);
if ($row = mysqli_fetch_array($result)){
mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {
?>
      <tr>
      <td><?php echo $row[0]?></td>
      <td><?php echo $row[1]?></br></br>FECHA DE SOLICITUD: <? echo $row[2];?></td>
      <td><? echo $row[6];?></br></br>MODALIDAD: <? echo $row[12];?></td>
	  <td><a href="popup_solicitud_ver.php?idproceso=<?echo $row[0];?>&idname=<?echo $row[9];?>" target="_blank" class="Estilo5" onClick="window.open(this.href, this.target, 'width=720,height=1000,scrollbars=YES'); return false;"> VER SOLICITUD </a> </td>
      <td><a href="derivacion_ver.php?idproceso=<?echo $row[0];?>" target="_blank" class="Estilo5" onClick="window.open(this.href, this.target, 'width=720,height=1000,scrollbars=YES'); return false;"> VER HISTORICO </a></td>
      <td>

      <?
        $tipoproceso = $row[10];
        $artista     = $row[11];
        $modalidad   = $row[12];

?>
        <div align="left" class="Estilo21"><span class="Estilo20">


        <a href="
         <?
          if ($tipoproceso == "BIENES" AND $artista == "" AND $modalidad == "CONTRATACION MENOR") {
          echo"imprime_carta_adjudicacion_h.php";
          }
          else {
          if ($tipoproceso == "BIENES" AND $artista == "" AND $modalidad == "CONTRATACION DIRECTA") {
            echo"imprime_carta_invitacion_h.php";
          }
          else {
          if ($tipoproceso == "SERVICIOS" AND $artista == "" AND $modalidad == "CONTRATACION MENOR") {
            echo"imprime_carta_adjudicacion_h.php";
          }
          else {
          if ($tipoproceso == "SERVICIOS" AND $artista == "" AND $modalidad == "CONTRATACION DIRECTA") {
            echo"imprime_carta_invitacion_h.php";
          }
          else {
          if ($tipoproceso == "SERVICIOS" AND $artista == "SI" AND $modalidad == "CONTRATACION MENOR") {
            echo"imprime_carta_invitacion_artista_h.php";
               }
               else {
          if ($tipoproceso == "SERVICIOS" AND $artista == "SI" AND $modalidad == "CONTRATACION DIRECTA") {
            echo"imprime_carta_invitacion_artista_h.php";
          }
          else {
          if ($tipoproceso == "CONSULTORIA" AND $artista == "" AND $modalidad == "CONTRATACION MENOR") {
            echo"imprime_carta_adjudicacion_h.php";
          }
          else {
          if ($tipoproceso == "CONSULTORIA" AND $artista == "" AND $modalidad == "CONTRATACION DIRECTA") {
           echo"imprime_carta_invitacion_h.php";
          }
          else {

          }

          }
          }
               }

               }
          }

          }

          }

?>

        ?idproceso=<?echo $row[0];?>&idname=<?echo $row[9];?>" target="_blank" class="Estilo5" onClick="window.open(this.href, this.target, 'width=720,height=1000,scrollbars=YES'); return false;"> VER CARTA </a>

      </td>

      <td>     

      <a href="
                        <?
          if ($tipoproceso == "BIENES" AND $artista == "" AND $modalidad == "CONTRATACION MENOR") {
          echo"imprime_orden_compra_h.php";
          }
          else {
          if ($tipoproceso == "BIENES" AND $artista == "" AND $modalidad == "CONTRATACION DIRECTA") {
           echo"imprime_orden_compra_h.php";
          }
          else {
          if ($tipoproceso == "SERVICIOS" AND $artista == "" AND $modalidad == "CONTRATACION MENOR") {
            echo"imprime_orden_servicio_h.php";
          }
          else {
          if ($tipoproceso == "SERVICIOS" AND $artista == "" AND $modalidad == "CONTRATACION DIRECTA") {
            echo"imprime_orden_servicio_h.php";
          }
          else {
          if ($tipoproceso == "SERVICIOS" AND $artista == "SI" AND $modalidad == "CONTRATACION MENOR") {
            echo"imprime_orden_servicio_artistico_h.php";
               }
               else {
          if ($tipoproceso == "SERVICIOS" AND $artista == "SI" AND $modalidad == "CONTRATACION DIRECTA") {
            echo"imprime_orden_servicio_artistico_h.php";
          }
          else {
          if ($tipoproceso == "CONSULTORIA" AND $artista == "" AND $modalidad == "CONTRATACION MENOR") {
            echo"mensaje_consultoria.php";
          }
          else {
          if ($tipoproceso == "CONSULTORIA" AND $artista == "" AND $modalidad == "CONTRATACION DIRECTA") {
            echo"mensaje_consultoria.php";
          }
          else {

          }

          }
          }
               }

               }
          }

          }

          }

?>
        ?idproceso=<?echo $row[0];?>&idname=<?echo $row[9];?>" target="_blank" class="Estilo5" onClick="window.open(this.href, this.target, 'width=720,height=1000,scrollbars=YES'); return false;"> VER ORDEN </a>

      </td>
      <td>
      <a href="imprime_conformidad_h.php?idproceso=<?echo $row[0];?>&idname=<?echo $row[9];?>" target="_blank" class="Estilo5" onClick="window.open(this.href, this.target, 'width=720,height=1000,scrollbars=YES'); return false;"> VER INFORME </a>
      </td>
      <td>
      <a href="examples/columnrange/historicouno.php?idproceso=<?echo $row[0];?>" target="_blank" class="Estilo5" onClick="window.open(this.href, this.target, 'width=1000,height=600,scrollbars=YES'); return false;">HISTOGRAMA</a>
      </td>
      </tr>
 <?php
   }
  while ($row = mysqli_fetch_array($result));
} else {
}
?>
      
        </tbody>

    </table>

    </div>
    </div>								
	</div>
	</section>
	<!-- start footer -->

    <?php include ("footer.php");?>

	<!-- end footer -->
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/jquery.fancybox-media.js"></script> 
<script src="js/portfolio/jquery.quicksand.js"></script>
<script src="js/portfolio/setting.js"></script>
<script src="js/jquery.flexslider.js"></script>
<script src="js/animate.js"></script>
<script src="js/custom.js"></script>

<script type="text/javascript" src="js/datatables.min.js"></script>

<script>
$(document).ready(function() {
$('#example').DataTable( {
    "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]] ,
    "language": {
        "lengthMenu": "Mostrar _MENU_ registros por pagina",
        "zeroRecords": "No se encontraron resultados en su busqueda",
        "searchPlaceholder": "Buscar registros",
        "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
        "infoEmpty": "No existen registros",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "search": "Buscar:",
        "paginate": {
            "first":    "Primero",
            "last":    "Último",
            "next":    "Siguiente",
            "previous": "Anterior"
        },
    }
} );
} );
</script>

</body>
</html>