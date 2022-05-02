
<template>
  <div class="layout-px-spacing">
    <div class="row layout-top-spacing">
      <div class="row col-12">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
          <div class="widget-two">
            <div class="widget-content">
              <div class="w-numeric-value">
                <div class="w-content">
                  <span class="w-value">Excursion Tour Rates</span>
                  <span class="w-numeric-title">Go to columns for details.</span><br /><br />
                  <button class="btn btn-primary" @click="show_create_form = !show_create_form">
                    <span v-if="show_create_form == 0">Show Create Form</span>
                    <span v-if="show_create_form == 1">Hide Create Form</span>
                  </button>
                </div>
                <div class="w-icon">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="feather feather-dollar-sign">
                    <line x1="12" y1="1" x2="12" y2="23"></line>
                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                  </svg>
                </div>
              </div>
              <div class="w-chart">
                <div id="daily-sales"></div>
              </div>
            </div>
          </div>
        </div>

        <div class="row col-12" v-if="show_create_form == 1">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget-two">
              <div class="widget-content">
                <div class="w-numeric-value">
                  <div class="w-content">
                    <span class="w-value">Create Excursion Tour Rates</span>
                  </div>
                  <div class="w-icon">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="24"
                      height="24"
                      viewBox="0 0 24 24"
                      fill="none"
                      stroke="currentColor"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      class="feather feather-dollar-sign">
                      <line x1="12" y1="1" x2="12" y2="23"></line>
                      <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                    </svg>
                  </div>
                </div>

                <div style="margin: 50px">
                  <div class="widget-content">
                    <!-- Create Categorie Form Start -->

                    <form method="POST" enctype="multipart/form-data" @submit.prevent="createExcursionTourRate">
                      <div style="margin: 50px">
                        <div class="row mb-4">

                          <div class="col">
                            <label for="exampleFormControlInput1">Rate</label>
                            <input type="number" :class=" errors.rate? 'form-control is-invalid' : 'form-control'" placeholder="Rate" v-model="rate"/>
                            <small v-if="errors.rate" class="text-danger">{{ errors.rate[0] }}</small>
                          </div>

                          <div class="col">
                                <label for="exampleFormControlInput1">Excursion Tour Category</label>
                                    <select id="inputState"  class="form-control" :class="errors.excursionTourCategory ? 'form-control is-invalid' : 'form-control'  " @change="set_excursionTourCategory_name($event)">
                                        <option value="null">Please Select Type</option>
                                        <option v-for="(excursionTourCategory,index) in excursionTourCategories" :key="index" :value="excursionTourCategory.id">{{excursionTourCategory.name}}</option>
                                    </select>
                                <small v-if="errors.excursionTourCategory" class="text-danger">{{errors.excursionTourCategory[0]}}</small>
                            </div>

                        </div>

                        <div class="row mb-4">

                          <div class="col">
                                <label for="exampleFormControlInput1">Start Passenger Category</label>
                                    <select id="inputState" v-model="spassengerCategory" class="form-control" :class="errors.passengerCategory ? 'form-control is-invalid' : 'form-control'  " @change="set_startPassenger_name($event)">
                                        <option value="null">Please Select Type</option>
                                        <option v-for="(passengerCategory,index) in passengerCategories" :key="index" :value="passengerCategory.id">{{passengerCategory.name}}</option>
                                    </select>
                                <small v-if="errors.passengerCategory_id" class="text-danger">{{errors.passengerCategory_id[0]}}</small>
                            </div>

                          <div class="col">
                                <label for="exampleFormControlInput1">End Passenger Category</label>
                                    <select id="inputState" v-model="epassengerCategory" class="form-control" :class="errors.passengerCategory ? 'form-control is-invalid' : 'form-control'  " @change="set_endPassenger_name($event)">
                                        <option value="null">Please Select Type</option>
                                        <option v-for="(passengerCategory,index) in passengerCategories" :key="index" :value="passengerCategory.id">{{passengerCategory.name}}</option>
                                    </select>
                                <small v-if="errors.passengerCategory" class="text-danger">{{errors.passengerCategory[0]}}</small>
                            </div>

                        </div>  
                    
                        <input type="submit" value="submit" class="btn btn-primary"/>
                      </div>
                    </form>
                    <!--- Create Categorie Form End  -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
          <div class="widget-two">
            <div class="widget-content">
              <div class="w-numeric-value">
                <div class="w-content">
                  <span class="w-value">Excursion Tour Categories View</span>
                  <span class="w-numeric-title">Go to columns for details.</span>
                </div>
              </div>
            </div>

            <div style="margin: 50px">
              <div class="widget-content">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th class="text-center">
                          <div class="th-content">Count</div>
                        </th>
                        <th class="text-center">
                          <div class="th-content">Id</div>
                        </th>
                          <th class="text-center">
                          <div class="th-content">Rate</div>
                        </th>
                        <th class="text-center">
                          <div class="th-content">Excursion Tour Category</div>
                        </th>
                        <th class="text-center">
                          <div class="th-content">Start Passenger Category</div>
                        </th>
                        <th class="text-center">
                          <div class="th-content">End Passenger Category</div>
                        </th>
                        <th class="text-center">
                          <div class="th-content">Active</div>
                        </th>
                          <th class="text-center">
                          <div class="th-content">Edit</div>
                        </th>
                        <th class="text-center">
                          <div class="th-content">Destroy</div>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(excusrionTourRate, index) in excursionTourRates" :key="index">
                        <td class="text-center">{{ index + 1 }}</td>
                        <td class="text-center">{{ excusrionTourRate.id }}</td>
                        <td class="text-center">{{ excusrionTourRate.rate }}</td>
                        <td class="text-center">{{ excusrionTourRate.excursion_tour_name }}</td>
                        <td class="text-center">{{ excusrionTourRate.passenger_start_name }}</td>
                        <td class="text-center">{{ excusrionTourRate.passenger_end_name }}</td>

                         <td class="text-center">
                            <div v-if="excusrionTourRate.active  == 1">
                                <span class="shadow-none badge badge-primary">Active</span>
                             </div>
                            <div v-else>
                                <span class="shadow-none badge badge-warning">Deactive</span>
                            </div>
                         </td>
                        <td class="text-center">
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <button class="btn btn-primary mb-2 mx-4" 
                              @click="setToUpdate(excusrionTourRate.id, excusrionTourRate.rate, excusrionTourRate.active)" 
                                data-toggle="modal" 
                                  data-target="#editExcursionTourCategorieModal">
                              <i class="fa fa-pencil" aria-hidden="true"></i>Edit
                            </button>
                          </div>
                        </td>
                        <td class="text-center">
                          <button class="btn btn-danger mb-2" 
                            @click="destroyExcursionTourCategory(excusrionTourRate.id)">
                            <i class="fa fa-pencil" aria-hidden="true"></i>Delete
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <!-- Modal -->
          <div class="modal fade bd-example-modal-lg" id="editExcursionTourCategorieModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Edit Excursion Tour Category Rates</h5>
                  <button type="button" lass="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                  <i class="flaticon-cancel-12 close" data-dismiss="modal"></i>
                  <div class="add-contact-box">
                    <div class="add-contact-content">
                      <form id="addContactModalTitle">
                        <div class="form-group row">
                          <label for="staticEmail" class="col-sm-4 col-form-label text-center">Rate</label>
                          <div class="col-sm-8">
                            <input type="number" id="c-location" class="form-control" v-model="edit_rate" placeholder="ex: 12"/>
                          </div>
                        </div>
                        <br>
                             <div class="form-group row">
                                <label for="staticEmail" class="col-sm-4 col-form-label text-center">Active State</label>
                                 <div class="col-sm-8">
                                  <select id="inputState" class="form-control" @change="get_select_active_state_edit($event)">
                                     <option :selected="active==1" value="1">Active</option>
                                     <option :selected="active==0" value="0">Deactive</option>
                                  </select>
                              </div>
                           </div>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button id="btn-edit" class="float-left btn btn-success" @click="editExcursionTourRates" data-dismiss="modal">Edit</button>

                  <button class="btn btn-secondary" data-dismiss="modal">
                    <i class="flaticon-delete-1"></i> Cancel
                  </button>
                </div>
              </div>
            </div>
          </div>
          <!--  End Model -->
        </div>
      </div>
    </div>
  </div>
  
