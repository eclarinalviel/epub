

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
            <h2 class="page-title"><?php if( isset($school_details) && !(is_bool($school_details) === false) ) {echo $school_details->name;} ?> Users</h2>

            <div class="tab-content white-bg">
                
                <div id="students" class="tab-pane fade in active">
                    <div class="form" style="padding-bottom: 10px;">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group btn-group-xs" role="group" aria-label="...">
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addUser">
                                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> User
                                    </button>
                                </div>
                                
                                <a href="<?= base_url('admin/delete_school') . '/' . $school_details->id;?>" class="btn btn-xs btn-danger btn-lowercase" style="float: right;">
                                    <i class="fa fa-times"></i> Delete School</a>
                                
                            </div>
                        </div>
                    </div>


                   <table id="student_table" class="table table-hover" width="100%">
                       <thead>
                            <tr>
                                <th>Email</th>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <?php if($users):?>
                        <tbody>
                        <?php foreach( $users as $user ): ?>
                            <tr>
                                <td><?= $user->email ?></td>
                                <td><a href="<?=base_url('admin/users/'.$user->user_id)?>"><?= $user->firstname?> <?= $user->lastname?></a></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>

                    <?php else: ?>
                        <div class="alert alert-info">No posts found.</div>
                    <?php endif; ?>
                  </table>
                </div>

            </div>

            </div>

        </div>
    </div>
</div>


 <?= $this->load->view('modals', '', TRUE) ?>
 <?= $this->load->view('footer', '', TRUE) ?>