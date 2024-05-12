<?php include_once 'Views/template/header.php'?>
                    
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="page-description">
                                    <h1><?php echo $data ['title']; ?></h1>
                                </div>
                            </div>
                          <div class="col-md-12">
                          <button class="btn btn-outline-primary mb-3" id="btnNuevo" type="button" >Nuevo</button>
                            <div class="card">
                                <div class="card-body">                                
                                <div class="table-responsive">
                               <table class="table table- striped table-hover"  style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Id</th>
                                        <th>Nombres</th>
                                        <th>Correo</th>
                                        <th>Teléfono</th>
                                        <th>Dirección</th>
                                        <th>Perfil</th>
                                        <th>Fecha registro</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                               </table> 
                            </div>
                                </div>
                            </div>
                          </div>  

                        </div>
                    </div>

 <div id="modalRegistro" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title"></h5>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form id="formulario" autocomplete="off">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <label for="nombre">Nombre</label>
                    <div class="input-group">
                <span class="input-group-text">
                    <i class="material-icons">
                    list
                    </i>
            </span> 
                    <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Nombre">
                </div>
                    </div>
                    <div class="col-md-6">
                        <label for="apellido">Apellido</label>
                    <div class="input-group">
                <span class="input-group-text">
                    <i class="material-icons">
                    list
                    </i>
                </span> 
                    <input class="form-control" type="text" id="apellido" name="apellido" placeholder="Apellidos">
                </div>
                    </div>


                    <div class="col-md-6">
                        <label for="correo">Correo</label>
                    <div class="input-group">
                <span class="input-group-text">
                    <i class="material-icons">
                    email
                    </i>
                </span> 
                    <input class="form-control" type="text" id="correo" name="correo" placeholder="Correo">
                </div>
                    </div>




                    <div class="col-md-6">
                        <label for="telefono">Teléfono</label>
                    <div class="input-group">
                <span class="input-group-text">
                    <i class="material-icons">
                    phone
                    </i>
                </span> 
                    <input class="form-control" type="text" id="telefono" name="telefono" placeholder="Teléfono">
                </div>
                    </div>





                    <div class="col-md-6">
                        <label for="direccion">Dirección</label>
                    <div class="input-group">
                <span class="input-group-text">
                    <i class="material-icons">
                    location_on
                    </i>
                </span> 
                    <input class="form-control" type="text" id="direccion" name="direccion" placeholder="Dirección">
                </div>
                    </div>



                    <div class="col-md-6">
                        <label for="clave">Clave</label>
                    <div class="input-group">
                <span class="input-group-text">
                    <i class="material-icons">
                    key
                    </i>
                </span> 
                    <input class="form-control" type="password" id="clave" name="clave" placeholder="Contraseña">
                </div>
                    </div>

                    <div class="col-md-6">
                        <label for="rol">Rol</label>
                    <div class="input-group">
                <span class="input-group-text">
                    <i class="material-icons">
                    person
                    </i>
                </span> 
                <select name="rol" id="rol" class="form-control">
                    <option value="1">Administrador</option>
                    <option value="2">Usuario</option>
                </select>
                </div>
                    </div>

                </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-primary" type="button">Registrar</button>
                    <button class="btn btn-outline-danger" data-bs-dismiss="modal" type="button">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
 </div>                   
<?php include_once 'Views/template/footer.php'?>        