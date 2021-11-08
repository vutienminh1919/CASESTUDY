<form method="post" enctype="multipart/form-data">
    <input type="text" name="id" value="<?php echo $user['id'] ?>" hidden>
    <input type="text" name="name" value="<?php echo $user['name'] ?>">
    <input type="text" name="email" value="<?php echo $user['email'] ?>">
    <input type="text" name="password" value="<?php echo $user['password'] ?>">
    <input type="file" name="file" width="200px" value="<?php echo $user['image'] ?>">
    <button type="submit" name="upload">Upload</button>
    <button type="submit">EDIT</button>
</form>