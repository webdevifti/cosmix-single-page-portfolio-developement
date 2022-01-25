<?php require 'layouts/header.php'; ?>

<?php 
if(isset($_GET['id'])){
    $id = $_GET['id'];
    deleteService($id);
}

if(isset($_POST['bulkSubmit'])){
    serviceBulkOperation($_POST);
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
                        <h1 class="h3 mb-0 text-gray-800">Services</h1>
                        <a href="add-service.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-plus fa-sm text-white-50"></i> Add New Service</a>
                    </div>

                    <!-- Content Row -->
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Service Data</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="services.php" method="POST">
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
                                            <th>Title</th>
                                            <th>Description</th>
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
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Created AT</th>
                                            <th>Updated At</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                        
                                            $services = getServices(); 
                                            foreach($services as $service){
                                        ?>
                                        <tr>
                                            <td><input type="checkbox" class="boxes" name="select_data[]" value="<?= $service['id']; ?>"></td>
                                            </form>
                                            <td><?= $service['id']; ?></td>
                                            <td><?= $service['title']; ?></td>
                                            <td><?= $service['description']; ?></td>
                                            <td>
                                                <?php 
                                                    if($service['status'] == 1){ ?> 
                                                        <span class="badge badge-info">Active</span>
                                                    <?php }else { ?> 
                                                        <span class="badge badge-danger">Deactive</span>
                                                    <?php } ?>
                                            </td>
                                            <td><?= date('M-d-Y, h:i a', strtotime($service['created_at'])); ?></td>
                                            <td><?= date('M-d-Y, h:i a', strtotime($service['updated_at']));; ?></td>
                                            <td>
                                                <a href="edit-service.php?action=edit&id=<?= $service['id']; ?>" class="btn btn-info btn-sm">Edit</a>
                                                <a name="services.php?id=<?= $service['id']; ?>" class="btn btn-danger btn-sm delete">Delete</button>
                                            
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
    if(isset($_SESSION['service_delete_success'])){ 
    
    ?>
    <script>
    Swal.fire(
        'Deleted!',
        'Service has been deleted.',
        'success'
        )
    </script>

<?php } unset($_SESSION['service_delete_success']); ?>




<?php if(isset($_SESSION['service_active'])) {?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Status Activated!',
        showConfirmButton: false,
        timer: 2000
        })
    </script>
    <?php } unset($_SESSION['service_active']) ?>
    <?php if(isset($_SESSION['service_deactive'])) {?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Status Dactivated!',
        showConfirmButton: false,
        timer: 2000
        })
    </script>
    <?php } unset($_SESSION['service_deactive']) ?>

    <?php if(isset($_SESSION['service_delete'])) {?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Service Deleted!',
        showConfirmButton: false,
        timer: 2000
        })
    </script>
    <?php } unset($_SESSION['service_delete']) ?>

<?php if(isset($_SESSION['service_delete_error'])) {?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Somethig Went Wrong!',
        showConfirmButton: false,
        timer: 2000
        })
    </script>
    <?php } unset($_SESSION['service_delete_error']) ?>

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
