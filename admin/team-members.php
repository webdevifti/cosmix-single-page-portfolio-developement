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
                        <h1 class="h3 mb-0 text-gray-800">Team Memebrs</h1>
                        <a href="add-member.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa- fa-sm text-white-50"></i>Add New Member</a>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h3>Your Team Members</h3>
                                </div>
                                <div class="card-body">
                                    <table class="table" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Member's Name</th>
                                                <th>Member's Designation</th>
                                                <th>Member's Photo</th>
                                                <th>Member's Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                               $getTeam_member = getTeamMember();
                                               foreach($getTeam_member as $team_member){
                                            ?>
                                            <tr>
                                                <td><?= $team_member['id']; ?></td>
                                                <td><?= $team_member['name']; ?></td>
                                                <td><?= $team_member['designation']; ?></td>
                                                <td><img height="80" width="80" src="./uploads/teams/<?= $team_member['photo']; ?>" /></td>
                                                <td>
                                                    <?php 
                                                    if($team_member['status'] == 1){ ?>
                                                        <a href="" class="btn btn-success">Active</a>
                                                    <?php } else { ?> 
                                                        <a href="" class="btn btn-danger">Deactive</a>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <a name="" class="btn btn-warning delete">Delete</a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Team Member Social Links</h3>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Team Member Name</th>
                                                <th>Social Media</th>
                                                <th>Social Media Url</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                               $getsocial =  getTeamMemberSocialMedia();
                                               foreach($getsocial as $social){
                                            
                                            ?>
                                            <tr>
                                                <td><?= $social['social_link_id']; ?></td>
                                                <td><?= $social['name']; ?></td>
                                                <td><?= $social['social_name']; ?></td>
                                                <td><?= $social['social_url']; ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php require 'layouts/footer.php'; ?>