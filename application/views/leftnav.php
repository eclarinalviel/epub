<ul class="nav nav-sidebar">
    <?php if (user('role') == 1): ?>
        <li class="active"><a href="<?= base_url('admin/dashboard') ?>"><i class="glyphicon glyphicon-dashboard"></i>Dashboard
                <i class="glyphicon glyphicon-triangle-right pull-right" style="line-height: 1.5em"></i><i class="sr-only">(current)</i></a></li>
        <li><a href="<?= base_url('admin/users') ?>"><i class="glyphicon glyphicon-user"></i>Manage Users
                <i class="glyphicon glyphicon-triangle-right pull-right" style="line-height: 1.5em"></i></a></li>
        <li><a href="<?= base_url('admin/epubs') ?>"><i class="glyphicon glyphicon-book"></i>Manage Epubs
                <i class="glyphicon glyphicon-triangle-right pull-right" style="line-height: 1.5em"></i></a></li>
        <li><a href="<?= base_url('admin/schools') ?>"><i class="glyphicon glyphicon-home"></i>Schools
                <i class="glyphicon glyphicon-triangle-right pull-right" style="line-height: 1.5em"></i></a></li>

    <?php elseif (user('role') == 2): ?>
        <li class="active"><a href="<?= base_url('dashboard') ?>"><i class="fa fa-2x fa-dashboard pad-right10"></i>Dashboard <i
                    class="sr-only">(current)</i></a></li>
        <li><a href="<?= base_url('courses') ?>"><i class="fa fa-2x fa-flask pad-right10"></i>Courses</a></li>
        <li><a href="<?= base_url('sections') ?>"><i class="fa fa-2x fa-columns pad-right10"></i>Sections</a></li>
        <li><a href="<?= base_url('posts') ?>"><i class="fa fa-2x fa-pencil-square-o pad-right10"></i>Posts</a></li>
        <li><a href="<?= base_url('resources') ?>"><i class="fa fa-2x fa-archive pad-right10"></i>Resources</a></li>
        <li><a href="<?= base_url('reading_selections') ?>"><i class="fa fa-2x fa-book pad-right10"></i>Reading Selections</a></li>
        <li><a href="<?= base_url('virtual_dialog') ?>"><i class="fa fa-2x fa-microphone pad-right10"></i>Virtual Dialog</a></li>

    <?php elseif (user('role') == 4): ?>
        <li class="active"><a href="<?= base_url('school_admin/dashboard') ?>"><i class="glyphicon glyphicon-dashboard"></i>Dashboard <i class="sr-only">(current)</i></a></li>
        <li><a href="<?= base_url('school_admin/users') ?>"><i class="glyphicon glyphicon-user"></i>Users</a></li>
        <li><a href="<?= base_url('school_admin/epubs') ?>"><i class="glyphicon glyphicon-book"></i>Books</a></li>
        <li><a href="<?= base_url('school_admin/code') ?>"><i class="glyphicon glyphicon-barcode"></i>Code</a></li>

    <?php else: ?>
        <li class="active"><a href="<?= base_url('dashboard') ?>"><i class="fa fa-2x fa-dashboard pad-right10"></i>Dashboard <i
                    class="sr-only">(current)</i></a></li>
        <li><a href="<?= base_url('courses') ?>"><i class="fa fa-2x fa-flask pad-right10"></i>Courses</a></li>
        <li><a href="<?= base_url('scores') ?>"><i class="fa fa-2x fa-trophy pad-right10"></i>Scores</a></li>
        <li><a href="<?= base_url('reading_selections') ?>"><i class="fa fa-2x fa-book pad-right10"></i>Reading Selections</a></li>
        <li><a href="<?= base_url('virtual_dialog') ?>"><i class="fa fa-2x fa-microphone pad-right10"></i>Virtual Dialog</a></li>

    <?php endif; ?>
</ul>