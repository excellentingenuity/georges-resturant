<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta name="viewport" content="user-scalable=no, width=device-width" />
        
        <!--fav icon -->
        <link rel="icon" type="image/png" href="img/logo.png" />
        
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" media="all" href="css/bootstrap.css" /> 
        <link rel="stylesheet" type="text/css" media="all" href="css/bootstrap-responsive.css" />
        <link rel="stylesheet" type="text/css" media="all" href="css/login.css" />
        
        
        
        <!-- js -->
        <script type="text/javascript" src="js/jquery-1.7.2.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/sizer.js"></script>

        <title>Georges Bistro | Login</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span4">&nbsp;</div>
                <div class="span4 outer-form">
                    <h1>Login</h1>
                    <?php echo form_open('login'); ?>
                    <div class="login-form">
                        <?php 
                        echo form_label('Username:', 'username');
                        echo form_input('username', set_value('username'), 'id="username"');
                        echo form_label('Password:', 'password');
                        echo form_password('password', '', 'id="password"');
                        echo("<br />");
                        echo form_submit('submit', 'Login', 'class="btn btn-large login-btn"');
                        echo form_close();
                        ?>
                    </div>
                    <div class="errors"><?php echo validation_errors(); ?></div>
                </div>
                <div class="span4">&nbsp;</div>
            </div>
        </div>
    </body>
    
    
</html>
