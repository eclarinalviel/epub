<div class="container-fluid">
    <div class="row">

        <div class="col-md-offset-4 col-md-4 col-lg-offset-4 col-lg-4">
            <a class="text-center center-block" href="<?= base_url() ?>"><img
                    src="<?= base_url('assets/images/logo/englishtek-medium-logo.png'); ?>"
                    alt="EnglishTek by TechFactors Inc."/></a>
        </div>

        <div class="col-md-offset-4 col-md-4 col-lg-offset-4 col-lg-4 white-bg signin up-top">
            <h3>Forgot Your Password?</h3>
            <hr/>
            <?php if ($success): ?>
                <div class="alert alert-success">Thank you. We have sent you an email with further instructions on how
                    to reset your password.
                </div>
                <div class="down-below">
                    <a href="<?=base_url('auth/signin'); ?>">&larr;&nbsp;Back to sign in page</a>
                </div>
            <?php else: ?>
                <?php echo form_open(); ?>
                <?php echo validation_errors(); ?>
                <?php echo (form_error('email')) ? '<div class = "form-group has-error has-feedback">' : '<div class = "form-group">'; ?>
                <label class="control-label">Email</label>
                <?php echo form_input(array('class' => 'form-control', 'name' => 'email', 'placeholder' => 'example@email.com', 'tabindex' => '1')); ?>
                <?= '</div>' ?>
                <a href="<?php echo site_url('auth/signin'); ?>">&larr;&nbsp;Back to sign in page</a>
                <div class="up-top down-below">
                    <button type="submit" id="btn-change-state"
                            class="btn btn-lg btn-primary btn-block"
                            data-loading-text="loading..." tabindex="2">submit
                    </button>
                </div>
                <?php echo form_close(); ?>
            <?php endif; ?>
        </div>

    </div>
</div>

