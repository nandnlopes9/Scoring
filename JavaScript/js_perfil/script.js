                                                              // Carrosel

var swiper = new Swiper(".slide-content", {
    slidesPerView: 1,
    breakpoints: {
        520: { slidesPerView: 2 },
        768: { slidesPerView: 3 },
        1100: { slidesPerView: 4 },
    },
    spaceBetween: 40,
    loop: true,
    TransitionEvent: 'true',
    centerSlide: 'true',
    fade: 'true',
    grabCursor: 'true',
    navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
    },
  });

                                                      // Pra descer bonitinho :)

$("#btn").click(function() {
 $([document.documentElement, document.body]).animate({
 scrollTop: $("#main").offset().top
 }, 2000);
});
                                                      
                                                      // Voltar gostosinho pro inicio

var btn2 = $("#btn2");

btn2.click(function() {
  $('html, body').animate({scrollTop:0}, 'slow');
});


