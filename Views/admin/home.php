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
         <?php foreach ($data['carpetas'] as $carpeta) { ?>
            <div class="col-md-4">
               <div class="card file-manager-group">
                  <div class="card-body d-flex align-items-center">
                     <i class="material-icons" style="color: #<?php echo $carpeta['color']; ?>">folder</i>
                     <div class="file-manager-group-info flex-fill">
                        <a href="#" id= "<?php echo $carpeta['id']; ?>" class="file-manager-group-title carpetas"><?php echo $carpeta['nombre']; ?></a>
                        <span class="file-manager-group-about"><?php echo $carpeta['fecha']; ?></span>
                     </div>
                  </div>
               </div>            
            </div>
            <?php }?>
         </div>
         <div class="section-description">
            <h1>Archivos Recientes</h1>
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
<div id="modalFile" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
   <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="title">Gestión</h5>
            <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
         </div>
         <div class="modal-body">
            <div class="d-grid">
               <button type="button" id="btnNuevaCarpeta" class="btn btn-outline-primary m-r-xs"><i class="material-icons">folder</i>Nueva Carpeta</button> 
               <hr>
               <input type="file" id="file" class="d-none" name="file">
               <button type="button" id="btnSubirArchivo" class="btn btn-outline-success m-r-xs"><i class="material-icons">upload_file</i>Cargar Archivo</button> 
            </div>
         </div>
      </div>
   </div>
</div>
<div id="modalCarpeta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
   <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="title-carpeta">Nueva Carpeta</h5>
            <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
         </div>
         <form id="frmCarpeta" autocomplete="off">
            <div class="modal-body">
               <div class="input-group">
                  <span class="input-group-text">
                  <i class="material-icons-outlined">folder</i>
                  </span>
                  <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre">
               </div>
            </div>
            <div class="modal-footer">
               <button class="btn btn-primary" type="submit">Crear</button>
            </div>
         </form>
      </div>
   </div>
</div>

<div id="modalCompartir" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
   <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="title-compartir"></h5>
            <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
         </div>
            <div class="modal-body">
               <input type="hidden" id="id_carpeta">
            <div class="d-grid">
               <button type="button" id="btnSubir" class="btn btn-outline-primary m-r-xs"><i class="material-icons">folder_zip</i>Cargar Archivo</button> 
               <hr>
               <button type="button" id="btnCompartir" class="btn btn-outline-success m-r-xs"><i class="material-icons">share</i>Compartir</button> 
            </div>
            </div>
      </div>
   </div>
</div>
<?php include_once 'Views/template/footer.php'?>