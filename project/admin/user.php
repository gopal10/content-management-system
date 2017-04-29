<?php

$con= mysqli_connect("localhost", "root", "", "cms");

?>
<?php
if(isset($_GET['del']))
{
    $del_id=$_GET['del'];
    $query ="DELETE FROM `users` WHERE `users`.`id` = $del_id";
        if(mysqli_query($con,$query))
        {
            echo "user has been deleted";
}
    else
    {
    echo "Not deleted";
    }
}
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Container</title>
    <!-- Bootstrap -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="images/g.png">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link rel="stylesheet" href="css/animated.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> <a class="navbar-brand" href="index.php">Container</a> </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="posts.php"><i class="fa fa-plus-square" aria-hidden="true"></i> Add Post</a></li>
                    <li><a href="add_user.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Add User</a></li>
                  
                    <li><a href="logout.php"><i class="fa fa-power-off" aria-hidden="true"></i> Log Out</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="index.php" class="list-group-item active"> <i class="fa fa-tachometer"></i> Dashboard </a>
                    <a href="postdata.php" class="list-group-item"> <i class="fa fa-file-text-o"></i> All post <span class="badge">14</span> </a> 

                     <a href="user.php" class="list-group-item"><i class="fa fa-user"></i>  Users
  <span class="badge">14</span>
  </a> </div>
            </div>
            <div class="col-md-9">
                <h1><i class="fa fa-users"></i>  Users <small>View All Users</small><hr>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html" class="active"> <i class="fa fa-tachometer"></i> Dashboard</a>
                    </li>
                    <li class="active"> <i class="fa fa-users"></i> Users</li>
                </ol>
                
              
                
                <div class="row">
                
                 <div class="col-sm-8">
                     <form action="#">
                         <div class="row">
                             <div class="col-xs-4">
                                 <div class="form-group">
                                     <select name="" id="" class="form-control">
                                         <option value="delete">Delete</option>
                                          <option value="auther">Change to Author</option>
                                    <option value="admin">Change to Admin</option>
                                      </select>
                                 </div>
                             </div>
                         </div>
                     </form>
                     
                 </div>
                 <div class="col-sm-8">
                     <input type="submit" value="Apply" class="btn btn-success" >
                 <a href="add_user.php" class="btn btn-info">Add New</a>
                 </div>
                  
                    </div><hr>
                    
                    
                    <table class="table table-hower table-border table-stripped">
                        <thead>
                            <tr>
                               <th><input type="checkbox"></th>
                                <th>Sr #</th>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Image</th>
                                <th>Password</th>
                                <th>Role</th>
                                <th>Post</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                     <?php
                $query="SELECT * FROM users ORDER BY id DESC";
                $run =mysqli_query($con,$query);
                if(mysqli_num_rows($run)>0)
                {
                    
                ?>
                      
                            
                 <?php
                    while($row = mysqli_fetch_array($run))
                    {
                        $id=$row['id'];
                        $first_name=$row['first_name'];
                        $last_name=$row['last_name'];
                        $email=$row['email'];
                        $username=$row['username'];
                        $role=$row['role'];
                        $image=$row['image'];
                        $date=getdate($row['date']);
                        $day =$date['mday'];
                        $month =$date['month'];
                        $year=$date['year'];
                
    
                    ?>
                           
                           
                            <tr>
                               <th><input type="checkbox"></th>
                                <td><?php echo $id; ?></td>
                                <td><?php echo "$day $month $year";?></td>
                                <td><?php echo "$first_name $last_name"; ?></td>
                                <td><?php echo $username; ?></td>
                                <td><?php echo $email; ?></td>
                                <td><img src="images/<?php echo $image; ?>" alt="image" width="30px;"></td>
                                <td>*****</td>
                                <td><?php echo $role; ?></td>
                                <td>11</td>
                                <td><a href="add_user.php"><i class="fa fa-pencil"></i></a></td>
                                <td><a href="user.php?del=<?php echo $id;?>"><i class="fa fa-times"></i></a></td>
                            </tr>
                      <?php 
                    }
                            ?>
                        </tbody>
                        
                    </table>
                    
                    
                    <?php
                }
                else
                    echo "<h2><center> NO data Available</center></h2>"
                ?>
                    
                    
            </div>
        </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>