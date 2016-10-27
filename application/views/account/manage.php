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
                                    <?php foreach ($user_data as $row): ?>
                                        <img src="<?= base_url('assets/images/avatar/default.png')?>" alt="Avatar">
                                        <div class="up-top">
                                            <?php echo form_open('account/update'); ?>
                                            <div class="row">
                                                <?php echo (form_error('first_name')) ? '<div class = "col-md-6 form-group has-error has-feedback">' : '<div class = "col-md-6 form-group">'; ?>
                                                <label class="control-label">First Name</label>
                                                <input type="text" class="form-control" name="first_name"
                                                       value="<?= $row->fname ?>" placeholder="First Name"/>
                                                <?= '</div>' ?>
                                            </div>
                                            <div class="row">
                                                <?php echo (form_error('last_name')) ? '<div class = "col-md-6 form-group has-error has-feedback">' : '<div class = "col-md-6 form-group">'; ?>
                                                <label class="control-label">Last Name</label>
                                                <input type="text" class="form-control" name="last_name"
                                                       value="<?= $row->lname ?>" placeholder="Last Name"/>
                                                <?= '</div>' ?>
                                            </div>
                                            <div class="row">
                                                <?php echo (form_error('email')) ? '<div class = "col-md-6 form-group has-error has-feedback">' : '<div class = "col-md-6 form-group">'; ?>
                                                <label class="control-label">Email</label>
                                                <input type="email" class="form-control" name="email"
                                                       value="<?= $row->email ?>" placeholder="example@email.com"/>
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
