<?php
$title = "Check Code";
include_once "layouts/header.php";
include_once "app/models/User.php";
if($_POST){
    $errors=[];
    if(empty($_POST['code'])){
        $errors['required']="<div class='alert alert-danger'>Required</div>";
    }
    else{
        if(strlen($_POST['code'])!=5)
        $errors['length']="<div class='alert alert-danger'>Code must be 5 digits</div>";
    } 
    if(empty($errors)){
        $userObject = new User();
        $userObject->setCode($_POST['code']);
        $userObject->setEmail($_GET['email']);
        $result=$userObject->verify();
        if($result){
            $userObject->setStatus(1);
            date_default_timezone_set('africa/cairo');
            $userObject->setEmail_verified_at(date('Y-m-d H:i:s'));
            $updateResult=$userObject->makeUserVerified();
            if($updateResult){
                header('Location: login.php');
            }
            else {
                $errors="<div class='alert alert-danger'>Something Went Wrong</div>";
            }

        }
        else {
            $errors['code']="<div class='alert alert-danger'>Invalid Code</div>";
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
                                        <form  method="post">
                                            <input type="number" min="10000" max="99999" name="code" placeholder="Enter Your Verification Code ">
                                            <?php if(!empty($errors)){
                                                foreach ($errors as $key => $value) {
                                                    echo $value;
                                                }
                                            } ?>
                                            <div class="button-box">
                                                <button type="submit"><span><?= $title ?></span></button>
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
       