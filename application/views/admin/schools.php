

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
            <h2 class="page-title">Schools</h2>

            <div class="tab-content white-bg">
                <?php if ($this->session->flashdata('success') == TRUE): ?>
                    <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
                <?php endif; ?>

                <!-- <div id="students" class="tab-pane fade in active"> -->
                    <div class="form" style="padding-bottom: 10px;">
                        <div class="row">
                            <div class="col-md-6">

                                <div class="btn-group btn-group-xs" role="group" aria-label="..." style="display: inline;">
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addSchool">
                                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> School
                                    </button>                  
                                   <!--  <form action="<?=base_url('admin/search_school')?>" method="post" role="form">
                                        <input type="search" name="keyword" placeholder="Search" style="float: right;">
                                    </form> -->
                                </div>
                            </div>
                        </div>
                    </div>


                   <table id="school_table" class="table table-hover" width="100%">
                       <thead>
                            <tr>
                                <th>Name</th>
                                <th>City/Municipality</th>
                                <th>Region</th>
                            </tr>
                        </thead>
                        
                  </table>
                <!-- </div> -->

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
    $(document).ready(function () {
    //data table
        var table = $('#school_table').dataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "type": "POST",
                "url": "<?php echo base_url('admin/school_json'); ?>"
            },
            "columns": [
                {"data": "school_name",
                    "mRender": function (data, type, row) {
                        return '<a href="<?= base_url('admin/schools').'/'?>' + row['school_id'] + '">' + row['school_name'] + '</a>';  
                    }
                },
                {"data": "city_municipality"},
                {"data": "region"}  
            ],
            "lengthMenu": [[10, 25, 50, 75, 100, -1], [10, 25, 50, 75, 100, "All"]],
            "order": [[0, "desc"]],

        });
    });
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