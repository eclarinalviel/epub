<!-- <h1>School Books</h1> -->

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
               
               <!-- <div id="books" class="pad-section"> -->
				    <?php if( $books ):  ?>
				        <?php $count = 0;  ?>
				        <?php foreach( $books as $book ): ?>

				            <div class="col-lg-2 col-sm-4" style="padding:20px 30px 0px 30px">
				                <a role="button" data-toggle="modal" href="#ebook_download<?= $book->id; ?>" class="portfolio-box">
				                    <img src="<?= base_url('assets/images/thumbnails/'.$book->thumbnail) ?>" class="img-responsive" alt="">
				                    <div class="portfolio-box-caption">
				                        <div class="portfolio-box-caption-content">
				                            <div class="project-category text-faded">
				                                <?= $book->title ?>
				                            </div>
				                            <div class="project-name">
				                                <?= $book->description ?>
				                            </div>
				                            <button data-toggle="modal" data-target="#ebook_download<?= $book->id; ?>" class="btn btn-danger btn-trans" style="margin-top: 20px;"><span class="glyphicon glyphicon-save"></span> Download</button>
				                        </div>
				                    </div>
				                </a>
				            </div>
				        
				           
				        <?php endforeach; ?>
				    <?php endif; ?>

				  <!-- </div> -->

				  
				</div>
                
              
            </div>

        </div>

    </div>
</div>

