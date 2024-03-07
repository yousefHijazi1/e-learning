<template>
        <div class="row">
  <div class="col-lg-3 col-md-12 d-flex justify-content-center mb-4 " v-for="course in courses" :key="course.id">
    <div class="card">
      <!-- Card content -->
      <div class="card-img" :style="'background-image: url(' + require(`@/assets/images/${course.cover}`) + ')'"></div>
      <div class="card-info">
        <p class="text-title">{{ course.title }}</p>
        <p class="text-body">{{ course.description }}</p>
      </div>
      <!-- <div class="rate">
          <input type="radio" id="star5" name="rate" value="5" />
          <label for="star5" title="text">5 stars</label>
          <input type="radio" id="star4" name="rate" value="4" />
          <label for="star4" title="text">4 stars</label>
          <input type="radio" id="star3" name="rate" value="3" />
          <label for="star3" title="text">3 stars</label>
          <input type="radio" id="star2" name="rate" value="2" />
          <label for="star2" title="text">2 stars</label>
          <input type="radio" id="star1" name="rate" value="1" />
          <label for="star1" title="text">1 star</label>
      </div> -->
      <div class="card-footer">
        <span class="text-title">${{ course.price }}</span>
            <button class="card-button" @click="buy"><i class="fa-solid fa-cart-shopping"></i></button>
      </div>
      
    </div>
  </div>
</div>


</template>

<script>
import axios from 'axios'
export default {
    name: 'CardComponent',
    data(){
        return{
            courses: []
        }
    },
    methods:{
        async getCourses(){
            try {
                const response = await axios.get('http://127.0.0.1:8000/api/index');
                this.courses = response.data.courses;
                console.log(this.courses);
            } catch (error) {
                console.log(error)
            }
        },
        
        async buy(){
            if(localStorage.getItem('token')){
                this.$router.push('/buy');
            }else{
                this.$router.push('/login');
            }
        }
    },
    created(){
        this.getCourses();
    }
}
</script>
<style scoped>
@import "~@fortawesome/fontawesome-free/css/all.css";

.card {
 width: 300px;
 height: 300px;
 padding: .8em;
 background: #f5f5f5;
 /* position: relative; */
 overflow: visible;
 box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
 align-items: center;
}

.card-img {
 /* background-color: #ffcaa6; */
 height: 100%;
 width: 100%;
 border-radius: .5rem;
 transition: .3s ease;
 background-size: cover;
 background-position: center;
}

.card-info {
 padding-top: 10%;
}

svg {
 width: 20px;
 height: 20px;
}

.card-footer {
 width: 100%;
 display: flex;
 justify-content: space-between;
 align-items: center;
 padding-top: 10px;
 border-top: 1px solid #ddd;
}

/*Text*/
.text-title {
 font-weight: 900;
 font-size: 1.2em;
 line-height: 1.5;
}

.text-body {
 font-size: .9em;
 padding-bottom: 10px;
}

/*Button*/
.card-button {
 border: 1px solid #252525;
 display: flex;
 padding: .3em;
 cursor: pointer;
 border-radius: 50px;
 transition: .3s ease-in-out;
}

/*Hover*/
.card-img:hover {
 transform: translateY(-25%);
 box-shadow: rgba(226, 196, 63, 0.25) 0px 13px 47px -5px, rgba(180, 71, 71, 0.3) 0px 8px 16px -8px;
}

.card-button:hover {
 border: 1px solid #0f4662;
 background-color: #bfbfbf;
}



.rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}

</style>