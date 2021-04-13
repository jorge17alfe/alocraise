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
<div class="social_network position-fixed d-flex  flex-column btn-20 top ml-xl-5 ml-md-4 ml-sm-2 ml-0">
  <a href="https://m.facebook.com/sharer.php?u=<?= SERVERURL ?>" target="_blank" class=" btn  "><i class="fab fa-facebook-f"></i></a>
  <a href="https://twitter.com/intent/tweet?text= carta-restaurante-online&url=<?= SERVERURL ?>&hashtags=alocraise" target="_blank" class=" btn "><i class="fab fa-twitter"></i></a>
  <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?= SERVERURL ?>" target="_blank" class=" btn "><i class="fab fa-linkedin"></i> </a>
  <!-- <a href="" class=" btn mb-1"><i class="fab fa-instagram"></i> </a> -->
  <a href="https://msng.link/o/?<?= SERVERURL ?>=fm" target="_blank" class=" btn "><i class="fab fa-facebook-messenger"></i> </a>
  <!-- <a href="" class=" btn mb-1"><i class="fab fa-github"></i></a> -->
  <a href="whatsapp://send?text=<?= SERVERURL ?>" target="_blank" class=" btn " data-action="share/whatsapp/share"><i class="fab fa-whatsapp"></i> </a>
  <!-- <a href="" class=" btn mb-1"><i class="fas fa-envelope-square"></i> </a> -->
</div>
<style>
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
  $(window).scroll(function() {
    // calculate the percentage the user has scrolled down the page
    var scrollPercent =
      (100 * $(window).scrollTop()) /
      ($(document).height() - $(window).height());

    $(".bar-long").css("width", scrollPercent + "%");
  });
  $("#upbutton").click(function() {
    $("html").animate({
      "scrollTop": 0
    }, 1000);
  });
</script>