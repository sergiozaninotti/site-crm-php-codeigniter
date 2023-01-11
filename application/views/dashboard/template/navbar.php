<div class="wrapper">
      <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
        <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
        <div class="logo">
          <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            <!--<img class="w-50" src="<?= base_url("assets/dashboard/img/stechz-logo.png") ;?>" alt="">-->
          </a>
        </div>
        <div class="sidebar-wrapper">
          <ul class="nav">
            <li class="nav-item active" id="dashboard-link">
              <a class="nav-link" href="<?= base_url('dashboard'); ?>">
                <i class="material-icons">dashboard</i>
                <p>Dashboard</p>
              </a>
            </li> 
            <li class="nav-item" id="customizar-link">
              <a class="nav-link" href="<?= base_url('dashboard/customizar');?>">
                <i class="material-icons">brush</i>
                <p>Customizar</p>
              </a>
            </li>
            <li class="nav-item" id="configuracoes-link">
              <a class="nav-link" href="<?= base_url('dashboard/configuracoes');?>">
                <i class="material-icons">settings</i>
                <p>Configurações</p>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="main-panel">
        
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-white navbar-absolute fixed-top ">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" href=""></a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end">
                    <ul class="navbar-nav">
                      <li><?= $name; ?></li>
                      <li class="d-none"><input id="user_id" name="user_id" value="<?= $user_id; ?>" hidden></li>
                        <!-- <li class="nav-item">
                  <a class="nav-link" href="#pablo">
                    <i class="material-icons">dashboard</i>
                    <p class="d-lg-none d-md-block">
                      Stats
                    </p>
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">notifications</i>
                    <span class="notification">5</span>
                    <p class="d-lg-none d-md-block">
                      Some Actions
                    </p>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Mike John responded to your email</a>
                    <a class="dropdown-item" href="#">You have 5 new tasks</a>
                    <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                    <a class="dropdown-item" href="#">Another Notification</a>
                    <a class="dropdown-item" href="#">Another One</a>
                  </div>
                </li> -->
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">person</i>
                                <p class="d-lg-none d-md-block">
                                    Account
                                </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                <a class="dropdown-item">Perfil</a>
                                <a class="dropdown-item" href="#">Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url('dashboard/logout'); ?>">Sair</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->