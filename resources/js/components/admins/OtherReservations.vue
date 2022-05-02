<template>

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">

    <div class="row col-12">


        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget-two">
                            <div class="widget-content">
                                <div class="w-numeric-value">
                                    <div class="w-content">
                                        <span class="w-value">Other Reservations</span>
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
                                <span class="w-value">Create a Reservations</span>
                            </div>
                            <div class="w-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                            </div>
                        </div>




                             <div  style="margin:50px">

                             <div class="widget-content">

<!-- =================================================================== Create User Form Start =========================================== -->

                        <form method="POST"  enctype="multipart/form-data" @submit.prevent="createOtherReservations">

                            <div  style="margin:50px">


                                                    <div class="row mb-4">
                                                        
                                                        <div class="col">
                                                            <label for="exampleFormControlInput1">Name</label>
                                                            <input type="name" :class="errors.name ? 'form-control is-invalid':'form-control'"  placeholder="Name" v-model="name">
                                                            <small v-if="errors.name" class="text-danger">{{errors.name[0]}}</small>
                                                        </div>

                                                        <div class="col">
                                                            <label for="exampleFormControlInput1">Hotel</label>
                                                            <input type="hotels" class="form-control" :class="errors.hotels? 'form-control is-invalid':'form-control'" placeholder="Hotel" v-model="hotels">
                                                            <small v-if="errors.hotels" class="text-danger">{{errors.hotels[0]}}</small>
                                                        </div>

                                                    </div>

                                                    <div class="row mb-4">
                                                        <div class="col">
                                                            <label for="exampleFormControlInput1">Room No</label>
                                                            <input type="text" class="form-control" :class="errors.room_no? 'form-control is-invalid':'form-control'" placeholder="Room No" v-model="room_no">
                                                            <small v-if="errors.room_no" class="text-danger">{{errors.room_no[0]}}</small>
                                                        </div>

                                                        <div class="col">
                                                            <label for="exampleFormControlInput1">City</label>
                                                            <input type="text" class="form-control" :class="errors.city? 'form-control is-invalid':'form-control'" placeholder="City" v-model="city">
                                                            <small v-if="errors.city" class="text-danger">{{errors.city[0]}}</small>
                                                        </div>

                                                    </div>

                                                    <input type="submit" id="submit" value="submit" class="btn btn-primary">

                            </div>

                        </form>

<!-- ======================================================= Create User Form End ========================================================== -->
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
                                <span class="w-value">Reservations View</span>
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
                                        <th class="text-center"><div class="th-content">Name</div></th>
                                        <th class="text-center"><div class="th-content">Hotels</div></th>
                                        <th class="text-center"><div class="th-content">Room No</div></th>
                                        <th class="text-center"><div class="th-content">City</div></th>
                                        <th class="text-center"><div class="th-content">Status</div></th> 
                                        <th class="text-center"><div class="th-content">Edit</div></th>
                                        <th class="text-center"><div class="th-content">Deleted</div></th>
                                        
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(otherReservation, index) in otherReservations" :key="index">
                                       
                                        <td class="text-center">{{index+1}}</td>
                                        <td class="text-center">{{otherReservation.id}}</td>
                                        <td class="text-center">{{otherReservation.name}}</td>
                                        <td class="text-center">{{otherReservation.hotels}}</td>
                                        <td class="text-center">{{otherReservation.room_no}}</td>
                                        <td class="text-center">{{otherReservation.city}}</td>

                                        <td class="text-center">
                                        <div v-if="otherReservation.status  == 1">
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
                                                    @click="setToUpdate(otherReservation.id, otherReservation.name,otherReservation.hotels,otherReservation.room_no,otherReservation.city,otherReservation.status)"
                                                    data-toggle="modal"
                                                    data-target="#editOtherReservationsModal" >
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>Edit
                                                </button>
      
                                            </div>
                                        </td>

                                        <td class="text-center">
                                            <button class="btn btn-danger mb-2"
                                                @click="destroyOtherReservations(otherReservation.id)" >
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

