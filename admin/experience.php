<?php require 'layouts/header.php'; ?>

<?php 
if(isset($_GET['action']) && $_GET['id']){
    $id = $_GET['id'];
    $action = $_GET['action'];
    if($action === 'edit'){
        $getExp = editExp($id);
        $result = mysqli_fetch_assoc($getExp);

        if(isset($_POST['updateExp'])){
            updateExp($_POST);
        }
    }
    if($action === 'delete'){
        deleteExp($id);
    }
}   

if(isset($_POST['submitEx'])){
    addExperience($_POST);
}
if(isset($_POST['exp_featureImage'])){
    uploadFeature($_POST);
}
// authorization
// $email = $_SESSION['USEREMAIL'];
// $data = getLoggedInUserData($email);
// if($data['role'] != 'admin'){ ?>
    <!-- <script>window.location.href = 'index.php';</script> -->
 <?php
// }
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
                        <h1 class="h3 mb-0 text-gray-800">Experiances</h1>
                       
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-6">
                            <?php 

                                $get_section_feature_image = getSectionFeatireImage('experience');
                                $fetch = mysqli_fetch_assoc($get_section_feature_image);
                            
                            ?>
                            <form action="experience.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $fetch['id']; ?>">
                                <div class="" style="width: 100%;">
                                    <img style="border-radius:20px;margin-bottom: 10px;height: 200px;width: 50%;object-fit:contain" src="./uploads/experience/<?= $fetch['f_image']; ?>" alt="Profile Image">
                                    <div class="mb-3 d-flex justify-content-betwen">
                                        <div class="upload-btn-wrapper">
                                            <button class="uploadBtn">Upload Feature Photo</button>
                                            <input type="file" name="experience_featrue_image" />
                                        </div>
                                        <button style="margin-left: 10px;" class="btn btn-info" type="submit" name="exp_featureImage">Upload</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php 
                        if(isset($_GET['action']) == 'edit'){
                    
                    ?>
                    
                        <div class="col-lg-6 mb-2">
                            <div class="card">
                                <div class="card-header">
                                    <h3>update</h3>
                                </div>
                                <div class="card-body">
                                    <form action="experience.php?action=edit&id=<?= $result['id']?>" method="POST">
                                        <input type="hidden" name="id" value="<?php if(isset($result['id'])){ echo $result['id']; } ?>">
                                        <div class="mb-3">
                                            <label for="">Experiances Title</label>
                                            <input type="text" value="<?php if(isset($result['exp_title'])){ echo $result['exp_title']; } ?>" class="form-control" name="ex_title" placeholder="title"  required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="">How Much You Have Experiances </label>
                                            <input type="number" value="<?php if(isset($result['exp_ratio'])){ echo $result['exp_ratio']; } ?>" class="form-control" name="ratio" placeholder="89%" required>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" name="updateExp"  class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Experiances</h3>
                                </div>
                                <div class="card-body">
                                    <form action="experience.php" method="POST">
                                      
                                        <div class="mb-3">
                                            <label for="">Experiances Title</label>
                                            <input type="text" class="form-control" name="ex_title" placeholder="title"  required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="">How Much You Have Experiances </label>
                                            <input type="number" class="form-control" name="ratio" placeholder="89%" required>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" name="submitEx"  class="btn btn-primary">Save</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php 
                        
                        $expe = getExperience();
                        if(mysqli_num_rows($expe) > 0){
                        ?>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Experiances</h3>
                                
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <th>SL</th>
                                            <th>Title</th>
                                            <th>Ratio</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            <?php 
                                              
                                                foreach($expe as $ex){
                                            ?>
                                            <tr>
                                                <td><?= $ex['id']?></td>
                                                <td><?= $ex['exp_title']?></td>
                                                <td><?= $ex['exp_ratio']?></td>
                                                <td>
                                                    <a href="experience.php?action=edit&id=<?= $ex['id']?>" class="btn btn-info btn-sm">Edit</a>
                                                    <a href="experience.php?action=delete&id=<?= $ex['id']?>" class="btn btn-danger btn-sm" onclick="return confirm('Are Your Sure??')">Delete</a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>

                    
                   
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php require 'layouts/footer.php'; ?>





<?php if(isset($_SESSION['ex_added'])) { ?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Sucessfully added!',
        showConfirmButton: false,
        timer: 2000
        })
    </script>
    <?php } unset($_SESSION['ex_added']) ?>

<?php if(isset($_SESSION['ex_error'])) { ?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Something went wrong!',
        showConfirmButton: false,
        timer: 2000
        })
    </script>
    <?php } unset($_SESSION['ex_error']) ?>
   

<?php if(isset($_SESSION['exp_up_err'])) { ?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Something went wrong!',
        showConfirmButton: false,
        timer: 2000
        })
    </script>
    <?php } unset($_SESSION['exp_up_err']) ?>

   
