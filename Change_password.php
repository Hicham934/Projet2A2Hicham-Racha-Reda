<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>



<div class="container forget-password" style="margin-top: 10%;">
            <div class="row">
                <div class="col-md-12 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="text-center">
                                <img src="https://usa.afsglobal.org/SSO/SelfPasswordRecovery/images/send_reset_password.svg?v=3" alt="car-key" border="0">
                                <h2 class="text-center">Mot de passe oublié?</h2>
                          <p>Vous pouvez
réinitialiser votre mot de passe ici.</p>
                                <form id="register-form" role="form" autocomplete="off" class="form" method="post">

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                            <input id="forgetAnswer" name="email" placeholder="Saisir votre adresse mail" class="form-control"  type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input name="btnForget" class="btn btn-lg btn-primary btn-block btnForget" value="
Réinitialiser votre mot de passe" type="submit">
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php

  include('includes/db_connexion.php');



if (isset($_POST['email']) && !empty($_POST['email']))
 {


$jeton = uniqid(); // génere un mot de passe

// echo $jeton;

$url = 'http://localhost:8888/ProjetAnnuel2a2/jeton.php?jeton=' . $jeton;



$message = "Bonjour, voici votre lien pour la réinitialisation du mot de passe : $url";




if (mail($_POST['email'], 'Mot de passe oublié', $message)) {
    $change_mdp = "UPDATE users SET jeton = ? WHERE email = ?";
    $change = $db->prepare($change_mdp);
    $change->execute
  ([

     $jeton,
     $_POST['email']

   ]);

  echo "Mail envoyé";
echo $message;
  }

    else

  {

    echo "une erreur est survenue...";

  }

  }


?>