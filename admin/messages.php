<?php require 'layouts/header.php'; ?>

<?php 
if(isset($_GET['id'])){
    $id = $_GET['id'];
    deleteMessage($id);
}


// authorization
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
                        <h1 class="h3 mb-0 text-gray-800">Messages</h1>
                       
                    </div>

                    <!-- Content Row -->
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Messages Data</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                               
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Sender Name</th>
                                            <th>Sender Email</th>
                                            <th>Sender Message Subject</th>
                                            <th>Sender Message</th>
                                            <th>Sended Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Sender Name</th>
                                            <th>Sender Email</th>
                                            <th>Sender Message Subject</th>
                                            <th>Sender Message</th>
                                            <th>Sended Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                        
                                            $messages = getMessages(); 
                                            foreach($messages as $msg){
                                        ?>
                                        <tr>
                                            
                                            <td><?= $msg['id']; ?></td>
                                            <td><?= $msg['sender_name']; ?></td>
                                            <td><a href="mailto:<?= $msg['sender_email']; ?>"><?= $msg['sender_email']; ?></a></td>
                                            <td><?= $msg['message_subject']; ?></td>
                                            <td><?= $msg['sender_message']; ?></td>
                                            <td><?= date('M-d-Y, h:i a', strtotime($msg['sended_at'])); ?></td>
                                            <td>
                                                <a href="mailto:<?= $msg['sender_email']; ?>" class="btn btn-info btn-sm">Send Reply</a>
                                                <a name="messages.php?id=<?= $msg['id']; ?>" class="btn btn-danger btn-sm delete">Delete</button>
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
    if(isset($_SESSION['msg_delete_success'])){ 
    
    ?>
    <script>
    Swal.fire(
        'Deleted!',
        'Message has been deleted.',
        'success'
        )
    </script>

<?php } unset($_SESSION['msg_delete_success']); ?>

