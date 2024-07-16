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
                        <a href="#" class="file-manager-group-title"><?php echo $carpeta['nombre']; ?></a>
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
            <div class="col-xxl-6">
               <div class="card file-manager-recent-item">
                  <div class="card-body">
                     <div class="d-flex align-items-center">
                        <i class="material-icons-outlined text-danger align-middle m-r-sm">description</i>
                        <a href="#" class="file-manager-recent-item-title flex-fill">design-components.pdf</a>
                        <span class="p-h-sm">167kb</span>
                        <span class="p-h-sm text-muted">09.14.21</span>
                        <a href="#" class="dropdown-toggle file-manager-recent-file-actions" id="file-manager-recent-1" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="file-manager-recent-1">
                           <li><a class="dropdown-item" href="#">Share</a></li>
                           <li><a class="dropdown-item" href="#">Download</a></li>
                           <li><a class="dropdown-item" href="#">Move to folder</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="card file-manager-recent-item">
                  <div class="card-body">
                     <div class="d-flex align-items-center">
                        <i class="material-icons-outlined text-primary align-middle m-r-sm">code</i>
                        <a href="#" class="file-manager-recent-item-title flex-fill">MainFragment.kt</a>
                        <span class="p-h-sm">14kb</span>
                        <span class="p-h-sm text-muted">09.03.21</span>
                        <a href="#" class="dropdown-toggle file-manager-recent-file-actions" id="file-manager-recent-2" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="file-manager-recent-2">
                           <li><a class="dropdown-item" href="#">Share</a></li>
                           <li><a class="dropdown-item" href="#">Download</a></li>
                           <li><a class="dropdown-item" href="#">Move to folder</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="card file-manager-recent-item">
                  <div class="card-body">
                     <div class="d-flex align-items-center">
                        <i class="material-icons-outlined text-primary align-middle m-r-sm">code</i>
                        <a href="#" class="file-manager-recent-item-title flex-fill">MainViewModel.kt</a>
                        <span class="p-h-sm">72kb</span>
                        <span class="p-h-sm text-muted">08.28.21</span>
                        <a href="#" class="dropdown-toggle file-manager-recent-file-actions" id="file-manager-recent-3" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="file-manager-recent-3">
                           <li><a class="dropdown-item" href="#">Share</a></li>
                           <li><a class="dropdown-item" href="#">Download</a></li>
                           <li><a class="dropdown-item" href="#">Move to folder</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="card file-manager-recent-item">
                  <div class="card-body">
                     <div class="d-flex align-items-center">
                        <i class="material-icons-outlined text-danger align-middle m-r-sm">description</i>
                        <a href="#" class="file-manager-recent-item-title flex-fill">Guidelines.pdf</a>
                        <span class="p-h-sm">567kb</span>
                        <span class="p-h-sm text-muted">08.26.21</span>
                        <a href="#" class="dropdown-toggle file-manager-recent-file-actions" id="file-manager-recent-4" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="file-manager-recent-4">
                           <li><a class="dropdown-item" href="#">Share</a></li>
                           <li><a class="dropdown-item" href="#">Download</a></li>
                           <li><a class="dropdown-item" href="#">Move to folder</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="card file-manager-recent-item">
                  <div class="card-body">
                     <div class="d-flex align-items-center">
                        <i class="material-icons-outlined text-success align-middle m-r-sm">image</i>
                        <a href="#" class="file-manager-recent-item-title flex-fill">background2.png</a>
                        <span class="p-h-sm">2.8mb</span>
                        <span class="p-h-sm text-muted">08.14.21</span>
                        <a href="#" class="dropdown-toggle file-manager-recent-file-actions" id="file-manager-recent-5" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="file-manager-recent-5">
                           <li><a class="dropdown-item" href="#">Share</a></li>
                           <li><a class="dropdown-item" href="#">Download</a></li>
                           <li><a class="dropdown-item" href="#">Move to folder</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xxl-6">
               <div class="card file-manager-recent-item">
                  <div class="card-body">
                     <div class="d-flex align-items-center">
                        <i class="material-icons-outlined text-warning align-middle m-r-sm">lock</i>
                        <a href="#" class="file-manager-recent-item-title flex-fill">app-info.zip</a>
                        <span class="p-h-sm">1.2mb</span>
                        <span class="p-h-sm text-muted">08.02.21</span>
                        <a href="#" class="dropdown-toggle file-manager-recent-file-actions" id="file-manager-recent-6" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="file-manager-recent-6">
                           <li><a class="dropdown-item" href="#">Share</a></li>
                           <li><a class="dropdown-item" href="#">Download</a></li>
                           <li><a class="dropdown-item" href="#">Move to folder</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="card file-manager-recent-item">
                  <div class="card-body">
                     <div class="d-flex align-items-center">
                        <i class="material-icons-outlined text-primary align-middle m-r-sm">code</i>
                        <a href="#" class="file-manager-recent-item-title flex-fill">ContactsViewModel.kt</a>
                        <span class="p-h-sm">763kb</span>
                        <span class="p-h-sm text-muted">07.26.21</span>
                        <a href="#" class="dropdown-toggle file-manager-recent-file-actions" id="file-manager-recent-7" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="file-manager-recent-7">
                           <li><a class="dropdown-item" href="#">Share</a></li>
                           <li><a class="dropdown-item" href="#">Download</a></li>
                           <li><a class="dropdown-item" href="#">Move to folder</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="card file-manager-recent-item">
                  <div class="card-body">
                     <div class="d-flex align-items-center">
                        <i class="material-icons-outlined text-success align-middle m-r-sm">image</i>
                        <a href="#" class="file-manager-recent-item-title flex-fill">avatar-xl.png</a>
                        <span class="p-h-sm">5.6mb</span>
                        <span class="p-h-sm text-muted">07.24.21</span>
                        <a href="#" class="dropdown-toggle file-manager-recent-file-actions" id="file-manager-recent-8" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="file-manager-recent-8">
                           <li><a class="dropdown-item" href="#">Share</a></li>
                           <li><a class="dropdown-item" href="#">Download</a></li>
                           <li><a class="dropdown-item" href="#">Move to folder</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="card file-manager-recent-item">
                  <div class="card-body">
                     <div class="d-flex align-items-center">
                        <i class="material-icons-outlined text-success align-middle m-r-sm">image</i>
                        <a href="#" class="file-manager-recent-item-title flex-fill">welcome-login.png</a>
                        <span class="p-h-sm">1.2mb</span>
                        <span class="p-h-sm text-muted">06.29.21</span>
                        <a href="#" class="dropdown-toggle file-manager-recent-file-actions" id="file-manager-recent-9" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="file-manager-recent-9">
                           <li><a class="dropdown-item" href="#">Share</a></li>
                           <li><a class="dropdown-item" href="#">Download</a></li>
                           <li><a class="dropdown-item" href="#">Move to folder</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="card file-manager-recent-item">
                  <div class="card-body">
                     <div class="d-flex align-items-center">
                        <i class="material-icons-outlined text-danger align-middle m-r-sm">description</i>
                        <a href="#" class="file-manager-recent-item-title flex-fill">Material Design Components</a>
                        <span class="p-h-sm">142kb</span>
                        <span class="p-h-sm text-muted">06.27.21</span>
                        <a href="#" class="dropdown-toggle file-manager-recent-file-actions" id="file-manager-recent-10" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="file-manager-recent-10">
                           <li><a class="dropdown-item" href="#">Share</a></li>
                           <li><a class="dropdown-item" href="#">Download</a></li>
                           <li><a class="dropdown-item" href="#">Move to folder</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
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
<?php include_once 'Views/template/footer.php'?>