<template>

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">

        <div class="row col-12">


            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget-two">
                    <div class="widget-content">
                        <div class="w-numeric-value">
                            <div class="w-content">
                                <span class="w-value">Passenger Categories</span>
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
                                <span class="w-value">Create Passenger Categories</span>
                            </div>
                            <div class="w-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                            </div>
                        </div>




                             <div  style="margin:50px">

                             <div class="widget-content">

                                                         <!-- Create User Form Start -->

            <form method="POST"  enctype="multipart/form-data" @submit.prevent="createPassenger">

                <div  style="margin:50px">


                <div class="row mb-4">
                    <div class="col">
                        <label for="exampleFormControlInput1">Full Name</label>
                        <input type="text" :class="errors.name ? 'form-control is-invalid':'form-control'" placeholder="Full Name" v-model="name">
                        <small v-if="errors.name" class="text-danger">{{ errors.name[0] }}</small>
                    </div>

                    <div class="col">
                        <label for="exampleFormControlInput1">Passenger Count</label>
                        <input type="number" :class="errors.passenger_count ? 'form-control is-invalid':'form-control'" placeholder="Passenger Categories" v-model="passenger_count">
                        <small v-if="errors.passenger_count" class="text-danger">{{ errors.passenger_count[0] }}</small>
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
                        <span class="w-value">Passenger Categories View</span>
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
                        <th class="text-center"><div class="th-content">Count</div></th>
                        <th class="text-center"><div class="th-content">Id</div></th>
                        <th class="text-center"><div class="th-content">Name</div></th>
                        <th class="text-center"><div class="th-content">passenger Count</div></th>
                        <th class="text-center"><div class="th-content">Active</div></th>
                        <th class="text-center"><div class="th-content">Edit</div></th>
                        <th class="text-center"><div class="th-content">Delete</div></th>
                    </tr>
                </thead>

                <tbody>
                    <tr v-for="(passengerCategory,index) in passengerCategories" :key="index">

                        <td class="text-center">{{(index+1)}}</td>
                        <td class="text-center">{{passengerCategory.id}}</td>
                        <td class="text-center">{{passengerCategory.name}}</td>
                        <td class="text-center">{{passengerCategory.passenger_count}}</td>
                        <td class="text-center">
                            <div v-if="passengerCategory.active  == 1">
                                <span class="shadow-none badge badge-primary">Active</span>
                             </div>
                            <div v-else>
                                <span class="shadow-none badge badge-warning">Deactive</span>
                            </div>
                         </td>
                        <td class="text-center">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button
                                    class="btn btn-primary mb-2 mx-4"
                                    @click="setToUpdate(passengerCategory.id,  passengerCategory.name, passengerCategory.passenger_count,passengerCategory.active)"
                                    data-toggle="modal"
                                    data-target="#editPassengerCategoriesModel" >
                                    <i class="fa fa-pencil" aria-hidden="true"></i>Edit
                                </button>
                                <!-- <button v-if="admin.user_active == 1" class="btn btn-danger mb-2" @click="deleteUser(admin.id)">
                                    <i class="fa fa-remove" aria-hidden="true"></i> Temparary Block
                                </button> -->
                            </div>
                        </td>
                        <td class="text-center">
                          <button class="btn btn-danger mb-2" @click="destroyPassengerCategories(passengerCategory.id)" >
                            <i class="fa fa-pencil" aria-hidden="true"></i>Delete
                          </button>
                        </td>
                        <!-- <td class="text-center">
                            <button class="btn btn-danger mb-2"
                                @click="destroyPassengerCategories(passengerCategory.id)" >
                                <i class="fa fa-pencil" aria-hidden="true"></i>Delete
                            </button>
                        </td> -->
                    <!-- </div> -->
                    </tr>



                
                </tbody>
            </table>
        </div>
    </div>
            </div>
 </div>
 </div>
    <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="editPassengerCategoriesModel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Passenger Categories</h5>
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
                                        <label for="staticEmail" class="col-sm-4 col-form-label text-center">Name</label>
                                        <div class="col-sm-8">
                                            <input type="name" id="c-location" class="form-control" v-model="edit_name"  placeholder="ex: john alex">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-4 col-form-label text-center">Name</label>
                                        <div class="col-sm-8">
                                            <input type="number" id="c-location" class="form-control" v-model="edit_passenger_count"  placeholder="ex: 5">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-4 col-form-label text-center">Active State</label>
                                        <div class="col-sm-8">
                                        <select id="inputState" class="form-control" @change="get_select_active_state_edit($event)">
                                        <option :selected="edit_active==1" value="1">Active</option>
                                        <option :selected="edit_active==0" value="0">De-Active</option>
                                    </select>
                                    </div>
                           </div>


                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="btn-edit" class="float-left btn btn-success"   @click="editPassengerCategories" data-dismiss="modal" >Edit</button>

                        <button class="btn btn-secondary" data-dismiss="modal"> <i class="flaticon-delete-1"></i> Cancel</button>

                    </div>
                </div>
            </div>
        </div>
        <!--  End Model -->
 </div>
