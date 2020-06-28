@php
  $project = new  App\Controllers\Project();
  $projects = $project->getProjects(-1);
@endphp
<div class="col-md-6 col-sm-12 align-self-center">
  <div class="row">
    <div class="col-md-12 col-sm-12">
      <form>
        <div class="form-row">
          <div class="form-group col-md-12">
            <span style="font-weight: bold; font-family:'CircularStd-Bold', sans-serif">Si desea más información por favor ingrese sus datos en el siguiente formato y nos pondremos en contacto con usted:</span>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="toratto-contact-form-fullname">Nombres y Apellidos: <span class="toratto-form-required">*<span></label>
            <input type="text" class="form-control" id="toratto-contact-form-fullname" name="toratto-contact-form-fullname" required>
          </div>
          <div class="form-group col-md-6">
            <label for="toratto-contact-form-phone">Télefono: <span class="toratto-form-required">*<span></label>
            <input type="text" class="form-control" id="toratto-contact-form-phone" name="toratto-contact-form-phone" required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="toratto-contact-form-email">E-mail: <span class="toratto-form-required">*<span></label>
            <input type="email" class="form-control" id="toratto-contact-form-email" name="toratto-contact-form-email" required>
          </div>
          <div class="form-group col-md-6">
            <label for="toratto-contact-form-project">Proyecto: <span class="toratto-form-required">*<span></label>
            <select class="form-control" class="form-control" id="toratto-contact-form-project" name="toratto-contact-form-project" required>
              @foreach ($projects as $project)
              <option value="{{$project['title']}}">{{$project['title']}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="toratto-contact-form-description">Descripción <span class="toratto-form-required">*<span></label>
          <textarea class="form-control" id="toratto-contact-form-description" name="toratto-contact-form-description" rows="3" required></textarea>
          <small class="form-text text-muted"><span class="toratto-form-required">(*)<span> Todos los campos son obligatorios</small>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="toratto-contact-form-check">
          <label class="form-check-label" for="toratto-contact-form-check">He leído y acepto las condiciones de uso de mis datos personales</label>
        </div>
        <button type="submit" class="btn btn-toratto-green-full btn-lg" style="margin-top: 25px;">Enviar</button>
      </form>
    </div>
  </div>
</div>
