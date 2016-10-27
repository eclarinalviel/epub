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
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-institution fa-5x"></i>
                                    </div>
                                   
                                </div>
                            </div>
                            <a href="<?= base_url('admin/school/info/'.$this->uri->segment(3)) ?>">
                                <div class="panel-footer">
                                    <span class="pull-left">View School Information</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    
                                </div>
                            </div>
                            <a href="<?= base_url('admin/school/users/'.$this->uri->segment(3)) ?>">
                                <div class="panel-footer">
                                    <span class="pull-left">View School Users</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                      <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary no-border">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-book fa-5x"></i>
                                    </div>
                                 
                                </div>
                            </div>
                            <a href="<?= base_url('admin/school/books/'.$this->uri->segment(3)) ?>">
                                <div class="panel-footer">
                                    <span class="pull-left">View Purchased Books</span>
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
