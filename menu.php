<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      <span class="brand-text font-weight-light">SERVIRENT</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
         <!-- <img src="dist/img/avatar.png" class="img-circle elevation-2" alt="User Image" style="width: 5.1rem  !important; border-radius: 14% !important;">-->
        </div>
        <div class="info">
          <a href="perfil.php" class="d-block"><?php echo $user ?></a>
          
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
           <?php
              if($tipoUsuario == 1){
           ?>
              <li class="nav-header">USUARIOS</li>
              <li class="nav-item">
                <a href="registroUsuario.php" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>Crear usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="listadoUsuario.php" class="nav-link">
                  <i class="nav-icon fas fa-list-ul"></i>
                  <p>
                    Listado de usuarios  
                  </p>
                </a>
              </li>

              <li class="nav-header">BODEGAS</li>
              <li class="nav-item">
                <a href="crearBodega.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                  <p>Crear Bodega</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="listadoBodega.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                  <p>Listado de Bodegas</p>
                </a>
              </li>

              <li class="nav-header">ARTICULO</li>
              <li class="nav-item">
                <a href="cargarArticulos.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                  <p>Crear articulo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="cargarRepuesto.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                  <p>Crear repuesto</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="listadoArticulos.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                  <p>Listado de articulo</p>
                </a>
              </li>

              <li class="nav-header">REGISTRO DE CONSTRUCTORAS</li>
              <li class="nav-item">
                <a href="crearConstructora.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                  <p>Crear constructora</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="listadoConstructora.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                  <p>Listado de constructora</p>
                </a>
              </li>

              <li class="nav-header">REGISTRO DE OBRAS</li>
              <li class="nav-item">
                <a href="crearObra.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                  <p>Crear obra</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="listadoObras.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                  <p>Listado de obra</p>
                </a>
              </li>

              <li class="nav-header">NOTA PEDIDO</li>
              <li class="nav-item">
                <a href="crearCotizacion.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                  <p>Crear nota</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="listadoNotas.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                  <p>Listado de nota</p>
                </a>
              </li>

              <li class="nav-header">DEVOLUCIONES</li>
              <li class="nav-item">
                <a href="crearDevolucion.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                  <p>Crear devolucion</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="listadoDevoluciones.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                  <p>Listado de devoluciones</p>
                </a>
              </li>

              <li class="nav-header">REPORTES</li>
              <li class="nav-item">
                <a href="codigosAsignados.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                  <p>Codigos asigandos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="articulosAlquilados.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                  <p>articulos alquilados</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="existenciaArticulo.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                  <p>Existencia articulo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="existenciaRepuesto.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                  <p>Existencia repuesto</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="historico.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                  <p>Historico articulo</p>
                </a>
              </li>
            
              <?php
              }
              ?>
            <?php
              if($tipoUsuario == 4){
            ?>
              <li class="nav-header">PEDIDO</li>
              <li class="nav-item">
                <a href="listadiPedidoChofer.php" class="nav-link">
                <i class="nav-icon fas fa-list"></i>
                  <p>Listado de pedido</p>
                </a> 
              </li>
              <li class="nav-header">Venta</li>
              <li class="nav-item">
                <a href="registrarVentas.php" class="nav-link">
                <i class="nav-icon fas fa-plus"></i>
                  <p>Registrar venta</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="listadoVentasChofer.php" class="nav-link">
                <i class="nav-icon fas fa-list"></i>
                  <p>Listado venta</p>
                </a>
              </li>
            <?php
              }
            ?>
            <?php
              if($tipoUsuario == 5){
            ?>
            <li class="nav-header">Devoluciones</li>
              <li class="nav-item">
                <a href="listadoDevolucionesTecnico.php" class="nav-link">
                <i class="nav-icon fas fa-list"></i>
                  <p>Listado de devoluciones</p>
                </a> 
              </li>
            <?php
              }
            ?>
            <?php
              if($tipoUsuario == 6){
            ?>
            <li class="nav-header">NOTA PEDIDO</li>
              <li class="nav-item">
                <a href="crearCotizacion.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                  <p>Crear nota</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="listadoNotas.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                  <p>Listado de nota</p>
                </a>
              </li>
            <?php
              }
            ?>
          <li class="nav-header">CERRAR SESION</li>
          <li class="nav-item">
            <a href="cerrarSesion.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p class="text">Salir</p>  
            </a>
          </li>
           
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>