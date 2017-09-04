/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function create_recipe(Name, prepTime, cookingTime) {
    $.ajax({
        type: "POST",
        data: "Name=" + Name + "&PrepTime=" + prepTime + "&CookingTime=" + cookingTime,
        dataType: "json",
        url: " http://api.10goto20.com/v1/recipe/OMAR14/",
        success: function (result) {
            location.reload();
        }
    });
}

function create_ingredient(Name, quantity, recipeID) {
    $.ajax({
        type: "POST",
        data: "Name=" + Name + "&Quantity=" + quantity,
        dataType: "json",
        url: "http://api.10goto20.com/v1/recipe/OMAR14/" + recipeID + "/ingredient/",
        success: function (result) {
            location.reload();
        }
    });
}

//Used to display the result in a table for my-recipes.php.
function get_users_recipes_table() {
    $.ajax({
        type: "GET",
        data: "createdby=OMAR14",
        dataType: "json",
        url: "http://api.10goto20.com/v1/recipe/OMAR14",
        success: function (result) {
            // IE7 only supports appending rows to tbody
            var table = document.getElementById("recipesTable");
            var tbody = document.createElement("tbody");
            // for each outer array row
            for (var i = 0; i < result.length; i++) {
                var tr = document.createElement("tr");
                tr.setAttribute("id", result[i]["Id"]);

                // for each inner array cell
                // create td then text, append
                for (var key in result[i]) {
                    if (key === "Name" || key === "CookingTime" || key === "PrepTime") {
                        var td = document.createElement("td");
                        td.setAttribute("id", key + "_text");
                        var txt = document.createTextNode(result[i][key]);
                        td.setAttribute("contenteditable", "true");
                        td.appendChild(txt);
                        tr.appendChild(td);
                    }
                }
                var td = document.createElement("td");
                var txt = document.createTextNode("DELETE");
                td.setAttribute("name", "delete_text");
                td.appendChild(txt);
                tr.appendChild(td);

                var td = document.createElement("td");
                var txt = document.createTextNode("UPDATE");
                td.setAttribute("name", "update_text");
                td.appendChild(txt);
                tr.appendChild(td);
                // append row to table
                // IE7 requires append row to tbody, append tbody to table
                tbody.appendChild(tr);
                table.appendChild(tbody);
            }

        }
    });
}


//Used to display the result in a table for my-ingredients.php.
function get_users_ingredients_table(recipeID) {
    $.ajax({
        type: "GET",
        data: "createdby=OMAR14",
        dataType: "json",
        url: "http://api.10goto20.com/v1/recipe/OMAR14/" + recipeID + "/ingredient",
        success: function (result) {
            // IE7 only supports appending rows to tbody
            var table = document.getElementById("ingredientsTable");
            var tbody = document.createElement("tbody");
            // for each outer array row
            for (var i = 0; i < result.length; i++) {
                var tr = document.createElement("tr");
                tr.setAttribute("id", result[i]["Id"]);

               //Create table cells with the correct values and attributes.
                for (var key in result[i]) {
                    if (key === "Name" || key === "Quantity") {
                        var td = document.createElement("td");
                        td.setAttribute("id", key + "_text");
                        var txt = document.createTextNode(result[i][key]);
                        td.setAttribute("contenteditable", "true");
                        td.appendChild(txt);
                        tr.appendChild(td);
                    }
                }
                var td = document.createElement("td");
                var txt = document.createTextNode("DELETE");
                td.setAttribute("name", "delete_text");
                td.appendChild(txt);
                tr.appendChild(td);

                var td = document.createElement("td");
                var txt = document.createTextNode("UPDATE");
                td.setAttribute("name", "update_text");
                td.appendChild(txt);
                tr.appendChild(td);
                // append row to table
                // IE7 requires append row to tbody, append tbody to table
                tbody.appendChild(tr);
                table.appendChild(tbody);
            }

        }
    });
}

//Used to display the result in a drop down list for my-ingredients.php and create-ingredients.php.
function get_users_recipes_dropdownlist() {
    $.ajax({
        type: "GET",
        data: "createdby=OMAR14",
        dataType: "json",
        url: "http://api.10goto20.com/v1/recipe/OMAR14",
        success: function (result) {
            // for each outer array row
            for (var i = 0; i < result.length; i++) {
                
               //Create dropdown list options with the correct values and attributes.
                for (var key in result[i]) {
                    if (key === "Name") {
                        var option = document.createElement("option");
                        option.text = result[i]["Name"];
                        option.value = result[i]["Id"];
                        var select = document.getElementById("dropdown");
                        select.appendChild(option);
                    }
                }
                ;
            }
        }
    });
}


function delete_recipe(recipeID) {
    $.ajax({
        type: "DELETE",
        url: "http://api.10goto20.com/v1/recipe/OMAR14/" + recipeID,
        success: function (result) {
            location.reload();
            // Do something with the result
        }
    });
}

function delete_ingredient(recipeID, ingredientID) {
    $.ajax({
        type: "DELETE",
        url: "http://api.10goto20.com/v1/recipe/OMAR14/" + recipeID + "/ingredient/" + ingredientID,
        success: function (result) {
            location.reload();
            // Do something with the result
        }
    });
}

function update_recipe(recipeID, Name, prepTime, cookingTime) {
    $.ajax({
        type: "PUT",
        data: "Name=" + Name + "&PrepTime=" + prepTime + "&CookingTime=" + cookingTime,
        url: " http://api.10goto20.com/v1/recipe/OMAR14/" + recipeID,
        success: function (result) {
            location.reload();
        }
    });
}

function update_ingredient(ingredientID, Name, quantity, recipeID) {
    $.ajax({
        type: "PUT",
        data: "Name=" + Name + "&Quantity=" + quantity,
        url: " http://api.10goto20.com/v1/recipe/OMAR14/" + recipeID + "/ingredient/" + ingredientID,
        success: function (result) {
            location.reload();
        }
    });
}