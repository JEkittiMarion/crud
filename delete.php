<head>
		<title>CRUD</title>

        <meta charset="utf-8">
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
	<center><h3> Entrez le nom du produit que vous voulez supprimer</h3> </center>
	<form action="delete.php" method="post">

		<div class="form-group row">
			<label for="example-text-input" class="col-2 col-form-label">Nom</label>
			<div class="col-10">
				<input class="form-control" type="text" id="example-text-input" name="nom">
			</div>
		</div>
		<button type="submit" name="supprimer" class="btn btn-primary">supprimer</button>
	</form>	

	<?php

		$connect=mysqli_connect("127.0.0.1","root","","crud");
				
				if($connect==false){
					echo "problĂ¨me de connexion";
				}
		if (isset($_POST['supprimer'])){
			echo 'marion';

			$nom=$_POST['nom'];
							
			$query='DELETE FROM produit WHERE nom="' . $nom . '";';
							
			mysqli_query($connect,$query) or die ('Erreur SQL !'.$query.'<br />'.mysqli_error($connect));
		}
	?>

</body>