<div class="container-fluid">
    <div class="offset-3 mt-5">
        <?php if($edit_customer): ?>
        <?php echo form_open('admin/update_customer'); ?>
        <input type="hidden" name="id" value="<?php echo $user_id ?>">
        <div class="mb-3">
            <label for="firstname" class="form-label">First Name</label>
            <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $firstname ?>">
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $lastname ?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" value="<?php echo $email ?>" disabled>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password"
                placeholder="&#9679;&#9679;&#9679;&#9679;">
        </div>
        <div class="mb-3 text-end">
            <button type="submit" class="btn btn-outline-primary px-5">Update</button>
        </div>
        </form>
        <?php else: ?>
        <?php echo form_open('admin/update'); ?>
        <input type="hidden" name="id" value="<?php echo $user_id ?>">
        <div class="mb-3">
            <label for="firstname" class="form-label">First Name</label>
            <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $firstname ?>">
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $lastname ?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" value="<?php echo $email ?>" disabled>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password"
                placeholder="&#9679;&#9679;&#9679;&#9679;">
        </div>
        <div class="mb-3 text-end">
            <button type="submit" class="btn btn-outline-primary px-5">Update</button>
        </div>
        </form>
        <?php if($this->session->flashdata('admin_updated')): ?>
        <?php echo '<p class="alert alert-success text-center">'.$this->session->flashdata('admin_updated').'</p>'; ?>
        <?php endif; ?>
        <?php endif; ?>
    </div>
</div>