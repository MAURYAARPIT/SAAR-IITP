<?php
    session_start();
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"]==false)
    {
        header("location: signin.php");
    }
    if($_SESSION['ybk__submitted']){
        header("location: ybkSubmitted.php");
    }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Yearbook Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/team.css">
    <link rel="stylesheet" type="text/css" href="css/templatemo-style.css">

    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://rawgit.com/LeshikJanz/libraries/master/Bootstrap/baguetteBox.min.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
    <!-- //web font -->


    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/fontAwesome.css">
    <link rel="stylesheet" href="css/light-box.css">
    <link rel="stylesheet" href="css/timeline.css">
    <link rel="stylesheet" href="css/owl-carousel.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">


    <link type="text/css" rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
    <script type="text/javascript" src="//connect.facebook.net/en_US/all.js#xfbml=1&appId=224254148413683" id="facebook-jssdk"></script>
    <script src='https://code.jquery.com/jquery-2.2.0.min.js'></script>
    <script src="./js/forms.js"></script>

    <style>
        .section-heading h1 {
            display: block !important;
            margin-right: 0px;
        }

        .section-heading h1 span {
            font-size: 50px;
            background: #E4F9FF;
            text-align: center;
            padding: 8px 12px;
        }

        @media screen and (max-width:695px) {
            .section-heading h1 span {
                font-size: 32px;
            }
        }

        @media screen and (max-width:477px) {
            .section-heading h1 span {
                font-size: 24px;
            }
        }

        body {
            background: #EEFBFF;
            background: url('img/bggg.png');
            background-size: cover;
            font-family: 'Montserrat'Semibold;
        }

        .label_style {
            text-align: left;
            margin-bottom: 10px;
            text-transform: uppercase;
        }
    </style>
</head>

