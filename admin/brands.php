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
                        <h1 class="h3 mb-0 text-gray-800">Brands</h1>
                        
                    </div>

                    <?php 

                        if(isset($_POST['AddBrand'])){
                            addBrand($_POST);
                        }
                    
                    
                    ?>
                    <?php 
                        if(isset($_GET['id'])){
                            $id = $_GET['id'];
                            deleteBrand($id);
                        }

                        if(isset($_POST['bulkSubmit'])){
                            brandBulkOperation($_POST);
                        }
                        ?>
                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Add Brand Logo</h3>
                                </div>
                                <div class="card-body">
                                    <form action="brands.php" method="POST" enctype="multipart/form-data">
                                       <div class="d-flex align-items-center">
                                       <div class="upload-btn-wrapper">
                                            <button class="uploadBtn">Upload Brand Logo</button>
                                            <input type="file" name="brand_logo" />
                                        </div>
                                        <button style="margin-left: 20px;" type="submit" class="btn btn-success" name="AddBrand">Add</button>
                                       </div>
                                        <?php if(isset($_SESSION['bir'])){ ?>
                                            <div class="alert alert-danger mt-3">
                                                <?= $_SESSION['bir']; ?>
                                            </div>
                                            <?php } unset($_SESSION['bir']); ?>
                                        <?php if(isset($_SESSION['image_type_error'])){ ?>
                                            <div class="alert alert-danger mt-3">
                                                <?= $_SESSION['image_type_error']; ?>
                                            </div>
                                            <?php } unset($_SESSION['image_type_error']); ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Brands Data</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form action="brands.php" method="POST">
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
                                                <th>Image</th>
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
                                                <th>Image</th>
                                                <th>Status</th>
                                                <th>Created AT</th>
                                                <th>Updated At</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php 
                                            
                                                $brands = getBrands(); 
                                                foreach($brands as $brand){
                                            ?>
                                            <tr>
                                                <td><input type="checkbox" class="boxes" name="select_data[]" value="<?= $brand['id']; ?>"></td>
                                                </form>
                                                <td><?= $brand['id']; ?></td>
                                                <td><img src="./uploads/brands/<?= $brand['brand_logo']; ?>" /></td>
                                                <td>
                                                    <?php 
                                                        if($brand['status'] == 1){ ?> 
                                                            <span class="badge badge-info">Active</span>
                                                        <?php }else { ?> 
                                                            <span class="badge badge-danger">Deactive</span>
                                                        <?php } ?>
                                                </td>
                                                <td><?= date('M-d-Y, h:i a', strtotime($brand['created_at'])); ?></td>
                                                <td><?= date('M-d-Y, h:i a', strtotime($brand['updated_at']));; ?></td>
                                                <td>
                                                    <a name="brands.php?id=<?= $brand['id']; ?>" class="btn btn-danger btn-sm delete">Delete</button>
                                                
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
    if(isset($_SESSION['brand_delete_success'])){ 
    
    ?>
    <script>
    Swal.fire(
        'Deleted!',
        'Brand has been deleted.',
        'success'
        )
    </script>

<?php } unset($_SESSION['brand_delete_success']); ?>




<?php if(isset($_SESSION['brand_delete_error'])) {?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Something Wrong!',
        showConfirmButton: false,
        timer: 2000
        })
    </script>
    <?php } unset($_SESSION['brand_delete_error']) ?>

<?php if(isset($_SESSION['brands_success'])) {?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Brand Added successfully!',
        showConfirmButton: false,
        timer: 2000
        })
    </script>
    <?php } unset($_SESSION['brands_success']) ?>


<?php if(isset($_SESSION['brands_error'])) {?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Something Happened Wrong!',
        showConfirmButton: false,
        timer: 2000
        })
    </script>
    <?php } unset($_SESSION['brands_error']) ?>

<?php if(isset($_SESSION['brand_deactive'])) {?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Status Deactivated!',
        showConfirmButton: false,
        timer: 2000
        })
    </script>
    <?php } unset($_SESSION['brand_deactive']) ?>
<?php if(isset($_SESSION['brands_active'])) {?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Status Activated!',
        showConfirmButton: false,
        timer: 2000
        })
    </script>
    <?php } unset($_SESSION['brands_active']) ?>
<?php if(isset($_SESSION['brands_delete'])) {?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Deleted!',
        showConfirmButton: false,
        timer: 2000
        })
    </script>
    <?php } unset($_SESSION['brands_delete']) ?>


    <?php if(isset($_SESSION['bulk_error'])) {?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Please Select an Option.',
        showConfirmButton: false,
        timer: 2600
        })
    </script>
    <?php } unset($_SESSION['bulk_error']) ?>

    <?php if(isset($_SESSION['bulk_error2'])) {?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Please Select an Item.',
        showConfirmButton: false,
        timer: 2600
        })
    </script>
    <?php } unset($_SESSION['bulk_error2']) ?>