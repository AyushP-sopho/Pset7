
<table class = "table table-striped">
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
              <td><?= $row["transaction"] ?></td>
              <td><?= $row["symbol"] ?></td>  
              <td><?= $row["time"] ?></td>
              <td><?= $row["shares"] ?></td>
              <td>$ <?= number_format($row["price"],2) ?></td>  
          </tr>
        <?php endforeach ?>
    </tbody>
</table>