<!-- ============================================================== Modal ============================================================================================= -->

                                 <div class="modal fade bd-example-modal-lg" id="editOtherReservationsModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <!-- <div  class="modal fade modal-xl" id="editBrandModal" tabindex="-1" role="dialog" aria-labelledby="addContactModalTitle" aria-hidden="true"> -->
                                        <!-- <div class="modal-dialog modal-dialog-centered" role="document"> -->
                                            <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Reservations</h5>
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
                                                                         <input type="name" id="c-location" class="form-control" v-model="edit_name" placeholder="ex: John Doe">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="staticEmail" class="col-sm-4 col-form-label text-center">Hotels</label>
                                                                    <div class="col-sm-8">
                                                                         <input type="hotels" id="c-location" class="form-control" v-model="edit_hotels" placeholder="ex: Hôtel de Bourgogne">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="staticEmail" class="col-sm-4 col-form-label text-center">Room No</label>
                                                                    <div class="col-sm-8">
                                                                         <input type="text" id="c-location" class="form-control" v-model="edit_room_no" placeholder="ex: 5">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="staticEmail" class="col-sm-4 col-form-label text-center">City</label>
                                                                    <div class="col-sm-8">
                                                                         <input type="city" id="c-location" class="form-control" v-model="edit_city" placeholder="ex: Mâcon">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="staticEmail" class="col-sm-4 col-form-label text-center">Active State</label>
                                                                    <div class="col-sm-8">
                                                                        <select id="inputState" class="form-control" @change="get_select_state_edit($event)">
                                                                                    <option :selected="edit_status==1" value="1">Active</option>
                                                                                    <option :selected="edit_status==0" value="0">Deactive</option>
                                                                        </select>
                                                                    </div>
                                                                </div>



                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button id="btn-edit" class="float-left btn btn-success"   @click="editOtherReservations" data-dismiss="modal" >Edit</button>

                                                    <button class="btn btn-secondary" data-dismiss="modal"> <i class="flaticon-delete-1"></i> Cancel</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
<!-- =========================================== End Model ========================================================================= -->




            </div>
</div>
    </div>
    </div>

</template>

