<?php
    
    //Redirect to login and get other functions from CS50 and helpers
    require("../includes/config.php");
    
    //if arrived via a link show form
    if($_SERVER["REQUEST_METHOD"]=="GET")
    {
        render("buy_form.php",["title" => "Buy Asset"]);
    }
    //if form has been submitted via form
    else if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST["symbol"]))
        {
            apologize("You did not enter the symbol of stock to buy.");
        }
        if(empty($_POST["shares"]))
        {
            apologize("You did not enter the number of shares to buy.");
        }
        
        //Get the stock
        $stock=lookup($_POST["symbol"]);
        if($stock==false)
        {
            apologize("Symbol not found.");
        }
        $price=$stock["price"]*$_POST["shares"];
        
        $row=CS50::query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
        if($row[0]["cash"]<$price)
        {
            apologize("You cannot afford that");
        }

        //Add the shares and spend cash        
        $status_1=CS50::query("INSERT INTO shares (user_id, symbol, shares) VALUES(?,?,?) ON DUPLICATE KEY UPDATE shares = shares + ?", $_SESSION["id"], $stock["symbol"], $_POST["shares"], $_POST["shares"] );
        $status_2=CS50::query("UPDATE users SET cash = cash - ? WHERE id = ?", $price, $_SESSION["id"]);
    
        if($status_1 == false || $status_2 == false)
        {
            apologize("We cannot process your request at this moment.");
        }
        else
        {
            //Update logs
            $log=CS50::query("INSERT INTO history (user_id, symbol, shares,transaction,price) VALUES(?,?,?,'Buy',?)", $_SESSION["id"], $stock["symbol"], $_POST["shares"], $stock["price"]);
            
            //Redirect to index 
            redirect("/");
        }
    }
    
?>
