<table class = "table table-striped" align = "center">
    <thead>
        <tr>
            <th>Transaction</th>
            <th>Symbol</th>
            <th>Time</th>
            <th>Shares</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($rows as $row): ?>
          <tr>
              <td align="left"><?= $row["transaction"] ?></td>
              <td align="left"><?= $row["symbol"] ?></td>  
              <td align="left"><?= $row["time"] ?></td>
              <td align="left"><?= $row["shares"] ?></td>
              <td align="left">$ <?= number_format($row["price"],2) ?></td>  
          </tr>
        <?php endforeach ?>
    </tbody>