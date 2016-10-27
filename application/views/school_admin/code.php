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
                    <form action="<?=base_url('school_admin/generate_code')?>" method="post" role="form">
                        <select name="grade_level" class="form-control" id="school">
                            <?php foreach($grade_levels as $grade_level):?>
                                <option value="<?= $grade_level->id ?>"> <?= $grade_level->level ?> </option>
                            <?php endforeach?>
                        </select>
                        <?php
                            $letters = array_merge(range('A','Z'),range('A','Z'));
                            $char = $letters[rand(0,51)] . $letters[rand(0,51)]. $letters[rand(0,51)];
                            $random_num = rand(10000,99999);
                        ?>

                        <div class="form-group">
                            <label for="gl_code"> Code: </label>
                            <input type="text" class="form-control" name="gl_code" id="gl_code" value="<?php echo $char.$random_num; ?>" required>
                        </div>

                        <button type="button" class="btn btn-warning" onClick="window.location.reload();"> Refresh </button> 
                        <button type="submit" class="btn btn-danger"> Submit </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>