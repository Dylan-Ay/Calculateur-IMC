<?php include_once('form.php')?>
<!DOCTYPE html>
<html lang="fr-FR">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="calculateur-imc.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,200&family=Rubik:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet">
		<title>Calculateur d'IMC et de Poids idéal</title>
	</head>
    <body>
        <!------------  Header ----------->
        <header>
            <div id="color-top"></div>
        </header>
        <!------------  Main ----------->
        <main>
            <div class="container pt-4 pb-5">
                <h1 class="text-center pt-4 pb-5">Calculateur d'IMC et de poids idéal</h1>
                <div class="row mt-4 d-flex justify-content-between">
                    <div class="col-12 col-lg-5 mb-4">
                        <h2 class="text-center">Qu'est ce que l'IMC ?</h2>
                            <p class="mt-4">L’indice de masse corporelle ou IMC est une grandeur qui permet d'estimer la corpulence d’une personne.</p>

                            <p>Il se calcule en fonction de la taille et de la masse corporelle grâce au calcul : poids(kg) / taille(m)².</p>
                            <img src="images/illustration-imc.svg" alt="illustration imc" class="mt-3">
                    </div>
                     <!------------  Form ----------->
                    <div class="col-12 col-lg-7 col-xl-6 text-center pt-4 pt-xxl-5">
                        <div class="form-window mx-auto d-flex justify-content-center py-5 mt-3">
                            <div class="col-12 col-xxl-9">
                                <div id="result text-end">
                                    <p><?php echo $resultIdealWeight?> <?php if(!empty($resultIMC)){ echo "et votre IMC est ".$resultIMC;}?></p>
                                    <p><?php  if(!empty($infoIMC)){ echo $infoIMC;} ?></p>
                                </div>
                                <form name="form-imc" method="post" action="index.php" class="mt-5 px-3">
                                            <div class="row">
                                                <div class="col-6">
                                                    <p><input type="radio" name="choice" value="A" <?php if(isset($_POST['choice']) && $_POST['choice'] == "A" ){echo "checked";}?>> <span class="ms-1">Je suis une Femme</span> 
                                                </div>
                                                <div class="col-6">
                                                    <p><input type="radio" name="choice" value="B" <?php if(isset($_POST['choice']) && $_POST['choice'] == "B" ){echo "checked";}?>> <span class="ms-1">Je suis un Homme</span>
                                                </div>
                                            </div>
                                    <p class="py-1 mt-4">
                                        <input type="number" name="height" placeholder="Votre taille (en cm)*" class="input-txt ps-3 no-arrow" value= "<?php echo isset($_POST['height']) ? htmlspecialchars($_POST['height'], ENT_QUOTES) : ''; ?>">
                                    </p>
                                    <p class="py-1">
                                        <input type="text" name="weight" placeholder="Votre poids (en kg)*" class="input-txt ps-3 no-arrow" value= "<?php echo isset($_POST['weight']) ? htmlspecialchars($_POST['weight'], ENT_QUOTES) : ''; ?>">
                                    </p>
                                    <p class="py-1">
                                        <input type="number" name="age" placeholder="Votre age" class="input-txt ps-3 no-arrow" value= "<?php echo isset($_POST['age']) ? htmlspecialchars($_POST['age'], ENT_QUOTES) : ''; ?>">
                                    </p>
                                    <p><?php echo $error; ?></p>
                                    <input type="submit" value="Valider" class="button-submit px-5 py-2 mt-3">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!------------  Footer ----------->
        <footer id="footer">
            <div class="container-fluid">
				<div class="row justify-content-center pt-4 pb-2">
					<div class="col-lg-4">
						<p class="text-center mt-1">
                            <a href="https://dylanayache.com/" target="_blank">© Réalisé par Dylan Ayache</a>
                        </p>
					</div>
				</div>
			</div>
        </footer>
    </body>
</html>
        