@php
  $project = new  App\Controllers\Project();
  $projects = $project->getProjects(-1);
@endphp
<div class="row">
  <div class="container">
    <div class="col-md-12 col-sm-12">
      <form id="toratto-complaints-book-form" type="post">
        <div class="form-group col-md-12" style="margin-top: 50px;margin-bottom: 50px;">
          <span>Antes de empezar, indícanos el lugar en el que se dieron los sucesos del reclamo:</span>
        </div>
        <div class="form-group col-md-4">
          <label for="project">Establecimiento <span class="toratto-form-required">*<span></label>
          <select class="form-control" class="form-control" id="project" name="project" required>
            @foreach ($projects as $project)
              <option value="{{$project['title']}}">{{$project['title']}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group col-md-12" style="margin-top: 50px;margin-bottom: 50px;">
          <small class="form-text text-muted">
            <p><span class="toratto-form-bold">Nota: </span>Si la queja o reclamo se relaciona con un proyecto entregado, consignar oficina principal.</p>
          </small>
        </div>
        <!-- 1. DATOS DEL CONSUMIDOR -->
        <div class="form-row">
          <div class="form-group col-md-12 toratto-complaints-book-form-title ">
            <h5>1. Identificación del consumidor reclamante:</h5>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="consumer-name">Nombres: <span class="toratto-form-required">*<span></label>
            <input type="text" class="form-control" id="consumer-name" name="consumer-name" required>
          </div>
          <div class="form-group col-md-4">
            <label for="consumer-lastname">Apellidos: <span class="toratto-form-required">*<span></label>
            <input type="text" class="form-control" id="consumer-lastname" name="consumer-lastname" required>
          </div>
          <div class="form-group col-md-4">
            <label for="consumer-phone">Télefono: <span class="toratto-form-required">*<span></label>
            <input type="text" class="form-control" id="consumer-phone" name="consumer-phone" required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="consumer-email">E-mail: <span class="toratto-form-required">*<span></label>
            <input type="email" class="form-control" id="consumer-email" name="consumer-email" required>
          </div>
          <div class="form-group col-md-4">
            <label for="consumer-address">Dirección: <span class="toratto-form-required">*<span></label>
            <input type="text" class="form-control" id="consumer-address" name="consumer-address" required>
          </div>
          <div class="form-group col-md-4">
            <label for="consumer-doc-type">Documento de identidad: <span class="toratto-form-required">*<span></label>
            <select class="form-control" class="form-control" id="consumer-doc-type" name="consumer-doc-type" required>
              <option value="">Tipo de documento</option>
              <option value="DNI">DNI</option>
              <option value="RUC">RUC</option>
              <option value="CEX">CEX</option>
            </select>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="consumer-document">Nº de documento: <span class="toratto-form-required">*<span></label>
            <input type="text" class="form-control" id="consumer-document" name="consumer-document" required>
          </div>
          <div class="form-group col-md-4">
            <label for="consumer-tutor-fullname">Nombre del tutor:</label>
            <input type="text" class="form-control" id="consumer-tutor-fullname" name="consumer-tutor-fullname">
            <small class="form-text text-muted">*Aplica, si el reclamante es menor de edad.</small>
          </div>
          <div class="form-group col-md-4">
            <label for="consumer-tutor-document">Nº de documento:</label>
            <input type="text" class="form-control" id="consumer-tutor-document" name="consumer-tutor-document">
            <small class="form-text text-muted">*Aplica, si el reclamante es menor de edad.</small>
          </div>
        </div>
        <!-- 2. DATOS DEL TERRENO -->
        <div class="form-row">
          <div class="form-group col-md-12 toratto-complaints-book-form-title ">
            <h5>2. Información del terreno:</h5>
          </div>
          <div class="form group col-md-12" style="margin-top: 20px;margin-bottom: 20px;">
            <div class="form-check form-check-inline">
              <input type="radio" class="form-check-input" name="land-type" id="land-type" value="Proyecto">
              <label class="form-check-label" for="land-type">Proyecto</label>
            </div>
            <div class="form-check form-check-inline">
              <input type="radio" class="form-check-input" name="land-type" id="land-type" value="Servicio">
              <label class="form-check-label" for="land-type">Servicio</label>
            </div>
          </div>
          <div class="form-group col-md-12">
            <label for="land-description">Descripción <span class="toratto-form-required">*</span></label>
            <textarea class="form-control" id="land-description" name="land-description" rows="2" required=""></textarea>
          </div>
        </div>
        <!-- 3. DETALLE DE RECLAMO -->
        <div class="form-row">
          <div class="form-group col-md-12 toratto-complaints-book-form-title ">
            <h5>3. Detalle de la reclamación y pedido del consumidor:</h5>
          </div>
          <div class="form group col-md-12" style="margin-top: 20px;margin-bottom: 20px;">
            <div class="form-check form-check-inline">
              <input type="radio" class="form-check-input" name="claim-type" id="claim-check" value="Reclamo">
              <label class="form-check-label" for="claim-check">Reclamo</label>
            </div>
            <div class="form-check form-check-inline">
              <input type="radio" class="form-check-input" name="claim-type" id="claim-check" value="Queja">
              <label class="form-check-label" for="claim-check">Queja</label>
            </div>
          </div>
          <div class="form-group col-md-12">
            <label for="claim-description">Descripción <span class="toratto-form-required">*</span></label>
            <textarea class="form-control" id="claim-description" name="claim-description" rows="2" required=""></textarea>
          </div>
          <div class="form-group col-md-12" style="margin-bottom: 0px;">
            <small class="form-text text-muted">
              <p><span class="toratto-form-bold">*Reclamo: </span>Disconformidad relacionada a los proyectos o servicios.</p>
            </small>
          </div>
          <div class="form-group col-md-12">
            <small class="form-text text-muted">
              <p><span class="toratto-form-bold">*Queja:</span> Disconformidad no relacionada a los proyectos o servicios; o, mal estar o descontento respecto a la atención al público.</p>
            </small>
          </div>
          <div class="form-group col-md-12">
            <label for="claim-detail">Detalle <span class="toratto-form-required">*</span></label>
            <textarea class="form-control" id="claim-detail" name="claim-detail" rows="2" required=""></textarea>
          </div>
          <div class="form-group col-md-12">
            <label for="claim-order">Pedido <span class="toratto-form-required">*</span></label>
            <textarea class="form-control" id="claim-order" name="claim-order" rows="2" required=""></textarea>
          </div>
        </div>
        <!-- 4. OBSERVACIONES -->
        <div class="form-row">
          <div class="form-group col-md-12 toratto-complaints-book-form-title ">
            <h5>4. Observaciones y acciones adoptadas por el proveedor:</h5>
          </div>
          <div class="form-group col-md-12" style="margin-bottom: 0px;">
            <small class="form-text text-muted">
              <p><span class="toratto-form-bold">Fecha de comunicación de la respuesta:</span> Martes, 08 de Enero del 2019</p>
            </small>
          </div>
          <div class="form-group col-md-12">
            <small class="form-text text-muted">
              <p><span class="toratto-form-bold">Descripción:</span> Al ser un reclamo virtual su caso será derivado al área de atención al cliente, a fin de dar respuesto dentro del plazo legalmente establecido</p>
            </small>
          </div>
        </div>
        <!-- 5. AUTORIZACION -->
        <div class="form-row">
          <div class="form-group col-md-12 toratto-complaints-book-form-title ">
            <h5>5. Autorizo notificación del resultado del reclamo al e-mail consignado:</h5>
          </div>
          <div class="form-group col-md-12">
            <small class="form-text text-muted">
              <p><span class="toratto-form-required">(*)</span> Todos los campos son obligatorios</p>
            </small>
          </div>
          <div class="form-group col-md-12">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="terms-check" name="terms-check">
              <label class="form-check-label" for="terms-check">He leído y acepto las condiciones de uso de mis datos personales</label>
            </div>
          </div>
          <div class="form-group col-md-12" style="margin-bottom: 0px;">
            <small class="form-text text-muted">
              <p><span class="toratto-form-required">*</span> La formulación del reclamo no impide acudir a otra vías de controversias ni es requisito previo.</p>
            </small>
          </div>
          <div class="form-group col-md-12" style="margin-top: 0px;">
            <small class="form-text text-muted">
              <p><span class="toratto-form-required">*</span> El proveedor deberá dar respuesta al reclamo en un plazo no mayor a treinta (30) días calendario, pudiendo ampliar el plazo hasta por (30) días mas, previa comununicación al consumidor.</>
            </small>
          </div>
        </div>
        <div class="form-row">
          <button
            id="btn-toratto-submit-book-form"
            type="submit"
            class="btn btn-toratto-green-full btn-lg"
            style="margin-top: 25px;">Enviar</button>
        </div>
      </form>
    </div>
  </div>
</div>
