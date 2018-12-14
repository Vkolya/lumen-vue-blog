import httpService from '../../../services/common/httpService';

export default {

    getPosts: (context,page) => {

        return new Promise((resolve, reject) => {

            httpService.get('posts?page='+page)
                .then(function (res) {
                    context.commit('SET_POSTS', res.data);
                    resolve(res);

                }).catch(function (err) {
                reject(err);
            });
        });
    },
    getPostsByUser: (context) => {

        return new Promise((resolve, reject) => {

            httpService.get('posts/my')
                .then(function (res) {
                    context.commit('SET_USER_POSTS', res.data);
                    resolve(res);

                }).catch(function (err) {
                reject(err);
            });
        });
    },
    updatePost: (context,post) => {

        return new Promise((resolve, reject) => {

            httpService.put('posts/'+post.id,{
                title: post.title,
                text: post.text,
            })
                .then(function (res) {

                    context.commit('SET_POST', res.data.data);
                    resolve(res);

                }).catch((error) => {
                reject(error.response.data);
            });
        });
    },
    getPost: (context,post_id) => {

        return new Promise((resolve, reject) => {

            httpService.get('posts/'+post_id)
                .then(function (res) {

                    context.commit('SET_POST', res.data.data);
                    resolve(res);

                }).catch(function (err) {
                reject(err);
            });
        });
    },


};
