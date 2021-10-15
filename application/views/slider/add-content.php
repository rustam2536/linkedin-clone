

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
      data-boxed-layout="full">
    
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

        <h1 style="text-align:Center"></h1>

        <div class="container-fluid">
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <div class="card">          
                <?php 
                echo form_open_multipart('',array('class' => 'form-horizontal','id' => 'slider_form'));
                ?>
                  <div class="card-body">
                    <h4 class="card-title">Personal Info</h4>  
                    <div class="form-group row">
                      <?php 
                      if($this->session->flashdata('error') !='')
                      {
                        ?>
                        <div class=" bg-danger text-white" >
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                        <?php
                       
                      }
                      ?> 
                    </div>       
                      
                    <div class="form-group row">
                      <label
                        for="fname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Navbar</label>
                      <div class="col-sm-9">
                        <select name="navbar" class="form-control" id="sec1">
                          <option value="home">-select-</option>
                          <option value="home">home</option>
                          <option value="about">about</option>
                          <option value="services">services</option> 
                          <option value="portfolio">portfolio</option> 
                          <option value="team">team</option> 
                        </select>
                      </div>
                    </div> 
                    <div class="form-group row">
                      <label
                        for="fname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Section</label>
                      <div class="col-sm-9">
                        <select name="section" class="form-control" id="sec2">
                          <option value="">-select-</option> 
                        </select>
                      </div>
                    </div> 
                    <div class="form-group row" id="title6">
                      <label
                        for="fname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Name</label>
                      <div class="col-sm-9">
                        <input
                        type="text" value="---" name="title" class="form-control" placeholder="Enter Title"
                        />
                      </div>
                    </div>                 
                    <div class="form-group row">
                      <label
                        for="cono1"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Image</label>
                      <div class="col-sm-9">
                        <input class="form-control" type="file" name="myfile">
                      </div>
                    </div>
                    <div class="form-group row" id="msg6">
                      <label
                        for="cono1"
                        class="col-sm-3 text-end control-label col-form-label"
                        >description </label>
                      <div class="col-sm-9">
                        <input class="form-control" value="---" type="text" name="msg" placeholder="Messege">
                      </div>
                    </div>
                  </div>
                  <div class="border-top">
                    <div class="card-body">
                      <input type="submit" name="submit" value="save" class="btn btn-primary">   
                    </div>
                  </div>             
                <?php echo form_close(); ?>
                
              </div>
            </div>
            <div class="col-md-2"></div>
          </div>
        </div>
        <footer class="footer text-center">
           Designed and Developed by
          <a href="">@Rustam</a>.
        </footer>
          
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
          $("#sec1").change(function() {
            $("#sec2").load("change" + $(this).val());
          });

          $("#sec2").change(function() {
            $k=$(this).val();
            switch($k){
              case 'client':
                $('#msg6').hide();
                break;
              case 'services':
                $('#msg6').show();
                break;
            }
          });
          $("#sec1").change(function() {
            $m=$(this).val();
            switch($m){
              case 'portfolio':
                $('#title6').hide();
                $('#msg6').hide();
                break;
              default:
                $('#title6').show();
                $('#msg6').show();
            }
          });
        });
    </script>
    <?php $this->load->view('slider/holder/js'); ?>
  </body>
</html>



