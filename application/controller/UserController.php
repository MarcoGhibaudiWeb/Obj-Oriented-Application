<?php


//use Opeldo\Core\Controller;
/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */

class UserController extends BaseController
{

    public function __construct()
    {
			$this->loadModel('UserModel');

	}
    
    
    public function index(){

        $pageTitle = "Login/Register";

        require APP . 'view/_templates/header.php';
        require APP . 'view/user/index.php';
        require APP . 'view/_templates/footer.php';
        

    }

    public function login(){

        $_POST['login']= TRUE;

        $user = $this->validation();

        if($user){

            $login = $this->model->login($user);


            if($login){

                if($this->startSession($login)){

                    $alert = "User logged in";

                    $this->sendAlert($alert);
                     
                    header ("location:".URL."home");
                
                } else {

                    session_start ();

                    $alert = "Something went wrong, try again";

                    $this->sendAlert($alert);
                    
                    header ("location:".URL."user"); ;

                }
        
             }else {

                session_start();
                
                $alert = "The details are not correct or this user is not registered yet";

                $this->sendAlert($alert);
            
                header ("location:".URL."user");
            }

        } else {

            session_start();
            
            $alert = "The details are not correct";

            $this->sendAlert($alert);
            
            header ("location:".URL."user");
        
        }
    
    }

    public function register(){
        
        $_POST['register']= TRUE;
        
        $user = $this->validation();
        
        if($user){
        
            $register = $this->model->register($user);
       
            if($register){

                $alert = "User Registered, try to log in";

                $this->sendAlert($alert);
                    
                header ("location:".URL."home");  

            } else {   
                
                $alert = "Something went wrong, try again";

                $this->sendAlert($alert);
                                
                header ("location:".URL."user"); ;
            }

        } else {
            
            $alert = "The details are not correct";
            
            $this->sendAlert($alert);
            
            header ("location:".URL."user");
        
        }
    }

    public function account($uID){

        $account=$this->model->account($uID);

        if($account){

            $pageTitle = "Your Account";
        
            require APP . 'view/_templates/header.php';
            require APP . 'view/user/account.php';
            require APP . 'view/_templates/footer.php';
        } else {

            $alert = "Something went wrong, log out, in and  try again";

            $this->sendAlert($alert);

            header ("location:".URL."error"); 

        }

    }

    public function logout(){

        session_start();

        if($this->terminateSession()){

        $alert = "User Logged out";

        $this->sendAlert($alert);

        header ("location:".URL."home");

        } else {

            echo  "Something went wrong, log out, in and  try again";

        }

    }

    public function validation(){
        
        $has_error = false;
        
        if(isset($_POST['login'])){
    
            if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                
                $has_error = true;
                                
            } else {
                                    
                $user['email'] = $_POST['email'];
            
            }
                    
            $user['password'] = trim($_POST['password']);
        
        }
    
        if(isset($_POST['register'])){			
            
            $user['fName'] = $_POST['firstname'];
            
            $user['lName'] = $_POST['lastname'];
            
        
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                    
            $has_error = true;
                      
        } else {
                        
            $user['email'] = $_POST['email'];
                    
        }
        
        $user['password'] = trim($_POST['password']);
        
        
        if($_POST['password'] <> $_POST['re-password']){
                
            $has_error = true;}
        
        }
    
        if(!$has_error){
                    
            return $user;
        
        }
        
    }	

}
