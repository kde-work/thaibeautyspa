function deviceNav(){
   $('.menu_hide .header').click(function(){
       if($(this).is('.active')){
           $(this).removeClass('active');
           $(this).parent().siblings('menu').slideUp();
       }
       else {
           $(this).addClass('active');
           $(this).parent().siblings('menu').slideDown();
       }
   });
   $('.menu menu').not().click(function(){
      $('.menu_hide .header').removeClass('active');
      $('.menu_hide .header').parent().siblings('menu').slideUp();
   })
};
$(window).load(function(){
//menu
//
$('.view_screen .fixed_frame .left .menu menu li').click(function() {
  
});
$('.read_more').click(function() {
  if($(this).siblings('.list').hasClass('active')){
    $(this).siblings('.list').removeClass('active');
    $(this).text('Read more');
  } else{
    $(this).siblings('.list').addClass('active');
    $(this).text('Click to hide');
  }
});
if ($(window).height < 846){
   deviceNav();
}
   // slick slider
   $('.slider_text').slick({
    dots: true,
    arrows: false,
    autoplay:true
   });
   $('.master_slider').slick({
      slidesToShow: 3,
      slidesToScroll: 3,
      dots:false,
      arrows:false,
      responsive: [
      {
        breakpoint: 1440,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          arrows:true,
          prevArrow: '<img src="../images/prev_btn.png" class="prev" alt="prev">',
          nextArrow: '<img src="../images/next_btn.png" class="next" alt="next">'
        }
      },
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows:true,
          prevArrow: '<img src="../images/prev_btn.png" class="prev" alt="prev">',
          nextArrow: '<img src="../images/next_btn.png" class="next" alt="next">'
        }
      }
     ]
   });
   $('.slider_gallery').slick({
    prevArrow: '<img src="../images/prev_btn.png" class="prev" alt="prev">',
    nextArrow: '<img src="../images/next_btn.png" class="next" alt="next">'
   });
  //form styler
    $('.city').styler();
    $('#pol').styler();

  //popap
  $('.content_block .content_first .left .link').click(function() {
    $('.popap_block').show();
  });
  $('.popap_block .outer').not().click(function() {
    $(document).mouseup(function (e) {
    var container = $(".popap_block");
    if (container.has(e.target).length === 0){
        container.hide();
    }
});
  });
  //scroll navigation

    $(".menu menu li").on('click', function(e) {
      e.preventDefault();
      var bl_id = $(this).find('a').attr('href');
      var position =$(bl_id).offset();;
      position = position.top;
      console.log() ;
     $("HTML, BODY").animate({ scrollTop: position }, 1000); 

   });

    $(window).on('scroll',function(){
      var second = $('#second').offset();
      second = second.top - 240;
      // console.log(second);
      var third = $('#third').offset();
      third = third.top - 240;
      var fourth = $('#fourth').offset();
      fourth = fourth.top - 240;
      var fiveth = $('#fiveth').offset();
      fiveth = fiveth.top - 240;
      var seventh = $('#seventh').offset();
      seventh = seventh.top - 240;
      var eighth = $('#eighth').offset();
      eighth = eighth.top - 240;
      var nineth = $('#nineth').offset();
      nineth = nineth.top - 240;
      if ($(window).scrollTop() > second &&  $(window).scrollTop() < third ){
        $('.menu menu li').find('a[href="#second"]').parent().addClass('active').siblings().removeClass('active');
      }

      
      if ($(window).scrollTop() > third &&  $(window).scrollTop() < fourth ){
        $('.menu menu li').find('a[href="#third"]').parent().addClass('active').siblings().removeClass('active');
      }

      
      if ($(window).scrollTop() > fourth &&  $(window).scrollTop() < fiveth ){
        $('.menu menu li').find('a[href="#fourth"]').parent().addClass('active').siblings().removeClass('active');
      }

      
      if ($(window).scrollTop() > fiveth &&  $(window).scrollTop() < seventh ){
        $('.menu menu li').find('a[href="#fiveth"]').parent().addClass('active').siblings().removeClass('active');
      }

      
      if ($(window).scrollTop() > seventh &&  $(window).scrollTop() < eighth ){
        $('.menu menu li').find('a[href="#seventh"]').parent().addClass('active').siblings().removeClass('active');
      }

      
      if ($(window).scrollTop() > eighth &&  $(window).scrollTop() < nineth ){
        $('.menu menu li').find('a[href="#eighth"]').parent().addClass('active').siblings().removeClass('active');
      }

      
      if ($(window).scrollTop() > nineth ){
        $('.menu menu li').find('a[href="#nineth"]').parent().addClass('active').siblings().removeClass('active');
      }
  });
})