<?php
    
    //Redirect to login and get other functions from CS50 and helpers
    require("../includes/config.php");
    
    //Get associative array with all the stocks for this user
    $rows=CS50::query("SELECT * FROM shares WHERE user_id=? ", $_SESSION["id"]);
    if($rows==false)
    {
        apologize("Nothing to sell.");
    }
    //----------------------------------------------------------------------------
    //Proceeds only when there are stocks to sell.
    
    //if arrived via a link show form
    if($_SERVER["REQUEST_METHOD"]=="GET")
    {
        render("sell_form.php",["title" => "Sell Quote","rows" => $rows]);
    }
    //if form has been submitted via form
    else if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST["symbol"]))
        {
            apologize("Please enter the symbol of stock to sell.");
        }
        if(empty($_POST["shares"]))
        {
            apologize("Please enter the number of shares to sell.");
        }
        
        //Check if shares to sell are not more than shares_held
        $shares_held=CS50::query("SELECT shares FROM shares WHERE user_id = ? AND symbol = ?", $_SESSION["id"], $_POST["symbol"]);
        
        if($shares_held==false)
        {
            apologize("You don't own any share of entered stock.");
        }
        
        if($shares_held[0]["shares"]<$_POST["shares"])
        {
            apologize("You don't own enough shares yet.");
        }
        
        $flag=0;
        if($shares_held[0]["shares"]=$_POST["shares"])
        {
            $flag=1;
        }
        
        //Calculate the price of stocks sold
        $stock=lookup($_POST["symbol"]);
        $sale=$stock["price"]*$_POST["shares"];
        
        //Decrease shares or remove entry
        if($flag==0)
        {
            $status=CS50::query("UPDATE shares SET shares = shares - ? WHERE user_id = ? AND symbol = ?", $_POST["shares"], $_SESSION["id"], $_POST["symbol"]);
        }
        else
        {
            $status=CS50::query("DELETE FROM shares WHERE user_id = ? AND symbol = ?", $_SESSION["id"], $_POST["symbol"]);
        }
        
        $var=CS50::query("UPDATE users SET cash = cash + ? WHERE id = ?", $sale, $_SESSION["id"]);
        if($status==false || $var==false)
        {
            apologize("We cannot sell your shares at this time.");
        }
        else
        {
            //Redirect to portfolio
            redirect("/");
        }
    }
?>
    