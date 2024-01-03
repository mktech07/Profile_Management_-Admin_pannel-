<?= $this->extend('layout/app_layout') ?>


<?= $this->section('content') ?>


<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>DataTables</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <!-- {{-- <li class="breadcrumb-item">DataTables</li> --}} -->

                    </ol>
                </div>
                <!-- {{-- Printing Message --}} -->
                <?php if (!empty($session->getFlashdata('success'))) {
                    ?>
                <div class="container alert alert-success alert-dismissible fade show mt-3" role="alert">
                    <strong>
                        <?php echo $session->getFlashdata('success') ?>
                    </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?>

                <?php if (!empty($session->getFlashdata('error'))) {
                    ?>
                <div class="container alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    <strong>
                        <?php echo $session->getFlashdata('error') ?>
                    </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?>


                <!-- {{-- Printing Messag eend --}} -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- {{-- Delete Model Starts --}} -->
    <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Customer </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo base_url('user/delete') ?>" method="POST">


                    <h4>Confirm to Delete ?</h4>
                    <input type="hidden" id="deleting_id" name="delete_user_id">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Yes Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- {{-- Delete Model end --}} -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <!-- {{-- searching --}} -->
                            <form method="GET" action="" class="">
                                <div class="row">
                                    <div class="col-md-2 col-sm-4">
                                        <input class="form-control" value="<?= service('request')->getGet('name') ?>"
                                            name="name" type="text" placeholder="Name">
                                    </div>
                                    <div class="col-md-2 col-sm-4">
                                        <input class="form-control" value="<?= service('request')->getGet('email') ?>"
                                            name="email" type="text" placeholder="email">
                                    </div>
                                    <div class="col-md-2 col-sm-4">
                                        <select name="gender" id="gender" class=" form-control">
                                            <option value="" class="text-muted">Select</option>
                                            <option value="male"
                                                <?= service('request')->getGet('gender') == 'male' ? 'selected' : '' ?>>
                                                Male
                                            </option>
                                            <option value="female"
                                                <?= service('request')->getGet('gender') == 'female' ? 'selected' : '' ?>>
                                                Female
                                            </option>
                                            <option value="other"
                                                <?= service('request')->getGet('gender') == 'other' ? 'selected' : '' ?>>
                                                Other
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-md-2 col-sm-4">
                                        <input class="form-control"
                                            value="<?= service('request')->getGet('designation') ?>" name="designation"
                                            type="text" placeholder="Designation">
                                    </div>

                                    <div class="col-md-2 col-sm-4">
                                        <input class="form-control"
                                            value="<?= service('request')->getGet('education') ?>" name="education"
                                            type="text" placeholder="education">
                                    </div>

                                    <div class="col-md-2 col-sm-4">
                                        <input class="form-control" value="<?= service('request')->getGet('mobile') ?>"
                                            name="mobile" type="text" placeholder="mobile">
                                    </div>

                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-2 col-sm-4">
                                        <input class="form-control" value="<?= service('request')->getGet('address') ?>"
                                            name="address" type="text" placeholder="Address">
                                    </div>

                                    <div class="col-md-2 col-sm-4">
                                        <input class="form-control" value="<?= service('request')->getGet('city') ?>"
                                            name="city" type="text" placeholder="City">
                                    </div>

                                    <!-- -------------------------------------------------- -->
                                    <div class="col-md-4 col-sm-6">
                                        <input type="text" name="daterange"
                                            value="<?= service('request')->getGet('daterange') ?>" class="form-control"
                                            autocomplete="off" placeholder="Select a Date Range" />
                                    </div>


                                    <!-- -------------------------------------------------- -->

                                    <!-- <div class="col-md-2 col-sm-4">
                                        <input class="form-control" value="<?= service('request')->getGet('from') ?>"
                                            id="from" autocomplete="off" name="from" type="text" placeholder="from">
                                    </div> -->
                                    <!-- <div class="col-md-2 col-sm-4">
                                        <input class="form-control" value="<?= service('request')->getGet('to') ?>"
                                            id="to" autocomplete="off" name="to" type="text" placeholder="to">
                                    </div> -->



                                    <div class="col-md-2 col-sm-4  ">

                                        <button id="submmit" class="btn btn-outline-success  bg-primary mr-2"
                                            type="submit">
                                            <i class="fa fa-search"></i>
                                            <!-- {{-- Search --}} -->
                                        </button>
                                        <a href="<?= base_url() ?>">
                                            <button class="btn btn-outline-primary bg-danger" type="button">
                                                <i class="fa fa-times"></i>
                                                <!-- {{-- Reset --}} -->
                                            </button>
                                        </a>
                                    </div>
                                </div>
                                <div class="text-danger text-center text-bold mr-5">
                                    <!-- <h3> {{ $message }}</h3> -->
                                </div>

                                <!-- {{-- reset button --}} -->
                            </form>
                            <!-- {{-- registration msg --}} -->

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2"
                                class="table   table-striped table-sm table-hover table-responsive w-auto text-center ">
                                <thead>
                                    <!-- {{-- search by name --}} -->
                                    <tr>
                                        <th class="text-primary">Sr.No</th>
                                        <th class="text-primary">Name</th>
                                        <th class="text-primary">Email</th>
                                        <th class="text-primary">Designation</th>
                                        <th class="text-primary">Experinece</th>
                                        <th class="text-primary">Qualification</th>
                                        <th class="text-primary">Mobile No</th>
                                        <th class="text-primary">Address</th>
                                        <th class="text-primary">Pincode</th>
                                        <th class="text-primary">City</th>
                                        <th class="text-primary">State</th>
                                        <th class="text-primary">Created At</th>

                                        <th colspan="2" class="text-primary">
                                            Operations
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($records)) {
                                        foreach ($records as $key => $record) { ?>
                                    <tr>
                                        <td>
                                            <?= $key + 1 ?>
                                        </td>
                                        <!-- <td><img src="" alt="image"></td> -->
                                        <td>
                                            <?php echo $record['name'] ?>
                                        </td>
                                        <td>
                                            <?php echo $record['email'] ?>
                                        </td>
                                        <td>
                                            <?php echo $record['designation'] ?>
                                        </td>
                                        <td>
                                            <?php echo $record['experience'] ?>
                                        </td>
                                        <td>
                                            <?php echo $record['qulification'] ?>
                                        </td>
                                        <td>
                                            <?php echo $record['mobile'] ?>
                                        </td>
                                        <td>
                                            <?php echo $record['address'] ?>
                                        </td>
                                        <td>
                                            <?php echo $record['pincode'] ?>
                                        </td>
                                        <td>
                                            <?php echo $record['city'] ?>
                                        </td>
                                        <td>
                                            <?php echo $record['state'] ?>
                                        </td>
                                        <td>
                                            <?php echo $record['created_at'] ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url('user/edit/' . $record['id']); ?>"
                                                class="btn btn-primary">
                                                <i class="fa fa-pen"></i>
                                            </a>
                                        </td>
                                        <td>

                                            <button type="button" class="btn btn-danger deletebtn"
                                                value="<?php echo $record['id'] ?>">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php }
                                    } else { ?>
                                    <tr>
                                        <td colspan='14' class="text-danger"><strong>No Records Found</strong></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                            <?= $pager->links(); ?>
                            <div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.content -->
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection() ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?php echo base_url(); ?>/public/js/index.js"></script>
<script>
$(function() {
    $('input[name="daterange"]').daterangepicker({
        opens: 'left'
    }, function(start, end, label) {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end
            .format('YYYY-MM-DD'));
    });
});
</script>
<script>
$(document).ready(function() {
    $('.deletebtn').click(function() {
        var customer_id = $(this).val();
        // alert(customer_id);
        $('#DeleteModal').modal('show');
        $('#deleting_id').val(customer_id);

    });


});
</script>