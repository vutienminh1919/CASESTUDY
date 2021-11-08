<form method="post">
    <input type="text" name="id" value="<?php echo $note['id'] ?>" hidden>
    <input type="text" name="title" value="<?php echo $note['title'] ?>">
    <input type="text" name="content" value="<?php echo $note['content'] ?>">
    <input type="text" name="type_id" value="<?php echo $note['type_id'] ?>">
    <input type="text" name="user_id" value="<?php echo $note['user_id'] ?>">
    <button type="submit" class="btn btn-primary">Update</button>
</form>
