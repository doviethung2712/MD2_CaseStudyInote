
<a href="index.php?page=note-create" type="button" class="btn btn-success mt-3 mb-3">Create</a>
<table border="10">
    <thead>
    <tr>
        <th>Title</th>
        <th>Content</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
        <?php if (!empty($datas)) {
            foreach ($datas as $data):?>
            <tr>
                <td><?php echo $data->title ?></td>
                <td><?php echo $data->content ?></td>
                <td><a href="index.php?page=note-update&id=<?php echo $data->id ?>">Update</a></td>
                <td><a href="index.php?page=note-delete&id=<?php echo $data->id ?>">Delete</a></td>
            </tr>
            <?php endforeach;
        } ?>
    </tbody>
</table>