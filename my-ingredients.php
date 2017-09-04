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
        <link href="./css/materialize.css?v=1" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css">
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick-theme.css">
        <link href="./css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

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
                <h2 class="header">My ingredients</h2>
                <div class="row">
                    <div class="input-field col s3">
                        <select id="dropdown">
                        </select>
                        <label for="dropdown">Recipe</label>
                    </div>
                </div>
                <div class="row">
                    <table id="ingredientsTable">
                        <thead>
                            <tr>
                                <th>Quantity</th>
                                <th>Name</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <main></main>
        <!--Import jQuery before materialize.js-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-migrate-git.min.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script><!-- Compiled and minified JavaScript -->
        <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
        <script src="./js/json_manager.js?v=7" type="text/javascript"></script>      
        <script>
            get_users_recipes_dropdownlist();
            $(document).ready(function () {
                $(".button-collapse").sideNav();
                $('.scrollspy').scrollSpy();
                $('select').material_select();

                var recipeID = $("#dropdown").val();//ID of the recipe selected.
                get_users_ingredients_table(recipeID);//Display ingredients from default selected recipe.


                $('#dropdown').change(function () {
                    //Clears table for next set of ingredients for a recipe.
                    $("#ingredientsTable tbody").remove();
                    var recipeID = $("#dropdown").val();//ID of the recipe selected.
                    get_users_ingredients_table(recipeID);//Display ingredients from recipe.
                });

                //Checks for the specific delete link in the table in order to get the ingredient ID.
                $("#ingredientsTable").on("click", "[name=delete_text]", function () {
                    var recipeID = $("#dropdown").val();//ID of the recipe selected.
                    var rowID = $(this).parent().attr('id');//ID of the ingredient clicked. 
                    delete_ingredient(recipeID, rowID);
                });
                //Checks for the specific update link in the table in order to get the ingredient ID.
                $("#ingredientsTable").on("click", "[name=update_text]", function () {
                    var recipeID = $("#dropdown").val();//ID of the recipe selected.
                    var rowID = $(this).parent().attr('id');
                    //Updates the values only from the row which was clicked.
                    var ingredientName = $("#" + rowID + " #Name_text").text();
                    var quantity = $("#" + rowID + " #Quantity_text").text();
                    //Updates that row of data.
                    update_ingredient(rowID, ingredientName, quantity, recipeID);
                });
            });
        </script>
    </body>        

</html>
