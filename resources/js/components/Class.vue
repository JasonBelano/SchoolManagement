<template>
  <v-data-table
    :headers="headers"
    :items="classes"
    sort-by="calories"
    class="elevation-1"
  >

            <template v-slot:[`item.student_id`]="{ item }">
              <span>{{ item.students[0].lastname}}</span>
            </template>

    <template v-slot:[`item.course_id`]="{ item }">
              <span>{{ item.course.name}}</span>
            </template>

             <template v-slot:[`item.user_id`]="{ item }">
              <span>{{ item.user.lastname}}</span>
            </template>

             <template v-slot:[`item.subject_id`]="{ item }">
              <span>{{ item.subject.name}}</span>
            </template>

             <template v-slot:[`item.section_id`]="{ item }">
              <span>{{ item.section.name}}</span>
            </template>

             <template v-slot:[`item.room_id`]="{ item }">
              <span>{{ item.room.name}}</span>
            </template>
            
    <template v-slot:top>
      <v-toolbar
        flat
      >
        <v-toolbar-title>CLASSES</v-toolbar-title>
        <v-divider
          class="mx-4"
          inset
          vertical
        ></v-divider>
        <v-spacer></v-spacer>

        <!-- AddDialog -->
        <v-dialog
          v-model="dialog"
          max-width="500px"
        >
          <template v-slot:activator="{ on, attrs }">
            <v-btn
              color="primary"
              dark
              class="mb-2"
              v-bind="attrs"
              v-on="on"
            >
              Add
            </v-btn>
          </template>
          <v-card>
            <v-card-title>
              <span class="text-h5">{{ formTitle }}</span>
            </v-card-title>

            <v-card-text>
              <v-container>
                <v-row>
                  <v-col
                    cols="12"
                    sm="6"
                    md="6"
                  >
                    <!-- <v-text-field
                      v-model="formItem.lastname"
                      label="Enter Time"
                    ></v-text-field> -->
                    <v-select
                    :items="students"
                    v-model="formItem.students[0]"
                     item-value="id" 
                     item-text= lastname
                     label="Student"
                    >
                    </v-select>

                  </v-col>
                  <v-col
                    cols="12"
                    sm="6"
                    md="6"
                  >
                    <v-text-field
                      v-model="formItem.time"
                      label="Enter Time"
                    ></v-text-field>
                  </v-col>
                  <v-col
                    cols="12"
                    sm="6"
                    md="6"
                  >
                    <!-- <v-text-field
                      v-model="formItem.middlename"
                      label="Enter Middlename"
                    ></v-text-field> -->
                       <v-select
                    :items="courses"
                    v-model="formItem.course_id"
                     item-value="id" 
                     item-text= name
                     label="Course"
                    >
                    </v-select>
                  </v-col>
                  <v-col
                    cols="12"
                    sm="6"
                    md="6"
                  >
                    <!-- <v-text-field
                      v-model="formItem.address"
                      label="Enter Address"
                    ></v-text-field> -->
                     <v-select
                    :items="teachers"
                    v-model="formItem.user_id"
                     item-value="id" 
                     item-text= lastname
                     label="Teacher"
                    >
                     </v-select>
                  </v-col>
                  <v-col
                    cols="12"
                    sm="6"
                    md="6"
                  >
                    <!-- <v-text-field
                      v-model="formItem.contact"
                      label="Enter Mobile Number"
                    ></v-text-field> -->
                      <v-select
                    :items="subjetcs"
                    v-model="formItem.subject_id"
                     item-value="id" 
                     item-text= name
                     label="Subject"
                    >
                     </v-select>
                    
                  </v-col>
                   <v-col
                    cols="12"
                    sm="6"
                    md="6"
                  >
                    <!-- <v-text-field
                      v-model="formItem.email"
                      label="Enter Email"
                    ></v-text-field> -->
                      <v-select
                    :items="sections"
                    v-model="formItem.section_id"
                     item-value="id" 
                     item-text= name
                     label="Section"
                    >
                     </v-select>
                  </v-col>
                   <v-col
                    cols="12"
                    sm="6"
                    md="6"
                  >
                    <!-- <v-text-field
                      v-model="formItem.password"
                      label="Enter Password"
                      type="password"
                    ></v-text-field> -->
                      <v-select
                    :items="rooms"
                    v-model="formItem.room_id"
                     item-value="id" 
                     item-text= name
                     label="Room"
                    >
                     </v-select>
                  </v-col>
                </v-row>
              </v-container>
            </v-card-text>

            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn
                color="blue darken-1"
                text
                @click="close"
              >
                Cancel
              </v-btn>
              <v-btn
                color="blue darken-1"
                text
                @click="saveClass"
              >
                Save
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>
          
          <!-- DeleteConfirmDialog -->
        <v-dialog v-model="dialogDelete" max-width="500px">
          <v-card>
            <v-card-title class="text-h5">Are you sure you want to delete this item?</v-card-title>
            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn color="blue darken-1" text @click="closeDelete">Cancel</v-btn>
              <v-btn color="blue darken-1" text @click="deleteClass(item)">OK</v-btn>
              <v-spacer></v-spacer>
            </v-card-actions>
          </v-card>
        </v-dialog>
          
          <!-- ViewDialog -->
           <v-dialog
      v-model="dialogView"
      width="500"
    >
      <v-card>
        <v-card-title class="text-h5 grey lighten-2">
          {{formItem.time}}
        </v-card-title>

        <v-card-text>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </v-card-text>

        <v-divider></v-divider>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="primary"
            text
            @click="dialogView = false"
          >
            Close
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
    
      </v-toolbar>
    </template>
    <template v-slot:[`item.actions`] ="{ item }">
     
       <v-icon
        small
        class="mr-2"
        @click="viewClass(item)"
      >
        mdi-eye
      </v-icon>
      <v-icon
        small
        class="mr-2"
        @click="editClass(item)"
      >
        mdi-pencil
      </v-icon>
      <v-icon
        small
        class="mr-2"
        @click="deleteConfirm(item)"
      >
        mdi-delete
      </v-icon>
    </template>
    <template v-slot:no-data>
    </template>
  </v-data-table>
