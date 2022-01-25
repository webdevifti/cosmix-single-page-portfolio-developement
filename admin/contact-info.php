<?php require 'layouts/header.php'; ?>
        <!-- Sidebar -->
        <?php require 'layouts/sidebar.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php require 'layouts/topbar.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Fun Fact</h1>
                       
                    </div>
                    <?php

                        $getContact = getAddressInfo();

                        if(isset($_POST['updateInfo'])){
                            updateInfo($_POST);
                        }
                    ?>
                    <div class="row">
                        <div class="col-lg-4 m-auto">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h3>Update Fun Fact</h3>
                                </div>
                                <div class="card-body">
                                    <form action="contact-info.php" method="POST">
                                        <input type="hidden" value="<?= $getContact['id']; ?>" name="id">
                                       <div class="mt-2">
                                            <label for="">Address</label>
                                            <input type="text" name="address" class="form-control" value="<?= $getContact['address']; ?>">
                                       </div>
                                       <div class="mt-2">
                                            <label for="">Mailing Address </label>
                                            <input type="email" name="mail" class="form-control" value="<?= $getContact['mail_address']; ?>">
                                       </div>
                                       <div class="mt-2">
                                            <label for="">Phone Number</label>
                                            <input type="text" name="phone" class="form-control" value="<?= $getContact['contact_phone']; ?>">
                                       </div>
                                       <div class="mt-2">
                                            <label for="">Lines Of Code</label>
                                            <input type="url" name="website" class="form-control" value="<?= $getContact['website']; ?>">
                                       </div>
                                       <div class="mt-2">
                                           <button type="submit" name="updateInfo" class="btn btn-success">Update</button>
                                       </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php require 'layouts/footer.php'; ?>

<?php if(isset($_SESSION['contact_address'])) {?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Updated',
        showConfirmButton: false,
        timer: 2600
        })
    </script>
    <?php } unset($_SESSION['contact_address']); ?>

<?php if(isset($_SESSION['contact_address_eror'])) {?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Error Occured While Updating.',
        showConfirmButton: false,
        timer: 2600
        })
    </script>
    <?php } unset($_SESSION['contact_address_eror']) ?>