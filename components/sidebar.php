  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
          <span class="brand-text font-weight-light">Covid-19 Health Declaration</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item">
                      <a href="index.php" class="nav-link">
                          <i class="nav-icon fas fa-columns"></i>
                          <p>
                              Dashboard
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="covid_hd.php" class="nav-link">
                          <i class="nav-icon fas fa-virus"></i>
                          <p>
                              Covid-19
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="group-g.php" class="nav-link">
                          <i class="nav-icon fas fa-user-friends"></i>
                          <p>Group G Members</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="user-manual.php" class="nav-link">
                          <i class="nav-icon fas fa-file"></i>
                          <p>User Manual</p>
                      </a>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>

  <div class="content-wrapper" style="min-height: 1604.8px;">

      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1><?php echo $head ?></h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                          <li class="breadcrumb-item active"><?php echo $bread ?></li>
                      </ol>
                  </div>
              </div>
          </div>
      </section>