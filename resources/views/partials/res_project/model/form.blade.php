<div class="col-md-6 col-sm-12">
    <form class="toratto-section-model-form">
        <div class="form-group input-group">
            <p class="toratto-quotation-form-subtitle">Modelo a cotizar: <span class="toratto-quotation-form-name">{{$first_model_name}}</span></p>
            <input name="toratto-quotation-form-name" class="form-control form-control-lg" type="hidden" value="{{$first_model_name}}">
        </div> <!-- form-group// -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
            </div>
            <input id="toratto-quotation-form-fullname" name="toratto-quotation-form-fullname" class="form-control form-control-lg" placeholder="Nombres y Apellidos" type="text">
        </div> <!-- form-group// -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fas fa-address-card"></i> </span>
            </div>
            <select class="form-control form-control-lg" style="max-width: 120px;">
                <option selected="" value="DNI">DNI</option>
                <option value="CE">CE</option>
            </select>
            <input name="toratto-quotation-form-document" class="form-control form-control-lg" placeholder="Documento" type="text">
        </div>
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
            </div>
            <input name="toratto-quotation-form-email" class="form-control form-control-lg" placeholder="Correo" type="email">
        </div> <!-- form-group// -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fas fa-phone-alt"></i> </span>
            </div>
            <select class="form-control form-control-lg" style="max-width: 120px;">
                <option selected="" value="+51">+51</option>
            </select>
            <input name="toratto-quotation-form-phone" class="form-control form-control-lg" placeholder="Teléfono/Móvil" type="text">
        </div> <!-- form-group// -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="far fa-clock"></i> </span>
            </div>
            <select name="toratto-quotation-form-schedule" class="form-control form-control-lg">
                <option value="">Horario de contacto de su preferencia</option>
                <option value="9:00am - 11:00am">9:00am - 11:00am</option>
                <option value="11:00am - 1:00pm">11:00am - 1:00pm</option>
                <option value="2:00pm - 05:00pm">2:00pm - 05:00pm</option>
                <option value="5:00pm - 7:00pm">5:00pm - 7:00pm</option>
            </select>
        </div> <!-- form-group// -->
        <div class="form-group input-group">
            <textarea name="toratto-quotation-form-message" class="form-control form-control-lg" placeholder="Ingresar mensaje"></textarea>
        </div>
        <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="gridCheck">
              <label class="form-check-label" for="gridCheck">
                He leído y acepto las condiciones de uso de mis datos personales
              </label>
            </div>
          </div>
        <div class="form-group">
            <button type="submit" class="btn btn-toratto-green btn-block">Solicitar cotización</button>
        </div>
    </form>
</div>