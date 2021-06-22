<div class="container-fluid">
    <div class="row me-5 mt-5">
        <div class="text-end">
            <a class="btn btn-outline-primary px-5" href="<?php echo base_url(); ?>admin">FOR ADMIN</a>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="offset-3 mt-5">
        <h4 class="text-center">LOGIN INTO YOUR ACCOUNT</h4>
        <div class="login-form px-3">
            <h5 class="text-center">CUSTOMER</h5>
            <?php echo form_open('customer/login'); ?>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="&#9679;&#9679;&#9679;&#9679;">
            </div>
            <div class="mb-3 text-end">
                <button type="submit" class="btn btn-outline-primary">OK</button>
            </div>
            <div class="mb-3 text-center">
                <a class="text-decoration-none fs-6 px-5 py-2" href="<?php echo base_url(); ?>lost-password">Lost My
                    Password</a>
            </div>
            <div class="mb-3 text-center">
                <a class="text-decoration-none fs-6 px-5 py-2" href="<?php echo base_url(); ?>register">New Account</a>
            </div>

            </form>
        </div>
    </div>
</div>