<body>
    <!-- main -->
    <div class="main-w3layouts wrapper">
        <h1><span style="font-size: 50px;"><em>Yearbook</em></span></h1>
        <h2><span style="font-size: 30px;"><em>Registration Form</em></span></h2>
        <div class="main-agileinfo">
            <div class="agileits-top">
                <form method="post" enctype="multipart/form-data" action="yearbookFormAction.php" id="custom-form">
                    <div class="label_style">First Name *</div>
                    <input id="fname" class="text" type="text" name="fname" value="<?php echo $_SESSION["fname"]; ?>" disabled required>
                    <div class="label_style">Last Name *</div>
                    <input id="lname" class="text" type="text" name="lname" value="<?php echo $_SESSION["lname"]; ?>" disabled required>
                    
                    <div class="label_style">Institute Roll Number *</div>
					<input id="college_id" class="text" type="text" name="roll_no" value="<?php echo $_SESSION["cid"]; ?>" disabled required>
                    
                    <div class="label_style">Email Address *</div>
                    <input id="email" class="text email" type="email" name="email" required>
                    <div class="label_style">Contact Number (with caller prefix, eg. +91) *</div>
                    <input class="text" type="tel" name="contact" maxlength="13" required>

                    <div class="label_style">Graduation year *</div>
                    <select type="text" name="passingyear" required class="ui search selection dropdown">
                        <option value="" selected disabled>Graduation Year</option>
                        <?php for ($i = 2010; $i <= 2024; $i++) : ?>
                            <option
                                value="<?php echo $i; ?>"
                                <?php if($i == $_SESSION["graduation"]){ echo "selected"; } ?>
                            >
                                <?php echo $i; ?>
                            </option>
                        <?php endfor; ?>
                    </select>

                    <div class="label_style">Department *</div> 
                    <select type="text" id="branch" name="dept" required class="ui search selection   dropdown">
                        <option value="" selected disabled>Department</option>
                        <option value="Computer Science and Engineering">Computer Science and Engineering</option>
                        <option value="Electrical Engineering">Electrical Engineering</option>
                        <option value="Mechanical Engineering">Mechanical Engineering</option>
                        <option value="Civil Engineering">Civil Engineering</option>
                        <option value="Chemical and Biochemical Engineering">Chemical and Biochemical Engineering</option>
                        <option value="Physics">Physics</option>
                        <option value="Mathematics">Mathematics</option>
                        <option value="Chemistry">Chemistry</option>
                        <option value="Humanities and Social Sciences">Humanities and Social Sciences</option>
                        <option value="other">Other</option>
                    </select>

                    <div class="label_style">Department (if selected Other) *</div>
                    <input id="branch_other" class="text" type="text" name="dept_other" value="-" required>
                    
                    <div class="label_style">Portrait Picture *</div>
                    <input type="file" name="portrait_pic" id="portrait-pic-actual-btn" class="actual-btn" accept="image/*" required/>
                    <div class="choose-file-wrapper">
                        <label for="portrait-pic-actual-btn" class="choose-file-button" style="width: 40%; font-size:10px;">Choose File</label>
                        <span class="file-chosen" style="font-family:inherit;">No file chosen</span>
                    </div>

                    <div class="label_style">Quote *</div>
                    <textarea type="text" name="quote" style="height: 75px;" required></textarea>

                    <div class="label_style">Group Pictures</div>
                    <input type="file" name="group_pic[]" id="group-pic-actual-btn" class="actual-btn" accept="image/*" multiple/>
                    <div class="choose-file-wrapper">
                        <label for="group-pic-actual-btn" class="choose-file-button" style="width: 40%; font-size:10px;">Choose File</label>
                        <span class="file-chosen" style="font-family:inherit;">No file chosen</span>
                    </div>

                    <div class="label_style">Any Comments</div>
                    <textarea type="text" name="comments" style="height: 75px;">-</textarea>

                    <input type="submit" value="SUBMIT">
                </form>
                <a href="./portal.php"><button style="font-size: .9em;
                    color: #fff;
                    background: #003C4D;
                    outline: none;
                    border: 1px solid #003C4D;
                    cursor: pointer;
                    padding: 0.9em;
                    -webkit-appearance: none;
                    width: 100%;
                    margin: 2em 0;
                    letter-spacing: 4px;">BACK</button></a>
            </div>
        </div>
        <section id="contact" class="content-section">
            <div id="con">
                <div class="col-md-4">
                    <div class="teext" style=" display: inline-block;">
                        <h1 style="color: white;font-size: 24px;font-family: inherit;font-weight: 500">Quick <span>Links</span></h1><br>
                        <p> <a style="text-decoration:none; color:#fff" href="https://www.iitp.ac.in/">IIT Patna</a><br>
                            <a style="text-decoration:none; color:#fff" href="https://www.iitp.ac.in/alumni/">ITPAA</a><br>
                            <a style="text-decoration:none; color:#fff" href="#">Reach Us</a><br>
                            <a style="text-decoration:none; color:#fff" href="#">Terms of Use</a><br>
                            <a style="text-decoration:none; color:#fff" href="#">Privacy Policy</a>
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="teext" style=" display: inline-block;">
                        <h1 style="color: white;font-size: 24px;font-family: inherit;font-weight: 500">Social <span> Media</span></h1><br>
                        <p> <a style="text-decoration:none; color:#fff" href="https://www.facebook.com/saar.iitp/"><i class="fab fa-facebook-square" aria-hidden="true" style="font-size: 18px; color: #26C1ED; margin-right: 14px;"></i>Facebook</a><br>
                            <a style="text-decoration:none; color:#fff" href="https://www.instagram.com/saar.iitp"><i class="fab fa-instagram" aria-hidden="true" style="font-size: 20px; color: #26C1ED; margin-right: 14px;"></i>Instagram</a><br>
                            <a style="text-decoration:none; color:#fff" href="https://www.linkedin.com/company/saar-iitp"><i class="fab fa-linkedin" aria-hidden="true" style="font-size: 20px; color: #26C1ED; margin-right: 14px;"></i>LinkedIn</a><br>
                            <a style="text-decoration:none; color:#fff" href="https://www.twitter.com/saar_iitp"><i class="fab fa-twitter" aria-hidden="true" style="font-size: 20px; color: #26C1ED; margin-right: 14px;"></i>Twitter</a><br>
                            <a style="text-decoration:none; color:#fff" href="https://www.youtube.com/channel/UCoAb1YggffbfgVxQyXaZB-g"><i class="fab fa-youtube" aria-hidden="true" style="font-size: 20px; color: #26C1ED; margin-right: 14px;"></i>Youtube</a>
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="teext" style=" display: inline-block;">
                        <h1 style="color: white;font-size: 24px;font-family: inherit;font-weight: 500">Contact <span> Us</span></h1><br>
                        <p> Office of A Dean Resource<br>
                            Administrative Building, IIT Patna<br><br>
                            Prof. In-charge:<br>
                            Dr. Anirban Chowdhary<br>
                            Email - pic_alumni@iitp.ac.in<br><br>
                            General Secretary:<br>
                            <a href="#" style="color: #fff">Gaurav Pratap Singh</a><br>
                            Email - 1801ee63@iitp.ac.in
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="footer" style="background: #232323;">
            <p>|| Copyright || &copy; IIT Patna SAAR Team ||</p>
        </section>
        <ul class="colorlib-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
    <!-- //main -->
    <!-- <script>
