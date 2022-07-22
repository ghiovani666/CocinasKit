  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index" class="brand-link">
          <img src="/template_admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Dashboard</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="/template_admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">{{ Auth::user()->tipo_user == 1 ? "Administrador" : "Usuario"  }}</a>
              </div>
          </div>
          @if(Auth::user()->tipo_user == 1)
          <!-- Sidebar Admin -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p> Home<i class="fas fa-angle-left right"></i> </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="admin_home_slider" class="nav-link">
                                  <i class="nav-icon far fa-circle text-warning"></i>
                                  <p>Slider & Footer</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p> Mantenimiento<i class="fas fa-angle-left right"></i> </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="mueble_puertas" class="nav-link">
                                  <i class="nav-icon far fa-circle text-warning"></i>
                                  <p>Modelo puerta</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="mueble_colores" class="nav-link">
                                  <i class="nav-icon far fa-circle text-warning"></i>
                                  <p>Color modelo puerta</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="mueble_costado" class="nav-link">
                                  <i class="nav-icon far fa-circle text-danger"></i>
                                  <p>Color costado</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="mueble_regleta" class="nav-link">
                                  <i class="nav-icon far fa-circle text-danger"></i>
                                  <p>Color regleta</p>
                              </a>
                          </li>

                          <li class="nav-item">
                              <a href="mueble_tirador" class="nav-link">
                                  <i class="nav-icon far fa-circle text-warning"></i>
                                  <p>Tiradores</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="mueble_unero" class="nav-link">
                                  <i class="nav-icon far fa-circle text-warning"></i>
                                  <p>Uñeros</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="mueble_enzimera" class="nav-link">
                                  <i class="nav-icon far fa-circle text-warning"></i>
                                  <p>Enzimeras</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="mueble_copete" class="nav-link">
                                  <i class="nav-icon far fa-circle text-warning"></i>
                                  <p>Copete</p>
                              </a>
                          </li>
                      </ul>
                  </li>


                  <li class="nav-item">
                      <a href="composicion_oferta" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p>Composición Oferta<i class="fas fa-podcast right"></i> </p>
                      </a>
                  </li>


                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p> Muebles Completos<i class="fas fa-angle-left right"></i> </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="mueble_completo" class="nav-link">
                                  <i class="nav-icon far fa-circle text-danger"></i>
                                  <p>Muebles Completo</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="elemento_decorativo" class="nav-link">
                                  <i class="nav-icon far fa-circle text-warning"></i>
                                  <p>Elemento Decorativo</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item">
                      <a href="accesorios" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p>Accesorios<i class="fas fa-podcast right"></i> </p>
                      </a>
                  </li>

                  <!-- <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p>Servicios<i class="fas fa-podcast right"></i> </p>
                      </a>
                  </li> -->

                  <li class="nav-item">
                      <a href="descuento_usuario" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p>Oferta Usuarios<i class="fas fa-podcast right"></i> </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="galeria" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p>Galería<i class="fas fa-podcast right"></i> </p>
                      </a>
                  </li>


              </ul>
          </nav>
          @else
          <!-- Sidebar Usuario -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p> Home<i class="fas fa-angle-left right"></i> </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="nav-icon far fa-circle text-warning"></i>
                                  <p>Reservas</p>
                              </a>
                          </li>
                      </ul>
                  </li>
              </ul>
          </nav>
          @endif
      </div>

  </aside>