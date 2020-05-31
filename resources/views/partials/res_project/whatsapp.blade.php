@php
    $fullname = $project['advisor_fullname'];
    $number = $project['advisor_ws_number'];    
    $email = $project['advisor_email'];
    $gender = $project['advisor_gender'];
@endphp
@if (!empty($fullname) && !empty($number))
@php 
$number = str_replace("(", "", $number);
$number = str_replace(")", "", $number);
$number = str_replace(" ", "", $number);
$number = str_replace("+", "", $number);
$advisor_text = "asesor";
if(!empty($gender) && $gender === "female") {
    $advisor_text = "asesora";
}
$advisor_email = "";
if(!empty($email)) {
    $advisor_email = "También puede escribirme a mi correo electrónico ".$email.".";
}
$message = "Hola, soy tal ".$fullname." seré tu ".$advisor_text.". ".$advisor_email;
$client_message = "Hola, me interesa el proyecto ".$project['title'];
@endphp
<div class="toratto-whatsapp-button" data-phone="{{$number}}" data-popup-message="{{$message}}" data-message="{{$client_message}}"></div>
@endif