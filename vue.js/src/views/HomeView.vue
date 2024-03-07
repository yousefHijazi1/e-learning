<template>
  <Slider/>
  <br><br>

  <div class="description">
      <h1>A broad selection of courses</h1>
      <p>Choose from over 210,000 online video courses in different languages and majors with new additions published every month !</p>
      <hr>
      <Swiper/>
</div>
  <br><br>

  <Cards/>
  <Card/>

</template>

<script>
  import Swiper from '../components/Swiper.vue'
  import Slider from '../components/Slider.vue'
  import Cards from '../components/Cards'
  import Card from '../components/Card'
  export default {
    components: {
      Slider,
      Cards,
      Swiper,
      Card
    },
  };
</script>

<style>

body {
  overflow-x: hidden; /* Hide horizontal overflow */
  width: 100vw; /* Set container width to full viewport width */
  height: 100vh; /* Set container height to full viewport height */
}

.description{
  text-align: center;
  background-color: rgb(240, 240, 240);
  padding: 50px;
}
</style>