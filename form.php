<?php
session_start();
if(!(isset($_SESSION['logedin']))|| $_SESSION['logedin']!=true)
{
    header('Location:login.php');
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-6o7k3k9v2NJGB8b1K4d2uplZHZ/w7kO2e2H3UUyEXNXc3sBexQ4j2LYo9z6CfvmY8mjPFC9VNNpgGzB22yOIHw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="nav.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Career Counselling Form - Career Counselling Analyzer</title>
    
<style>
  body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-color:antiquewhite;

  }

  .navbar {
    /* background: linear-gradient(to bottom right, #5f9ea0, #49767b); */
    background: linear-gradient(to bottom right, #5f9ea0,#30757a,#5f9ea0);

  }

   #nav{
    margin-left: 20px;
    background-color: #ccc;
    color:black;
    font-family: cursive;
    font-weight: bold;
    text-decoration: none;   
}

  .navbar .icon {
    float: right;
    font-size: 20px;
    margin-right: 15px;
  }

  .user-icon {
    border-radius: 50%;
    background-color: #ccc;
    width: 40px;
    height: 40px;
    text-align: center;
    line-height: 40px;
    font-size: 20px;
    color: #333;
    float: right;
    margin-right: 10px;
  }
</style>
</head>
<body>
      


    <div class="navbar">
        <button type="button" name="nav" id="nav" onclick="logout()" class="btn btn-secondary">Log Out</button>
        <button type="button" name="nav" id="nav" onclick="display()" class="btn btn-secondary">View</button>
        <div class="user-icon">
    <i class="fas fa-user">
    <?php 
include('connection.php'); 

// Sanitize session data to prevent SQL injection
$student_id = mysqli_real_escape_string($conn, $_SESSION["account"]);

// Prepare SQL statement to fetch full name based on student ID
$sql = "SELECT full_name FROM student WHERE student_id = '$student_id'";

$result = mysqli_query($conn, $sql);

if ($result->num_rows == 1) {
    // Fetch the row
    $row = $result->fetch_assoc();
    
    // Get the full name from the row
    $full_name = $row["full_name"];
    
    // Get the first letter of the full name
    $first_letter = strtoupper(substr($full_name, 0, 1)); // Convert to uppercase
   
    // Output the first letter
    echo $first_letter;
}
?>

    </i>
  </div>

</div>

<script>
    function logout() {
  // Redirect to logout.php
  window.location.href = "logout.php";
}
    function display() {
  // Redirect to logout.php
  window.location.href = "fdisplay.php";
}
    </script>

<form action="#" method="POST">
<div class="container" >
        <div class="col-md-12">
            <div class="card mt-4">
           
            <div class="card-header" style="color:white; background: linear-gradient(to bottom right, #5f9ea0,#30757a,#49767b); display: flex; justify-content: space-between; align-items: center;">
    <h4 class="text-center" style="margin: 0; flex-grow: 1;">Personal Information</h4>
