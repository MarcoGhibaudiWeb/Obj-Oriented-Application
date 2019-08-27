<?php

class ShopController extends BaseController
{
 
    public function __construct()
    {
			$this->loadModel('ShopModel');

    }
    
    public function cart($uID){
        
        $cart = $this->model->displayCart($uID);
   
        $pageTitle = "Cart";

        require APP . 'view/_templates/header.php';
        require APP . 'view/shop/index.php';
        require APP . 'view/_templates/footer.php';
                
    }
    
    public function addCart($pID,$uID){

        $qt = $_POST['qt'];

        $cart = $this->model->addCart($pID,$uID,$qt);
        
        if($cart) {

            $alert = "Ticket added to cart";

            $this->sendAlert($alert);

        } else {

            $alert = "Something went wrong, try again";

            $this->sendAlert($alert);

        }

        header ("location:".URL."home/event/".$pID);
      


    }

   
    public function deleteCart($pID,$uID){
                
        $delete = $this->model->deleteCart($pID,$uID);

        if($delete){

            $alert = "The item has been deleted";

            $this->sendAlert($alert);

        } else {

            $alert = "Something went wrong, try again";

            $this->sendAlert($alert);
        }

        header("Location:".URL."shop/cart/".$uID);
    }


    public function addOrder($uID){

        $cart = $this->model->displayCart($uID);

        if($cart){

            if($this->model->addOrder($uID,$cart)){

                $alert = "Item(s) purchased and inserted in orders";

                $this->sendAlert($alert);

               header("Location:".URL."shop/orders/".$uID);

            } else {
                
                $alert = "Something went wrong, try again";

                $this->sendAlert($alert);

                header("Location:".URL."shop/cart".$uID);

            }

        } else {
            
            $alert = "Something went wrong, try again";

            $this->sendAlert($alert);
                    
            header("Location:".URL."shop/cart".$uID);
        }

        
    }

    public function orders($uID){

        $orders = $this->model->getOrders($uID);

        $pageTitle = "Orders"; 
        
                    require APP . 'view/_templates/header.php';
                    require APP . 'view/shop/orders.php';
                    require APP . 'view/_templates/footer.php';

    }

    public function order($oID){
        
        $order = $this->model->getOrder($oID);
        
        if($order){

            $pageTitle = "Your Order"; 
        
            require APP . 'view/_templates/header.php';
            require APP . 'view/shop/order.php';
            require APP . 'view/_templates/footer.php';
        
        } else {

            $alert = "Something went wrong, try again";

            $this->sendAlert($alert);

            header("Location:".URL."home");
                     
        }
        
                 
    }
    
}
