<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="#">
        <em class="fa fa-home"></em>
      </a></li>
      <li class="active">Configurações</li>
    </ol>
  </div><!--/.row-->

  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Configurações</h1>
      <br />
      <?php
      if(isset($_GET['sucess'])){
       echo "
      <div id='sucess' class='alert alert-success'>Alterado com sucesso!</div>
      <script>
      setTimeout(function() {
         $('#sucess').fadeOut('fast');}, 5000);
      </script>
       ";
     }
     if(isset($_GET['del_erro'])){
      echo "
     <div id='del_erro' class='alert alert-danger'>Ocorreu algum erro ao alterar as configurações!</div>
     <script>
     setTimeout(function() {
        $('#del_erro').fadeOut('fast');}, 5000);
     </script>
      ";
    }

       ?>
    </div>
  </div><!--/.row-->

  <div class="row">
    <div class="col-md-12">
      <div>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#confi" aria-controls="home" role="tab" data-toggle="tab">Configurações</a></li>
          <li role="presentation"><a href="#sobre" aria-controls="profile" role="tab" data-toggle="tab">Sobre</a></li>
          <li role="presentation"><a href="#perfil" aria-controls="messages" role="tab" data-toggle="tab">Perfil</a></li>
        </ul>

        <!-- CONFIGURAÇÕES -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="confi">
            <form action="sql/sql_muda_confi.php" method="post">
                  <div class="form-group">
                    <input value="<?php echo $confi['titulo_site'];?>" name="titulo" placeholder="Titulo do Blog" class="form-control">
                  </div>
                  <div class="form-group">
                    <input value="<?php echo $confi['descricao_site'];?>" name="descricao" placeholder="Descrição do Blog" class="form-control">
                  </div>
                  <div class="form-group">
                    <input value="<?php echo $confi['tags_site'];?>" name="tags" placeholder="KeyWords do Blog (SEO)" class="form-control">
                  </div>
                  <div class="form-group">
                    <input name="dominio" value="<?php echo $confi['dominio'];?>" placeholder="Dominio"  class="form-control">
                  </div>
                  <div class="form-group">
                    <input value="<?php echo $confi['face_site'];?>" name="face" placeholder="Facebook (URL)" class="form-control">
                  </div>
                  <div class="form-group">
                    <input value="<?php echo $confi['twitter_site'];?>" name="twitter" placeholder="Twitter (URL)" class="form-control">
                  </div>
                  <div class="form-group">
                    <input value="<?php echo $confi['yt_site'];?>" name="yt" placeholder="YouTube (URL)" class="form-control">
                  </div>
                  <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
          </div>

          <!--SOBRE -->
          <div role="tabpanel" class="tab-pane" id="sobre">
            <form action="sql/sql_muda_sobre.php" method="post">
                  <div class="form-group">
                    <label>Diga Sobre o Blog</label>
                    <textarea rows="10" name="sobre" placeholder="Sobre" class="form-control"><?php echo $confi['sobre_site'];?></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
          </div>

            <!-- PERFIL USER -->
          <div role="tabpanel" class="tab-pane" id="perfil">
            <form action="sql/sql_muda_perfil.php" method="post">
                  <div class="form-group">
                    <input value="<?php echo $user['nome'];?>" name="nome" placeholder="Seu Nome" class="form-control">
                  </div>
                  <div class="form-group">
                    <input value="<?php echo $user['email'];?>" name="email" placeholder="Seu E-mail" class="form-control">
                  </div>
                  <div class="form-group">
                    <input value="<?php echo $user['user'];?>" name="user" placeholder="Usuario" class="form-control">
                  </div>
                  <div class="form-group">
                    <input name="senha" placeholder="Senha" class="form-control">
                  </div>
                  <button type="submit" class="btn btn-primary">Salvar</button>
            </form>

          </div>

        </div>
      </div><!--/.col-->
      <div class="col-s-12">
        <p class="back-link">Lumino Theme by <a href="https://www.medialoot.com">Medialoot</a></p>
      </div>
    </div><!--/.row-->
  </div>	<!--/.main-->
