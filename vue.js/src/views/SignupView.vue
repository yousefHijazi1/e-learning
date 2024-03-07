<template>
    <!-- Section: Design Block -->
<section class="background-radial-gradient overflow-hidden">
  <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
        <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
          Register now to buy best courses you need <br />
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
                <h2>Register</h2>

                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="form-outline mb-3 ">
                            <input type="text" id="fname" class="form-control" v-model="first_name" />
                            <label class="form-label" for="fname">First Name</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="form-outline mb-3">
                            <input type="text" id="lname" class="form-control" v-model="last_name" />
                            <label class="form-label" for="lname">Last Name</label>
                        </div>
                    </div>
                </div>  
              
                <div class="row">
                  <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="form-outline mb-3 ">
                      <input type="number" id="phone" class="form-control" v-model="formData.phone" />
                      <label class="form-label" for="phone">Phone Number</label>
                    </div>
                    </div>
                    
                    <div class="col-lg-6 col-md-12 col-sm-12 mb-4">
                      Gender : 
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="male" v-model="formData.gender">
                            <label class="form-check-label" for="inlineRadio1">male</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="female" v-model="formData.gender">
                            <label class="form-check-label" for="inlineRadio2">female</label>
                          </div>
                        </div>
                      </div>
              <!-- Email input -->
              <div class="form-outline mb-3">
                <input type="email" id="form3Example3" class="form-control" v-model="formData.email" />
                <label class="form-label" for="form3Example3">Email address</label>
              </div>

              <div class="row">
                <!-- Password input -->
                  <div class="form-outline mb-3 col-lg-6 col-md-12 col-sm-12">
                    <input type="password" id="form3Example4" class="form-control" v-model="formData.password" />
                    <label class="form-label" for="form3Example4">Password</label>
                  </div>
              
                  <div class="form-outline mb-3 col-lg-6 col-md-12 col-sm-12">
                    <input type="password" id="form3Example4" class="form-control" v-model="formData.password_confirmation"/>
                    <label class="form-label" for="form3Example4">Confirm Password</label>
                  </div>
              </div>


              <!-- Submit button -->
              <button type="submit" class="btn btn-block mb-2 text-light" @click="register">Submit</button>

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
    name: 'RegisterView',
    data(){
      return{

          first_name: '',
          last_name: '',

          formData: {
            name: '',
            email: '',
            password: '',
            password_confirmation: '',
            gender: '',
            phone: ''
          },

          message: '',
          errors: []
      }
    },
    methods:{
      async register(){
        try {
          this.formData.name = this.first_name + ' ' + this.last_name;
          const response = await axios.post('http://127.0.0.1:8000/api/register',this.formData);

          if(response.data){
              this.message = response.data.message;
              this.name = '';
              this.email = '';
              this.password = '';
              this.password_confirmation = '';
              this.gender = '';
              this.phone = '';
            }else{
              this.errors = response.data.errors;
              this.message = response.data.message;
          }

        } catch (error) {
          console.log(this.message);
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