<?php
// update query important
/*
UPDATE node SET title='$title',description='$description',`register time`= CURRENT_TIMESTAMP WHERE sr_no=$snoEdit;
*/

//insert query important
/*
INSERT INTO `node` (`sr_no`, `title`, `description`, `register time`) VALUES (NULL, 'seminar topic',
'mobile ip is the one of the helpfull technology for the human bings', current_timestamp());
*/


echo "<br>";
$insert = false;

// help the following imformation made a connection

$servername = "localhost";
$username = "root";
$password = "";     // in locALHOST NOT REQURED TO PASSWORD ,BUT IF WHEN USE TO OTHER SERVER THEN REQURED PASSWORD
$database = "data_storeg";


// make a connection

$conn = mysqli_connect($servername,$username,$password,$database);

if(!$conn)
{
    die("The connection is die plz wait for few minutes  ".mysqli_connect_error());
}


// query start 
  

 // delete query start



          if(isset($_GET["delete"]))
          {
        
            $snodel = $_GET["delete"];
            
            $sql = "DELETE FROM node WHERE sr_no=$snodel; ";
            $result = mysqli_query($conn,$sql);
        
            if($result)
            {
              echo "<div class='alert alert-success alert-dismissible'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Success!</strong> Delete data successfully !.
                    </div>
              ";
        
            }
            else
            {
              echo "<div class='alert alert-danger alert-dismissible'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Success!</strong> Not delete data successfully !.
                    </div>
              ";
            }
        
        
        
          }



          
 
 



 
 // delete query end






  if($_SERVER["REQUEST_METHOD"] == "POST")
  {

       
        // update query start
         if(isset($_POST["snoEdit"]))
         {
            $snoEdit = $_POST["snoEdit"];
            $title = $_POST["titleEdit"];
            $description = $_POST["descriptionEdit"];
            // $time = time();
            // echo "time=".$time;
            // $timing = date("Y-m-d h:i:s",$time);
            // echo "timing=".$timing;

            // update query
            $sql="UPDATE node SET title='$title',description='$description',`register time`= CURRENT_TIMESTAMP WHERE sr_no=$snoEdit;";
            $result = mysqli_query($conn,$sql);


            if($result)
            {
              echo " <div class='alert alert-warning alert-dismissible'>
                     <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                     <strong>Success!</strong> Update the data successfully !.
                     </div>
                   ";
            }
            else
            {
              echo "<strong>Not update successfully !</strong>".mysqli_error($conn);
            }



         }
       // update query end
   



       // insert query start
         else
         {


                $title = $_POST["title"];
                $description = $_POST["description"];
                $sql="INSERT INTO `node` (`sr_no`, `title`, `description`, `register time`) VALUES (NULL, '$title', '$description', current_timestamp());";
                $result = mysqli_query($conn,$sql);
              
                if($result)
                {
                  $insert = true;
                }
                else
                {
                    echo "YOUR IMFORMATION WAS NOT INSERTERD SUCCESSFULLY !";
                }


         }

       // insert query end

  }

  // query end
  

  ?>

 




<!-- HTML -->

<!DOCTYPE html>
<html lang="en">

<head>
  <title>iNote - Project 1</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="//cdn.datatables.net/1.11.2/css/jquery.dataTables.min.css">
  

</head>

<!-- internal CSS -->
<style>

.backchange td:hover
{
  background-color:aqua;

}

</style>



