<header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <a href="../../index2.html" class="navbar-brand"><b><?php echo $_SESSION['projectname']; ?></b> Verification Portal</a>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
              <!--<ul class="nav navbar-nav">
                <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                <li><a href="#">Link</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                    <li class="divider"></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </li>
              </ul>-->
              <form class="navbar-form navbar-left" action="https://www.google.com/search" target="_new" method="get" >
                <div class="form-group">
                  <input type="text" class="form-control" id="navbar-search-input" name="q" placeholder="Google Search">
                </div>
              </form>
            </div><!-- /.navbar-collapse -->
            <!-- Navbar Right Menu -->
              <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                  <!-- Messages: style can be found in dropdown.less-->
                                   <!-- User Account Menu -->
                  <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <!-- The user image in the navbar-->
                      <img src="img/default.jpg" class="user-image" alt="User Image">
                      <!-- hidden-xs hides the username on small devices so only the image appears. -->
                      <span class="hidden-xs"><?php echo $_SESSION['userfname']." ".$_SESSION['userlname']; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                      <!-- The user image in the menu -->
                      <li class="user-header">
                        <img src="img/default.jpg" class="img-circle" alt="User Image">
                        <p>
                          <?php echo $_SESSION['userfname']." ".$_SESSION['userlname']; ?>
                       
                        </p>
                      </li>
                      <!-- Menu Body -->
                         <li class="user-body">
                                        <div class="row">
                                            <div class="col-md-6 pull-left">
                                                Balance
                                                <label id="lblPromotionalBalance"><?php echo $_SESSION['user_balance']; ?></label>
                                            </div>
                                            <div class="col-md-6 pull-right" style="none;">
                                                Total Sent
                                                <label id="lblTransactionalBalance"><?php echo $_SESSION['user_total']; ?></label>

                                            </div>
                                        </div>

                                    </li>
                      <!-- Menu Footer-->
                      <li class="user-footer">
                        
                        <div class="pull-right">
                          <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                        </div>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div><!-- /.navbar-custom-menu -->
          </div><!-- /.container-fluid -->
        </nav>
      </header>