function loged()
            {
                console.log("Facebook connection established....");
                logins();
            }
              function logins(){  FB.login(function(response) {
                console.log('Welcome!  Fetching your information.... ');
                if (response.authResponse) {
                 console.log('Welcome!  Fetching your information.... ');
                 FB.api('/me', {fields: 'first_name,last_name,email'
             },function(response) {
                    console.log("done");
                   document.getElementById("fname").value = response.first_name;
                   document.getElementById("lname").value = response.last_name;
                   document.getElementById("email").value = response.email;
                 });
                } else {
                 alert('An error occured. Please try again later.');
                }
            },{scope: "email"});}
            function alertemail()
            {
                console.log("done");
                alert("Email Id used is already registered.")
            }
            function alertroll()
            {
                console.log("done");
                alert("Roll No. used is already registered.")
            }
            function alertboth()
            {
                console.log("working");
                alert("Email Id and Roll No. used is already registered.")
            }
window.onload = function(){
        <?php
        //echo 'console.log('.$_GET["type"].');';
        //    if($_GET["type"] && strcmp($_GET["type"],'fblogin')==0)
        //    {
        //     echo 'setTimeout("loged()", 3000);console.log("pp");' ; 
        //    }
        //     if(isset($_SESSION['rolldup']) && $_SESSION['rolldup'] == true && isset($_SESSION['emaildup']) && $_SESSION['emaildup'] == true)
        //     {

        //         echo 'setTimeout("alertboth()", 1000); console.log("working");';
        //         $_SESSION['rolldup']=false;
        //         $_SESSION['emaildup']=false;   
        //         unset($_SESSION['emaildup']);
        //         unset($_SESSION['rolldup']);
        //     }
        //     else if(isset($_SESSION['emaildup']) && $_SESSION['emaildup'] == true)
        //     {

        //         echo 'setTimeout("alertemail()", 1000); console.log("working");';
        //         $_SESSION['emaildup']=false;
        //         unset($_SESSION['emaildup']);   
        //     }
        //     else if(isset($_SESSION['rolldup']) && $_SESSION['rolldup'] == true)
        //     {

        //         echo 'setTimeout("alertroll()", 1000); console.log("working");  ';
        //         $_SESSION['rolldup']=false;
        //         unset($_SESSION['rolldup']);   
        //     }
        ?>
}
</script> -->
</body>

</html>