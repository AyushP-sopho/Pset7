<?php
    
    //Redirect to login and get other functions from CS50 and helpers
    require("../includes/config.php");
    
    $rows=CS50::query("SELECT * FROM history WHERE user_id = ?", $_SESSION["id"]);
        
    render("history_view.php",["title" => "History", "rows" => $rows]);
    
?>