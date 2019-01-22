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
               <h1 class="heading">Documentos</h1>
            </div>
         </div>
         <div class="content-inner">
            <div class="container">
               
            </div>
            <div id="card-result" class="container">
            </div>
         </div>
      </div>
      <footer class="footer">
         <?php include_once( "footer.php"); ?>
      </footer>
      <div aria-hidden="true" class="modal fade" id="modal-ver-documento" role="dialog" tabindex="-1">
         <div class="modal-dialog modal-full">
            <div id="iframedocumentos" class="modal-content">
            </div>
         </div>
      </div>
      <div aria-hidden="true" class="modal fade" id="modal-puntear-documento" role="dialog" tabindex="-1">
         <div class="modal-dialog modal-xs">
            <div class="modal-content">
               <div class="modal-heading">
                  <a class="modal-close" data-dismiss="modal">&times;</a>
                  <h2 class="modal-title">Puntear Documento</h2>
               </div>
               <form class="form" name="form-puntear-documents" id="form-puntear-documents" method="POST" autocomplete="off">
                  <div class="modal-inner">
                     <div class="form-group form-group-label form-group-green">
                        <div class="row">
                           <div class="col-lg-12 col-md-12 col-sm-12">
                              <label class="floating-label" for="puntear-document-puntos">Puntos</label>
                              <input class="form-control" id="puntear-document-puntos" name="puntear-document-puntos" placeholder="5" type="number" max="5" min="1" required>
                              <span class="form-help form-help-msg text-alt">Valores entre 1-5<i class="form-help-icon icon icon-error"></i></span>
                              <input class="form-control" id="puntear-document-id" name="puntear-document-id" type="hidden">
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <p class="text-right">
                        <button class="btn btn-flat btn-alt" data-dismiss="modal" type="submit" onclick="punteardocumento()" >OK</button>
                     </p>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <script src="js/base.min.js" type="text/javascript"></script>
      <script>
         $(document).ready(function() {
             $.ajax({
                     type: "POST",
                     url: "controlador/documento/acciones.php?accion=2",
                     success: function(data) {
                         if (data.success) {
                             $('#card-result').html(data.data).fadeIn();
                         } else {
                             $('#card-result').html("").fadeIn();
                         }
                     }
                 });
         });
         
         function borrar(document) {
             var formData = {
                 'get-document-id': document
             };
             $.ajax({
                 type: "POST",
                 url: "controlador/documento/acciones.php?accion=3",
                 data: formData,
                 success: function(data) {
                     if (data.success) {
                         $.ajax({
                             type: "POST",
                             url: "controlador/documento/acciones.php?accion=2&",
                             success: function(data) {
                                 if (data.success) {
                                     $('#card-result').html(data.data).fadeIn();
                                 } else {
                                     $('#card-result').html("").fadeIn();
                                 }
                             }
                         });
                     }
                 }
             });
         };
         function puntear(document) {
             $('#puntear-document-id').val(document);
         };
         function punteardocumento() {
             $.ajax({
                 type: "POST",
                 url: "controlador/documento/acciones.php?accion=4",
                 data: $("#form-puntear-documents").serialize()
             });
         };
      </script>
   </body>
</html>