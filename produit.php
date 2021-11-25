<head>
		
	<meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
		
	<title> CRUD </title>
	<link  rel="stylesheet" href="index.css">
</head>
<body><center>
	<?php 
	//ajout de la nav bar sur la page 
		include ('navbar1.html');
	?>
	
	<h2> Converse</h2>
	<?php
		
		$connect=mysqli_connect("127.0.0.1","root","","crud");
			
		if($connect==false){
			echo "problĂ¨me de connexion";
		}
			
		$query='select nom,photo,quantité,origine from produit where nom="' .$_GET["nom"] .   '"';
			
		
		echo "<div>";
			echo '<img src="image/' .$_GET["nom"] .'" width="150px"></img>';
		echo "</div>";	
		echo "<p>";
			
			if($result=mysqli_query($connect,$query)){
				if(mysqli_num_rows($result)>0){
					echo "<table border='1' text_align='center' class='table'>";
						echo "<thead class='thead-dark'>";
							echo "<tr>";
								echo "<th scope='col'> nom </th>";
								echo "<th scope='col'> quantite</th>";
								echo "<th scope='col'> origine</th>";
							echo "<tr>";
						echo "</thead>";
						echo "<tbody>";
					
					while ($ligne=mysqli_fetch_array($result)){
				
						echo "<tr>";
							echo "<th scope='col'> " . $ligne['nom'] . "</th>";
							echo "<th scope='col'> " . $ligne['quantite'] . "</th>";
							echo "<th scope='col'>" . $ligne['origine'] . "</th>";
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
		
			/*<p>prix</p>
			<p>Baskets montantes</p> 
			<p><i>Couleur:</i>black</p>*/
			
			
			mysqli_close($connect);
		echo "</p>";
	?>
		
		
</center></body>