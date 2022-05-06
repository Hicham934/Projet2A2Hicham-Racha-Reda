<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


<body>

<div class="container" style="margin-top: 8%;" >
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Produits</th>
                        <th>Quantités</th>
                        <th class="text-center">Prix</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="images/e.jpg" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#">Nom du Produit</a></h4>

                                <span>Status: </span><span class="text-success"><strong>En Stock</strong></span>
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="email" class="form-control" id="exampleInputEmail1" value="3">
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>4.87€</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>14.61€</strong></td>
                        <td class="col-sm-1 col-md-1">
                        <button type="button" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> Supprimer
                        </button></td>
                    </tr>
    
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong>31.53€</strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        
                        <button type="button" class="btn btn-default">
                              <a href="article.php"> <span class="glyphicon glyphicon-shopping-cart"></span> Continuer mes achats</a> 
                        </button></td>
                        <td>
                             <a href="https://buy.stripe.com/test_6oE5n9g7BdRl4Qo4gg">
                         <button type="button" class="btn btn-success">
                             Paiement <span class="glyphicon glyphicon-play"></span>
                        </button></a></td>
                        
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>