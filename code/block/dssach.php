<div>
  <?php
 include("home.php");
  ?>
</div>
<div>
  <?php
  include("menu.php");
  ?>
</div>
<?php  
include("config.php");
// $connect = mysqli_connect("localhost", "root", "", "testing");
$sotin1trang=5;
if(isset($_GET['trang'])){
  $trang=$_GET['trang'];
}
else{
 $trang=1;
}

 ?>  
<!DOCTYPE html>  
<html>  
 <head>  
  <title>Webslesson Tutorial | Bootstrap Modal with Dynamic MySQL Data using Ajax & PHP</title>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  <style type="text/css">
  
  </style>
 </head>  
 <body>  
  <br /><br />  
  <div class="container" style="width:100%;" id="abc">  
   
     
   <br />  
   <div class="table-responsive" >
    <div style="float: left ; margin-bottom: 10px">
      
     <button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Add</button> 

     <input style="float: right;width: 300px; margin-left: 800px" class="form-control" id="myInput" type="text" placeholder="Search.."> 

    <!--  <input type="" name="tatca"> name="tatca">Tất cả ds</button> -->
    
    </div>
    <br />
    <div id="employee_table">
     <table class="table table-bordered">
      <tr>
       <th >STT</th>  
       <th >Tên Sách</th>
        <th >loai sach</th>  
       <th >Tác Giả</th>
        <th >Giá</th>  
       <th>Giá Mượn</th>
        <th >Số Lượng</th>  
       <th >SL còn</th>
       <th>Thao Tac</th>
      </tr>
      <tbody id="myTable">
      <?php
      $stt=1;
        $form=($trang-1)*$sotin1trang;
       $query = "SELECT * FROM sach ORDER BY id_sach DESC LIMIT $form,$sotin1trang ";
        $result = mysqli_query($conn, $query);
      
      while($row = mysqli_fetch_array($result))
      {

      ?>
      <tr>
       <td><?php echo $stt ?></td>
       <td><?php echo $row['tensach'] ?></td>
       <td><?php echo $row['id_loaisach'] ?></td>
        <td><?php echo $row['id_tacgia'] ?></td>
         <td><?php echo $row['gia'] ?></td>
          <td><?php echo $row['giamuon'] ?></td>
           <td><?php echo $row['soluong'] ?></td>
            <td><?php echo $row['soluongcon'] ?></td>
       <td><input type="button" name="view" value="view" id="<?php echo $row["id_sach"]; ?>" class="btn btn-info btn-xs view_data" /> <input type="button" name="delete" value="delete" id="<?php echo $row["id_sach"]; ?>" class="btn btn-info btn-xs delete_data"  data-toggle="modal" data-target="#myModal" />
        <!-- <input type="button" name="update" value="update" id="<?php echo $row["id_sach"]; ?>" class="btn btn-info btn-xs view_data'" /> -->
        <input type="button" name="view" value="update" id="<?php echo $row["id_sach"]; ?>" class="btn btn-info btn-xs update_data" />
      
         </td>
      </tr>
      <?php
      $stt++;
      }
      ?>
      </tbody>
     
     </table>
    <div style="float: right;">
      <?php
        $sql="select * from sach";
        $kq=mysqli_query($conn,$sql);
        $tongtin=mysqli_num_rows($kq);
      
        $sotrang=ceil($tongtin/$sotin1trang);
     
        for ($i=1; $i <= $sotrang ; $i++) {       
           echo"<a href='dssach.php?trang=$i' style='background-color:blue ;color:white;margin:5px;padding:2px '>trang $i </a>";
        }
      ?>
    </div>
  
    </div>
   </div>  
  </div>
 </body>  
</html>  

<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog" style="height: 1000px;">
  <div class="modal-content" style="height: 900px;">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">PHP Ajax Insert Data in MySQL By Using Bootstrap Modal</h4>
   </div>
   <div class="modal-body">
    <form method="post" id="insert_form">
     <label>Tên Sách</label>
     <input type="text" name="name" id="name" class="form-control" />
     <br />
     <label>id_loaisach</label>
     <input type="text" name="loaisach" id="loaisach" class="form-control"></intput>
     <br />
     <label>id_tacgia</label>
      <input type="text" name="tacgia" id="tacgia" class="form-control"></input>
        <br>
        <br>
      <label>hinhanh</label>
      <input type="text" name="hinhanh" id="hinhanh" class="form-control"></input>
     <br />
     <label>Mô tả</label>
      <input type="te" name="mota" id="mota" class="form-control"></input>
     <br />
       <label>giá</label>
      <input type="te" name="gia" id="gia" class="form-control"></input>
     <br />
         <label>giá mượn</label>
      <input type="te" name="giamon" id="giamuon" class="form-control"></input>
     <br />
         <label>số lượng</label>
      <input type="te" name="soluong" id="soluong" class="form-control"></input>
     <br />
         <label>số lượng còn </label>
      <input type="te" name="soluongcon" id="soluongcon" class="form-control"></input>
     <br />
     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />

    </form>
   </div>
   <div>
    <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-top: 450px;float: right;margin-right: 20px;">Close</button>
   </div>
  </div>
 </div>
