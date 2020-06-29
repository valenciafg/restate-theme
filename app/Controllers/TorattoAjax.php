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
        wp_send_json($response);
    }

    function toratto_contact_form() {
        parse_str($_POST['form'], $form);
        $fullname = $form['fullname'];
        $phone = $form['phone'];
        $email = $form['email'];
        $description = $form['description'];
        $project_id = $form['project_id'];
        $projectObj = new Project();
        $project = $projectObj->getSingleProject($project_id);
        //
        $settingObj = new Setting();
        $setting = $settingObj->getAllSettings();

        if (!empty($setting['email'])) {
            $to = $setting['email'];
        } else {
            $to = "info@grupotoratto.com";
        }
        $headers = array(
            'Content-Type: text/html; charset=UTF-8',
            'Cc: '.$email
        );

        $subject = "Contacto: ".$$project['title'];
        $body = "<h1>Solicitud de información</h1><br>";
        $body .= "<strong>Nombres:</strong>".$fullname."<br>";
        $body .= "<strong>Télefono:</strong>".$phone."<br>";
        $body .= "<strong>Correo:</strong>".$email."<br>";
        $body .= "<strong>Mensaje:</strong>".$description."<br>";
        $body .= "<strong>Proyecto:</strong>".$project['title']."<br>";


        if( wp_mail( $to, $subject , $body, $headers) === FALSE){
            $response = array(
                'status'    => 'error'
            );
        }else{
            $response = array(
                'status' => 'ok'
            );
        }
        wp_send_json($response);
    }

    function toratto_land_purchase_form() {
        parse_str($_POST['form'], $form);
        //OWNER INFO
        $owner_name = $form['owner_name'];
        $owner_lastname = $form['owner_lastname'];
        $owner_phone = $form['owner_phone'];
        $owner_email = $form['owner_email'];
        $owner_address = $form['owner_address'];
        //LAND INFO
        $land_deparment = $form['land_deparment'];
        $land_province = $form['land_province'];
        $land_district = $form['land_district'];
        $land_address = $form['land_address'];
        $land_area = $form['land_area'];
        $land_measure = $form['land_measure'];
        $land_currency = $form['land_currency'];
        $land_price = $form['land_price'];
        $photo_id = $form['media-ids'];
        // $land_area = $form['land_area'];
        //
        $settingObj = new Setting();
        $setting = $settingObj->getAllSettings();

        if (!empty($setting['email'])) {
            $to = $setting['email'];
        } else {
            $to = "info@grupotoratto.com";
        }
        $headers = array(
            'Content-Type: text/html; charset=UTF-8',
            'Cc: '.$owner_email
        );

        $subject = "Compra de terreno: ".$$project['title'];
        $body = "<h2>Datos del propietario</h2>";
        $body .= "<strong>Nombres:</strong>".$owner_name." ".$owner_lastname."<br>";
        $body .= "<strong>Télefono:</strong>".$owner_phone."<br>";
        $body .= "<strong>Correo:</strong>".$owner_email."<br>";
        $body .= "<strong>Dirección:</strong>".$owner_address."<br>";
        $body .= "<h2>Datos del terreno</h2>";
        $body .= "<strong>Departamento:</strong>".$land_deparment."<br>";
        $body .= "<strong>Provincia:</strong>".$land_province."<br>";
        $body .= "<strong>Distrito:</strong>".$land_district."<br>";
        $body .= "<strong>Dirección:</strong>".$land_address."<br>";
        $body .= "<strong>Área total:</strong>".$land_area."<br>";
        $body .= "<strong>Medidas perimetrales:</strong>".$land_measure."<br>";
        $body .= "<strong>Tipo de moneda:</strong>".$land_currency."<br>";
        $body .= "<strong>Precio:</strong>".$land_price."<br>";

        $attachments = array();
        if (!empty($photo_id)) {
            $attachments = array(
                get_attached_file($photo_id)
            );
        }


        if( wp_mail( $to, $subject , $body, $headers, $attachments) === FALSE){
            $response = array(
                'status'    => 'error',
                'attachments' => $attachments
            );
        }else{
            $response = array(
                'status' => 'ok'
            );
        }
        wp_send_json($response);
    }

    function handle_dropped_media() {
        status_header(200);

        $upload_dir = wp_upload_dir();
        $upload_path = $upload_dir['path'] . DIRECTORY_SEPARATOR;
        $num_files = count($_FILES['file']['tmp_name']);

        $newupload = 0;

        if ( !empty($_FILES) ) {
            $files = $_FILES;
            foreach($files as $file) {
                $newfile = array (
                        'name' => $file['name'],
                        'type' => $file['type'],
                        'tmp_name' => $file['tmp_name'],
                        'error' => $file['error'],
                        'size' => $file['size']
                );

                $_FILES = array('upload'=>$newfile);
                foreach($_FILES as $file => $array) {
                    $newupload = media_handle_upload( $file, 0 );
                }
            }
        }

        echo $newupload;
        die();
    }

    function handle_deleted_media(){

        if( isset($_REQUEST['media_id']) ){
            $post_id = absint( $_REQUEST['media_id'] );

            $status = wp_delete_attachment($post_id, true);

            if( $status )
                echo json_encode(array('status' => 'OK'));
            else
                echo json_encode(array('status' => 'FAILED'));
        }

        die();
    }
}
