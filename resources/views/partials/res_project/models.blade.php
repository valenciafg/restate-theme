@php
    $models = $project['models'];
    /*
    echo "<pre>";
    print_r($models);
    echo "</pre>";
    */
    //{{$model['name']}}
@endphp
@if (!empty($models))
@php
    $first_model_name = $models[0]['name'];
@endphp
<section class="toratto-section-model toratto-section-background-01">
    <div class="row">
        <h1 class="toratto-section-title col-md-12">Conoce nuestros modelos</h1>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="toratto-section-model-carousel owl-carousel owl-theme">
                @foreach ($models as $model)
                @if ($model['blueprint'])
                    <div class="item" data-name="{{$model['name']}}">
                        <img src="{{$model['blueprint']}}" width="547" height="387" alt="{{$model['name']}}">
                    </div>
                @endif
                @endforeach
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            
            <form class="toratto-section-model-form">
                <p class="h2 text-center">¡Tu nuevo hogar está a un solo paso!</p>
                <div class="form-group input-group">
                    <p class="toratto-quotation-form-subtitle">Modelo a cotizar: <span class="toratto-quotation-form-name">{{$first_model_name}}</span></p>
                    <input name="toratto-quotation-form-name" class="form-control" type="hidden" value="{{$first_model_name}}">
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input name="toratto-quotation-form-fullname" class="form-control" placeholder="Nombres y Apellidos" type="text">
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fas fa-address-card"></i> </span>
                    </div>
                    <select class="custom-select" style="max-width: 120px;">
                        <option selected="" value="DNI">DNI</option>
                        <option value="CE">CE</option>
                    </select>
                    <input name="toratto-quotation-form-document" class="form-control" placeholder="Documento" type="text">
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                    </div>
                    <input name="toratto-quotation-form-email" class="form-control" placeholder="Correo" type="email">
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fas fa-phone-alt"></i> </span>
                    </div>
                    <select class="custom-select" style="max-width: 120px;">
                        <option selected="" value="+51">+51</option>
                    </select>
                    <input name="toratto-quotation-form-phone" class="form-control" placeholder="Teléfono/Móvil" type="text">
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="far fa-clock"></i> </span>
                    </div>
                    <select name="toratto-quotation-form-schedule" class="custom-select">
                        <option value="">Horario de contacto de su preferencia</option>
                        <option value="9:00am - 11:00am">9:00am - 11:00am</option>
                        <option value="11:00am - 1:00pm">11:00am - 1:00pm</option>
                        <option value="2:00pm - 05:00pm">2:00pm - 05:00pm</option>
                        <option value="5:00pm - 7:00pm">5:00pm - 7:00pm</option>
                    </select>
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <textarea name="toratto-quotation-form-message" class="form-control" placeholder="Ingresar mensaje"></textarea>
                </div> <!-- form-group// -->
                <div class="form-group">
                    <button type="submit" class="btn btn-toratto-green btn-block">Solicitar cotización</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endif