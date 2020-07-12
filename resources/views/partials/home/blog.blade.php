@php
  $post_obj = new  App\Controllers\Post();
  $query = $post_obj->getPostByPostType("post", 3);
  $posts = $query->get_posts();
  /*
  echo "<pre>";
  print_r($posts);
  echo "</pre>";
  */
@endphp
@if (!empty($posts))
<section class="toratto-section-home-blog toratto-section-background-00">
    <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-12">
            <div class="card toratto-home-blog-title h-100">
                <div class="card-body">
                    <h3 class="card-title">¡No te pierdas el contenido de nuestro blog!</h3>
                    <p class="card-text">Entérate de lo más reciente en el rubro inmobiliario</p>
                    <a class="btn btn-toratto-green" href="/blog" role="button">
                    Ir al blog
                    </a>
                </div>
            </div>
          </div>
          <div class="col-md-8 col-sm-12">
              <div class="row">
              @foreach ($posts as $post)
              @php
              $id = $post->ID;
              $author_id = $post->post_author;
              $author_name = get_the_author_meta('display_name', $author_id);
              $date = get_the_date('', $id);
              $title = get_the_title($id);
              $url = get_permalink($id);
              $main_image = wp_get_attachment_url(get_post_thumbnail_id($id));
              $main_image = $main_image ? $main_image : get_stylesheet_directory_uri()."/assets/images/departamento_default.jpg";
              @endphp
                  <div class="col-md-4 col-sm-12">
                      <div class="card toratto-home-blog-post h-100 shadow">
                          <img class="card-img-top" src="{{$main_image}}" alt="Card image cap">
                          <div class="card-body">
                              <h5 class="card-title">{{$title}}</h5>
                              <p class="card-text">Por {{$author_name}}, {{$date}}</p>
                          </div>
                          <div class="card-footer text-center">
                              <a class="btn btn-toratto-green" href="{{$url}}" role="button">
                              Ver más
                              </a>
                          </div>
                      </div>
                  </div>
              @endforeach
              </div>
          </div>
        </div>
    </div>
</section>
@endif
