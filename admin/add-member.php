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
                        <h1 class="h3 mb-0 text-gray-800">Add New Team Memebrs</h1>
                        <a href="team-members.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa- fa-sm text-white-50"></i>Go Back</a>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <?php 
                                if(isset($_POST['uploadTeam'])){
                                    addTeamMember($_POST);
                                }
                            ?>
                            <div class="card shadow">
                                <div class="card-header">
                                    <h3>Add Team Members</h3>
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="mt-2">
                                            <label for="">Team Member Name</label>
                                            <input type="text" placeholder="Enter Member Name.." name="name" class="form-control">
                                            <?php if(isset($_SESSION['tm_required'])) { ?>
                                                <div class="alert alert-danger mt-2">
                                                    <?= $_SESSION['tm_required'] ?>
                                                </div>
                                            <?php } unset($_SESSION['tm_required']); ?>
                                        </div>
                                        <div class="mt-2">
                                            <label for="">Team Member Deignation</label>
                                            <input type="text" placeholder="Enter Member Designation.." name="designation" class="form-control">
                                            <?php if(isset($_SESSION['td_required'])) { ?>
                                                <div class="alert alert-danger mt-2">
                                                    <?= $_SESSION['td_required'] ?>
                                                </div>
                                            <?php } unset($_SESSION['td_required']); ?>
                                        </div>
                                        <div class="mt-2">
                                            <label for="">Team Member Bio</label>
                                            <textarea name="bio" cols="30" rows="4" placeholder="Write Short Bio" class="form-control"></textarea>
                                            <?php if(isset($_SESSION['tb_required'])) { ?>
                                                <div class="alert alert-danger mt-2">
                                                    <?= $_SESSION['tb_required'] ?>
                                                </div>
                                            <?php } unset($_SESSION['tb_required']); ?>
                                        </div>
                                        <div class="mt-2">
                                            <label for="">Team Member Photo</label>
                                            <input type="file" name="member_photo" class="form-control">
                                            <?php if(isset($_SESSION['tphoto_required'])) { ?>
                                                <div class="alert alert-danger mt-2">
                                                    <?= $_SESSION['tphoto_required'] ?>
                                                </div>
                                            <?php } unset($_SESSION['tphoto_required']); ?>

                                            <?php if(isset($_SESSION['team_image_type_error'])) { ?>
                                                <div class="alert alert-danger mt-2">
                                                    <?= $_SESSION['team_image_type_error'] ?>
                                                </div>
                                            <?php } unset($_SESSION['team_image_type_error']); ?>
                                        </div>
                                        <div class="mt-2">
                                            <button type="submit" name="uploadTeam" class="btn btn-success">Upload</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <?php 
                                if(isset($_POST['tsb'])){
                                    addSocialMedia($_POST);
                                } 
                            ?>
                            <div class="card">
                                <div class="card-header">
                                    <h3>Add Social Item</h3>
                                </div>
                                <div class="card-body">
                                    <form action="add-member.php" method="POST">
                                        <div class="mb-2">
                                            <label for="">Team Member</label>
                                            <select name="forwho" class="form-control">
                                                <option value="">Select Member Name</option>
                                                <?php 
                                                    $getmembers = getActiveTeamMember();
                                                    foreach($getmembers as $member){
                                                ?>
                                                    <option value="<?= $member['id'] ?>"><?= $member['name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="mb-2">
                                            <label for="">Select Social Media</label>
                                            
                                            <select name="social" class="form-control">
                                                <option value="">Select</option>
                                                <option value="facebook-f">Facebook</option>
                                                <option value="twitter">Twitter</option>
                                                <option value="instagram">Instagram</option>
                                                <option value="pinterest-p">Pinterest</option>
                                                <option value="whatsapp">WhatsApp</option>
                                                <option value="messenger">Messenger</option>
                                                <option value="google-plus">Google Plus</option>
                                            </select>
                                        </div>
                                        <div class="mb-2">
                                            <label for="">Social Media Url</label>
                                            <input type="url" name="url" placeholder="Enter Social Media Url" class="form-control">
                                        </div>
                                        <button type="submit" class="btn btn-success" name="tsb">Add</button>
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

<?php if(isset($_SESSION['team_success'])){ ?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Team Member Added!',
        showConfirmButton: false,
        timer: 2500
        })
    </script>
        <?php } unset($_SESSION['team_success']); ?>
<?php if(isset($_SESSION['team_success_error'])){ ?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Somethig Went Wrong!',
        showConfirmButton: false,
        timer: 2500
        })
    </script>
        <?php } unset($_SESSION['team_success_error']); ?>