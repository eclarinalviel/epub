<!-- <h1>School admin dashboard</h1> -->

<!-- Top Navigation -->
<?= $this->load->view('topnav', '', TRUE) ?>

<div class="container-fluid">
    <div class="row">
        <!-- Left Navigation -->
        <div id="sidebar" class="col-xs-4 col-sm-3 col-md-2 sidebar">
            <?= $this->load->view('leftnav', '', TRUE) ?>
        </div>
       <!-- Main Content -->
        <div class="col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-3 col-lg-offset-2 main">
            <h2 class="page-title"><?= $page_title; ?></h2>

                <div style="padding-top: 30px">
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-book fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                    <?php if($users): ?>
                                        <div class="huge"><b><?php echo count($epubs); ?></b></div>
                                    <?php else: ?>
                                        <div class="huge"><b>0</b></div>                                        
                                    <?php endif; ?>
                                        <div>Uploaded ePubs</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?= base_url('school_admin/epubs/') ?>">
                                <div class="panel-footer">
                                    <span class="pull-left">View ePUBs</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                    <?php if($users): ?>
                                        <div class="huge"><b><?php echo count($users); ?></b></div>
                                    <?php else: ?>
                                        <div class="huge"><b>0</b></div>    
                                    <?php endif; ?>
                                        <div>Total Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?= base_url('school_admin/users/') ?>">
                                <div class="panel-footer">
                                    <span class="pull-left">View Users</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                     
                  
                </div>

        </div>

        </div>
    </div>
</div>