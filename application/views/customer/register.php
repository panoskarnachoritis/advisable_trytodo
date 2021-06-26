<div class="container-fluid">
    <div class="offset-3 mt-5">
        <h4 class="text-center">REGISTRY PAGE</h4>
        <div class="mt-5">
            <?php echo form_open('customer/register'); ?>
            <div class="mb-3">
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname"
                    value="<?php echo set_value('firstname') ?>" autofocus>
                <div class="bg-danger mt-2">
                    <strong class="text-white"><?php echo form_error('firstname'); ?></strong>
                </div>
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname"
                    value="<?php echo set_value('lastname') ?>">
                <div class="bg-danger mt-2">
                    <strong class="text-white"><?php echo form_error('lastname'); ?></strong>
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="<?php echo set_value('email') ?>" placeholder="name@example.com">
                <div class="bg-danger mt-2">
                    <strong class="text-white"><?php echo form_error('email'); ?></strong>
                </div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password"
                    value="<?php echo set_value('password') ?>" placeholder="&#9679;&#9679;&#9679;&#9679;">
                <div class="bg-danger mt-2">
                    <strong class="text-white"><?php echo form_error('password'); ?></strong>
                </div>
            </div>
            <div class="mb-5">
                <label for="passconf" class="form-label">Retype Password</label>
                <input type="password" class="form-control" id="passconf" name="passconf"
                    value="<?php echo set_value('passconf') ?>" placeholder="&#9679;&#9679;&#9679;&#9679;">
                <div class="bg-danger mt-2">
                    <strong class="text-white"><?php echo form_error('passconf'); ?></strong>
                </div>
            </div>
            <div class="mb-3 text-end">
                <button type="submit" class="btn btn-outline-primary px-5">Register</button>
            </div>
            </form>
        </div>
    </div>
</div>