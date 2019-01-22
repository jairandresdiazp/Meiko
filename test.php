<?php
   include_once("modelo/seguridad.class.php");
   $configuraBd = parse_ini_file('modelo/config.ini', true);
   $seguridad   = new Seguridad();
   
   echo 'driver: ' . $seguridad->Decrypt($configuraBd["conexion"]["driver"]) . '</br>';
   echo 'host: ' . $seguridad->Decrypt($configuraBd["conexion"]["host"]) . '</br>';
   echo 'username: ' . $seguridad->Decrypt($configuraBd["conexion"]["username"]) . '</br>';
   echo 'pass: ' . $seguridad->Decrypt($configuraBd["conexion"]["password"]) . '</br>';
   echo 'batabase: ' . $seguridad->Decrypt($configuraBd["conexion"]["database"]) . '</br>';
   echo 'port: ' . $seguridad->Decrypt($configuraBd["conexion"]["port"]) . '</br>';
   echo 'log: ' . $configuraBd["conexion"]["log"] . '</br>';
   echo '</br></br></br>';
   echo 'user: ' . $seguridad->Decrypt('aZ2CoRBkN92GUMZV2gLFAS/fQdd9pIe2v6y2svgu7ok=') . '</br>';
   echo 'pass: ' . $seguridad->Decrypt('aZ2CoRBkN92GUMZV2gLFAS/fQdd9pIe2v6y2svgu7ok=') . '</br>';
   echo '</br></br></br>';
   echo 'database cifrada: ' . $seguridad->Encrypt('meiko-jd') . '</br>';
?>