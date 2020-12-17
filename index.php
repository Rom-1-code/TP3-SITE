<?php session_start(); ?>
<?php require("Class/user.php"); ?>
<?php include('Class/Tcp.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DMX-Client-Serveur</title>
    <!-- icons -->
    <link href="img/apple-touch-icon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link href="css/btn.css" rel="stylesheet">
    <!--===============================================================================================-->
</head>

<body>
    <?php
    if (!isset($_SESSION['identifiant'])) {
    ?>
        <div class="limiter">
            <div class="container-login100" style="background-image: url('images/img-01.jpg');">
                <div class="wrap-login100 p-t-190 p-b-30">
                    <form class="login100-form validate-form" action="index.php" method="post">


                        <span class="login100-form-title p-t-20 p-b-45">
                            Bienvenue
                        </span>

                        <div class="wrap-input100 validate-input m-b-10" data-validate="Veuillez renseigner votre identifiant">
                            <input class="input100" type="text" name="identifiant" placeholder="Identifiant">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>

                        <div class="wrap-input100 validate-input m-b-10" data-validate="Veuillez renseigner votre mot de passe">
                            <input class="input100" type="password" name="mdp" placeholder="Mot de passe">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock"></i>
                            </span>
                        </div>
                        <?php
                        if (isset($_POST['identifiant']) && isset($_POST['mdp'])) { // Tout les champs du formulaire
                            $coUser = new user(); //Le mot de passe est correct, on crée l'objet user
                            $base = $coUser->Connexionbdd(); // Méthode de connexion dans class user
                            $coUser->ConnexionUser($_POST['identifiant'], $_POST['mdp'], $base); //  Méthode de autorisation dans class user  
                        }

                        ?>
                        <div class="container-login100-form-btn p-t-10">
                            <button class="login100-form-btn h1">
                                Connexion
                            </button>
                        </div>


                        <div class="text-center w-full">

                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php
    } else { ?>
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active"><?php echo "Bonjour " . $_SESSION['identifiant']; ?></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="deconnexion.php">Déconnexion</a>
            </li>
        </ul>
        <form action="" method="POST">
            <input type="HIDDEN" name="ButtonOn" />
            <input type="submit" class="btn btn-secondary" value="Allumer" />
        </form>
        <form action="" method="POST">
            <input type="HIDDEN" name="ButtonOff" />
            <input type="submit" class="btn btn-secondary" value="Eteindre" />
        </form>

        <div class="range-slider">
            <input class="range-slider__range" type="range" value="100" min="0" max="500">
            <span style="color: red;" class="range-slider__value">0</span>
        </div>

        <div class="range-slider">
            <input class="range-slider__range" type="range" value="100" min="0" max="500" step="50">
            <span style="color: green;" class="range-slider__value">0</span>
        </div>

        <div class="range-slider">
            <input class="range-slider__range" type="range" value="100" min="0" max="500">
            <span style="color: #00FFFF" class="range-slider__value">0</span>
        </div>

        <div class="range-slider">
            <input class="range-slider__range" type="range" value="100" min="0" max="500">
            <span class="range-slider__value">0</span>
        </div>
        <div>
            <form action="" method="post">
                <input type="HIDDEN" name="rougeColor" />
                <input type="submit" class="btn btn-danger" value="Rouge" />
            </form>
            <form action="" method="post">
                <input type="HIDDEN" name="blueColor" />
                <input type="submit" class="btn btn-primary" value="Bleu" />
            </form>
            <form action="" method="post">
                <input type="HIDDEN" name="greenColor" />
                <input type="submit" class="btn btn-success" value="Vert" />
            </form>
        </div>


    <?php
    }

    ?>

    <!-- Optional JavaScript -->
    <script>
        var rangeSlider = function() {
            var slider = $('.range-slider'),
                range = $('.range-slider__range'),
                value = $('.range-slider__value');

            slider.each(function() {

                value.each(function() {
                    var value = $(this).prev().attr('value');
                    $(this).html(value);
                });

                range.on('input', function() {
                    $(this).next(value).html(this.value);
                });
            });
        };

        rangeSlider();
    </script>



    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>
</body>

</html>