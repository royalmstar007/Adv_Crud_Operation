<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>ToDo || List</title>
  <!-- Font Awesome -->
  <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/css/mdb.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
    main {
      padding-top: 3rem;
      padding-bottom: 2rem;
    }
    .extra-margins {
      margin-top: 1rem;
      margin-bottom: 2.5rem;
    }
    .bgcolor{
        background-color: coral;
        border-radius: 1.5rem;
    }
    .inputDecortion{
    border: 1px solid black  !important;
    border-top-right-radius: 0.25rem !important;
    border-bottom-right-radius: 0.25rem  !important;
     background-color:white  !important;
    }
    #fixht{
      height: 430px;
    }
    body{
      background-color: cadetblue;
    }
  </style>
</head>
<body>
  <!--Main Navigation-->
  <header>

  </header>
  <!--Main Navigation-->
  <main>
    <!--Main layout-->
    <div class="container">
        <center><h2>TODO LIST</h2><center>
         <hr class="extra-margins"> 
      <div class="row">
        <div class="col-md-6 mr-3" id="table-container">
          <!--Featured image -->
          <!--<div class="view overlay hm-white-light z-depth-1-half">-->
          <!--<div class="" >-->
          <!--  <p>Task</p>-->
          <!--    <p>Task</p>-->
          <!--      <p>Task</p>-->
          <!--<button type="submit" class="btn  btn-danger dltbtn">Delete</button> &nbsp;  -->
          <!--       <button type="submit" class="btn btn-success editbtn" data-toggle="modal">Edit</button>-->
          <!--</div>-->
            <!--<div class="card bgcolor p-3">-->
            <!--<p>Task</p>-->
            <!--  <p>Task</p>-->
            <!--    <p>Task</p>-->
          <!--</div>-->
          <br>
        </div>
        <div class="bgcolor card col-md-5" id="fixht">
          <!-- Title input -->
          <div class=" form-outline mb-4">
            <center><label class="form-label" for="">Title*</label></center>
            <input type="text" id="title" name="title" id="Title" class="inputDecortion form-control" />
            <input type="text" name="updateid" id="updateid" class="d-none inputDecortion form-control" />
          </div>
          <!-- Details input -->
          <div class="form-outline mb-4">
            <center><label class="form-label" for="form7Example2">Details*</label></center>
            <textarea type="text" rows="4" cols="100"  name="details" id="details" class="inputDecortion" /></textarea>
          </div>
             <!-- Date input -->
          <div class="form-outline mb-4">
           <center><label class="form-label" for="form7Example3">Date*</label></center>
            <input type="text" id="date" name="date"  data-date-format="yyyy-mm-dd" class="inputDecortion" />
          </div>
            <!--<input type="text" id="start_date" name="start_date" size="7"  placeholder="From" autocomplete = "off" value=""  />-->
            <!-- Submit button -->
            <!--<button type="submit" id="createNursery" class="btn btn-primary btn-block mb-4">Submit</button>-->
            <!--<div class="modal-footer">-->
            <!--<button type="button" class="btn btn-secondary" data-dismiss="modal"  id="clearNursery" onclick="return clearAdd()">Cancel</button>-->
          <button style="background-color:black; color:white; margin-bottom:5px; border:none;"  id="createTask" type="submit" class="btn" onclick="return createTaskFunciton();" id="btn-save">Submit</button>
          <!--</div>-->
        </div>
      </div>
    </div>
  </main>
  <!-- JQuery -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/js/mdb.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

  <script>
  function createTaskFunciton()
  {
    var title = document.getElementById("title").value;
    var details = document.getElementById("details").value;
    var taskDate = document.getElementById("date").value;
    var updateid = document.getElementById("updateid").value;
    // alert(taskDate);
    if(title == "") 
    {
        alert("Please enter Title.");
        document.getElementById("title").focus();
    }
    else if(details == "") 
    {
        alert("Please enter details.");
        document.getElementById("details").focus();
    }
    else if(taskDate == "") 
    {
        alert("Please Select date.");
        document.getElementById("date").focus();
    }
    else
    {     
      document.getElementById("createTask").disabled = true;
        if(updateid =="")
        {
          $.ajax
          (
            {
              url:"createTask.php",
              method:"POST",
              data:
              {
                title : title,
                details : details,
                taskDate : taskDate
              },
              dataType:"json",
              cache:"false",
              success:function(data)
              {
                document.getElementById("createTask").disabled = false;
                if(data == 200)
                {
                  document.getElementById('title').value = '';
                  document.getElementById('details').value = '';
                  document.getElementById('date').value = '';
                  alert("created successfully.");
                  getTaskList();
                }
                else
                {
                  alert("Failed to create.");   
                }  
              }
            }
          );
        }
        else
        {
          $.ajax
          (
            {
              url:"updateTask.php",
              method:"POST",
              data:
              {
                id: updateid,
                title : title,
                details : details,
                taskDate : taskDate
              },
              dataType:"json",
              success:function(data)
              {
                document.getElementById("createTask").disabled = false;
                // alert(data);
                if(data == 200)
                {
                  document.getElementById('title').value = '';
                  document.getElementById('details').value = '';
                  document.getElementById('date').value = '';
                  document.getElementById('updateid').value = '';
                  alert("Updated successfully.");
                  getTaskList();
                }
                else
                {
                  alert("Failed to create.");
                }
              }
            }
          );  
        } 
      }
    }
    $(document).ready
    (function()
      {
        getTaskList();
      }
    );
    function getTaskList()
    {
     $.ajax
     (
      {    
        type: "GET",
        url: "fetchList.php",             
        dataType: "html",                  
        success: function(data)
        {                    
            $("#table-container").html(data);         
        }
      }
    );
  }
  function GetTaskDetail(emp_id)
  {
    $.ajax
    (
      {
        url:"fetchTaskDeatils.php",
        method:"POST",
        data:{emp_id,emp_id},
        dataType:"json",   
        success:function(data)
        {
          $('#updateid').val(data.id);
          $('#title').val(data.title);
          $('#details').val(data.details);
          $('#date').val(data.date);
        }
      } 
    );
  }
  function deleteTask(id)
  {         
    document.getElementById("createTask").disabled = true;
    $.ajax
    (
      {
        url:"deleteTask.php",
        method:"POST",
        data:
        {
          id : id
        },
        dataType:"json",
        success:function(data)
        {
          if(data == 200)
          {
            getTaskLost();
            alert("Successfully Deleted.");
          }
          else
          {
            alert("Failed to Deleted.");
          }
        }
      }
    ); 
  }
  $(function () 
  {
    $("#date").datepicker
    (
      { 
        autoclose: true, 
        todayHighlight: true,
      }
    ).datepicker('update', new Date());
  }
  );
  </script>
</body>
</html>