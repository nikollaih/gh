<?php
    if(!function_exists('logged_user'))
    {
        function logged_user(){
            $CI = &get_instance();
            $CI->load->library('session');
            return $CI->session->userdata('userdata');
        }
    
    }

    if(!function_exists('is_logged'))
    {
        function is_logged($return = false, $redirect = true){
            $CI = &get_instance();
            $CI->load->library('session');
            if ($CI->session->userdata('userdata')){
                if($return)return true;
                else if ($redirect) header("Location:".base_url());
            }
            else{
                if($return) return false;
                else if($redirect) header("Location:".base_url()."Users/login");
            }
        }
    }
?>