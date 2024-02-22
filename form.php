<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/32e0d6aa8f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="nav.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Career Counselling Form - Career Counselling Analyzer</title>
</head>
<body>
      

<nav>

    <a href="#" class="left">Home</a>
    <a href="update.php" class="left">Update</a>
</nav>

<form action="#" method="POST">
<div class="container" >
        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-header" style="color:white; background-color:black;" >
                    <center><h4>Personal Information</h4></center>
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
                                        <label for=""  style="font-weight: bold;">ID Number:</label>
                                                  <input type="text" name="idnumber" class="form-control" placeholder="" required>
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
                <div class="card-header" style="color:white; background-color:black;" >
                    <center><h4>Academic Information</h4></center>
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
                <div class="card-header" style="color:white; background-color:black;" >
                    <center><h4>Career option</h4></center>
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
                <div class="card-header" style="background-color:black; color:white;" >
                    <center><h4>Technical Profile</h4></center>
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
                                        <input type="text" name="hlanguages[]" class="form-control" placeholder="Enter language">
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
                                            <input type="text" name="clanguages[]" class="form-control" placeholder="Enter language">
                                        </div>
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
                                            <label for="" style="font-weight: bold;">Languages:</label>
                                            <input type="text" name="languages[]" class="form-control" placeholder="Enter language">
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
                <div class="col-md-3 ">\
                    <div class="form-group mb-2">\
                        <input type="text" name="hlanguages[]" class="form-control" required placeholder="Enter language">\
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
                <div class="col-md-3 ">\
                <div class="form-group mb-2">\
                    <input type="text" name="clanguages[]" class="form-control" required placeholder="Enter language">\
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
                <div class="col-md-3 ">\
                    <div class="form-group mb-2">\
                    <input type="text" name="languages[]" class="form-control" required placeholder="Enter language">\
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
      <div class="card-header" style="color:white; background-color:black;">
                            <center>
                              <h4>Technology Stand</h4>
                            </center>
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

<?php
include('insertstudentdetails.php');
?> 