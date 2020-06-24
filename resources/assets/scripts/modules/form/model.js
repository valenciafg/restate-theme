export default {
  initModelList () {
    //test for iterating over child elements
    var langArray = [];
    var langArrayValues = [];
    $('.toratto-quotation-form-model option').each(function(){
      var img = $(this).attr('data-thumbnail');
      var text = this.innerText;
      var value = $(this).val();
      var item = '<li><img src="'+ img +'" alt="" value="'+value+'"/><span class="title">'+ text +'</span></li>';
      langArray.push(item);
      langArrayValues.push(value);
    })

    $('#toratto-quotation-form-model-fake-list').html(langArray);

    //Set the button value to the first el of the array
    $('.toratto-quotation-form-model-fake-btn').html(langArray[0]);
    $('.toratto-quotation-form-model-fake-btn').attr('value', langArrayValues[0]);

    //change button stuff on click
    $('#toratto-quotation-form-model-fake-list li').click(function(){
      var img = $(this).find('img').attr('src');
      var value = $(this).find('img').attr('value');
      var text = this.innerText;
      var item = '<li><img src="'+ img +'" alt="" /><span class="title">'+ text +'</span></li>';
      $('.toratto-quotation-form-model-fake-btn').html(item);
      $('.toratto-quotation-form-model-fake-btn').attr('value', value);
      $('.toratto-quotation-form-model-fake-section').toggle();

      //MOVE SLICK TO SELECTED MODEL
      $('.toratto-section-model-carousel').slick('slickGoTo', value);
      var currrentNavSlideElem = '.toratto-section-model-carousel .slick-slide[data-slick-index="' + value + '"]';
      $('.toratto-section-model-carousel .slick-slide.is-active').removeClass('is-active');
      $(currrentNavSlideElem).addClass('is-active');
      $('.toratto-model-info-name').html(value);
      $('select[name="toratto-quotation-form-model"]').val(value);
    });

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
  },
}
