<form action = "sell.php" method = "post">
    <fieldset>
        <div class = "form-group">
            <input list="symbols" autocomplete="off" name="symbol" placeholder="Symbol">
            <datalist id="symbols">
                <?php foreach($rows as $stock):?>
                 <option value="<?=$stock["symbol"]?>" >
                <?php endforeach ?>
            </datalist>    
        </div>
        <div class = "form-group">
            <input autocomplete = "off" name = "shares" placeholder = "Shares" type = "number" min = "1" step = "1"/>
        </div>
        <div class = "form-group">
            <button class = "btn btn-default" type = "submit">
                <span class = "glyphicon glyphicon-usd"></span>
                 Sell
            </button>
        </div>
    </fieldset>
</form>