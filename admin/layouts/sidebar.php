<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <?php
            
            $get_url = $_SERVER['PHP_SELF'];
            $explode_url = explode('/',$get_url);
            $get_end = end($explode_url);

            ?>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php if($get_end == 'index.php'){ echo 'active';} ?>">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

       
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    
                    <i class="fas fa-fw fa-sliders-h"></i>
                    <span>Banner Section</span>
                </a>
                <div id="collapseUtilities" class="collapse <?php if($get_end == 'banner-slider.php' || $get_end == 'add-banner.php'){ echo 'show'; } ?>" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item <?php if($get_end == 'add-banner.php'){ echo "active"; } ?>" href="add-banner.php">Add New Banner Slider</a>
                        <a class="collapse-item <?php if($get_end == "banner-slider.php"){ echo "active"; } ?>" href="banner-slider.php">View Banner Slider</a>
                    </div>
                </div>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="about-section.php">
                    <i class="fas fa-fw fa-address-card"></i>
                    <span>About Section</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities3"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    
                    <i class="fab fa-fw fa-servicestack"></i>
                    <span>Services Section</span>
                </a>
                <div id="collapseUtilities3" class="collapse <?php if($get_end == 'add-service.php' || $get_end == 'services.php' || $get_end == 'experience.php'){ echo 'show'; } ?>" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item <?php if($get_end == 'add-service.php'){ echo "active"; } ?>" href="add-service.php">Add New Service</a>
                        <a class="collapse-item <?php if($get_end == "services.php"){ echo "active"; } ?>" href="services.php">All Services</a>
                        <a class="collapse-item <?php if($get_end == "experience.php"){ echo "active"; } ?>" href="experience.php">Experiences</a>
                    </div>
                </div>
            </li>
            <li class="nav-item <?php if($get_end == 'add-feature.php'){ echo "active"; } ?>">
                <a class="nav-link" href="add-feature.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Features Section</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities5"
                    aria-expanded="true" aria-controls="collapseUtilities">
                   
                    <i class="fas fa-fw fa-comment-alt"></i>
                    <span>Testimonials Section</span>
                </a>
                <div id="collapseUtilities5" class="collapse <?php if($get_end == 'add-testimonial.php' || $get_end == 'testimonials.php' || $get_end == 'add-testimonial-bg.php'){ echo 'show'; } ?>" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item <?php if($get_end == 'add-testimonial.php'){ echo "active"; } ?>" href="add-testimonial.php">Add New Testimonial</a>
                        <a class="collapse-item <?php if($get_end == "testimonials.php"){ echo "active"; } ?>" href="testimonials.php">All Testimonials</a>
                        <a class="collapse-item <?php if($get_end == "add-testimonial-bg.php"){ echo "active"; } ?>" href="add-testimonial-bg.php">Testimonial Backgrounds</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities4"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-briefcase"></i>
                    <span>Portfolio Section</span>
                </a>
                <div id="collapseUtilities4" class="collapse <?php if($get_end == 'add-portfolio.php' || $get_end == 'portfolio.php'){ echo 'show'; } ?>" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item <?php if($get_end == 'add-portfolio.php'){ echo "active"; } ?>" href="add-portfolio.php">Add New Portfolio</a>
                        <a class="collapse-item <?php if($get_end == "portfolio.php"){ echo "active"; } ?>" href="portfolio.php">All Portfolio</a>
                    </div>
                </div>
            
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitiesT"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Team Seaction</span>
                </a>
                <div id="collapseUtilitiesT" class="collapse <?php if($get_end == 'add-member.php' || $get_end == 'team-members.php'){ echo 'show'; } ?>" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item <?php if($get_end == 'add-member.php'){ echo "active"; } ?>" href="add-member.php">Add New Member</a>
                        <a class="collapse-item <?php if($get_end == "team-members.php"){ echo "active"; } ?>" href="team-members.php">Team Members</a>
                    </div>
                </div>
            </li>
            <?php 
                 $email = $_SESSION['USEREMAIL'];
                 $data = getLoggedInUserData($email);
                 if($data['role'] === 'admin'){
            ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Users</span>
                </a>
                <div id="collapseUtilities2" class="collapse <?php if($get_end == 'add-user.php' || $get_end == 'users.php'){ echo 'show'; } ?>" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item <?php if($get_end == 'add-user.php'){ echo "active"; } ?>" href="add-user.php">Add New User</a>
                        <a class="collapse-item <?php if($get_end == "users.php"){ echo "active"; } ?>" href="users.php">All Users</a>
                    </div>
                </div>
            </li>
            
            <li class="nav-item <?php if($get_end == 'messages.php'){ echo "active"; } ?>">
                <a class="nav-link" href="messages.php">
                    <i class="fas fa-fw fa-envelope"></i>
                    <span>Messages</span></a>
            </li>
            <?php } ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities7"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Site Settings</span>
                </a>
                <div id="collapseUtilities7" class="collapse <?php if($get_end == 'site_social_links.php' || $get_end == 'site-info.php'){ echo 'show'; } ?>" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item <?php if($get_end == 'site-info.php'){ echo "active"; } ?>" href="site-info.php">Site Information</a>
                        <a class="collapse-item <?php if($get_end == 'site_social_links.php'){ echo "active"; } ?>" href="site_social_links.php">Site Social Links</a>
                       
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitiesM"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-info-circle"></i>
                    <span>More</span>
                </a>
                <div id="collapseUtilitiesM" class="collapse <?php if($get_end == 'contact-info.php' || $get_end == 'fun-fact.php' || $get_end == 'brands.php'){ echo 'show'; } ?>" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item <?php if($get_end == 'contact-info.php'){ echo "active"; } ?>" href="contact-info.php">Contact Information</a>
                        <a class="collapse-item <?php if($get_end == "fun-fact.php"){ echo "active"; } ?>" href="fun-fact.php">Fun Facts</a>
                        <a class="collapse-item <?php if($get_end == "brands.php"){ echo "active"; } ?>" href="brands.php">Brands / Clients</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        