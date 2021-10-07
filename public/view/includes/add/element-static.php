<!-- LOADER -->
<!-- <div class="loader"></div> -->
<!-- PROGRESS LINE -->
<div class="bar-long"></div>
<!-- BURGUER -->
<div class="btn-10 col-2">
  <button class="burguer navbar-toggler btn" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <i class=" fas fa-bars fa-lg"></i>
  </button>
</div>
<!-- BUTTON UP -->
<div class=" position-fixed upbuttom btn-10">
  <button id="upbutton" class="m-auto btn btn-outline-primary "><i class="fas fa-angle-up"></i></button>
</div>
<!-- COOKIES -->
<?php viewadd("includes/add/cookies") ?>
<!-- SOCIAL NETWORK  -->
<?php viewadd("includes/add/socialnetworks") ?>

<style>
  /* .loader {
    position: fixed;
    z-index: 9999;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    background-color: #FFFFFF;
    background-image: url(<?= assets("img/loader.jpg")?>);
    background-repeat: no-repeat;
    background-position: 50% 50%;
    opacity: 1;
  } */

  .social_network {
    z-index: 2000;
    top: 20%;
  }

  .social_network a {
    width: 2.8rem;
    margin-bottom: 1rem;
    /* -webkit-transition: all 0.6s ease-in;
    transition: all 0.6s ease-out; */

  }

  .social_network a:hover {
    /* transform-origin: 50% 50%;
    transform: rotate(5760deg);
    transition: all 5s ease-in; */
    color: #fff !important;
    transform: scale(1.4);
    transition: transform 1s;
  }

  .social_network a i {
    font-size: 1.5rem;
  }

  .social_network .ball {
    font-size: 4rem;
  }

  .bar-long {
    height: 4px;
    background-color: var(--color_primary);
    width: 0px;
    z-index: 1000;
    position: fixed;
    top: 50px;
    left: 0;
  }

  .upbuttom {
    left: 1rem;
    bottom: 1rem;
    z-index: 100;
  }

  @media (max-width: 1080px) {}

  @media (max-width: 580px) {
    .social_network a {
      width: 2.5rem;
    }

    .social_network a i {
      font-size: 1rem;
    }

  }
</style>

<script>
  // LOADER
  // $(window).load(function() {
  //   $(".loader").fadeOut("slow");
  // });
  // BARRA DE AVANZE
  $(window).scroll(function() {
    // calculate the percentage the user has scrolled down the page
    var scrollPercent =
      (100 * $(window).scrollTop()) /
      ($(document).height() - $(window).height());

    $(".bar-long").css("width", scrollPercent + "%");
  });
  // BUTTON OF UP
  $("#upbutton").click(function() {
    $("html").animate({
      "scrollTop": 0
    }, 1000);
  });
</script>