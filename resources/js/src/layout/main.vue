<template>
  <v-app id="inspire">
      <v-app-bar app color="green darken-2">
       <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
       <v-toolbar-title>School Management</v-toolbar-title>
    </v-app-bar>

               <v-navigation-drawer v-model="drawer" app >
                    <!-- SideBar -->
                    <v-list-item></v-list-item>
                    <v-list-item></v-list-item>
                    <v-list>
                      <v-list-item-group>
                           <v-list-item v-for="item in items" :key="item.title" :to="item.link" link>
                            <v-list-item-icon>
                              <v-icon>{{item.icon}}</v-icon>
                            </v-list-item-icon>
                            <v-list-item-content>
                              <v-list-item-title>
                                {{item.title}}
                              </v-list-item-title>
                            </v-list-item-content>
                           </v-list-item>
                      </v-list-item-group>
                    </v-list>
               </v-navigation-drawer>

               <v-main>
                    <v-container fluid>
                        <v-row align="center" justify="center">
                            <v-col class="text-center">
                                <router-view></router-view>
                            </v-col>
                        </v-row>
                    </v-container>
               </v-main>
  </v-app>
</template>

<script>
  export default {
      data(){
      return { 
        items:[
          {title: 'Dashboard', icon: 'mdi-view-dashboard', link: 'dashboard'},
          {title: 'Student', icon: 'mdi-account-school', link: 'student'},
          {title: 'Teacher', icon: 'mdi-human-male-board', link: 'teacher'},
          {title: 'Grade', icon: 'mdi-calendar-month', link: 'grade'},
          {title: 'Class', icon: 'mdi-calendar-month', link: 'class'},
          {title: 'Course', icon: 'mdi-card-text', link: 'course'},
          {title: 'Subject', icon: 'mdi-firebase', link: 'subject'},
          {title: 'Section', icon: 'mdi-cards', link: 'section'},
          {title: 'Room', icon: 'mdi-door-sliding', link: 'room'},
        ],
        drawer: null }
    }, 
  }
</script>