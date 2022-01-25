<?php require 'layouts/header.php'; ?>

<?php 
if(isset($_GET['id'])){
    $id = $_GET['id'];
    deleteFeature($id);
}

if(isset($_POST['bulkSubmit'])){
    featureBulkOperation($_POST);
}
if(isset($_POST['uploadFeatures'])){
    addFeature($_POST);
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
                        <h1 class="h3 mb-0 text-gray-800">Features</h1>
                       
                    </div>

                    <!-- Content Row -->
                    <div class="card mb-2">
                        <div class="card-header">
                            <h3>Add Feature Category</h3>
                        </div>
                        <div class="card-body">
                            <form action="add-feature.php" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="">Feature Category</label>
                                    <input type="text" placeholder="Feature Category" name="f_category" class="form-control">
                                    <?php if(isset($_SESSION['f_required'])){ ?>
                                        <div class="alert alert-danger mt-2">
                                            <?= $_SESSION['f_required'] ?>
                                        </div>
                                    <?php } unset($_SESSION['f_required']); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="">Feature  Icon Class</label>
                                    <input type="text" placeholder="Feature Category icon class" name="f_category_icons" class="form-control">
                                    <?php if(isset($_SESSION['f_i_r'])){ ?>
                                        <div class="alert alert-danger mt-2">
                                            <?= $_SESSION['f_i_r'] ?>
                                        </div>
                                    <?php } unset($_SESSION['f_i_r']); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="">Feature Description</label>
                                    <textarea name="feature_description" placeholder="Feature Description" cols="30" rows="4" class="form-control"></textarea>
                                    <?php if(isset($_SESSION['f_d'])){ ?>
                                        <div class="alert alert-danger mt-2">
                                            <?= $_SESSION['f_d'] ?>
                                        </div>
                                    <?php } unset($_SESSION['f_d']); ?>
                                </div>
                                <div class="mb-3 d-flex justify-content-betwen">
                                    <div class="upload-btn-wrapper">
                                        <button class="uploadBtn">Upload Feature Photo</button>
                                        <input type="file" name="feature_image" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="uploadFeatures" class="btn btn-primary">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Feature Section Data</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="add-feature.php" method="POST">
                                   <div class="col-lg-3 mb-3 d-flex align-items-center justify-content-between">
                                   <select name="bulk_options" class="form-control">
                                       <option value="">Select Options</option>
                                        <option value="delete">Delete</option>
                                        <option value="active">Active</option>
                                        <option value="deactive">Deactive</option>
                                    </select>
                                    <button type="submit" name="bulkSubmit" class="btn btn-info">Done</button>
                                   </div>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="selectItem"></th>
                                            <th>ID</th>
                                            <th>Feature Category</th>
                                            <th>Feature Image</th>
                                            <th>Feature Description</th>
                                            <th>Status</th>
                                            <th>Created AT</th>
                                            <th>Updated At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th><input type="checkbox" id="selectItem"></th>
                                            <th>ID</th>
                                            <th>Feature Category</th>
                                            <th>Feature Image</th>
                                            <th>Feature Description</th>
                                            <th>Status</th>
                                            <th>Created AT</th>
                                            <th>Updated At</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                        
                                            $getFeature = getFeatures(); 
                                            foreach($getFeature as $feature){
                                        ?>
                                        <tr>
                                            <td><input type="checkbox" class="boxes" name="select_data[]" value="<?= $feature['id']; ?>"></td>
                                            </form>
                                            <td><?= $feature['id']; ?></td>
                                            <td><?= $feature['feature_category']; ?></td>
                                            <td><img width="150" height="100" src="uploads/features/<?= $feature['feature_image']; ?>" /></td>
                                            <td><?= substr($feature['feature_description'],0,100); ?>...</td>
                                            <td>
                                                <?php 
                                                    if($feature['status'] == 1){ ?> 
                                                        <span class="badge badge-info">Active</span>
                                                    <?php }else { ?> 
                                                        <span class="badge badge-danger">Deactive</span>
                                                    <?php } ?>
                                            </td>
                                            <td><?= date('M-d-Y, h:i a', strtotime($feature['created_at'])); ?></td>
                                            <td><?= date('M-d-Y, h:i a', strtotime($feature['updated_at']));; ?></td>
                                            <td>
                                                <a href="edit-feature.php?action=edit&id=<?= $feature['id']; ?>" class="btn btn-info btn-sm">Edit</a>
                                                <a name="add-feature.php?id=<?= $feature['id']; ?>" class="btn btn-danger btn-sm delete">Delete</button>
                                            
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
    if(isset($_SESSION['feature_delete_success'])){ 
    
    ?>
    <script>
    Swal.fire(
        'Deleted!',
        'User has been deleted.',
        'success'
        )
    </script>

<?php } unset($_SESSION['feature_delete_success']); ?>



<?php if(isset($_SESSION['bulk_delete'])) {?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Deleted!',
        showConfirmButton: false,
        timer: 2000
        })
    </script>
    <?php } unset($_SESSION['bulk_delete']) ?>
    <?php if(isset($_SESSION['bulk_active'])) {?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Status activated!',
        showConfirmButton: false,
        timer: 2000
        })
    </script>
    <?php } unset($_SESSION['bulk_active']) ?>
    <?php if(isset($_SESSION['bulk_dactive'])) {?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Status Deactivated!',
        showConfirmButton: false,
        timer: 2000
        })
    </script>
    <?php } unset($_SESSION['bulk_dactive']) ?>


<?php if(isset($_SESSION['f_up_err'])) {?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Something Went Wrong!',
        showConfirmButton: false,
        timer: 2000
        })
    </script>
    <?php } unset($_SESSION['f_up_err']) ?>

<?php if(isset($_SESSION['fe_up_err'])) {?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Data Not Insert!',
        showConfirmButton: false,
        timer: 2000
        })
    </script>
    <?php } unset($_SESSION['fe_up_err']) ?>

<?php if(isset($_SESSION['feature_delete_error'])) {?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Data Not Deleted!',
        showConfirmButton: false,
        timer: 2000
        })
    </script>
    <?php } unset($_SESSION['feature_delete_error']) ?>

<?php if(isset($_SESSION['bulk_error'])) {?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Select an option!',
        showConfirmButton: false,
        timer: 2000
        })
    </script>
    <?php } unset($_SESSION['bulk_error']) ?>

<?php if(isset($_SESSION['bulk_error2'])) {?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Something went wrong!',
        showConfirmButton: false,
        timer: 2000
        })
    </script>
    <?php } unset($_SESSION['bulk_error2']) ?>
