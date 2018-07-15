$(document).ready(function() {
  $(window).scroll(function() {
    /* fixed navbar on scroll over head section */
    if($('#alur').length > 0) {
      if($(this).scrollTop() > $('#alur').offset().top) {
        $('.navbar').addClass('fixed');
      } else {
        $('.navbar').removeClass('fixed');
      }
    }
  });
  
  $('.detail-view').slick({
    arrows: true,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: false,
    prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-arrow-circle-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="fa fa-arrow-circle-right"></i></button>'
  });

  $('.head-section').slick({
    arrows: true,
    dots: true,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    fade: true,
    cssEase: 'linear',
    autoplay: true,
    autoplaySpeed: 4000,
    prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-chevron-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="fa fa-chevron-right"></i></button>'
  });

  /* Toggle mobile navbar menu */
  $('.navbar-btn').on('click', function() {
    $(this).siblings('.navbar-menu').toggleClass('active');
  });

  /* Toggle reward table */
  $('.reward-desc-expander').on('click', function() {
    $(this).children('.reward-desc-expand-table').slideToggle();
    $(this).closest('.reward-desc').toggleClass('active');
  });

  /* Display image modal */
  $('button[data-modal="image"]').on('click', function() {
    $('.modal-overlay').addClass('active');
    $('.modal-media-image').children('img').attr('src', $(this).attr('data-url'));
    $('.modal-media-image').addClass('active');
  });

  /* Display video modal */
  $('button[data-modal="video"]').on('click', function() {
    $('.modal-overlay').addClass('active');
    $('.modal-media-video').children('iframe').attr('src', $(this).attr('data-url'));
    $('.modal-media-video').addClass('active');
  });

  /* Close modal */
  $('.modal-overlay-close, .modal-overlay').on('click', function(e) {
    $('.modal-overlay').removeClass('active');
    if($('.modal-media').hasClass('active')) $('.modal-media').removeClass('active');
    e.stopPropagation();
  });

  /* Handle open other input text */
  $('#sumber').on('change', function() {
    if($(this).val() === "others") {
      $('input[name="sumber-lain"]').removeClass('hidden');
    } else if($(this).val() != "others" && !$('input[name="sumber-lain"]').hasClass('hidden')) {
      $('input[name="sumber-lain"]').addClass('hidden');
    }
  });

});