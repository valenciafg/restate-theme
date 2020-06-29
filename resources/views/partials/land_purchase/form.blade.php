@php
  $settings = new  App\Controllers\Setting();
  $all_settings = $settings->getAllSettings();
  $site_key = $all_settings['recaptcha_site_key'];
@endphp
<!--form section-->
<div class="row toratto-land_purchase-form">
  <div class="col-md-12 col-sm-12 text-center">
    <h1>Completa el siguiente formulario:</h1>
  </div>
  <div class="col-md-12 col-sm-12">
    <form class="container" id="toratto-land-purchase-form" type="post">
      @include('partials.land_purchase.form_owner')
      @include('partials.land_purchase.form_land')
      <small class="form-text text-muted"><span class="toratto-form-required">(*)<span> Todos los campos son obligatorios</small>
      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="check" name="terms-check">
        <label class="form-check-label" for="check">He leído y acepto las condiciones de uso de mis datos personales</label>
      </div>
      <button
        id="btn-toratto-submit-form"
        type="submit"
        class="btn btn-toratto-green-full btn-lg"
        style="margin-top: 25px;"
        data-sitekey="{{$site_key}}"
      >
        Enviar
    </button>
    </form>
  </div>
</div>
