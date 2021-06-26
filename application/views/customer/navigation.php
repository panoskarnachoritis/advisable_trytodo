<div class="container-fluid">
    <div class="">
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
                                <li><a class="dropdown-item" href="<?php echo base_url(); ?>customer/logout">Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="d-flex justify-content-evenly mt-5">
        <a class="btn btn-outline-primary px-4 <?php if($this->uri->segment(1)=="my-profile" || $this->uri->segment(1)=="customer"){echo "active";}?>"
            href="<?php echo base_url(); ?>my-profile">My Profile</a>
        <a class="btn btn-outline-primary px-4 <?php if($this->uri->segment(1)=="form"){echo "active";}?>"
            href="<?php echo base_url(); ?>form">Submit New Form</a>
        <a class="btn btn-outline-primary px-4 <?php if($this->uri->segment(1)=="history"){echo "active";}?>"
            href="<?php echo base_url(); ?>history">Message History</a>
    </div>
</div>