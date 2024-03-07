<template lang="">
    <swiper
      :slides-per-view="3"
      :space-between="50"
      :autoplay="{
        delay: 2000, // Set the delay between slides in milliseconds
        disableOnInteraction: false // Allow autoplay to continue even when the user interacts with the carousel
      }"
    @swiper="onSwiper"
    @slideChange="onSlideChange"
    >
    <swiper-slide>
      <img src="@/assets/images/vuejs.png" alt="Slide 1" />
    </swiper-slide>
    <swiper-slide>
      <img src="@/assets/images/bootstrap.png" alt="Slide 2" />
    </swiper-slide>
    <swiper-slide>
      <img src="@/assets/images/laravel.png" alt="Slide 3" />
    </swiper-slide>
    <swiper-slide>
      <img src="@/assets/images/jquery.png" alt="Slide 3" />
    </swiper-slide>
  </swiper>
</template>

<script>
    import { Swiper, SwiperSlide } from 'swiper/vue';
    import 'swiper/css';
export default {
    name: 'SwiperComponent',
    components:{
        Swiper,
        SwiperSlide,
    },
    setup() {
      const onSwiper = (swiper) => {
        console.log(swiper);
      };
      const onSlideChange = () => {
        console.log('slide change');
      };
      return {
        onSwiper,
        onSlideChange,
      };
    },
}
</script>
<style lang="">
    
</style>