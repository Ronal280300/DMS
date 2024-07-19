<?php include_once 'Views/template/header.php'?>
<div class="app-content">
   <a href="#" class="content-menu-toggle btn btn-primary"><i class="material-icons">menu</i> content</a>
   <div class="content-menu content-menu-right">
      <ul class="list-unstyled">
         <li><a href="#">All Files</a></li>
         <li><a href="#" class="active">Recents</a></li>
         <li><a href="#">My Devices</a></li>
         <li><a href="#">Important</a></li>
         <li><a href="#">Deleted</a></li>
         <li class="divider"></li>
         <li><a href="#">Shared with me</a></li>
         <li><a href="#">My Collections</a></li>
         <li><a href="#">Settings</a></li>
      </ul>
   </div>
   <div class="content-wrapper">
      <div class="container-fluid">
         <div class="row">
            <div class="col">
               <div class="page-description d-flex align-items-center">
                  <div class="page-description-content flex-grow-1">
                     <h1>Gestor de Archivos</h1>
                  </div>
                  <div class="page-description-actions">
                     <a href="#" class="btn btn-primary" id="btnUpload"><i class="material-icons">add</i>Crear</a>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <?php foreach ($data['archivos'] as $archivo){ ?>

            <div class="col-md-6">
               <div class="card file-manager-recent-item">
                  <div class="card-body">
                     <div class="d-flex align-items-center">
                        <i class="material-icons-outlined text-danger align-middle m-r-sm">description</i>
                        <a href="#" class="file-manager-recent-item-title flex-fill"><?php echo $archivo['nombre'];?></a>
                        <span class="p-h-sm text-muted"><?php echo $archivo['fecha_create'];?></span>
                        <a href="#" class="dropdown-toggle file-manager-recent-file-actions" id="file-manager-recent-1" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="file-manager-recent-1">
                           <li><a class="dropdown-item" href="#">Share</a></li>
                           <li><a class="dropdown-item" href="#">Download</a></li>
                           <li><a class="dropdown-item" href="#">Move to folder</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <?php }?>
         </div>
      </div>
   </div>
</div>

<?php include_once 'Views/template/footer.php'?>