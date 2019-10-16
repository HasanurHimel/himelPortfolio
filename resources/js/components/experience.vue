<style>
    @import "../../../node_modules/vue-multiselect/dist/vue-multiselect.min.css";
</style>



<template>
    <div class="container">
        <div class="row justify-content-center">


            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Experience</h3>

                        <div class="card-tools">

                            <div><a href="#" @click="createModal" class="btn btn-success">Add new <i class="fas fa-user-plus"></i></a></div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <tbody><tr>
                                <th>Sl no:</th>
                                <th>Experience</th>
                                <th>Institution</th>
                                <th>Details</th>
                                <th>Animation</th>
                                <th>Delay</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>


                            <div hidden>
                                {{ $i=1 }}
                            </div>
                            <tr v-for="experience in experiences.data">
                                <td>{{ $i++ }}</td>
                                <td>{{ experience.experience }}</td>
                                <td>{{ experience.institution }}</td>
                                <td>{{ experience.details }}</td>
                                <td>{{ experience.animation }}</td>
                                <td>{{ experience.delay }}</td>
                                <td v-if="experience.publication_status===1">Published</td>
                                <td v-if="experience.publication_status===0">UnPublished</td>

                                <td>
                                    <a class="btn btn-secondary" href="#" @click="editModal(experience)"><i class="fas fa-user-edit"></i></a>
                                    <a class="btn btn-danger" href="#" @click="deleteUser(experience.id)"><i class="fas fa-trash"></i></a>

                                </td>
                            </tr>

                            </tbody></table>
                    </div>

                    <div class="card-footer">
                        <pagination :data="experiences" @pagination-change-page="getResults"></pagination>

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
                            <h5 class="modal-title" v-show="editMode">Update experience</h5>
                            <h5 class="modal-title" v-show="!editMode">Create experience</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form @submit.prevent="editMode ? updatePermissionFor() : createPermissionFor() ">

                                <div class="modal-body">
                                    <div class="form-group">
                                        <input v-model="form.experience" type="text" name="experience"
                                               placeholder="experience"
                                               class="form-control" :class="{ 'is-invalid': form.errors.has('experience') }">
                                        <has-error :form="form" field="experience"></has-error>
                                    </div>

                                    <div class="form-group">
                                        <input v-model="form.institution" type="text" name="institution"
                                               placeholder="institution"
                                               class="form-control" :class="{ 'is-invalid': form.errors.has('institution') }">
                                        <has-error :form="form" field="institution"></has-error>
                                    </div>


                                <div class="form-group">
                                      <textarea v-model="form.details" name="details" id="details"
                                                placeholder="Details"
                                                class="form-control" :class="{ 'is-invalid': form.errors.has('details') }"></textarea>
                                    <has-error :form="form" field="details"></has-error>
                                </div>


                                    <div class="form-group">
                                        <label><small>Animation</small></label>
                                        <select v-model="form.animation" class="form-control select2" style="width: 100%;">
                                            <option value="" selected="selected">Select a Animation</option>

                                            <option v-for="animation in animations" v-bind:value="animation.animation">{{ animation.animation }}</option>

                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <input v-model="form.delay" type="text" name="delay"
                                               placeholder="Delay ( 0.something )"
                                               class="form-control" :class="{ 'is-invalid': form.errors.has('delay') }">
                                        <has-error :form="form" field="delay"></has-error>
                                    </div>


                                <div class="form-group">
                                    <label>Status</label>
                                    <div class="radio">
                                        <label><input type="radio" v-model="form.publication_status" name="publication_status" value="1" class="flat-red" :class="{ 'is-invalid': form.errors.has('publication_status') }">Published</label>
                                        <label><input type="radio" v-model="form.publication_status" name="publication_status" value="0" class="flat-red" :class="{ 'is-invalid': form.errors.has('publication_status') }">UnPublished</label>
                                        <has-error :form="form" field="publication_status"></has-error>
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="submit" v-show="editMode" class="btn btn-success">Update</button>
                                    <button type="submit" v-show="!editMode" class="btn btn-primary">Create</button>
                                </div>
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
    import Multiselect from 'vue-multiselect'

    Vue.component('multiselect', Multiselect);
    import Form from 'vform'

    export default {
        components: { Multiselect },
        data() {
            return {
                editMode: false,
                experiences :{},
                animations:[],
                form: new Form({
                    id:'',
                    experience : '',
                    institution : '',
                    details : '',
                    animation : '',
                    publication_status : '',
                    delay : '',

                })
            }
        },

        // watch: {
        //     selectedObjects(newValues) {
        //         this.form.animation = newValues.map(obj => obj.animation);
        //         // console.log(this.selectedObjects.indexOf(1))
        //     }
        // },

        methods: {



            getResults(page = 1) {
                axios.get('api/experience?page=' + page)
                    .then(response => {
                        this.experiences = response.data;
                    });
            },


            createModal(){
                this.editMode= false;
                this.form.reset();
                $('#permissionForModal').modal('show');
            },
            editModal(experience){

                this.editMode= true;
                $('#permissionForModal').modal('show');
                this.form.fill(experience);
            },

            updatePermissionFor() {
                this.form.put('api/experience/'+this.form.id).then(()=> {
                    this.$Progress.start();
                    Fire.$emit('userOperation');
                    $('#permissionForModal').modal('hide');
                    Swal.fire(
                        'Updated!',
                        'experience has been Updated.',
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
                        this.form.delete('api/experience/'+id).then(()=> {
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
            loadAnimations(){
                axios.get('api/experience')
                    .then(({ data })=>{ this.animations=data.animations })
            },

            loadexperiences(){
                this.$Progress.start();
                axios.get('api/experience')
                    .then(({ data }) => { this.experiences=data.experiences })
                this.$Progress.finish();


            },
            createPermissionFor(){
                this.$Progress.start();
                this.form.post('api/experience').then(()=> {
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
            this.loadAnimations();
            Fire.$on('searching', () => {
                let query=this.$parent.search;
                axios.get('api/searching?q='+query).then(({ data }) => {
                    this.experiences=data;
                }).catch(()=> {
                    console.log('not working')
                });
            });

            // this.addTag();
            this.loadexperiences();
            Fire.$on('userOperation', () => {
                this.$Progress.start();
                this.loadexperiences();
                this.$Progress.finish();
            });
        }
    }
</script>
