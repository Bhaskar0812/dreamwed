<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Dream Wedding Mart | Dashboard</title>

    <link href="<?=BACKEND_ASSESTS_CSS;?>bootstrap.min.css" rel="stylesheet">
    <link href="<?=BACKEND_ASSESTS;?>font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?=BACKEND_ASSESTS_CSS;?>plugins/toastr/toastr.min.css" rel="stylesheet">
    <!-- Gritter -->
    <link href="<?=BACKEND_ASSESTS_JS;?>plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="<?=BACKEND_ASSESTS_CSS;?>plugins/dataTables/datatables.min.css" rel="stylesheet">

    <link href="<?=BACKEND_ASSESTS_CSS;?>animate.css" rel="stylesheet">

    <link href="<?=BACKEND_ASSESTS_CSS;?>style.css" rel="stylesheet">

</head>


<body>
  <div id="wrapper"><!-- closed on footer -->
    <?php $this->load->view('backend_includes/admin_sidebar');?>
      <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
          <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
              <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
              <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                  <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
              </form>
            </div>
            <ul class="nav navbar-top-links navbar-right">
              <li style="padding: 20px">
                <span class="m-r-sm text-muted welcome-message">Welcome to Wedmart</span>
              </li>
              <li>
                <a href="<?php echo base_url().'admin/logout/1'?>">
                  <i class="fa fa-sign-out"></i> Log out
                </a>
              </li>
            </ul>
          </nav>
        </div>
      

   