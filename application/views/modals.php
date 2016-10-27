

<!-- Add School Modal -->
<div class="modal fade" id="addSchool" role="dialog">
    <div class="modal-dialog">
    
        <div class="modal-content">
            <div class="modal-body">
               <form action="<?=base_url('admin/add_school')?>" method="post" role="form">
                    <div class="form-group">
                        <label for="school_name">School Name</label>
                        <input type="text" class="form-control" id="school_name" name="school_name" required>
                    </div>
                    <div class="form-group">
                        <label for="city_municipality">City/Municipality</label>
                        <input type="text" class="form-control" id="city_municipality" name="city_municipality" required>
                    </div>
                    <div class="form-group">
                        <label for="region">Region</label>
                        <input type="text" class="form-control" id="region" name="region" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="text" class="form-control" id="email" name="email" required>
                    </div>
                    <?php
                        $letters = array_merge(range('a','z'),range('A','Z'));
                        $char = $letters[rand(0,51)] . $letters[rand(0,51)];
                        $random_num = rand(10000,99999)
                    ?>
                    <div class="form-group">
                        <label for="code">Code</label>
                        <input type="text" class="form-control" id="code" name="code" value="<?php echo $char.$random_num; ?>" required>
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
<!-- End of Add School Modals -->


<!-- Add User Modal -->
<div class="modal fade" id="addUser" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
               <form action="<?=base_url('admin/add_user')?>" method="post" role="form">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="firstname">Firstname</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" required>
                    </div>
                    <div class="form-group">
                        <label for="lastname">Lastname</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="grade_level">Grade Level</label>
                        <select name="grade_level" class="form-control" id="grade_level">
                            <?php foreach($grade_levels as $level): //$selected = ""; ?>
                                <?php //if ( $school->id == $user->school_id ) {$selected="selected";} ?>
                                <option value="<?= $level->id ?>"  > <?= $level->level ?> </option>
                            <?php endforeach?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="school">School</label>
                        <select name="school" class="form-control" id="school">
                            <?php foreach($schools as $school): $selected = ""; ?>
                                <?php if ( $school->id == $this->uri->segment(4) ) {$selected="selected";} ?>
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
<!-- End of Add User Modals -->


<!-- Add ePUB Modal -->
<div class="modal fade" id="addePUB" role="dialog">
    <div class="modal-dialog">
    
        <div class="modal-content">
            <div class="modal-body">
                <form enctype="multipart/form-data" action="<?=base_url('admin/add_epub')?>" method="post" role="form">
                    
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="description" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="userfile">Select File</label>
                        <input type="file" name="userfile" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="thumbnail">Thumbnail</label>
                        <input type="file" class="form-control" name="thumbnail">
                    </div>
                    <hr/>
                    <div class="form-group">
                        <label for="epub_password">Set Password</label>
                        <input type="password" name="epub_password" class="form-control">
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

