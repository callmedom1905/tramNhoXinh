<?php 
class PaymentController{

    function renderView($view){
        $view = 'app/view/'.$view.'.php';
        require_once $view;
    }
    function viewPayment(){
        return $this->renderView('payment');
    }
}