function clickProject() {
  $('#project-list li').click(function(){
    var img = $(this).data('img');
    var value = $(this).data('value');
    var index = $(this).data('index');
    var text = $(this).data('text');
    var item;
    if (img.length > 0) {
      item = `
        <li data-index="${index}" data-value="${value}" data-text="${text}" data-img="${img}">
          <img src="${img}" alt="${text}" value="${value}"/>
          <span class="title">${text}</span>
        </li>`;
    } else {
      item = `
      <li data-index="${index}" data-value="${value}" data-text="${text}" data-img="${img}">
        <span class="title">${text}</span>
      </li>`;
    }
    $('.project-btn').html(item);
    $('.project-btn').attr('value', value);
    $('.project-list-section').toggle();
    $('select[name="project_id"]').val(value);
  });
}

export default {
  initProjectList () {
    //  test for iterating over child elements
    var langArray = [];
    var langArrayValues = [];
    $('#project_id option').each(function(){
      var img = $(this).attr('data-thumbnail');
      console.log('img', img);
      var index = $(this).attr('data-index');
      var text = this.innerText;
      var value = $(this).val();
      var item;
      if (img.length > 0) {
        item = `
          <li data-index="${index}" data-value="${value}" data-text="${text}" data-img="${img}">
            <img src="${img}" alt="${text}" value="${value}"/>
            <span class="title">${text}</span>
          </li>`;
      } else {
        item = `
        <li data-index="${index}" data-value="${value}" data-text="${text}" data-img="${img}">
          <span class="title">${text}</span>
        </li>`;
      }
      langArray.push(item);
      langArrayValues.push(value);
    });

    $('#project-list').html(langArray);

    //Set the button value to the first el of the array
    $('.project-btn').html(langArray[0]);
    $('.project-btn').attr('value', langArrayValues[0]);

    clickProject();

    $('.project-btn').click(function(){
      $('.project-list-section').toggle();
    });
  },
}