</div>


            <div class="card-body">
                <div class="main-form mt-2">
                    <div class="row">
                        
                        <div class="col-md-4 ">
                            <div class="form-group mb-2">
                                <label for="" style="font-weight: bold;">Full Name:</label>
                                <input type="text" class="form-control" name="fullname"  placeholder="Full name" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label for=""  style="font-weight: bold;">Personal Email ID:</label>
                                <input type="text" name="email" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label for=""  style="font-weight: bold;">Contact Number:</label>
                                <input type="tel" name="contactnumber" class="form-control" placeholder="" >
                            </div>
                        </div>
                        
                    </div> 
                    
                    <div class="row">
                        
                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label for=""  style="font-weight: bold;">HSC Result(%):</label>
                                <input type="number" name="result_hsc" class="form-control" placeholder="" required step="any">
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label for=""  style="font-weight: bold;">Merit Rank:</label>
                                <input type="number" name="meritrank" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        
                    </div>  
                    
                    <div class="row">
                        
                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label for=""  style="font-weight: bold;">Medium:</label>
                                <select class="form-select" aria-label="Default select example" name="medium" required>
                                    <option value="" disabled selected>Select</option>     
                                        <option value="Gujarati">Gujarati</option>
                                        <option value="English">English</option>
                                    </select>                                   
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label for=""  style="font-weight: bold;">Admission Type</label>
                                    <select class="form-select" aria-label="Default select example" name="admissiontype" required>
                                        <option value="" disabled selected>Select</option>
                                        <option value="management-quota">MQ</option>
                                        <option value="acpc">ACPC</option>
                                        <option value="nri">NRI</option>
                                    </select>                                   
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label for="" style="font-weight: bold;">Select Counsellor:</label>
                                    <select class="form-select" aria-label="Default select example" name="counsellor" required>
                                        <option value="" disabled selected>Select</option>
                                        <option value="Avani Khokhariya">Avani Khokhariya</option>
                                        <option value="Abhishek Patel">Abhishek Patel</option>
                                        <option value="Bela Shah">Bela Shah</option>
                                        <option value="Brinda Patel">Brinda Patel</option>
                                        <option value="Dharmedrasinh Rathod">Dharmedrasinh Rathod</option>
                                        <option value="Harshul Yagnik">Harshul Yagnik</option>
                                        <option value="Hemang Thakkar">Hemang Thakkar</option>
                                        <option value="Srushti Gajjar">Srushti Gajjar</option>
                                        <option value="Vidhisha Pradhan">Vidhisha Pradhan</option>
                                        <option value="Vaibhahvi Patel">Vaibhavi Patel</option>
                                        <option value="Pinal Hansora">Pinal Hansora</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label for=""  style="font-weight: bold;">Current Semester:</label>
                                    <input type="number" name="currentsemester" class="form-control" placeholder="" required>
                                </div>
                            </div>                                
                        </div>
                    </div>
                    
                  </div>
           </div>
     </div>
  </div>

                         
<div class="container" >
        <div class="col-md-12 ">
            <div class="card mt-4">
                <div class="card-header" style="color:white; background: linear-gradient(to bottom right, #5f9ea0,#30757a,#49767b);" >
                    <h4 class="text-center"4>Academic Information</h4>
                </div>
                <div class="card-body">
                      
                      <div class="main-form mt-2">
                        <div class="row">
                          
                        <div class="col-md-4 ">
                              <div class="form-group mb-2">
                                  <h5 style="font-weight: bold;">Semester wise SGPA</h5>
                              </div>
                          </div>
                        </div> 

                        <div class="row">
                          <div class="col-md-3">
                              <div class="form-group mb-2">
                                  <label for=""  style="font-weight: bold;">Sem 1:</label>
                                  <input type="number" name="sem1" class="form-control" step="any">
                              </div>
                          </div>
                        
                          <div class="col-md-3">
                              <div class="form-group mb-2">
                                  <label for=""  style="font-weight: bold;">Sem 2:</label>
                                  <input type="number" name="sem2" class="form-control" step="any">
                              </div>
                          </div>
                        
                          <div class="col-md-3">
                              <div class="form-group mb-2">
                                  <label for=""  style="font-weight: bold;">Sem 3:</label>
                                  <input type="number" name="sem3" class="form-control" step="any">
                              </div>
                          </div>
                        
                          <div class="col-md-3">
                              <div class="form-group mb-2">
                                  <label for=""  style="font-weight: bold;">Sem 4:</label>
                                  <input type="number" name="sem4" class="form-control" step="any">
                              </div>
                          </div>
                        
                        </div>
                        <div class="row">  
                          <div class="col-md-3">
                              <div class="form-group mb-2">
                                  <label for=""  style="font-weight: bold;">Sem 5:</label>
                                  <input type="number" name="sem5" class="form-control" step="any">
                              </div>
                          </div>
                        
                          <div class="col-md-3">
                              <div class="form-group mb-2">
                                  <label for=""  style="font-weight: bold;">Sem 6:</label>
                                  <input type="number" name="sem6" class="form-control" step="any">
                              </div>
                          </div>
                        
                          <div class="col-md-3">
                              <div class="form-group mb-2">
                                  <label for=""  style="font-weight: bold;">Sem 7:</label>
                                  <input type="number" name="sem7" class="form-control" step="any">
                              </div>
                          </div>
                        
                          <div class="col-md-3">
                              <div class="form-group mb-2">
                                  <label for=""  style="font-weight: bold;">Sem 8:</label>
                                  <input type="number" name="sem8" class="form-control" step="any">
                              </div>
                          </div>
                       
                        </div>
                       
                        <div class="row">
                        <div class="col-md-3 mt-2">
                              <div class="form-group mb-2">
                              <h5 style="font-weight: bold;">Year wise CGPA</h5>
                              </div>
                          </div>

                        </div>  
                        
                        <div class="row">
                          <div class="col-md-3">
                              <div class="form-group mb-2">
                                  <label for=""  style="font-weight: bold;">Year 1:</label>
                                  <input type="number" name="year1" class="form-control" step="any">
                              </div>
                          </div>
                        
                          <div class="col-md-3">
                              <div class="form-group mb-2">
                                  <label for=""  style="font-weight: bold;">Year 2:</label>
                                  <input type="number" name="year2" class="form-control" step="any">
                              </div>
                          </div>
                        
                          <div class="col-md-3">
                              <div class="form-group mb-2">
                                  <label for=""  style="font-weight: bold;">Year 3:</label>
                                  <input type="number" name="year3" class="form-control" step="any">
                              </div>
                          </div>
                        
                          <div class="col-md-3">
                            <div class="form-group mb-2">
                              <label for=""  style="font-weight: bold;">Year 4:</label>
                              <input type="number" name="year4" class="form-control" step="any">
                            </div>
                          </div>
                          
                        </div>
                      </div>
                  </div>
            </div>
      </div>
