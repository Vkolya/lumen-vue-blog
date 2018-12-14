import Vue from 'vue';

export default {

    SET_POSTS: (state, posts) => {
        state.allPosts = Object.assign({}, posts);
    },
    SET_USER_POSTS: (state, posts) => {
        state.userPosts = Object.assign({}, posts);
    },
    SET_POST: (state, post) => {
        state.post = Object.assign({}, post);
    },

};
