import Vue from 'vue'
// import vuetify from '@/plugins/vuetify' // path to vuetify export
import VueRouter from 'vue-router'

import Dashboard from '../components/Dashboard.vue'
import Student from '../components/Student.vue'
import Teacher from '../components/Teacher.vue'
import Grade from '../components/Grade.vue'
import Class from '../components/Class.vue'
import Course from '../components/Course.vue'
import Subject from '../components/Subject.vue'
import Section from '../components/Section.vue'
import Room from '../components/Room.vue'

Vue.use(VueRouter)
const routes = [

  {
    path: '/dashboard',
    name: 'Dashboard',
    component: Dashboard
  },

  {
    path: '/student',
    name: 'Student',
    component: Student
  },

  {
    path: '/teacher',
    name: 'Teacher',
    component: Teacher
  },

  {
    path: '/grade',
    name: 'Grade',
    component: Grade
  },

  {
    path: '/class',
    name: 'Class',
    component: Class
  },

  {
    path: '/course',
    name: 'Course',
    component: Course
  },

  {
    path: '/subject',
    name: 'Subject',
    component: Subject
  },

  {
    path: '/section',
    name: 'Section',
    component: Section
  },

  {
    path: '/room',
    name: 'Room',
    component: Room
  },
  

]
const router = new VueRouter({
  mode: 'history',
  routes
})
export default router
// new Vue({
//   vuetify,
// }).$mount('#app')