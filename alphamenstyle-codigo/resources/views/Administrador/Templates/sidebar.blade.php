<!-- partial:../../partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="{{ route('admin.usuarios.index') }}" class="nav-link">
                <div class="nav-profile-image">
                    <img src="{{ asset('admin/assets/images/faces/face1.jpg') }}" alt="profile">
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">Alpha</span>
                    <span class="text-secondary text-small">Administrador</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.galerias.index') }}">
                <span class="menu-title">Galeria</span>
                <i class="mdi mdi-folder-multiple-image menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.tipolooks.index') }}">
                <span class="menu-title">Tipo de Looks</span>
                <i class="mdi mdi-tshirt-v menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.estaturas.index') }}">
                <span class="menu-title">Estaturas</span>
                <i class="mdi mdi-human-male menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.edades.index') }}">
                <span class="menu-title">Edades</span>
                <i class="mdi mdi-signal menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.siluetas.index') }}">
                <span class="menu-title">Siluetas</span>
                <i class="mdi mdi-human-child menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.estilos.index') }}">
                <span class="menu-title">Estilos</span>
                <i class="mdi mdi-animation menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.usuarios.index') }}">
                <span class="menu-title">Usuarios - Clientes</span>
                <i class="mdi mdi-account menu-icon"></i>
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.looks.index') }}">
                <span class="menu-title">Looks</span>
                <i class="mdi mdi-folder-multiple-image menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.looks-ocultos.index') }}">
                <span class="menu-title">Looks Ocultos</span>
                <i class="mdi mdi-folder-multiple-image menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.guardarropas.index') }}">
                <span class="menu-title">Guardarropas</span>
                <i class="mdi mdi-folder-multiple-image menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#resultados" aria-expanded="false"
                aria-controls="resultados">
                <span class="menu-title">Resultados</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-medical-bag menu-icon"></i>
            </a>
            <div class="collapse" id="resultados">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.resultado-look.index') }}">
                            Resultado Looks </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.resultado-guardarropas.index') }}">
                            Resultado Guardarropas </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" aria-expanded="false"
                aria-controls="general-pages">
                <span class="menu-title">Configuración</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-medical-bag menu-icon"></i>
            </a>
            <div class="collapse" id="general-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.usuarios-alpha.index') }}">
                            Administrador Alpha</a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
<!-- partial -->
