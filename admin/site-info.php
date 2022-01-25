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

                <?php
                    $get_info = getSiteInfo();

                    if(isset($_POST['uploadSiteLogo'])){
                        uploadSiteLogo($_POST);
                    }
                    if(isset($_POST['uploadSiteIcon'])){
                        uploadSiteIcon($_POST);
                    }

                    if(isset($_POST['updateInfo'])){
                        updateSiteInfo($_POST);
                    }
                ?>
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Site Information</h1>
                    </div>                
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Upload Site Logo</h3>
                                </div>
                                <div class="card-body">
                                   <form action="site-info.php" method="POST" enctype="multipart/form-data">
                                       <input type="hidden" name="id" value="<?= $get_info['id']; ?>">
                                        <div class="">
                                            <div class="mb-3 d-flex justify-content-betwen">
                                            <img src="./uploads/sites/<?= $get_info['site_logo']; ?>" alt="">
                                                <div class="upload-btn-wrapper">
                                                    <button class="uploadBtn">Upload Site Logo</button>
                                                    <input type="file" name="site_logo" required />
                                                </div>
                                                <button style="margin-left: 10px;" class="btn btn-info" type="submit" name="uploadSiteLogo">Upload</button>
                                            </div>
                                        </div>
                                   </form>
                                </div>
                            </div>
                            <div class="card mt-2">
                                <div class="card-header">
                                    <h3>Upload Site Icon</h3>
                                </div>
                                <div class="card-body">
                                   <form action="site-info.php" method="POST" enctype="multipart/form-data">
                                   <input type="hidden" name="id" value="<?= $get_info['id']; ?>">
                                        <div class="">
                                            <div class="mb-3 d-flex justify-content-betwen">
                                                <img src="./uploads/sites/<?= $get_info['site_icon']; ?>" alt="">
                                                <div class="upload-btn-wrapper">
                                                    <button class="uploadBtn">Upload Site Icon</button>
                                                    <input type="file" name="site_icon" required />
                                                </div>
                                                <button style="margin-left: 10px;" class="btn btn-info" type="submit" name="uploadSiteIcon">Upload</button>
                                            </div>
                                        </div>
                                   </form>
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Add Site Information</h3>
                                </div>
                                <div class="card-body">
                                <form action="site-info.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $get_info['id']; ?>">
                                    <div class="mt-3">
                                        <label for="">Site Description</label>
                                        <textarea name="site_description" cols="30" rows="6" placeholder="Write Your Site Description" class="form-control" required><?= $get_info['site_description'] ?></textarea>
                                    </div>
                                    <div class="mt-3">
                                        <label for="">Site Keywords</label>
                                        <textarea name="site_keywords" cols="30" rows="4" placeholder="Write Your Site keywords" class="form-control" required><?= $get_info['site_keywords'] ?></textarea>
                                    </div>
                                    <div class="mt-3">
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

<?php if(isset($_SESSION['site_up_logo'])) {?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Logo Uploaded',
        showConfirmButton: false,
        timer: 2600
        })
    </script>
    <?php } unset($_SESSION['site_up_logo']) ?>

<?php if(isset($_SESSION['site_up_icon'])) {?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Icon Uploaded',
        showConfirmButton: false,
        timer: 2600
        })
    </script>
    <?php } unset($_SESSION['site_up_icon']) ?>
<?php if(isset($_SESSION['content_up'])) {?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Information Saved',
        showConfirmButton: false,
        timer: 2600
        })
    </script>
    <?php } unset($_SESSION['content_up']) ?>

<?php if(isset($_SESSION['site_up_err'])) {?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Error Occured While Updating.',
        showConfirmButton: false,
        timer: 2600
        })
    </script>
    <?php } unset($_SESSION['site_up_err']) ?>