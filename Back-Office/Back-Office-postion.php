<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->


<?php
session_start();
include("../includes/header.php");


?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Infantry</title>
</head>
<style type="text/css">
    .navbar.bg-light{
        background-color: #4682B4 !important;
        transition: ease 0.5s;
    }
    .user-profile{
        width: 50px;
        height: 50px;
        background-color: #f1f1f1;
    }
    .navbar .menu-bar{
        display: inline-block;
        width: 50px;
        height: 50px;
        margin-right: 10px;
        position: relative;
        cursor: pointer;
    }
    .navbar .menu-bar .bars{
        position: relative;
        top:50%;
        width:30px;
        height: 2px;
        background-color: #fff;
    }
    .navbar .menu-bar .bars::after{
        content: "";
        position: absolute;
        bottom: -8px;
        width: 100%;
        height: 2px;
        background-color: #fff;
    }
    .navbar .menu-bar .bars::before{
        content: "";
        position: absolute;
        top:-8px;
        width: 100%;
        height: 2px;
        background-color: #fff;
    }
    .navbar ul.navbar-nav li.nav-item.ets-right-0 .dropdown-menu{
        left: auto;
        right: 0;
        position: absolute;
    }
    .side-bar{
        position: fixed;
        top:81px;
        left:0;
        padding: 15px;
        display: inline-block;
        width: 100px;
        background-color: #fff;
        box-shadow: 0px 0px 8px #ccc;
        height: 100vh;
        transition: ease 0.5s;
        overflow-y: auto;
    }
    .main-body-content{
        display: inline-block;
        padding: 15px;
        background-color:#eef4fb;
        height: 100vh;
        padding-left: 100px;
        transition: ease 0.5s;
    }
    .ets-pt{
        padding-top: 100px;
    }
    .main-admin.show-menu .side-bar{
        width: 250px;
    }

    .main-admin.show-menu .main-body-content{
        padding-left: 265px;
    }
    .main-admin.show-menu .navbar .menu-bar .bars{
        width: 15px;
    }
    .main-admin.show-menu .navbar .menu-bar .bars::after{
        width: 10px;
    }
    .main-admin.show-menu .navbar .menu-bar .bars::before{
        width: 25px;
    }
    .main-admin.show-menu .side-bar-links{
        opacity: 1;
    }
    .main-admin.show-menu .side-bar .side-bar-icons{
        opacity: 0;
    }
    /**** end effacts ****/
    .side-bar .side-bar-links{
        opacity: 0;
        transition:  ease 0.5s;
    }
    .side-bar .side-bar-links ul.navbar-nav li a{
        font-size: 14px;
        color: #070F40;
        font-weight: 500;
        padding: 10px;
    }
    .side-bar .side-bar-links ul.navbar-nav li a i{
        font-size:20px;
        color: #8ac1f6;
    }
    .side-bar .side-bar-links ul.navbar-nav li a:hover, .side-bar-links ul.navbar-nav li a:focus{
        text-decoration: none;
        background-color: #8ac1f6;
        color:#fff;
    }
    .side-bar .side-bar-links ul.navbar-nav li a:hover i{
        color:#fff;
    }
    .side-bar .side-bar-logo img{
        width: 100px;
        height: 100px;
    }
    .side-bar .side-bar-icons{
        position: absolute;
        top:20px;
        right:0;
        width: 100px;
        opacity: 1;
        transition: ease 0.5s;
    }
    .side-bar .side-bar-icons .side-bar-logo img{
        width: 50px;
        height: 50px;
        object-fit: cover;
    }
    .side-bar .side-bar-icons .side-bar-logo h5{
        font-size: 14px;
    }
    .side-bar .side-bar-icons .set-width{
        color: #000;
        font-size: 32px;
    }
    .side-bar .side-bar-icons .set-width:hover,.side-bar .side-bar-icons .set-width:focus{
        color: #8ac1f6;
        text-decoration: none;
    }
</style>
<?php


?>
<body>
<div id="page-container" class="main-admin">
    <nav class="navbar navbar-expand-lg navbar-light bg-light position-fixed w-100">
        <a class="navbar-brand" href="#"></a>
        <div id="open-menu" class="menu-bar">
            <div class="bars"></div>
        </div>
        <?php include("../includes/lien_BOC.php"); ?>

        <div class="main-body-content w-100 ets-pt">
            <div class="table-responsive bg-light">
                <table class="table">

                    <?php


                    include("../includes/db_connexion.php");

                    // if (!isset($_SESSION['id']) && empty($_SESSION['id'])) {
                    // 	include("../Page_non_connecte.php");


                    //  					 }

                    if (!isset($_SESSION['email'])) {
                        include("../Page_non_connecte.php");
                    }else{
                        echo
                        "<tr>
						<th>ID Trottinette</th>
						<th>Reference de la trottinette</th>
  					    <th>Client qui loue</th>
  					    <th>Adresse du client </th>
      					<th>Numéro de téléphone</th>
  				</tr>";
                        $s = 'SELECT id,full_name,email,adress,phone_number
					FROM Users';
                        $req_select = $db->query($s);
                        $select = $req_select->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($select as $Users) {
                            $date = date_create($Users["email"]);
                            echo '<tr>
						 <td scope="row">(' . $Users['id'] .')</td>
						 <td scope="row">' . $Users['full_name'] .'</td>
						 <td scope="row">' . $Users['email'] .'</td>
						 <td scope="row">' . $Users['adress'] .'</td>
						 <td scope="row">' . $Users['phone_number'] .'</td>
				<td scope="row" id="modif">


<form action="modif-element.php?element=Users&id='.$Users['id'].'" method="post">
				<button type="button" class="btn btn-info btn-circle btn">Modifier<i class="glyphicon glyphicon-ok"></i></button>
					</form>
				</td>
							<td scope="row">
 						<form action="delete.php?table=users&id='.$Users['id'].'" method="post">
							<button type="submit" class="btn btn-danger btn-circle btn">Supprimer<i class="glyphicon glyphicon-heart"></i></button>
							</form>
							</td>
</tr>';
                        }}
                    echo "</table>";


                    ?>
<div style="text-align: center;">
    <h1>Trouver une trottinette</h1>
    <input type="text" name="id" placeholder="Saisir l'id de la trottinette"></input>
    <button onClick="showInfos()" class="btn btn-info btn-circle btn" >Trouver la position</button>
</div>

                    <script src="../includes/geolocation-example.js"></script>
                    <iframe width="100%" height="500" id="map"></iframe>
                </table>
            </div>
        </div>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery("#open-menu").click(function(){
            if(jQuery('#page-container').hasClass('show-menu')){
                jQuery("#page-container").removeClass('show-menu');
            }

            else{
                jQuery("#page-container").addClass('show-menu');
            }
        });
    });
</script>
</body>

</html>
