<template lang="">
    <!-- Section: Design Block -->
<section class="background-radial-gradient overflow-hidden">
  

  <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
        <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
            Login now to buy best courses you need <br />
          <span style="color: hsl(218, 81%, 75%)">to growth your skills</span>
        </h1>
        <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
            E-learning provides a flexible and convenient way to learn, allowing individuals to access educational content anytime, anywhere. With e-learning, learners have the freedom to set their own pace 
            and learn at their own convenience, making it ideal for busy professionals or those with limited time. 
        </p>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

        <div class="card bg-light">
            <div class="card-body px-4 py-5 px-md-5">
                <form @submit.prevent>
                <h2>Login</h2>
              <!-- 2 column grid layout with text inputs for the first and last names -->

              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" id="form3Example3" class="form-control" v-model="formData.email"/>
                <label class="form-label" for="form3Example3">Email address</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" id="form3Example4" class="form-control" v-model="formData.password" />
                <label class="form-label" for="form3Example4">Password</label>
              </div>


              <!-- Submit button -->
              <button type="submit" class="btn btn-block mb-4 text-light" @click="login">Login</button>

              <!-- Register buttons -->
              <p>dont have account ? <span><router-link to="/sign_up">sign up</router-link></span></p>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->
</template>

<script>
    import axios from 'axios';

    export default {
        name: 'loginView',
        data(){
          return{
            formData:{
            email: '',
            password: '',
          
            },
            errors: {},
            message:''
          }
        },
        methods:{
          async login(){
            try {
              const response = await axios.post('http://127.0.0.1:8000/api/login',this.formData);
              if(response.data.token){
                  localStorage.setItem('token',response.data.token);
                  localStorage.setItem('role',response.data.user.role);

                  if (response.data.user.role === 'admin') {
                    this.$router.push('/admin');
                  }else {
                    this.$router.push('/');
                  }
              }
              this.message = response.data.message;
              console.log(this.message);
            } catch (error) {
              this.errors = error.response.data.errors;
              console.log(this.errors);
            }
          }
        }
    }
</script>
<style scoped>
.btn{
    background-color: #0f4662
}
@import 'bootstrap/dist/css/bootstrap.css';
    .background-radial-gradient {
      background-color: hsl(218, 41%, 15%);
      background-image: radial-gradient(650px circle at 0% 0%,
          hsl(218, 41%, 35%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%),
        radial-gradient(1250px circle at 100% 100%,
          hsl(218, 41%, 45%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%);
    }

    #radius-shape-1 {
      height: 220px;
      width: 220px;
      top: -60px;
      left: -130px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    #radius-shape-2 {
      border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
      bottom: -60px;
      right: -110px;
      width: 300px;
      height: 300px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    .bg-glass {
      background-color: hsla(0, 0%, 100%, 0.9) !important;
      backdrop-filter: saturate(200%) blur(25px);
    }
</style>