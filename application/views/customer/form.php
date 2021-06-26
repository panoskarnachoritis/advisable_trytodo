<div class="container-fluid">
    <div class="offset-2 mt-5">
        <?php echo form_open('customer/submit_form'); ?>
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" name="message" id="message" cols="30" rows="10" maxlength="750" autofocus
                required></textarea>
        </div>
        <div class="mb-3 text-end">
            <button type="submit" class="btn btn-outline-primary px-5">Send</button>
        </div>
        </form>
        <?php if($this->session->flashdata('message_submitted')): ?>
        <?php echo '<p class="alert alert-success text-center">'.$this->session->flashdata('message_submitted').'</p>'; ?>
        <?php endif; ?>
    </div>
</div>