</div>
    </div>
   

</template>

<script>
export default {
    data(){
        return{
            passengerCategories:[],

          
            name : null,
            id :null,
            active : null,
            passenger_count : null,
            deleted:null,
            active:null,

            edit_id:null,
            edit_name :null,
            edit_active : null,
            edit_passenger_count : null,
            edit_deleted : null,
            deleteStateChange : 1,

            errors : [],


            //TO show and hide create form
            show_create_form: 0,
        }
    },

     mounted(){
        this.fetchPassengerCategories();
    },



    methods:{

        reset(){
            // this.genders = [];
            this.id = null;
            this.name = null;
            this.passenger_count=null;
            this.active=null;
            this.delete = null;

            //for edit purpose
            this.edit_id = null;
            this.edit_name = null;
            this.edit_passenger_count = null;
            this.edit_active=null;
        },

        setToUpdate(id,name,passenger_count,active){

            this.edit_id = id;
            this.edit_name = name;
            this.edit_passenger_count = passenger_count;
            this.edit_active = active;

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


                    //create user method

        createPassenger(){
            document.getElementById("submit").disabled = true;
            this.errors = [];

                axios.post("/admin/create/passengerCategories", {
                    name : this.name,
                    passenger_count : this.passenger_count,
                }).then((res) => {

                    if (res.status == 200 && res.data == 1) {

                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Successfully Inserted Passenger Catgeory',
                            showConfirmButton: false,
                            timer: 1500
                            })

                        this.reset();
                        this.fetchPassengerCategories();

                    }

                }).catch((err) => {

                    if (err.response.status == 422){
                        this.errors = err.response.data.errors;
                    }
                });
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
                            Swal.fire("Success", "Passenger Categories Block Successfull!", "success");
                            // this.reset();
                            this.fetchPassengerCategories();
                        } else {
                            Swal.fire("Error", "Passenger Categories Block unsuccessfull!", "error");
                        }
                        })
                        .catch((err) => {});
                    }
                });
            },


        get_select_active_state_edit(event){
            
        this.edit_active = event.target.value;

        },


        editPassengerCategories(){

            axios.put("/admin/update/passengerCategories", {
                            id: this.edit_id,
                            name: this.edit_name,
                            passenger_count : this.edit_passenger_count,
                            active:this.edit_active,
                })
                .then((res) => {
                    if (res.status == 200 && res.data == 1) {
                            Swal.fire("Success", "Passenger Category update Successfull!", "success");
                            this.reset();
                            this.fetchAdmin();

                            // $("#update_close_btn").click();
                    } else {
                            Swal.fire("Error", "Passenger Category update unsuccessfull!", "error");
                        }
                })
                .catch((err) => {
                    if (err.response.status == 422)
                            // this.uerrors = err.response.data.errors;
                        Swal.fire("Error", "Passenger Category update unsuccessfull!", "error");
                });

        },
        
        destroyPassengerCategories(id){

            Swal.fire({
                    title: '(Delete a Passenger) Are you sure?',
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



                    axios.post("/admin/destroy/passengerCategories", {

                            id: id,

                        }).then((res) => {

                            if (res.status == 200 && res.data == 1) {

                              Swal.fire(
                                'Deleted!',
                                'Passenger Category has been deleted.',
                                'success'
                                )

                                this.reset();
                                this.fetchPassengerCategories();

                            }else{
                                Swal.fire("Error", "Passenger destroyed unsuccessfull!", "error");
                            }

                        }).catch((err) => {

                            if (err.response.status == 422){
                                // this.errors = err.response.data.errors;
                                Swal.fire("Error", "Passenger destroyed unsuccessfull!", "error");
                            }
                        });
                    }
                    })

        }

    }
}
</script>
