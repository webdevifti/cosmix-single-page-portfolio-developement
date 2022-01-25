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
                        <h1 class="h3 mb-0 text-gray-800">Fun Fact</h1>
                       
                    </div>
                    <?php

                        $get_fun_fact = getFunFact();

                        if(isset($_POST['updateFF'])){
                            updateFunFact($_POST);
                        }
                    ?>
                    <div class="row">
                        <div class="col-lg-4 m-auto">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h3>Update Fun Fact</h3>
                                </div>
                                <div class="card-body">
                                    <form action="fun-fact.php" method="POST">
                                        <input type="hidden" value="<?= $get_fun_fact['id']; ?>" name="id">
                                       <div class="mt-2">
                                            <label for="">Happy Client</label>
                                            <input type="number" name="clients" class="form-control" value="<?= $get_fun_fact['client_number']; ?>">
                                       </div>
                                       <div class="mt-2">
                                            <label for="">Completed Projects </label>
                                            <input type="number" name="projects" class="form-control" value="<?= $get_fun_fact['completed_project']; ?>">
                                       </div>
                                       <div class="mt-2">
                                            <label for="">Cups Of Coffee</label>
                                            <input type="number" name="coffees" class="form-control" value="<?= $get_fun_fact['cups_of_coffee']; ?>">
                                       </div>
                                       <div class="mt-2">
                                            <label for="">Lines Of Code</label>
                                            <input type="number" name="linesofcode" class="form-control" value="<?= $get_fun_fact['line_of_code']; ?>">
                                       </div>
                                       <div class="mt-2">
                                           <button type="submit" name="updateFF" class="btn btn-success">Update</button>
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

<?php if(isset($_SESSION['fun_facts'])) {?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Updated',
        showConfirmButton: false,
        timer: 2600
        })
    </script>
    <?php } unset($_SESSION['fun_facts']) ?>

<?php if(isset($_SESSION['fun_facts_eror'])) {?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Error Occured While Updating.',
        showConfirmButton: false,
        timer: 2600
        })
    </script>
    <?php } unset($_SESSION['fun_facts_eror']) ?>