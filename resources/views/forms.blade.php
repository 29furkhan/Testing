<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <title>TPO Portal</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
<script>

var first_name;
var last_name;
var caserp_id;
var alert,content;
var first_name_p;
var first_name_message;

function set(){
  // demo = document.getElementById('demo');
  first_name = document.getElementById('first_name').value;
  last_name = document.getElementById('last_name').value;
  caserp_id = document.getElementById('caserp_id').value;
  // demo.innerHTML=data;

}

function setP(data){
  document.getElementById('alertbox').classList.remove("alert");
  alert = data['alert'];
  console.log(alert);
  content = data['data'];
  document.getElementById('alertbox').classList.add("alert",alert);
  document.getElementById('alertmessage').innerHTML=content;
  document.getElementById('alertbox').style.display='block';
}



  $(document).ready(function(){
    
  $("#submit").click(function(){
    console.log('Furkhan');
    set();
    $.ajax({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    type:'POST',
    url : 'php/connect',
    data: {
      first_name : first_name,
      last_name  : last_name,
      caserp_id  : caserp_id  
    },
    success:function(data){
      console.log(data);
      setP(data);
    },
    error:function(data){
      console.log(data);
    }
    });
  });
});

  
</script>
<form action="" method="POST">
    {{csrf_field()}}
    <!-- {{ method_field('PATCH') }} -->

    <div id="alertbox" style="display:none;margin-top:36px;margin-left: 20px;width:50%;" class="alert alert-success">
    <strong id='alertmessage'>Success!Indicates a successful or positive action.</strong> 
    </div>


    <div style="margin-top:20px;margin-left: 20px;width:50%;" class="form-group">
      <label for="exampleInputEmail1">CASERP_ID</label>
      <input type="text" class="form-control" id="caserp_id" placeholder="Enter CASERP_ID"/>
      <!-- <small style = "display: none;" id="CASERP_ID_message" class="form-text text-muted">We haven't find any record for name</small> -->
    </div>


    <div style="margin-left: 20px;width:50%;" class="form-group">
      <label for="exampleInputEmail1">First Name</label>
      <input type="text" class="form-control" id="first_name" placeholder="Enter first_name"/>
      <!-- <small style = "display: none;" id="first_name_message" class="form-text text-muted">
        <i class="fa fa-exclamation-triangle" aria-hidden="true"> $nbsp</i>
        <p id="first_name_p"></p>
      </small> -->

    </div>

    <div style="margin-left: 20px;width:50%;" class="form-group">
      <label for="exampleInputEmail1">Last Name</label>
      <input type="text" class="form-control" id="last_name" placeholder="Enter last_name"/>
      <!-- <small style = "display: none;" id="last_name_message" class="form-text text-muted">We haven't find any record for name</small> -->
    </div>
    
    <button style="margin-left: 20px;" id="submit" name='submit' type="button" class="btn btn-primary">Submit</button>
   
    
</form>
</body>
</html>
