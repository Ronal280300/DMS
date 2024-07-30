<?php include_once 'Views/template/header.php'?>
<div class = 'card'>
   <div class = 'card-body'>
      <div class = 'alert alert-custom alert-indicator-bottom indicator-success' role = 'alert'>
         <div class = 'alert-content text-center'>
            <span class = 'alert-title large' style="font-size: large">Nombre de la carpeta </span>
            <span class = 'alert-text' style="font-size: medium"><?php echo $data['carpeta']['nombre']?></span>
         </div>
      </div>
      <input type = 'hidden' id = 'id_carpeta' value = "<?php echo $data['id_carpeta']; ?>">
      <div class = 'table-responsive' >
         <table class = "table table-striped table-hover display
            nowrap"  style = 'width:100%;' id = 'tblDetalle'>
            <thead>
               <tr>
                  <th>Usuario</th>
                  <th>Archivo</th>
                  <th>Estado</th>
                  <th></th>
               </tr>
            </thead>
            <tbody>
            </tbody>
         </table>
      </div>
   </div>
</div>
<?php include_once 'Views/template/footer.php';
   ?>