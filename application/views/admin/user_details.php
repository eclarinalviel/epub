<!-- Top Navigation -->
<?= $this->load->view('topnav', '', TRUE) ?>

<div class="container-fluid">
    <div class="row">
        <!-- Left Navigation -->
        <div class="col-sm-3 col-md-2 sidebar">
            <?= $this->load->view('leftnav', '', TRUE) ?>
        </div>   
        
        <!-- Main Content -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <div class="row">
           
                <?php foreach ($user_details as $row): ?>
                <div class="col-md-12">
                    <h2 class="page-title">
                        <?= $row->fname ?> <?= $row->lname ?>
                    </h2>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="active"><a href="#info" data-toggle="tab">Information</a></li>
                        <li><a href="#change" data-toggle="tab">Change Password</a></li>
                        <li><a href="#update" data-toggle="tab">Update Info</a></li>
                        
                        
                    </ul>
                    <div class="tab-content white-bg">
                        <div id="info" class="tab-pane fade in active">
                            <div>
                                <div>
                                    <div class="row">

                                        <div class="media">
                                            <div class="media-left media-top">
                                                <a href="#">

                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h5>
                                                    <?php if($row->roles_id == 3):?>
                                                        <?=$row->role_name?> from <b><?= $row->school_name ?></b><br><br>
                                                   
                                                    <?php else:?>
                                                        <?=$row->role_name?> from <b><?= $row->school_name ?></b><br><br>
                                                    <?php endif?>

                                                </h5>
                                                
                                                <a href="" class="btn btn-xs btn-danger btn-lowercase" data-backdrop="static" data-toggle="modal" data-target="#confirm">
                                                    <i class="fa fa-times"></i> Delete User</a>
                                                
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="confirm" role="dialog">
                                                      <div class="modal-dialog">

                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                          <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <label for="filename" class="control-label alert alert-danger"><strong>Delete User permanently?</strong> This will include all user records!!!</label>
                                                                        </div>
                                                                    </div>
                                                          </div>
                                                          <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <a href="<?= base_url('admin/delete_user') . '/' . $row->user_id ?>" class="btn btn-danger">
                                                            Delete</a>
                                                          </div>
                                                        </div>

                                                      </div>
                                                    </div> 
                                
                            
                                                <hr/>
                                                

                                            </div>
                                        </div>
                                        <?php if($row->roles_id == 2):?>
                                        <?php if($course):?>

                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Course Access</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="form">
                                                        <div class="row">
                                                            <div class="col-md-6">

                                                                <div class="btn-group btn-group-xs" role="group" aria-label="...">
                                                                    <a class="btn btn-default" role="button" data-toggle="collapse" href="#addCourse" aria-expanded="false" aria-controls="collapseExample">
                                                                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Course Access
                                                                    </a>
                                                                </div>
                                                                <div class="collapse" id="addCourse">
                                                                        <div class="well">
                                                                            <form action="<?= base_url('admin/add_course')?>" method="post" role="form">
                                                                            <input type="hidden" name="user_id" value="<?=$row->user_id?>">
                                                                                <input type="hidden" name="school_id" value="<?=$row->school_id?>">
                                                                                <div class="form-group">
                                                                                    <label for="course">Course</label>
                                                                                    <select class="form-control" name="course">
                                                                                        <?php foreach($courses as $course_row):?>
                                                                                        <option value="<?=$course_row->id?>"><?=$course_row->name?></option>
                                                                                        <?php endforeach;?>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="first_name">Section</label>
                                                                                    <select class="form-control" name="section">

                                                                                        <?php foreach($sections as $section_row):?>
                                                                                            <option value="<?=$section_row->id?>"><?=$section_row->section_name?>  - [<?=$section_row->grade_level?> | <?=$section_row->school_name?>]</option>
                                                                                        <?php endforeach;?>
                                                                                    </select>
                                                                                </div>


                                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                                            </form>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <table class="table table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th>Course Level</th>
                                                            <th>Section</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php foreach($course as $course_row):?>
                                                        <tr>
                                                            <td><?=$course_row->course_name?></td>
                                                            <td><?=$course_row->section_name?>
                                                            <div class="btn-group pull-right">
                                                                <form action="<?=base_url('admin/delete_access')?>" method="post" role="form">
                                                                <input type="hidden" value="<?=$course_row->ca_id?>" name="access_id">
                                                                <input type="hidden" name="user_id" value="<?=$row->user_id?>">
                                                                <button type="submit" id="btn-delete-state"
                                                                        class="btn btn-danger btn-xs"
                                                                        data-loading-text="Saving Changes" tabindex="4" title="Delete Access"> X 
                                                                </button>
                                                                </form>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach;?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <?php else:?>
                                                <div class="alert alert-info">No Course Access.
                                                    <div class="btn-group btn-group-xs" role="group" aria-label="...">
                                                        <a class="btn btn-default" role="button" data-toggle="collapse" href="#addCourse2" aria-expanded="false" aria-controls="collapseExample">
                                                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Course Access
                                                        </a>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="collapse" id="addCourse2">

                                                                    <form action="<?= base_url('admin/add_course')?>" method="post" role="form">
                                                                        <input type="hidden" name="user_id" value="<?=$row->user_id?>">
                                                                        <input type="hidden" name="school_id" value="<?=$row->school_id?>">
                                                                        <div class="form-group">
                                                                            <label for="course">Course</label>
                                                                            <select class="form-control" name="course">
                                                                                <?php foreach($courses as $course_row):?>
                                                                                    <option value="<?=$course_row->id?>"><?=$course_row->name?></option>
                                                                                <?php endforeach;?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="first_name">Section</label>
                                                                            <select class="form-control" name="section">

                                                                                <?php foreach($sections as $section_row):?>
                                                                                    <option value="<?=$section_row->id?>"><?=$section_row->section_name?>  - [<?=$section_row->grade_level?> | <?=$section_row->school_name?>]</option>
                                                                                <?php endforeach;?>
                                                                            </select>
                                                                        </div>


                                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                                    </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif;?>
                                            <?php endif;?>




                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="change" class="tab-pane fade in">
                            <div class="row">
                                <div class="col-md-12">
                                        
                                    <form action="<?=base_url('admin/change_pass')?>" method="post" role="form">
                                        <div class="col-sm-3 col-md-4" style="padding-bottom: 20px;">
                                            <input type="hidden" value="<?=$row->user_id?>" name="user_id">
                                            <label for="password" class="alert alert-danger">Password Update (Update only if requested by user!)</label>
                                            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                                            </br>
                                            <button type="submit" id="btn-change-state"
                                                    class="btn btn-primary btn-xs"
                                                    data-loading-text="Saving Changes">Change Password
                                            </button>
                                        </div>
                                     </form>

                                </div>
                            </div>

                        </div>
                        <div id="update" class="tab-pane fade in">
                            <div class="row">
                                <div class="col-md-12">

                                        <?php if($row->roles_id == 3):?>
                                        <div class="up-top">
                                            <?php echo form_open('admin/update_student'); ?>
                                            <input type="hidden" value="<?=$row->user_id?>" name="user_id">
                                            <div class="row">
                                                <?php echo (form_error('first_name')) ? '<div class = "col-md-6 form-group has-error has-feedback">' : '<div class = "col-md-6 form-group">'; ?>
                                                <label class="control-label">First Name</label>
                                                <input type="text" class="form-control" name="first_name"
                                                       value="<?= $row->fname ?>" placeholder="First Name"/>
                                                <?= '</div>' ?>
                                            </div>
                                            <div class="row">
                                                <?php echo (form_error('last_name')) ? '<div class = "col-md-6 form-group has-error has-feedback">' : '<div class = "col-md-6 form-group">'; ?>
                                                <label class="control-label">Last Name</label>
                                                <input type="text" class="form-control" name="last_name"
                                                       value="<?= $row->lname ?>" placeholder="Last Name"/>
                                                <?= '</div>' ?>
                                            </div>
                                            <div class="row">
                                                <?php echo (form_error('email')) ? '<div class = "col-md-6 form-group has-error has-feedback">' : '<div class = "col-md-6 form-group">'; ?>
                                                <label class="control-label">Email</label>
                                                <input type="email" class="form-control" name="email"
                                                       value="<?= $row->email ?>" placeholder="example@email.com"/>
                                                <?= '</div>' ?>
                                            </div>
                                            <div class="row">
                                                <div class = "col-md-6 form-group">
                                                    <button type="submit" id="btn-change-state"
                                                            class="btn btn-primary btn-md"
                                                            data-loading-text="Saving Changes" tabindex="4">Save Changes
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <?php else:?>
                                        <div class="up-top">
                                            <?php echo form_open('admin/update_teacher'); ?>
                                            <input type="hidden" value="<?=$row->user_id?>" name="user_id">
                                            <div class="row">
                                                <?php echo (form_error('first_name')) ? '<div class = "col-md-6 form-group has-error has-feedback">' : '<div class = "col-md-6 form-group">'; ?>
                                                <label class="control-label">First Name</label>
                                                <input type="text" class="form-control" name="first_name"
                                                       value="<?= $row->fname ?>" placeholder="First Name"/>
                                                <?= '</div>' ?>
                                            </div>
                                            <div class="row">
                                                <?php echo (form_error('last_name')) ? '<div class = "col-md-6 form-group has-error has-feedback">' : '<div class = "col-md-6 form-group">'; ?>
                                                <label class="control-label">Last Name</label>
                                                <input type="text" class="form-control" name="last_name"
                                                       value="<?= $row->lname ?>" placeholder="Last Name"/>
                                                <?= '</div>' ?>
                                            </div>
                                            <div class="row">
                                                <?php echo (form_error('email')) ? '<div class = "col-md-6 form-group has-error has-feedback">' : '<div class = "col-md-6 form-group">'; ?>
                                                <label class="control-label">Email</label>
                                                <input type="email" class="form-control" name="email"
                                                       value="<?= $row->email ?>" placeholder="example@email.com"/>
                                                <?= '</div>' ?>
                                            </div>
                                            <div class="row">
                                                <div class = "col-md-6 form-group">
                                                    <button type="submit" id="btn-change-state"
                                                            class="btn btn-primary btn-md"
                                                            data-loading-text="Saving Changes" tabindex="4">Save Changes
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif;?>


                                </div>
                            </div>
                            
                             
                            
                        </div>
                        
                    </div>
                    <div class="tab-footer">

                    </div>
                    <?php echo form_close(); ?>
                    <?php endforeach; ?>
                
                </div>
            </div>
        </div>
    </div>
</div>
