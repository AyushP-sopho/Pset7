<?php

    // configuration
    require("../includes/config.php"); 

    $id=CS50::query("SELECT id FROM users WHERE username=?",$_POST["username"]);
    $rows=CS50::query("SELECT * FROM shares WHERE user_id=?",$id);
    
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
    render("portfolio.php",["title" => "Portfolio","positions" => $positions]);
    
?>
