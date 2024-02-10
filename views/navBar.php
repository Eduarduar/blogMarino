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
                <a class="navbar-brand page-scroll" href="#page-top">Marine Blog</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden active">
                        <a href="#page-top"></a>
                    </li>
                    <li class="">
                        <a class="page-scroll" href="#home">Home</a>
                    </li>
                    <li class="">
                        <a class="page-scroll" href="#multimedia">Blog</a>
                    </li>
                    <li class="">
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li class="">
                        <a class="page-scroll" href="#developers">Developers</a>
                    </li>
                    <?php
                    
                        if (isset($_SESSION['idUser'])) {
                            echo '<li class="manage-container">
                                    <a class="page-scroll manage" href="#">Manage</a>
                                </li>
                                <li class="log-out-container">
                                    <a class="page-scroll log-out" href="./db/logout.php">Logout</a>
                                </li>';
                        } else {
                            echo '<li class="log-in-container">
                                    <a class="page-scroll log-in" href="./login">Login</a>
                                </li>';
                        }

                    ?>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>