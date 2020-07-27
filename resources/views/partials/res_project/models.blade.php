@php
  $models = $project['models'];
@endphp
@if (!empty($models))
  @php
  $first_model_name = $models[0]['name'];
  $first_model_room_number = $models[0]['room_number'];
  $first_model_total_area = $models[0]['total_area'];
  $first_model_starting_price_usd = $models[0]['starting_price_usd'];
  $room_list = [];
  foreach ($models as $model) {
    $room_list[] = $model['room_number'];
  }
  $room_list = array_values(array_unique($room_list));
  @endphp
<section class="toratto-section-model" id="toratto-quotation-section">
  <div class="row">
    <h1 class="toratto-section-model-title col-md-12">¡Tu nuevo hogar está a un solo paso!</h1>
  </div>
  <div class="row">
    <!-- slider model section -->
    @include('partials.res_project.model.slider')
    <!-- form model section -->
    @include('partials.res_project.model.form')
  </div>
</section>
@endif
