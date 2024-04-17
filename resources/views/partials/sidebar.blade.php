<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="../../index.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Dashboard v1</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../../index2.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Dashboard v2</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../../index3.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Dashboard v3</p>
            </a>
          </li>
        </ul>
        <li class="nav-header">DATA MASTER</li>
        <li class="nav-item {{ Request::is('data-buku') ? 'active' : '' }}">
            <a href="/data-buku" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
               Data Buku
              </p>
            </a>
        </li>
        <li class="nav-item {{ Request::is('data-buku') ? 'active' : '' }}">
          <a href="/data-anggota" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
             Data Anggota
            </p>
          </a>
      </li>
        <li class="nav-header">SIRKULASI</li>
        <li class="nav-item">
          <a href="/data-peminjaman" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
             Data Peminjaman
            </p>
          </a>
      </li>
      <li class="nav-item {{ Request::is('data-buku') ? 'active' : '' }}">
        <a href="/data-anggota" class="nav-link">
          <i class="nav-icon fas fa-user"></i>
          <p>
           Data Pengembalian
          </p>
        </a>
    </li>
      </li>
    </ul>
</nav>
