<template>

    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="row col-12">


    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget-two">
                    <div class="widget-content">
                        <div class="w-numeric-value">
                            <div class="w-content">
                                <span class="w-value">Tours View</span>
                                <span class="w-numeric-title">Go to columns for details.</span>
                            </div>
                    </div>
                    </div>

        <div  style="margin:50px">
        <div class="widget-content">
            <div class="table-responsive table-wrapper">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center"><div class="th-content">Index</div></th>
                            <th class="text-center"><div class="th-content">ID</div></th>
                            <th class="text-center"><div class="th-content">Customer Name</div></th>
                            <th class="text-center"><div class="th-content">Telephone</div></th>
                            <th class="text-center"><div class="th-content">Email</div></th>
                            <th class="text-center"><div class="th-content">Adult Passengers</div></th>
                            <th class="text-center"><div class="th-content">Child Passengers</div></th>
                            <th class="text-center"><div class="th-content">Additional Note</div></th>
                            <th class="text-center"><div class="th-content">Arrival Pickup Address</div></th>
                            <th class="text-center"><div class="th-content">Arrival Drop Address</div></th>
                            <th class="text-center"><div class="th-content">Departure Pickup Address</div></th>
                            <th class="text-center"><div class="th-content">Departure Drop Address</div></th>
                            <th class="text-center"><div class="th-content">Flight or Train Arrival Date</div></th>
                            <th class="text-center"><div class="th-content">Flight or Train Arrival Time</div></th>
                            <th class="text-center"><div class="th-content">Flight or Train Departure Date</div></th>
                            <th class="text-center"><div class="th-content">Flight or Train Departure Time</div></th>
                            <th class="text-center"><div class="th-content">Arrival Flight or Train Number</div></th>
                            <th class="text-center"><div class="th-content">Departure Flight or Train Number</div></th>
                            <th class="text-center"><div class="th-content">Arrival Flight or Train Comming From</div></th>
                            <th class="text-center"><div class="th-content">Total Price</div></th>
                            <th class="text-center"><div class="th-content">Rates ID</div></th>
                            <th class="text-center"><div class="th-content">Status</div></th>
                            <th class="text-center"><div class="th-content">Edit</div></th>
                            <th class="text-center"><div class="th-content">Delete</div></th>
                        </tr>
                    </thead>
                    <tbody>


                <tr v-for="(tour, index) in tours" :key="index">
                
                         <td class="text-center">{{(index+1)}}</td>
                        <td class="text-center">{{tour.id}}</td>
                        <td class="text-center">{{tour.customer_name}}</td>
                        <td class="text-center">{{tour.telephone}}</td>
                        <td class="text-center">{{tour.email}}</td>
                        <td class="text-center">{{tour.adults_passengers}}</td>
                        <td class="text-center">{{tour.child_passengers}}</td>
                        <td class="text-center">{{tour.additional_note}}</td>
                        <td class="text-center">{{tour.arrival_pickup_address}}</td>
                        <td class="text-center">{{tour.arrival_drop_address}}</td>
                        <td class="text-center">{{tour.departure_pickup_address}}</td>
                        <td class="text-center">{{tour.departure_drop_address}}</td>
                        <td class="text-center">{{tour.flight_or_train_arrival_date }}</td>
                        <td class="text-center">{{tour.flight_or_train_arrival_time }}</td>
                        <td class="text-center">{{tour.flight_or_train_departure_date }}</td>
                        <td class="text-center">{{tour.flight_or_train_departure_time }}</td>
                        <td class="text-center">{{tour.arrival_flight_or_train_number}}</td>
                        <td class="text-center">{{tour.departure_flight_or_train_number}}</td>
                        <td class="text-center">{{tour.arrival_flight_or_train_coming_from}}</td>
                        <td class="text-center">{{tour.total_price}}</td>
                        <td class="text-center">{{tour.rates_id}}</td>
                      
                        <td class="text-center">
                            <div v-if="tour.status == 1">
                                <span class="shadow-none badge badge-primary">Confirm</span>
                            </div>
                            <div v-else-if="tour.status == 0">
                                <span class="badge bg-danger">Reject</span>
                            </div>
                            <div v-else>
                                <span class="badge bg-warning text-dark">pending</span>
                            </div>
                        </td>

                        <td class="text-center">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button
                                class="btn btn-primary mb-2 mx-4"
                                @click="setToUpdate(tour.id,tour.status)"
                                data-toggle="modal"
                                data-target="#editTourModal" >
                                <i class="fa fa-pencil" aria-hidden="true"></i>Edit
                            </button>
                            <!-- <button v-if="admin.user_active == 1" class="btn btn-danger mb-2" @click="deleteUser(admin.id)">
                                <i class="fa fa-remove" aria-hidden="true"></i> Temparary Block
                            </button> -->
                        </div>
                    </td>
                        

                    <td class="text-center">
                        <button class="btn btn-danger mb-2"
                            @click="destroyTours(tour.id)" >
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
        <div class="modal fade bd-example-modal-lg" id="editTourModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <!-- <div  class="modal fade modal-xl" id="editBrandModal" tabindex="-1" role="dialog" aria-labelledby="addContactModalTitle" aria-hidden="true"> -->
            <!-- <div class="modal-dialog modal-dialog-centered" role="document"> -->
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Tours</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

        
                    <!-- <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label text-center">status</label>
                        <div class="col-sm-8">
                                <input type="name" id="c-location" class="form-control" v-model="edit_status" placeholder="ex: john Doe">
                        </div>
                    </div> -->
                
                    <div class="modal-body">
                        <i class="flaticon-cancel-12 close" data-dismiss="modal"></i>
                        <div class="add-contact-box">
                            <div class="add-contact-content">
                                    <form id="addContactModalTitle">

                                        <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-4 col-form-label text-center">Status</label>
                                        <div class="col-sm-8">
                                        <select id="inputState" class="form-control" @change="get_select_state_edit($event)">
                                            <option :selected="edit_status==0" value="0">Reject</option>
                                            <option :selected="edit_status==1" value="1">Confirm</option>
                                            <option :selected="edit_status==2" value="2">Pending</option>
                                        </select>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="btn-edit" class="float-left btn btn-success"   @click="editTours" data-dismiss="modal" >Edit</button>

                        <button class="btn btn-secondary" data-dismiss="modal"> <i class="flaticon-delete-1"></i> Cancel</button>

                    </div>
                </div>
            </div>
        </div>
        </div>
                    </div>
        </div>
    </div>
    
        <!--  End Model -->

        