<body>






  <div class="container">

    <!-- Nav Bar start-->



    <nav class="navbar navbar-inverse ">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">PHP DSIU</a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Home</a></li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1
              <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Page 1-1</a></li>
              <li><a href="#">Page 1-2</a></li>
              <li><a href="#">Page 1-3</a></li>
            </ul>
          </li>
          <li><a href="#">Page 2</a></li>
          <li><a href="#">Page 3</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right ">
          <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
          <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
      </div>
    </nav>




    <!-- Nav Bar end -->


   <!-- INSERT QUERY RESULT START -->

    <?php

     
    if(isset($insert))
    {
      
         echo " <div class='alert alert-success alert-dismissible'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Success!</strong> Add imformation successfully !.
                </div>
              ";

    }


    ?>
     
  

   <!-- INSERT QUERY RESULT END -->


   <!-- modal start -->

   <div class="container">
  <!-- Trigger the modal with a button -->
  <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalEdit">Open Modal</button> -->

  <!-- Modal -->
  <div class="modal fade" id="modalEdit" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
             
                  <form action="" method="POST">
                    <!-- serial  number edit steps --><input type="hidden" name="snoEdit" id="snoEdit">                   
                <div class="form-group">
                  <h3 style="color: black;"> Title </h3> <br>
                  <textarea name="titleEdit" id="titleEdit" cols="60" rows="2" ></textarea>
                </div>
                <div class="form-group">
                  <h3 style="color: black;"> Description </h3> <br>
                  <textarea name="descriptionEdit" id="descriptionEdit" cols="60" rows="8" ></textarea>
                </div>

                <button type='submit' class='btn btn-primary'>Update Now</button>
              </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>



   <!-- modal end -->

    <!-- form section start -->



   <marquee  direction="up">  <h2 style="text-align: center; color: black;"> iNote Help To Store Data </h2> </marquee>
    <hr class="bc">
    <form action="" method="POST">

      <div class="form-group">
        <h3 style="color: black;"> Title </h3> <br>
        <textarea name="title" id="title" cols="60" rows="2" class="textbox"></textarea>
      </div>
      <div class="form-group">
        <h3 style="color: black;"> Description </h3> <br>
        <textarea name="description" id="description" cols="60" rows="8" class="textbox"></textarea>
      </div>

      <button type='submit' class='btn btn-primary'>Add Notes</button>
    </form>
  </div>



  <!-- form section end -->

  </div>


  



  <!-- tabel start -->
  <div class="container">
    <h2 style="color: red;">STORE DATA</h2>

    <table class="table table-hover" id="myTable" >
      <thead>
        <tr>
          <th>SR_NO</th>
          <th>TITLE</th>
          <th>DESCRIPTIOON</th>
          <th>REGISTER TIME</th>
          <th>TOOLS</th>
        </tr>
      </thead>
      <tbody class="backchange">
        
          <!-- select query start  -->
          <?php

            $sql = "SELECT * FROM `node`;";
            $result = mysqli_query($conn,$sql);
            $sno = 0;
           while($row = mysqli_fetch_assoc($result))
           {
              $sno = $sno+1;
            echo "<tr>
                  <td>". $sno . "</td>
                  <td>". $row['title'] ."</td>
                  <td>". $row['description'] ."</td>
                  <td>". $row['register time'] ."</td>
                  <td><button type='button' class='edit btn btn-primary'  id=".$row['sr_no'].">Edit</button>  <button type='button' class='delete btn btn-primary'  id= d".$row['sr_no'].">Delete</button> </td>
                  </tr>
                  ";

           }//id=". $row['sr_no'] ."

          ?>
          <!-- select query end -->

        
      </tbody>
    </table>
  </div>

  <!-- tabel end -->




















  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <!-- datatabels of css  -->
  <script src="//cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
 
 <script>

$(document).ready( function () {
    $('#myTable').DataTable();
} );

 </script>



<!-- Edit button javascript start -->
<script>

editbtn = document.getElementsByClassName('edit');
Array.from(editbtn).forEach((element) => {
  // console.log("array and foreach function is run successfully");
  element.addEventListener("click",(e)=>{
        
      tr = e.target.parentNode.parentNode;
      title = tr.getElementsByTagName("td")[1].innerText;
      description = tr.getElementsByTagName("td")[2].innerText;
    

      // console.log("title=",title);
      // console.log("description=",description);

      titleEdit.value = title;
      descriptionEdit.value = description;
      snoEdit.value = e.target.id;
     
      // console.log(e.target.id);
      // // modal join
      $("#modalEdit").modal('toggle');



  })

  
})

</script>

<!-- Edit button javascript end -->



<!-- Delete button javascript start -->
<script>

delbtn = document.getElementsByClassName('delete');
Array.from(delbtn).forEach((element) => {
  // console.log("array and foreach function is run successfully");
  element.addEventListener("click",(e)=>{
        
      // tr = e.target.parentNode.parentNode;
      // title = tr.getElementsByTagName("td")[1].innerText;
      // description = tr.getElementsByTagName("td")[2].innerText;
    

      // console.log("title=",title);
      // console.log("description=",description);
      
      snodel = e.target.id.substr(1,);
     
      // console.log(snodel);

      /*
      if(confirm("Press a button!"))
      {
        console.log("yes");
      }
      else
      {
        console.log("no");
      }
      */

      if(confirm("Delete this Data!"))
      {
        console.log("yes");
        window.location = `/notes/index.php?delete=${snodel}`;  // GET method
        
      }
      else
      {
        console.log("no");
      }
      



  })

  
})



</script>




















</body>













<?php

// $sql = "SELECT * FROM `node`;";
// $result = mysqli_query($conn,$sql);

// while($row = mysqli_fetch_assoc($result))
// {
//   echo $row['sr_no']."---->".$row['title']."---->".$row['description']."--->".$row['register time'];
// }



?>



</html>