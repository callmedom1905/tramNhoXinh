<?php
class PostController{
    private $post;
    private $data;
    function __construct(){
        $this->post = new PostModel();
    }
    function renderView($view,$data){
        $view = 'app/view/'.$view.'.php';
        require_once $view;
    }
    function postView(){
        $this->data['post1'] = $this->post->laybaiviet();
        return $this->renderView('post',$this->data);
    }
    function postProBandana(){
        return $this->renderView('postProBandana');
    }
    function postProShoulderlen(){
        return $this->renderView('postProShoulderlen');
    }
}
?>