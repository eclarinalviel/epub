<!-- <h1>School Information</h1> -->



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
            <h2 class="page-title"><?= $school_details->name; ?> Profile</h2>

            <div class="tab-content white-bg col-lg-10">
                
                <div id="students" class="tab-pane fade in active">
                   
                   <div class="col-lg-10">
	                   <b> <?= $school_details->name; ?> </b> <br><br>
	                   <span class="glyphicon glyphicon-home" style="padding-right: 10px;"></span>  <?= $school_details->city_municipality; ?> <br>
	                   <span class="glyphicon glyphicon-road" style="padding-right: 10px;"></span>  <?= $school_details->region; ?><br>
	                   <span class="glyphicon glyphicon-envelope" style="padding-right: 10px;"></span>  <?= $school_details->email; ?><br>
	                </div>
                   
                   <div class="col-lg-4">
	                   <div class="panel panel-default" style="margin-top: 20px; background-color: #f2dede;">
						  <div class="panel-body" style="padding: 20px; text-align: center;">
						    <h1 style="font-size:50px; color:#ff414d"> 99 </h1>
						    Registered Users
						  </div>
						</div>
					</div>

					<div class="col-lg-4">
						<div class="panel panel-default" style="margin-top: 20px; background-color: #dff0d8;">
						  <div class="panel-body" style="padding: 20px; text-align: center">
						    <h1 style="font-size:50px; color:#5cb85c"> 156 </h1>
						    Purchased ePUBs
						  </div>
						</div>
					</div>

				</div>

            </div>

        </div>

    </div>
</div>



 <?= $this->load->view('modals', '', TRUE) ?>
 <?= $this->load->view('footer', '', TRUE) ?>