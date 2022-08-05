<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Login Form</h2>
  <?php echo @$message; ?>
  <form method="post" enctype="multipart/formdata" style="width:40%">
    <div class="form-group">
      <label for="username">Enter Email ID or Contact Number:</label>
      <input type="text" class="form-control" name="username" placeholder="Enter Email ID">
    </div>

	<div class="form-group">
      <label for="passsword">Enter Password:</label>
      <input type="password" class="form-control" name="password" placeholder="Enter Password">
    </div>

    <input type="submit" name="login" class="btn btn-success" value="Login"/>
  </form>
</div>

</body>
</html>
