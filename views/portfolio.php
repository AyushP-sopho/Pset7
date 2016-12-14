<!--
<div>
    <iframe allowfullscreen frameborder="0" height="315" src="https://www.youtube.com/embed/oHg5SJYRHA0?autoplay=1&iv_load_policy=3&rel=0" width="420"></iframe>
</div>
-->

<table  class ="table" border="1px" align="center">
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
              <td><?php print($position["symbol"]) ?></td>  
              <td><?=$position["name"] ?></td>  
              <td><?=$position["shares"] ?></td>
              <td><?=$position["price"] ?></td>  
          </tr>
        <?php endforeach ?>  
        <tr>
            <td colspan="3" align="left">CASH</td>
            <td><?php  print($cash[0]["cash"]); ?></td>
        </tr>
    </tbody>
    
</table>
