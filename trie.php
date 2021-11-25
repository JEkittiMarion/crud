<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title> CRUD </title>

</head>

<body>

    <?php

        include ('navbar1.html');
			//connexion à la base de données
		$connect=mysqli_connect("127.0.0.1","root","","crud");

			//vérification de la connexion à la base de données			
		if($connect==false){
			echo "problĂ¨me de connexion";
		}
        if (isset($_POST['trier'])){
    
            $ori=$_POST['ori'];
            //selection des éléments dans la base	                    
            $query='select photo,nom,quantite from produit where origine="' . $ori . '";';
                                
            mysqli_query($connect,$query) or die ('Erreur SQL !'.$query.'<br />'.mysqli_error($connect));
            
                		
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
                    //remplissage du tableau avec le resultat de la requete                    
                    while ($ligne=mysqli_fetch_array($result)){
                                
                        echo "<tr>";
                            echo "<th scope='col'> " . $ligne['nom'] . "</th>";
                                            
                            echo '<th scope="col"><a href="produit.php?adresse=' . $ligne["photo"] . '"><img src="image/' . $ligne["photo"] . ' "width="100px" height="100px"">';
                            echo "<th scope='col'> " . $ligne['quantite'] . "</th>";
                                            
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
        }
	?>
</body>