</div>

<div class="container" >
      <div class="col-md-12 ">
            <div class="card mt-4">
                <div class="card-header" style="color:white; background: linear-gradient(to bottom right, #5f9ea0,#30757a,#49767b);" >
                    <h4 class="text-center">Career option</h4>
                </div>
       
                <div class="card-body">
                      
                         <div class="main-form mt-2">
                           <div class="row">
                            <div class="col-md-4">
                              <div class="form-group mb-2">
                                  <label for="" style="font-weight: bold;">Choose Your Interest:</label>
                                  <select class="form-select" aria-label="Default select example" name="interest" required>
                                      <option value="" disabled selected>Select</option>
                                      <option value="placement">Wants to job (Placement)</option>
                                      <option value="FurtherStudy">Further Study</option>
                                      <option value="entrepreneurship">Entrepreneurship</option>
                                      <option value="notdecide">Not Decided</option>
                                  </select>
                               </div>
                              </div>
                          </div>
                        </div>
                  </div>
            </div>
      </div>
</div>

<div class="container">
        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-header" style="background: linear-gradient(to bottom right, #5f9ea0,#30757a,#49767b); color:white;" >
                <h4 class="text-center">Technical Profile</h4>
                </div>
                <div class="card-body">

                
                <div class="col-md-3">
                    <div class="form-group mb-2">
                    <label for="" style="font-weight: bold;">Linkedin Profile Link:</label>
                        <input type="url" name="link" class="form-control"
                            placeholder="https://www.linkedin.com/in/your-profile" required>
                        </div>
                </div>

                        <div class="col-md-4 ">
                            <div class="form-group mb-2">
                                <label for="" style="font-weight: bold;">HackerRank Details</label>
                                <label for="" style="font-weight: bold; color:red">Note: Select Language from C, C++, Java, Python</label>
                            </div>
                        </div>

                        <div class="main-form mt-2">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group mb-2">
                                    <label for=""  style="font-weight: bold;">Languages:</label>
                                            <select name="hlanguages[]" class="form-select">
                                            <option value="" disabled selected>Select</option>   
                                            <option value="C">C</option>
                                            <option value="C++">C++</option>
                                            <option value="Java">Java</option>
                                            <option value="Python">Python</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group mb-2">
                                        <label for=""  style="font-weight: bold;">Rank:</label>
                                        <input type="text" name="hrank[]" class="form-control" placeholder="Enter Rank">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group mb-2">
                                        <label for=""  style="font-weight: bold;">Points:</label>
                                        <input type="text" name="hpoint[]" class="form-control" placeholder="Enter Points">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-2">
                                        <label for=""  style="font-weight: bold;">Problem Solved:</label>
                                        <input type="text" name="hnumber[]" class="form-control" placeholder="Number of problems solved">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group mb-2">
                                        <br>
                                        <a href="javascript:void(0)" class="add-hackerrank-form float-end btn btn-primary">ADD</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="paste-new-forms-hackerrank"></div>

                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label for="" style="font-weight: bold;">CodeChef Details</label>
                                    <label for="" style="font-weight: bold; color:red">Note: Select Language from C, C++, Java, Python</label>
                                </div>
                            </div>

                            <div class="main-form mt-2">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group mb-2">
                                        <label for=""  style="font-weight: bold;">Languages:</label>
                                            <select name="clanguages[]" class="form-select">
                                            <option value="" disabled selected>Select</option>   
                                            <option value="C">C</option>
                                            <option value="C++">C++</option>
                                            <option value="Java">Java</option>
                                            <option value="Python">Python</option>
                                        </select>    </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group mb-2">
                                            <label for=""  style="font-weight: bold;">Rank:</label>
                                            <input type="text" name="crank[]" class="form-control" placeholder="Enter Rank">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group mb-2">
                                            <label for=""  style="font-weight: bold;">Points:</label>
                                            <input type="text" name="cpoint[]" class="form-control" placeholder="Enter Points">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mb-2">
                                            <label for=""  style="font-weight: bold;">Problem Solved:</label>
                                            <input type="text" name="cnumber[]" class="form-control" placeholder="Number of problems solved">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group mb-2">
                                            <br>
                                            <a href="javascript:void(0)" class="add-codechef-form float-end btn btn-primary">ADD</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="paste-new-forms-codechef"></div>

                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label for="" style="font-weight: bold;">Leetcode Details</label>
                                    <label for="" style="font-weight: bold; color:red">Note: Select Language from C, C++, Java, Python</label>
                                </div>
                            </div>

                            <div class="main-form mt-2">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group mb-2">
                                        <label for=""  style="font-weight: bold;">Languages:</label>
                                            <select name="languages[]" class="form-select">
                                            <option value="" disabled selected>Select</option>   
                                            <option value="C">C</option>
                                            <option value="C++">C++</option>
                                            <option value="Java">Java</option>
                                            <option value="Python">Python</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group mb-2">
                                            <label for=""  style="font-weight: bold;">Rank:</label>
                                            <input type="text" name="lrank[]" class="form-control" placeholder="Enter Rank">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group mb-2">
                                            <label for="" style="font-weight: bold;">Points:</label>
                                            <input type="text" name="lpoint[]" class="form-control" placeholder="Enter Points">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mb-2">
                                            <label for=""  style="font-weight: bold;">Problem Solved:</label>
                                            <input type="text" name="lnumber[]" class="form-control" placeholder="Number of problems solved">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group mb-2">
                                            <br>
                                            <a href="javascript:void(0)" class="add-leetcode-form float-end btn btn-primary">ADD</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="paste-new-forms-leetcode"></div>


                        <br>
                        <div class="row">

                            <div class="main-form mt-2">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label for="" style="font-weight: bold;">Nptel Courses:</label>
                                            <input type="text" name="nptelcourses[]" class="form-control" placeholder="Enter course name">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group mb-2">
                                            <label for="" style="font-weight: bold;">Score:</label>
                                            <input type="number" name="nscore[]" class="form-control" placeholder="Enter score">
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-1">
                                        <div class="form-group mb-2">
                                            <br>
                                            <a href="javascript:void(0)" class="add-nptel-form float-end btn btn-primary">ADD</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="paste-new-forms-nptel"></div>



                        <div class="row">

                            <div class="main-form mt-2">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label for=""  style="font-weight: bold;">Professional Courses:</label>
                                            <input type="text" name="course[]" class="form-control" placeholder="Enter course name">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group mb-2">
                                            <label for="" style="font-weight: bold;">Result:</label>
                                            <input type="number" name="result[]" class="form-control" placeholder="Enter result">
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-1">
                                        <div class="form-group mb-2">
                                            <br>
                                            <a href="javascript:void(0)" class="add-professional-form float-end btn btn-primary">ADD</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="paste-new-forms-professional"></div>


                        <div class="row">
                            <br>

                        <div class="main-form mt-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label for=""style="font-weight: bold;">Project / Research paper:</label>
                                        <input type="text" name="project[]" class="form-control" placeholder="Enter project/research paper name">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group mb-2">
                                        <label for="" style="font-weight: bold;">Used Technology:</label>
                                        <input type="text" name="tech[]" class="form-control" placeholder="Enter used technology name">
                                    </div>
                                </div>
                            
                                <div class="col-md-1">
                                    <div class="form-group mb-2">
                                        <br>
                                        <a href="javascript:void(0)" class="add-research-form float-end btn btn-primary">ADD</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        
                        <div class="paste-new-forms-research"></div>                      
                        
                        <div class="row">
                        <div class="col-md-4 mt-2">
                            <div class="form-group ">
                                <label for="" style="font-weight: bold;">Github Details</label>
                            </div>
                        </div>
                      </div>
                     <div class="row">
                      <div class="col-md-3">
                            <div class="form-group mb-2">
                    <label for="" style="font-weight: bold;">Number of Projects:</label>
                    <input type="text" name="githubprojectrepo" class="form-control"
                        placeholder="Enter no of projects">
                </div>
            </div>
            

            <div class="col-md-3">
                <div class="form-group mb-2">
                    <label for="" style="font-weight: bold;">Total Contributions:</label>
                    <input type="text" name="contributions" class="form-control"
                        placeholder="Enter no of contributions">
                </div>
              </div>

            <div class="col-md-3">
                <div class="form-group mb-2">
                  <label for="" style="font-weight: bold;">Total stars earned:</label>
                    <input type="text" name="githubstars" class="form-control"
                        placeholder="Enter no of stars">
                      </div>
            </div>
        </div>        
      </div>
    </div>
  </div>
  </div>

        
        <script src="https://code.jquery.com/jquery-3.6.0.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
        
        <script>
    $(document).ready(function () {
      
      $(document).on('click', '.add-codechef-form', function () {
        addCodeChefForm();
      });
      
      $(document).on('click', '.add-hackerrank-form', function () {
        addHackerRankForm();
                    });
                    
                    $(document).on('click', '.add-leetcode-form', function () {
                      addLeetCodeForm();
                    });
                    
                    $(document).on('click', '.add-nptel-form', function () {
                        addNptelForm();
                    });

                    $(document).on('click', '.add-professional-form', function () {
                      addProfessionalForm();
                    });
                    
                    $(document).on('click', '.add-research-form', function () {
                      addProjectForm();
                    });
                    
                    function addHackerRankForm() {
    $('.paste-new-forms-hackerrank').append('<div class="row">\
        <div class="col-md-3">\
            <div class="form-group mb-2">\
                <select name="hlanguages[]" class="form-select"><option value="" disabled selected>Select</option><option value="C">C</option><option value="C++">C++</option><option value="Java">Java</option><option value="Python">Python</option></select>\
            </div>\
        </div>\
        <div class="col-md-2">\
            <div class="form-group mb-2">\
                <input type="text" name="hrank[]" class="form-control" placeholder="Enter Rank">\
            </div>\
        </div>\
        <div class="col-md-2">\
            <div class="form-group mb-2">\
                <input type="text" name="hpoint[]" class="form-control" placeholder="Enter Points">\
            </div>\
        </div>\
        <div class="col-md-3">\
            <div class="form-group mb-2">\
                <input type="text" name="hnumber[]" class="form-control" placeholder="Number of problems solved">\
            </div>\
        </div>\
        <div class="col-md-2">\
            <div class="form-group mb-2">\
                <button type="button" class="remove-btn btn btn-danger">Remove</button>\
            </div>\
        </div>\
    </div>');
  }
  
  function addCodeChefForm() {
    $('.paste-new-forms-codechef').append('<div class="row">\
        <div class="col-md-3">\
            <div class="form-group mb-2">\
                <select name="clanguages[]" class="form-select" required>\
                    <option value="" disabled selected>Select Language</option>\
                    <option value="C">C</option>\
                    <option value="C++">C++</option>\
                    <option value="Java">Java</option>\
                    <option value="Python">Python</option>\
                </select>\
            </div>\
        </div>\
        <div class="col-md-2">\
            <div class="form-group mb-2">\
                <input type="text" name="crank[]" class="form-control" placeholder="Enter Rank">\
            </div>\
        </div>\
        <div class="col-md-2">\
            <div class="form-group mb-2">\
                <input type="text" name="cpoint[]" class="form-control" placeholder="Enter Points">\
            </div>\
        </div>\
        <div class="col-md-3">\
            <div class="form-group mb-2">\
                <input type="text" name="cnumber[]" class="form-control" placeholder="Number of problems solved">\
            </div>\
        </div>\
        <div class="col-md-2">\
            <div class="form-group mb-2">\
                <button type="button" class="remove-btn btn btn-danger">Remove</button>\
            </div>\
        </div>\
    </div>');
  }
  
  function addLeetCodeForm() {
    $('.paste-new-forms-leetcode').append('<div class="row">\
        <div class="col-md-3">\
            <div class="form-group mb-2">\
                <select name="languages[]" class="form-select" required>\
                    <option value="" disabled selected>Select Language</option>\
                    <option value="C">C</option>\
                    <option value="C++">C++</option>\
                    <option value="Java">Java</option>\
                    <option value="Python">Python</option>\
                </select>\
            </div>\
        </div>\
        <div class="col-md-2">\
            <div class="form-group mb-2">\
                <input type="text" name="lrank[]" class="form-control" placeholder="Enter Rank">\
            </div>\
        </div>\
        <div class="col-md-2">\
            <div class="form-group mb-2">\
                <input type="text" name="lpoint[]" class="form-control" placeholder="Enter Points">\
            </div>\
        </div>\
        <div class="col-md-3">\
            <div class="form-group mb-2">\
                <input type="text" name="lnumber[]" class="form-control" placeholder="Number of problems solved">\
            </div>\
        </div>\
        <div class="col-md-2">\
            <div class="form-group mb-2">\
                <button type="button" class="remove-btn btn btn-danger">Remove</button>\
            </div>\
        </div>\
    </div>');
  }
        

        function addNptelForm() {
          $('.paste-new-forms-nptel').append('<div class="row">\
                <div class="col-md-4 ">\
                <div class="form-group mb-2">\
                        <input type="text" name="nptelcourses[]" class="form-control" required placeholder="Enter course">\
                        </div>\
                        </div>\
                        <div class="col-md-2">\
                        <div class="form-group mb-2">\
                        <input type="number" name="nscore[]" class="form-control" placeholder="Enter score">\
                        </div>\
                        </div>\
                        <div class="col-md-2">\
                        <div class="form-group mb-2">\
                        <button type="button" class="remove-btn btn btn-danger">Remove</button>\
                        </div>\
                </div>\
            </div>');
        }

        function addProfessionalForm() {
          $('.paste-new-forms-professional').append('<div class="row">\
                <div class="col-md-4 ">\
                    <div class="form-group mb-2">\
                        <input type="text" name="course[]" class="form-control" required placeholder="Enter course">\
                        </div>\
                        </div>\
                        <div class="col-md-2">\
                        <div class="form-group mb-2">\
                        <input type="number" name="result[]" class="form-control" placeholder="Enter result">\
                        </div>\
                        </div>\
                        <div class="col-md-2">\
                        <div class="form-group mb-2">\
                        <button type="button" class="remove-btn btn btn-danger">Remove</button>\
                        </div>\
                        </div>\
                        </div>');
        }
        
        function addProjectForm() {
                $('.paste-new-forms-research').append('<div class="row">\
                <div class="col-md-4 ">\
                <div class="form-group mb-2">\
                <input type="text" name="project[]" class="form-control" required placeholder="Enter project/research paper name">\
                </div>\
                </div>\
                <div class="col-md-2">\
                <div class="form-group mb-2">\
                <input type="text" name="tech[]" class="form-control" placeholder="Enter used technology name">\
                </div>\
                </div>\
                <div class="col-md-2">\
                <div class="form-group mb-2">\
                <button type="button" class="remove-btn btn btn-danger">Remove</button>\
                </div>\
                </div>\
                </div>');
        }
        
        $(document).on('click', '.remove-btn', function () {
            $(this).closest('.row').remove();
          });
        });
      </script>

<div class="container">
  <div class="col-md-12">
    <div class="card mt-4">
      <div class="card-header" style="color:white; background: linear-gradient(to bottom right, #5f9ea0,#30757a,#49767b);">
                            
      <h4 class="text-center">Technology Stand</h4>
                            
                          </div>
                          <div class="card-body">
                              
                              <div class="main-form mt-2">
                                <div class="row">
                                  
                                  <div class="col-md-3 ">
                                            <div class="form-group mb-2">
                                                <label for="" style="font-weight: bold;">Competavtive
                                                  Programming:</label>
                                                <select class="form-select" aria-label="Default select example"
                                                name="cp" required>
                                                    <option value="" disabled selected>Select your score out of 5
                                                      </option>
                                                      <option value="1">1</option>
                                                      <option value="2">2</option>
                                                      <option value="3">3</option>
                                                      <option value="4">4</option>
                                                    <option value="5">5</option>
                                                  </select>
                                            </div>
                                          </div>
                                          
                                          

                                          <div class="col-md-3">
                                            <div class="form-group mb-2">
                                              <label for="" style="font-weight: bold;">Web Development:</label>
                                              <select class="form-select" aria-label="Default select example"
                                              name="web" required>
                                              <option value="" disabled selected>Select your score out of 5
                                                </option>
                                                <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                              </div>
                                        </div>


                                        <div class="col-md-3">
                                          <div class="form-group mb-2">
                                            <label for="" style="font-weight: bold;">AI & ML</label>
                                                <select class="form-select" aria-label="Default select example"
                                                name="ai" required>
                                                <option value="" disabled selected>Select your score out of 5
                                                  </option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                  </select>
                                                </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group mb-2">
                                              <label for="" style="font-weight: bold;">Android Development</label>
                                              <select class="form-select" aria-label="Default select example"
                                              name="android" required>
                                              <option value="" disabled selected>Select your score out of 5
                                                </option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                  </select>
                                                </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                      <div class="col-md-3">
                                            <div class="form-group mb-2">
                                              <label for="" style="font-weight: bold;">Any other:</label>
                                                <input type="text" name="otherfield" class="form-control"
                                                    placeholder="Write any other fields" required>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                          <div class="form-group mb-2">
                                            <label for="" style="font-weight: bold;"></label>
                                            <select class="form-select" aria-label="Default select example"
                                                    name="any_score" required>
                                                    <option value="" disabled selected>Select your score out of 5
                                                      </option>
                                                      <option value="1">1</option>
                                                      <option value="2">2</option>
                                                      <option value="3">3</option>
                                                      <option value="4">4</option>
                                                      <option value="5">5</option>
                                                    </select>
                                            </div>
                                          </div>
                                    </div>

                                    
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group mb-2">
                                              <label for="" style="font-weight: bold;">Prefered Technology:</label>
                                              <input type="text" name="prefer" class="form-control"
                                              placeholder="Write your prefered technology" required>
                                            </div>
                                          </div>
                                        </div>
                                        
                                        <center>
                                        <div class="row">
                                        <div class="col-md-4 mx-auto">
                                         <div class="form-group mb-2">
                                          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                         </div>
                                        </div>
                                        </div>
                                        <center>
                                        
                                   </div>
                        </div>
                    </div>
                </div>
              </div>
</form>
</body>
</html>

<?php
include('insertstudentdetails.php');
?> 
