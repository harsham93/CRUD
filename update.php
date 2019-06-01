<?php
$link = mysqli_connect("127.0.0.1", "root", "", "form");
$email = $subject = $content = "";
$email_err = $subject_err = $content_err = "";

// Processing form data when form is submitted
if(isset($_POST["Id"]) && !empty($_POST["Id"])){
    // Get hidden input value
    $Id = $_POST["Id"];
    
    // Validate name
    $emailId = trim($_POST["emailId"]);
    if(empty($emailId)){
        $email= "Please enter a name.";
    } else{
        $email = $emailId;
    }
    
    // Validate address address
    $subjectfield = trim($_POST["subjectfield"]);
    if(empty($subjectfield)){
        $subject_err = "Please enter a subject.";     
    } else{
        $subject = $subjectfield;
    }
    
    // Validate salary
    $contentfield = trim($_POST["contentfield"]);
    if(empty($contentfield)){
        $content_err = "Please enter the salary amount.";     
    } else{
        $content = $contentfield;
    }
    
    // Check input errors before inserting in database
    if(empty($email_err) && empty($subject_err) && empty($content_err)){
        // Prepare an update statement
        $sql = "UPDATE form SET Email=?, Subject=?, Text=? WHERE Id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $param_email, $param_subject, $param_content, $param_Id);
            
            // Set parameters
            $param_email = $email;
            $param_subject = $subject;
            $param_content = $content;
            $param_Id = $Id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["Id"]) && !empty(trim($_GET["Id"]))){
        // Get URL parameter
        $Id =  trim($_GET["Id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM employees WHERE Id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_Id);
            
            // Set parameters
            $param_Id = $Id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $email = $row["Email"];
                    $subject = $row["Subject"];
                    $content = $row["Text"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        
        
        // Close statement
        mysqli_stmt_close($link);
        
        // Close connection
        mysqli_close($link);
        }  }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="emailId" class="form-control" value="<?php echo $email; ?>">
                            <span class="help-block"><?php echo $email_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($subject_err)) ? 'has-error' : ''; ?>">
                            <label>Address</label>
                            <input type="subject" class="form-control" name="subjectfield" id="subject" name="subject" value="<?php echo $subject; ?>">
                            
                            <span class="help-block"><?php echo $subject_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($content_err)) ? 'has-error' : ''; ?>">
                            <label>Salary</label>
                            <textarea class="form-control" id="content" name="contentfield" rows="3" name="text"><?php echo $content; ?></textarea>
                           
                            <span class="help-block"><?php echo $content_err;?></span>
                        </div>
                        <input type="hidden" name="Id" value="<?php echo $Id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>



