<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #C3383D; border-bottom: thick solid #E5B457; height: 62px;">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= base_url() ?>">
                <img src="<?= base_url('assets/images/logo/tfi_logo.png') ?>" height="40px" width="auto" alt="EnglishTek" />
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" style="color: #F6F3E0; padding-bottom: 5px; padding-top: 30px;"> 
                      Hello,&nbsp;<strong>Administrator </strong><i class="fa fa-angle-down"></i>
                        
                    </a> 
                    <ul class="dropdown-menu" role="menu" style="padding: 5px; font-size: 14px;">
                        <?php if( user('role') == '4' ):  ?>
                            <li><a href="<?= base_url('account/school_profile') ?>"><i class="fa fa-gear"></i> Edit School Profile</a></li>
                        <?php else: ?>
                            <li><a href="<?= base_url('account') ?>"><i class="fa fa-gear"></i> Manage Account</a></li>
                        <?php endif; ?>
                        <li><a href="<?= base_url('auth/signout') ?>"><i class="fa fa-sign-out"></i> Sign Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>