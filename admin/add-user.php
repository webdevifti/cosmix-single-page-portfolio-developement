<?php require 'layouts/header.php'; ?>

<?php 

if(isset($_POST['submitUser'])){
    addUser($_POST);
}

// Authorization
$email = $_SESSION['USEREMAIL'];
$data = getLoggedInUserData($email);
if($data['role'] != 'admin'){ ?>
   <script>window.location.href = 'index.php';</script>
<?php
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
                        <h1 class="h3 mb-0 text-gray-800">Add User</h1>
                        <a href="users.php" class="btn btn-primary btn-sm">Go Back</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-6 m-auto">
                  
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Add User Form</h6>
                                </div>
                                <div class="card-body">
                                    <form action="add-user.php" method="POST" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="">Fullname</label>
                                            <input type="text" placeholder="Fullname" name="fullname" class="form-control">
                                            <?php if(isset($_SESSION['fullname_required'])){ ?>
                                                <div class="alert alert-danger mt-2">
                                                    <?= $_SESSION['fullname_required']; ?>
                                                </div>
                                            <?php } unset($_SESSION['fullname_required']); ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Username</label>
                                            <input type="text" placeholder="Username" name="username" class="form-control">
                                            <?php if(isset($_SESSION['username_required'])){ ?>
                                                <div class="alert alert-danger mt-2">
                                                    <?= $_SESSION['username_required']; ?>
                                                </div>
                                            <?php } unset($_SESSION['username_required']); ?>

                                            <?php if(isset($_SESSION['username_exist_error'])){ ?>
                                                <div class="alert alert-danger mt-2">
                                                    <?= $_SESSION['username_exist_error']; ?>
                                                </div>
                                            <?php } unset($_SESSION['username_exist_error']); ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Phone Number</label>
                                            <input type="text" placeholder="Phone Number" name="phone" class="form-control">
                                            <?php if(isset($_SESSION['phone_required'])){ ?>
                                                <div class="alert alert-danger mt-2">
                                                    <?= $_SESSION['phone_required']; ?>
                                                </div>
                                            <?php } unset($_SESSION['phone_required']); ?>

                                            <?php if(isset($_SESSION['phone_exist_error'])){ ?>
                                                <div class="alert alert-danger mt-2">
                                                    <?= $_SESSION['phone_exist_error']; ?>
                                                </div>
                                            <?php } unset($_SESSION['phone_exist_error']); ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Email</label>
                                            <input type="email" placeholder="Email address.." name="email" class="form-control" />
                                            <?php if(isset($_SESSION['email_required'])){ ?>
                                                <div class="alert alert-danger mt-2">
                                                    <?= $_SESSION['email_required']; ?>
                                                </div>
                                            <?php } unset($_SESSION['email_required']) ?>

                                            <?php if(isset($_SESSION['email_exist_error'])){ ?>
                                                <div class="alert alert-danger mt-2">
                                                    <?= $_SESSION['email_exist_error']; ?>
                                                </div>
                                            <?php } unset($_SESSION['email_exist_error']) ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Password</label>
                                            <input type="password" placeholder="Password" name="password" class="form-control" />
                                            <?php if(isset($_SESSION['password_required'])){ ?>
                                                <div class="alert alert-danger mt-2">
                                                    <?= $_SESSION['password_required']; ?>
                                                </div>
                                            <?php } unset($_SESSION['password_required']) ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Role</label>
                                            <select name="role" class="form-control">
                                                <option value="">Select Role</option>
                                                <option value="moderator">Moderator</option>
                                                <option value="contributor">Contributor</option>
                                            </select>
                                            <?php if(isset($_SESSION['role_required'])){ ?>
                                                <div class="alert alert-danger mt-2">
                                                    <?= $_SESSION['role_required']; ?>
                                                </div>
                                            <?php } unset($_SESSION['role_required']) ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Status</label>
                                            <select name="status" class="form-control">
                                                <option value="1">Active</option>
                                                <option value="0">Deactive</option>
                                            </select>
                                        
                                        </div>
                                        <div class="mb-3">
                                            <div class="upload-btn-wrapper">
                                                <button class="uploadBtn">Upload Profile Image</button>
                                                <input type="file" required name="user_image" />
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
                                            <button type="submit" class="btn btn-success btn-lg" name="submitUser">Add New User</button>
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
<?php if(isset($_SESSION['user_success'])){ ?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'User added has been successfully.',
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