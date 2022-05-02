<template>

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">

    <div class="row col-12">


                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget-two">
                            <div class="widget-content">
                                <div class="w-numeric-value">
                                    <div class="w-content">
                                        <span class="w-value">Rates</span>
                                        <span class="w-numeric-title">Go to columns for details.</span><br><br>
                                        <button class="btn btn-primary" @click="show_create_form = ! show_create_form" >
                                            <span v-if="show_create_form == 0">Show Create Form</span>
                                            <span v-if="show_create_form == 1">Hide Create Form</span>
                                        </button>
                                    </div>
                                    <div class="w-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
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
                                <span class="w-value">Create a Rate</span>
                            </div>
                            <div class="w-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                            </div>
                        </div>




                             <div  style="margin:50px">

                             <div class="widget-content">

 <!--------------------------------------------------------------------------------------- Create Rate Form Start --------------------------------------------------------------------------------->

                        <form method="POST"  enctype="multipart/form-data" @submit.prevent="createRates">

                            <div  style="margin:50px">
                                <div class="row mb-4">
                                    <div class="col">
                                        <label for="exampleFormControlInput1">Rate</label>
                                        <input type="number" :class="errors.rate ? 'form-control is-invalid':'form-control'"  placeholder="Rate" v-model="rate" >
                                        <small v-if="errors.rate" class="text-danger">{{errors.rate[0]}}</small>
                                    </div>

                                    <div class="col">
                                        <label for="exampleFormControlInput1">Passenger Category</label>
                                            <select id="inputState" v-model="passengerCategory" class="form-control" :class="errors.name ? 'form-control is-invalid' : 'form-control'  " @change="set_passengerCategory_name($event)">
                                            <option value="null">Please Select Type</option>
                                            <option v-for="(passengerCategory,index) in passengerCategories" :key="index" :value="passengerCategory.id">{{passengerCategory.name}}</option>
                                        </select>
                                        <small v-if="errors.passengerCategory_id" class="text-danger">{{errors.passengerCategory_id[0]}}</small>

                                    </div>  

                                </div>

                                <div class="row mb-4">
                                    <div class="col">
                                        <label for="exampleFormControlInput1">Places Start</label>
                                            <select id="inputState" v-model="splace_name" class="form-control" :class="errors.name ? 'form-control is-invalid' : 'form-control'  " @change="set_start_place_name($event)">
                                                <option value="null">Please Select Type</option>
                                                <option v-for="(place,index) in places" :key="index" :value="place.id">{{place.name}}</option>
                                            </select>
                                        <small v-if="errors.splace_name" class="text-danger">{{errors.splace_name[0]}}</small>

                                    </div> 
                                
                                    <div class="col">
                                    <label for="exampleFormControlInput1">Places Destination</label>
                                    <select id="inputState" v-model="eplace_name" class="form-control" :class="errors.name ? 'form-control is-invalid' : 'form-control'  " @change="set_end_place_name($event)">
                                        <option value="null">Please Select Type</option>
                                        <option v-for="(place,index) in places" :key="index" :value="place.id">{{place.name}}</option>
                                    </select>
                                    <small v-if="errors.eplace_name" class="text-danger">{{errors.eplace_name[0]}}</small>

                                    </div> 
                                </div>

                                <input type="submit" id="submit" value="submit" class="btn btn-primary">

                            </div>

                        </form>
                        <!-- Create User Form End  -->

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
                                <span class="w-value">Rates View</span>
                                <span class="w-numeric-title">Go to columns for details.</span>
                            </div>

                        </div>

                    </div>

                    <div  style="margin:50px">
                    <div class="widget-content">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center"><div class="th-content">Index</div></th>
                                        <th class="text-center"><div class="th-content">ID</div></th>
                                        <th class="text-center"><div class="th-content">Rate</div></th> 
                                        <th class="text-center"><div class="th-content"></div>Passenger Category</th>
                                        <th class="text-center"><div class="th-content"></div>Places Start</th>
                                        <th class="text-center"><div class="th-content"></div>Places Destination</th>
                                        <th class="text-center"><div class="th-content">Active</div></th>
                                        <th class="text-center"><div class="th-content"></div>Edit</th>
                                        <th class="text-center"><div class="th-content"></div>Delete</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(rate,index) in rates" :key="index">

                                        <td class="text-center">{{(index+1)}}</td>
                                        <td class="text-center">{{rate.id}}</td>
                                        <td class="text-center">{{rate.rate}}</td>

                                        <td class="text-center">{{rate.passenger_category_name}}</td>

                                        <td class="text-center">{{rate.places_id_start}}</td>

                                        <td class="text-center">{{rate.places_id_destination}}</td>

                                        <td class="text-center">
                                            <div v-if="rate.active == 1">
                                            <span class="shadow-none badge badge-primary">Active</span>
                                            </div>
                                            <div v-else>
                                            <span class="shadow-none badge badge-warning">De-Active</span>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button
                                                    class="btn btn-primary mb-2 mx-4"
                                                    @click="setToUpdate(rate.id, rate.rate, rate.active,)"
                                                    data-toggle="modal"
                                                    data-target="#editRatesModal">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>Edit
                                                </button>
                                                <!-- <button v-if="admin.user_active == 1" class="btn btn-danger mb-2" @click="deleteUser(admin.id)">
                                                    <i class="fa fa-remove" aria-hidden="true"></i> Temparary Block
                                                </button> -->
                                            </div>
                                        </td>

                                        <td class="text-center">
                                            <button class="btn btn-danger mb-2"
                                                @click="destroyRates(rate.id)" >
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
                    <div class="modal fade bd-example-modal-lg" id="editRatesModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <!-- <div  class="modal fade modal-xl" id="editBrandModal" tabindex="-1" role="dialog" aria-labelledby="addContactModalTitle" aria-hidden="true"> -->
                        <!-- <div class="modal-dialog modal-dialog-centered" role="document"> -->
                            <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Rate</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                            <input type="number" id="c-location" class="form-control" v-model="edit_rate" placeholder="ex: €12.65">
                                                        </div>
                                                    </div>


                                                        <div class="form-group row">
                                                            <label for="staticEmail" class="col-sm-4 col-form-label text-center">Active State</label>
                                                            <div class="col-sm-8">
                                                            <select id="inputState" class="form-control" @change="get_select_active_state_edit($event)">
                                                                <option :selected="edit_active==1" value="1">Active</option>
                                                                <option :selected="edit_active==0" value="0">Deactive</option>
                                                            </select>
                                                            </div>
                                                        </div>



                                                </form>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button id="btn-edit" class="float-left btn btn-success"   @click="editRates" data-dismiss="modal" >Edit</button>

                                    <button class="btn btn-secondary" data-dismiss="modal"> <i class="flaticon-delete-1"></i> Cancel</button>

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
    data(){
        return{
            rates:[],

            id: null,
            rate : null,
            deleted:null,
            active : null,
            pasenger_categories_id : null,
            places_id_name_start : null,
            places_id_destination : null,
            
            passengerCategory:null,
            passengerCategories:[],

            places:[],
            splace_name:null,
            eplace_name:null,
            //place:null,

            
            

            edit_id:null,
            edit_rate :null,
            edit_deleted:null,
            edit_active : null,


            errors : [],


            //TO show and hide create form
            show_create_form: 0,
        }
    },

     mounted(){
        this.fetchRates();
        this.fetchPassengerCategories();
        this.fetchPlaces();
    },



    methods:{

        reset(){
            // this.genders = [];
            this.startplaces = null;
            this.endplaces = null;
            this.passengerCategory=null;
            this.tourCategoriesid = null;
            this.place=null;
            this.placesid=null;
            this.id = null;
            this.name = null;
            this.shortName=null;
            this.delete=null;
            this.active=null,
            this.pasenger_categories_id = null,
            this.place_name_start = null,
            this.place_name_destination = null,


            this.splace_name = null,
            this.eplace_name = null,
            

            //for edit purpose
            this.edit_id = null;
            this.edit_rate = null;
            this.edit_active = null;
        },

        setToUpdate(id,rate,active){

            this.edit_id = id;
            this.edit_rate = rate;
            this.edit_active = active;

        },

        fetchRates() {
            axios.get("/admin/fetch/rates")
                .then((res) => {

                    if (res.status == 200) {
                        console.log(res);
                        this.rates = res.data;
                    }

                })
                .catch((err) => {console.log("error:" + err);});
            },

        set_passengerCategory_name(event) {
          var passengerCategory_id = event.target.value;
          //console.log("5");

          if(passengerCategory_id != null)
          {
            this.passengerCategoriesid = passengerCategory_id;
          }
          else
          {
            this.passengerCategoriesid = null;
          }
        },

        set_start_place_name(event){
            var s_place_name = event.target.value;
            //console.log("5");

            if(s_place_name != null)
            {
                this.splace_name = s_place_name;
            }
            else
            {
                this.splace_name = null;
            }
        },

        set_end_place_name(event){
            var e_place_name = event.target.value;
            //console.log("5");

            if(e_place_name != null)
            {
                this.eplace_name = e_place_name;
            }
            else
            {
                this.eplace_name = null;
            }
        },

            fetchPassengerCategories() {
             
            axios.get("/admin/fetch/passengerCategories")
                .then((res) => {

                    if (res.status == 200) {
                        console.log(res);

                        this.passengerCategories = res.data;
                    }

                })
                .catch((err) => {console.log("error:" + err);});
            },

            fetchPlaces() {
             
            axios.get("/admin/fetch/placesToRates")
                .then((res) => {

                    if (res.status == 200) {
                        console.log(res);

                        this.places = res.data;
                        
                    }

                })
                .catch((err) => {console.log("error:" + err);});
            },

                    //create user method
        createRates(){ 

            document.getElementById("submit").disabled = true;
            this.errors = [];

    
            if (this.splace_name == this.eplace_name){

                    {
                        Swal.fire("Error", "Start and Destination cannot be Same!", "error");
                    }

            }
            else {


               axios.post("/admin/create/rates", {
                    rate:this.rate,
                    passengerCategory:this.passengerCategory,
                    startplaces:this.splace_name,
                    endplaces:this.eplace_name,
                   
                }).then((res) => {

                    if (res.status == 200 && res.data == 1) {
                    console.log(res);
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Successfully Inserted a Rate',
                            showConfirmButton: false,
                            timer: 1500
                            })

                        this.reset();
                        this.fetchPassengerCategories();
                        this.fetchPlaces();
                        this.fetchRates();

                        // this.$router.push('/admin/view-admins');

                    }

                }).catch((err) => {

                    if (err.response.status == 422){
                        this.errors = err.response.data.errors;
                        Swal.fire(
                       "Error", "Reservations Inserted unsuccessfull!", "error"
                        );
                    }
                });         

            }
            document.getElementById("submit").disabled = false;
        },



            deleteUser(id) {
            Swal.fire({
                title: "Block user?",
                text: "Are you sure?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                confirmButtonText: "Yes, Block it!",
                closeOnConfirm: true,
            }).then((e) => {

                if (e.isConfirmed) {
                        axios.delete("/admin/delete/admin/" + id)
                            .then((res) => {
                                console.log('response here..');
                            if (res.status == 200 && res.data == 1) {
                                console.log(res);
                                Swal.fire("Success", "Rate Block Successfull!", "success");
                                // this.reset();
                                this.fetchRates();
                            } else {
                                Swal.fire("Error", "Rate Block unsuccessfull!", "error");
                            }
                            })
                            .catch((err) => {});
                        }
                    });
        },


        get_select_active_state_edit(event){
        this.edit_active = event.target.value;

        },


        editRates(){

            // if(this.edit_active == null){
            //     this.edit_active = this.active;
            // }

            axios
                .put("/admin/update/rates", {
                            id: this.edit_id,
                            rate: this.edit_rate,
                            active:this.edit_active,
                })
                .then((res) => {
                    if (res.status == 200 && res.data == 1) {
                            Swal.fire("Success", "Rate update Successfull!", "success");
                            this.reset();
                            this.fetchRates();

                            // $("#update_close_btn").click();
                    } else {
                            Swal.fire("Error", "Rate update unsuccessfull!", "error");
                        }
                })
                .catch((err) => {
                    if (err.response.status == 422)
                            // this.uerrors = err.response.data.errors;
                        Swal.fire("Error", "Rate update unsuccessfull!", "error");
                });

        },

        destroyRates(id){

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



                    axios.post("/admin/destroy/rates", {
                            id: id,
                        }).then((res) => {

                            if (res.status == 200 && res.data == 1) {

                              Swal.fire(
                                'Deleted!',
                                'Rate has been deleted.',
                                'success'
                                )

                                this.reset();
                                this.fetchRates();

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
    }
}
</script>
