<?php
?>


<?php
include base_path('/View/BackEnd/procted/slider.php');
//include base_path('/View/FrontEnd/procted/message.php');
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
                                <th>price</th>
                                <th>Quantity</th>
                                <th>color</th>
                                <th>size</th>
                                <th>Payment Method</th>
                                <th>Payment</th>
                                <th>Date</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>name</th>
                                <th>image</th>
                                <th>price</th>
                                <th>Quantity</th>
                                <th>color</th>
                                <th>size</th>
                                <th>Payment Method</th>
                                <th>payment</th>
                                <th></th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php
                            /** @var array $orders */
                            foreach ($orders as $key => $note): ?>
                                <tr>
                                    <th scope="row"><?php echo $key + 1 ?></th>
                                    <td><?php echo $note['name'] ?></td>
                                    <td>
                                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="width: 150px">
                                            <div class="carousel-inner">
                                                    <?php $imagess = $note['image'];
                                                $data = unserialize($imagess);
                                                ?>
                                                <?php foreach ($data
                                                               as $key => $imaage): ?>
                                                    <div class="carousel-item <?php echo $key == 0 ? 'active' : '' ?>">
                                                        <img src="../../../storage/shop/<?php echo $data[$key] ?>"
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

                                    <td><?php echo $note['price'] ?></td>
                                    <td><?php echo $note['total_quantity'] ?></td>
                                    <td><?php echo $note['color'] ?></td>
                                    <td><?php echo $note['size'] ?></td>
                                    <td class="<?php echo $note['payment'] == 'paid' ? 'text-success' : 'text-danger' ?>"><?php echo $note['payment'] ?></td>
                                    <td class=""><?= ($note['payment_method']==0) ? 'Cash On Delivery' : 'Online Payment' ?></td>
                                    <td><?php echo $note['timestamp'] ?></td>

                                    <td>
                                        <form method="post" action="/Admin/shop/delete">
                                            <a href="/Admin/shop/edit?id=<?php echo $note['id'] ?>"
                                               class="btn btn-primary">Edit</a>
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                            <input type="hidden" name="id" value="<?php echo $note['id'] ?>">
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
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->



