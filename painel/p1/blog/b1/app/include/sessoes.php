<?php


if(!isset($_SESSION['USUARIOS_ONLINE']))
{
   $_SESSION['USUARIOS_ONLINE'] = 1;
}
else
{
   $_SESSION['USUARIOS_ONLINE'] += 1;
}
?>
