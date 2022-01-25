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

                        if(isset($_POST['updateProfile'])){
                            updateProfile($_POST);
                        }
                        
                        if(isset($_POST['changePass'])){
                            changePassword($_POST);
                        }

                        $email = $_SESSION['USEREMAIL'];
                        $data = getLoggedInUserData($email);
                    
                    ?>
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
                        <span class="badge badge-success">Last Updated at : <?= date('M-d-Y h:i A', strtotime($data['updated_at'])) ?></span>
                        
                    </div>
                    
                    <div class="row mb-5">
                        <div class="col-lg-12">
                            <?php 

                                if($data['status'] == 1){
                            
                            ?>
                            <button class="btn btn-primary">My Status is : Active</button>
                            <?php } else { ?> 
                                <button class="btn btn-danger">My Status is : Deactivated</button>
                            <?php } ?>
                            <button class="btn btn-info">I am <?= $data['role']; ?></button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                  
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Profile Form</h6>
                                </div>
                                
                                <div class="card-body">
                                    <form action="profile.php" method="POST" enctype="multipart/form-data">
                                        <div class="" style="width: 30%;margin: 0 auto;">
                                            <img style="border-radius:20px;margin-bottom: 10px;height: 200px;width: 200px;" src="./uploads/users/<?= $data['photo']; ?>" alt="Profile Image">
                                            <div class="mb-3">
                                                <div class="upload-btn-wrapper">
                                                    <button class="uploadBtn">Upload Profile Photo</button>
                                                    <input type="file" name="user_image" />
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <input type="hidden" name="id" value="<?= $data['id']; ?>">
                                        <div class="mb-3">
                                            <label for="">Fullname</label>
                                            <input type="text" value="<?= $data['full_name']; ?>" name="fullname" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Username</label>
                                            <input type="text" name="username" value="<?= $data['username']; ?>" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Email</label>
                                            <input type="email" name="email" value="<?= $data['email'] ?>" class="form-control" require>
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Phone Number</label>
                                            <input type="text" name="phone_number" value="<?= $data['phone_number']; ?>" class="form-control" required>
                                        </div>
                                        
                                        <div class="mb-3 m-auto">
                                            <button type="submit" class="btn btn-success btn-lg" name="updateProfile">Save Change</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Change Your Password</h3>
                                </div>
                                <div class="card-body">
                                    <form action="profile.php" method="POST">
                                        <input type="hidden" name="id" value="<?= $data['id']; ?>">
                                        <div class="mb-3">
                                            <label for="">Current Password</label>
                                            <input type="password"  name="current_password" class="form-control"  placeholder="Enter Current Password">
                                            <?php if(isset($_SESSION['c_p_r'])){ ?>
                                                <div class="alert alert-danger mt-2">
                                                    <?= $_SESSION['c_p_r']; ?>
                                                </div>
                                            <?php } unset($_SESSION['c_p_r']) ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="">New Password</label>
                                            <input type="password"  name="new_password" class="form-control" placeholder="Enter New Password">
                                            <?php if(isset($_SESSION['n_p_r'])){ ?>
                                                <div class="alert alert-danger mt-2">
                                                    <?= $_SESSION['n_p_r']; ?>
                                                </div>
                                            <?php } unset($_SESSION['n_p_r']) ?>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" name="changePass" class="btn btn-primary">Change Password</button>
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

<?php if(isset($_SESSION['password_changed'])) {?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Password has been changed.',
        showConfirmButton: false,
        timer: 2600
        })
    </script>
    <?php } unset($_SESSION['password_changed']) ?>
    
<?php if(isset($_SESSION['current_password_not_match'])) {?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Current Password Not Match.',
        showConfirmButton: false,
        timer: 2600
        })
    </script>
    <?php } unset($_SESSION['current_password_not_match']) ?>

    <?php if(isset($_SESSION['er'])) {?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Something went wrong.',
        showConfirmButton: false,
        timer: 2600
        })
    </script>
    <?php } unset($_SESSION['er']) ?>


    <?php if(isset($_SESSION['user_success'])){ ?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Save Changed!',
        showConfirmButton: false,
        timer: 2500
        })
    </script>
        <?php } unset($_SESSION['user_success']); ?>

<?php if(isset($_SESSION['user_error'])){ ?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Somethig Went Wrong!',
        showConfirmButton: false,
        timer: 2500
        })
    </script>
        <?php } unset($_SESSION['user_error']); ?>