<?php require 'layouts/header.php'; ?>

<?php 

if(isset($_POST['submitBanner'])){
    addBanner($_POST);
}

?>
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
                        <h1 class="h3 mb-0 text-gray-800">Add Banner</h1>
                        <a href="banner-slider.php" class="btn btn-primary btn-sm">Go Back</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-6 m-auto">
                  
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Add Banner Form</h6>
                                </div>
                                <div class="card-body">
                                    <form action="add-banner.php" method="POST" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="">Banner Heading</label>
                                            <input type="text" placeholder="Banner Heading" name="banner_heading" class="form-control">
                                            <?php if(isset($_SESSION['h_required'])){ ?>
                                                <div class="alert alert-danger mt-2">
                                                    <?= $_SESSION['h_required']; ?>
                                                </div>
                                            <?php } unset($_SESSION['h_required']); ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Banner Sub heading</label>
                                            <input type="text" placeholder="Banner Sub Heading" name="banner_subheading" class="form-control">
                                            <?php if(isset($_SESSION['sh_required'])){ ?>
                                                <div class="alert alert-danger mt-2">
                                                    <?= $_SESSION['sh_required']; ?>
                                                </div>
                                            <?php } unset($_SESSION['sh_required']); ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Banner Description</label>
                                            <textarea placeholder="Banner Description" name="banner_desc" class="form-control" required></textarea>
                                            <?php if(isset($_SESSION['d_required'])){ ?>
                                                <div class="alert alert-danger mt-2">
                                                    <?= $_SESSION['d_required']; ?>
                                                </div>
                                            <?php } unset($_SESSION['d_required']) ?>
                                        </div>
                                        <div class="mb-3">
                                            <div class="upload-btn-wrapper">
                                                <button class="uploadBtn">Upload a file</button>
                                                <input type="file" required name="banner_image" />
                                                <?php if(isset($_SESSION['bi_required'])){ ?>
                                                    <div class="alert alert-danger mt-2">
                                                        <?= $_SESSION['bi_required']; ?>
                                                    </div>
                                                <?php } unset($_SESSION['bi_required']); ?>
                                                <?php if(isset($_SESSION['image_type_error'])){ ?>
                                                    <div class="alert alert-danger mt-2">
                                                        <?= $_SESSION['image_type_error']; ?>
                                                    </div>
                                                <?php } unset($_SESSION['image_type_error']); ?>

                                                <?php if(isset($_SESSION['image_size_error'])){ ?>
                                                    <div class="alert alert-danger mt-2">
                                                        <?= $_SESSION['image_size_error']; ?>
                                                    </div>
                                                <?php } unset($_SESSION['image_size_error']); ?>
                                            </div>
                                            
                                        </div>
                                        <div class="mb-3 m-auto">
                                            <button type="submit" class="btn btn-success btn-lg" name="submitBanner">Add Banner Slider</button>
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
<?php if(isset($_SESSION['banner_success'])){ ?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Your work has been saved',
        showConfirmButton: false,
        timer: 2500
        })
    </script>
        <?php } unset($_SESSION['banner_success']); ?>

<?php if(isset($_SESSION['banner_error'])){ ?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Somethig Went Wrong!',
        showConfirmButton: false,
        timer: 2500
        })
    </script>
        <?php } unset($_SESSION['banner_error']); ?>