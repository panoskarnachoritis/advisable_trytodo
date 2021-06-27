<div class="container-fluid">
    <a class="btn btn-secondary ms-3 mt-4 px-5 py-2" href="<?php echo base_url(); ?>admin/login">Back</a>
</div>
<div class="container-fluid">
    <div class="offset-2 mt-5">
        <p class="text-center mb-4 pt-5">Lost Password?<br>Entry here your email and we will send you a link to generate
            your password again.</p>
        <div class="mt-5">
            <?php echo form_open('lostPasswordForAdmin/send_request'); ?>
                <div class="mb-5">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email') ?>" 
                    placeholder="name@example.com" autofocus>
                    <?php if(!empty(form_error('email'))): ?>
                        <div class="alert alert-danger text-center mt-2"><?php echo form_error('email'); ?></div>
                    <?php endif; ?>
                </div>
                <div class="mb-3 text-end">
                    <button type="submit" class="btn btn-outline-primary px-5">Remind Me</button>
                </div>

            </form>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="offset-3 mt-5">

        <?php if($this->session->flashdata('send_request')): ?>
        <?php echo '<p class="alert alert-success text-center">'.$this->session->flashdata('send_request').'</p>'; ?>
        <?php endif; ?>
        
    </div>
</div>