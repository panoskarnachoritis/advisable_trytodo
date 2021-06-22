<div class="container-fluid mt-5">
    <div class="d-flex justify-content-evenly" id="navigation">
        <a class="btn btn-outline-primary px-4 <?php if($this->uri->segment(1)=="my-profile" || $this->uri->segment(1)=="customer"){echo "active";}?>" href="<?php echo base_url(); ?>my-profile">My Profile</a>
        <a class="btn btn-outline-primary px-4 <?php if($this->uri->segment(1)=="form"){echo "active";}?>" href="<?php echo base_url(); ?>form">Submit New Form</a>
        <a class="btn btn-outline-primary px-4 <?php if($this->uri->segment(1)=="history"){echo "active";}?>" href="<?php echo base_url(); ?>history">Message History</a>
    </div>
</div>