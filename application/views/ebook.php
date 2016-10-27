<!-- Top Navigation -->
<?= $this->load->view('topnav', '', TRUE) ?>

<div class="container-fluid" style="background-color: #E0E4CC; padding-bottom: 50px">
    <div class="row">       
        
       <!-- Main Content -->
       <div class="col-sm-9 col-md-10 main" style="margin-left: 10%;">
            <span class="label label-primary">Total Downloads: </span><span class="label label-danger"><?php if (isset($counter)) { echo $counter; } ?></span>
            <button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#uploadModal"><span class="glyphicon glyphicon-plus"></span>Upload</button>
            
            <!--<h2 class="page-title"></h2>-->
            <?php if (isset($success_msg)) : ?> 
                <div class="alert alert-success" role="alert">
                    <?php echo $success_msg; ?>
                </div>
            <?php elseif ( isset($error_msg) ): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error_msg; ?>
                </div>
            <?php endif; ?>
                
        
            <div class="tab-content white-bg" style="background-color: transparent; padding: 0; border: 0; margin-top: 20px;">

                <div class="row">
                <?php if ( isset($ebooks) ): ?>
                    <?php foreach ( $ebooks as $ebook ): ?>
                    <div class="col-xs-8 col-sm-6 col-md-4 col-lg-3">
                        <div class="thumbnail">

                            <a href="" data-toggle="modal" data-target="#myModal<?php echo $ebook->id; ?>">
                                <img src="<?= base_url('assets/images/thumbnails/'.$ebook->thumbnail) ?>" alt="documuents">
                            </a>
                            <div class="caption">
                                <h5 class="ellipsis"><strong><?php echo $ebook->title; ?></strong></h5>
                            </div>

                        </div>
                    </div>
                  <?php endforeach; ?>
                <?php endif; ?>
                    <?= $this->load->view('modal', '', TRUE) ?>
                </div>
                              
            </div>
            
         
        </div>

    </div>
</div>

<nav class="navbar navbar-inverse navbar-fixed-bottom" style="background-color: #4D968A; height: 75px; border: none; padding-top: 10px;">    
    <a href="http://www.techfactors.com/" style="margin-left: 45%; margin-right: 45%;">
        <img src="<?= base_url('assets/images/logo/main.png') ?>" alt="ICT"/>
    </a>
</nav>

