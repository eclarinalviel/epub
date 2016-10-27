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
                    <?php if ($grade_levels): ?>
                        <table class="table table-hover display-courses">
                            <thead>
                                <tr>
                                    <th>Grade Level</th>
                                    <th>Code</th>
                                    <th>No. of Students</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($grade_levels as $level): ?>
                                    <tr>
                                        <td>
                                            <a href="<?= base_url('school_admin/users') . '/' . $level->id  ?>"> <?= $level->level ?> </a>
                                        </td>
                                        <td>
                                        <?php $code = $this->Admin_model->_get_gl_code_per_level( $level->id, user('sc_id') ); ?> 
                                            <a href="#"> <?php if ($code) { echo $code->code; } else { echo "Not Set"; } ?> </a>
                                        </td>
                                        <td>
                                            <a href="<?=  base_url('school_admin/users') . '/' . $level->id ?>">
                                                <span class="label label-primary">
                                                  <!-- student count -->
                                                   <?php if ($level->id == 1): ?>
                                                        <?= ($this->Admin_model->_count_students_per_grade_level($level->id) > 1) ? $this->Admin_model->_count_students_per_grade_level($level->id) . nbs() . 'students' : $this->Admin_model->_count_students_per_grade_level($level->id) . nbs() . 'student' ?>
                                                    <?php else: ?>
                                                        <?= ($this->Admin_model->_count_students_per_grade_level($level->id) > 1) ? ($this->Admin_model->_count_students_per_grade_level($level->id) - 4) . nbs() . 'students' : $this->Admin_model->_count_students_per_grade_level($level->id) . nbs() . 'student' ?>
                                                    <?php endif; ?>   
                                                </span>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <div class="alert alert-info">No courses found.</div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>