<head>

        <meta charset="utf-8">
        <title>CRUD</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</head>

<body>
	<?php 
		//ajout de la nav bar sur la page 
		include ('navbar1.html');
	?>

	<center><h3> Entrez les informations de votre nouveau produit</h3> </center>

	<form action="" method="post">
	<div class="form-group">
		<label for="exampleInputEmail1">Nom</label>
		<input type="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nom">
		<small id="emailHelp" class="form-text text-muted"></small>
	</div>
	<div class="form-group">
		<label for="exampleInputEmail1">Photo</label>
		<input type="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="pht">
	</div>
	<div class="form-group">
		<label for="exampleInputPassword1">Quantite</label>
		<input type="" class="form-control" id="exampleInputPassword1" name="qtt">
	</div>
	<div class="form-group">
	    <label for="exampleFormControlTextarea1">Origine</label>
		<textarea  class="form-control" id="exampleFormControlTextarea1" rows="3" name="ori"></textarea>
	</div>
	<button type="submit" name="ajout" class="btn btn-primary">ajouter</button>

    <?php
		
		
		$connect=mysqli_connect("127.0.0.1","root","","crud");
			
			if($connect==false){
				echo "problĂ¨me de connexion";
			}

		//récupérations des information données dans le formulaire grace à la methode POST	
			
		if(isset($_POST['ajout'])){
			
			$nom=$_POST['nom'];
			$pht=$_POST['pht'];
			$qtt=$_POST['qtt'];
			$ori=$_POST['ori'];
				
				
				
			$query="insert into produit (nom,photo,origine,quantite) VALUES('".$nom."','".$pht."','".$ori."','".$qtt."');";
				
			mysqli_query($connect,$query) or die ('Erreur SQL !'.$query.'<br />'.mysqli_error($connect));
				//mysqli_close($connect);
			
		}
			
		/*else{
			echo "erreur" . mysqli_error($connect);
		}*/
				
		//mysqli_query($connect,$query) or die ('Erreur SQL !'.$query.'<br />'.mysqli_error($connect));
			
		mysqli_close($connect);
			
	?>
	
	
</body>