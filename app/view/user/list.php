<div class="container-fluid">
    <div class="card mt-4">
        <div class="row card-header" style="--bs-gutter-x:0">
            <div class=" title col-6">
                <h4 style="text-align: center">USERS MANAGEMENT</h4>
            </div>
            <div class="col-6">
            </div>
        </div>
    </div>
</div>
</div>

<div class="card-body">

    <table class="table">
        <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th colspan="3" style="text-align: center">Action</th>

        </tr>
        </thead>
        <tbody>
        <?php if (isset($users)): ?>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user["id"] ?></td>
                    <td><img width="100px" src="<?php echo $user["image"]?>"</td>
                    <td><?php echo $user["name"] ?></td>
                    <td><?php echo $user["email"] ?></td>

                    <td><a type="button" class="btn btn-dark""
                        href="index.php?page=user-detail&id=<?php echo $user["id"] ?>">Detail</a></td>
                    <td><a type="button" class="btn btn-dark""
                        href="index.php?page=user-edit&id=<?php echo $user["id"] ?>">Edit</a></td>
                    <td><a type="button" class="btn btn-danger" onclick="return confirm('Are you sure ?')"
                           href="index.php?page=user-delete&id=<?php echo $user["id"] ?>">Delete</a></td>

                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">Khong co gi hien thi ca</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

</div>
</div>



