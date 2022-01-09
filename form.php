<?php
	// Initialisation des variables
	$height = !empty($_POST["height"]) ? $_POST["height"] : NULL;
	$weight = !empty($_POST["weight"]) ? $_POST["weight"] : NULL;
	$genderChoice = !empty($_POST["choice"]) ? $_POST["choice"] : NULL;
	$conversionHeight = $height * 0.01;
	$resultIMC = '';
	$returnHeight = '';
	$returnWeight = '';
	$heightError = '';
	$weightError = '';
	$error = '';
	// Si les champs sont vides afficher erreur, sinon calculer l'IMC 
	if ($_SERVER["REQUEST_METHOD"] === "POST"){
		if (empty($_POST["height"]) && empty($_POST["weight"])){
			$error = "Veuillez insérer une taille en centimètre et un poids en kg.";
		} else {
			$resultIMC = $weight / ($conversionHeight * $conversionHeight);
		}
	}
	echo ("<br>");
	// Tests du calcul IMC et affichage de la catégorie
	switch($resultIMC){
		case $resultIMC < 18.5 :
			$infoIMC = "<span class='lightblue-bold'>Vous êtes dans la catégorie Maigreur, vous devriez manger davantage.</span>";
			break;
		case $resultIMC < 24.9 :
			$infoIMC = "<span class='blue'>Vous êtes dans la catégorie Normal, tout va bien pour vous.</span>";
			break;
		case $resultIMC < 29.9 :
			$infoIMC = "<span class='yellow'>Vous êtes dans la catégorie Surpoids vous devriez faire un régime.</span>";
			break;
		case $resultIMC < 40 :
			$infoIMC = "<span class='orange-bold'>Vous êtes dans la catégorie Obésité vous devriez faire un régime.</span>";
			break;
		case $resultIMC > 40 : 
			$infoIMC = "<span class='red-bold'>Vous êtes dans la catégorie Obésité sévère vous devriez voir un médecin.</span>";
			break;
}

	// Si le champ taille et le champ poids n'est pas vide on affiche le resultat
	//Sinon on affiche l'erreur
		if (!empty($_POST["height"]) && !empty($_POST["weight"])){
			echo "Votre IMC est $resultIMC. <br> $infoIMC";
		} else {
			echo "<strong>$error</strong>";
		}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link rel="stylesheet" href="calculateur-imc.css">
		<title>Calculateur d'IMC</title>
	</head>
	<body>
		<header>
			<div id="color-top"></div>
		</header>
		<main>
		<div class="container">
			<h1>Calculateur d'IMC</h1>
			<div class="row justify-content-around">
				<div class="col-6">
					<h2>Qu'est ce que l'IMC ?</h2>
						<p>L’indice de masse corporelle ou IMC est une grandeur qui permet d'estimer la corpulence d’une personne.</p>

						<p>Il se calcule en fonction de la taille et de la masse corporelle grâce au calcul : poids(kg) / taille(m) x taille(m).</p>
						<img src="images/illustration-imc.svg">
				</div>
				<div class="col-6">
					<h2>Résultat</h2>
					<form name="form-imc" method="post" action="index.php">
						<p>Votre taille : <input type="number" name="height" value="<?php echo isset($_POST['height']) ? htmlspecialchars($_POST['height'], ENT_QUOTES) : ''; ?>"> en cm</p>
						<p>Votre poids : <input type="number" name="weight" value="<?php echo isset($_POST['weight']) ? htmlspecialchars($_POST['weight'], ENT_QUOTES) : ''; ?>"> en kg</p>
						<input type="submit" value="Calculer">
					</form>
				</div>
			</div>
		</div>
		<footer>

		</footer>
	</body>
</html>