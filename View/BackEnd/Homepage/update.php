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
            <?php if (isset($Delete)) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><?= $Delete ?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <?php if (isset($Errors)) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><?= $Errors['errors'] ?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>


            <!--            creare Form-->
            <form action="/Admin/homepage/create" method="post" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Title</label>
                        <textarea id="summernote"  name="title"><?= $value['title'] ?></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">File</label>
                        <label for="inputPassword4">File</label>
                        <div class="image">
                            <img src="../../../storage/title_image/<?= $value['title_image'] ?>" alt="Core"
                                 style="height: 150px">
                        </div>
                        <div class="custom-file">
                            <input type="file" name="title_image" value="<?= $value['title_image'] ?>" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Banner Title</label>
                        <textarea id="summernote" name="banner_title"><?= $value['banner_title'] ?></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">File</label>
                        <div class="image">
                            <img src="../../../storage/banner_image/<?= $value['banner_image'] ?>" alt="Core"
                                 style="height: 150px">
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input"  name="banner_image" value="<?= $value['banner_image'] ?>" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
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
                                <th>Title</th>
                                <th>Title Image</th>
                                <th>Banner Title</th>
                                <th>Banner Image</th>
                                <th>DateTime</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Title Image</th>
                                <th>Banner Title</th>
                                <th>Banner Image</th>
                                <th>DateTime</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php
                            /** @var TYPE_NAME $homepages */
                            foreach ($homepages as $key => $note): ?>
                                <tr>
                                    <th scope="row"><?= $key + 1 ?></th>
                                    <td><?= $note['title'] ?></td>
                                    <td>
                                        <img src="../../../storage/title_image/<?= $note['title_image'] ?>" alt="Core"
                                             style="height: 150px">
                                    </td>
                                    <td><?= $note['banner_title'] ?></td>
                                    <td>
                                        <img src="../../../storage/banner_image/<?= $note['banner_image'] ?>" alt="Core"
                                             style="height: 150px">
                                    </td>
                                    <td><?= $note['timestamp'] ?></td>
                                    <td>
                                        <form method="post" action="/Admin/homepage/delete">
                                            <a href="/Admin/homepage/view?id=<?= $note['id'] ?>"
                                               class="btn btn-info">view</a>
                                            <a href="/Admin/homepage/edit?id=<?= $note['id'] ?>" class="btn btn-primary">Edit</a>
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


