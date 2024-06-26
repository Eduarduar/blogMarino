<?php
    $pagina_actual = basename($_SERVER['PHP_SELF']);
    $currentDir = dirname($_SERVER['PHP_SELF']);
?>
<!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top navbar-shrink">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">DEEP OCEAN</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden active">
                        <a href="#page-top"></a>
                    </li>
                    <li class=" <?php if ($pagina_actual == "index.php"){ echo'active'; } ?>">
                        <a class="page-scroll" href="<?php echo $currentDir; ?>/">Home</a>
                    </li>
                    <li class=" <?php if ($pagina_actual == "blog.php"){ echo'active'; } ?>">
                        <a class="page-scroll" href="<?php echo $currentDir; ?>/blog">Blog</a>
                    </li>
                    <li class=" <?php if ($pagina_actual == "about.php"){ echo'active'; } ?>">
                        <a class="page-scroll" href="<?php echo $currentDir; ?>/about">About</a>
                    </li>
                    <li class=" <?php if ($pagina_actual == "developers.php"){ echo'active'; } ?>">
                        <a class="page-scroll" href="<?php echo $currentDir; ?>/developers">Developers</a>
                    </li>
                    <li class=" <?php if ($pagina_actual == "contact.php"){ echo'active'; } ?>">
                        <a class="page-scroll" href="<?php echo $currentDir; ?>/contact">Contact</a>
                    </li>
                    <?php
                    
                        if (isset($_SESSION['idUser'])) {
                            echo '<li class="manage-container">
                                    <a class="page-scroll manage" href="' . $currentDir . '/manage/">Manage</a>
                                </li>
                                <li class="log-out-container">
                                    <a class="page-scroll log-out" href="' . $currentDir . '/db/logout">Logout</a>
                                </li>';
                        } else {
                            echo '<li class="log-in-container">
                                    <a class="page-scroll log-in" href="' . $currentDir . '/login">Login</a>
                                </li>';
                        }

                    ?>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>