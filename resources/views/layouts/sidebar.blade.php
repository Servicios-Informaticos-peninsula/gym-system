<div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <div class="d-flex justify-content-between">
            <div class="logo">
                <a href="#"><img src="{{ asset('img/logo.jpeg') }}" alt="Logo"></a>
            </div>
            <div class="toggler">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>

            <li class="sidebar-item active">
                <a href="{{ route('sales.point') }}" class="sidebar-link" style="background:#F25D50;">
                    <i class="bi bi-cart-check"></i>
                    <span>Venta</span>
                </a>
            </li>

            {{-- <li class="sidebar-item  has-sub">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-collection-fill"></i>
                        <span>Extra Components</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="extra-component-avatar.html">Avatar</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="extra-component-sweetalert.html">Sweet Alert</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="extra-component-toastify.html">Toastify</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="extra-component-rating.html">Rating</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="extra-component-divider.html">Divider</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Layouts</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="layout-default.html">Default Layout</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="layout-vertical-1-column.html">1 Column</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="layout-vertical-navbar.html">Vertical with Navbar</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="layout-horizontal.html">Horizontal Menu</a>
                        </li>
                    </ul>
                </li> --}}

            {{-- <li class="sidebar-title">Forms &amp; Tables</li> --}}

            {{-- <li class="sidebar-item  has-sub">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-hexagon-fill"></i>
                        <span>Form Elements</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="form-element-input.html">Input</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="form-element-input-group.html">Input Group</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="form-element-select.html">Select</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="form-element-radio.html">Radio</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="form-element-checkbox.html">Checkbox</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="form-element-textarea.html">Textarea</a>
                        </li>
                    </ul>
                </li> --}}

            <li class="sidebar-item">
                <a href="{{ route('home') }}" class="sidebar-link">
                    <i class="bi bi-speedometer"></i>
                    <span>Panel</span>
                </a>
            </li>
            <li class="sidebar-item  ">
                <a href="{{route('corte.caja')}}" class="sidebar-link">
                    <i class="bi bi-cash"></i>
                    <span>Corte Caja</span>
                </a>
            </li>

            <li class="sidebar-item  has-sub">
                <a href="#" class="sidebar-link">
                    <i class="bi bi-bar-chart"></i>
                    <span>Estadisticas</span>
                </a>
                <ul class="submenu" style="display: none;">
                    <li >
                        <a href="{{ route('bestSellers.index') }}" class="sidebar-link">
                            <i class="bi bi-bar-chart-fill"></i>
                            <span>Productos mas vendidos</span>
                        </a>
                    </li>
                    <li >
                        <a href="{{ route('bestSellers.index') }}" class="sidebar-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"/>
                                <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>
                                <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"/>
                                <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/>
                              </svg>
                            <span>Membresias mas vendidas</span>
                        </a>
                    </li>
                    <li >
                        <a href="{{ route('bestSellers.index') }}" class="sidebar-link">
                            <i class="bi bi-bar-chart-fill"></i>
                            <span>Mayores ventas</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item  has-sub">
                <a href="#" class="sidebar-link">
                    <i class="bi bi-credit-card-fill"></i>
                    <span>Membres&iacute;as</span>
                </a>

                <ul class="submenu" style="display: none;">
                    <li >
                        <a href="{{ route('Membership.index') }}" class="sidebar-link">
                            <i class="bi bi-grid-fill"></i>
                            <span>Ver Membres&iacute;as</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('Membership-type.index') }}" class="sidebar-link">
                            <i class="bi bi-tag-fill"></i>
                            <span>Tipo Membresias</span>
                        </a>
                    </li>
                </ul>
            </li>



            {{-- <li class="sidebar-item  ">
                <a href="{{ route('Membership.index') }}" class="sidebar-link">
                    <i class="bi bi-credit-card-fill"></i>
                    <span>Membresias</span>
                </a>
            </li> --}}

            {{-- <li class="sidebar-item  has-sub">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-pen-fill"></i>
                        <span>Productos</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="form-editor-quill.html">Proveedores</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="form-editor-ckeditor.html">Productos</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="form-editor-summernote.html">Summernote</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="form-editor-tinymce.html">TinyMCE</a>
                        </li>
                    </ul>
                </li> --}}



            <li class="sidebar-item  has-sub">
                <a href="#" class="sidebar-link">
                    <i class="bi bi-card-list"></i>
                    <span>Productos</span>
                </a>

                <ul class="submenu" style="display: none;">
                    <li class="submenu-item">

                        <a href="{{ route('products.index') }}" class="sidebar-link"> <i class="bi bi-list-ul"></i>
                            <span>Ver Productos</span></a>

                    </li>

                    <li class="submenu-item">
                        <a href="{{ route('product-categories.index') }}"><i class="bi bi-bookmark-check"></i>
                            <span>Categorías</span></a>
                    </li>

                    <li class="submenu-item">
                        <a href="{{ route('product-units.index') }}">
                            <i class="bi bi-cup-fill"></i>
                            <span>Unidades de Medida</span></a>
                    </li>
                    <li class="submenu-item">
                        <a href="{{ route('provider.index') }}" class="sidebar-link">
                            <i class="bi bi-people-fill"></i>
                            <span>Proveedores</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a href="{{ route('inventory.index') }}" class="sidebar-link">
                    <i class="bi bi-shop"></i>
                    <span>Inventario</span>
                </a>
            </li>
            <li class="sidebar-item  has-sub">
                <a href="#" class="sidebar-link">
                    <i class="bi bi-card-list"></i>
                    <span>Productos</span>
                </a>

                <ul class="submenu" style="display: none;">
                    <li class="submenu-item">

                        <a href="{{ route('products.index') }}" class="sidebar-link"> <i class="bi bi-list-ul"></i>
                            <span>Ver Productos</span></a>

                    </li>

                    <li class="submenu-item">
                        <a href="{{ route('product-categories.index') }}"><i class="bi bi-bookmark-check"></i>
                            <span>Categorías</span></a>
                    </li>

                    <li class="submenu-item">
                        <a href="{{ route('product-units.index') }}">
                            <i class="bi bi-cup-fill"></i>
                            <span>Unidades de Medida</span></a>
                    </li>
                    <li class="submenu-item">
                        <a href="{{ route('provider.index') }}" class="sidebar-link">
                            <i class="bi bi-people-fill"></i>
                            <span>Proveedores</span>
                        </a>
                    </li>
                </ul>
            </li>

            {{-- <li class="sidebar-title">Extra UI</li> --}}

            {{-- <li class="sidebar-item  has-sub">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-pentagon-fill"></i>
                        <span>Widgets</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="ui-widgets-chatbox.html">Chatbox</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="ui-widgets-pricing.html">Pricing</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="ui-widgets-todolist.html">To-do List</a>
                        </li>
                    </ul>
                </li> --}}

            {{-- <li class="sidebar-item  has-sub">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-egg-fill"></i>
                        <span>Icons</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="ui-icons-bootstrap-icons.html">Bootstrap Icons </a>
                        </li>
                        <li class="submenu-item ">
                            <a href="ui-icons-fontawesome.html">Fontawesome</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="ui-icons-dripicons.html">Dripicons</a>
                        </li>
                    </ul>
                </li> --}}

            {{-- <li class="sidebar-item  has-sub">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-bar-chart-fill"></i>
                        <span>Charts</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="ui-chart-chartjs.html">ChartJS</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="ui-chart-apexcharts.html">Apexcharts</a>
                        </li>
                    </ul>
                </li> --}}

            {{-- <li class="sidebar-item  has-sub">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-map-fill"></i>
                        <span>Maps</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="ui-map-google-map.html">Google Map</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="ui-map-jsvectormap.html">JS Vector Map</a>
                        </li>
                    </ul>
                </li> --}}

            {{-- <li class="sidebar-title">Pages</li> --}}



            <li class="sidebar-item  ">
                <a href="{{ route('user.index') }}" class="sidebar-link">
                    <i class="bi bi-person-badge-fill"></i>
                    <span>Clientes</span>
                </a>
            </li>
            <li class="sidebar-item  ">
                <a href="{{ route('workers.index') }}" class="sidebar-link">
                    <i class="bi bi-person-bounding-box"></i>
                    <span>Empleados</span>
                </a>
            </li>
            <li class="sidebar-item  ">
                <a href="{{ route('record.index') }}" class="sidebar-link">
                    <i class="bi bi-list-check"></i>
                    <span>Expedientes</span>
                </a>
            </li>
            <li class="sidebar-item  has-sub">
                <a href="#" class="sidebar-link">
                    <i class="bi bi-filter-square-fill"></i>
                    <span>Bitacoras</span>
                </a>

                <ul class="submenu" style="display: none;">
                    <li class="submenu-item">

                        <a href="{{route('bitacora.cancelacion')}}" class="sidebar-link"> <i class="bi bi-list-ul"></i>
                            <span>Bitacora de accesos</span></a>

                    </li>

                    <li class="submenu-item">
                        <a href="{{route('bitacora.cancelacion')}}"><i class="bi bi-list-ul"></i>
                            <span>Bitacora de cancelacion</span></a>
                    </li>
                    <li class="submenu-item">
                        <a href="{{route('bitacora.ventas')}}"><i class="bi bi-graph-up-arrow"></i>
                            <span>Bitacora Ventas</span></a>
                    </li>


                </ul>
            </li>

            {{-- <li class="sidebar-item  has-sub">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-person-badge-fill"></i>
                        <span>Authentication</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="auth-login.html">Login</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="auth-register.html">Register</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="auth-forgot-password.html">Forgot Password</a>
                        </li>
                    </ul>
                </li> --}}

            {{-- <li class="sidebar-item  has-sub">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-x-octagon-fill"></i>
                        <span>Errors</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="error-403.html">403</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="error-404.html">404</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="error-500.html">500</a>
                        </li>
                    </ul>
                </li> --}}
            {{-- <li class="sidebar-title">Raise Support</li> --}}



            {{-- <li class="sidebar-item  ">
                    <a href="https://github.com/zuramai/mazer/blob/main/CONTRIBUTING.md" class="sidebar-link">
                        <i class="bi bi-puzzle"></i>
                        <span>Contribute</span>
                    </a>
                </li> --}}

            {{-- <li class="sidebar-item  ">
                    <a href="https://github.com/zuramai/mazer#donate" class="sidebar-link">
                        <i class="bi bi-cash"></i>
                        <span>Donate</span>
                    </a>
                </li> --}}

        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
