@php
  $project = new  App\Controllers\Project();
  $settings = new  App\Controllers\Setting();
  $projects = $project->getProjects(-1);
  $all_settings = $settings->getAllSettings();
  $site_key = $all_settings['recaptcha_site_key'];
@endphp
<div class="col-md-6 col-sm-12 align-self-center">
  <div class="row">
    <div class="col-md-12 col-sm-12">
      <form id="toratto-contact-form" type="post" action="">
        <div class="form-row">
          <div class="form-group col-md-12">
            <span style="font-weight: bold; font-family:'CircularStd-Bold', sans-serif">Si desea más información por favor ingrese sus datos en el siguiente formato y nos pondremos en contacto con usted:</span>
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
            <label for="email">E-mail: <span class="toratto-form-required">*<span></label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="form-group col-md-6">
            <label for="project_id">Proyecto: <span class="toratto-form-required">*<span></label>
            <select class="form-control" class="form-control" id="project_id" name="project_id" required>
              @foreach ($projects as $project)
              <option value="{{$project['id']}}">{{$project['title']}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="description">Descripción <span class="toratto-form-required">*<span></label>
          <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
          <small class="form-text text-muted"><span class="toratto-form-required">(*)</span> Todos los campos son obligatorios</small>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="check" name="terms-check">
          <label class="form-check-label" for="check">He leído y acepto las <a href="/legal" target="_blank" class="toratto-green-link">condiciones de uso de mis datos personales</a></label>
        </div>
        <div class="form-row">
          <div class="form-group col-md-12 text-right">
            <button
              id="btn-toratto-submit-form"
              type="submit"
              class="btn btn-toratto-green-full btn-lg"
              data-sitekey="{{$site_key}}"
              style="margin-top: 25px; font-size:15px; width:188px; height: 50px"
            >
              ENVIAR
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
