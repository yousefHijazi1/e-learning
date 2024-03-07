<template>
  
<div id="carouselBasicExample" class="carousel slide carousel-fade" data-mdb-ride="carousel" data-mdb-carousel-init data-bs-ride="carousel" >
  <!-- Indicators -->
  <div class="carousel-indicators">
    <button
      type="button"
      data-mdb-target="#carouselBasicExample"
      data-mdb-slide-to="0"
      class="active"
      aria-current="true"
      aria-label="Slide 1"
    ></button>
    <button
      type="button"
      data-mdb-target="#carouselBasicExample"
      data-mdb-slide-to="1"
      aria-label="Slide 2"
    ></button>
    <button
      type="button"
      data-mdb-target="#carouselBasicExample"
      data-mdb-slide-to="2"
      aria-label="Slide 3"
    ></button>
  </div>

  <!-- Inner -->
  <div class="carousel-inner">
    <!-- Single item -->
    <div class="carousel-item active">
      <img src="../assets/images/slide2.png" class="d-block w-100" alt="web development img" />
      <div class="carousel-caption d-none d-md-block">
        <h5>Web Development Courses</h5>
        <p>Master web development with our courses in coding languages, frameworks, and design. Learn HTML, CSS, JavaScript, React, and more with expert guidance.</p>
      </div>
    </div>

    <!-- Single item -->
    <div class="carousel-item ">
      <img src="../assets/images/slide1.jpg" class="d-block w-100" alt="Ai img" />
      <div class="carousel-caption d-none d-md-block">
        <h5>Ai Courses</h5>
        <p>Master artificial intelligence with our AI courses, covering beginner to advanced topics. Get hands-on training and expert guidance in machine learning</p>
      </div>
    </div>


    <!-- Single item -->
    <div class="carousel-item">
      <img src="../assets/images/flutter.jpg" class="d-block w-100" alt="Flutter img"/>
      <div class="carousel-caption d-none d-md-block">
        <h5>Flutter Courses</h5>
        <p>Take a Flutter course. App Brewery. Start learning with the Complete 2021 Flutter Development Bootcamp with Dart</p>
      </div>
    </div>

  </div>
  <!-- Inner -->

  <!-- Controls -->
  <button class="carousel-control-prev" type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- Carousel wrapper -->
</template>

<script>
import { Carousel, initMDB } from "mdb-ui-kit";
export default {
  name: 'SliderComponent',
  mounted() {
    initMDB({ Carousel });
  },
};
</script>

<style scoped>
  @import 'bootstrap/dist/css/bootstrap.css';

    @media (min-width: 992px) {
  #carouselBasicExample .carousel-item img {
    height: 600px; /* Adjust the height as needed */
  }
}
</style>