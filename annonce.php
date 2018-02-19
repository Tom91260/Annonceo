<?php
    require_once('inc/init.php');

    ob_start();
?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-annonceo" href="#">Annonceo</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#"> Qui sommes-nous ?<span class="sr-only">(current)</span></a></li>
        <li><a href="#">Contact</a></li>
        <li class="dropdown">

      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Rechercher">
        </div>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Espace membre</a></li>
  
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<body>
    <div id="container">
			<header>
				<div class="header_a">
					<h1>Appartement</h1>
				</div>
				<div class="header_b">                     
                <button type="submit" class="btn btn-primary">Contacter Marie</button>
					
				</div>
			</header>
			<div id="principal" class="ligne">

            </header>
			<div id="principal" class="ligne">
				<main>
					<h2></h2>
					<p>
					<br/>
					<br/>
					
					</p>
					<img src="inventeur_bitcoin_démasqué.jpg" alt="photo" title="photo">
					
				
					<h3>Description</h3>
					<ol>
						<li>
						
						</li>
						</br>
						<li>
						
						</li>
						</br>
						<li>
						
						</li>
						</br>
						<li>
						
						</li>
						</br>
						<li>
						
						</li>
						</br>
						<li>
						
						</li>
					</ol>
				</main>
    </div id="container">
</body>
<?php
    $content= ob_get_clean();
    include('inc/gabarit.php');

?>