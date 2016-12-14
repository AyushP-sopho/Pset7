<?php

    // configuration
    require("../includes/config.php"); 

    $rows=CS50::query("SELECT * FROM shares WHERE user_id = ? ", $_SESSION["id"]);
    $cash=CS50::query("SELECT cash FROM users where id = ?", $_SESSION["id"]);
   
    $positions=[];
    foreach($rows as $row)
    {
        $stock=lookup($row["symbol"]);
        if($stock!=false)
        {
            $positions[]=[
                "name" => $stock["name"],
                "symbol" => $row["symbol"],
                "price" => $stock["price"],
                "shares" => $row["shares"]
            ];
        }
    }
    render("portfolio.php",["title" => "Portfolio","positions" => $positions,"cash" => $cash]);
    
?>
