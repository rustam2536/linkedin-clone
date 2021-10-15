

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
                      contentManage
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>


        <div class="container-fluid">
          <div class="row">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">Content Management<a class="btn btn-sm text-white btn-success pull-right" href="addContent">Add-Content</a></h3><p></p>
                  <div class="table-responsive">
                    <table
                      id="zero_config"
                      class="table table-striped table-bordered"
                      border="1"
                    >
                    <?php 
                      if($this->session->flashdata('error') !='')
                      {
                        ?>
                        <div class="bg-danger ">
                           <?php echo $this->session->flashdata('error'); ?>
                        </div>
                        <?php
                      }
                      if($this->session->flashdata('success') !='')
                      {
                        ?>
                        <div class="bg-success w-40 p-3 text-white">
                           <?php echo $this->session->flashdata('success'); ?>
                        </div>
                        <?php
                      }
                      ?>
                      <thead>
                      
                      <tr>
                        <th>id</th>
                        <th>navbar</th>
                        <th>section</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>description</th>
                        <th >Operations</th>
                        <th>status</th>
                      </tr>
                      </thead>
                    <tbody>
                      <?php 
                        foreach($getData as $rt)
                        {
                        ?>
                          <tr id="tr_<?php echo $rt->id; ?>">
                            <td><?php echo $rt->id; ?></td>
                            <td><?php echo $rt->navbar; ?></td>
                            <td><?php echo $rt->section; ?></td>
                            <td align="center"><?php echo $rt->title; ?></td>
                            
                            <td><img style="width:160px; height: 90px;" src="<?php echo base_url(); ?>public/uploads/<?php echo $rt->image; ?>"></td>
                            <td align="center"><?php echo $rt->description; ?></td>
                            <td>
                              <a title="edit" href="edit-content/<?php echo $rt->id; ?>"><i class="fa fa-edit fa-2x" aria-hidden="true"></i></a>
                              <a title="delete" class="text-danger" onclick="deleteData(<?php echo $rt->id; ?>)" style="float:right; cursor:pointer;"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a>
                            </td>
                            <td id="st<?php echo $rt->id; ?>">
                              <?php $h = $rt->status;
                              if($h==1){
                                ?>
                                <a class="btn btn-sm btn-success" onclick="statusContent(<?php echo $rt->id; ?>,1)">Active</a>
                                <?php
                              }
                              else{
                                ?>
                                <a class="btn btn-sm btn-danger" onclick="statusContent(<?php echo $rt->id; ?>,0)">Deactive</a>
                                <?php
                              }
                              ?>
                            </td>
                          </tr>
                          <?php
                          }
                          ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

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
function deleteData(Id)
  {
    if (confirm('Are you sure you want to delete this?')) {
     
      $.ajax({
        url: '<?php echo base_url(); ?>pages/deleteContent',
        type: 'POST',
        data: {rowId:Id},
        error: function() {
          alert('Error');
        },
        success: function(data) {
          $('#tr_' + Id).remove();   
        }
      });
    }
  }

   function statusContent(id,mode)
   {
    $.ajax({
      url: '<?php echo base_url(); ?>pages/statusCon',
      type: 'POST',
      data: {rId:id,md:mode},
      error: function() {
        alert('Error');
      },
      success: function(result) {
        console.log(result);
        $('#st'+id).html(result);
      }
    });
  }

  
</script>
    <?php $this->load->view('slider/holder/js'); ?>
  </body>
</html>



