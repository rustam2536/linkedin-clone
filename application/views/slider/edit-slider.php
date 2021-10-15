

<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
  <?php $this->load->view('slider/holder/css'); ?>

  </head>

  <body>

    <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin5"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full"
    >
      
      <?php $this->load->view('slider/holder/header'); ?>

      <?php $this->load->view('slider/holder/sidebar'); ?>
      <div class="page-wrapper">
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Dashboard-2</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Library
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>

        <div class="container-fluid">
          <div class="row">

            <div class="col-md-2"></div>

              <div class="col-md-8">
                <div class="card">
                  <?php 
                  if($this->session->flashdata('error') !='')
                  {
                    ?>
                    <div class=" bg-danger text-white" >
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                    <?php
                    
                  }
                  
                echo form_open_multipart('admin/update-slider',array('class' => 'form-horizontal','id' => 'slider_form'));
                ?>
                  <div class="card-body">
                    <h4 class="card-title">Personal Info</h4>
                    <input type="hidden" value="" name="row_id">

                    <div class="form-group row">
                      <label
                        for="fname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Name</label
                      >
                      <div class="col-sm-9">
                      <input type="text" value="" name="title" class="form-control" placeholder="Enter Title" >

                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label
                        for="cono1"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Image</label
                      >
                      <div class="col-sm-9">
                        <input class="form-control" type="file" name="myfile">
                      </div>
                    </div>
                  </div>
                  <div class="border-top">
                    <div class="card-body">
                      <input type="submit" name="submit" value="save" class="btn btn-primary">
                        
                    </div>
                  </div>
                  <img src="<?php echo base_url(); ?>public/uploads/" style="float:right;width:200px">
                  
                <?php echo form_close(); ?>
              </div>
            </div>
              <div class="col-md-2"></div>
            </div>

          </div>
        </div>
        <!-- ============================================================== -->
      
        <footer class="footer text-center">
           Designed and Developed by
          <a href="">@Rustam</a>.
        </footer>
   
      </div>
 
    </div>
    
    <?php $this->load->view('slider/holder/js'); ?>

  </body>
</html>



