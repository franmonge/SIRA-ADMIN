<?php
  function tipoSangre(){
  require('BD_Consultas\Conexion.php');
  if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
  }else{
    $query = "SELECT id, tipoSangre FROM tiposangre";
    $result = mysqli_query($conn, $query);
    if($result->num_rows > 0){
      $Codigo = "
      <!-- Content Header (Page header) -->
      <section class=\"content-header\">
         <h1>Solicitudes de Miembros</h1>
       </section>
       <!-- Main content -->
       <section class=\"content\">
         <div class=\"row\">
           <div class=\"col-xs-12\">
             <div class=\"box\">
               <!-- /.box-header -->
               <div class=\"box-body\">
                 <table id=\"table-Solicitudes\" class=\"table table-bordered table-striped\">
                   <thead>
                   <tr>
                     <th>Foto</th>
                     <th>Nombre</th>
                     <th>Carnet</th>
                     <th>Carrera</th>
                     <th>Teléfono</th>
                     <th>Correo</th>
                     <th>Opciones</th>
                   </tr>
                   </thead>
                   <tbody>";
      while($row = $result->fetch_assoc()){
        $Codigo .= "<tr>";
        $Codigo .= "<td>".$row["id"]."</td>";
        $Codigo .= "<td>" .$row["tipoSangre"] . "</td>";
        $Codigo .= "<td>" .$row["tipoSangre"] . "</td>";
        $Codigo .= "<td>" .$row["tipoSangre"] . "</td>";
        $Codigo .= "<td>" .$row["tipoSangre"] . "</td>";
        $Codigo .= "<td>" .$row["tipoSangre"] . "</td>";
        $Codigo .= "<td>" .
                    "<div class=\"input-group-btn\">
                      <button id=\"edit-group\" type=\"button\" class=\"btn btn-block btn-success btn-flat\">Aceptar</button>
                      <button id=\"delete-group\" type=\"button\" class=\"btn btn-block btn-danger btn-flat\">Rechazar</button>
                    </div>" 
                  . "</td>";
        $Codigo .= "</tr>";
      }
      $Codigo .= "
      </tbody>
        <tfoot>
          <tr>
           <th>Foto</th>
           <th>Nombre</th>
           <th>Carnet</th>
           <th>Carrera</th>
           <th>Teléfono</th>
           <th>Correo</th>
           <th>Opciones</th>
          </tr>
        </tfoot>
      </table>
      </div>
          <!-- /.box-body -->
      </div>
      <!-- /.box -->
      </div>
      <!-- /.col -->
      </div>
      <!-- /.row -->
      </section>
      <!-- /.content -->";
      echo $Codigo;
    }
  }
  $conn->close();
  }
?>



 <!DOCTYPE html>
 <html>
 <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>SIRA | Solicitudes</title>
   <!-- Tell the browser to be responsive to screen width -->
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <?php include('headerLinks.php')?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <?php include('adminNav.php')?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
       <!-- Main content -->
       <?php tipoSangre(); ?>
    </div>
  <!-- ./wrapper -->

  <?php include('adminFooter.php')?>

  <!-- jQuery 3 -->
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- DataTables -->
  <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- page script -->
  <script>
  $(function () {
    $('#example1').DataTable()
    $('#table-Solicitudes').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
  </script>
 </body>
 </html>
