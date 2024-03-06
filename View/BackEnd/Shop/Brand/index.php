

<?php
include base_path('/View/BackEnd/procted/slider.php');
?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <?php include base_path('/View/BackEnd/procted/navbar.php');
        include base_path('/View/Frontend/procted/message.php');
        ?>



        <!--            creare Form-->
        <form action="/Admin/brand/create" method="post">
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" name="name" placeholder=" name">
                    <?php if (isset($Errors['errors'])) : ?>
                        <p style="color: red"><?= $Errors['errors'] ?> </p>
                    <?php endif; ?>
                </div>
            </div>
            <!--                submit -->
            <div class="form-group row m-4">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>

        <!--                        table-->
        <!--             DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Categories</th>
                            <th>DateTime</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>DateTime</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <?php
                        /** @var TYPE_NAME $brands */
                        foreach ($brands as $key => $note): ?>
                            <tr>
                                <th scope="row"><?= $note['id'] +1 ?></th>
                                <td><?= $note['name'] ?></td>
                                <td><?= $note['timestamp'] ?></td>
                                <td>
                                    <form method="post" action="/Admin/brand/delete">
                                        <a href="/Admin/brand/view?id=<?= $note['id'] ?>"
                                           class="btn btn-info">view</a>
                                        <a href="/Admin/brand/edit?id=<?= $note['id'] ?>" class="btn btn-primary">Edit</a>
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                        <input type="hidden" name="id" value="<?= $note['id'] ?>">
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->


<?php
