<template>

    <div class="layout-px-spacing">

        <div class="row layout-top-spacing">

        <div class="row col-12">
                
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                            <div class="widget-two">
                                <div class="widget-content">
                                    <div class="w-numeric-value">
                                        <div class="w-content">
                                            <span class="w-value">FAQ</span>
                                            <span class="w-numeric-title">Go to columns for details.</span><br><br>
                                            <button class="btn btn-primary" @click="show_create_form = ! show_create_form" >
                                                <span v-if="show_create_form == 0">Show Create Form</span>
                                                <span v-if="show_create_form == 1">Hide Create Form</span>
                                            </button>
                                        </div>
                                        
                                    </div>
                                    <div class="w-chart">
                                        <div id="daily-sales"></div>
                                    </div>
                                </div>
                            </div>
                    </div>

                  <!---------------------------------------------------------------------------------------- Create User Form Start --------------------------------------------------------------------------------->

                <div class="row col-12" v-if="show_create_form == 1">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget-two">
                            <div class="widget-content">
                                <div class="w-numeric-value">
                                    <div class="w-content">
                                        <span class="w-value">Create a FAQ</span>
                                    </div>
                                    <div class="w-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                    </div>
                                </div>

                                <div  style="margin:50px">
                                    <div class="widget-content">
                                        <form method="POST"  enctype="multipart/form-data" @submit.prevent="createFaqs">
                                            <div  style="margin:50px">

                                                <div class="form-group row">
                                                    <label for="staticEmail" class="col-sm-4 col-form-label text-center">Question</label>
                                                    <div class="col-sm-8">
                                                        <div class="form-group">
                                                            <textarea class="form-control" id="c-location" v-model="question" rows="3" placeholder="ex:What if I can not find the driver?"></textarea>
                                                        </div>
                                                        <!-- <input type="text" id="c-location" class="form-control" v-model="edit_question" placeholder="ex:What if I can not find the driver?"> -->
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="staticEmail" class="col-sm-4 col-form-label text-center">Answer</label>
                                                    <div class="col-sm-8">
                                                        <div class="form-group">
                                                            <textarea class="form-control" id="c-location" v-model="answer" rows="3" placeholder="ex:Our driver will be waiting in the airport building at the arrivals. With the Sign in his hand, which containing your name or the name you had provided in your booking"></textarea>
                                                        </div>
                                                        <!-- <input type="text" id="c-location" class="form-control" v-model="edit_answer" placeholder="ex:Call our support center at the number 00 386 40 805 761, where our assistent will help you quickly"> -->
                                                    </div>
                                        </div>

                                                <input type="submit" id="submit" value="submit" class="btn btn-primary">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                      <!--------------------------------------------------------- Create User Form End  -------------------------------------------------------------------------------------------------------------------------------------->


             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget-two">
                    <div class="widget-content">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center"><div class="th-content">Index</div></th>
                                        <th class="text-center"><div class="th-content">ID</div></th>
                                        <th class="text-center"><div class="th-content">Question</div></th>
                                        <th class="text-center"><div class="th-content">Answer</div></th>
                                        <th class="text-center"><div class="th-content">Status</div></th>
                                        <th class="text-center"><div class="th-content">Edit</div></th>
                                        <th class="text-center"><div class="th-content">Delete</div></th>
                                    </tr>
                                </thead>
                            <tbody>


                            <tr v-for="(faq, index) in faqs" :key="index">
                            
                                    <td class="text-center">{{(index+1)}}</td>
                                    <td class="text-center">{{faq.id}}</td>
                                    <td class="text-center">{{faq.question}}</td>
                                    <td class="text-center">{{faq.answer}}</td>

                                    <td v-if="faq.active == '1'" class="text-center">
                                        <div >
                                            <span class="shadow-none badge badge-primary">Active</span>
                                        </div>
                                    </td>
                                    <td v-else class="text-center">
                                        <div>
                                            <span class="badge bg-warning text-dark">De-Activate</span>
                                        </div>
                                    </td>

                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button
                                                class="btn btn-primary mb-2 mx-4"
                                                @click="setToUpdate(faq.id,faq.question,faq.answer,faq.active)"
                                                data-toggle="modal"
                                                data-target="#editFaqModal" >
                                                <i class="fa fa-pencil" aria-hidden="true"></i>Edit
                                            </button>
                                            <!-- <button v-if="admin.user_active == 1" class="btn btn-danger mb-2" @click="deleteUser(admin.id)">
                                                <i class="fa fa-remove" aria-hidden="true"></i> Temparary Block
                                            </button> -->
                                        </div>
                                    </td>
                                    

                                <td class="text-center">
                                    <button class="btn btn-danger mb-2"
                                        @click="destroyFaqs(faq.id)" >
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
        </div>

