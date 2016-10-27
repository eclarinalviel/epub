<div class="container-fluid">  
  <!-- navigation panel -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="background-color:#DDE9F5">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-main">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#" style="color: #002D40; font-weight: 600; font-size: 26px;">ePUB</a>
    </div>

    <div class="collapse navbar-collapse" id="navbar-collapse-main">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#home" style="color: #002D40;">Home</a></li>
        <li><a href="#books" style="color: #002D40;">ePUBs</a></li>
        <!-- <li><a href="#statistics">Statistics</a></li> -->
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: #002D40;">My Account <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="<?= base_url('account') ?>">Manage Account</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="<?= base_url('auth/signout') ?>">Sign out</a></li>
            </ul>
          </li>
        <li>
          <input type="text" class="form-control" placeholder="Search for.." style="margin-top: 10px">
        </li>
       
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

    
</div><!-- /.container-fluid -->
