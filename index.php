<?php

  include_once 'bd/conexion.php';
  $objeto = new Conexion();
  $conexion = $objeto->Conectar();

  $consulta = "SELECT id,nombre, pais, edad FROM personas";
  $resultado = $conexion->prepare($consulta);
  $resultado->execute();
  $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="#" />
    <link rel="stylesheet" href="fonts/css/all.css">  
    <title>Tutorial DataTables</title>
      
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- CSS personalizado --> 
    <link rel="stylesheet" href="main.css">  
      
      
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">  
    <script src="function.js"></script>     
  </head>
    
  <body> 
     <header>
<!--         <h3 class="text-center text-light">Tutorial</h3>-->
         <h4 class="text-center text-light">Registro de Equipos</span></h4> 
     </header>    
      
    <div class="container">
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Nuevo</button>    
            </div>    
        </div>    
    </div>    
    <br>  
    <div class="container-fluid">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>País</th>                                
                                <th>Edad</th>  
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $dat['id'] ?></td>
                                <td><?php echo $dat['nombre'] ?></td>
                                <td><?php echo $dat['pais'] ?></td>
                                <td><?php echo $dat['edad'] ?></td>    
                                <td></td>
                            </tr>
                            <?php
                                }
                            ?>                                
                        </tbody>        
                       </table>                    
                    </div>
                </div>
        </div>  
    </div>    
      
<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span>
                </button>
            </div>
        <form id="formPersonas">    
            <div class="modal-body">
                <div class="form-group">
                <label for="nombre" class="col-form-label">Nombre del Producto:</label>
                <input type="text" class="form-control" id="nombre" placeholder="Ingrese el nombre del producto">
                </div>
                <div class="form-group">
                    <label for="categoria" class="col-form-label">Categoría:</label>
                      <select name="SelectOptions" id="categoria" class="form-control" required>
                         <option value="" disabled="disabled" selected>Selecione la categoria</option>
                         <option value="Div1">Equipos de Computo</option>
                         <option value="Div2">Perifericos Principales</option>
                         <option value="Div3">Dispositivos de red</option>
                         <option value="Div4">Dispositivos de respaldo</option>
                         <option value="Div5">Activos Relacionados</option>
                         <option value="Div6">Otros dispositivos</option>
                      </select>
                </div>                
                <div class="form-group">
                    <div class="FuncionOcultar">
                        <div class="Div1">
                          <label for="tag">Service Tag :</label>
                          <span required="required">*</span>
                             <input type="text" id="tag" placeholder="Ingrese el Service Tag"><br>
                          <label for="proveedor">Empresa / Proveedor</label>
                           <span required="required">*</span>
                     <select name="" id="proveedor">
                          <option value="1" disabled="disabled" selected>Seleccione su proveedor :</option>
                          <option value="2">Bicco Farms</option>
                          <option value="3">Altima Cap</option>
                     </select><br>
                          <label for="marca">Marca :</label>
                          <span required="required">*</span>
                               <input type="text" id="marca" placeholder="Ingrese la marca"><br>
                          <label for="modelo">Modelo :</label>
                          <span required="required">*</span>
                               <input type="text" id="modelo" placeholder="Ingrese el modelo"><br>
        
                          <label for="especificaciones">Especificaciones Técnicas :</label><br>
                               <input type="text" id="especificaciones" placeholder="Disco Duro"><br>
                               <input type="text"  placeholder="Procesador"><br>
                               <input type="text"  placeholder="Memoria Ram"><br>
                               <input type="text"  placeholder="Producto"><br>
        
                          <label for="año">Año de compra</label>
                               <input type="date" id="año"><br>
                          <label for="edad">Edad del equipo</label>
                               <input type="number" id="edad" placeholder="Ingrese la edad del equipo"><br>
                          <label for="prioridad">Prioridad de cambio</label>
                    <select name="" id="prioridad">
                        <option disabled="disabled" selected>Seleccione la prioridad :</option>
                        <option value="1">Alto</option>
                        <option value="2">Medio</option>
                        <option value="3">Bajo</option>
                    </select><br>
                          <label>Estado equipo</label><br>
                          <label for="optimo">Optimo</label>
                               <input type="radio" id="optimo" name="estado"><br>
                          <label for="fallando">Fallando</label>
                               <input type="radio" id="fallando" name="estado"><br>
                      <hr>
                    <textarea name="" id="" cols="30" rows="10" placeholder="Observaciones"></textarea><br>
                    <button type="submit">Registrar equipo</button>
               
                        </div>
                        
                     </div>            
                 </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-success">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>  
      
    <!-- jQuery, Popper.js, Bootstrap JS -->

    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="popper/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
      
    <!-- datatables JS -->
    <script type="text/javascript" src="datatables/datatables.min.js"></script>    
     
    <script type="text/javascript" src="main.js"></script>  
    
    
  </body>
</html>
