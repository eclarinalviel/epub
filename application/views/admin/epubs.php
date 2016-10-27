

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

            <div class="tab-content white-bg">

                <?php if ($this->session->flashdata('success') == TRUE): ?>
                    <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
                <?php endif; ?>
                
                <div id="ePUB" class="tab-pane fade in active">
                    <div class="form" style="padding-bottom: 10px;">
                        <div class="row">
                            <div class="col-md-6">
                        <div class="btn-group btn-group-xs" role="group" aria-label="..." style="display: inline;">
                            <a class="btn btn-default" role="button" data-toggle="modal" href="#addePUB" aria-expanded="false" aria-controls="collapseExample">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> eBook</a>
<!-- 
                                <form action="<?=base_url('admin/search_epub')?>" method="post" role="form">
                                    <input type="search" name="keyword" placeholder="Search" style="float: right;" class="form-control">
                                </form> -->
                        </div>
                    </div>
                </div>
            </div>



           <table id="student_table" class="table table-hover" width="100%">
               <thead>
                    <tr>
                         <th>Title</th>
                        <th>Description</th>
                        <th><i class="fa fa-gears"></i></th>
                    </tr>
                </thead>
                <?php if($epubs): ?>
                    <?php $temp = 1; ?> 
                <tbody>
                <?php foreach($epubs as $epub): ?>
                    <tr>
                        <td><a href="#"><?= $epub->title ?></a></td>
                        <td><?= $epub->description ?></td>
                        <td>
                            <div class="btn-group">

                            	<form action="<?=base_url('admin/epub_delete')?>" method="post" role="form">
	                                <input type="hidden" value="<?= $epub->id ?>" name="epub_id">

                                    <a target="_blank" href="<?= base_url('assets/documents/'.$epub->file_path) ?>" class = "btn btn-primary btn-sm" role = "button">
                                            <i class="fa fa-eye"></i> </a>

	                                <button type="button" id="btn-edit-state"
	                                        class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editePUB<?=$temp?>"
	                                        data-loading-text="Saving Changes" tabindex="4" title="Edit ePUB"> <i class="fa fa-pencil"></i>
	                                </button>

	                                <button type="submit" id="btn-delete-state"
	                                        class="btn btn-danger btn-sm" name="btn_epub" value="delete"
	                                        data-loading-text="Saving Changes" tabindex="4" title="Delete ePUB"> <i class="fa fa-remove"></i>
	                                </button>
                                </form>

                            </div>
                        </td>                   
                    </tr>


                    <!-- Add ePUB Modal -->
                    <div class="modal fade" id="editePUB<?=$temp;?>" role="dialog">
                        <div class="modal-dialog">
                        
                            <div class="modal-content">
                                <div class="modal-body">
                                    <form enctype="multipart/form-data" action="<?=base_url('admin/update_epub')?>" method="post" role="form">
                                    <input type="hidden" class="form-control" name="epub_id" value="<?=$epub->id?>">
                                        
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" name="title" class="form-control" value="<?=$epub->title?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <input type="text" name="description" class="form-control" value="<?=$epub->description?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="userfile">Select File</label>
                                            <input type="file" name="userfile" class="form-control" value="<?= base_url('assets/documents/'.$epub->file_path) ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="thumbnail">Thumbnail</label>
                                            <input type="file" class="form-control" name="thumbnail" value="<?=$epub->thumbnail?>">
                                        </div>
                                        <hr/>
                                        <div class="form-group">
                                            <label for="epub_password">Set Password</label>
                                            <input type="password" name="epub_password" class="form-control" required>
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
                        
                    <!-- End of Add ePUB Modals -->
                     <?php $temp = $temp + 1; ?>

                    <?php endforeach; ?>
                </tbody>
                <?php endif; ?>
            </table>


                </div>

            </div>

        </div>

    </div>
</div>
</div>

 <?= $this->load->view('modals', '', TRUE) ?>

<!-- Loading JS Libraries -->
<script type="text/javascript" src="<?= base_url('assets/js/jquery-3.1.0.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/pace.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/wow.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/datatables/js/jquery.dataTables.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/datatables/js/dataTables.tableTools.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/datatables/js/dataTables.bootstrap.js'); ?>"></script>

<script type="text/javascript" src="<?= base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>


<script type="text/javascript">

//sidebar highlight
        var str = location.href.toLowerCase();
        $(".nav-sidebar li a").each(function () {
            if (str.indexOf(this.href.toLowerCase()) > -1) {
                $(".nav-sidebar li.active").removeClass("active");
                $(this).parent().addClass("active");
            }
        });
        $(".nav-sidebar li.active").parents().each(function () {
            if ($(this).is("li")) {
                $(this).addClass("active");
            }
        });
</script>

</body>
</html>