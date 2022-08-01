<template>
  <v-data-table
    :headers="headers"
    :items="students"
    sort-by="calories"
    class="elevation-1"
  >
    <template v-slot:top>
      <v-toolbar
        flat
      >
        <v-toolbar-title>STUDENTS</v-toolbar-title>
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
                    <v-text-field
                      v-model="formItem.lastname"
                      label="Enter Lastname"
                    ></v-text-field>
                  </v-col>
                  <v-col
                    cols="12"
                    sm="6"
                    md="6"
                  >
                    <v-text-field
                      v-model="formItem.firstname"
                      label="Enter Firstname"
                    ></v-text-field>
                  </v-col>
                  <v-col
                    cols="12"
                    sm="6"
                    md="6"
                  >
                    <v-text-field
                      v-model="formItem.middlename"
                      label="Enter Middlename"
                    ></v-text-field>
                  </v-col>
                  <v-col
                    cols="12"
                    sm="6"
                    md="6"
                  >
                    <v-text-field
                      v-model="formItem.address"
                      label="Enter Address"
                    ></v-text-field>
                  </v-col>
                  <v-col
                    cols="12"
                    sm="6"
                    md="6"
                  >
                    <v-text-field
                      v-model="formItem.contact"
                      label="Enter Mobile Number"
                    ></v-text-field>
                  </v-col>
                   <v-col
                    cols="12"
                    sm="6"
                    md="6"
                  >
                    <v-text-field
                      v-model="formItem.email"
                      label="Enter Email"
                    ></v-text-field>
                  </v-col>
                   <v-col
                    cols="12"
                    sm="6"
                    md="6"
                  >
                    <v-text-field
                      v-model="formItem.password"
                      label="Enter Password"
                      type="password"
                    ></v-text-field>
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
                @click="saveStudent"
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
              <v-btn color="blue darken-1" text @click="deleteStudent(item)">OK</v-btn>
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
          {{formItem.lastname+','+formItem.firstname}}
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
      
      <!-- GradeDialog -->
       <v-dialog
      v-model="dialogGrade"
      width="500"
    >
      <v-card>
        <v-card-title class="text-h5 grey lighten-2">
          {{formItem.lastname+','+formItem.firstname}}
        </v-card-title>

        <v-card-text>
         <v-form>
          <v-container>
            <v-row>
               <v-col
                  cols="12"
                  sm="6"
                 md="3"
              >
              <span>{{ 'sample' }}</span>

               </v-col>
              <v-col
                  cols="12"
                  sm="6"
                 md="12"
              >
              <v-text-field
                label="Grade"
                dense
                >   
              </v-text-field>
              </v-col>
            </v-row>
          </v-container>
         </v-form>
        </v-card-text>

        <v-divider></v-divider>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="primary"
            text
            @click="gradeClose()"
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
        @click="gradeCreate(item)"
      >
         mdi-form-select
      </v-icon>

       <v-icon
        small
        class="mr-2"
        @click="viewStudent(item)"
      >
        mdi-eye
      </v-icon>
      <v-icon
        small
        class="mr-2"
        @click="editStudent(item)"
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
      dialogGrade: false,
      headers: [
        {
          text: 'ID',
          align: 'start',
          sortable: false,
          value: 'id',
        },
        { text: 'Lastname', value: 'lastname' },
        { text: 'Firstname', value: 'firstname' },
        { text: 'Middlename', value: 'middlename'},
        { text: 'Address', value: 'address' },
        { text: 'Contact #', value: 'contact' },
        { text: 'Email', value: 'email' },
        { text: 'Actions', value: 'actions', sortable: false },
      ],
      students: [],
      studentsPivot:[{
        0:[{
             classes:[{}]
           }]
        }],
      // item:{},
      editedIndex: -1,
      formItem: {
        // lastname: '',
        // firstname: '',
        // middlename: '',
        // address: '',
        // contact: '',
        // email: '',
        // password: '',
      },
    }),

    computed: {
      formTitle () {
        return this.form === -1 ? 'Add' : 'Add Student'
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
      dialogGrade (val) {
        val || this.gradeClose()
      }
    },

    created () {
      this.initialize()
    },

    methods: {
      initialize () {
         axios.get('api/student/index')
         .then(response => {
          this.students = response.data
         }).catch(error => {
          console.log(error)
         })
      },


      editItem (item) {
        this.editedIndex = this.desserts.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialog = true
        this.defaultData()
      },

      deleteItem (item) {
        this.editedIndex = this.desserts.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialogDelete = true
      },

      deleteItemConfirm () {
        this.desserts.splice(this.editedIndex, 1)
        this.closeDelete()
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

      gradeCreate(item)
      {
        this.dialogGrade = 
         axios.get('api/student/'+item.id)
        .then(response=> {
          this.formItem = response.data
        })

          axios.get('api/student/pivot/'+item.id)
        .then(response=> {
          // console.log(response.data)
          this.studentsPivot.classes = response.data
          // alert(JSON.stringify(this.studentsPivot[0].classes))
          // console.log(this.studentsPivot.classes)

        })
      },

      gradeClose()
      {
        this.defaultItem()
        this.dialogGrade = false
      },

      saveStudent() {
        if(this.formItem.id)
        {
             axios.put('/api/student/update/'+this.formItem.id, this.formItem)
             .then(response => {
                 this.initialize()
                 this.defaultItem()
                 this.close()
             })
            
        }
        else
        {
        axios.post('api/student/create', this.formItem)
         .then(function (response) {
          console.log(response);
          this.defaultItem()
          })
        .catch(function (error) {
          console.log(error);
        });
        this.initialize();
        this.close()
        }
      },

      viewStudent(item)
      {
        this.dialogView = true
         axios.get('api/student/'+item.id)
        .then(response=> {
          this.formItem = response.data
        })
      },

      viewDialogClose()
      {
        this.defaultItem()
        this.dialogView = false
      },

      editStudent(item)
      {
        // this.dialog = true;
        // //  this.formItem = Object.assign({}, item)
        // axios.get('api/student/'+item.id)
        // .then(response=> {
        //   this.formItem = response.data
        // })
        this.dialog = true
        this.Title = 'Edit Category'
        this.formItem = JSON.parse(JSON.stringify(item))
      },

      deleteStudent(item)
      {
        axios.delete('api/student/delete/'+item.id)
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
        this.formItem.lastname = ''
        this.formItem.firstname = ''
        this.formItem.middlename = ''
        this.formItem.address = ''
        this.formItem.contact = ''
        this.formItem.email = ''
        this.formItem.password = ''
      }

    },
  }
</script>