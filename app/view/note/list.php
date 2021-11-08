<div class="container-fluid">
    <div class="card mt-4">
        <div class="row card-header" style="--bs-gutter-x:0">
            <div class=" title col-6">
                <h4 style="text-align: center">NOTE MANAGEMENT</h4>
            </div>
            <div class="col-6">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Launch demo modal
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                <a type="button"  class="btn btn-primary mt-3 mb-3 pe-3 ps-3" href="index.php?page=note-create">add new
                    note</a>
            </div>
        </div>

        <div class="card-body">

            <table class="table">
                <thead class="table-dark">
                <tr>
                    <th>Number</th>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Type_id</th>
                    <th>User_id</th>
                    <th colspan="3" style="text-align: center">Action</th>

                </tr>
                </thead>
                <tbody>
                <?php if (isset($notes)): ?>
                    <?php
                    foreach ($notes as $key => $note): ?>
                        <tr>
                            <td><?php echo $key+1 ?> </td>
                            <td><?php echo $note["id"] ?></td>
                            <td><?php echo $note["title"] ?></td>
                            <td><?php echo $note["content"] ?></td>
                            <td><?php echo $note["type_id"] ?></td>
                            <td><?php echo $note["user_id"] ?></td>
                            <td><a type="button" class="btn btn-dark""
                                href="index.php?page=note-detail&id=<?php echo $note["id"] ?>">Detail</a></td>
                            <td><a type="button" class="btn btn-danger" onclick="return confirm('Are you sure ?')"
                                   href="index.php?page=note-delete&id=<?php echo $note["id"] ?>">Delete</a></td>
                            <td><a type="button" class="btn btn-success"
                                   href="index.php?page=note-edit&id=<?php echo $note["id"] ?>">Edit</a></td>

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