<script>
export default {
    data(){
        return{
            otherReservations:[],

            id: null,
            name : null,
            hotels:null, 
            room_no:null,
            city:null,    
            deleted:null,
            status : null,

            edit_id:null,
            edit_name :null,
            edit_hotels:null,
            edit_room_no:null,
            edit_city:null,
            edit_deleted:null,
            edit_status: null,

            pro_image :null,
            image: null,
            imagepreview:null,
            name:null,
            submitStatus: null,

            deleteStateChange:1,

            errors : [],


            //TO show and hide create form
            show_create_form: 0,
        }
    },

     mounted(){
        this.fetchOtherReservations();
    },



    methods:{

        reset(){
            // this.genders = [];
            // this.places=[];
            this.id = null;
            this.name = null;
            this.hotels=null;
            this.room_no=null;
            this.city=null;
            this.status = null;
            

            //for edit purpose
            this.edit_id = null;
            this.edit_name = null;
            this.edit_hotels=null;
            this.edit_room_no = null;
            this.edit_city = null;
            this.edit_status = null;

        },

        setToUpdate(id,name,hotels,room_no,city,status){

            //this.places=[];
           // this.id=id;
            this.edit_id = id;
            this.edit_name = name;
            this.edit_hotels = hotels;
            this.edit_room_no = room_no;
            this.edit_city= city;
            this.edit_status = status;
        },


         fetchOtherReservations() {
            axios.get("/admin/fetch/otherReservations")
                .then((res) => {

                    if (res.status == 200) {
                        console.log(res);
                        // alert("yolo");
                        this.otherReservations = res.data;
                    }

                })
                .catch((err) => {console.log("error:" + err);});
            },


        // fetchBrands() {
        //     axios
        //         .get("/admin/brands/fetch")
        //         .then((res) => {
        //             console.log(res);

        //         if (res.status == 200) {
        //             this.brands = res.data;
        //         }
        //         })
        //         .catch((err) => {});
        //     },



//==============================================create user method==================================================================
        
        createOtherReservations(){
           // document.getElementById("submit").disabled = true;
            this.errors = [];

               axios.post("/admin/create/otherReservations", {//access web.php Route::prefix('/admin') 
          
                   name:this.name,
                   hotels:this.hotels,
                   room_no:this.room_no,
                   city:this.city,

                }).then((res) => {

                    if (res.status == 200 && res.data == 1) {

                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Successfully Inserted a Place',
                            showConfirmButton: false,
                            timer: 1500
                            })

                        this.reset();
                        this.fetchOtherReservations();

                        // this.$router.push('/admin/view-admins');

                    }

                }).catch((err) => {

                    if (err.response.status == 422){
                        this.errors = err.response.data.errors;
                        Swal.fire(
                       "Error", "Reservations destroyed unsuccessfull!", "error"
                        );
                    }
                });
               // document.getElementById("submit").disabled = false;

        },


        //image click proccess and image preview
        // onImageChange(e) {
        //     this.image = e.target.files[0];
        //     let reader = new FileReader();
        //     reader.readAsDataURL(this.image);
        //     reader.onload = e => {
        //         this.imagepreview = e.target.result;
        //     };

        //     let files = e.target.files || e.dataTransfer.files;

        //     if (!files.length)
        //         return;

        //     this.createImage(files[0]);
        // },


        //image click proccess and image preview
        // createImage(file) {
        //     let reader = new FileReader();
        //     let vm = this;
        //     reader.onload = (e) => {
        //         vm.image = e.target.result;
        //     };
        //     reader.readAsDataURL(file);
        // },
 



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
                                Swal.fire("Success", "Passenger Blocked Successfull!", "success");
                                // this.reset();
                                this.fetchOtherReservations();
                            } else {
                                Swal.fire("Error", "Passenger Blocked unsuccessfull!", "error");
                            }
                            })
                            .catch((err) => {});
                        }
                    });
        },


        get_select_state_edit(event){
        this.edit_status = event.target.value;

        },


        editOtherReservations(){

            // if(this.edit_active == null){
            //     this.edit_active = this.active;
            // }

            axios
                .put("/admin/update/otherReservations", {
                            id: this.edit_id,
                            name: this.edit_name,
                            hotels: this.edit_hotels,
                            room_no:this.edit_room_no,
                            city:this.edit_city,
                            status:this.edit_status,
                })
                .then((res) => {
                    if (res.status == 200 && res.data == 1) {
                            Swal.fire("Success", "Reservations updated Successfull!", "success");
                            this.reset();
                            this.fetchOtherReservations();

                            // $("#update_close_btn").click();
                    } else {
                            Swal.fire("Error", "Reservations updated unsuccessfull!", "error");
                        }
                })
                .catch((err) => {
                    if (err.response.status == 422)
                            // this.uerrors = err.response.data.errors;
                        Swal.fire("Error", "Reservations updated unsuccessfull!", "error");
                });

        },

        destroyOtherReservations(id){

            Swal.fire({
                    title: '(Delete a Reservation) Are you sure?',
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



                    axios.post("/admin/destroy/otherReservations", {
                            id: id,
                            deleted:this.deleteStateChange,
                        }).then((res) => {

                            if (res.status == 200 && res.data == 1) {

                              Swal.fire(
                                'Deleted!',
                                'Reservations has been deleted.',
                                'success'
                                )

                                // this.reset();
                                    this.fetchOtherReservations();

                            }else{
                                Swal.fire("Error", "Reservations destroyed unsuccessfull!", "error");
                            }

                        }).catch((err) => {

                            if (err.response.status == 422){
                                // this.errors = err.response.data.errors;
                                Swal.fire("Error", "Reservations destroyed unsuccessfull!", "error");
                            }
                        });


                    }
                    })



        }




    }
}
</script>