</template>

<script>
export default {
    data(){
        return{
            tourCategories:[],
            tours:[],

            name: null,
            id :null,
           // status : [],
            deleted:null,
            created_at:null,
            update_at:null,
            state:null,
            
            
            //edit_update_at:null,
            edit_id:null,
            edit_name :null,
            edit_email :null,
            edit_status : null,
            edit_created_at:null,
            edit_update_at:null,
            edit_deleted: null,
            edit_state :null,

            pro_image :null,
            image: null,
            imagepreview:null,
            name:null,
            submitStatus: null,

            deleteStateChange : 1,


            errors : [],


            //TO show and hide create form
            show_create_form: 0,
        }
    },

     mounted(){
        this.fetchTours();
        this.fetchRates();
    },



    methods:{

        reset(){
            // this.genders = [];
            // this.tourCategories=[];
            // this.tours=[];
            this.id = null;
            this.name = null;
            this.descript = null
            this.image = null;
            this.imagepreview = null;
            this.status=null;
            this.delete=null;
            this.created_at=null;
            this.update_at=null;
            this.state = null;
            
            //for edit purpose
            this.edit_id = null;
            this.edit_name = null;
            this.edit_descript = null;
            this.edit_image = null;
            this.imagepreview_edit = null;
            this.edit_status = null;
        },

        setToUpdate(id,status){
            
            this.edit_id = id;
            this.edit_status = status;

        },
             
            fetchTours() {
            axios.get("/admin/fetch/tours")
                .then((res) => {

                    if (res.status == 200) {
                        console.log(res);
                        this.tours= res.data;
                    }

                })
                .catch((err) => {console.log("error:" + err);});
            },

            fetchRates() {
            axios.get("/admin/fetch/ratesToTours")
                .then((res) => {

                    if (res.status == 200) {
                        console.log(res);
                        this.rates= res.data;
                    }

                })
                .catch((err) => {console.log("error:" + err);});
            },




        //image click proccess and image preview
        onImageChange(e) {
            this.image = e.target.files[0];
            let reader = new FileReader();
            reader.readAsDataURL(this.image);
            reader.onload = e => {
                this.imagepreview = e.target.result;
            };

            let files = e.target.files || e.dataTransfer.files;

            if (!files.length)
                return;

            this.createImage(files[0]);
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
                                Swal.fire("Success", "Admin Block Successfull!", "success");
                                // this.reset();
                                this.fetchTours();
                            } else {
                                Swal.fire("Error", "Admin Block unsuccessfull!", "error");
                            }
                            })
                            .catch((err) => {});
                        }
                    });
        },


        get_select_state_edit(event){

        this.edit_status = event.target.value;

        },


        editTours(){


            axios.put("/admin/update/tours", {
                            id: this.edit_id,
                            status: this.edit_status,
                })
                .then((res) => {
                    if (res.status == 200 && res.data == 1) {
                            Swal.fire("Success", "Tour update Successfull!", "success");
                            //this.reset();
                            this.fetchTours();

                            // $("#update_close_btn").click();
                    } else {
                            Swal.fire("Error", "Tour update unsuccessfull!", "error");
                        }
                })
                .catch((err) => {
                    if (err.response.status == 422)
                            // this.uerrors = err.response.data.errors;
                        Swal.fire("Error", "Tour update unsuccessfull!", "error");
                });

        },

        /**
         * Descripion
         * 
         * @param TourCategories id
         * @returns void
         */
        destroyTours(id){

            Swal.fire({
                    title: '(Delete a Tour?) Are you sure?',
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

                    console.log(`delete id = ${id}`);

                    axios.post("/admin/destroy/tours", {
                            id: id,
                        }).then((res) => {
                            console.log(`delete res = ${res}`);
                            if (res.status == 200 && res.data == 1) {

                                Swal.fire(
                                    'Deleted!',
                                    'Tour has been deleted.',
                                    'success'
                                )

                                // this.reset();
                                this.fetchTours();

                            }else{
                                Swal.fire("Error", "Tour destroy Successfull!", "error");
                            }

                        }).catch((err) => {
                            console.log(`Error = ${err}`);
                            if (err.response.status == 422){
                                // this.errors = err.response.data.errors;
                                Swal.fire("Error", "Tour destroy Unsuccessfull!", "error");
                            }
                        });
                        }
                    })



        }




    }
}
</script>
<style>
.table-wrapper{
    display: block;
    overflow-x: auto;
    height: 400px;
    white-space: noerap;
}
</style>