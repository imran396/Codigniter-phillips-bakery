<h3>Products</h3>

<table class="table table-hover">

    <tr>
        <th>ID</th>
        <th>Title</th>
    </tr>

    <?php foreach ($products as $product): ?>
    <tr>
        <td><?php echo $product['id'] ?></td>
        <td><?php echo $product['title'] ?></td>
    </tr>
    <?php endforeach; ?>

</table>