<!DOCTYPE html>
<html>
    <head>
            
    <title>Insert Record</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
    </head>
    <body>
    <div class="container">
    <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" href="#">Logout</a>
  </li>
  </ul>
        <br><br><br>
   <h1 class="text-white bg-dark text-center">All Records</h1>
    <br>
    <div class= "table-responsiv">
    <a class="btn btn-primary"  href="../Controller/collectData.php?action=user-add">Add User</a>
    </div>
    <div id="toys-grid">
        <table class="table table-bordered table-striped table-hover" cellpadding="10" cellspacing="1">
            <thead>
                <tr>
                    <th><strong>User Name</strong></th>
                    <th><strong>Password</strong></th>
                    <th><strong>Action</strong></th>

                </tr>
            </thead>
            <tbody>
                    <?php
                    if (! empty($result)) {
                        //echo "<pre>";
                      //  print_r($result);
                        foreach ($result as $k => $v) {
                         //   echo "<pre>";
                     //   print_r($k); 
                      //  print_r($v);
                            ?>
          <tr>
          <td><?php echo $result[$k]["username"]; ?></td>
                    <td><?php echo $result[$k]["password"]; ?></td>
                   
                    <td><a 
                    href="../Controller/collectData.php?action=user-edit&id=<?php echo $result[$k]["id"]; ?>">
                    <button class="btn-primary btn"> Update  </button> 
                        </a>
                        <a 
                        href="../Controller/collectData.php?action=user-delete&id=<?php echo $result[$k]["id"]; ?>">
                        <button class="btn-danger btn">  Delete   </button> 
                        </a>
                    </td>
                </tr>
                    <?php
                        }
                    }
                    ?>
                
            
            
            <tbody>
        
        </table>
    </div>
</body>
</html>