import axios from "axios";
import { mapGetters } from "vuex";
export default {
    name: 'HomePage',
    data() {
        return {
            posts: [],
            categoryList: [],
            searchKey: "",
            loading: false,
            tokenStatus: false,
        }
    },

    mounted() {
        this.checkToken();
        this.getAllPost();
        this.loadCategory();
    },

    computed: {
        ...mapGetters(['getToken', 'getUserAcc']),
    },

    methods: {
        checkToken() {
            let token = localStorage.getItem('token');
            let user = localStorage.getItem('userAcc');
            this.$store.state.token = token;

            if (user) {
                this.$store.state.userAcc = JSON.parse(user);
            }
            
            
            if (token) {
                this.tokenStatus = true;
            } else {
                this.tokenStatus = false;
            }
        },

        getAllPost() {
            this.loading = true;
            axios.get('http://localhost:8000/api/allPostList', {
                headers: {
                    'Authorization': 'Bearer ' + this.$store.state.token
                }
            })
            .then((response) => {
                this.loading = false;
                this.posts = response.data.posts;                

                let length = this.posts.length;
                for (let i = 0; i < length; i++) {
                    if (this.posts[i].image != null) {
                        this.posts[i].image = "http://127.0.0.1:8000/storage/" + this.posts[i].image;
                    } else {
                        this.posts[i].image = "http://127.0.0.1:8000/image/no-image.png";
                    }
                }
            });
        },

        loadCategory() {
            axios.get('http://localhost:8000/api/allCategory', {
                headers: {
                    'Authorization': 'Bearer ' + this.$store.state.token
                }
            })
            .then((response) => {                
                this.categoryList = response.data.category;                
            });
        },

        search() {
            axios.post('http://localhost:8000/api/post/search', {                
                searchKey: this.searchKey
            })
            .then((response) => {
                this.getData(response);
            });
        },

        categorySearch(id) {
            // document.getElementById(id).classList.add('active');

            axios.post('http://localhost:8000/api/category/search', {                
                categoryId : id
            })
            .then((response) => {                
                this.getData(response);

            });
        },

        getData(response) {
            let length = response.data.searchData.length;
            for (let i = 0; i < length; i++) {
                if (response.data.searchData[i].image != null) {
                    response.data.searchData[i].image = "http://127.0.0.1:8000/storage/" + response.data.searchData[i].image;
                } else {
                    response.data.searchData[i].image = "http://127.0.0.1:8000/image/no-image.png";
                }
            }

            this.posts = response.data.searchData;
        },

        detail(postId) {            
            this.$router.push({
                name : "newsDetails",
                params : {
                    id : postId
                }
            });
        }
    },
}