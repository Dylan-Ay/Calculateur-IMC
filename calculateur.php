<?php
	// Initialisation des variables
	$height = !empty($_POST["height"]) ? $_POST["height"] : NULL;
	$weight = !empty($_POST["weight"]) ? $_POST["weight"] : NULL;
	$genderChoice = !empty($_POST["choice"]) ? $_POST["choice"] : NULL;
	$conversionHeight = $height * 0.01;
	$resultIMC = '';
	$infoIMC = '';
	$messageInfo = '';
	$error = '';
	$idealWeightMen = '';
	$idealWeightWomen = '';
	$resultIdealWeight = '';

	// Si les champs sont vides afficher une erreur, sinon calculer l'IMC et le poids idéal en fonction du genre.
	if ($_SERVER["REQUEST_METHOD"] === "POST"){
		if ( empty($_POST["height"]) || empty($_POST["weight"]) ){
			$error = "<span class='error'>Veuillez remplir tous les champs du formulaire.</span>";
		} else if ( empty($_POST["choice"]) ) {
			$error = "<span class='error'>Veuillez sélectionner un genre.</span>";
		} else if (isset($_POST['choice']) && $_POST['choice'] == "A" ){
			$resultIMC = $weight / ($conversionHeight * $conversionHeight);
			$idealWeightWomen = $height - 100 - (($height - 150) / 2.5);
			$resultIdealWeight = "Votre poids idéal est $idealWeightWomen kg ";
			$resultIMC = number_format($resultIMC, 1 , '.', ' ');
		} else if (isset($_POST['choice']) && $_POST['choice'] == "B" ) {
			$resultIMC = $weight / ($conversionHeight * $conversionHeight);
			$idealWeightMen = $height - 100 - (($height - 150) / 4);
			$resultIdealWeight = "Votre poids idéal est $idealWeightMen kg ";
			$resultIMC = number_format($resultIMC, 1 , ',', ' ');
		}
	}
	// Affichage de l'information concernant la catégorie selon l'IMC.
	switch($resultIMC){
		case $resultIMC == empty($resultIMC) :
			$infoIMC = "";
			break;
		case $resultIMC < 18.5 :
			$infoIMC = '<span>Vous êtes dans la catégorie Maigreur.</span>';
			$messageInfo = '<p class="semi-bold">Ces indices ne remplacent ni un avis médical, ni votre appréciation personnelle puisque l’essentiel est avant tout de se sentir en forme et bien dans sa peau &#x1F600.</span> </p>';
			break;
		case $resultIMC < 24.9 :
			$infoIMC = "<span>Vous êtes dans la catégorie Normal.</span>";
			$messageInfo = '<p class="semi-bold">Ces indices ne remplacent ni un avis médical, ni votre appréciation personnelle puisque l’essentiel est avant tout de se sentir en forme et bien dans sa peau &#x1F600.</span> </p>';
			break;
		case $resultIMC < 29.9 :
			$infoIMC = "<span>Vous êtes dans la catégorie Surpoids.</span>";
			$messageInfo = '<p class="semi-bold">Ces indices ne remplacent ni un avis médical, ni votre appréciation personnelle puisque l’essentiel est avant tout de se sentir en forme et bien dans sa peau &#x1F600.</span> </p>';
			break;
		case $resultIMC < 34.9 :
			$infoIMC = "<span>Vous êtes dans la catégorie 1 Obésité Modérée.</span>";
			$messageInfo = '<p class="semi-bold">Ces indices ne remplacent ni un avis médical, ni votre appréciation personnelle puisque l’essentiel est avant tout de se sentir en forme et bien dans sa peau &#x1F600.</span> </p>';
			break;
		case $resultIMC < 39.9 :
			$infoIMC = "<span>Vous êtes dans la catégorie 2 Obésité Sévère.</span>";
			$messageInfo = '<p class="semi-bold">Ces indices ne remplacent ni un avis médical, ni votre appréciation personnelle puisque l’essentiel est avant tout de se sentir en forme et bien dans sa peau &#x1F600.</span> </p>';
			break;
		case $resultIMC >= 40 : 
			$infoIMC = "<span>Vous êtes dans la catégorie 3 Obésité Morbide.</span>";
			$messageInfo = '<p class="semi-bold">Ces indices ne remplacent ni un avis médical, ni votre appréciation personnelle puisque l’essentiel est avant tout de se sentir en forme et bien dans sa peau &#x1F600.</span> </p>';
			break;
	}
?>