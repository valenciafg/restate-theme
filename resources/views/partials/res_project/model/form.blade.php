@php
  $settings = new  App\Controllers\Setting();
  $all_settings = $settings->getAllSettings();
  $site_key = $all_settings['recaptcha_site_key'];
@endphp
<div class="col-md-6 col-sm-12">
  <form class="toratto-section-model-form" id="toratto-modal-form" type="post" action="">
    <div class="form-row">
      <div class="form-group col-md-12">
        <select name="toratto-quotation-form-model" class=" toratto-quotation-form-model form-control form-control-lg" style="display: none;">
          @php
          $i = 0;
          @endphp
          @foreach ($models as $model)
          @if ($model['blueprint'])
            <option
              value="{{$model['name']}}"
              data-index="{{$i}}"
              data-thumbnail="{{$model['blueprint_thumbnail']}}"
              data-total_area="{{$model['total_area']}}"
              data-room_number="{{$model['room_number']}}"
            >
              {{$model['name']}}
            </option>
          @php
          $i += 1;
          @endphp
          @endif
          @endforeach
        </select>
        <div class="toratto-quotation-form-model-fake">
          <button class="toratto-quotation-form-model-fake-btn" value=""></button>
            <div class="toratto-quotation-form-model-fake-section">
              <ul id="toratto-quotation-form-model-fake-list"></ul>
            </div>
        </div>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="fullname">Nombres y Apellidos: <span class="toratto-form-required">*<span></label>
        <input type="text" class="form-control" id="fullname" name="fullname" required>
      </div>
      <div class="form-group col-md-6">
        <label for="phone">Télefono: <span class="toratto-form-required">*<span></label>
        <input type="text" class="form-control" id="phone" name="phone" required>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="email">Email <span class="toratto-form-required">*<span></label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="form-group col-md-6">
        <label for="message">Descripción: <span class="toratto-form-required">*<span></label>
        <input type="text" class="form-control" id="message" name="message" required>
      </div>
    </div>
    <div class="form-group">
      <small class="form-text text-muted" style="margin-bottom: 15px;"><span class="toratto-form-required">(*)<span> Todos los campos son obligatorios</small>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="toratto-quotation-form-terms-check">
        <label class="form-check-label" for="gridCheck">
          He leído y acepto las condiciones de uso de mis datos personales
        </label>
      </div>
    </div>
    <div class="form-group">
      <input type="hidden" name="toratto-quotation-form-google-res-token">
      <input type="hidden" name="project_id" value="{{$project['id']}}">
      <button
        id="btn-toratto-submit-form"
        type="submit"
        class="btn btn-toratto-green"
        data-sitekey="{{$site_key}}"
      >
        Enviar
      </button>
    </div>
  </form>
</div>
