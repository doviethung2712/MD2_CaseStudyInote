
<a href="index.php?page=note-create" type="button" class="btn btn-success mt-3 mb-3">Create</a>
<table border="10" style="width: 50%;">
    <thead>
    <tr>
        <th>STT</th>
        <th>Title</th>
        <th>Content</th>
        <th>Phân Loại</th>
        <th colspan="2" style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
        <?php if (!empty($datas)) {
            foreach ($datas as $key => $data):?>
            <tr>
                <td><?php echo $key +1 ?></td>
                <td><?php echo $data->title ?></td>
                <td><?php echo $data->content ?></td>
                <td><?php echo $data->notename ?></td>
                <td><a href="index.php?page=note-update&id=<?php echo $data->id ?>">Update</a></td>
                <td><a href="index.php?page=note-delete&id=<?php echo $data->id ?>">Delete</a></td>
            </tr>
            <?php endforeach;
        } ?>
    </tbody>
</table>