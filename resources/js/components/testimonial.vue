<style>

    .col-sm-6 {
        flex: 0 0 50%;
        max-width: 100%;
    }
</style>




<template>
    <div class="container">
        <div class="row justify-content-center">


            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Testimonial Management</h3>

                        <div class="card-tools">

                            <div><a href="#" @click="createModal" class="btn btn-success">Add new <i class="fas fa-user-plus"></i></a></div>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <tbody><tr>
                                <th>Sl no:</th>
                                <th>Name</th>
                                <th>Profession</th>
                                <th>Testimonial</th>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>


                            <div hidden>
                                {{ $i=1 }}
                            </div>
                            <tr v-for="testimonial in testimonials">
                                <td>{{ $i++ }}</td>
                                <td>{{ testimonial.name }}</td>
                                <td>{{ testimonial.profession }}</td>
                                <td>{{ testimonial.testimonial }}</td>
                                <td><img v-bind:src="'images/testimonial/'+testimonial.photo" alt="" height="80px" width="80px"></td>


                                <td>
                                    <a class="btn btn-secondary" href="#" @click="editModal(testimonial)"><i class="fas fa-user-edit"></i></a>
                                    <a class="btn btn-danger" href="#" @click="deletetestimonial(testimonial.id)"><i class="fas fa-trash"></i></a>

                                </td>
                            </tr>

                            </tbody></table>
                    </div>
                    <div class="card-footer">
                        <pagination :data="testimonials" @pagination-change-page="getResults"></pagination>
                    </div>

                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>



        </div>


        <div class="container">
            <div class="col-md-9 col-md-offset-3">
                <div class="modal fade" id="testimonialModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" v-show="editMode">Update testimonial Data</h5>
                                <h5 class="modal-title" v-show="!editMode">Create testimonial data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form @submit.prevent="editMode ? updatetestimonial() : createtestimonial() " enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input v-model="form.name" type="text" name="name"
                                                   placeholder="Client name"
                                                   class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                            <has-error :form="form" field="name"></has-error>
                                        </div>



                                        <div class="form-group">
                                            <input v-model="form.profession" type="text" name="profession"
                                                   placeholder="profession"
                                                   class="form-control" :class="{ 'is-invalid': form.errors.has('profession') }">
                                            <has-error :form="form" field="profession"></has-error>
                                        </div>


                                        <div class="form-group">
                                            <vue-editor v-model="form.testimonial" id="testimonial" :class="{ 'is-invalid': form.errors.has('testimonial') }"></vue-editor>
                                            <has-error :form="form" field="testimonial"></has-error>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Photo</label>

                                            <div v-if="editMode===true" class="col-md-8" >
                                                <img v-bind:src="'images/testimonial/'+form.photo" alt="" height="80px" width="80px">
                                            </div>

                                            <div class="col-md-8" >
                                                <img v-bind:src="form.photo" alt="" height="80px" width="80px">
                                            </div>


                                            <div class="col-sm-8">

                                                <input type="file" class="form-control" @change="imageUrl"
                                                       :class="{ 'is-invalid': form.errors.has('photo') }">
                                                <has-error :form="form" field="photo"></has-error>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="submit" v-show="editMode" class="btn btn-success">Update</button>
                                        <button type="submit" v-show="!editMode" class="btn btn-primary">Create</button>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
</template>

<script>
    import Form from 'vform'
    import { VueEditor } from "vue2-editor";
    export default {
        components: { VueEditor },
        data() {
            return {

                editMode: false,
                testimonials :{},
                form: new Form({
                    id:'',
                    name:'',
                    profession:'',
                    testimonial:'',
                    photo:'',
                })
            }
        },
        methods: {



            imageUrl(e) {
                let file = e.target.files[0];
                console.log(file);
                let reader = new FileReader();

                reader.onload = (file) => {
                    this.form.photo = file.target.result;
                    console.log(this.form.photo)
                    // rebuild cropperjs with the updated source
                    // this.$refs.cropper.replace(event.target.result)
                };
                reader.readAsDataURL(file)


            },

            getResults(page = 1) {
                axios.get('api/testimonial?page=' + page)
                    .then(response => {
                        this.testimonials = response.data;
                    });
            },

            createModal(){
                this.editMode= false;
                this.form.reset();
                $('#testimonialModal').modal('show');
            },
            editModal(testimonial){
                this.editMode= true;
                $('#testimonialModal').modal('show');
                this.form.fill(testimonial);
            },

            updatetestimonial() {
                this.$Progress.start();
                this.form.put('api/testimonial/'+this.form.id).then(()=> {
                    this.$Progress.start();
                    Fire.$emit('testimonialOperation');
                    $('#testimonialModal').modal('hide');
                    Swal.fire(
                        'Updated!',
                        'testimonial has been Updated.',
                        'success'
                    )
                    this.$Progress.finish();
                });
            },


            deletetestimonial(id){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        this.form.delete('api/testimonial/'+id).then(()=> {
                            Fire.$emit('testimonialOperation');
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        }).catch(()=>{
                            Swal.fire({
                                type: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                // footer: '<a href>Why do I have this issue?</a>'
                            })
                        });
                    }
                })
            },
            loadtestimonials(){
                axios.get('api/testimonial').then(({ data }) => { this.testimonials=data })
            },



            createtestimonial(){


                this.$Progress.start();

                this.form.post('api/testimonial').then(()=> {
                    Fire.$emit('testimonialOperation');
                    $('#testimonialModal').modal('hide');
                    Toast.fire({
                        type: 'success',
                        title: 'testimonial Created Successfully done'
                    });


                }).catch(()=> {
                    Toast.fire({
                        type: 'error',
                        title: 'Some error'
                    });

                });

                this.$Progress.finish();

            }
        },


        created() {
            this.$Progress.start();


            Fire.$on('searching', () => {
                let query=this.$parent.search;
                axios.get('api/searching?q='+query).then(({ data }) => {
                    this.testimonials=data;
                }).catch(()=> {
                    console.log('not working')
                });
            });

            this.loadtestimonials();
            Fire.$on('testimonialOperation', () => {
                this.$Progress.start();
                this.loadtestimonials();
                this.$Progress.finish();
            });
            this.$Progress.finish();
        }
    }
</script>
