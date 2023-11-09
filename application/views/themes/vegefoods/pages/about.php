<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="hero-wrap hero-bread" style="background-image: url('<?php echo get_theme_uri('images/bg02.jpg'); ?>');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><?php echo anchor(base_url(), 'Home'); ?></span> <span>Tentang Kami</span></p>
          <h1 class="mb-0 bread">Tentang Kami</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section ftco-no-pb ftco-no-pt bg-dark">
          <div class="container">
              <!-- <div class="row">
                  <div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<?php echo get_theme_uri('images/about.jpg'); ?>);">
                      <a href="https://vimeo.com/45830194" class="icon popup-vimeo d-flex justify-content-center align-items-center">
                          <span class="icon-play"></span>
                      </a>
                  </div>
                  <div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate"> -->
            <div class="heading-section-bold ml-5 mb-5 mt-md-5">
                <div class="ml-md-0">
                  <h2 class="mb-4">Selamat Datang di Toko Online <?php echo get_store_name(); ?></h2>
              </div>
            </div>
            <div class=" ml-5 pb-md-5">
                <p><?php echo get_settings('store_description'); ?></p>
                          <p><a href="<?php echo site_url('home'); ?>" class="btn btn-primary">Belanja sekarang!</a></p>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      
      <section class="ftco-section testimony-section">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section ftco-animate text-center">
            <span class="subheading">Review</span>
          <h2 class="mb-4">Apa yang pelanggan kami katakan?</h2>
        </div>
      </div>
      <div class="row ftco-animate">
        <div class="col-md-12">
          <div class="carousel-testimony owl-carousel">
            <?php if ( count($reviews) > 0) : ?>
            <?php foreach ($reviews as $review) : ?>
            <div class="item">
              <div class="testimony-wrap p-4 pb-5">
                <div class="user-img mb-5" style="background-image: url(<?php echo base_url('assets/uploads/users/'. $review->profile_picture); ?>)">
                  <span class="quote d-flex align-items-center justify-content-center">
                    <i class="icon-quote-left"></i>
                  </span>
                </div>
                <div class="text text-center">
                  <p class="mb-5 pl-4 line"><?php echo $review->review_text; ?></p>
                  <p class="name"><?php echo $review->name; ?></p>
                  <span class="position"><?php echo get_formatted_date($review->review_date); ?></span>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
            <?php else : ?>
            <?php endif; ?>

          </div>
        </div>
      </div>
    </div>
  </section>
