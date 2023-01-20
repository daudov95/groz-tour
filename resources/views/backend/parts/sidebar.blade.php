<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="brand-link">
      <img src="{{ asset("assets/admin/img/AdminLTELogo.png") }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Panel</span>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset("assets/admin/img/admin.svg") }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <span href="#" class="d-block" style="color: #c2c7d0;">{{ auth()->user()->name ?? 'Администратор' }}</span>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item {{ request()->routeIs('admin.main') ? 'menu-open' : '' }}">
            <a href="{{ route('admin.index') }}" class="nav-link {{ request()->routeIs('admin.main') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
            </a>
          </li>


{{--{{ explode('.', request()->route()->getName())[1] == 'section' ? 'menu-open' : '' }}--}}
          <li class="nav-item ">
            <a href="{{ route('admin.excursion.index') }}" class="nav-link ">
              <i class="nav-icon fas fa-hiking"></i>
              <p>
                Экскурсии
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.excursion.index') }}" class="nav-link">
                  <i class="far fas fa-list nav-icon"></i>
                  <p>Все экскурсии</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.excursion.create') }}" class="nav-link">
                  <i class="far fas fa-plus nav-icon"></i>
                  <p>Новая экскурсия</p>
                </a>
              </li>

            </ul>
          </li>

        <li class="nav-item ">
            <a href="{{ route('admin.transaction.index') }}" class="nav-link ">
                <i class="nav-icon fas fa-money-bill"></i>
                <p>
                    Транзакции
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.transaction.index') }}" class="nav-link">
                        <i class="far fas fa-list nav-icon"></i>
                        <p>Все транзакции</p>
                    </a>
                </li>

            </ul>
        </li>



        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

<script>
    const path = window.location.pathname;
    const linkActive = document.querySelector(`a[href$="${path}"]`)
    const navLinks = linkActive.closest('ul.nav');

    if(linkActive){
        linkActive.classList.add('active')
        linkActive.closest('.nav-pills > .nav-item').classList.add('menu-open')

        if(navLinks) {
            navLinks.previousElementSibling?.classList.add('active')
        }

    }
</script>
