

<?php
include base_path('/View/BackEnd/procted/slider.php');
?>
    <!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <?php include base_path('/View/BackEnd/procted/navbar.php'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard1</h1>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            </div>
            <?php if (isset($Success)) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><?= $Success ?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <?php if(isset($Delete)) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><?= $Delete ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php endif; ?>



            <!--            creare Form-->
            <form action="/Admin/shop/color" method="post">
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" name="color_name" placeholder=" color name">
                        <?php if (isset($Errors['errors'])) : ?>
                            <p style="color: red"><?= $Errors['errors'] ?> </p>
                        <?php endif; ?>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="slug" placeholder="Last name">
                        <?php if (isset($Errors['errors'])) : ?>
                            <p style="color: red"><?= $Errors['errors'] ?> </p>
                            <!--                        --><?php
//                            unset($_SESSION['__flash']);
//                            ?>
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
                                <th>Name</th>
                                <th>Slug</th>
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
                            /** @var TYPE_NAME $notes */
                            foreach ($notes as $key => $note): ?>
                                <tr>
                                    <th scope="row"><?= $note['id'] +1 ?></th>
                                    <td><?= $note['name'] ?></td>
                                    <td><?= $note['slug'] ?></td>
                                    <td><?= $note['timestamp'] ?></td>
                                    <td>
                                        <form method="post" action="/Admin/role/delete">
                                            <a href="/Admin/role/view?id=<?= $note['id'] ?>"
                                               class="btn btn-info">view</a>
                                            <a href="/Admin/role/edit?id=<?= $note['id'] ?>" class="btn btn-primary">Edit</a>
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


