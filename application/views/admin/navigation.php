<div class="container-fluid">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid justify-content-end">
            <div id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $fullname ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>admin/logout">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="d-flex justify-content-evenly mt-5">
        <a class="btn btn-outline-primary px-4 <?php if($this->uri->segment(2)=="profile"){echo "active";}?>"
            href="<?php echo base_url(); ?>admin/profile">My Profile</a>
        <a class="btn btn-outline-primary px-4 <?php if($this->uri->segment(2)=="show_customers" || $this->uri->segment(2)=="edit_customer"){echo "active";}?>"
            href="<?php echo base_url(); ?>admin/show_customers">Customers</a>
        <a class="btn btn-outline-primary px-4 <?php if(!($this->uri->segment(2)=="show_message_history")){echo "disabled";} ?> <?php if($this->uri->segment(2)=="show_message_history"){echo "active";}?>"
            href="">All Message History</a>
    </div>
</div>
