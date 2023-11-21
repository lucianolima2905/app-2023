<?php
//POSTAGENS #############################################
$sql_blog    = "SELECT * FROM posts ORDER BY id DESC"; ##
$query_blog  =  mysqli_query($conn, $sql_blog);        ##
$num_posts       = mysqli_num_rows($query_blog);       ##
#########################################################

//USER ##################################################
$sql_user    = "SELECT * FROM user";                   ##
$query_user  =  mysqli_query($conn, $sql_user);        ##
$user        = mysqli_fetch_assoc($query_user);        ##
#########################################################

//SIDEBAR #################################################
$sidebar = mysqli_query($conn, "SELECT * FROM sidebar"); ##
$side    = mysqli_fetch_assoc($sidebar);                 ##
###########################################################

//CONFIGURAÇÕES ############################################
$sql_confi    = "SELECT * FROM configura";                ##
$query_confi  =  mysqli_query($conn, $sql_confi);         ##
$confi        = mysqli_fetch_assoc($query_confi);         ##
############################################################

//COMENTÁRIOS 0 ###################################################################
$sql_coment_0    = "SELECT * FROM comentarios WHERE situ='0' ORDER BY id DESC";  ##
$query_coment_0  =  mysqli_query($conn, $sql_coment_0);                          ##
$num_coment_0    = mysqli_num_rows($query_coment_0);                             ##
###################################################################################

//COMENTÁRIOS 1 ###################################################################
$sql_coment_1    = "SELECT * FROM comentarios WHERE situ='1' ORDER BY id DESC";  ##
$query_coment_1  =  mysqli_query($conn, $sql_coment_1);                          ##
$num_coment_1    = mysqli_num_rows($query_coment_1);                             ##
###################################################################################


//COMENTÁRIOS 0 + COMENTÁRIOS 1 ###################################################
$num_coment = $num_coment_0+$num_coment_1;                                       ##
###################################################################################

//CONTATO       ###################################################################
$sql_contato    = "SELECT * FROM contato ORDER BY id DESC";                      ##
$query_contato  =  mysqli_query($conn, $sql_contato);                            ##
$num_contato    = mysqli_num_rows($query_contato);                               ##
###################################################################################
