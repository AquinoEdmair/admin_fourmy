<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">


        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="{{URL::to('usuarios')}}"><i class='fa fa-user'></i> <span>Usuarios</span></a></li>
            <li><a href="{{URL::to('servicios')}}"><i class='fa fa-truck'></i> <span>Servicios</span></a></li>
            <li><a href="{{URL::to('proveedores')}}"><i class='fa fa-user'></i> <span>Proveedores</span></a></li>
            <li><a href="{{URL::to('clientes')}}"><i class='fa fa-user'></i> <span>Clientes</span></a></li>
            <li><a href="{{URL::to('empresas')}}"><i class='fa fa-building'></i> <span>Empresas</span></a></li>
            <li><a href="{{URL::to('servicioscontratados')}}"><i class='fa fa-truck'></i> <span>Servicios Contratados</span></a></li>

            <li><a href="{{URL::to('logout')}}"><i class='fa fa-close'></i> <span>Cerrar Sesión</span></a></li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
