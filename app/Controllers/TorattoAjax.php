<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use WP_Query;

class TorattoAjax extends Controller
{
    function toratto_quotation_form() {
        //
        parse_str($_POST['form'], $form);
        $model_name = $form['toratto-quotation-form-model'];
        $fullname = $form['fullname'];
        $phone = $form['phone'];
        $email = $form['email'];
        $message = $form['message'];
        $project_id = $form['project_id'];
        //
        $projectObj = new Project();
        $project = $projectObj->getSingleProject($project_id);
        $models = $project['models'];
        $rooms = "";
        foreach ($models as $model) {
            if ($model_name == $model['name']) {
                $rooms = ". ".$model['room_number']." dormitorios";
                $area = ". ".$model['total_area']."m2";
                break;
            }
        }
        //
        if (!empty($project['advisor_email'])) {
            $to = $project['advisor_email'];
        } else {
            $to = "info@grupotoratto.com";
        }
        $headers = array(
            'Content-Type: text/html; charset=UTF-8',
            'Cc: '.$email
        );
        $subject = "Cotización ".$model_name;
        $body = "<h1>Cotización de departamento</h1><br>";
        $body .= "<strong>Nombres:</strong>".$fullname."<br>";
        $body .= "<strong>Télefono:</strong>".$phone."<br>";
        $body .= "<strong>Correo:</strong>".$email."<br>";
        $body .= "<strong>Mensaje:</strong>".$message."<br>";
        $body .= "<strong>Proyecto:</strong>".$project['title']."<br>";
        $body .= "<strong>Departamento:</strong>".$model_name.$rooms.$area."<br>";


        if( wp_mail( $to, $subject , $body, $headers) === FALSE){
            $response = array(
                'status'    => 'error'
            );
        }else{
            $response = array(
                'status' => 'ok'
            );
        }
        wp_send_json(json_encode($response));
    }
}
