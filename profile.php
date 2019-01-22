<?php
   include_once("modelo/seguridad.class.php");
   $seguridad = new Seguridad();
?>
<div class="menu-scroll">
   <div class="menu-wrap">
      <div class="menu-top">
         <div class="menu-top-info">
            <a class="menu-top-user" href="./"><span class="avatar pull-left"><img src="images/users/avatar-001.jpg"></span>User Name</a>
         </div>
      </div>
      <div class="menu-content">
         <ul class="nav">
            <li>
               <a href="./"><span class="icon icon-account-box"></span>Configuracion</a>
            </li>
         </ul>
      </div>
   </div>
</div>
<?php ?>