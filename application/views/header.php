<!DOCTYPE HTML><!--TODO: Do all php processing in before displaying any other page elements to prevent header elements from displaying in the body-->
<html lang="en">
    <head>
        <meta name="viewport" content="user-scalable=no, width=device-width" />
        
        <!--fav icon -->
        <link rel="icon" type="image/png" href="img/logo.png" />
        
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" media="all" href="css/bootstrap.css" /> 
        <link rel="stylesheet" type="text/css" media="all" href="css/bootstrap-responsive.css" />
        <link rel="stylesheet" type="text/css" media="all" href="css/base.css" />
        
        
        
        <!-- js -->
        <script type="text/javascript" src="js/jquery-1.7.2.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/sizer.js"></script>
        
        
        <title><?php print($Name);?> | <?php print($Page);?></title>
    </head>
    <body>
        <!--TODO:place page header here-->
        <header class="container-fluid">
           <div class="row-fluid">
               <div class="navbar">
                   <div class="navbar-inner">
                      <div class="container-fluid">
                          <a class="brand" href="<?php print(base_url()); ?>"><?php print($Name);?></a> 
                          <!-- TODO: add nav menu generation code here -->
                          <a class="brand pull-right" href="<?php print(base_url() . "login/logout");?>">Logout</a>
                      </div> 
                   </div>
               </div>
               <?php if ($Page != 'Home'){
                   print('<div class="breadcrumb">');
                   print(anchor(base_url(), 'Home', 'title="Home"') . ' / ' . $Page);
                   print('</div>');
            //print('<div class="breadcrumb"><a href="' . base_url().'>Home</a>&nbsp;/&nbsp;' . $Page . '</div>'); 
            } ?>
           </div>
           
        </header>
        