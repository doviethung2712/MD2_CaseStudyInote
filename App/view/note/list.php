<a href="index.php?page=note-create" type="button" class="btn btn-primary mt-3 mb-3">Create</a>
<table border="10" style="width: 100%; text-align: center;">
    <thead>
    <tr>
        <th>STT</th>
        <th>Title</th>
        <th>Content</th>
        <th><a href="index.php?page=note-create-type" >Phân Loại</a></th>
        <th colspan="3" style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php if (!empty($datas)) {
        foreach ($datas as $key => $data):?>
            <tr>
                <td><?php echo $key + 1 ?></td>
                <td><?php echo $data->title ?></td>
                <td><?php echo $data->content ?></td>
                <td><a href="index.php?page=note-update-type&id=<?php echo $data->idnotetype ?>"><?php echo $data->notename ?></a></td>
                <td><a type="button" class="btn btn-success"
                       href="index.php?page=note-update&id=<?php echo $data->id ?>">Update</a></td>
                <td><a type="button" class="btn btn-danger" onclick="return confirm('Bạn có chắc không ?')"
                       href="index.php?page=note-delete&id=<?php echo $data->id ?>">Delete</a></td>
                <td><a type="button" class="btn btn-info" href="index.php?page=note-show&id=<?php echo $data->id ?>">Show</a>
                </td>
            </tr>
        <?php endforeach;
    } ?>
    </tbody>
</table>