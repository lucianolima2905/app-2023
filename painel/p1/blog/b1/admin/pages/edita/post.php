<?php
if(isset($_GET['id'])){
  if (is_numeric($_GET['id'])){
    $id      = $_GET['id'];
    $sql     = "SELECT * FROM posts WHERE id='$id'";
    $query   = mysqli_query($conn, $sql);
    $retorno = mysqli_fetch_assoc($query);
    if($retorno == 0){ ?>
      <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
          <ol class="breadcrumb">
            <li><a href="#">
              <em class="fa fa-home"></em>
            </a></li>
            <li>Editar post</li>
            <li class="active">Post Não encontrado</li>
          </ol>
        </div><!--/.row-->

        <div class="row">
          <div class="col-lg-12">
            <div class="alert alert-info" >Este Post não foi encontrado para edição, pode ter sido removido</div>
          </div>
        </div>


      </div><!--/.main-->
    <?php }else{
      ?>
      <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
          <ol class="breadcrumb">
            <li><a href="#">
              <em class="fa fa-home"></em>
            </a></li>
            <li><a href="?link=3">Blog</a></li>
            <li><a href="?link=3&amp;select">Editar post</a></li>
            <li class="active"><?php echo $retorno['titulo'];?></li>
          </ol>
        </div><!--/.row-->

        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">Editar Postagem</h1>
          </div>
        </div><!--/.row-->


        <div class="row">
          <div class="col-lg-12">
            <form action="sql/sql_up_post.php" method="post" enctype="multipart/form-data">
              <input type="hidden" value="<?php echo $retorno['id'];?>" name="id">
              <input type="hidden" value="<?php echo $retorno['data'];?>" name="data">
              <input type="hidden" value="<?php echo $retorno['hora'];?>" name="hora">
              <div class="form-group">
                <label>Titulo do Post</label>
                <input name="titulo" value="<?php echo $retorno['titulo'];?>" type="text" class="form-control">
              </div>
              <div class="form-group">
                <label>Descrição</label>
                <input value="<?php echo $retorno['descricao'];?>" name="desc" type="text" class="form-control">
              </div>
              <div class="form-group">
                <label>Conteúdo</label>
                <textarea id="content" name="content" rows="20" class="form-control"><?php echo $retorno['conteudo'];?></textarea>
              </div>
              <div class="form-group col-lg-3">
                <img style="width:200px;" src="../app/img-post/<?php echo $retorno['img'];?>">
              </div>
              <div class="form-group col-lg-9">
                <label>Imagem</label>
                <input name="img" type="file" class="form-control">
              </div>
              <div class="form-group col-lg-12">
                <label>Autor</label>
                <input value="<?php echo $retorno['autor'];?>" name="autor" type="text" class="form-control">
              </div>
              <div class="form-group col-lg-12">
                <button type="submit" class="btn btn-primary">Salvar</button>
              </div>
            </form>
            <br /><hr>
          </div>
        </div><!--/.row-->
      </div><!--/.main-->
    <?php    }
  }else{
    //Caso o Usuário tentou acessar apágina com URL maliciosa (SQLInjection)
    echo "<meta http-equiv='refresh' content='0; url=index.php?link=3&select'>";
  }
}else{
  //Caso o Usuário tentou acessar apágina sem ter clicado em algum post para ediçao redireciona para os Posts
  echo "<meta http-equiv='refresh' content='0; url=index.php?link=3&select'>";
}?>
