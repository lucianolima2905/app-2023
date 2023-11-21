<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="#">
        <em class="fa fa-home"></em>
      </a></li>
      <li><a href="?link=3">Blog</a></li>
      <li class="active">Nova Postagem</li>
    </ol>
  </div><!--/.row-->

  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Adicionar uma Nova Postagem</h1>
    </div>
  </div><!--/.row-->


  <div class="row">
    <div class="col-lg-12">
      <form action="sql/sql_cad_post.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label>Titulo do Post</label>
          <input name="titulo" type="text" class="form-control" required >
        </div>
        <div class="form-group">
          <label>Descrição</label>
          <input name="desc" type="text" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Conteúdo</label>
          <textarea id="content" name="content" rows="20" class="form-control" required ></textarea>
        </div>
        <div class="form-group">
          <label>Imagem</label>
          <input name="img" type="file" class="form-control" required >
        </div>
        <div class="form-group">
          <label>Autor</label>
          <input name="autor" type="text" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Postar</button>
      </form>
      <br /><hr>
    </div>
  </div><!--/.row-->
</div><!--/.main-->
