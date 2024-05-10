<?php
session_start();

// Check if the user is logged in
if (!(isset($_SESSION['logedin']) && $_SESSION['logedin'] === true)) {
    header('Location:index.php');
    exit(); // Stop further execution
}

// Initialize data points arrays
$dataPoints = array(
    array("label" => "Wants to job (Placement)", "y" => 0),
    array("label" => "Further Study", "y" => 0),
    array("label" => "Entrepreneurship", "y" => 0),
    array("label" => "Not Decided", "y" => 0)
);
$dataPoints1 = array(
    array("label" => "MQ", "y" => 0),
    array("label" => "ACPC", "y" => 0),
    array("label" => "NRI", "y" => 0),
    array("label" => "TFWS", "y" => 0)
);

// Include database connection
include('connection.php');

// Fetch counselor's name
$email = $_SESSION['account'];
$query = "SELECT name FROM counsellor WHERE email='$email'";
$result = mysqli_query($conn, $query);

if (!$result) {
    echo "Error fetching counselor's name: " . mysqli_error($conn);
    exit();
}

$row = mysqli_fetch_assoc($result);
$c_name = $row['name'];

// Fetch student interests and admission types for the counselor
$interest_query = "SELECT interest, admissiontype FROM personalinformation WHERE counsellor = '$c_name'";
$res = mysqli_query($conn, $interest_query);

if (!$res) {
    echo "Error fetching interests: " . mysqli_error($conn);
    exit();
}

// Process fetched data
while ($row = mysqli_fetch_assoc($res)) {
    $interest = $row['interest'];
    $admissionType = $row['admissiontype'];

    // Increment counts based on interests and admission types
    switch ($interest) {
        case "placement":
            $dataPoints[0]['y']++;
            break;
        case "FurtherStudy":
            $dataPoints[1]['y']++;
            break;
        case "Entrepreneurship":
            $dataPoints[2]['y']++;
            break;
        case "Not Decided":
            $dataPoints[3]['y']++;
            break;
    }

    switch ($admissionType) {
        case "MQ":
            $dataPoints1[0]['y']++;
            break;
        case "ACPC":
            $dataPoints1[1]['y']++;
            break;
        case "NRI":
            $dataPoints1[2]['y']++;
            break;
        case "TFWS":
            $dataPoints1[3]['y']++;
            break;
    }
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
        <title>Charts - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        <script>
window.onload = function () {
    var dataPoints = <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>;
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        exportEnabled: true,
        title: {
            text: "Interest of Students"
        },
        data: [{
            type: "pie",
            showInLegend: true,
            legendText: "{label}",
            indexLabelFontSize: 16,
            indexLabel: "{label} - #percent%",
            yValueFormatString: "฿#,##0",
            dataPoints: dataPoints
        }]
    });
    chart.render();

    var dataPoints1 = <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>;
    var chart1 = new CanvasJS.Chart("chartContainer1", {
        animationEnabled: true,
        exportEnabled: true,
        title: {
            text: "Admission type"
        },
        data: [{
            type: "pie",
            showInLegend: true,
            legendText: "{label}",
            indexLabelFontSize: 16,
            indexLabel: "{label} - #percent%",
            yValueFormatString: "฿#,##0",
            dataPoints: dataPoints1
        }]
    });
    chart1.render();
}
</script>


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
            </ul>
        </li>
    </ul>
</nav>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="admin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                          
                            
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                       <?php 
                       include('connection.php');
    $email = $_SESSION['account'];
    
    // Fetch counsellor's name
     $result=mysqli_query($conn,"SELECT name FROM counsellor WHERE email='$email'");
     $row = mysqli_fetch_assoc($result);  
     echo  "Logged in as : ".$row['name'];
                       ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Graphical Analysis</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Charts</li>
                        </ol>
     
                        <div class="row">
                            <div class="col-lg-6">
                            <div class="card mb-4">
                            <div class="card-header">
                            Interest of Students
                        </div>
                        <div class="card-body">
    <div id="chartContainer" style="height: 370px; width: 90%;"></div>
                    </div>
                </div>

</div>
                            <div class="col-lg-6">
                            <div class="card mb-4">
                            <div class="card-header">
                            About Study
                        </div>
                        <div class="card-body">
    <div id="chartContainer1" style="height: 370px; width: 100%;"></div>
                    
                    </div>

</div>

                            </div>        
                        </div>              
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    </body>
</html>
