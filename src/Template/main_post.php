<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">post</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($arr['data'] as $arrKey => $arrValue) { ?>
        <tr>
            <th scope="row"><?php echo $arrValue['id'] ?>  </th>
            <td><?php echo $arrValue['post'] ?> </td>
        </tr>
    <?php } ?>

    </tbody>
</table>
