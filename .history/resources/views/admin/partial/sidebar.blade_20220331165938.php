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
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Slider & Footer</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="admin_home_bienvenidos" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Bienvenidos</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="admin_nuestra_actividad" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Nuestras Actividades</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="admin_nuestro_estudio" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Nuestros Estudios</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="admin_ventajas" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Ventajas</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item">
                      <a href="admin_quienes_somos" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p> Quienes Somos<i class="fas fa-podcast right"></i> </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="admin_quehacemos" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p> Que Hacemos<i class="fas fa-podcast right"></i> </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="admin_medicinacelular" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p> Medicina Celular<i class="fas fa-podcast right"></i> </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p>
                              La Alianza
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="admin_mathias_rath" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Dr. Mathias Rath</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="admin_sustancias_vitales" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Sustancias Vitales</p>
                              </a>
                          </li>

                          <li class="nav-item">
                              <a href="admin_productos_naturales" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Productos Naturales</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="admin_formacion" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Formaci??n</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="admin_grupo_barcelona" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Barcelona</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="admin_investigacion" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p> Inst. de Investigaci??n<i class="fas fa-podcast right"></i> </p>
                      </a>
                  </li>


                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p>
                              Publicaciones
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="admin_publicacion_internacional" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Dr. Rath Internacional</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="admin_saludnatural" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Folletos - Salud Natural</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="admin_informativos" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Boletines Informativos</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="admin_revistas" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Revistas</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="admin_productos_saludables" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Productos Saludables</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="admin_investigaciones" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Investigaciones</p>
                              </a>
                          </li>

                          <li class="nav-item">
                              <a href="admin_barletta" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Declaraci??n Barletta</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="admin_boletines" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Boletines</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item">
                      <a href="admin_actividad" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p> Actividades<i class="fas fa-podcast right"></i> </p>
                      </a>
                  </li>


                  <li class="nav-item">
                      <a href="admin_profesional" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p> Profesionales<i class="fas fa-podcast right"></i> </p>
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
                                  <i class="far fa-circle nav-icon"></i>
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