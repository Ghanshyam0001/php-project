<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHP & Ajax CRUD</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <table id="main" border="0" cellspacing="0">
    <tr>
      <td id="header">
        <h1>PHP & Ajax CRUD</h1>

        <div id="search-bar">
          <label>Search :</label>
          <input type="text" id="search" autocomplete="off">
        </div>
      </td>
    </tr>
    <tr>
      <td id="table-form">
        <form id="addForm">
          First Name : <input type="text" id="fname">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          Last Name : <input type="text" id="lname">
          <input type="submit" id="save-button" value="Save">
        </form>
      </td>
    </tr>
    <tr>
      <td id="table-data">
      </td>
    </tr>
  </table>
  <div id="error-message"></div>
  <div id="success-message"></div>
  <div id="modal">
    <div id="modal-form">
      <h2>Edit Form</h2>
      <table cellpadding="10" width="100%">
       
      </table>

      <div id="close-btn">X</div>


      
      
    </div>
  </div>

<script type="text/javascript" src="js/jquery.js"></script>
<script text="text/javascript">
  $(document).ready(function(){
    function loadtable(){
      $.ajax({
        url: "ajax-load.php",
        type: "POST",
        success :function(data){
          $("#table-data").html(data);
        }

      })
    }
    loadtable();

    $("#save-button").on("click",function(e){
      e.preventDefault();

      

      var fname = $("#fname").val();
      var lname = $("#lname").val();

      if(fname == "" || lname == ""){
        $("#error-message").html("All fields are Required").slideDown();
        $("#success-message").slideUp();
      }
      else{

      $.ajax({

        url: "ajax-insert.php",
        type : "POST",
        data:{ fname:fname,lname:lname},
        success : function(data){

          if(data == 1){
            loadtable();

            $("#addForm").trigger("reset");
            $("#success-message").html("Data INSERTED").slideDown();
            $("#error-message").slideUp();
          }else{
            $("#error-message").html("Data cant inserted").slideDown();
            $("#success-message").slideUp();
          }

        }
      })
    }


    })

    $(document).on("click",".delete-btn",function(){
      if(confirm("Do You want to delete this record")){

     
       var studentid = $(this).data("id");
       var element =this;

       $.ajax({
        url : "ajax-delete.php",
        type : "POST",
        data :{studentid:studentid},
        success :function(data){
          loadtable();

          if(data == 1){
            $(element).closest("tr").fadeOut();
            $("#success-message").html("Data Deleted successfully").slideDown();
            $("#error-message").slideUp();
          }else{
            $("#error-message").html("Data cant Deleted").slideDown();
            $("#success-message").slideUp();
          }
        }
       })
      }
    })
       $(document).on("click",".edit-btn",function(){
        $("#modal").show();

        var editid = $(this).data("eid");
        

        $.ajax({
          url : "load-update-form.php",
          type : "POST",
          data: {editid:editid},
          success:function(data){
            $("#modal-form table").html(data);

          }
        })
        
       })
       $("#close-btn").on("click" ,function(){
        $("#modal").hide();
        
       });

       $(document).on("click","#edit-submit",function(){
       var id = $("#edit-id").val();
        var fname = $("#edit-fname").val();
        var lname = $("#edit-lname").val();

        
        $.ajax({
          url : "ajax-update-form.php",
          type : "POST",
          data : {id:id,fname:fname,lname:lname},
          success :function(data){
            if(data == 1){
         $("#modal").hide();

          loadtable();
              $("#success-message").html("Data Updated successfully").slideDown();
              $("#error-message").slideUp();
            }else{
              $("#error-message").html("Data cant Updated").slideDown();
              $("#success-message").slideUp();
            }
          }
        })



       });

       $("#search").on("keyup",function(){
        var search_value = $(this).val();
        $.ajax({
          url:"ajax-live-search.php",
          type:"POST",
          data:{search_value:search_value},
          success:function(data){
            $("#table-data").html(data)
          }
        })
       })
  
  })


</script>
</body>





</html>
