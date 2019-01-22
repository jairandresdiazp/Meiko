<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta content="IE=edge" http-equiv="X-UA-Compatible">
      <meta content="initial-scale=1.0, width=device-width" name="viewport">
      <title>Meriko</title>
      <link href="favicon.ico" rel="icon" type="image/x-icon" />
      <!-- css -->
      <link href="css/base.min.css" rel="stylesheet">
      <!-- favicon -->
      <!-- ... -->
      <!-- ie -->
      <!--[if lt IE 9]>
      <script src="js/html5shiv.js" type="text/javascript"></script>
      <script src="js/respond.js" type="text/javascript"></script>
      <![endif]-->
   </head>
   <body class="avoid-fout">
      <div class="avoid-fout-indicator avoid-fout-indicator-fixed">
         <div class="progress-circular progress-circular-alt progress-circular-center">
            <div class="progress-circular-wrapper">
               <div class="progress-circular-inner">
                  <div class="progress-circular-left">
                     <div class="progress-circular-spinner"></div>
                  </div>
                  <div class="progress-circular-gap"></div>
                  <div class="progress-circular-right">
                     <div class="progress-circular-spinner"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <header class="header">
         <ul class="nav nav-list pull-left">
            <li>
               <a class="menu-toggle" href="#menu">
               <span class="access-hide">Menu</span>
               <span class="icon icon-menu icon-lg"></span>
               <span class="header-close icon icon-close icon-lg"></span>
               </a>
            </li>
         </ul>
         <a class="header-logo" href="index">Meiko</a>
         <ul class="nav nav-list pull-right">
            <li>
               <a class="menu-toggle" href="#profile">
               <span class="access-hide">User Name</span>
               <span class="avatar avatar-sm"><img src="images/users/avatar-001.jpg"></span>
               <span class="header-close icon icon-close icon-lg"></span>
               </a>
            </li>
         </ul>
      </header>
      <nav class="menu" id="menu">
         <?php include_once("menu.php"); ?>
      </nav>
      <nav class="menu menu-right" id="profile">
         <?php include_once("profile.php"); ?>
      </nav>
      <div class="content">
         <div class="content-heading">
            <div class="container">
               <h1 class="heading">Proyecto de prueba grupo meiko</h1>
            </div>
         </div>
         <div class="tile-wrap">
            <div class="tile">
               <div class="tile-inner">
                  acceda a la opciones del menu
               </div>
            </div>
         </div>
      </div>
      <footer class="footer">
         <?php include_once("footer.php"); ?>
      </footer>
      <script src="js/base.min.js" type="text/javascript"></script>
      <script>
         $(function(){
              $("#form-register").submit(function(){
                  $.ajax({
             			   type: "POST",
             			   url: "controlador/usuario/acciones?accion=1",
             			   data: $(this).serialize(),
             			   success: function(data)
             			   {
             				   if(data.success)
             				   {	
             						window.location="page-login";
             				   }
             				   else
             				   {
             					   $('#mensaje-register').show(30);
             				   }
             			   }
             			});
                 return false;
              });
             });    
      </script>
   </body>
</html>