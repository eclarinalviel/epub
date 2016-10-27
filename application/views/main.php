<!-- Top Navigation -->
<?= $this->load->view('topbar', '', TRUE) ?>

<div>
  <!-- FIRST SECTION -->
  <div id="home" class="home">
    <div class="text-vcenter">
      <div class="transpa-box" style="color: #052C3D;">
        <h1>Techfactors</h1>
        <h3> Digital Publishing </h3>
        <a href="#books" class="btn btn-danger btn-lg">Continue</a>
      </div>
      
    </div>
  </div>
  <!-- /FIRST SECTION -->

<!-- SECOND SECTION -->

<div id="books" class="pad-section">
  <div class="container">
    <h1 class="text-center2">E-Books</h1>

    <?php if( $books ): ?>
        <?php $count = 0;  ?>
        <?php foreach( $books as $book ): ?>

            <div class="col-lg-3 col-sm-4" style="padding:20px 30px 0px 30px">
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
                            <button data-toggle="modal" data-target="#ebook_download<?= $book->id; ?>" class="btn btn-danger btn-trans" style="margin-top: 20px;"><span class="glyphicon glyphicon-save"></span> Download</button>
                        </div>
                    </div>
                </a>
            </div>
             <?php $count = $count + 1; ?>

            <?php if ( $count == '4' ) : ?>
                <div class="line"> </div>
            <?php endif; ?>

           
        <?php endforeach; ?>
    <?php endif; ?>



<div class="line"> </div>


  </div>

  <a href="#" class="btn-trans-red center-block">Show More..</a>
</div>
<!-- /SECOND SECTION -->

<!-- THIRD SECTION -->
<div id="statistics" class="pad-section">
  <div class="container">
    
  </div>
</div>
<!-- /THIRD SECTION -->


</div>

<!-- Download ebook Modal -->
<?php if( $books ): ?>
    <?php foreach( $books as $book ): ?>
        <div class="modal fade" id="ebook_download<?= $book->id ?>" role="dialog">
            <div class="modal-dialog">
            
                <div class="modal-content">
                    <div class="modal-body">
                       <form action="<?=base_url('ebook/download')?>" method="post" role="form">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="book_id" name="book_id" value="<?= $book->id ?>">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
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
    <?php endforeach; ?>
<?php endif; ?>
<!-- End of download ebook modal -->

<!-- Sticky Footer-->
<?= $this->load->view('bottombar', '', TRUE) ?>