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
                <?php foreach ($Errors as $key => $error) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><?= $error ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>


            <!--            creare Form-->
            <form action="/Admin/shop/create" method="post" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Name</label>
                        <textarea id="summernote" name="name"></textarea>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Descriptions</label>
                        <textarea id="summernote" name="details"></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Files</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="images[]" multiple="multiple"
                                   id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class=" form-row">
                    <div class="form-group col-md-4">
                        <label for="inputCity">Color</label>
                        <select id="inputState" name="color" class="form-control">
                            <option selected>Choose...</option>
                            <option>black</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Size</label>
                        <select id="inputState" name="size" class="form-control">
                            <option selected>Choose...</option>
                            <option>xl</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputZip">Category</label>
                        <select id="inputState" name="category" class="form-control">
                            <option selected>Choose...</option>
                            <option>man</option>
                        </select>
                    </div>

                </div>

                <div class=" form-row">
                    <div class="form-group col-md-3">
                        <label for="inputCity">Price</label>
                        <input type="number" name="price" class="form-control" id="inputZip">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputState">New Price</label>
                        <input type="number" name="new_price" class="form-control" id="inputZip">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputZip">Discount</label>
                        <input type="number" name="discount" class="form-control" id="inputZip">
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
                                <th>name</th>
                                <th>image</th>
                                <th>details</th>
                                <th>price</th>
                                <th>new price</th>
                                <th>color</th>
                                <th>size</th>
                                <th>Discount</th>
                                <th>Discount</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>name</th>
                                <th>image</th>
                                <th>details</th>
                                <th>price</th>
                                <th>new price</th>
                                <th>color</th>
                                <th>size</th>
                                <th>Discount</th>
                                <th>Discount</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php
                            /** @var TYPE_NAME $homepages */
                            foreach ($homepages as $key => $note): ?>
                                <tr>
                                    <th scope="row"><?= $key + 1 ?></th>
                                    <td><?= $note['name'] ?></td>
                                    <td>
                                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="width: 150px">
                                            <div class="carousel-inner">
                                                    <?php $imagess = $note['image'];
                                                    $data = unserialize($imagess);
                                                    ?>
                                                    <?php foreach ($data
                                                    as $key => $imaage): ?>
                                                        <div class="carousel-item <?= $key == 0 ? 'active' : '' ?>">
                                                    <img src="../../../storage/shop/<?= $data[$key] ?>"
                                                         class="d-block  w-100" alt="..." style="height: 110px">
                                                </div>
                                                <?php endforeach; ?>
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleControls"
                                               role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleControls"
                                               role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </td>

                                    <td><?= $note['details'] ?></td>
                                    <td><?= $note['price'] ?></td>
                                    <td><?= $note['new_price'] ?></td>
                                    <td><?= $note['color'] ?></td>
                                    <td><?= $note['size'] ?></td>
                                    <td><?= $note['discount'] ?></td>
                                    <td><?= $note['timestamp'] ?></td>

                                    <td>
                                        <form method="post" action="/Admin/shop/delete">
                                            <a href="/Admin/shop/edit?id=<?= $note['id'] ?>"
                                               class="btn btn-primary">Edit</a>
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


