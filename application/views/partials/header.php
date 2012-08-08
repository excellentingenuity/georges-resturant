<!DOCTYPE HTML><!--TODO: Do all php processing in before displaying any other page elements to prevent header elements from displaying in the body-->
<html lang="en">
    <head>
        <meta name="viewport" content="user-scalable=no, width=device-width" />
        <meta charset="UTF-8" />
        <!--fav icon -->
        <link rel="icon" type="image/png" href="<?php print(base_url()); ?>img/logo.png" />
        
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" media="all" href="<?php print(base_url()); ?>/css/bootstrap.css" /> 
        <link rel="stylesheet" type="text/css" media="all" href="<?php print(base_url()); ?>/css/bootstrap-responsive.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php print(base_url()); ?>/css/base.css" />
        
        
        
        <!-- js -->
        <script type="text/javascript" src="<?php print(base_url()); ?>/js/jquery-1.7.2.js"></script>
        <script type="text/javascript" src="<?php print(base_url()); ?>/js/bootstrap.js"></script>
        <script type="text/javascript" src="<?php print(base_url()); ?>/js/sizer.js"></script>
        
        <script type="text/javascript" src="<?php print(base_url()); ?>/js/bootstrap-popover.js"></script>
        <script type="text/javascript" src="<?php print(base_url()); ?>/js/bootstrap-tooltip.js"></script>
        <script type="text/javascript" src="<?php print(base_url()); ?>/js/bootstrapx-clickover.js"></script>
        <script type="text/javascript" src="<?php print(base_url()); ?>/js/bootstrap-tab.js"></script>
        <script type="text/javascript" src="<?php print(base_url()); ?>/js/bootstrap-modal.js"></script>
        <script type="text/javascript" src="<?php print(base_url()); ?>/js/interface.js"></script>
        
        
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

           </div>
           
        </header>
        