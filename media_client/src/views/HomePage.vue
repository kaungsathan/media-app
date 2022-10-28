<template>
    <div class="homePage">

        <!-- Whats New Start -->
        <section class="whats-news-area pt-50 pb-20">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row d-flex justify-content-between">
                            <div class="col-lg-3 col-md-3">
                                <div class="section-tittle mb-30">
                                    <h3>Whats New</h3>
                                    <!-- <h5>{{$store.state.userAcc}}</h5> -->
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9">
                                <div class="properties__button">
                                    <!--Nav Button  -->
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
                                                href="#" role="tab" aria-controls="nav-home"
                                                aria-selected="true" @click="categorySearch('')">All</a>

                                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab"
                                                href="#" role="tab" aria-controls="nav-profile"
                                                aria-selected="false"
                                                v-for="(category,index) in categoryList" :key="index" @click="categorySearch(category.id)">{{category.title}}</a>
                                        </div>
                                    </nav>
                                    <!--End Nav Button  -->
                                </div>
                            </div>
                        </div>

                        <div class="row d-flex justify-content-end mt-3 mb-5 me-1">
                            <input type="text" class="col-2" placeholder="Search" v-on:keyup.enter="search()" v-model="searchKey" />
                        </div>                        

                        <div class="row">
                            <div class="col-12">
                                <!-- Nav Card -->
                                <div class="tab-content" id="nav-tabContent">
                                    <!-- card one -->
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                        aria-labelledby="nav-home-tab">
                                        <div class="whats-news-caption">
                                            <!-- login to view -->
                                            <div class="mt-5" v-if="tokenStatus == false" style="min-height: 70vh;">                                                
                                                <h1 class="text-center">Login to see posts!</h1>
                                            </div>

                                            <div v-if="tokenStatus == true">
                                                <!-- <h1>{{$store.state.token}}</h1> -->
                                                <!-- loading -->
                                                <div class="mt-5" v-if="loading == true" style="min-height: 70vh;">
                                                    <h1 class="text-center">Loading...</h1>
                                                </div>
                                                
                                                <div class="row" v-if="loading == false" style="min-height: 100vh;">
                                                    <!-- no data -->
                                                    <div class="mt-5" v-if="posts.length == 0">
                                                        <h1 class="text-center">No Post Here!</h1>
                                                    </div>
                                                
                                                    <div class="col-lg-6 col-md-6" v-else v-for="(post,index) in posts" v-bind:key="index" @click="detail(post.id)">
                                                        <div class="single-what-news mb-100">
                                                            <div class="what-img">
                                                                <img :src="post.image" alt="" />
                                                            </div>
                                                            <div class="what-cap">
                                                                <span class="color1">{{post.title}}</span>
                                                                <h4>
                                                                    <a href="details.html">{{post.description}}</a>
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Nav Card -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Whats New End -->
    </div>
</template>

<script src="../js/home.js"></script>