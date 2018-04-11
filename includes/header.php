<header>
        


        <nav class="navbar navbar-default ">
            <div class="topHeaderRow">
            <div class="container">
                <div class="pull-right">
                    <ul class="list-inline">
                        <?php if(isset($_SESSION['UserID'])){ ?> <li><a href="/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li><?php } else { ?>
                        <li><a href="/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li><?php } ?>
                        <li><a href="/profile.php"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
                        <li><a href="/favorites.php"><span class="glyphicon glyphicon-star"></span> Favorites</a></li>
                         <li><a href="/print-services.php"><span class="glyphicon glyphicon-star"></span> Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end topHeaderRow -->
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                       
                    </button>
                    <a class="navbar-brand" href="index.php" id="share"> Share Your <i class="material-icons">airplanemode_active</i>ravels</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-left">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="aboutus.php">About</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Browse <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="browse-countries.php">Countries</a></li>
                                <li><a href="browse-cities.php">Cities</a></li>
                                <li><a href="browse-images.php">Images</a></li>
                                <li><a href="browse-users.php">Users</a></li>
                                <li><a href="browse-posts.php">Posts</a></li>
                                <li><a href = "print-services.php">Print JSON</a></li>
                                <li><a href = "pedroTest.php">try</a></li>

                            </ul>
                        </li>
                    </ul>


                    <form class="navbar-form navbar-right" role="search" action ="browse-images.php?" method="get">
                        <div class="form-group">
                            <input name="search" type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="buttn"><i class="fa fa-search"></i></button>
                        
                    </form>
                </div>
                <!-- /.navbar-collapse -->


            </div>
            <!-- /.container-fluid -->
        </nav>
    </header>