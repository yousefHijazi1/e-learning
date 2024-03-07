import { createRouter, createWebHashHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import CoursesView from '../views/CoursesView'
import LoginView from '../views/LoginView'
import SignupView from '../views/SignupView'
import AdminView from '../views/AdminView'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/courses',
    name: 'courses',
    component: CoursesView
  },
  {
    path: '/login',
    name: 'login',
    component: LoginView
  },
  {
    path: '/sign_up',
    name: 'sign_up',
    component: SignupView
  },
  {
    path: '/admin',
    name: 'admin',
    component: AdminView,
    meta: { requiresAuth: true, role:'admin' }
  }
]

const router = createRouter({
  history: createWebHashHistory(),
  routes
})

router.beforeEach((to, from, next) => {
  const token = localStorage.getItem('token');
  const role = localStorage.getItem('role');

  if (to.matched.some(record => record.meta.requiresAuth)) {
    // Check if the route requires authentication
    if (token && role) {
      // User is authenticated
      if (role === 'admin' && to.meta.role === 'admin') {
        // Allow access for admin
        next();
      } else if (role === 'user' && to.meta.role === 'user') {
        // Allow access for user
        next();
      } else {
        // Unauthorized access, redirect to appropriate page or show error
      }
    } else {
      // User is not authenticated, redirect to the login page
      next('/login');
    }
  } else {
    // Route does not require authentication, proceed to the route
    next();
  }
});

export default router;