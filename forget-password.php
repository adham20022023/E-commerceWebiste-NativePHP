<?php
    $title = "Forget Password";
    include_once "layouts/header.php";
    include_once "app/models/User.php";
    include_once "app/requests/Validation.php";
    include_once "services/mail.php";
    if($_POST){
        //validation

        // validation
        // email => required , regex ,
        $errors = [];
        $emailValidation = new Validation('email',$_POST['email']);
        $emailRequriedResult = $emailValidation->required();
        if(empty($emailRequriedResult)){
            $emailPattern = "/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/";
            $emailRegExResult  = $emailValidation->regex($emailPattern);
            if(!empty($emailRegExResult)){
                $errors['email-regex'] = $emailRegExResult;
            }
        }else{
            $errors['email-required'] = $emailRequriedResult;
        }
        //search on email in db
        //if not exists => error
        //if exists  => generate code header check code

    if(empty($errors)){
        $userObject = new User;
        $userObject->setEmail($_POST['email']);
        $result= $userObject->getUserByEmail();
        if($result){
            //correct email if exists => genrate code , save code , send code header check code
            $code=rand(10000,99999);
            $userObject->setCode($code);
            $updateresult=$userObject->updateCodeByEmail();
            if($updateresult){
                $subject="Forget Password Code";
                $body="Your verification code is $code";
                $mail =new mail($_POST['email'],$subject,$body);
                $emailresult=$mail->send();
                if($emailresult){
                
                    header('Location: verify.php?email='.$_POST['email'].'&page=forget');
                }
                else { 
                    $errors['someting-wrong']="Something went wrong";
                }
        }
            }

        else {
            $errors['email-not-exists'] = "Email Not Exists";
        }
    }
    }
 ?>
    <div class="login-register-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                    <div class="login-register-wrapper">
                        <div class="login-register-tab-list nav">
                            <a class="active" data-toggle="tab" href="#lg1">
                                <h4> <?= $title ?> </h4>
                            </a>
                        </div>
                        <div class="tab-content">
                            <div id="lg1" class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form method="post">
                                            <input  type="email" name="email" placeholder="Enter Your Email Address">
                                            <?php
                                                if(!empty($errors)){
                                                    foreach ($errors as $key => $value) {
                                                        echo "<div class='alert alert-danger'>$value</div>";
                                                    }
                                                }
                                             ?>
                                            <div class="button-box">
                                                <button type="submit"><span>Verify Email Address</span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 

include_once "layouts/footer-scripts.php";
?>
       