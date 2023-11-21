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

            //REMOÇÃO DO COMENTÁRIO
          if(isset($_GET['sucess_del'])){
            echo "<div id='sucess_del' class='alert alert-success'>Comentário Removido Com Sucesso!</div>
            <script>
            setTimeout(function() {
             	$('#sucess_del').fadeOut('fast');}, 5000);
            </script>";
          }
          if(isset($_GET['erro_del'])){
            echo "<div id='erro_del' class='alert alert-danger'>Ocorreu um erro ao remover comentário!</div>
            <script>
            setTimeout(function() {
              $('#erro_del').fadeOut('fast');}, 5000);
            </script>";
          }

          //APROVAÇÃO DO COMENTÁRIO
          if(isset($_GET['sucess_ap'])){
            echo "<div id='sucess_ap' class='alert alert-success'>Comentário Aprovado Com Sucesso!</div>
            <script>
            setTimeout(function() {
              $('#sucess_ap').fadeOut('fast');}, 5000);
            </script>";
          }
          if(isset($_GET['erro_ap'])){
            echo "<div id='erro_ap' class='alert alert-danger'>Ocorreu um erro ao aprovar comentário!</div>
            <script>
            setTimeout(function() {
              $('#erro_ap').fadeOut('fast');}, 5000);
            </script>";
          }
          ?>
    </div>
  </div><!--/.row-->

  <div class="row">
    <div class="col-md-6">
      <div class="panel panel-default articles">
        <div class="panel-heading">
          Comentários Pendentes
          <ul class="pull-right panel-settings panel-button-tab-right">
        </ul>
        <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
        <div class="panel-body articles-container">

          <?php if($num_coment_0 >0){
            while($coment_0 = mysqli_fetch_assoc($query_coment_0)){
              $sql_0 = "SELECT titulo FROM posts WHERE id='".$coment_0['id_post']."'";
              $query_0 = mysqli_query($conn,$sql_0);
              $post_0 = mysqli_fetch_assoc($query_0);
              ?>
              <div class="article border-bottom">
                <div class="col-xs-12">
                  <div class="row">
                    <div class="col-xs-2 col-md-2 date">
                      <div class="large"><img style="width:50px;" alt="image" class="img-circle" src="<?php echo $coment_0['img'];?>">
                      </div>
                    </div>
                    <div class="col-xs-10 col-md-10">
                      <h4><?php echo $coment_0['nome'];?></h4>
                      <p><?php echo $coment_0['coment'];?></p>
                      <h6>(<?php echo $post_0['titulo'];?>)</h6>
                      <a href="sql/sql_aprova_coment.php?id=<?php echo $coment_0['id']; ?>" class="btn btn-xs btn-info">Aprovar</a>
                      <a href="sql/sql_del_coment.php?id=<?php echo $coment_0['id']; ?>" class="btn btn-xs btn-danger">Remover</a>
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
                      <h4>Nenhum Comentário para ser Aprovado!</h4>
                    </div>
                  </div>
                </div>
                <div class="clear"></div>
              </div><!--End .article-->

            <?php } ?>


          </div>
        </div><!--End .articles-->
      </div>

      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            Comentários Aprovados
            <ul class="pull-right panel-settings panel-button-tab-right">
          </ul>
          <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
          <div class="panel-body articles-container">


            <?php if($num_coment_1 >0){
              while($coment_1 = mysqli_fetch_assoc($query_coment_1)){
                $sql_1 = "SELECT titulo FROM posts WHERE id='".$coment_1['id_post']."'";
                $query_1 = mysqli_query($conn,$sql_1);
                $post_1 = mysqli_fetch_assoc($query_1);
                ?>
                <div class="article border-bottom">
                  <div class="col-xs-12">
                    <div class="row">
                      <div class="col-xs-2 col-md-2 date">
                        <div class="large"><img style="width:50px;" alt="image" class="img-circle" src="<?php echo $coment_1['img'];?>">
                        </div>
                      </div>
                      <div class="col-xs-10 col-md-10">
                        <h4><?php echo $coment_1['nome'];?></h4>
                        <p><?php echo $coment_1['coment'];?></p>
                        <h6>(<?php echo $post_1['titulo'];?>)</h6>
                        <a href="sql/sql_del_coment.php?id=<?php echo $coment_1['id']; ?>" class="btn btn-xs btn-danger">Remover</a>
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
                        <h4>Nenhum Comentário Aprovado!</h4>
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
