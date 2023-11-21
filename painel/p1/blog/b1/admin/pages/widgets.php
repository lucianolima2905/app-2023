<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="#">
        <em class="fa fa-home"></em>
      </a></li>
      <li class="active">Sidebar</li>
    </ol>
  </div><!--/.row-->

  <div class="row">
    <div class="col-lg-12">
       <?php
            //REMOÇÃO DA MENSAGEM
          if(isset($_GET['sucess'])){
            echo "<div id='sucess' class='alert alert-success'>Alterado Com Sucesso!</div>
            <script>
            setTimeout(function() {
             	$('#sucess').fadeOut('fast');}, 5000);
            </script>";
          }
          if(isset($_GET['erro'])){
            echo "<div id='erro' class='alert alert-danger'>Ocorreu um erro ao alterar a SideBar!</div>
            <script>
            setTimeout(function() {
              $('#erro').fadeOut('fast');}, 5000);
            </script>";
          }
          ?>

    </div>
  </div><!--/.row-->

  <div class="row">
    <div class="col-md-6">
      <div class="panel panel-default articles">
        <div class="panel-heading">
          Sidebar 1 (Mural)
          <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
          <div class="panel-body articles-container">
            <div class="article border-bottom">
              <div class="col-xs-12">
                <div class="row">
                  <form action="sql/sql_mural.php" method="post">
                  <div class="form-group">
                    <label>Max: 250 caracteres</label>
                    <textarea rows="7" name="mural" placeholder="Max: 250 Caracteres" class="form-control"><?php echo $side['mural'];?></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
              </div>
            </div>
            <div class="clear"></div>
          </div><!--End .article-->
        </div>
      </div><!--End .articles-->

      <div class="panel panel-default ">
        <div class="panel-heading">
          Sidebar 3 (Postagens)
          <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
          <div class="panel-body">
            <div class="col-md-12 no-padding">
              <?php if($num_posts >0){
                while($post = mysqli_fetch_assoc($query_blog)){
                  ?>
                  <div class="article border-bottom">
                    <div class="col-xs-12">
                      <div class="row">
                        <div class="col-xs-2 col-md-2 date">
                          <div class="large"><img style="width:50px;" alt="imagem"  src="../app/img-post/<?php echo $post['img'];?>">
                          </div>
                        </div>
                        <div class="col-xs-10 col-md-10">
                          <h4><?php echo $post['titulo'];?></h4>
                          <p><?php echo substr($post['conteudo'],0, 100)."...";?></p>
                          <a href="?link=8&amp;id=<?php echo $post['id'];?>" class="btn btn-xs btn-info">Editar</a>
                          <a href="sql/sql_del_post.php?id=<?php echo $post['id']; ?>" class="btn btn-xs btn-danger">Remover</a>
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
                          <h4>Nenhum Post para entrar na sidebar!</h4>
                        </div>
                      </div>
                    </div>
                    <div class="clear"></div>
                  </div><!--End .article-->

                <?php } ?>

            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            Sidebar 2 (Adsense)
            <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
            <div class="panel-body">
              <form action="sql/sql_ads.php" method="post">
              <div class="form-group">
                <label>Width: 225px </label>
                <textarea rows="7" name="ads" placeholder="Coloque aqui o Código do seu Adsense e Salve" class="form-control"></textarea>
              </div>
              <button type="submit" class="btn btn-warning">Salvar</button>
            </form>
            </div>
          </div>

        </div><!--/.row-->
      </div>	<!--/.main-->
