<head>
		
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
		
	<title> CRUD </title>
		<!-- <link  rel="stylesheet" href="index.css"> -->
</head>
<body>
		
	<?php 
		//ajout de la nav bar sur la page 
		include ('navbar1.html');
	?>	
	
	<center><font color='sky-blue'><h1><u>Produits agro-alimentaires</u></h1></font></center>
	<!-- affichage des produits dans un tableau -->	
	<div class="col">	
		<?php
			//connexion à la base de données
			$connect=mysqli_connect("127.0.0.1","root","","crud");

			//vérification de la connexion à la base de données			
			if($connect==false){
				echo "problĂ¨me de connexion";
			}
			//selection des éléments dans la base			
			$query="select photo,nom,quantite from produit";
			if($result=mysqli_query($connect,$query)){
				if(mysqli_num_rows($result)>0){
					echo "<table border='0' text_align='right' class='table'>";
						echo "<thead class='thead-dark'>";
							echo "<tr>";
								echo "<th scope='col'> nom </th>";
								echo "<th scope='col'> photos </th>";
								echo " <th scope='col'> quantite </th>";
							echo "<tr>";
						echo "<thead>";
						echo "<tbody>";
									
					while ($ligne=mysqli_fetch_array($result)){
							
						echo "<tr>";
							echo "<th scope='col'> " . $ligne['nom'] . "</th>";
										
							echo '<th scope="col"><a href="produit.php?adresse=' . $ligne["photo"] . '"><img src="image/' . $ligne["photo"] . ' "width="100px" height="100px"">';
							echo "<th scope='col'> " . $ligne['quantite'] . "</th>";
										//echo '<td><a href="produit.php"><img src="image/'. $ligne['adresse'] . 'width="200px" height="200px"></img></a></td>';
						echo "</tr>";
							
					}
						echo "</tbody>";
					echo "</table>";
					mysqli_free_result($result);
								
				}
				else{
					echo "erreur";
				}
							
			}
			else{
				echo "erreur" . mysqli_error($connect);
			}
			mysqli_close($connect);
		?>
					
	</div>	
	 
</body>
