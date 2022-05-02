<template>
     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget-two">
                <div class="widget-content">
                        <div class="w-numeric-value">
                            <div class="w-content">
                                <span class="w-value">Create User</span>
                                <span class="w-numeric-title">Go to columns for details.</span>
                            </div>

                        </div>

                        <!-- Create User Form Start -->

                        <form method="POST"  enctype="multipart/form-data" @submit.prevent="createUser">

                            <div  style="margin:50px">


                                                    <div class="row mb-4">
                                                        <div class="col" >
                                                            <label for="exampleFormControlInput1">Full Name</label>
                                                            <input type="text" :class="errors.full_name ? 'form-control is-invalid':'form-control'" placeholder="Full name" v-model="full_name">
                                                            <small v-if="errors.full_name" class="text-danger">{{ errors.full_name[0] }}</small>
                                                        </div>
                                                        <div class="col">
                                                            <label for="exampleFormControlInput1">Email</label>
                                                            <input type="email" :class="errors.email ? 'form-control is-invalid':'form-control'"  placeholder="Email" v-model="email">
                                                            <small v-if="errors.email" class="text-danger">{{errors.email[0]}}</small>
                                                        </div>
                                                    </div>


                                                    <div class="row mb-4">
                                                        <div class="col">
                                                            <label for="exampleFormControlInput1">Password</label>
                                                            <input type="password" class="form-control" :class="errors.password ? 'form-control is-invalid':'form-control'" placeholder="Password" v-model="password">
                                                            <small v-if="errors.password" class="text-danger">{{errors.password[0]}}</small>
                                                        </div>
                                                        <div class="col">
                                                            <label for="exampleFormControlInput1">Confirm Password</label>
                                                            <input type="password" class="form-control"  placeholder="Confirm Password" v-model="password_confirmation" >

                                                        </div>
                                                    </div>

                                                    <div class="row mb-4">
                                                        <div class="col-6">
                                                             <div class="custom-file mb-4">
                                                                <input type="file" :class="errors.image ? 'form-control custom-file-input is-invalid':'form-control custom-file-input'"  id="customFile" @change="onImageChange" >
                                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                                                <small v-if="errors.image" class="text-danger">{{errors.image[0]}}</small>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div v-if="imagepreview" style="margin-top: -5px; margin-buttom:50px">
                                                        <img :src="imagepreview"  style="border-radius: 50%;" alt="" width="150px" height="150px">
                                                    </div><br>

                                                    <input type="submit" value="sumnit" class="btn btn-primary">

                            </div>

                        </form>
                        <!-- Create User Form End  -->

                </div>
            </div>
        </div>
</template>


<script>


export default {
    data(){
        return{
            id:null,
            full_name :null,
            email :null,
            password :null,
            password_confirmation :null,
            pro_image :null,
            image: null,
            imagepreview:null,
            name:null,
            submitStatus: null,


            errors : [],
        };
    },




    methods:{

        //reset Variables
         reset() {
            this.id = null;
            this.full_name = null;
            this.email = null;
            this.password = null;
            this.password_confirmation = null;
            this.pro_image = null;
            this.image = null;
            this.imagepreview = null;

            this.errors = null;
        },


        //create user method
        createUser(){

            this.errors = [];

               axios.post("/admin/create/admin", {
                    full_name: this.full_name,
                    email: this.email,
                    image: this.image,
                    password: this.password,
                    password_confirmation : this.password_confirmation,
                }).then((res) => {

                    if (res.status == 200 && res.data == 1) {

                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Successfully Insert a Admin',
                            showConfirmButton: false,
                            timer: 1500
                            })

                        this.reset();

                        this.$router.push('/admin/view-admins');

                    }

                }).catch((err) => {

                    if (err.response.status == 422){
                        this.errors = err.response.data.errors;
                    }
                });

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


    }
}
</script>
