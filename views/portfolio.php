
<table  class ="table table-striped" align="center">
    <thead>
        <tr>
            <th>Symbol</th>
            <th>Name</th>
            <th>Shares</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($positions as $position): ?>
          <tr>
              <td align="left"><?= $position["symbol"] ?></td>  
              <td align="left"><?= $position["name"] ?></td>
              <td align="left"><?= $position["shares"] ?></td>
              <td align="left">$ <?= number_format($position["price"],2) ?></td>  
          </tr>
        <?php endforeach ?>  
        <tr>
            <td colspan="3" align="left">CASH</td>
            <td align="left">$ <?= number_format($cash[0]["cash"],2) ?></td>
        </tr>
    </tbody>
</table>
