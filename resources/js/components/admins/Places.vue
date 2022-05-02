<template>

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">

    <div class="row col-12">


        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget-two">
                            <div class="widget-content">
                                <div class="w-numeric-value">
                                    <div class="w-content">
                                        <span class="w-value">Places</span>
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
                                <span class="w-value">Create a Place</span>
                            </div>
                            <div class="w-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                            </div>
                        </div>




                             <div  style="margin:50px">

                             <div class="widget-content">

                                                         <!-- Create User Form Start -->

                        <form method="POST"  enctype="multipart/form-data" @submit.prevent="createPlaces">

                            <div  style="margin:50px">


                                                    <div class="row mb-4">
                                                        
                                                        <div class="col">
                                                            <label for="exampleFormControlInput1">Name</label>
                                                            <input type="name" :class="errors.name ? 'form-control is-invalid':'form-control'"  placeholder="Name" v-model="name">
                                                            <small v-if="errors.name" class="text-danger">{{errors.name[0]}}</small>
                                                        </div>

                                                        <div class="col">
                                                            <label for="exampleFormControlInput1">Short Name</label>
                                                            <input type="shortName" class="form-control" :class="errors.short_name? 'form-control is-invalid':'form-control'" placeholder="Short Name" v-model="short_name">
                                                            <small v-if="errors.short_name" class="text-danger">{{errors.short_name[0]}}</small>
                                                        </div>
                                                    </div>

                                                    <!-- <div class="row mb-4">
                                                        <div class="col">
                                                            <label for="exampleFormControlInput1">Short Name</label>
                                                            <input type="shortName" class="form-control" :class="errors.short_name? 'form-control is-invalid':'form-control'" placeholder="Short Name" v-model="short_name">
                                                            <small v-if="errors.short_name" class="text-danger">{{errors.short_name[0]}}</small>
                                                        </div>
            
                                                   
                                                    </div> -->
                                                    <!-- <div class="row mb-4">
                                                        <div class="col-6">
                                                             <div class="custom-file mb-4">
                                                                <input type="file" :class="errors.image ? 'form-control custom-file-input is-invalid':'form-control custom-file-input'"  id="customFile" @change="onImageChange" >
                                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                                                <small v-if="errors.image" class="text-danger">{{errors.image[0]}}</small>
                                                            </div>
                                                        </div>
                                                    </div> -->

                                                    <!-- <div v-if="imagepreview" style="margin-top: -5px; margin-buttom:50px">
                                                        <img :src="imagepreview"  style="border-radius: 50%;" alt="" width="150px" height="150px">
                                                    </div><br> -->

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
                                <span class="w-value">Places View</span>
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
                                        <th class="text-center"><div class="th-content">Short Name</div></th>
                                        <th class="text-center"><div class="th-content">Active</div></th> 
                                        <th class="text-center"><div class="th-content">Edit</div></th>
                                        <th class="text-center"><div class="th-content">Deleted</div></th>
                                        <!-- <th class="text-center"><div class="th-content">Active</div></th> -->
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(place, index) in places" :key="index">
                                       
                                        <td class="text-center">{{index+1}}</td>
                                        <td class="text-center">{{place.id}}</td>
                                        <td class="text-center">{{place.name}}</td>
                                        <td class="text-center">{{place.short_name}}</td>

                                         <td class="text-center">
                                        <div v-if="place.active  == 1">
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
                                                    @click="setToUpdate(place.id,  place.name, place.short_name,place.active)"
                                                    data-toggle="modal"
                                                    data-target="#editPlacesModal" >
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>Edit
                                                </button>
      
                                            </div>
                                        </td>

                                        <td class="text-center">
                                            <button class="btn btn-danger mb-2"
                                                @click="destroyPlaces(place.id)" >
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
                                 <div class="modal fade bd-example-modal-lg" id="editPlacesModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <!-- <div  class="modal fade modal-xl" id="editBrandModal" tabindex="-1" role="dialog" aria-labelledby="addContactModalTitle" aria-hidden="true"> -->
                                        <!-- <div class="modal-dialog modal-dialog-centered" role="document"> -->
                                            <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Place</h5>
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
                                                                         <input type="name" id="c-location" class="form-control" v-model="edit_name" placeholder="ex: john Doe">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="staticEmail" class="col-sm-4 col-form-label text-center">Short Name</label>
                                                                    <div class="col-sm-8">
                                                                         <input type="shortName" id="c-location" class="form-control" v-model="edit_short_name" placeholder="ex: johnny">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="staticEmail" class="col-sm-4 col-form-label text-center">Active State</label>
                                                                    <div class="col-sm-8">
                                                                        <select id="inputState" class="form-control" @change="get_select_active_state_edit($event)">
                                                                                    <option :selected="active==1" value="1">Active</option>
                                                                                    <option :selected="active==0" value="0">De-Active</option>
                                                                        </select>
                                                                    </div>
                                                                </div>



                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button id="btn-edit" class="float-left btn btn-success"   @click="editPlaces" data-dismiss="modal" >Edit</button>

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
            places:[],

            id: null,
            name : null,
            short_name :null,     
            deleted:null,
            active : null,

            edit_id:null,
            edit_short_name:null,
            edit_name :null,
            edit_active : null,
            edit_short_name:null,
            edit_deleted:null,
            edit_active: null,

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
        this.fetchPlaces();
    },



    methods:{

        reset(){
            // this.genders = [];
            // this.places=[];
            this.id = null;
            this.name = null;
            this.short_name=null;
            this.active = null;
            

            //for edit purpose
            this.edit_id = null;
            this.edit_name = null;
            this.edit_short_name=null;
            this.edit_active = null;

        },

        setToUpdate(id,name,short_name,active){

            //this.places=[];
           // this.id=id;
            this.edit_id = id;
            this.edit_short_name=short_name;
            this.edit_name = name;
            this.edit_active = active;

        },


         fetchPlaces() {
            axios.get("/admin/fetch/places")
                .then((res) => {

                    if (res.status == 200) {
                        console.log(res);
                        this.places = res.data;
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



                    //create user method
        createPlaces(){
           // document.getElementById("submit").disabled = true;
            this.errors = [];

               axios.post("/admin/create/places", {//access web.php Route::prefix('/admin') 

                
                   name:this.name,
                   short_name:this.short_name,
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
                        this.fetchPlaces();

                        // this.$router.push('/admin/view-admins');

                    }

                }).catch((err) => {

                    if (err.response.status == 422){
                        this.errors = err.response.data.errors;
                        Swal.fire(
                       "Error", "Places destroyed unsuccessfull!", "error"
                        );
                    }
                });
               // document.getElementById("submit").disabled = false;

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


        //image click proccess and image preview
        createImage(file) {
            let reader = new FileReader();
            let vm = this;
            reader.onload = (e) => {
                vm.image = e.target.result;
            };
            reader.readAsDataURL(file);
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
                                Swal.fire("Success", "Passenger Blocked Successfull!", "success");
                                // this.reset();
                                this.fetchPlaces();
                            } else {
                                Swal.fire("Error", "Passenger Blocked unsuccessfull!", "error");
                            }
                            })
                            .catch((err) => {});
                        }
                    });
        },


        get_select_active_state_edit(event){
        this.edit_active = event.target.value;

        },


        editPlaces(){

            // if(this.edit_active == null){
            //     this.edit_active = this.active;
            // }

            axios
                .put("/admin/update/places", {
                            id: this.edit_id,
                            name: this.edit_name,
                            short_name: this.edit_short_name,
                            active:this.edit_active,
                })
                .then((res) => {
                    if (res.status == 200 && res.data == 1) {
                            Swal.fire("Success", "Places updated Successfull!", "success");
                            this.reset();
                            this.fetchPlaces();

                            // $("#update_close_btn").click();
                    } else {
                            Swal.fire("Error", "Places updated unsuccessfull!", "error");
                        }
                })
                .catch((err) => {
                    if (err.response.status == 422)
                            // this.uerrors = err.response.data.errors;
                        Swal.fire("Error", "Places updated unsuccessfull!", "error");
                });

        },

        destroyPlaces(id){

            Swal.fire({
                    title: '(Delete a Place) Are you sure?',
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



                    axios.put("/admin/destroy/places", {
                            id: id,
                            deleted:this.deleteStateChange,
                        }).then((res) => {

                            if (res.status == 200 && res.data == 1) {

                              Swal.fire(
                                'Deleted!',
                                'Place has been deleted.',
                                'success'
                                )

                                // this.reset();
                                    this.fetchPlaces();

                            }else{
                                Swal.fire("Error", "Place destroyed unsuccessfull!", "error");
                            }

                        }).catch((err) => {

                            if (err.response.status == 422){
                                // this.errors = err.response.data.errors;
                                Swal.fire("Error", "Place destroyed unsuccessfull!", "error");
                            }
                        });


                    }
                    })



        }




    }
}
</script>