<?php
    require 'datos2.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD con PHP, MySQL</title>
        <!--datables CSS básico-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary"  >
 <a class="navbar-brand" rel="home" href="#" "> <img style="max-width:100px; margin-top: -7px;" src="img/LogoAlcaldia.jpg"> </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto pr-5">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Desarrollo Social<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="desarrolloEconomico.php">Desarrollo Económico</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Registrarse</a>
      </li>
     
    </ul>
  </div>
</nav>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data"id="usrform" >
            <!-- Modal -->
            <div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Evento Social</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <input type="hidden" required name="txtId" placeholder="" id="txtId" require="" value="<?php echo $txtId; ?>">

                            <div class="form-group col-md-4">
                                <label for="txtNombre">Nombre:</label>
                                <input type="text" class="form-control <?php echo (isset($error['Nombre']))?"is-invalid":"";?>"  required name="txtNombre" placeholder="" id="txtNombre" require="" value="<?php echo $txtNombre; ?>">
                                <div class="invalid-feedback">
                                    <?php echo (isset($error['Nombre']))?$error['Nombre']:"";?>"
                                </div>
                                <br>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="txtDescripcion">Descripción:</label>
                                 <textarea class="form-control" <?php echo (isset($error['Descripcion']))?"is-invalid":"";?>" required  name="txtDescripcion" placeholder="" id="txtDescripcion" require="" value="<?php echo $txtDescripcion; ?>" rows="5" form="usrform"></textarea>
                                 
                                <div class="invalid-feedback">
                                    <?php echo (isset($error['Descripcion']))?$error['Descripcion']:"";?>
                                </div>
                                <br>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="txtLugar">Lugar:</label>
                                <input type="text" class="form-control <?php echo (isset($error['Lugar']))?"is-invalid":"";?>" required  name="txtLugar" placeholder="" id="txtLugar" require="" value="<?php echo $txtLugar; ?>">
                                <div class="invalid-feedback">
                                    <?php echo (isset($error['Lugar']))?$error['Lugar']:"";?>
                                </div>
                                <br>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="txtFecha">Fecha:</label>
                                <input type="date" class="form-control <?php echo (isset($error['Fecha']))?"is-invalid":"";?>" required  name="txtFecha" placeholder="" id="txtFecha" require="" value="<?php echo $txtFecha; ?>">
                                <div class="invalid-feedback">
                                    <?php echo (isset($error['Fecha']))?$error['Fecha']:"";?>
                                </div>
                                <br>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="txtFoto">Foto:</label>
                                <?php if($txtFoto != ""){  ?>
                                <br>
                                <img class="img-thumbnail rounded mx-auto d-block" width="100px" src="./Imagenes/<?php echo $txtFoto; ?>" alt="">
                                <?php }?>
                                <input type="file" class="form-control" accept="image/*" name="txtFoto" placeholder="" id="txtFoto" require="" value="<?php echo $txtFoto; ?>">
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button value="btnAgregar" <?php echo $accionAgregar; ?> class="btn btn-success" type="submit" name="accion">Agregar</button>
                        <button value="btnModificar" <?php echo $accionModificar; ?> class="btn btn-warning" type="submit" name="accion">Modificar</button>
                        <button value="btnEliminar" onClick="return Confirmar('Desea eliminar el empleado?');" <?php echo $accionEliminar; ?> class="btn btn-danger" type="submit" name="accion">Eliminar</button>
                        <button value="btnCancelar" <?php echo $accionCancelar; ?> class="btn btn-primary" type="submit" name="accion">Cancelar</button>
                    </div>
                    </div>
                </div>
            </div>
            <br/><br/>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#miModal">
            Agregar Registro +
            </button>
        </form>
        <br/><br/>                                    
        <div class="row">
            <div class="table-responsive">
            <table id="tablax"  class=" table responsive  table-striped table-condensed" width="100%" class=" table-bordered""> 
                <thead class="thead-dark" >
                    <tr>
                        <th width="30%">Foto</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Lugar</th>
                        <th width="10%">Fecha</th>
                        <th width="20%">Acciones</th>
                    </tr>
                </thead>
                <!-- <tbody> -->
                    <?php foreach($listaEmpleados as $empleado){ ?>
                        <tr>
                            <td><img class="img-thumbnail" width="100%" src="./Imagenes/<?php echo $empleado['Foto']; ?>" alt="<?php echo $empleado['Foto']; ?>"></td>
                            <td><?php echo $empleado['Nombre']; ?>
                            <td><?php echo $empleado['Descripcion']; ?></td>
                            <td><?php echo $empleado['Lugar']; ?></td>
                            <td><?php echo $empleado['Fecha']; ?></td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="txtId" value="<?php echo $empleado['Id']; ?>">
                                    <input type="submit" class="btn btn-info" value="Seleccionar" name="accion">
                                    <button value="btnEliminar" onClick="return Confirmar('Desea eliminar el empleado?');" class="btn btn-danger" type="submit" name="accion">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                <!-- </tbody> -->
            </table>
            </div>
        </div>
        <?php if($mostrarModal){  ?>
            <script>
                $('#miModal').modal('show');
            </script>
        <?php } ?>
        <script>
            function Confirmar(Mensaje){
                return (confirm(Mensaje))?true:false;
            }
        </script>
     
    </div>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js">
    </script>
    <!-- BOOTSTRAP -->
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js">
    </script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.js"></script>
    <script src="js/main.js"></script>
</body>
</html>