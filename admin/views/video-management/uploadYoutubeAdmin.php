<nav aria-label="breadcrumb">
     <ol class="breadcrumb">
       <li class="breadcrumb-item active" aria-current="page">Youtube Video Management</li>
     </ol>
</nav>

<div class="row">
  <div class="col-lg-12 col-xs-12">
    <div class="card card-primary card-outline">
      <div class="card-header">
      Youtube Videos List

        <button class="btn btn-link" style="float:right;"
                data-toggle="modal" data-target="#add-youtube-video-modal">
                <i class="fa fa-plus-circle"></i> Add Youtube Video
        </button>
      </div>
      <div class="card-body table-responsive">

        <?php
        $sql_query1 =  mysqli_query($dbc,"SELECT * FROM videos WHERE youtube_vid  ='youtube' ORDER BY id DESC ");

        $number = 1;
        if($total_rows1 = mysqli_num_rows($sql_query1) > 0)
        {?>

          <table class="table table-striped table-hover" id="staff-users-table">
         <thead>
           <tr>
             <td>#</td>
             <td>Video Name</td>
             <td>Channel Name</td>
             <td>Owner</td>
          
             <td>Play Video</td>
              <td>Delete</td>

          <!--   <td>Status</td> -->
           </tr>
         </thead>
         <?php
         $no = 1;
          $sql = mysqli_query($dbc,"SELECT * FROM videos WHERE youtube_vid  ='youtube' ORDER BY id DESC ");
          while($row = mysqli_fetch_array($sql)){
          ?>
         <tr style="cursor: pointer;">
           <td width="50px"> <?php echo $no++;?>.

           </td>

           <td><?php echo $row['textname'] ;?></td>
           <td><?php echo $row['title'] ;?></td>
           <td>
             <?php

                  $result = mysqli_query($dbc, "SELECT * FROM users WHERE email  ='".$row['email']."' ORDER BY id DESC"  );
                  if(mysqli_num_rows($result))
                  {
                    while($project= mysqli_fetch_array($result))
                    {

                       echo $project['name'];

                    }
                  }
                  ?>
                </td>

     

                <td>    <a href="https://www.youtube.com/watch?v=<?php echo $row['videoname'];?>" target="_blank">

               <?php echo $row['textname'];?>

                </a>
              </td>
              <td>
              <a href="#" class="btn btn-link" onclick="Closevideo('<?php echo $row['id'];?>');">
                Delete
              </a>
            </td>

         </tr>
         <?php
            }
          ?>

          <tfoot style="background:silver;">
                  <tr>
                      <th></th>
                      <th></th>
                      <th></th>
                          <th></th>
                      <th></th>
                      <th></th>
                      <th></th>


                  </tr>
              </tfoot>
       </table>
      </div>
    </div>
  </div>
</div>

<?php
}
else
{
      ?>
    <br/>
<div class="alert alert-info">
<strong><i class="fa fa-info-circle"></i> No Youtube videos</strong>
</div>

  <?php
}
?>

<?php
//fetch last reference number from database and auto increment it
$reference_row = mysqli_fetch_array(mysqli_query($dbc,"SELECT MAX(id) AS ref_no FROM videos "));
//auto increment the fetched record
$reference_row = $reference_row['ref_no'];
//add programm name prefix, plus the auto incremented value
$reference_row = $reference_row+1;
?>

<!-- add stock modal -->

<div class="modal fade" id="add-youtube-video-modal">
<div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
  <div class="modal-content">
    <div class="modal-header">

      <h5 class="modal-title">Add New Youtube Video</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">

        <form id="add-youtube-form" class="mt-4" enctype="multipart/form-data">

        <input type="hidden" name="add-youtube-list" value="add-youtube-list">

        <input type="hidden" name="email" value="<?php echo $_SESSION['email'];?>">

            <input type="hidden" name="token" value="<?php echo uniqid();?>">


        <div class="row border-bottom mx-3">


            <div class="col-lg-4 col-xs-12 form-group">
                <label for="textname"><span class="required">*</span>Video Name</label>

                  <textarea name="textname" class="form-control" required></textarea>

            </div>
            <div class="col-lg-4 col-xs-12 form-group">
                <label for="video_description"><span class="required">*</span>Video Description</label>

                  <textarea name="video_description" class="form-control" required></textarea>
            </div>

            <div class="col-lg-4 col-xs-12 form-group">
                <label><span class="required">*</span>Channel Name</label>
                <?php
                $result = mysqli_query($dbc, "SELECT * FROM main_categories WHERE id !='1'  ORDER BY category_name ASC");
                echo '
                <select name="title" data-tags="true" class="select2 form-control" data-placeholder="Select channel" required>
                <option></option>';
                while($row = mysqli_fetch_array($result)) {
                    echo '<option value="'.$row['category_name'].'">'.$row['category_name']."</option>";
                }
                echo '</select>';
                ?>
            </div>




        </div>

        <div class="row border-bottom mx-3">

            <div class="col-lg-8 col-xs-12 form-group">
                <label for="textname"><span class="required">*</span>Youtube Link (Use youtube URL)</label>
                  <input type="url" placeholder="https://www.youtube.com/watch?v=5Z5AUS1sL4Q" pattern="http://www\.youtube\.com\/(.+)|https://www\.youtube\.com\/(.+)" name="videoname" class="form-control" required/>

            </div>
            <?php

          //  $reference_row2 = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM videos DESC limit 1"));

            $single_product = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM videos ORDER BY id DESC LIMIT 1"));

            ?>
                                    <div class="col-lg-4 col-xs-12">
                                        <label>Click Thumbnail (Thumbnail size should be 200px by 300 px)</label>
                                        <div class="col-lg-4 col-xs-12 form-group" style="position: relative;" >
                                        <span class="img-div">

                                                <img src="https://churchill.potentialsoftwares.com/assets/favicon/apple-touch-icon.png" width="100" height="100"class="img-circle" alt="Clear here to Upload Your Image" onClick="triggerClick()" id="profileDisplay">
                                              </span>
                                              <input type="file" name="thumbnail" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">

                                        </div>

                                    </div>




          </div>
        <!-- start row project timelines -->


              <div class="row border-bottom mx-2">


                  <div class="pull-left mt-4">
                    <small class="text-muted">Recorded by:- <?php echo $_SESSION['name'];?></small>
                  </div>
                    </div>


        <!-- end row project timelines -->





              <!-- start row button -->
        <div class="row">
          <div class="col-md-12 text-center">
              <button type="submit" class="btn btn-primary btn-block font-weight-bold submitting">UPLOAD</button>
          </div>
        </div>

              <!-- end row button -->
      </form>
    </div>

    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
  </div>
  </div>
  </div>


<script>
function triggerClick(e) {
  document.querySelector('#profileImage').click();
}
function displayImage(e) {
  if (e.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e){
      document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
    }
    reader.readAsDataURL(e.files[0]);
  }
}
</script>
<!-- end of add project modal -->