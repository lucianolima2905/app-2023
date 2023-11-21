<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
  <div class="profile-sidebar">
    <div class="profile-userpic">
      <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
    </div>
    <div class="profile-usertitle">
      <div class="profile-usertitle-name">Username</div>
      <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="divider"></div>
  <ul class="nav menu">
    <li <?php if((isset($_GET['link'])) && ($_GET['link'] == 1)){echo "class='active'";}elseif(!isset($_GET['link'])){echo "class='active'";} ?>><a href="?link=1"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
    <li <?php if((isset($_GET['link'])) && ($_GET['link'] == 2)){echo "class='active'";} ?>><a href="?link=2"><em class="fa fa-code">&nbsp;</em> Sidebar</a></li>
    <li <?php if((isset($_GET['link'])) && ($_GET['link'] == 9)){echo "class='active'";} ?>><a href="?link=9"><em class="fa fa-envelope">&nbsp;</em> Mensagem</a></li>
    <li class="parent <?php if((isset($_GET['link'])) && ($_GET['link'] == 3)){echo "active";}?>">  <a data-toggle="collapse" href="#sub-item-1">
    				<em class="fa fa-navicon">&nbsp;</em> Blog <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
    				</a>
    				<ul class="children collapse" id="sub-item-1">
    					<li><a class="" href="?link=3">
    						<span class="fa fa-arrow-right">&nbsp;</span> Posts
    					</a></li>
    					<li><a class="" href="?link=4">
    						<span class="fa fa-arrow-right">&nbsp;</span> Novo Post
    					</a></li>
    					<li><a class="" href="?link=5">
    						<span class="fa fa-arrow-right">&nbsp;</span> Comentários
    					</a></li>
    				</ul>
    			</li>
    <li <?php if((isset($_GET['link'])) && ($_GET['link'] == 6)){echo "class='active'";} ?>><a href="?link=6"><em class="fa fa-cogs">&nbsp;</em> Configurações</a></li>
    <li><a href="?sair"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
  </ul>
</div><!--/.sidebar-->
