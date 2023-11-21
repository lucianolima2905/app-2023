<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="#">
        <em class="fa fa-home"></em>
      </a></li>
      <li class="active">Dashboard</li>
    </ol>
  </div><!--/.row-->

  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Dashboard</h1>
    </div>
  </div><!--/.row-->

  <div class="panel panel-container">
    <div class="row">
      <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
        <div class="panel panel-teal panel-widget border-right">
          <div class="row no-padding"><em class="fa fa-xl fa-list-ul color-blue"></em>
            <div class="large"><?php echo $num_posts;?></div>
            <div class="text-muted">Postagens</div>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
        <div class="panel panel-blue panel-widget border-right">
          <div class="row no-padding"><em class="fa fa-xl fa-comments color-orange"></em>
            <div class="large"><?php echo $num_coment;?></div>
            <div class="text-muted">Comentários</div>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
        <div class="panel panel-orange panel-widget border-right">
          <div class="row no-padding"><em class="fa fa-xl fa-envelope color-teal"></em>
            <div class="large"><?php echo $num_contato;?></div>
            <div class="text-muted">Mensagens</div>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
        <div class="panel panel-red panel-widget ">
          <div class="row no-padding"><em class="fa fa-xl fa-eye color-red"></em>
            <div class="large"><?php if(isset($_SESSION['USUARIOS_ONLINE'])){echo $_SESSION['USUARIOS_ONLINE'];}else{echo "0";} ?></div>
            <div class="text-muted">PageViews</div>
          </div>
        </div>
      </div>
    </div><!--/.row-->
  </div>


  <div class="row">
    <div class="col-xs-6 col-md-3">
      <div class="panel panel-default">
        <div class="panel-body easypiechart-panel">
          <h4>Postagens</h4>
          <div class="easypiechart" id="easypiechart-blue" data-percent="<?php if($num_posts == "0"){echo $num_posts;}else{echo $num_posts;}?>" ><span class="percent"><?php if($num_posts == "0"){echo $num_posts;}else{echo $num_posts+1;}?>%</span></div>
        </div>
      </div>
    </div>
    <div class="col-xs-6 col-md-3">
      <div class="panel panel-default">
        <div class="panel-body easypiechart-panel">
          <h4>Comentários</h4>
          <div class="easypiechart" id="easypiechart-orange" data-percent="<?php if($num_coment == "0"){echo $num_coment;}else{echo $num_posts;}?>" ><span class="percent"><?php if($num_coment == "0"){echo $num_coment;}else{echo $num_posts+1;}?>%</span></div>
        </div>
      </div>
    </div>
    <div class="col-xs-6 col-md-3">
      <div class="panel panel-default">
        <div class="panel-body easypiechart-panel">
          <h4>Mensagens</h4>
          <div class="easypiechart" id="easypiechart-teal" data-percent="<?php if($num_contato == "0"){echo $num_contato;}else{echo $num_contato;}?>" ><span class="percent"><?php if($num_contato == "0"){echo $num_contato;}else{echo $num_contato+1;}?>%</span></div>
        </div>
      </div>
    </div>
    <div class="col-xs-6 col-md-3">
      <div class="panel panel-default">
        <div class="panel-body easypiechart-panel">
          <h4>Page Views</h4>
          <div class="easypiechart" id="easypiechart-red" data-percent="<?php if(isset($_SESSION['USUARIOS_ONLINE'])){echo $_SESSION['USUARIOS_ONLINE']-2;}else{echo "0";} ?>" ><span class="percent"><?php if(isset($_SESSION['USUARIOS_ONLINE'])){echo $_SESSION['USUARIOS_ONLINE']-2;}else{echo "0";} ?>%</span></div>
        </div>
      </div>
    </div>
  </div><!--/.row-->


</div>	<!--/.main-->
