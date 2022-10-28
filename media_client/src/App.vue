<template>
<main>
  <header>
    <!-- Header Start -->
    <div class="header-area">
      <div class="main-header">
        <div class="header-top black-bg d-none d-md-block">
          <div class="container">
            <div class="col-xl-12">
              <div class="row d-flex justify-content-between align-items-center">
                <div class="header-info-left">
                  <ul>
                    <li>
                      <img src="assets/img/icon/header_icon1.png" alt="" />34ºc, Sunny
                    </li>
                    <li>
                      <img src="assets/img/icon/header_icon1.png" alt="" />Tuesday, 18th June, 2019
                    </li>
                  </ul>
                </div>
                <div class="header-info-right">
                  <ul class="header-social">
                    <li>
                      <a href="details.html"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li>
                      <a href="details.html"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li>
                      <a href="details.html"><i class="fab fa-pinterest-p"></i></a>
                    </li>
                  </ul>
                  
                </div>

                
              </div>
            </div>
          </div>
        </div>
        <div class="header-mid d-none d-md-block">
          <div class="container">
            <div class="row d-flex align-items-center">
              <!-- Logo -->
              <div class="col-xl-3 col-lg-3 col-md-3">
                <div class="logo">
                  <a href="index.html"><img src="../public/assets/img/logo/logo.png" alt="" /></a>
                </div>
              </div>
              <div class="col-xl-9 col-lg-9 col-md-9">
                <div class="header-banner f-right">
                  <img src="assets/img/hero/header_card.jpg" alt="" />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="header-bottom header-sticky">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-xl-12 col-lg-12 col-md-12 header-flex">
                <!-- sticky -->
                <div class="sticky-logo">
                  <a href="index.html"><img src="../public/assets/img/logo/logo.png" alt="" /></a>
                </div>
                <!-- Main-menu -->
                <div class="main-menu d-none d-md-block">
                  <nav class="row d-flex justify-content-between align-items-center py-3">
                    <router-link to="/" class="col-2 text-dark">Home</router-link>
                    <input type="button" @click="login()" v-if="!$store.state.token" class="btn btn-danger col-2 p-3" value="Login">
                    <input type="button" @click="logout()" v-if="$store.state.token" class="btn btn-danger col-2 p-3" value="Logout">
                  </nav>
                </div>                
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Header End -->
  </header>
  <router-view/>
</main>
</template>

<script>
// import { mapGetters } from "vuex";

export default {
  name: "App",

  // computed: {
  //   ...mapGetters(['setToken'])
  // },

  methods: {
    login() {
      this.$router.push({
        name: "login",
      });
    },

    logout() {
      this.$store.dispatch('setToken', null);
      localStorage.clear();
      this.$router.push({
        name: 'login'
      });
    }
  },
}
</script>