</template>


<script>
export default {
    data() {
        return {
            categories: [],
            excursionTourCategories:[],
            excursionTourRates:[],

            id: null,
            rate: null,
            startPassengers : null,
            endPassengers: null,
            excursionTourCategory : null,
            spassengerCategory : null,
            epassengerCategory:null,

            excusrionTourRate:null,

            active:null,

            edit_id: null,
            edit_rate: null,
            edit_active: null,       
            edit_active: null,


            name: null,
            submitStatus: null,

            errors: [],

//============ TO show and hide create form ====================
            show_create_form: 0
        };
    },

    mounted() {
        this.fetchExcursionTourRates();
       this.fetchExcursionTourCategories();
        this.fetchPassengerCategories();
        
    },

    methods: {
        reset() {
    //===========Add =====================     
            this.id = null;
            this.rate = null;
            this.active = null;

   //========= edit =====================         
            this.edit_id = null;
            this.edit_rate = null;
            this.edit_active = null;
        },

        setToUpdate(id, rate, active) {
            this.edit_id = id;
            this.edit_rate = rate;
            this.edit_active = active;
        },

        fetchExcursionTourRates() {
            axios.get("/admin/fetch/excursionTourRates")
                .then(res => {
                    if (res.status == 200) {
                        console.log(res);
                        this.excursionTourRates = res.data;
                    }
                })
                .catch(err => {
                    console.log("error:" + err);
                });
        },        

        fetchExcursionTourCategories() {
            axios.get("/admin/fetch/excursionTourCategoriesToExcurtionTourRates")
                .then(res => {
                    if (res.status == 200) {
                        console.log(res);
                        this.excursionTourCategories = res.data;
                    }
                })
                .catch(err => {
                    console.log("error:" + err);
                });
        },

        fetchPassengerCategories() {
             
            axios.get("/admin/fetch/passengerCategoriesToExcurtionTourRates")
                .then((res) => {

                    if (res.status == 200) {
                        console.log(res);

                        this.passengerCategories = res.data;
                    }

                })
                .catch((err) => {console.log("error:" + err);});
            },

        set_excursionTourCategory_name(event) {

          var category = event.target.value;
          //console.log("5");

          if(category != null)
          {
            this.excursionTourCategory = category;
          }
          else
          {
            this.excursionTourCategory = null;
          }
        },

        set_startPassenger_name(event) {
        var passengerStart = event.target.value;
          //console.log("5");

          if(passengerStart != null)
          {
            this.spassengerCategory = passengerStart;
          }
          else
          {
            this.spassengerCategory = null;
          }
        },

        set_endPassenger_name(event) {
          var passengerEnd = event.target.value;
          //console.log("5");

          if(passengerEnd != null)
          {
            this.epassengerCategory = passengerEnd;
          }
          else
          {
            this.epassengerCategory = null;
          }
        },

        

//============create categorie method================================

        createExcursionTourRate() {
            this.errors = [];

            if(this.spassengerCategory == this.epassengerCategory){

              {
                Swal.fire("Error", "Start Passenger Category and End Passenger Category cannot be Same!", "error");
              }

            }

            else{axios.post("/admin/create/excursionTourRates", {
                        rate: this.rate,
                        excursionTourCategory : this.excursionTourCategory,
                        startPassengers : this.spassengerCategory,
                        endPassengers : this.epassengerCategory,

                }).then(res => {
                    if (res.status == 200 && res.data == 1) {
                        Swal.fire({
                          position: "top-end",
                            icon: "success",
                            title: "Successfully Insert a Excursion Tour Rate",
                            showConfirmButton: false,
                            timer: 1500
                        });

                        this.reset();
                        this.excursionTourCategories();
                        this.passengerCategories();
                        this.fetchExcursionTourRates();
                        this.hideform()

                        
                    }
                }).catch(err => {
                    if (err.response.status == 422) {
                        this.errors = err.response.data.errors;
                         Swal.fire(

                            "Oops.... Incorrect Values.....!",
                            "PLease Check The Input Fileds Again.",
                            "question"
                        );
                    }
                });}

                
        },


        hideform(){
            this.show_create_form = 0;
        },

        get_select_active_state_edit(event) {
            this.edit_active = event.target.value;
        },

// ================== edit categorie method =============================================
       
        editExcursionTourRates() {
            
                axios.put("/admin/update/excursionTourRates", {
                        id: this.edit_id,
                        rate: this.edit_rate,
                        active: this.edit_active,
                        
                }).then(res => {
                    if (res.status == 200 && res.data == 1) {
                        Swal.fire(
                            "Success",
                            "Excursion Tour Rate Update Successfull!",
                            "success"
                        );
                        this.reset();
                        this.fetchExcursionTourRates();

                        
                    } else {
                        Swal.fire(
                            "Error",
                            "Excursion Tour Category Update Unsuccessfull!",
                            "error"
                        );
                    }
                }).catch(err => {
                    if (err.response.status == 422)
                        
                        Swal.fire(
                            "Error",
                            "Excursion Tour Category Rate Unsuccessfull!",
                            "error"
                        );
                });
        },
// ============================ delete categories ====================================================
      
        destroyExcursionTourCategory(id){

            Swal.fire({
                    title: '(Delete a Rate) Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        // Swal.fire(
                        // 'Deleted!',
                        // 'Your file has been deleted.',
                        // 'success'
                        // )



                    axios.post("/admin/destroy/excursionTourRates", {
                            id: id,
                        }).then((res) => {

                            if (res.status == 200 && res.data == 1) {

                              Swal.fire(
                                'Deleted!',
                                'Rate has been deleted.',
                                'success'
                                )

                                this.reset();
                                this.fetchExcursionTourRates();

                            }else{
                                Swal.fire("Error", "Rates destroy unsuccessfull!", "error");
                            }

                        }).catch((err) => {

                            if (err.response.status == 422){
                               // this.errors = err.response.data.errors;
                                Swal.fire("Error", "Rates destroy unsuccessfull!", "error");
                            }
                        });


                    }
                    })

        }
// ============================ delete categories end ====================================================
    },
};
</script>

