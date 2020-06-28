@php
  $settings = new  App\Controllers\Setting();
  $all_settings = $settings->getAllSettings();
@endphp
<div class="col-md-6 col-sm-12 align-self-center">
  <div class="row">
    <div class="col-md-12 col-sm-12">
      <span class="title-us-title-1">Contáctate</span>
    </div>
    <div class="col-md-12 col-sm-12">
      <span class="title-us-title-2">con nosotros</span>
    </div>
    <div class="col-md-12 col-sm-12" style="margin-top: 35px;margin-bottom: 10px;">
      <span class="title-us-subtitle-1">OFICINA PRINCIPAL</span>
    </div>
    @if (!empty($all_settings['address']))
    <div class="col-md-12 col-sm-12">
      <span class="title-us-subtitle-2">{{$all_settings['address']}}</span>
    </div>
    @endif
    @if (!empty($all_settings['city']))
    <div class="col-md-12 col-sm-12">
      <span class="title-us-subtitle-2">{{$all_settings['city']}}</span>
    </div>
    @endif
    <div class="col-md-12 col-sm-12" style="margin-top: 50px;margin-bottom: 20px;">
    @if (!empty($all_settings['phone']))
      @php
        $clean_phone = str_replace("(", "", $all_settings['phone']);
        $clean_phone = str_replace(")", "", $clean_phone);
        $clean_phone = str_replace(" ", "", $clean_phone);
        $clean_phone = str_replace("+", "", $clean_phone);
      @endphp
      <span class="title-us-subtitle-3" style="font-family:'CircularStd-Bold', sans-serif"><a href="tel:{{$clean_phone}}"><i class="fas fa-phone-alt"></i>{{$all_settings['phone']}}</a></span>
    @endif
    </div>
    <div class="col-md-12 col-sm-12">
    @if (!empty($all_settings['email']))
      <span class="title-us-subtitle-3" style="font-family:'CircularStd-Bold', sans-serif"><a href="mailto:{{$all_settings['email']}}"><i class="fas fa-envelope"></i>{{$all_settings['email']}}</a></span>
    @endif
    </div>
  </div>
</div>
