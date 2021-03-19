
<?php 
    session_start();
    include("conn.php");
    if(isset($_GET['edit'])){
        $id= $_GET['edit'];
        $update = true;
        $record = mysqli_query($conn, "SELECT * FROM info WHERE id=$id");
    
    
        if(count($record)==1) {
            $n = mysqli_fetch_array($record);
            $name = $n['name'];
            $stock = $n['stock'];
            $amount = $n['amount'];
          
        }
        
    }
    ?><!doctype htmL>
<html>
<head>
    <title> CRUD APP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

<div class="wrapper">
  <div class="container-fluid">
  <div class="row">
  <div class="col-md-6">
<form method="POST" action="php_code.php" >
        <?php if(isset($_SESSION['msg'])): ?>
            <div class="alert alert-success" role="alert">
            <?php echo $_SESSION['msg'];
                unset($_SESSION['msg']);
                ?>
        </div>
        <?php endif ?>
        <input type="hidden" name="edit" value="<?php echo $id; ?>">  
  <div class="col-md-6">
    <label for="name" class="form-label">NAME</label>
    <input type="text" class="form-control"  name="name" id="name" value="<?php echo $name; ?>" >
  </div>
  <div class="col-md-6">
    <label for="stock" class="form-label">STOCK</label>
    <input type="text" name="stock" class="form-control" id="stock" value="<?php echo $stock; ?>">
  </div>
  <div class="col-md-6">
    <label for="amount" class="form-label">Amount Paid</label>
    <input type="text" name="amount" class="form-control" id="amount" value="<?php echo $amount; ?>">
    </div>
  <br>
  <?php if($update == true): ?>
  <div class="col-md-6">
  <button type="submit"  name="update" class="btn btn-success">UPDATE</button>
  <?php else: ?>
    <button type="submit"  name="save"  class="btn btn-success">SAVE</button>
    </div>
    <?php endif ?>
</form>
</div >
  </div>
  </div>
  </div>

 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
