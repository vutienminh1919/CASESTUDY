<form method="post">
    <input type="text" name="id" value="<?php echo $noteType['id'] ?>" hidden>
    <input type="text" name="name" value="<?php echo $noteType['name'] ?>">
    <input type="text" name="description" value="<?php echo $noteType['description'] ?>">
    <button type="submit" class="btn btn-primary">Update</button>
</form>
