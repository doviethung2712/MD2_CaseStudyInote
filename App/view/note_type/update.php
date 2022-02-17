<div class="container">
    <form method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Loại</label>
            <input type="text" name="name" value="<?php echo $data->name ?>" class="form-control"
                   id="exampleInputEmail1" aria-describedby="emailHelp">
            <!--        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>