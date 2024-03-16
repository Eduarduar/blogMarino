<?php

    $pagina_actual = basename($_SERVER['PHP_SELF']);
    $currentDir = dirname($_SERVER['PHP_SELF']);

?>

<div class="layout has-sidebar fixed-sidebar fixed-header">
    <aside id="sidebar" class="sidebar break-point-sm has-bg-image">
        <a id="btn-collapse" class="sidebar-collapser"><i class="ri-arrow-left-s-line"></i></a>
        <div class="image-wrapper">
            <img src="" alt="sidebar background" />
        </div>
        <div class="sidebar-layout">
            <div class="sidebar-header">
                <div class="pro-sidebar-logo">
                    <div><?php echo strtoupper(substr($UserName['nombre'], 0, 1)); ?></div>
                    <h5><?php echo $UserName['nombre']; ?></h5>
                </div>
            </div>
            <div class="sidebar-content">
                <nav class="menu open-current-submenu">
                    <ul>
                        <li class="menu-header" style="padding-top: 20px"><span> GENERAL </span></li>
                        <li class="menu-item dashboard-button <?php if ($pagina_actual == 'index.php'){ echo 'active';} ?>">
                            <a href="<?php echo $currentDir; ?>/" class="">
                                <span class="menu-icon">
                                    <i class="ri-bar-chart-fill"></i>
                                </span>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>
                        <li class="menu-header"><span> CONTENT </span></li>
                        <li class="menu-item sub-menu post-button-container <?php if ($pagina_actual == 'addPost.php' OR $pagina_actual == 'viewPosts.php'){ echo 'open';} ?>">
                            <a href="#" class="posts-button <?php if ($pagina_actual == 'addPost.php' OR $pagina_actual == 'viewPosts.php'){ echo 'active';} ?>">
                                <span class="menu-icon">
                                    <i class="ri-article-line"></i>
                                </span>
                                <span class="menu-title">Posts</span>
                            </a>
                            <div class="sub-menu-list">
                                <ul>
                                    <li class="menu-item <?php if ($pagina_actual == 'addPost.php'){ echo 'active';} ?>">
                                        <a href="<?php echo $currentDir; ?>/addPost" class="">
                                            <span class="menu-title">Add Post</span>
                                        </a>
                                    </li>
                                    <li class="menu-item <?php if ($pagina_actual == 'viewPosts.php'){ echo 'active';} ?>">
                                        <a href="<?php echo $currentDir; ?>/viewPosts" class="">
                                            <span class="menu-title">View Posts</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="menu-item">
                            <a href="./categories" class="categories-button <?php if ($pagina_actual == 'categories.php'){ echo 'active';} ?>">
                                <span class="menu-icon">
                                    <i class="ri-list-check"></i>
                                </span>
                                <span class="menu-title">Categories</span>
                            </a>
                        </li>
                        <li class="menu-header" style="padding-top: 20px"><span> EXTRA </span></li>
                        <li class="menu-item">
                            <a href="./settings" class="edit-button <?php if ($pagina_actual == 'settings.php'){ echo 'active';} ?>">
                                <span class="menu-icon">
                                    <i class="ri-settings-line"></i>
                                </span>
                                <span class="menu-title">Settings</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="../" class="exit-button">
                                <span class="menu-icon">
                                    <i class="ri-logout-box-line"></i>
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
    <div class="layout scrollbar-custom bg-gray-100">
        <main class="content padding-0-movile">
            <div>
                <a id="btn-toggle" href="#" class="sidebar-toggler break-point-sm">
                    <i class="ri-menu-line ri-xl"></i>
                </a>
            </div>
            <div>