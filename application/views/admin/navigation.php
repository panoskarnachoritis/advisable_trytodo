<div class="container-fluid mt-5">
    <div class="d-flex justify-content-evenly" id="navigation">
        <a class="btn btn-outline-primary px-4 <?php if($this->uri->segment(1)=="profile" || $this->uri->segment(1)=="admin"){echo "active";}?>" href="<?php echo base_url(); ?>profile">My Profile</a>
        <a class="btn btn-outline-primary px-4 <?php if($this->uri->segment(1)=="customers"){echo "active";}?>" href="<?php echo base_url(); ?>customers">Customers</a>
        <a class="btn btn-outline-primary px-4 <?php if($this->uri->segment(1)=="message-history"){echo "active";}?>" href="<?php echo base_url(); ?>message-history">All Message History</a>
    </div>
</div>