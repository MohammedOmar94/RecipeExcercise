<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>      
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>Recipe Exercise</title>

        <!-- CSS  -->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"><!--Import Google Icon Font-->  
        <link href="./css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="./css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link rel="stylesheet" type="text/css" href="./css/sweetalert.css">
    </head>
    <body>  
        <ul id="account-dropdown-mobile" class="dropdown-content">
            <li><a href="my-recipes.php"><i class="material-icons left">cake</i>My recipes</a></li>
            <li><a href="my-ingredients.php"><i class="material-icons left">kitchen</i>My ingredients</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li><a href="index.php">Create recipes</a></li>
            <li><a href="create-ingredients.php">Create ingredients</a></li>
            <li><a class="dropdown-button" href="#!" data-activates="account-dropdown-mobile"><i class="material-icons left">account_circle</i>Account<i class="material-icons right">arrow_drop_down</i></a></li>
        </ul>
        <div class="navbar-fixed">
            <!-- Dropdown Structure -->
            <ul id="account-dropdown" class="dropdown-content">
                <li><a href="my-recipes.php"><i class="material-icons left">cake</i>My recipes</a></li>
                <li><a href="my-ingredients.php"><i class="material-icons left">kitchen</i>My ingredients</a></li>
            </ul>
            <nav class="nav-extended grey lighten-4">
                <div class="nav-wrapper container">
                    <a href="index.php" class="brand-logo">Recipe Exercise</a>
                    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a href="index.php">Create recipes</a></li>
                        <li><a href="create-ingredients.php">Create ingredients</a></li>
                        <li><a class="dropdown-button" href="#!" data-activates="account-dropdown"><i class="material-icons left">account_circle</i>Account<i class="material-icons right">arrow_drop_down</i></a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="container">
        </div>  
        <div id="Create" class="section scrollspy">
            <div class="row container">
                <h2 class="header">Create recipe</h2>
                <div class="row">
                    <form class="col s12">
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="Name" type="text" class="validate">
                                <label for="Name">Recipe name</label>
                            </div>
                            <div class="input-field col s6">
                                <input placeholder="e.g. About 10 minutes"id="prepTime" type="text" class="validate">
                                <label for="prepTime">Preparation time</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input placeholder="e.g. About 20 minutes" id="cookingTIme" type="text" class="validate">
                                <label for="cookingTIme">Cooking time</label>
                            </div>
                        </div>
                    </form>
                    <div class="col s6">
                        <a id="create_button" class="waves-effect waves-light btn">Create</a>
                    </div>
                </div>
            </div>
        </div>
        <main></main>
        <!--Import jQuery before materialize.js-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-migrate-git.min.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script><!-- Compiled and minified JavaScript -->
        <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
        <script src="./js/sweetalert.min.js" type="text/javascript"></script>
        <script src="./js/json_manager.js?v=5" type="text/javascript"></script>      
        <script>
            $(document).ready(function () {
                $(".button-collapse").sideNav();
                $('.scrollspy').scrollSpy();
            });

            $("#create_button").click(function () {
                var recipeName = $("#Name").val();
                var prepTime = $("#prepTime").val();
                var cookingTime = $("#cookingTIme").val();
                if (recipeName === '' || prepTime === '' || cookingTime === '') {
                    sweetAlert("Oops...", "All fields must be filled in!", "info");
                } else {
                    create_recipe(recipeName, prepTime, cookingTime);
                }
            });
        </script>
    </body>        

</html>
