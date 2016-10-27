<!-- Top Navigation -->
<?= $this->load->view('topnav', '', TRUE) ?>

<div class="container-fluid">
    <div class="row">
        <!-- Left Navigation -->
        <div class="col-sm-3 col-md-2 sidebar">
            <?= $this->load->view('leftnav', '', TRUE) ?>
        </div>
        <!-- Main Content -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title"><?= $page_title ?></h2>
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active"><a href="#update" data-toggle="tab">Update</a></li>
                    </ul>

                    <div class="tab-content white-bg">
                        <div id="update" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php foreach ($school_data as $row): ?>
                                        <img src="<?= base_url('assets/images/avatar/default.png')?>" alt="Avatar">
                                        <div class="up-top">
                                            <?php echo form_open('account/update_school'); ?>
                                            
                                            <div class="row">
                                                <?php echo (form_error('school_name')) ? '<div class = "col-md-6 form-group has-error has-feedback">' : '<div class = "col-md-6 form-group">'; ?>
                                                <label class="control-label">School Name</label>
                                                <input type="text" class="form-control" name="school_name"
                                                       value="<?= $row->name ?>" placeholder="School Name"/>
                                                <?= '</div>' ?>
                                            </div>

                                            <div class="row">
                                                <?php echo (form_error('email')) ? '<div class = "col-md-6 form-group has-error has-feedback">' : '<div class = "col-md-6 form-group">'; ?>
                                                <label class="control-label">Email Address</label>
                                                <input type="text" class="form-control" name="email"
                                                       value="<?= $row->email ?>" placeholder="Email Address"/>
                                                <?= '</div>' ?>
                                            </div>

                                            <div class="row">
                                                <?php echo (form_error('city_municipality')) ? '<div class = "col-md-6 form-group has-error has-feedback">' : '<div class = "col-md-6 form-group">'; ?>
                                                <label class="control-label">City/Municipality</label>
                                                <input type="text" class="form-control" name="city_municipality"
                                                       value="<?= $row->city_municipality ?>" placeholder="City or Municipality"/>
                                                <?= '</div>' ?>
                                            </div>

                                            <div class="row">
                                                <?php echo (form_error('region')) ? '<div class = "col-md-6 form-group has-error has-feedback">' : '<div class = "col-md-6 form-group">'; ?>
                                                <label class="control-label">Region</label>
                                                <input type="text" class="form-control" name="region"
                                                       value="<?= $row->region ?>" placeholder="example@email.com"/>
                                                <?= '</div>' ?>
                                            </div>

                                            <hr>
                                            <div class="row">
                                                <?php echo (form_error('password')) ? '<div class = "col-md-6 form-group has-error has-feedback">' : '<div class = "col-md-6 form-group">'; ?>
                                                <label class="control-label">New Account Password</label>
                                                <input type="password" class="form-control" name="password"/>
                                                <?= '</div>' ?>
                                            </div>


                                        </div>

                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-footer">
                        <button type="submit" id="btn-change-state"
                                class="btn btn-primary btn-lg"
                                data-loading-text="saving changes" tabindex="4">save changes
                        </button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
