<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://th.bing.com/th/id/OIP.fc10B-BHTemEh0elgYrtDwHaEK?pid=ImgDet&rs=1" rel="shortcut icon">
    <link href="style.css" rel="stylesheet">
    <title>Add API Key</title>
</head>
<style>
  .card{
    margin:200px;
}
</style>
<body style=
   "background: url(https://www.denofgeek.com/wp-content/uploads/2021/06/Elden-Ring-2.jpg?fit=1920%2C1080;">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>
<br>


    <div class="row justify-content-center">
    <div class="col-sm-12 col-md-9">
    <div class="card">
        <div class="card-header bg-dark">
         <div class="float-left">
            <h4 class="h4 m-0 text-light"><b>Form Add Key</b></h4>
        </div>      
        </div>
        <div class="card-body">
          <form action="<?php echo base_url('home/fungsiTambah')?>" method="post">
<div class="form-floating mb-3">
  <input type="text" class="form-control" id="floatingInput" name="key" placeholder="Masukkan Kode" autocomplete="off"  class="form-control" required value="KEY-<?= mt_rand(10000, 100000) ?>" maxlength="10" readonly>
  <!-- <input type="text" class="form-control" id="floatingInput" name="key"> -->
  <label for="floatingInput">Key</label>
</div>
<div class="d-grid gap-2 col-6 mx-auto">
<a href=""><button class="btn btn-primary col-12" type="submit">Add New Key(s)</button></a>
</div>
</form>

<br>		    
        </div>
       </div>
      </div>
   </div>
      
      <br>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
</body>
</html>
