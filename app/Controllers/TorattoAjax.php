<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use WP_Query;

class TorattoAjax extends Controller
{
    function toratto_quotation_form() {
        $headers = array('Content-Type: text/html; charset=UTF-8');
        //
        parse_str($_POST['form'], $form);
        $model = $form['toratto-quotation-form-model'];
        $fullname = $form['fullname'];
        $phone = $form['phone'];
        $email = $form['email'];
        $message = $form['message'];
        $project_id = $form['project_id'];
        //
        $projectObj = new  App\Controllers\Project();
        $project = $projectObj->getSingleProject($project_id);
        //
        $to = "valencia6x@gmail.com";
        $subject = "Cotización ".$model;
        $body = "<h1>Cotización de departamento</h1><br>";
        $body .= "<strong>Nombres:</strong>".$fullname."<br>";
        $body .= "<strong>Télefono:</strong>".$phone."<br>";
        $body .= "<strong>Correo:</strong>".$email."<br>";
        $body .= "<strong>Mensaje:</strong>".$message."<br>";
        $body .= "<strong>Proyecto:</strong>".$project['title']."<br>";
        $body .= "<strong>Departamento:</strong>".$model."<br>";


        if( wp_mail( $to, $subject , $body, $headers) === FALSE){
            wp_send_json('Error');
        }else{
            wp_send_json('retorno ajax correcto ');
        }
        // wp_send_json('retorno ajax correcto '.json_encode($form));
    }
}
