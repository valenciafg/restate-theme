<div class="row">
  <div class='page-nav-container pagination'>
    @php
      echo paginate_links(array(
        'total' => $posts->max_num_pages,
        'prev_text' =>  __('« Prev'),
        'next_text' => __('Next »'),
      ));
    @endphp
  </div>
</div>
