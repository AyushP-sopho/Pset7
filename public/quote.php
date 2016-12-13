<?php

    // configuration
    require("../includes/config.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("get_symbol.php",["title" => "Quote"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(!empty($_SESSION["id"]))
        {
            if(!empty($_POST["symbol"]))
            {
                $stock=lookup($_POST["symbol"]);
                if($stock!=false)
                {
                    render("got_symbol.php",$stock);
                }
                else
                {
                    apologize("Symbol not found!");
                }
            }
            else
            {
                apologize("You must enter the symbol.");
            }
        }
        else
        {
            // else render login form
            render("login_form.php", ["title" => "Log In"]);
        }
    }
