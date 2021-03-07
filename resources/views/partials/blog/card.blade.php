<div class="col-md-4 col-sm-12" style="margin-bottom: 25px">
  <div class="card shadow toratto-blog-post-card h-100">
      <img class="card-img-top" src="http://localhost/wp-content/themes/restate-theme/resources/assets/images/departamento_default.jpg" alt="{{ get_the_title() }}">
      <div class="card-body">
          <h5 class="card-title">{{ get_the_title() }}</h5>
          <p class="card-text">Por {{ get_the_author() }}, <time class="updated" datetime="{{ get_post_time('c', true) }}">{{ get_the_date() }}</time></p>
      </div>
      <div class="card-footer text-center">
          <a class="btn btn-toratto-blue" href="{{get_permalink()}}" role="button">
          Ver más
          </a>
      </div>
  </div>
</div>
