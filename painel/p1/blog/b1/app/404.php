<?php
require_once('app/include/contador-views.php');

?>
<div class="container">

  <?php require_once('app/include/nav.php');?>


  <div class="conteudo">
    <div class="posts imgExpande">
      <div class="info-404">
        <div class="text-404">
          <h2>Página Não encontrada! Verifique o Endereço digitado e tente novamente, se o erro persistir entre em contato com o desenvolvedor </h2>
          <span>404!</span>
          <p>Error</p>
        </div>
      </div>
    </div>
    <div class="sidebar">
      <div class="side-pesquisa" >
        <div class="sidebar-titulo-pes" >
          <span> Pesquisar</span>
        </div>
        <form class="form-search" action="" method="POST" >
          <input name="pesquisa" placeholder="Pesquisar por..." type="text">
          <button class="btn-search" type="submit" ><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>

      </div>
      <div class="side-content" >
        <div class="sidebar-titulo" >
          <span>Mural</span>
        </div>
        <p><?php echo $side['mural'];?></p>
      </div>
      <div class="side-content" >
        <div class="sidebar-titulo" >
          <span> Anúncio</span>
        </div>
        <?php echo $side['ads'];?>
      </div>
      <div class="side-content" >
        <div class="sidebar-titulo" >
          <span> Postagens</span>
        </div>
        <?php while($post_side = mysqli_fetch_assoc($sidebar_p)){

          $slug_side = strtolower($post_side['titulo']);
          $slugc_side = preg_replace("[^a-zA-Z0-9_]", "-", strtr($slug_side, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", "aaaaeeiooouucAAAAEEIOOOUUC_"));

          $slug_final_side = slug($slugc_side);
          $id_side = $post_side['id'];
          ?>
          <br />
          <p><a href="http://<?php echo $dominio;?>/post/<?php echo $slug_final_side.'/'.$id_side.'/';?>"><?php echo $post_side['titulo'];?></a></p><br />
          <hr>

        <?php }?>
      </div>
    </div>
  </div>
  <div class="footer" >
    <footer>
      <span> &copy; Todos os Direitos Reservados </span>
    </footer>
    <div class="social" >
      <a target="_blank" href="<?php echo $site['face_site']; ?>" ><i class="fa fa-facebook fa-lg" ></i></a>
      <a target="_blank" href="<?php echo $site['twitter_site']; ?>" ><i class="fa fa-twitter fa-lg"  ></i></a>
      <a target="_blank" href="<?php echo $site['yt_site']; ?>" ><i class="fa fa-youtube fa-lg"  ></i></a>
    </div>
  </div>
</div>
