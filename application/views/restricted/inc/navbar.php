    
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo site_url('home'); ?>">Project name</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="<?php echo menu_segment_style('home'); ?>"><a href="<?php echo site_url('home'); ?>">Home</a></li>
                    <li class="<?php echo menu_segment_style('about'); ?>"><a href="<?php echo site_url('about'); ?>">About</a></li>
                </ul>

                <!-- login form -->
                <ul class="nav navbar-nav navbar-right">
                    <li class="<?php echo menu_segment_style('account'); ?>"><a href="<?php echo site_url('account'); ?>">Account</a></li>
                    <li class="<?php echo menu_segment_style('logout'); ?>"><a href="<?php echo site_url('login/logout'); ?>">Logout</a></li>
                </ul>
                <!-- /login form -->

            </div><!--/.nav-collapse -->
        </div>
    </nav>