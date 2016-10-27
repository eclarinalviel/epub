<div class="container-fluid">
    <div class="row">
        <div class="col-md-offset-4 col-md-4 col-lg-offset-4 col-lg-4" style="margin-bottom: 15px; margin-top: 45px;">
            <a class="text-center center-block" href="<?= base_url() ?>"><img src="<?= base_url('assets/images/logo/tfi_logo.png'); ?>" height="60px" width="auto" alt="TechFactors Inc."/></a>
        </div>

        <div class="col-xs-offset-3 col-xs-6 col-sm-offset-3 col-sm-6 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6 signin up-top" style="background-color: #002D45; padding:15px; border-radius: 3px;">

            <?php echo form_open(); ?>
            <?php if ($error): ?>
                <div class="alert alert-danger wow shake">
                    <?= $error ?>
                </div>
            <?php endif; ?>
            <?php if (validation_errors()): ?>
                <div class="alert alert-danger wow shake">
                    <?php echo validation_errors(); ?>
                </div>
            <?php endif; ?>
            <div class="">
                <?php echo (form_error('username')) ? '<div class = "form-group has-error has-feedback">' : '<div class = "form-group">'; ?>
                <label class="control-label" style=" color: #ccc;">Email Address</label>

                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <?php echo form_input(array('class' => 'form-control', 'name' => 'username', 'placeholder' => 'Email Address', 'tabindex' => '1', 'style' => 'background-color: #002D45; border-radius: 2px; color: #fff; font-size: 18px;', 'value' => set_value('username'))); ?>
                </div>
                <?= '</div>' ?>
                <?php echo (form_error('password')) ? '<div class = "form-group has-error has-feedback">' : '<div class = "form-group">'; ?>
                <label class="control-label" style=" color: #ccc;">Password</label>

                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <?php echo form_password(array('class' => 'form-control', 'name' => 'password', 'placeholder' => 'Password', 'tabindex' => '2', 'style' => 'background-color: #002D45; border-radius: 2px; color: #fff; font-size: 18px;', 'value' => set_value('password'))); ?>
                </div>
                <?= '</div>' ?>
            </div>
            <div class="checkbox">
                <a href="" data-toggle="modal" data-target="#myModal" style="color: #ccc; font-size: 12px;">Forgot Password?</a>
                <a href="" data-toggle="modal" data-target="#registerModal" style="color: #FF414D; font-size: 12px; font-weight: 600; padding-left: 10px;">Create an Account.</a>
                
            </div>
            <div class="up-top down-below">
                <button type="submit" id="btn-change-state" class="log_butt btn-block" data-loading-text="loading..." tabindex="3">Log In
                </button>
            </div>
            <?php echo form_close(); ?>
        </div>

        <!-- Forgot Password Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Forgot your password?</h4>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open(); ?>
                        <?php echo (form_error('email')) ? '<div class = "form-group has-error has-feedback">' : '<div class = "form-group">'; ?>
                        <label style="font-weight: normal;">Please enter your registered email address</label>
                        <?php echo form_input(array('class' => 'form-control', 'name' => 'email', 'placeholder' => 'example@email.com', 'tabindex' => '1')); ?>
                        <?= '</div>' ?>
                        <div class="up-top down-below">
                            <button type="submit" id="btn-change-state"
                                    class="log_butt btn-block"
                                    data-loading-text="loading..." tabindex="2">submit
                            </button>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Forgot Password Modal -->


        <!-- Register Modal -->
        <div class="modal fade" id="registerModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Account Registration</h4>
                        <h5 style="font-size: 14px;">Please take note that you will use your e-mail address for you to login.</h5>
                    </div>

                    <div class="modal-body">
                       <form action="<?=base_url('account/register')?>" method="post" role="form">
                            
                            <div class="form-group">
                                <label for="firstname">Firstname</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" required>
                            </div>
                            <div class="form-group">
                                <label for="lastname">Lastname</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>

                            <hr>
                            <div class="form-group">
                                <label for="school">Code</label>
                                <input type="text" class="form-control" id="school_code" name="school_code" required>
                            </div>

                            <button type="submit" class="btn btn-danger btn-block">Submit</button>
                        </form>

                    </div>
                    <div class="modal-footer">
                     <!--  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                        </div>
                    </div>
             </div>
         </div>
        <!-- End of Register Modals -->

    </div>
</div>
