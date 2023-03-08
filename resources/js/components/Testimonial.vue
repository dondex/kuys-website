<template>
    <div>
        <section id="testimonials" class="testimonials section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                <h2>Testimonials</h2>
                <p>What they're saying about us</p>
                </div>

                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                    <div class="testimonial-item">
                        <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Relax at  Enjoy  ka  Dito ,KABAyaan  Halika na , DIto sa kuy’s sa  sulimania
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                        <!-- <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt=""> -->
                        <h3>- MJK</h3>
                    </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                    <div class="testimonial-item">
                        <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Astig  ang Performer
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                        <!-- <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt=""> -->
                        <h3>- Cute888</h3>
                    </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                    <div class="testimonial-item">
                        <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Excellent food and drink.Friendly staff, eager to please. Will definitely come back.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                        <!-- <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt=""> -->
                        <h3>Jena Karlis</h3>
                    </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                    <div class="testimonial-item">
                        <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Punta  ka  dito,After  mo sa work .Tangal Ang  strees  mo HEHEEHEH.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                        <!-- <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt=""> -->
                        <h3>- Judith</h3>
                    </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                    <div class="testimonial-item">
                        <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        My favorite restaurant! Always good food and good service! Can't beat the price! Can accommodate large groups! The staff is the best in town and why we keep coming back. Highly recommend this restaurant!
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                        <!-- <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt=""> -->
                        <h3>John Larson</h3>
                    </div>
                    </div><!-- End testimonial item -->

                </div>
                <div class="swiper-pagination"></div>
                </div>

            </div>
        </section>
    </div>
</template>

<script>
import Swiper from 'swiper';
import 'swiper/swiper-bundle.css';



export default {
  mounted() {
    new Swiper('.testimonials-slider', {
      speed: 600,
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false
      },
      slidesPerView: 'auto',
      pagination: {
        el: '.swiper-pagination',
        type: 'bullets',
        clickable: true
      },
      breakpoints: {
        320: {
          slidesPerView: 1,
          spaceBetween: 10
        },

        1200: {
          slidesPerView: 3,
          spaceBetween: 10
        }
      }
    });
  }
};
</script>
