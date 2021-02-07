import bedImg2 from '../../../images/bed-2.png';
import metrajeImg2 from '../../../images/metraje-2.png';

function clickLiFake() {
  //change button stuff on click
  $('#toratto-quotation-form-model-fake-list li').click(function(){
    var img = $(this).find('img').attr('src');
    var value = $(this).find('img').attr('value');
    var index = $(this).find('img').attr('data-index');
    var total_area = $(this).find('img').attr('data-total_area');
    var room_number = $(this).find('img').attr('data-room_number');
    var text = this.innerText;
    var item = '<li><img src="'+ img +'" alt="" /><span class="title">'+ text +'</span></li>';
    $('.toratto-quotation-form-model-fake-btn').html(item);
    $('.toratto-quotation-form-model-fake-btn').attr('value', value);
    $('.toratto-quotation-form-model-fake-section').toggle();

    //MOVE SLICK TO SELECTED MODEL
    console.log('el nuevo valor es', value, index);
    $('.toratto-section-model-carousel').slick('slickGoTo', index);
    $('.toratto-model-info-name').html(value);
    var info = $('.toratto-model-info');
    var info_content = '';
    if (room_number) {
        info_content += `
        <li class="nav-item">
          <img src="${bedImg2}" style="width:50px; height:50px;">
          ${room_number} Dormitorios
        </li>`;
    }
    if (total_area) {
        info_content += `
        <li class="nav-item">
          <img src="${metrajeImg2}" style="width:50px; height:50px;">
          Desde ${total_area} m&sup2;
        </li>`;
    }
    info.html(info_content);
    $('select[name="toratto-quotation-form-model"]').val(value);
  });
}

export default {
  initModelList () {
    //test for iterating over child elements
    var langArray = [];
    var langArrayValues = [];
    $('.toratto-quotation-form-model option').each(function(){
      var img = $(this).attr('data-thumbnail');
      var index = $(this).attr('data-index');
      var total_area = $(this).attr('data-total_area');
      var room_number = $(this).attr('data-room_number');
      var text = this.innerText;
      var value = $(this).val();
      var item = `
        <li>
          <img data-index="${index}" data-total_area="${total_area}" data-room_number="${room_number}" src="${img}" alt="${value}" value="${value}"/>
          <span class="title">${text}</span>
        </li>`;
      langArray.push(item);
      langArrayValues.push(value);
    })

    $('#toratto-quotation-form-model-fake-list').html(langArray);

    //Set the button value to the first el of the array
    $('.toratto-quotation-form-model-fake-btn').html(langArray[0]);
    $('.toratto-quotation-form-model-fake-btn').attr('value', langArrayValues[0]);

    clickLiFake();

    $('.toratto-quotation-form-model-fake-btn').click(function(){
      $('.toratto-quotation-form-model-fake-section').toggle();
    });

    //check local storage for the lang
    var sessionLang = localStorage.getItem('lang');
    if (sessionLang){
      //find an item with value of sessionLang
      let langIndex = langArray.indexOf(sessionLang);
      $('.toratto-quotation-form-model-fake-btn').html(langArray[langIndex]);
      $('.toratto-quotation-form-model-fake-btn').attr('value', sessionLang);
    } else {
      let langIndex = langArray.indexOf('ch');
      console.log(langIndex);
      $('.toratto-quotation-form-model-fake-btn').html(langArray[langIndex]);
    }

    //  event click room button
    $('.btn-model-room').click(function() {
      $('.btn-model-room').removeClass('active');
      $(this).addClass('active');
      const selectedRoom = $(this).data('rooms');
      let rooms = [];
      $('select[name="toratto-quotation-form-model"] option').each(function(){
        if (selectedRoom == $(this).data('room_number')) {
          rooms.push({
            index: $(this).data('index'),
            name: $(this).val(),
            thumbnail: $(this).data('thumbnail'),
            total_area: $(this).data('total_area'),
            room_number: $(this).data('room_number'),
          });
        }
      });
      console.table(rooms);
      if(rooms.length > 0) {
        $('.toratto-quotation-form-model-fake-btn').val();
        $('.toratto-quotation-form-model-fake-btn').html(`
        <li>
          <img
            data-index="${rooms[0].index}"
            data-total_area="${rooms[0].total_area}"
            data-room_number="${rooms[0].room_number}"
            src="${rooms[0].thumbnail}"
            alt="${rooms[0].name}"
            value="${rooms[0].name}"
          >
          <span class="title">
            ${rooms[0].name}
          </span>
        </li>
        `);

        $('#toratto-quotation-form-model-fake-list').html('');
        rooms.forEach(function(room) {
          $('#toratto-quotation-form-model-fake-list').append(
            `
              <li>
                <img
                  data-index="${room.index}"
                  data-total_area="${room.total_area}"
                  data-room_number="${room.room_number}"
                  src="${room.thumbnail}"
                  alt="${room.name}"
                  value="${room.name}"
                >
                <span class="title">
                  ${room.name}
                </span>
              </li>
            `
          );
        });

        clickLiFake();
      }
    })
  },
  initModelLink() {
    $('.toratto-quotation-link').click(function(e){
      e.preventDefault();
      $('html, body').animate({
        scrollTop: $('#toratto-quotation-section').offset().top,
      }, 1500);
    });
  },
}
