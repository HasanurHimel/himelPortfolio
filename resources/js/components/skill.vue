<template>
    <div class="container">
        <div class="row justify-content-center">


            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Skill Management</h3>

                        <div class="card-tools">

                            <div><a href="#" @click="createModal" class="btn btn-success">Add new <i class="fas fa-user-plus"></i></a></div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <tbody><tr>
                                <th>Sl no:</th>
                                <th>Skill</th>
                                <th>Animation</th>
                                <th>Percentage</th>
                                <th>Action</th>
                            </tr>


                            <div hidden>
                                {{ $i=1 }}
                            </div>
                            <tr v-for="skill in skills.data">
                                <td>{{ $i++ }}</td>
                                <td>{{ skill.skill }}</td>
                                <td>{{ skill.animation }}</td>
                                <td>{{ skill.percentage }}</td>
                                <td>
                                    <a class="btn btn-secondary" href="#" @click="editModal(skill)"><i class="fas fa-user-edit"></i></a>
                                    <a class="btn btn-danger" href="#" @click="deleteUser(skill.id)"><i class="fas fa-trash"></i></a>

                                </td>
                            </tr>

                            </tbody></table>
                    </div>

                    <div class="card-footer">
                        <pagination :data="skills" @pagination-change-page="getResults"></pagination>

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
                            <h5 class="modal-title" v-show="editMode">Update skill</h5>
                            <h5 class="modal-title" v-show="!editMode">Create skill</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form @submit.prevent="editMode ? updatePermissionFor() : createPermissionFor() ">

                                    <div class="form-group">
                                        <input v-model="form.skill" type="text" name="skill"
                                               placeholder="skill"
                                               class="form-control" :class="{ 'is-invalid': form.errors.has('skill') }">
                                        <has-error :form="form" field="skill"></has-error>
                                    </div>

                                <div class="form-group">
                                    <select v-model="form.animation" class="form-control select2" style="width: 100%;">
                                        <option value="" selected="selected">Select a Animation</option>

                                        <option v-for="animation in animations" v-bind:value="animation.animation">{{ animation.animation }}</option>

                                    </select>
                                </div>

                                    <div class="form-group">
                                        <input v-model="form.percentage" type="number" name="percentage"
                                               placeholder="percentage"
                                               class="form-control" :class="{ 'is-invalid': form.errors.has('percentage') }">
                                        <has-error :form="form" field="percentage"></has-error>
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
                skills :{},
                animations: [],
                form: new Form({
                    id:'',
                    skill : '',
                    animation : '',
                    percentage : '',

                })
            }
        },
        methods: {

            getResults(page = 1) {
                axios.get('api/skill?page=' + page)
                    .then(response => {
                        this.skills = response.data;
                    });
            },


            createModal(){
                this.editMode= false;
                this.form.reset();
                $('#permissionForModal').modal('show');
            },
            editModal(skill){

                this.editMode= true;
                $('#permissionForModal').modal('show');
                this.form.fill(skill);
            },

            loadAnimations(){
                axios.get('api/skill')
                    .then(({ data })=>{ this.animations=data.animations })
            },

            updatePermissionFor() {
                this.form.put('api/skill/'+this.form.id).then(()=> {
                    this.$Progress.start();
                    Fire.$emit('userOperation');
                    $('#permissionForModal').modal('hide');
                    Swal.fire(
                        'Updated!',
                        'skill has been Updated.',
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
                        this.form.delete('api/skill/'+id).then(()=> {
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
            loadskills(){
                this.$Progress.start();
                axios.get('api/skill')
                    .then(({ data }) => { this.skills=data.skills })
                this.$Progress.finish();


            },
            createPermissionFor(){
                this.$Progress.start();
                this.form.post('api/skill').then(()=> {
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
                    this.skills=data;
                }).catch(()=> {
                    console.log('not working')
                });
            });

            this.loadAnimations();
            this.loadskills();
            Fire.$on('userOperation', () => {
                this.$Progress.start();
                this.loadskills();
                this.$Progress.finish();
            });
        }
    }
</script>
