<?php require 'layouts/header.php'; ?>

<?php 

if(isset($_POST['about_featureImage'])){
    addFeatureImage($_POST);
}
if(isset($_POST['AddAbout'])){
    addAboutSection($_POST);
}
if(isset($_POST['updateAbout'])){
    updateAboutSection($_POST);
}
$getData = getAboutSection();

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
                        <h1 class="h3 mb-0 text-gray-800">About Section</h1>
                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="about-section.php" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?= $getData['id'] ?>">
                                        <div class="mb-3">
                                        <div class="" style="width: 100%;">
                                            <img style="border-radius:20px;margin-bottom: 10px;height: 200px;width: 50%;object-fit:contain" src="./uploads/about/<?= $getData['about_feature_image'] ?>" alt="Feature  Image">
                                            <div class="mb-3 d-flex justify-content-betwen">
                                                <div class="upload-btn-wrapper">
                                                    <button class="uploadBtn">Upload Feature Photo</button>
                                                    <input type="file" name="about_featrue_image" required />
                                                </div>
                                                <button style="margin-left: 10px;" class="btn btn-info" type="submit" name="about_featureImage">Upload</button>
                                            </div>
                                        </div>
                                        </div>
                                    </form>

                                    <form action="about-section.php" method="POST">
                                        <div class="mb-3">
                                            <label for="">About Section Heading</label>
                                            <input type="text" placeholder="Heading"  class="form-control" name="about_heading">
                                            <?php if(isset($_SESSION['about_heading_required'])){ ?>
                                                <div class="alert alert-danger mt-2">
                                                    <?= $_SESSION['about_heading_required']; ?>
                                                </div>
                                            <?php } unset($_SESSION['about_heading_required']); ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="">About Section Description</label>
                                            <textarea cols="20" rows="10" placeholder="Descript " class="form-control" name="about_description"> </textarea>
                                            <?php if(isset($_SESSION['about_description'])){ ?>
                                                <div class="alert alert-danger mt-2">
                                                    <?= $_SESSION['about_description']; ?>
                                                </div>
                                            <?php } unset($_SESSION['about_description']); ?>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" name="AddAbout" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="card mt-3">
                                <div class="card-header">
                                    <h3>Update About Section</h3>
                                </div>
                                <div class="card-body">
                                <form action="about-section.php" method="POST">
                                    <input type="hidden" name="id" value="<?php if(isset($getData['id'])){ echo $getData['id']; } ?>">
                                        <div class="mb-3">
                                            <label for="">About Section Heading</label>
                                            <input type="text" placeholder="Heading" value="<?php if(isset($getData['about_heading'])){ echo $getData['about_heading']; } ?>" class="form-control" name="about_heading">
                                            <?php if(isset($_SESSION['about_heading_required'])){ ?>
                                                <div class="alert alert-danger mt-2">
                                                    <?= $_SESSION['about_heading_required']; ?>
                                                </div>
                                            <?php } unset($_SESSION['about_heading_required']); ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="">About Section Description</label>
                                            <textarea cols="20" rows="10" placeholder="Descript " class="form-control" name="about_description"><?php if(isset($getData['about_desc'])){ echo $getData['about_desc']; } ?> </textarea>
                                            <?php if(isset($_SESSION['about_description'])){ ?>
                                                <div class="alert alert-danger mt-2">
                                                    <?= $_SESSION['about_description']; ?>
                                                </div>
                                            <?php } unset($_SESSION['about_description']); ?>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" name="updateAbout" class="btn btn-primary">Update</button>
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


<?php if(isset($_SESSION['about_up_err'])) {?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Something went wrong!',
        showConfirmButton: false,
        timer: 2000
        })
    </script>
    <?php } unset($_SESSION['about_up_err']) ?>

<?php if(isset($_SESSION['about_section_success'])) {?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Save To The Database!',
        showConfirmButton: false,
        timer: 2000
        })
    </script>
    <?php } unset($_SESSION['about_section_success']) ?>

<?php if(isset($_SESSION['about_section_error'])) {?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Something went wrong!',
        showConfirmButton: false,
        timer: 2000
        })
    </script>
    <?php } unset($_SESSION['about_section_error']) ?>

    <?php if(isset($_SESSION['about_upsection_error'])) {?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Something went wrong!',
        showConfirmButton: false,
        timer: 2000
        })
    </script>
    <?php } unset($_SESSION['about_section_error']) ?>

    <?php if(isset($_SESSION['about_upsection_success'])) {?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Updated!',
        showConfirmButton: false,
        timer: 2000
        })
    </script>
    <?php } unset($_SESSION['about_upsection_success']) ?>