<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="?link=1">
        <em class="fa fa-home"></em>
      </a></li>
      <li class="active">Blog</li>
    </ol>
  </div><!--/.row-->

  <div class="row">
    <div class="col-lg-12">
      <?php
      if(isset($_GET['select'])){
        echo "
       <div id='select' class='alert alert-danger'>Escolha uma postagem para editar</div>
       <script>
       setTimeout(function() {
        	$('#select').fadeOut('fast');}, 5000);
       </script>
        ";
      }
      if(isset($_GET['sucess'])){
       echo "
      <div id='sucess' class='alert alert-success'>Post deletado com sucesso!</div>
      <script>
      setTimeout(function() {
         $('#sucess').fadeOut('fast');}, 5000);
      </script>
       ";
     }
     if(isset($_GET['del_erro'])){
      echo "
     <div id='del_erro' class='alert alert-danger'>Ocorreu algum erro ao deletar o post!</div>
     <script>
     setTimeout(function() {
        $('#del_erro').fadeOut('fast');}, 5000);
     </script>
      ";
    }

      ?>
      <h1 class="page-header">Postagens</h1>
      <a class="btn btn-sm btn-primary" href="?link=4"><i class="fa fa-plus" ></i> Nova Postagem</a>
    </div>
  </div><!--/.row-->
  <br />

  <div class="row">
    <?php if($query_blog == true){
        //Listagem dos postas caso encontre algum
         while($post = mysqli_fetch_assoc($query_blog)){
    ?>
    <div class="col-xs-18 col-sm-6 col-md-4">
      <div class="thumbnail">
        <img style="width: 300px;  height: 200px;" src="../app/img-post/<?php echo $post['img']?>" alt="">
        <div class="caption">
          <h4><?php echo substr($post['titulo'],0,25)." ...";?></h4>
           <p><?php echo substr($post['conteudo'],0,100)." ...";?></p>
           <p>
            <a href="?link=8&amp;id=<?php echo $post['id'];?>" class="btn btn-primary btn-xs" role="button"><i class="fa fa-pencil" ></i> Editar</a>
              <form action="sql/sql_del_post.php" method="post">
               <input name="id" type="hidden" value="<?php echo $post['id'];?>">
               <input name="img" type="hidden" value="<?php echo $post['img'];?>">
               <button type="submit" class="btn btn-danger btn-xs" role="button"><i class="fa fa-trash" ></i> Deletar</button>
             </form>
           </p>
        </div>
      </div>
    </div>
  <?php }
    }else{
      //Caso não encontre apresenta um alerta
      echo "
      <div class='row'>
         <div class='col-xs-18 col-sm-6 col-md-12'>
          <div class='alert alert-info'>Não há nenhum Post, ou algo saiu mal!
          </div>
         </div>
      <div>";
    }

     ?>

  </div><!-- /.row -->

</div><!--/.main-->
