<?php include("php_code.php"); ?>

<!doctype htmL>
<html>
<head>
    <title> CRUD APP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

<?php if($result= mysqli_query($conn,"SELECT * FROM info")){
    if(mysqli_num_rows($result) > 0){?>
<div class="wrapper">
  <div class="container-fluid">
  <div class="row">
  <div class="col-md-6">
  <div class="page-header clearfix">
  <h3 class="pull-left"> Stock Sales</h3>
  <div>
<table class="table table-striped table-dark">
<thead>
    <tr>
    
    <th scope='col'>name</th>
    <th scope='col'>stock</th>
    <th scope='col'>Amount(naira)</th>
    <th scope="col">Action</th>
    </tr>
</thead>
<?php while($row = mysqli_fetch_array($result)) { ?>
    <tbody>
        <tr>
            <td> <?php echo $row['s_name']; ?></td>
            <td> <?php echo $row['stock']; ?></td>
            <td> <?php echo $row['amount']; ?></td>

            <td> <a href="update.php?edit=<?php echo $row['id']; ?>" class=" btn btn-primary">EDIT</a></td>
            <td> <a href="php_code.php?del=<?php echo $row['id']; ?>" class="btn btn-danger">DELETE</a></td>
        </tr>
        <?php  } }else{ echo "<p class='lead'><em> No Records were Found.</em></p>";}}else {echo "ERROR: Could not able to execute . " . mysqli_error($conn);
    }
    mysqli_close($conn); ?>
    </tbody>
    
</table>
</div>
</div>
</div>
</div>
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
        <input type="hidden" name="id" value="<?php echo $id; ?>">  
  <div class="col-md-6">
    <label for="name" class="form-label">NAME</label>
    <input type="text" class="form-control"  name="name"  value="<?php echo $name; ?>" >
  </div>
  <div class="col-md-6">
    <label for="stock" class="form-label">STOCK</label>
    <input type="text" name="stock" class="form-control"  value="<?php echo $stock; ?>">
  </div>
  <div class="col-md-6">
    <label for="amount" class="form-label">Amount Paid</label>
    <input type="text" name="amount" class="form-control"  value="<?php echo $amount; ?>">
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