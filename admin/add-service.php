<?php require 'layouts/header.php'; ?>

<?php 

if(isset($_POST['submitService'])){
    addService($_POST);
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
                        <h1 class="h3 mb-0 text-gray-800">Add Serivce</h1>
                        <a href="services.php" class="btn btn-primary btn-sm">Go Back</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-6 m-auto">
                  
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Add Service Form</h6>
                                </div>
                                <div class="card-body">
                                    <form action="add-service.php" method="POST">
                                        <div class="mb-3">
                                            <label for="">Select an Icon: </label><br>
                                          
                                            <input type="radio"  name="icon" value="fa fa-line-chart">
                                            <i class="fas fa-chart-line"></i><br>
                                            <input type="radio" name="icon" value="fa fa-cubes">
                                            <i class="fas fa-cubes"></i><br>
                                            <input type="radio" name="icon" value="fa fa-pie-chart">
                                            <i class="fas fa-chart-pie"></i><br>
                                            <input type="radio" name="icon" value="fa fa-bar-chart">
                                            <i class="fas fa-chart-bar"></i><br>
                                            <input type="radio" name="icon" value="fa fa-language">
                                            <i class="fas fa-language"></i><br>
                                            <input type="radio" name="icon" value="fa fa-bullseye">
                                            <i class="fas fa-bullseye"></i><br>

                                            <?php if(isset($_SESSION['ic_required'])){ ?>
                                                <div class="alert alert-danger mt-2">
                                                    <?= $_SESSION['ic_required']; ?>
                                                </div>
                                            <?php } unset($_SESSION['ic_required']); ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Title</label>
                                            <input type="text" placeholder="Service title" name="title" class="form-control">
                                            <?php if(isset($_SESSION['t_required'])){ ?>
                                                <div class="alert alert-danger mt-2">
                                                    <?= $_SESSION['t_required']; ?>
                                                </div>
                                            <?php } unset($_SESSION['t_required']); ?>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for=""> Description</label>
                                            <textarea placeholder="Description" name="description" class="form-control"></textarea>
                                            <?php if(isset($_SESSION['sd_required'])){ ?>
                                                <div class="alert alert-danger mt-2">
                                                    <?= $_SESSION['sd_required']; ?>
                                                </div>
                                            <?php } unset($_SESSION['sd_required']) ?>
                                        </div>
                                    
                                        <div class="mb-3 m-auto">
                                            <button type="submit" class="btn btn-success btn-lg" name="submitService">Add New Service</button>
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
<?php if(isset($_SESSION['service_success'])){ ?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Service has been saved',
        showConfirmButton: false,
        timer: 2500
        })
    </script>
        <?php } unset($_SESSION['service_success']); ?>

<?php if(isset($_SESSION['service_error'])){ ?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Somethig Went Wrong!',
        showConfirmButton: false,
        timer: 2500
        })
    </script>
        <?php } unset($_SESSION['service_error']); ?>