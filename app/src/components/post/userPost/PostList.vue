<template>

    <div class="container">
        <div class="row">
            <div class="col-md-12 user-posts">
                <div class="row" v-for="post in userPosts.data" :key="post.id">
                    <div class="col-md-12 post">

                        <div class="row">
                            <div class="col-md-12 post-header-line text-left">
                                {{ post.created_at }}
                            </div>
                        </div>
                        <div class="row post-content">
                            <div class="col-md-3">
                                <img :src="post.image" width="200px">
                            </div>
                            <div class="col-md-9">
                                <h5>{{ post.title }}</h5>
                                <p>
                                    Lorem ipsum dolor sit amet, id nec conceptam conclusionemque. Et eam tation option.
                                    Utinam salutatus ex eum. Ne mea dicit tibique facilisi, ea mei omittam explicari
                                    conclusionemque, ad nobis propriae quaerendum sea.
                                </p>
                                <p>
                                    <button type="button" class="btn btn-primary">
                                        <router-link :to="{ name: 'EditPost', params: { id: post.id }}">Edit
                                        </router-link>
                                    </button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>
</template>

<script>
    import {mapState} from 'vuex';
    import pagination from 'laravel-vue-pagination';

    export default {
        name: 'UserPostList',
        computed: {
            ...mapState('post', ['userPosts']),
        },

        created: function () {
            this.$store.dispatch('post/getPostsByUser');
        },

    };
</script>

<style scoped>
    @import url('https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Roboto+Condensed:400,400i,700,700i');

    section {
        padding: 100px 0;
    }

    .post-content .btn {
        width: 150px;
    }
    .post-content .btn a{
        color: white;
    }

    .user-posts {
        margin: 10px 0 10px 0;
        background: #ffffff;
        border: 4px;
        box-shadow: 0 2px 5px 0 rgba(0, 0, 0, .16), 0 2px 10px 0 rgba(0, 0, 0, .12);
    }

    .post-header-line {
        border-top: 1px solid #DDD;
        border-bottom: 1px solid #DDD;
        padding: 5px 0px 5px 15px;
        font-size: 12px;
    }


</style>