</template>


<script>
  export default {
    data: () => ({
      dialog: false,
      dialogDelete: false,
      dialogView: false,
      headers: [
        {
          text: 'ID',
          align: 'start',
          sortable: false,
          value: 'id',
        },
        {text: 'Student', value:'student_id'},
        { text: 'Time', value: 'time' },
        { text: 'Course', value: 'course_id' },
        { text: 'Teacher', value: 'user_id'},
        { text: 'Subject', value: 'subject_id' },
        { text: 'Section', value: 'section_id' },
        { text: 'Room', value: 'room_id' },
        { text: 'Actions', value: 'actions', sortable: false },
      ],
      classes: [],
      students:[],
      courses:[],
      teachers:[],
      subjetcs:[],
      sections:[],
      rooms:[],

      // item:{},
      editedIndex: -1,
      formItem: {
        students:[{
          0:{
            id:''
          }
        }]
      },
    }),

    computed: {
      formTitle () {
        return this.form === -1 ? 'Add' : 'Add Classes'
      },
    },

    watch: {
        dialogView (val) {
        val || this.viewDialogClose()
      },
      dialog (val) {
        val || this.close()
      },
      dialogDelete (val) {
        val || this.closeDelete()
      },
      
      dialog (val){
      if(val){
        axios.get('api/student/index').then(response => {
            this.students =response.data
        })
         axios.get('api/course/index').then(response => {
            this.courses =response.data
        })
         axios.get('api/user/index').then(response => {
            this.teachers =response.data
        })
         axios.get('api/subject/index').then(response => {
            this.subjetcs =response.data
        })
         axios.get('api/section/index').then(response => {
            this.sections =response.data
        })
         axios.get('api/room/index').then(response => {
            this.rooms =response.data
        })
        }
      }
    },

    created () {
      this.initialize()
    },

    methods: {
      initialize () {
         axios.get('api/classes/index')
         .then(response => {
          this.classes = response.data
         }).catch(error => {
          console.log(error)
         })
      },

      close () {
        this.defaultItem()
        this.dialog = false
        this.$nextTick(() => {
          this.editedItem = Object.assign({}, this.defaultItem)
          this.editedIndex = -1
        })
      },

      closeDelete () {
        this.defaultItem()
        this.dialogDelete = false
        this.$nextTick(() => {
          this.editedItem = Object.assign({}, this.defaultItem)
          this.editedIndex = -1
        })
      },

      save () {
        if (this.editedIndex > -1) {
          Object.assign(this.desserts[this.editedIndex], this.editedItem)
        } else {
          this.desserts.push(this.editedItem)
        }
        this.close()
      },

      saveClass() {
        if(this.formItem.id)
        {
             axios.put('/api/classes/update/'+this.formItem.id, this.formItem)
             .then(response => {
                 this.initialize()
                 this.defaultItem()
                 this.close()
             })
             axios.put('/api/classes/update/student/'+this.formItem.id, this.formItem)
             .then(response =>{
               this.initialize()
               this.defaultItem()
               this.close();
             })
        }
        else
        {
        axios.post('api/classes/create/'+this.formItem.students[0], this.formItem)
        .then(response => {
                 this.initialize()
                 this.defaultItem()
                 this.close()
             })
        .catch(function (error) {
          console.log(error);
        });
        this.initialize();
        this.close()
        }
      },

      viewClass(item)
      {
        this.dialogView = true
         axios.get('api/user/'+item.id)
        .then(response=> {
          this.formItem = response.data
        })
      },

      viewDialogClose()
      {
        this.defaultItem()
        this.dialogView = false
      },

      editClass(item)
      {
        this.Title = 'Edit Category'
        this.formItem = JSON.parse(JSON.stringify(item))
        console.log(this.formItem)
        //   axios.get('api/classes/'+item.id)
        // .then(response=> {
        //   this.formItem = response.data
        // })

        this.dialog = true
      },

      deleteClass(item)
      {
        axios.delete('api/classes/delete/'+item.id)
        this.initialize();
        this.closeDelete();
      },

      deleteConfirm(item)
      {
        //  axios.delete('api/student/delete/'+item.id)
        // this.initialize();
        this.dialogDelete = true
        this.item = item
      },

      defaultItem()
      {
        this.formItem.id = ''
        this.formItem.students[0] = ''
        this.formItem.time = ''
        this.formItem.course_id = ''
        this.formItem.user_id = ''
        this.formItem.subject_id = ''
        this.formItem.section_id = ''
        this.formItem.room_id = ''
      }

    },
  }
</script>