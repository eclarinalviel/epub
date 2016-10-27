

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


                <div id="users" class="tab-pane fade in active">
                    <div class="form" style="padding-bottom: 10px;">
                        <div class="row">
                            <div class="col-md-6">

                                <div class="btn-group btn-group-xs" role="group" aria-label="...">
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addUser"
                                    name="btn_user" value="123">
                                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> User
                                    </button>                  
                                
                                </div>
                            </div>
                        </div>
                    </div>


                   <table id="student_table" class="table table-hover" width="100%">
                       <thead>
                            <tr>
                                 <th>Email</th>
                                <th>Name</th>
                                <th>School</th>
                                <th><i class="fa fa-gears"></i></th>
                            </tr>
                        </thead>
                        <?php if($users): ?>
                            <?php $temp = 1; ?>
                        <tbody>
                        <?php foreach( $users as $user ): ?>
                            <tr>
                                <td><?= $user->email ?></td>
                                <td><a href="<?=base_url('admin/users/'.$user->user_id)?>"><?= $user->firstname ?> <?= $user->lastname ?></a></td>
                                <td><?= $user->school ?></td>
                                <td>
                                    <div class="btn-group">

                                       <!--  <form action="<?=base_url('admin/delete_user')?>" method="post" role="form"> -->
                                            
                                            <button type="button" id="btn-edit-state"
                                                    class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editUser<?=$temp?>"
                                                    data-loading-text="Saving Changes.." tabindex="4" title="Edit User"> <i class="fa fa-pencil"></i>
                                            </button>

                                            <button type="submit" id="btn-delete-state"
                                                    class="btn btn-danger btn-sm" name="btn_user" value="delete" data-toggle="modal" data-target="#deleteUser<?=$temp?>"
                                                    data-loading-text="Saving Changes.." tabindex="4" title="Delete User"> <i class="fa fa-remove"></i>
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
                                            <form action="<?=base_url('admin/delete_user')?>" method="post" role="form">
                                                <input type="hidden" value="<?= $user->user_id ?>" name="user_id">
                                                <button type="submit" class="btn btn-danger" id="delete">Delete</button>
                                            </form>
                                            <button type="button" data-dismiss="modal" class="btn">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- End of Confirmation Modal for delete-->

                            <!-- Edit User Modal -->
                            <div class="modal fade" id="editUser<?=$temp?>" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                           <form action="<?=base_url('admin/update_user')?>" method="post" role="form">
                                           <input type="hidden" class="form-control" name="user_id" value="<?=$user->user_id?>">
                                                <div class="form-group">
                                                    <label for="username">Email Address</label>
                                                    <input type="text" class="form-control" id="username" name="username" value="<?=$user->email?>" required>
                                                </div>
                                                <!-- <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input type="text" class="form-control" id="password" name="password" value="<?=$user->password?>" required>
                                                </div> -->
                                                <div class="form-group">
                                                    <label for="firstname">Firstname</label>
                                                    <input type="text" class="form-control" id="firstname" name="firstname" value="<?=$user->firstname?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="lastname">Lastname</label>
                                                    <input type="text" class="form-control" id="lastname" name="lastname" value="<?=$user->lastname?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email" value="<?=$user->email?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="school">School</label>
                                                    <select name="school" class="form-control" id="school">
                                                        <?php foreach($schools as $school): $selected = ""; ?>
                                                            <?php if ( $school->id == $user->school_id ) {$selected="selected";} ?>
                                                            <option value="<?= $school->id ?>" <?php echo $selected; ?> > <?= $school->name ?> </option>
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
                        <!-- End of Edit User Modals -->

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