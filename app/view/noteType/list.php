<div class="container-fluid">
    <div class="card mt-4">
        <div class="row card-header" style="--bs-gutter-x:0">
            <div class=" title col-6">
                <h4 style="text-align: center">NOTE TYPE MANAGEMENT</h4>
            </div>
            <div class="col-6">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Launch demo modal
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <a type="button" class="btn btn-primary mt-3 mb-3 pe-3 ps-3" href="index.php?page=noteType-create">add
                    new
                    note type</a>
            </div>
        </div>

        <div class="card-body">

            <table class="table">
                <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>

                    <th colspan="3" style="text-align: center">Action</th>

                </tr>
                </thead>
                <tbody>
                <?php if (isset($noteTypes)): ?>
                    <?php foreach ($noteTypes as $noteType): ?>
                        <tr>
                            <td><?php echo $noteType["id"] ?></td>
                            <td><?php echo $noteType["name"] ?></td>
                            <td><?php echo $noteType["description"] ?></td>

                            <td><a type="button" class="btn btn-dark"
                                   href="index.php?page=noteType-detail&id=<?php echo $noteType["id"] ?>">Detail</a>
                            </td>
                            <td><a type="button" class="btn btn-danger" onclick="return confirm('Are you sure ?')"
                                   href="index.php?page=noteType-delete&id=<?php echo $noteType["id"] ?>">Delete</a>
                            </td>
                            <td><a type="button" class="btn btn-success"
                                   href="index.php?page=noteType-edit&id=<?php echo $noteType["id"] ?>">Edit</a></td>

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



