<div class="container-fluid">
    <div class="offset-3 mt-5">
        <div class="mt-5">
            <?php echo form_open('verification/update'); ?>
            <input type="hidden" name="token" value="<?php echo $token; ?>">
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
                <button type="submit" class="btn btn-outline-primary px-5">Ok</button>
            </div>
            </form>
        </div>
    </div>
</div>