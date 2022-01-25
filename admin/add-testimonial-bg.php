
<?php require 'layouts/header.php'; ?>

<?php 

if(isset($_POST['testimonialBgUpload'])){
    testimonialBgUpload($_POST);
}
if(isset($_GET['status']) && isset($_GET['id'])){
    $id = $_GET['id'];
    $status = $_GET['status'];
    changeBgStatus($id, $status);
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
                        <h1 class="h3 mb-0 text-gray-800">Add Testimonials Background Image</h1>
                        <a href="testimonials.php" class="btn btn-primary btn-sm">Go Back</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-3">
                  
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Add Testimonials Background Image Form</h6>
                                </div>
                                <div class="card-body">
                                    <form action="add-testimonial-bg.php" method="POST" enctype="multipart/form-data">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="upload-btn-wrapper">
                                                <button class="uploadBtn">Upload a Photo</button>
                                                <input type="file" name="testimonial_bg_image" />
                                            </div>
                                            <button style="margin-left: 10px;" type="submit" name="testimonialBgUpload" class="btn btn-success">Upload</button>
                                        </div>
                                        <?php if(isset($_SESSION['tfgjhi_required'])) {?>
                                            <div class="alert alert-danger mt-2">
                                                <?= $_SESSION['tfgjhi_required']; ?>
                                            </div>
                                            <?php } unset($_SESSION['tfgjhi_required']); ?>

                                            <?php if(isset($_SESSION['bg_type_error'])) {?>
                                            <div class="alert alert-danger mt-2">
                                                <?= $_SESSION['bg_type_error']; ?>
                                            </div>
                                            <?php } unset($_SESSION['bg_type_error']); ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Background Images</h4>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $getBG = getTestimonialsBg();
                                                foreach($getBG as $bg){
                                            ?>
                                            <tr>
                                                <td><?= $bg['id'] ?></td>
                                                <td><img height="100" width="150" src="./uploads/bg/<?= $bg['f_image'] ?>" /></td>
                                                <td>
                                                    <?php if($bg['status'] ==  1) { ?>
                                                        <a href="?status=false&id=<?= $bg['id']; ?>" class="btn btn-success">Active</a>
                                                    <?php } else { ?>
                                                        <a href="?status=true&id=<?= $bg['id']; ?>" class="btn btn-danger">Deactive</a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
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

<?php require 'layouts/footer.php'; ?>
