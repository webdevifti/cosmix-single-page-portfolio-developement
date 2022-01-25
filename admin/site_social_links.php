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
                        <h1 class="h3 mb-0 text-gray-800">Social Links</h1>
                    </div>



                    <?php 
                        if(isset($_POST['addSocial'])){
                            addSocialLink($_POST);
                        }
                        
                        if(isset($_GET['action']) && isset($_GET['id'])){
                            $id = $_GET['id'];
                            $action = $_GET['action'];
                            if($action == 'active' || $action == 'deactive'){
                                changeAction($id, $action);
                            }else{
                              
                            }
                        }else{
                            // header('location: site_social_links.php');
                            
                        }
                    ?>

                    <div class="row">
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Add Site Social Links</h3>
                                </div>
                                <div class="card-body">
                                    <form action="site_social_links.php" method="POST">
                                        <div class="mt-3">
                                            <label for="">Social Name</label>
                                            <select name="social_site_name" class="form-control">
                                                <option value="">Select Social Site</option>
                                                <option value="facebook">Facebook</option>
                                                <option value="twitter">Twitter</option>
                                                <option value="instagram">Instagram</option>
                                                <option value="youtube">Youtube</option>
                                                <option value="pinterest">Pinterest</option>
                                                <option value="google-plus">Google Plus</option>
                                                <option value="linkedin">Linkedin</option>
                                                <option value="behance">Behance</option>
                                                <option value="whatsApp">WhatsApp</option>
                                                <option value="messenger">Messenger</option>
                                                <option value="skype">Skype</option>
                                                <option value="snapchat">Snapchat</option>
                                            </select>
                                        </div>
                                        <?php if(isset($_SESSION['social_required'])){ ?>
                                            <div class="alert alert-danger mt-2">
                                                <?= $_SESSION['social_required'];?>
                                            </div>
                                        <?php } unset($_SESSION['social_required']); ?>
                                        <div class="mt-3">
                                            <label for="">Social Links</label>
                                            <input type="url" class="form-control" name="social_link" placeholder="exmaple: https://facebook.com/webdevifti">
                                        </div>
                                        <?php if(isset($_SESSION['social_link_required'])){ ?>
                                            <div class="alert alert-danger mt-2">
                                                <?= $_SESSION['social_link_required'];?>
                                            </div>
                                        <?php } unset($_SESSION['social_link_required']); ?>
                                        <div class="mt-3">
                                            <button type="submit" name="addSocial" class="btn btn-success">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php 
                            $getsocials = getSocialLinks();
                            if(mysqli_num_rows($getsocials) > 0){
                        ?>
                        <div class="col-lg-9">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Your Social Links</h3>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Social Name</th>
                                                <th>Social Link</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                foreach($getsocials as $social){
                                            ?>
                                            <tr>
                                                <td><?= $social['id']; ?></td>
                                                <td><?= strtoupper($social['social_name']); ?></td>
                                                <td><a href="<?= $social['social_link'] ?>"><?= $social['social_link'] ?></a></td>
                                                <td>
                                                    <?php if($social['status'] == 1){ ?>
                                                        <a href="site_social_links.php?action=deactive&id=<?= $social['id']; ?>" class="btn btn-success btn-sm">Active</a>
                                                    <?php } else { ?>
                                                        <a href="site_social_links.php?action=active&id=<?= $social['id']; ?>" class="btn btn-secondary btn-sm">Deactive</a>
                                                    <?php } ?>

                                                    <a name="delete_social.php?id=<?= $social['id']; ?>" class="btn btn-danger btn-sm delete">Delete</a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php } else { echo ""; } ?>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php require 'layouts/footer.php'; ?>



<script>
    $('.delete').click(function(){

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
              var link = $(this).attr('name');
              window.location.href = link;
            }
        })
    })
    </script>

    <?php 
    if(isset($_SESSION['social_delete_success'])){ 
    
    ?>
    <script>
    Swal.fire(
        'Deleted!',
        'Social Link has been deleted.',
        'success'
        )
    </script>

<?php } unset($_SESSION['social_delete_success']); ?>

<?php if(isset($_SESSION['social_added_success'])) {?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Saved.',
        showConfirmButton: false,
        timer: 2600
        })
    </script>
    <?php } unset($_SESSION['social_added_success']) ?>

<?php if(isset($_SESSION['social_added_error'])) {?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Error Occured While data inserting.',
        showConfirmButton: false,
        timer: 2600
        })
    </script>
    <?php } unset($_SESSION['social_added_error']) ?>

<?php if(isset($_SESSION['social_delete_error'])) {?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Error Occured While Data Deleting.',
        showConfirmButton: false,
        timer: 2600
        })
    </script>
    <?php } unset($_SESSION['social_delete_error']) ?>