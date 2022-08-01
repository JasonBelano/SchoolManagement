<template>
  <v-data-table
    :headers="headers"
    :items="sections"
    sort-by="calories"
    class="elevation-1"
  >
    <template v-slot:top>
      <v-toolbar
        flat
      >
        <v-toolbar-title>SECTION</v-toolbar-title>
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
                      v-model="formItem.name"
                      label="Enter Name"
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
                @click="saveSection"
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
              <v-btn color="blue darken-1" text @click="deleteSection(item)">OK</v-btn>
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
          {{formItem.name}}
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
        @click="viewSection(item)"
      >
        mdi-eye
      </v-icon>
      <v-icon
        small
        class="mr-2"
        @click="editSection(item)"
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
        { sortable: false,},
        { sortable: false,},
        { text: 'Name', value: 'name' },
        { sortable: false},
        { sortable: false},
        { sortable: false},
        { sortable: false},
        { sortable: false},
        { text: 'Actions', value: 'actions', sortable: false },
      ],
      sections: [],
      // item:{},
      editedIndex: -1,
      formItem: {},
    }),

    computed: {
      formTitle () {
        return this.form === -1 ? 'Add' : 'Add Section'
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
    
    },

    created () {
      this.initialize()
    },

    methods: {
      initialize () {
         axios.get('api/section/index')
         .then(response => {
          this.sections = response.data
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

      saveSection() {
        if(this.formItem.id)
        {
             axios.put('api/section/update/'+this.formItem.id, this.formItem)
             .then(response => {
                 this.initialize()
                 this.defaultItem()
                 this.close()
             })
        }
        else
        {
        axios.post('api/section/create', this.formItem)
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

      viewSection(item)
      {
        this.dialogView = true
         axios.get('api/section/'+item.id)
        .then(response=> {
          this.formItem = response.data
        })
      },

      viewDialogClose()
      {
        this.defaultItem()
        this.dialogView = false
      },

      editSection(item)
      {
       
        this.dialog = true
        this.Title = 'Edit Category'
        this.formItem = JSON.parse(JSON.stringify(item))
      },

      deleteSection(item)
      {
        axios.delete('api/section/delete/'+item.id)
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
        this.formItem.name = ''
    
      }

    },
  }
</script>