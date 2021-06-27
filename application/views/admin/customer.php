<div class="container-fluid">
    <div class="offset-2 mt-5">
        <div class="accordion" id="accordionExample">
            <?php $index = 1; ?>
            <?php foreach($customers as $customer) : ?>
            <div class="accordion-item mb-4 login-form">
                <h2 class="accordion-header" id="heading<?php echo $index; ?>">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse<?php echo $index; ?>" aria-expanded="false"
                        aria-controls="collapse<?php echo $index; ?>">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col text-start">Customer
                                    <?php if(empty($customer['firstname'])){echo $customer['email'];}else{echo $customer['firstname'];} ?>
                                </div>
                                <div class="col text-end">Last interactive <?php if(!empty($customer['updated_at'])){
                                            echo date('d/m/Y', strtotime($customer['updated_at']));
                                         }else{
                                             echo 'NEVER';
                                        } ?></div>
                            </div>
                        </div>
                    </button>
                </h2>
                <div id="collapse<?php echo $index; ?>" class="accordion-collapse collapse"
                    aria-labelledby="heading<?php echo $index; ?>" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-6 login-form">
                                    <p>Name: <?php echo $customer['firstname']; ?><br>Last name:
                                        <?php echo $customer['lastname']; ?><br>Email: <?php echo $customer['email']; ?>
                                    </p>
                                </div>
                                <div class="col-6">
                                    <div class="col">
                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <a class="btn btn-danger d-grid mx-auto" data-bs-toggle="modal"
                                                    data-bs-target="#Modal<?php echo $index; ?>" href="">DELETE USER</a>
                                            </div>
                                            <div class="modal fade" id="Modal<?php echo $index; ?>" tabindex="-1"
                                                aria-labelledby="#Modal<?php echo $index; ?>" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col">Are you sure:</div>
                                                                <div class="col">
                                                                    <a class="btn btn-danger px-5"
                                                                        href="<?php echo base_url(); ?>admin/delete_customer/<?php echo $customer['id']; ?>">YES</a>
                                                                </div>
                                                                <div class="col">
                                                                    <button type="button" class="btn btn-secondary px-5"
                                                                        data-bs-dismiss="modal">NO</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <a class="btn btn-secondary d-grid mx-auto"
                                                    href="<?php echo base_url(); ?>admin/edit_customer/<?php echo $customer['id']; ?>">EDIT USER</a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div>
                                                <a class="btn btn-primary d-grid mx-auto"
                                                    href="<?php echo base_url(); ?>admin/show_message_history/<?php echo $customer['id']; ?>">Show the User's Messages</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $index++; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<div class="container">
    <?php if($this->session->flashdata('customer_updated')): ?>
    <?php echo '<p class="alert alert-success text-center">'.$this->session->flashdata('customer_updated').'</p>'; ?>
    <?php endif; ?>
</div>