<template>
    <div class="container">
        <div class="row justify-content-center">


            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Contact</h3>

                        <div class="card-tools">

                            <div v-if="contacts.length===0"><a href="#" @click="createModal" class="btn btn-success">Add new <i class="fas fa-user-plus"></i></a></div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <tbody><tr>
                                <th>Sl no:</th>
                                <th>Location</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>


                            <div hidden>
                                {{ $i=1 }}
                            </div>
                            <tr v-for="contact in contacts">
                                <td>{{ $i++ }}</td>
                                <td>{{ contact.location }}</td>
                                <td>{{ contact.phone }}</td>
                                <td>{{ contact.email }}</td>
                                <td>
                                    <a class="btn btn-secondary" href="#" @click="editModal(contact)"><i class="fas fa-user-edit"></i></a>
                                    <a class="btn btn-danger" href="#" @click="deleteUser(contact.id)"><i class="fas fa-trash"></i></a>

                                </td>
                            </tr>

                            </tbody></table>
                    </div>



                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>



        </div>


        <div class="col-md-7 col-md-offset-4">
            <div class="modal fade" id="permissionForModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" v-show="editMode">Update contact</h5>
                            <h5 class="modal-title" v-show="!editMode">Create contact</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form @submit.prevent="editMode ? updatePermissionFor() : createPermissionFor() ">

                                <div class="modal-body">
                                    <div class="form-group">
                                        <input v-model="form.location" type="text" name="location"
                                               placeholder="location"
                                               class="form-control" :class="{ 'is-invalid': form.errors.has('location') }">
                                        <has-error :form="form" field="location"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <input v-model="form.phone" type="number" name="phone"
                                               placeholder="phone number"
                                               class="form-control" :class="{ 'is-invalid': form.errors.has('phone') }">
                                        <has-error :form="form" field="phone"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <input v-model="form.email" type="email" name="email"
                                               placeholder="Email"
                                               class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                                        <has-error :form="form" field="email"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <input v-model="form.facebook" type="text" name="facebook"
                                               placeholder="facebook link"
                                               class="form-control" :class="{ 'is-invalid': form.errors.has('facebook') }">
                                        <has-error :form="form" field="facebook"></has-error>
                                    </div>

                                    <div class="form-group">
                                        <input v-model="form.linkedin" type="text" name="linkedin"
                                               placeholder="linkedin link"
                                               class="form-control" :class="{ 'is-invalid': form.errors.has('linkedin') }">
                                        <has-error :form="form" field="linkedin"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <input v-model="form.twitter" type="text" name="twitter"
                                               placeholder="twitter link"
                                               class="form-control" :class="{ 'is-invalid': form.errors.has('twitter') }">
                                        <has-error :form="form" field="twitter"></has-error>
                                    </div>

                                    <div class="form-group">
                                        <input v-model="form.github" type="text" name="github"
                                               placeholder="github link"
                                               class="form-control" :class="{ 'is-invalid': form.errors.has('github') }">
                                        <has-error :form="form" field="github"></has-error>
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
</template>

<script>
    import Form from 'vform'
    export default {

        data() {
            return {
                editMode: false,
                contacts :{},
                form: new Form({
                    id:'',
                    location : '',
                    phone : '',
                    email : '',
                    facebook : '',
                    linkedin : '',
                    twitter : '',
                    github : '',

                })
            }
        },
        methods: {



            createModal(){
                this.editMode= false;
                this.form.reset();
                $('#permissionForModal').modal('show');
            },
            editModal(contact){

                this.editMode= true;
                $('#permissionForModal').modal('show');
                this.form.fill(contact);
            },

            updatePermissionFor() {
                this.form.put('api/contact/'+this.form.id).then(()=> {
                    this.$Progress.start();
                    Fire.$emit('userOperation');
                    $('#permissionForModal').modal('hide');
                    Swal.fire(
                        'Updated!',
                        'contact has been Updated.',
                        'success'
                    )
                    this.$Progress.finish();
                });



            },


            deleteUser(id){
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
                        this.form.delete('api/contact/'+id).then(()=> {
                            Fire.$emit('userOperation');
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
            loadcontacts(){
                this.$Progress.start();
                axios.get('api/contact')
                    .then(({ data }) => { this.contacts=data })
                this.$Progress.finish();


            },
            createPermissionFor(){
                this.$Progress.start();
                this.form.post('api/contact').then(()=> {
                    Fire.$emit('userOperation');
                    $('#permissionForModal').modal('hide');
                    Toast.fire({
                        type: 'success',
                        title: 'Permission For Created Successfully done'
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
            Fire.$on('searching', () => {
                let query=this.$parent.search;
                axios.get('api/searching?q='+query).then(({ data }) => {
                    this.contacts=data;
                }).catch(()=> {
                    console.log('not working')
                });
            });

            this.loadcontacts();
            Fire.$on('userOperation', () => {
                this.$Progress.start();
                this.loadcontacts();
                this.$Progress.finish();
            });
        }
    }
</script>
