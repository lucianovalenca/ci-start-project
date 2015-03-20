    
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
                    <li class="<?php echo menu_segment_style('signup'); ?>"><a href="<?php echo site_url('signup'); ?>">Signup</a></li>
                    <li class="<?php echo menu_segment_style('contact'); ?>"><a href="<?php echo site_url('contact'); ?>">Contact</a></li>
                </ul>

                <!-- login form -->
                <form action="<?php echo site_url('login'); ?>" method="POST" class="navbar-form navbar-right">
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success">Sign in</button>
                </form>
                <!-- /login form -->

            </div><!--/.nav-collapse -->
        </div>
    </nav>