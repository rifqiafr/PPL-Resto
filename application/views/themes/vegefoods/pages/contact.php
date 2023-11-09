<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="hero-wrap hero-bread" style="background-image: url('<?php echo get_theme_uri('images/bg02.jpg'); ?>');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><?php echo anchor(base_url(), 'Home'); ?></span> <span>Hubungi Kami</span></p>
          <h1 class="mb-0 bread">Hubungi Kami</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section contact-section bg-dark">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">
        <div class="w-100"></div>
        <div class="col-md-3 d-flex">
            <div class="info bg-info p-4">
              <p><span>Alamat</span> <?php echo get_settings('store_address'); ?></p>
            </div>
        </div>
        <div class="col-md-3 d-flex">
            <div class="info bg-info p-4">
              <p><span>No. HP</span> <?php echo get_settings('store_phone_number'); ?></p>
            </div>
        </div>
        <div class="col-md-3 d-flex">
            <div class="info bg-info p-4">
              <p><span>Email:</span> <?php echo get_settings('store_email'); ?></p>
            </div>
        </div>
        <div class="col-md-3 d-flex">
            <div class="info bg-info p-4">
              <p><span>Website</span> www.lesehanraihan.com</p>
            </div>
        </div>
      </div>
      <div class="row block-9">
        <div class="col-md-6 order-md-last d-flex">
          <form action="<?php echo site_url('pages/send_message'); ?>" class="bg-dark1  p-5 contact-form" method="POST">
          <?php if ($flash) : ?>
          <div class="text-success text-center" style="margin-bottom: 25px;"><?php echo $flash; ?></div>
          <?php endif; ?>

            <div class="form-group">
              <input type="text" readonly class="form-control-plaintext"name="name" class="form-control" value="<?php echo set_value('name', (is_login() ? get_user_name() : '')); ?>" placeholder="Nama" required>
              <?php echo form_error('name'); ?>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="no_hp" class="form-control" value="<?php echo set_value('no_hp'); ?>" placeholder="No. Handphone" onkeypress="return event.charCode >= 48 && event.charCode <=57" required>
              <?php echo form_error('no_hp'); ?>
            </div>
            <div class="form-group">
              <input type="text" name="subject" class="form-control" value="<?php echo set_value('subject'); ?>" placeholder="Subjek pesan" required>
              <?php echo form_error('subject'); ?>
            </div>
            
            <div class="form-group">
              <textarea name="message" id="" cols="30" rows="7" class="form-control" placeholder="Pesan" required><?php echo set_value('message'); ?></textarea>
              <?php echo form_error('message'); ?>
            </div>
            <div class="form-group">
              <input type="submit" value="Kirim Pesan" class="btn btn-primary py-3 px-5">
            </div>
          </form>
        
        </div>

        <div class="col-md-6 d-flex">
            <div style="width: 100%">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15924.853021455217!2d102.2706795!3d-3.7637107!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e36b19a14575b33%3A0x4b4a6cb2804604a2!2sLesehan%20Rayhan!5e0!3m2!1sid!2sid!4v1698925015514!5m2!1sid!2sid" width="570" height="580" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
      </div>
    </div>
  </section>