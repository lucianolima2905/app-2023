
<div class="container">

	<?php require_once('app/include/nav.php');?>

	<div class="conteudo">
		<div class="sobre">
			<div class="text-info-sobre" >
				<span>Sobre</span>
				<p><?php echo $site['sobre_site']; ?></p>
			</div>
		</div>
		<div class="sidebar">
			<div class="side-pesquisa" >
				<div class="sidebar-titulo-pes" >
					<span> Pesquisar</span>
				</div>
				<form class="form-search" action="home" method="POST" >
					<input name="busca" placeholder="Pesquisar por..." type="text">
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
