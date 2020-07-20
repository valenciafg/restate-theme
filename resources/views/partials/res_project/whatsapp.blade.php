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
$message = "Hola, soy ".$fullname." seré su ".$advisor_text.". ".$advisor_email;
$client_message = "Hola, me interesa el proyecto ".$project['title'];
@endphp
{{-- <div class="toratto-whatsapp-button" data-phone="{{$number}}" data-popup-message="{{$message}}" data-message="{{$client_message}}"></div> --}}
<div class="wrapper-whatsapp">
  <div class="icon-wrapper-whatsapp">
    <a href="https://wa.me/{{$number}}?text={{$client_message}}" target="_blank"><i class="fab fa-whatsapp"></i></a>
  </div>
</div>
<div class="wrapper-call">
  <div class="icon-wrapper-call">
    <a href="#" class="toratto-call"><i class="fas fa-phone"></i></a>
  </div>
  <div class="icon-wrapper-hangup" style="display: none">
    <a href="#" class="toratto-hangup"><i class="fas fa-phone-slash"></i></a>
  </div>
</div>

@endif
<audio id="remoteAudio" controls>
  <p>Your browser doesn't support HTML5 audio.</p>
</audio>
