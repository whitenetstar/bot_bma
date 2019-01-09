<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-4">
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">Send Message</h5>
            <h6 class="card-subtitle mb-2 text-muted">Line Friends</h6>
            <p class="card-text">
              <form action="push.php" method="POST" target="_blank">
                <div class="form-group">
                  <label for="message">Message</label>
                  <input type="text" class="form-control" id="message" name="message" aria-describedby="message" placeholder="Enter message">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </p>    
          </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">Get Friends</h5>
            <h6 class="card-subtitle mb-2 text-muted">Line Friends</h6>
            <p class="card-text">
              <a href="#" class="btn btn-primary" id="send" name="send" role="button">Get Friends</a>
            </p> 
            <div id="show_friend"></div>   
          </div>
        </div>
    </div>
  </div>
</div>
</body>
<script type="text/javascript">
  $("#send").click(function(){
    event.preventDefault();
    $.post("get_friend.php",'',function(response){
      $("#show_friend").html(response);
      // alert(response);
    })
    // alert("HelloWorld");
  });
</script>
</html>