<!-- ======================================== Modal ==================================================================================== -->

        <div class="modal fade bd-example-modal-lg" id="editFaqModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <!-- <div  class="modal fade modal-xl" id="editBrandModal" tabindex="-1" role="dialog" aria-labelledby="addContactModalTitle" aria-hidden="true"> -->
            <!-- <div class="modal-dialog modal-dialog-centered" role="document"> -->
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit FAQ</h5>
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
                                            <label for="staticEmail" class="col-sm-4 col-form-label text-center">Question</label>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <textarea class="form-control" id="c-location" v-model="edit_question" rows="3" placeholder="What if I can not find the driver?"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-4 col-form-label text-center">Answer</label>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <textarea class="form-control" id="c-location" v-model="edit_answer" rows="3" placeholder="Our driver will be waiting in the airport building at the arrivals. With the Sign in his hand, which containing your name or the name you had provided in your booking"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-4 col-form-label text-center">FAQ</label>
                                                <div class="col-sm-8">
                                                    <select id="inputState" class="form-control" @change="get_select_state_edit($event)">
                                                        <option :selected="edit_active==1" value="1">Active</option>
                                                        <option :selected="edit_active==0" value="0">De-Activate</option>
                                                    </select>
                                                </div>
                                        </div>

                                    </form>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button id="btn-edit" class="float-left btn btn-success"   @click="editFaqs" data-dismiss="modal" >Edit</button>

                        <button class="btn btn-secondary" data-dismiss="modal"> <i class="flaticon-delete-1"></i> Cancel</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
<!-- =============================================  End Model ====================================================================== -->

        
</template>

<script>
export default {
    data(){
        return{
            faqs:[],

            name: null,
            id :null,
            question:null,
            answer:null,
            deleted:null,
            created_at:null,
            update_at:null,
            state:null,
            
            //edit_update_at:null,
            edit_id:null,
            edit_question :null,
            edit_answer :null,
            edit_active : null,
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
        this.fetchFaqs();
    },



    methods:{

        reset(){

            this.faqs=[];
            this.id = null;
            this.question = null;
            this.answer = null;
            this.active = null;
            this.descript = null
            this.image = null;
            this.imagepreview = null;
            this.active=null;
            this.delete=null;
            this.created_at=null;
            this.update_at=null;
            this.state = null;
            
            //for edit purpose
            this.edit_id = null;
            this.edit_question = null;
            this.edit_answer = null;
            this.edit_active = null;
        },

        setToUpdate(id,question,answer,active){
            
            this.edit_id = id;
            this.edit_question = question;
            this.edit_answer = answer;
            this.edit_active = active;

        },
             
            fetchFaqs() {
            axios.get("/admin/fetch/faqs")
                .then((res) => {

                    if (res.status == 200) {
                        console.log(res);
                        this.faqs= res.data;
                    }

                })
                .catch((err) => {console.log("error:" + err);});
            },

                 //create user method
        createFaqs(){
           // document.getElementById("submit").disabled = true;
            this.errors = [];

               axios.post("/admin/create/faqs", {//access web.php Route::prefix('/admin') 

                
                   question:this.question,
                   answer:this.answer,
                }).then((res) => {

                    if (res.status == 200 && res.data == 1) {

                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Successfully Inserted a FAQ',
                            showConfirmButton: false,
                            timer: 1500
                            })

                        this.reset();
                        this.fetchFaqs();

                        // this.$router.push('/admin/view-admins');

                    }

                }).catch((err) => {

                    if (err.response.status == 422){
                        this.errors = err.response.data.errors;
                        Swal.fire(
                       "Error", "Faqs destroyed unsuccessfull!", "error"
                        );
                    }
                });
               // document.getElementById("submit").disabled = false;

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
                                this.fetchFaqs();
                            } else {
                                Swal.fire("Error", "Admin Block unsuccessfull!", "error");
                            }
                            })
                            .catch((err) => {});
                        }
                    });
        },


        get_select_state_edit(event){

        this.edit_active = event.target.value;

        },


        editFaqs(){

            // if(this.edit_active == null){
            //     this.edit_active = this.active;
            // }
            // alert("yyolo");
            // console.log(this.edit_id);
            // console.log(this.edit_state);


            axios.put("/admin/update/faqs", {
                            id: this.edit_id,
                            question:this.edit_question,
                            answer:this.edit_answer,
                            active: this.edit_active,
                })
                .then((res) => {
                    if (res.status == 200 && res.data == 1) {
                            Swal.fire("Success", "faq update Successfull!", "success");
                            //this.reset();
                            this.fetchFaqs();

                            // $("#update_close_btn").click();
                    } else {
                            Swal.fire("Error", "Faq update unsuccessfull!", "error");
                        }
                })
                .catch((err) => {
                    if (err.response.status == 422)
                            // this.uerrors = err.response.data.errors;
                        Swal.fire("Error", "Faq update unsuccessfull!", "error");
                });

        },

        /**
         * Descripion
         * 
         * @param TourCategories id
         * @returns void
         */
        destroyFaqs(id){

            Swal.fire({
                    title: '(Delete FAQ?) Are you sure?',
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

                    axios.put("/admin/destroy/faqs", {
                            id: id,
                        }).then((res) => {
                            console.log(`delete res = ${res}`);
                            if (res.status == 200 && res.data == 1) {

                                Swal.fire(
                                    'Deleted!',
                                    'FAQ has been deleted.',
                                    'success'
                                )

                                // this.reset();
                                this.fetchFaqs();

                            }else{
                                Swal.fire("Error", "FAQ destroy Successfull!", "error");
                            }

                        }).catch((err) => {
                            console.log(`Error = ${err}`);
                            if (err.response.status == 422){
                                // this.errors = err.response.data.errors;
                                Swal.fire("Error", "FAQ destroy Unsuccessfull!", "error");
                            }
                        });
                        }
                    })



        }




    }
}
</script>