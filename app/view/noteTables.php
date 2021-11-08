<div class="container-fluid">
    <div class="card mt-4">
        <div class="row card-header" style="--bs-gutter-x:0">
            <div class=" title col-6">
                <h4 style="text-align: center">NOTES DETAIL</h4>
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

            </div>
        </div>

        <div class="card-body">

            <table class="table">
                <thead class="table-dark">
                <tr>
                    <th>Number</th>
                    <th>ID</th>
                    <th>Note Type Name</th>
                    <th>Content</th>
                    <th>Email</th>
                    <th>Image</th>
                </tr>
                </thead>
                <tbody>
                <?php if (isset($noteTables)): ?>
                    <?php
                    foreach ($noteTables as $key => $noteTable): ?>
                        <tr>
                            <td><?php echo $key+1 ?> </td>
                            <td><?php echo $noteTable["id"] ?></td>
                            <td><?php echo $noteTable["name"] ?></td>
                            <td><?php echo $noteTable["content"] ?></td>
                            <td><?php echo $noteTable["email"] ?></td>
                            <td><img width="100px" src="<?php echo $noteTable["image"]?>"</td>
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




