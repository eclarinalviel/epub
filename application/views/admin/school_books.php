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

            <div class="btn-group btn-group-xs" role="group" aria-label="...">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addBookAccess">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Book Access
                </button>                  
            
            </div>

            <div style="padding-top: 30px">
                
               <!-- <div id="books" class="pad-section"> -->
				    <?php if( $books ):  ?>
				        <?php $count = 0;  ?>
				        <?php foreach( $books as $book ): ?>

				            <div class="col-lg-2 col-md-4 col-sm-6" style="padding:20px 30px 0px 30px">
				                <a role="button" data-toggle="modal" href="#ebook_download<?= $book->id; ?>" class="portfolio-box">
				                    <img src="<?= base_url('assets/images/thumbnails/'.$book->thumbnail) ?>" class="img-responsive" alt="">
				                    <div class="portfolio-box-caption">
				                        <div class="portfolio-box-caption-content">
				                            <div class="project-name" style="padding-bottom: 20px; font-weight: bold; text-transform: uppercase;">
				                                <?= $book->title ?>
				                            </div>
				                            <div class="project-category text-faded" style="text-transform: none;">
				                                <?= $book->description ?>
				                            </div>
				                            <!-- <button data-toggle="modal" data-target="#ebook_download<?= $book->id; ?>" class="btn btn-danger btn-trans" style="margin-top: 20px;"><span class="glyphicon glyphicon-save"></span> Download</button> -->
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


<!-- Add Book Access Modal -->
<div class="modal fade" id="addBookAccess" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
               <form action="<?=base_url('admin/book_access')?>" method="post" role="form">
               <input type="hidden" class="form-control" name="school_id" value="<?= $this->uri->segment(4); ?>">
                    <div class="form-group">
                        <label for="book">Books</label>
                        <select name="book" class="form-control" id="book">
                            <?php foreach($epubs as $book): ?>
                                <option value="<?= $book->id ?>" > <?= $book->title ?> </option>
                            <?php endforeach?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="grade_level">Grade Level</label>
                        <select name="grade_level" class="form-control" id="grade_level">
                            <?php foreach($grade_levels as $level): ?>
                                <option value="<?= $level->id ?>" > <?= $level->level ?> </option>
                            <?php endforeach?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-danger">Submit</button>
                </form>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        </div>
	    </div>
	</div>
</div>
<!-- End of Add Book Access Modals -->


 <?= $this->load->view('footer', '', TRUE) ?>