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

class HomeController extends BaseController
{

    public $alert ='';
    
    public function __construct()
    {
			$this->loadModel('HomeModel');

	}
    
    
    
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    
    public function index()
    {
        
        $pageTitle = 'Wax';

        $events = $this->model->getAllEvents();
        
        if($events){

            $pageTitle = 'All Events';

            require APP . 'view/_templates/header.php';
            require APP . 'view/event/index.php';
            require APP . 'view/_templates/footer.php';

        } else {
            
            $pageTitle = "Unknown";
            header ("location:".URL."error");

        }

    }



    public function event($pId){

         $event = $this->model->getEvent($pId);

         if($event){

             $pageTitle = $event['title']; 

             require APP . 'view/_templates/header.php';
             require APP . 'view/event/event.php';
             require APP . 'view/_templates/footer.php';

         } else {

            $alert = "This event is not anymore available";

            $this->sendAlert($alert);

             header("Location:".URL."home");
             
         }

        

    }

    public function cities(){
        
                
        $pageTitle = "Cities"; 
        
         require APP . 'view/_templates/header.php';
         require APP . 'view/event/cities.php';
         require APP . 'view/_templates/footer.php';
        
    }

     public function city($city){

        $events = $this->model->getEventByCity($city);

        if($events){

            foreach($events as $event) :
                    
                $city= $event->city;

            endforeach;
         
        $pageTitle = $city; 

        require APP . 'view/_templates/header.php';
        require APP . 'view/event/city.php';
        require APP . 'view/_templates/footer.php';

        } else {

            $alert = "This page doesnt exist anymore";

            $this->sendAlert($alert);

            header("Location:".URL."home/cities");
             
        }
    }
}
