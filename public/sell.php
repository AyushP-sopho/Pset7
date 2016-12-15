<?php
    
    require("../includes/config.php");
    
    if($_SERVER["REQUEST_METHOD"]=="GET")
    {
        $stocks=CS50::query("SELECT * FROM shares WHERE user_id=? ", $_SESSION["id"]);
        render("sell_form.php",["title" => "Sell Quote","stocks" => $stocks]);
    }
    else if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST["symbol"]))
        {
            apologize("Please enter the symbol of stock to sell.");
        }
        if(empty($_POST["shares"]))
        {
            apologize("Please the number of shares to sell.");
        }
        
        $stock=CS50::query("");
        if($stock==false)
        {
            apologize("");
        }
    }
?>
    