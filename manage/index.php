<?php

  session_start();

  if (!isset($_SESSION['idUser'])) {
    header('Location: ../');
  }

  include '../db/peticiones/manage.php';

  $contacto = new Contacto();

  $UserName = $contacto->getUserName($_SESSION['idUser']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style_SideBar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css">
    <link rel="stylesheet" href="../css/style_fonts.css">
    <title>Manage - DEEP OCEAN</title>
</head>
<body>
<div class="layout has-sidebar fixed-sidebar fixed-header">
      <aside id="sidebar" class="sidebar break-point-sm has-bg-image">
        <a id="btn-collapse" class=""></a>
        <div class="image-wrapper">
          <img src="assets/images/sidebar-bg.jpg" alt="sidebar background" />
        </div>
        <div class="sidebar-layout">
          <div class="sidebar-header">
            <div class="pro-sidebar-logo">
              <div>DO</div>
              <h5><?php echo $UserName['nombre']; ?></h5>
            </div>
          </div>
          <div class="sidebar-content">
            <nav class="menu open-current-submenu">
              <ul>
                <li class="menu-header" style="padding-top: 20px"><span> GENERAL </span></li>
                <li class="menu-item">
                  <a href="#" class="dashboard-button">
                    <span class="menu-icon">
                      <i class="ri-book-2-fill"></i>
                    </span>
                    <span class="menu-title">Dashboard</span>
                  </a>
                </li>
                <li class="menu-header"><span> CONTENIDO </span></li>
                <li class="menu-item sub-menu">
                  <a href="#" class="posts-button">
                    <span class="menu-icon">
                      <i class="ri-bar-chart-2-fill"></i>
                    </span>
                    <span class="menu-title">Posts</span>
                  </a>
                  <div class="sub-menu-list">
                    <ul>
                      <li class="menu-item">
                        <a href="#">
                          <span class="menu-title">Add Post</span>
                        </a>
                      </li>
                      <li class="menu-item">
                        <a href="#">
                          <span class="menu-title">View Posts</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="menu-item sub-menu">
                  <a href="#" class="categories-button">
                    <span class="menu-icon">
                      <i class="ri-paint-brush-fill"></i>
                    </span>
                    <span class="menu-title">Categories</span>
                  </a>
                  <div class="sub-menu-list">
                    <ul>
                      <li class="menu-item">
                        <a href="#">
                          <span class="menu-title">Add Category</span>
                        </a>
                      </li>
                      <li class="menu-item">
                        <a href="#">
                          <span class="menu-title">View Categories</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="menu-header" style="padding-top: 20px"><span> EXTRA </span></li>
                <li class="menu-item">
                  <a href="../" class="exit-button">
                    <span class="menu-icon">
                      <i class="ri-book-2-fill"></i>
                    </span>
                    <span class="menu-title">EXIT</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
          <div class="sidebar-footer">
          </div>
        </div>
      </aside>
      <div id="overlay" class="overlay"></div>
      <div class="layout">
        <main class="content">
          <div>
            <a id="btn-toggle" href="#" class="sidebar-toggler break-point-sm">
              <i class="ri-menu-line ri-xl"></i>
            </a>
          </div>
          <div>
            <!-- code -->

            
          </div>
          <?php include '../views/footer.php'; ?>
          <!-- <footer class="footer">
            <small style="margin-bottom: 20px; display: inline-block">
              © 2023 made with
              <span style="color: red; font-size: 18px">&#10084;</span> by -
              <a target="_blank" href="https://azouaoui.netlify.com"> Mohamed Azouaoui </a>
            </small>
            <br />
            <div class="social-links">
              <a href="https://github.com/azouaoui-med" target="_blank">
                <i class="ri-github-fill ri-xl"></i>
              </a>
              <a href="https://twitter.com/azouaoui_med" target="_blank">
                <i class="ri-twitter-fill ri-xl"></i>
              </a>
              <a href="https://codepen.io/azouaoui-med" target="_blank">
                <i class="ri-codepen-fill ri-xl"></i>
              </a>
              <a href="https://www.linkedin.com/in/mohamed-azouaoui/" target="_blank">
                <i class="ri-linkedin-box-fill ri-xl"></i>
              </a>
            </div>
          </footer> -->
        </main>
        <div class="overlay"></div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/sidebar.js"></script>  
</body>
</html>
