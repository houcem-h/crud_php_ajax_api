<?php

/**
 * Created by PhpStorm.
 * User: Houcem
 * Date: 24/02/2017
 * Time: 12:10
 */
require_once 'classes/dbconnect.class.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Accueil</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php include_once 'templates/navbar.php' ?>
    <br><h1 class="text-center">Gestion de comptes et tansactions bancaires</h1><br>
    <section>
        <div class="card-deck mb-3">            
            <!-- panel des clients -->
            <div class="card mb-4 shadow-sm">
                <div class="card-header text-center">
                    <h4 class="my-0 font-weight-normal">Clients</h4>
                </div>
                <div class="card-body">
                    <!-- <h1 class="card-title pricing-card-title">$0 <small class="text-muted">/ mo</small></h1> -->
                    Accéder à la section de gestion des clients :
                    <ul class="list mt-3 mb-4">
                        <li>Ajouter un nouveau client, modifier, supprimer</li>
                        <li>Afficher un état</li>
                        <li>etc.</li>
                    </ul>
                    <a href="mgrClients.php?active=clients">
                        <button type="button" class="btn btn-lg btn-block btn-outline-primary">Accéder à la page clients</button>
                    </a>
                </div>
            </div>
            <!-- panel des comptes -->
            <div class="card mb-4 shadow-sm">
                <div class="card-header text-center">
                    <h4 class="my-0 font-weight-normal">Comptes</h4>
                </div>
                <div class="card-body">
                    <!-- <h1 class="card-title pricing-card-title">$0 <small class="text-muted">/ mo</small></h1> -->
                    Accéder à la section de gestion des comptes :
                    <ul class="list mt-3 mb-4">
                        <li>Ajouter un nouveau compte, modifier, supprimer</li>
                        <li>Afficher un état</li>
                        <li>etc.</li>
                    </ul>
                    <a href="mgrComptes.php?active=comptes">
                        <button type="button" class="btn btn-lg btn-block btn-outline-primary">Accéder à la page comptes</button>
                    </a>
                </div>
            </div>
            <!-- panel des transactions -->
            <div class="card mb-4 shadow-sm">
                <div class="card-header text-center">
                    <h4 class="my-0 font-weight-normal">Transactions</h4>
                </div>
                <div class="card-body">
                    <!-- <h1 class="card-title pricing-card-title">$0 <small class="text-muted">/ mo</small></h1> -->
                    Accéder à la section des transactions bancaires :
                    <ul class="list mt-3 mb-4">
                        <li>Ajouter une nouvelle transactions, modifier, supprimer</li>
                        <li>Afficher un état</li>
                        <li>etc.</li>
                    </ul>
                    <a href="mgrTransactions.php?active=transactions">
                        <button type="button" class="btn btn-lg btn-block btn-outline-primary">Accéder à la page transactions</button>
                    </a>
                </div>
            </div>            
            <!-- fin panel des transactions -->
        </div>
    </section>
</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>