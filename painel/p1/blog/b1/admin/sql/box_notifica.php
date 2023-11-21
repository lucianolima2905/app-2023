<?php

//Inclui a conexão com o servidor
include_once('../../app/conexao/conexao.php');


//NOTIFICAÇÕES #############################################
$sql_noti    = "SELECT * FROM notifica ORDER BY id DESC"; ##
$query_noti  =  mysqli_query($conn, $sql_noti);           ##
$num_noti    = mysqli_num_rows($query_noti);              ##
############################################################

if($num_noti >0){
     while($not = mysqli_fetch_assoc($query_noti)){

?>
<li>
  <div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
    <img style="width:30px;" alt="image" class="img-circle" src="http://2.gravatar.com/avatar/<?php echo md5($not['email']);?>&d=mm&r=g">
    </a>
    <div class="message-body">
      <a href="<?php if($not['tipo'] == "0"){echo "?link=9&not=".$not['id'];}else{echo "?link=5&not=".$not['id'];}?>"><?php echo $not['nome'];?></strong> <?php if($not['tipo'] == "0"){echo ", enviou uma <b>menssagem.</b>";}else{echo ", <b>comentou</b> em uma postagem.";}?></a>
    <br />
  </div>
  </div>
</li>
<li class="divider"></li>
<?php }

  }else{ ?>

    <li>
      <div class="dropdown-messages-box">
        <div class="message-body">
           <span>Você Não tem Novas Notificações</span>
        </div>
      </div>
    </li>

<?php }
