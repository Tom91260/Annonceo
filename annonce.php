<?php
    require_once('inc/init.php');

	if(isset($_GET['id_annonce'])){
		//je recoi bien le parametre dans l'url
		$sql = "SELECT *, c.titre as titrec, a.titre as titrea FROM annonce a, categorie c, membre m WHERE m.id_membre=a.membre_id
		AND c.id_categorie=a.categorie_id AND id_annonce = :id_annonce";
		$resul = executeRequete($sql,array('id_annonce' => $_GET['id_annonce'] ));

		$annonce = $resul->fetch(PDO::FETCH_ASSOC);
		ob_start();
		?>
		<div id="principal" class="ligne">
				<main>  
				 <button type="submit" class="btn btn-primary">Contacter <?= $annonce['prenom'] ?></button>
				
					<img src="<?= $annonce['photo'] ?>" alt="<?= $annonce['titrea'] ?>" title="<?= $annonce['titrea'] ?>">
					
					<h2><?= $annonce['titrea'] ?></h2>
					<p><?= $annonce['description_longue'] ?></p>    

			
				</main>

    </div id="container">

<?php
	$content = ob_get_clean();

	}
	else{
		//sinon afficher un message d'erreur
	}

	
?>
<!-- <nav class="navbar navbar-default">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-annonceo" href="#">Annonceo</a>
    </div>

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
    </div>
  </div>
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
	
			
</body> -->
<?php
    include('inc/gabarit.php');

?>