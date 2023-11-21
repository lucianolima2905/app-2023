
<div class="container">

	<?php require_once('app/include/nav.php');?>

	<div class="conteudo">
		<div class="posts imgExpande">


			<?php

			if(isset($_GET['url'])){
				if($_GET['url'] == "home"){
					$pagina = 1;
				}else{
					$pagina = end($url);
				}


			}else{
				$pagina = 1;
			}

			//Selcionar todos os posts da tabela
			$result_posts= "SELECT * FROM posts";
			$resultado_posts = mysqli_query($conn, $result_posts);

			//Contar o total de posts
			$total_posts = mysqli_num_rows($resultado_posts);

			//Setar quantidade de posts por pagina
			$qnt_result_pg = 2;

			//Calcular o inicio da visualização
			$inicio = ($qnt_result_pg*$pagina)-$qnt_result_pg;





			//Selecionar as empresas a serem apresentado na página


			if(isset($_POST['busca'])){

				$busca = $_POST['busca'];

				//BUSCA DE POSTS COM O TITULO DIGITADO PELO USUARIO
				$result_posts = "SELECT * FROM posts WHERE titulo LIKE '%$busca%' ORDER BY id DESC";
				$resultado_posts = mysqli_query($conn, $result_posts);

				//SE NÃO ENCONTRAR POST NEHUM MOSTRA ESTA MENAGEM
				if(mysqli_num_rows($resultado_posts) <= 0){ ?>
					<div class="post">
						<div class="text-post">
							<div class="post-info">
							</div>
							<br /><br /><br /><br /><br />
							<center>
								<span style="font-family: cursive; color:#48D1CC; font-size: 25px;" >NENHUM POST ENCONTRADO COM ESTE NOME</span>
							</center>
						</div>
					</div>
				<?php }else{
					while ($row_posts = mysqli_fetch_assoc($resultado_posts)){
						$slug = strtolower($row_posts['titulo']);
						$slugc = preg_replace("[^a-zA-Z0-9_]", "-", strtr($slug, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", "aaaaeeiooouucAAAAEEIOOOUUC_"));

						$slug_final = slug($slugc);
						$id = $row_posts['id'];
						?>


						<div class="post">
							<a href="http://<?php echo $dominio;?>/post/<?php echo $slug_final.'/'.$id.'/';?>" ><img src="http://<?php echo $dominio;?>/app/img-post/<?php echo $row_posts['img'];?>" /></a><br />

							<div class="post-info">
								<span class="autor-post"><i class="fa fa-user" ></i> <?php echo $row_posts['autor'];?></span>
								<span class="hora-post"> <i class="fa fa-clock-o" ></i> <?php echo $row_posts['hora'];?></span>
								<span class="data-post"> <i class="fa fa-calendar" ></i> <?php echo $row_posts['data'];?></span>
								<span class="view-home"><i class="fa fa-eye" ></i> <?php echo $row_posts['views'];?></span>

							</div>
							<div class="text-post">
								<a href="http://<?php echo $dominio;?>/post/<?php echo $slug_final.'/'.$id.'/';?>" ><h2><?php echo $row_posts['titulo'];?></h2></a>
								<span>
									<?php echo mb_strimwidth($row_posts['conteudo'], 0, 200, '...')." <a href='http://$dominio/post/$slug_final/$id/'> Ler Mais</a>";?>
								</span>
							</div>
						</div>


						<?php
					}

				}


				//Se não exixtir Pots cai aqui
			}else{
				$result_posts = "SELECT * FROM posts ORDER BY id DESC LIMIT $inicio, $qnt_result_pg";
				$resultado_posts = mysqli_query($conn, $result_posts);

				while ($row_posts = mysqli_fetch_assoc($resultado_posts)){


					$slug = strtolower($row_posts['titulo']);
					$slugc = preg_replace("[^a-zA-Z0-9_]", "-", strtr($slug, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", "aaaaeeiooouucAAAAEEIOOOUUC_"));

					$slug_final = slug($slugc);
					$id = $row_posts['id'];
					?>


					<div class="post">
						<a href="http://<?php echo $dominio;?>/post/<?php echo $slug_final.'/'.$id.'/';?>" ><img src="http://<?php echo $dominio;?>/app/img-post/<?php echo $row_posts['img'];?>" /></a><br />

						<div class="post-info">
							<span class="autor-post"><i class="fa fa-user" ></i> <?php echo $row_posts['autor'];?></span>
							<span class="hora-post"> <i class="fa fa-clock-o" ></i> <?php echo $row_posts['hora'];?></span>
							<span class="data-post"> <i class="fa fa-calendar" ></i> <?php echo $row_posts['data'];?></span>
							<span class="view-home"><i class="fa fa-eye" ></i> <?php echo $row_posts['views'];?></span>
						</div>
						<div class="text-post">
							<a href="http://<?php echo $dominio;?>/post/<?php echo $slug_final.'/'.$id.'/';?>" ><h2><?php echo $row_posts['titulo'];?></h2></a>
							<span>
								<?php echo mb_strimwidth($row_posts['conteudo'], 0, 160, '...')." <a href='http://$dominio/post/$slug_final/$id/'> Ler Mais</a>";?>
							</span>
						</div>
					</div>


					<?php
				}

			}








			if(!isset($_POST['busca'])){
				//************* INICIO PAGINAÇÂO **************/
				//Qunatidade de paginas
				$quantidade_pg = ceil($total_posts / $qnt_result_pg);

				//Limite de link antes e depois
				$MaxLinks = 2;

				echo "<br><div class='btn-pag'>";

				echo "<a href='http://$dominio/home/1/'><<</a> ";

				for($iPag = $pagina - $MaxLinks; $iPag <= $pagina - 1; $iPag++){
					if($iPag >= 1){
						echo "<a href='http://$dominio/home/$iPag/'>$iPag</a> ";
					}
				}

				echo " <span>$pagina</span> ";

				for($dPag = $pagina + 1; $dPag <= $pagina + $MaxLinks; $dPag++){
					if($dPag <= $quantidade_pg){
						echo "<a href='http://$dominio/home/$dPag/'>$dPag </a> ";
					}
				}

				echo "<a href='http://$dominio/home/$quantidade_pg/'> >></a></div>";

			}else{?>
				<div class="btn-pag">
					<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

					<ins class="adsbygoogle"
					style="display:inline-block;width:320px;height:50px"
					data-ad-client="ca-pub-7800980402279178"
					data-ad-slot="6222050542"></ins>
					<script>
					(adsbygoogle = window.adsbygoogle || []).push({});
					</script>

				</div>

			<?php }
			?>
		</div>
		<div class="sidebar">
			<div class="side-pesquisa" >
				<div class="sidebar-titulo-pes" >
					<span> Pesquisar</span>
				</div>
				<form class="form-search" action="" method="POST" >
					<input name="busca" autocomplete="off" placeholder="Pesquisar por..." type="text">
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
