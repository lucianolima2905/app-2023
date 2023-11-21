<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="#">
        <em class="fa fa-home"></em>
      </a></li>
      <li class="active"><a href="?link=3">Blog</a></li>
      <li class="active">Comentários</li>
    </ol>
  </div><!--/.row-->

  <div class="row">
    <div class="col-lg-12">
          <?php
          //REMOÇÃO DA NOTIFICAÇÃO
          if(isset($_GET['not'])){
            $del_not = mysqli_query($conn, "DELETE FROM notifica WHERE id='".$_GET['not']."'");
          }

            //REMOÇÃO DA MENSAGEM
          if(isset($_GET['sucess_del'])){
            echo "<div id='sucess_del' class='alert alert-success'>Mensagem Removida Com Sucesso!</div>
            <script>
            setTimeout(function() {
             	$('#sucess_del').fadeOut('fast');}, 5000);
            </script>";
          }
          if(isset($_GET['erro_del'])){
            echo "<div id='erro_del' class='alert alert-danger'>Ocorreu um erro ao remover a mensagem!</div>
            <script>
            setTimeout(function() {
              $('#erro_del').fadeOut('fast');}, 5000);
            </script>";
          }

          ?>
    </div>
  </div><!--/.row-->

      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            Mensagens
            <ul class="pull-right panel-settings panel-button-tab-right">
          </ul>
          <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
          <div class="panel-body articles-container">


            <?php if($num_contato >0){
              while($msg = mysqli_fetch_assoc($query_contato)){
                ?>
                <div class="article border-bottom">
                  <div class="col-xs-12">
                    <div class="row">
                      <div class="col-xs-2 col-md-2 date">
                        <div class="large"><img style="width:50px;" alt="image" class="img-circle" src="http://2.gravatar.com/avatar/<?php echo md5($msg['email']);?>&d=mm&r=g"></div>
                      </div>
                      <div class="col-xs-10 col-md-10">
                        <h4><?php echo $msg['nome'];?></h4>
                        <p><?php echo $msg['texto'];?></p>
                        <a href="sql/sql_del_msg.php?id=<?php echo $msg['id']; ?>" class="btn btn-xs btn-danger">Remover</a>
                        <a href="mailto:<?php echo $msg['email'];?>" class="btn btn-xs btn-warning">Responder</a>
                      </div>
                    </div>
                  </div>
                  <div class="clear"></div>
                </div><!--End .article-->
              <?php } }else{?>
                <div class="article border-bottom">
                  <div class="col-xs-12">
                    <div class="row">
                      <div class="col-xs-10 col-md-10">
                        <h4>Nenhuma Mensagem Aqui!</h4>
                      </div>
                    </div>
                  </div>
                  <div class="clear"></div>
                </div><!--End .article-->

              <?php }?>

            </div>
          </div>
        </div><!--/.row-->
      </div>	<!--/.main-->
