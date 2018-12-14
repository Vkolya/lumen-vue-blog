import Vue from 'vue'
import Router from 'vue-router'
import store from '../store/index';
import middlewares from './middlewares';
import PostsList from '../pages/PostsList.vue'
import UserPostsList from '../pages/UserPostsList.vue'
import SinglePost from '../pages/SinglePost.vue'
import EditPost from '../pages/EditPost.vue'
import LoginPage from '../pages/LoginPage.vue'

Vue.use(Router)

const middleware = handler => (
    routes => routes.map(route => Object.assign({}, route, {beforeEnter: handler}))
);

export default new Router({
    mode: 'history',
    base: '/',
    routes: [
        ...middleware(middlewares.auth(store))([
            {
                path: '/',
                name: 'home',
                redirect: '/posts'
            },
            {
                path: '/posts',
                name: 'PostsList',
                component: PostsList
            },
            {
                path: '/posts/my',
                name: 'UserPostsList',
                component: UserPostsList
            },
            {
                path: '/posts/:id',
                name: 'SinglePost',
                component: SinglePost
            },
            {
                path: '/posts/:id/edit',
                name: 'EditPost',
                component: EditPost
            }
        ]),
        ...middleware(middlewares.guest(store))([
            {
                path: '/login',
                name: 'LoginPage',
                component: LoginPage
            },


        ])
    ]
})
