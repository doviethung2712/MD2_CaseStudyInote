<div class="container">
    <form method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <!--        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Content</label>
            <input type="text" name="content" class="form-control" id="exampleInputPassword1">
        </div>
        <div>
            <select name="type_id">
                <?php foreach ($noteType as $note): ?>
                    <option value="<?php echo $note->id ?>"><?php echo $note->name ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <br>
        <div>
            <input type="file" name="image" id="fileToUpload">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>