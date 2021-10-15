<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
  
    <?php $this->load->view('slider/holder/css'); ?>
    
  </head>

  <body>
    <div id="main-wrapper" data-layout="vertical"
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

        <div class="container-fluid">
       
          <h1 style="text-align:Center"><?php echo $pageTitle; ?></h1>
       
        </div>
        
        <footer class="footer text-center">
          All Rights Reserved by Matrix-admin. Designed and Developed by
          <a href="https://www.wrappixel.com">Ci Batch One</a>.
        </footer>
          
      </div>
    </div>
    <?php $this->load->view('slider/holder/js'); ?>
  </body>
</html>