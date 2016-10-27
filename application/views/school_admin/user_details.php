<!-- <h1>School admin users</h1> -->

<!-- Top Navigation -->
<?= $this->load->view('topnav', '', TRUE) ?>

<div class="container-fluid">
    <div class="row">
        <!-- Left Navigation -->
        <div class="col-sm-3 col-md-2 sidebar">
            <?= $this->load->view('leftnav', '', TRUE) ?>
        </div>
        <!-- Main Content -->
        <div class="col-xs-12 col-sm-offset-3 col-md-4 col-md-offset-2 main">
            <h2 class="page-title"><?= $page_title ?></h2>
            
            <div class="panel panel-default">
                <!-- <div class="panel-heading">Course List</div> -->
                    <div class="panel-body" style="padding:10px;">
                <!-- Default panel contents -->
                    <?php if ($users_per_level): ?>
                        <?php $temp = 1; ?>
                        <table class="table table-hover display-courses">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email Address</th>  
                                    <th><i class="fa fa-gears"></i></th>                      
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users_per_level as $user): ?>
                                    <tr>
                                        <td>
                                            <a href="#"> <?= $user->fname ?> <?= $user->lname ?> </a>
                                        </td>
                                        <td>
                                            <a href="#"> <?= $user->email ?></a>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                            <!-- <form action="<?=base_url('school_admin/remove_user')?>" method="post" role="form"> -->
                                            <input type="hidden" class="form-control" value="<?= $user->user_id ?>" name="user_id">
                                                <button type="submit" id="btn-delete-state"  data-toggle="modal" data-target="#deleteUser<?=$temp?>"
                                                        class="btn btn-danger btn-sm" name="btn_user"> <i class="fa fa-remove"></i>
                                                </button>
                                            <!-- </form> -->
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Confirmation Modal for delete user -->
                                    <div class="modal fade" id="deleteUser<?=$temp?>" role="dialog">
                                        <div class="modal-dialog" style="width: 300px;">
                                        
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <b> Are you sure you want to delete this?</b>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="<?=base_url('school_admin/remove_user')?>" method="post" role="form">
                                                        <input type="hidden" value="<?= $user->user_id ?>" name="user_id">
                                                        <input type="hidden" value="<?= $this->uri->segment(3) ?>" name="grade_level_id">
                                                        <button type="submit" class="btn btn-danger" id="delete">Delete</button>
                                                    </form>
                                                    <button type="button" data-dismiss="modal" class="btn">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <?php $temp = $temp + 1; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <div class="alert alert-info">No users found.</div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>