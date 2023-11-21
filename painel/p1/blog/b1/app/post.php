 <?php
 require_once('app/include/contador-views.php');
 ?>
	  <div class="container">

		   <?php require_once('app/include/nav.php');?>


		   <div class="conteudo">
		       <div class="posts imgExpande">
			   <?php if(!isset($result)){ ?>
				   <div class="info-404">
					   <div class="text-404">
						 <h2>Este Post Não existe ou pode ter sido removido! verifique o endereço digitado e tente novamente! </h2>
						 <span>404!</span>
						 <p>Error</p>
					   </div>
				   </div>

			   <?php }else{?>
			     <div class="post-detalhe">

				     <a href="#" ><img src="http://<?php echo $dominio;?>/app/img-post/<?php echo $result['img'];?>" /></a><br />
					  <div class="post-info">
					  <span class="autor-post"><i class="fa fa-user" ></i> <?php echo $result['autor'];?></span>
					  <span class="hora-post"> <i class="fa fa-clock-o" ></i> <?php echo $result['hora'];?></span>
					  <span class="data-post"> <i class="fa fa-calendar" ></i> <?php echo $result['data'];?></span>
					  <span class="view-home"><i class="fa fa-eye" ></i> <?php echo $result['views'];?></span>
					  <span class="view-home"><i class="fa fa-comment" ></i> <?php if($ver_coment_post == false){echo "0";}else{ echo $ver_coment_post;}?></span>
					  </div><br />
					 <div class="text-post">
					 <a href="#" ><h2><?php echo $result['titulo'];?></h2></a>
					 <span>
					   <?php echo $result['conteudo'];?>
					 </span>
					 </div>
				  </div>
				   <div class="addthis_inline_share_toolbox partilha"></div>
					 <div id="comentarios" class="comentarios">
					     <div class="coment-titulo" >
					       <span>Comentários</span>
						 </div>
						  <form action="http://<?php echo $dominio;?>/app/sql/sql-coment.php?id_post=<?php echo $result['id'];?>&post_name=<?php echo $result['titulo']; ?>" method="post">
						   <input name="nome" type="text" placeholder="Seu Nome" required ><br />
						   <input name="email" type="email" placeholder="Email..." required ><br />
						   <textarea name="coment" placeholder="Seu comentário..." required ></textarea><br />
						   <button type="submit" >	Comentar</button>
						 </form><br />

						 <?php  if(isset($ver_coment_post) && ($ver_coment_post > 0)){

							 while($result_coment_post = mysqli_fetch_assoc($query_coment_post)){

						?>
						<div class="coment">
						   <div class="cmt" >
							    <img src="<?php echo $result_coment_post['img']?>" />
						        <span><?php echo $result_coment_post['nome']?></span>
								<p><?php echo $result_coment_post['coment']?></p>
							 </div>
						 </div>
						 <?php }?>
					 </div>
			   <?php }else{ ?>
				   <div class="coment">
             <?php if(isset($_SESSION['coment'])){ ?>
             <center>
               <p class="coment-vazio" ><?php echo $_SESSION['coment'];?>, Seu comentário foi enviado para moderação</p><br />
            </center>
             <?php
             unset($_SESSION['coment']);
               } ?>
						 <center>
							<p class="coment-vazio" >Nenhum comentário até o momento</p>
						</center>

				 </div>

			   <?php } }?>
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
               <span>Postagens</span>
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
				 <a target="_blank" href="#" ><i class="fa fa-facebook fa-lg" ></i></a>
				 <a target="_blank" href="#" ><i class="fa fa-twitter fa-lg"  ></i></a>
				 <a target="_blank" href="#" ><i class="fa fa-youtube fa-lg"  ></i></a>
				</div>
		   </div>
	 </div>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-59c680bd691ed835"></script>
