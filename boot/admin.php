<?php
session_start();
if(!(isset($_SESSION['logedin']))|| $_SESSION['logedin']!=true)
{
    header('Location:index.php');  
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Faculty Panel</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

        <style>
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd; /* Add border around the table */
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            border-right: 1px solid #ddd; /* Add vertical lines between columns */
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .view-button {
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }
        .view-button:hover {
            background-color: #0056b3;
        }
    </style>
    </head>

    <body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <p class="navbar-brand ps-3" style="font-size: 15px;">Career Counselling Analyzer</p>

    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    
    <!-- Navbar Right-aligned Items-->
    <ul class="navbar-nav ms-auto me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                
                <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
                <li><a class="dropdown-item" href="../changepassword.php?id=<?php echo $_SESSION['account']; ?>">Reset Password</a></li>

            </ul>
        </li>
    </ul>
</nav>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            
                            
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>    
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as : </div>
                       <?php 
                       include('connection.php');
    $email = $_SESSION['account'];
    
    // Fetch counsellor's name
     $result=mysqli_query($conn,"SELECT name FROM counsellor WHERE email='$email'");
     $row = mysqli_fetch_assoc($result);  
     echo  $row['name'];
                       ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                      
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Students in the Batch</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">

                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        <?php
                                        include('connection.php');
                                        
                                        $email = $_SESSION['account'];
                                        $query_students = "SELECT student_id, full_name FROM student WHERE c_id = (SELECT c_id FROM counsellor WHERE email = '$email')";
                                        $result_students = mysqli_query($conn, $query_students);
                                        $num1 = $result_students -> num_rows;
                                        echo $num1;
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Students who filled out the Form</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    <?php
                                        include('connection.php');
                            
                                        $email = $_SESSION['account'];
                                        $query_students = "SELECT student_id FROM personalinformation WHERE counsellor = (SELECT name FROM counsellor WHERE email = '$email')";
                                        $result_students = mysqli_query($conn, $query_students);
                                        $num2 = $result_students -> num_rows;
                                        echo $num2;
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Students remaining</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        <?php
                                        include('connection.php');
                                         echo $num1-$num2;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                        <?php
include('connection.php');

$email = $_SESSION['account'];

$query_students = "SELECT student_id, full_name, email FROM student WHERE c_id = (SELECT c_id FROM counsellor WHERE email = '$email')";
$result_students = mysqli_query($conn, $query_students);

// Check if query was successful
if (!$result_students) {
    echo "Error: " . mysqli_error($conn);
    exit;
}
?>
    <hr></hr> 
    <h2>Student Information</h2>
<!--    
    <div style="position: relative;">
    <input class="form-control" type="text" style="width: 20%; margin-bottom:20px; margin-left:955px;" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
    <button class="btn btn-primary" id="btnNavbarSearch" type="button" style="position: absolute; top: 0; right: 0;"><i class="fas fa-search"></i></button>
</div> -->

    <table>
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Current Sem</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result_students->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['student_id']; ?></td>
                    <td><?php echo $row['full_name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                        <?php
                        // Query to fetch currentsemester based on student_id
                        $student_id = $row['student_id'];
                        $query_currentsemester = "SELECT currentsemester FROM personalinformation WHERE student_id = '$student_id'";
                        $result_currentsemester = mysqli_query($conn, $query_currentsemester);

                        // Check if query executed successfully and fetch the currentsemester
                        if ($result_currentsemester && $row_currentsemester = $result_currentsemester->fetch_assoc()) {
                            echo $row_currentsemester['currentsemester'];
                        } else {
                            echo "N/A"; // If no matching record found
                        }
                        ?>
                    </td>
              <td><a class="view-button" href="view.php?id=<?php echo $row['student_id']; ?>">View</a></td>
  </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
 </div>
                </main>                
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        
    </body>
</html>
