<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #005691 !important;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link" style="border-bottom: 1px solid #ffffff !important;">
      <span class="brand-text font-weight-light">SERVIGAS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="border-bottom: 1px solid #ffffff !important;">
        <div class="image">
          <img src="dist/img/logo.jpg" class="img-circle elevation-2" alt="User Image" style="width: 5.1rem  !important; border-radius: 14% !important;">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $user ?></a>
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

              <li class="nav-header">CILINDRO</li>
              <li class="nav-item">
                <a href="crearCilindros.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                  <p>Crear cilindros</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="listadoCilindros.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                  <p>Listado de cilindros</p>
                </a>
              </li>

              <li class="nav-header">BODEGAS</li>
              <li class="nav-item">
                <a href="crearBodega.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                  <p>Crear bodega principal</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="crearBodegaSecundaria.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                  <p>Crear bodega secundaria</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="listadoBodegas.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                  <p>Listar bodegas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="transferirInvetario.php" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>Transferir inventario</p>
                </a>
              </li>
            
              <li class="nav-header">PEDIDO</li>
              <li class="nav-item">
                <a href="tomarPedido.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                  <p>Tomar pedido</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="listadoPedido.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                  <p>Listado de pedido</p>
                </a>
              </li>
              <li class="nav-header">CUPONES</li>
              <li class="nav-item">
                <a href="crearCupon.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                  <p>Crear cupon</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="listadoCupones.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                  <p>Listado de cupones</p>
                </a>
              </li>
              <li class="nav-header">CAJA CHICA</li>
              <li class="nav-item">
                <a href="registrarGasto.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                  <p>Ingresar gasto</p>
                </a>
              </li>
              <li class="nav-header">DEVOLUCIONES</li>
              <li class="nav-item">
                <a href="salida.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                  <p>Salidas de choferes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="listarDevoluciones.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                  <p>Listado devoluciones</p>
                </a>
              </li>
              <li class="nav-header">REPORTE</li>
              <li class="nav-item">
                <a href="reporteEstatus.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                  <p>Por estatus</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="Gasto.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                  <p>Gastos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="reporteGanancias.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                  <p>Ganancias</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="reporteVentas.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                  <p>Ventas</p>
                </a>
              </li>
            <?php
              }
            ?>
            <?php
              if($tipoUsuario == 3){
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