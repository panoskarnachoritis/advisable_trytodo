<div class="container-fluid">
    <a class="btn btn-secondary ms-3 mt-4 px-5 py-2" href="<?php echo base_url(); ?>customer/login">Back</a>
</div>
<div class="container-fluid">
    <div class="offset-3 mt-5">
        <h4 class="text-center">REGISTRY PAGE</h4>
        <div class="mt-5">
            <?php echo form_open('customer/register'); ?>
            <div class="mb-3">
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname"
                    value="<?php echo set_value('firstname') ?>" autofocus>
                <?php if(!empty(form_error('firstname'))): ?>
                <div class="alert alert-danger mt-2"><?php echo form_error('firstname'); ?></div>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname"
                    value="<?php echo set_value('lastname') ?>">
                <?php if(!empty(form_error('lastname'))): ?>
                <div class="alert alert-danger mt-2"><?php echo form_error('lastname'); ?></div>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="<?php echo set_value('email') ?>" placeholder="name@example.com">
                <?php if(!empty(form_error('email'))): ?>
                <div class="alert alert-danger mt-2"><?php echo form_error('email'); ?></div>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password"
                    value="<?php echo set_value('password') ?>" placeholder="&#9679;&#9679;&#9679;&#9679;">
                <?php if(!empty(form_error('password'))): ?>
                <div class="alert alert-danger mt-2"><?php echo form_error('password'); ?></div>
                <?php endif; ?>
            </div>
            <div class="mb-5">
                <label for="passconf" class="form-label">Retype Password</label>
                <input type="password" class="form-control" id="passconf" name="passconf"
                    value="<?php echo set_value('passconf') ?>" placeholder="&#9679;&#9679;&#9679;&#9679;">
                <?php if(!empty(form_error('passconf'))): ?>
                <div class="alert alert-danger mt-2"><?php echo form_error('passconf'); ?></div>
                <?php endif; ?>
            </div>
            <div class="mb-3 text-end">
                <button type="submit" class="btn btn-outline-primary px-5">Register</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="offset-3 mt-5">
        <?php if($this->session->flashdata('account_created')): ?>
        <?php echo '<p class="alert alert-success text-center">'.$this->session->flashdata('account_created').'</p>'; ?>
        <?php endif; ?>
    </div>
</div>