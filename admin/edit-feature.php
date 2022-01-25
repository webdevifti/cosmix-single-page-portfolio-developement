<?php require 'layouts/header.php'; ?>
<?php 

if(isset($_GET['action']) && $_GET['id']){
    if($_GET['action'] === 'edit'){
        $action = $_GET['action'];
        $id = $_GET['id'];

        $sl = "SELECT * FROM `feature_section` WHERE `id` = '$id'";
        $q = mysqli_query($con, $sl);
        $fetch = mysqli_fetch_assoc($q);
        if(mysqli_num_rows($q) != 1){
            header('location: add-feature.php');
        }else{
            if(isset($_POST['updateFeature'])){
                updateFeature($_POST, $id);
            }
        }
    }else{
        header('location: add-feature.php');
    }
}else{
    header('location: add-feature.php');
}

?>

<?php 



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
                        <h1 class="h3 mb-0 text-gray-800">Edit Feature</h1>
                        <a href="add-feature.php" class="btn btn-primary btn-sm">Go Back</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-6 m-auto">
                  
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Edit Feature Form</h6>
                                </div>
                                <div class="card-body">
                                    <form action="edit-feature.php?action=edit&id=<?= $fetch['id']; ?>" method="POST" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="">Feature Category</label>
                                            <input type="text" value="<?=  $fetch['feature_category']; ?>" name="feature_category" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Feature Icon Class</label>
                                            <input type="text" value="<?=  $fetch['feature_tab_icons']; ?>"  name="fbi" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Feature Description</label>
                                            <textarea  name="feature_desc" rows="8" class="form-control" required><?=  $fetch['feature_description']; ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <div class="upload-btn-wrapper">
                                                <button class="uploadBtn">Upload a file</button>
                                                <input type="file" name="feature_image" />
                                                <img width="150" height="100" src="uploads/features/<?= $fetch['feature_image']; ?>" />
                                            </div>
                                            
                                        </div>
                                        <div class="mb-3 m-auto">
                                            <button type="submit" class="btn btn-success btn-lg" name="updateFeature">Update</button>
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

<?php if(isset($_SESSION['feature_success'])){ ?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Your work has been Updated!',
        showConfirmButton: false,
        timer: 2500
        })
    </script>
        <?php } unset($_SESSION['feature_success']); ?>

<?php if(isset($_SESSION['feature_error'])){ ?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Somethig Went Wrong!',
        showConfirmButton: false,
        timer: 2500
        })
    </script>
        <?php } unset($_SESSION['feature_error']); ?>