</div>

<!-- SUA -->

<!-- <div id="sua_data_Modal" class="modal fade">
 <div class="modal-dialog" style="height: 1000px;">
  <div class="modal-content" style="height: 900px;">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Sửa dữ liệu</h4>
   </div>
   <div class="modal-body">
    <form method="post" id="insert_form">
     <label>Tên Sách</label>
     <input type="text" name="name" id="name" class="form-control" value="" />
     <br />
     <label>id_loaisach</label>
     <input type="text" name="loaisach" id="loaisach" class="form-control"></intput>
     <br />
     <label>id_tacgia</label>
      <input type="text" name="tacgia" id="tacgia" class="form-control"></input>
        <br>
        <br>
      <label>hinhanh</label>
      <input type="text" name="hinhanh" id="hinhanh" class="form-control"></input>
     <br />
     <label>Mô tả</label>
      <input type="te" name="mota" id="mota" class="form-control"></input>
     <br />
       <label>giá</label>
      <input type="te" name="gia" id="gia" class="form-control"></input>
     <br />
         <label>giá mượn</label>
      <input type="te" name="giamon" id="giamuon" class="form-control"></input>
     <br />
         <label>số lượng</label>
      <input type="te" name="soluong" id="soluong" class="form-control"></input>
     <br />
         <label>số lượng còn </label>
      <input type="te" name="soluongcon" id="soluongcon" class="form-control"></input>
     <br />
     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />

    </form>
   </div>
   <div>
    <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-top: 450px;float: right;margin-right: 20px;">Close</button>
   </div>
  </div>
 </div>
</div> -->

<div id="dataModal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Employee Details</h4>
   </div>
   <div class="modal-body" id="employee_detail">
    
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>


<div id="dataModal_sua" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Employee Details</h4>
   </div>
   <div class="modal-body" id="employee_detail_sua">
    
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div> 

<!-- hahah -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          Modal body..
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="lod()">Close</button>
         <!--   <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
        </div>
        
      </div>
    </div>
  </div>
  <!-- haha -->

<script>  
$(document).ready(function(){
    $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
 // $("#tatca").click(function(){
 //   <?php 
 //   $query="SELECT * FROM tbl_employee ORDER BY id DESC";
 //   ?>
 // });
 $('#insert_form').on("submit", function(event){  
  event.preventDefault();  
  if($('#name').val() == "")  
  {  
   alert("Name is required");  
  }  
  else if($('#address').val() == '')  
  {

   alert("Address is required");  
  }  
  else if($('#designation').val() == '')
  {  
   alert("Designation is required");  
  }
   
  else  
  {  
   $.ajax({  
    url:"insert_sach.php",  
    method:"POST",  
    data:$('#insert_form').serialize(),  
    // beforeSend:function(){  
    //  $('#insert').val("Inserting");  
    // },  
    success:function(data){  
    // $('#insert_form')[0].reset();  
     $('#add_data_Modal').modal('hide');  
     $('#employee_table').html(data); 
     //$('#abc').load("dssach.php") ;
     location.reload();
    }  
   });  
  }  
 });

 $(document).on('click', '.view_data', function(){
  //$('#dataModal').modal();
  var employee_id = $(this).attr("id");
  $.ajax({
   url:"select_sach.php",
   method:"POST",
   data:{employee_id:employee_id},
   success:function(data){
    $('#employee_detail').html(data);
    $('#dataModal').modal('show');
   }
  });
 });


  $(document).on('click', '.update_data', function(){
  //$('#dataModal').modal();
  var employee_id = $(this).attr("id");
  $.ajax({
   url:"update_data.php",
   method:"POST",
   data:{employee_id:employee_id},
   success:function(data){
    $('#employee_detail_sua').html(data);
    $('#dataModal_sua').modal('show');
   }
  });
 });




  $(document).on('click', '.delete_data', function(){
  //$('#dataModal').modal();
  var employee_id = $(this).attr("id");
  $.ajax({
   url:"delete_data.php",
   method:"POST",
   data:{employee_id:employee_id},
   success:function(data){
    //$('#employee_detail').html(data);
    // $('#dataModal').modal('show');
    location.reload();
   }
  });
 });

 
});  
 </script>
