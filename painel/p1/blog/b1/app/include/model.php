<?php
//SIDEBAR #################################################
$sidebar = mysqli_query($conn, "SELECT * FROM sidebar"); ##
$side = mysqli_fetch_assoc($sidebar);                    ##
###########################################################

//POSTS SIDEBAR ###################################################################
$sidebar_p = mysqli_query($conn, "SELECT * FROM posts ORDER BY id ASC LIMIT 2"); ##
###################################################################################

//CONFIG SITE   ###################################################
$confi_site = mysqli_query($conn, "SELECT * FROM configura");    ##
$site       = mysqli_fetch_assoc($confi_site);                   ##
##################################################################
?>
