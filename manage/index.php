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
              <div>P</div>
              <h5><?php echo $UserName['nombre']; ?></h5>
            </div>
          </div>
          <div class="sidebar-content">
            <nav class="menu open-current-submenu">
              <ul>
                <li class="menu-header" style="padding-top: 20px"><span> EXTRA </span></li>
                <li class="menu-item">
                  <a href="#">
                    <span class="menu-icon">
                      <i class="ri-book-2-fill"></i>
                    </span>
                    <span class="menu-title">Dashboard</span>
                  </a>
                </li>
                <li class="menu-header"><span> GENERAL </span></li>
                <li class="menu-item sub-menu">
                  <a href="#">
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
                  <a href="#">
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
                          <span class="menu-title">View Categories3</span>
                        </a>
                      </li>
                    </ul>
                  </div>
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
            <h1 style="margin-bottom: 0">Pro Sidebar</h1>
            <span style="display: inline-block">
              Responsive layout with advanced sidebar menu built with SCSS and vanilla Javascript
            </span>
            <br />
            <span>
              Full Code and documentation available on
              <a href="https://github.com/azouaoui-med/pro-sidebar-template" target="_blank"
                >Github</a
              >
            </span>
            <div style="margin-top: 10px">
              <a href="https://github.com/azouaoui-med/pro-sidebar-template" target="_blank">
                <img
                  alt="GitHub stars"
                  src="https://img.shields.io/github/stars/azouaoui-med/pro-sidebar-template?style=social"
                />
              </a>
              <a href="https://github.com/azouaoui-med/pro-sidebar-template" target="_blank">
                <img
                  alt="GitHub forks"
                  src="https://img.shields.io/github/forks/azouaoui-med/pro-sidebar-template?style=social"
                />
              </a>
            </div>
          </div>
          <div>
            <h2>Features</h2>
            <ul>
              <li>Fully responsive</li>
              <li>Collapsable sidebar</li>
              <li>Multi level menu</li>
              <li>RTL support</li>
              <li>Customizable</li>
            </ul>
          </div>
          <div>
            <h2>Resources</h2>
            <ul>
              <li>
                <a target="_blank" href="https://github.com/azouaoui-med/css-pro-layout">
                  Css Pro Layout</a
                >
              </li>
              <li>
                <a target="_blank" href="https://github.com/popperjs/popper-core"> Popper Core</a>
              </li>
              <li>
                <a target="_blank" href="https://remixicon.com/"> Remix Icons</a>
              </li>
            </ul>
          </div>
          <footer class="footer">
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
          </footer>
        </main>
        <div class="overlay"></div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/sidebar.js"></script>  
</body>
</html>
