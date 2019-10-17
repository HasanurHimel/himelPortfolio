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
                        <h3 class="card-title">My Portfolio Management</h3>

                        <div class="card-tools">

                            <div><a href="#" @click="createModal" class="btn btn-success">Add new <i class="fas fa-user-plus"></i></a></div>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <tbody><tr>
                                <th>Sl no:</th>
                                <th>Project</th>
                                <th>Type</th>
                                <th>Completed</th>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>


                            <div hidden>
                                {{ $i=1 }}
                            </div>
                            <tr v-for="portfolio in portfolios">
                                <td>{{ $i++ }}</td>
                                <td>{{ portfolio.project_name }}</td>
                                <td>{{ portfolio.project_type }}</td>
                                <td>{{ portfolio.completed }}</td>
                                <td><img v-bind:src="'images/portfolio/'+portfolio.photo" alt="" height="80px" width="80px"></td>


                                <td>
                                    <a class="btn btn-secondary" href="#" @click="editModal(portfolio)"><i class="fas fa-user-edit"></i></a>
                                    <a class="btn btn-danger" href="#" @click="deleteportfolio(portfolio.id)"><i class="fas fa-trash"></i></a>

                                </td>
                            </tr>

                            </tbody></table>
                    </div>
                     <div class="card-footer">
                         <pagination :data="portfolios" @pagination-change-page="getResults"></pagination>
                     </div>

                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>



        </div>


        <div class="container">
            <div class="col-md-9 col-md-offset-3">
                <div class="modal fade" id="portfolioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" v-show="editMode">Update portfolio Data</h5>
                                <h5 class="modal-title" v-show="!editMode">Create portfolio data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form @submit.prevent="editMode ? updateportfolio() : createportfolio() " enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input v-model="form.project_name" type="text" name="project_name"
                                                   placeholder="project name"
                                                   class="form-control" :class="{ 'is-invalid': form.errors.has('project_name') }">
                                            <has-error :form="form" field="project_name"></has-error>
                                        </div>

                                        <div class="form-group">
<!--                                            <label><small>Project Type</small></label>-->
                                            <select v-model="form.project_type" class="form-control select2" style="width: 100%;">
                                                <option value="" selected="selected">Project type</option>
                                                <option value="blog">Blog</option>
                                                <option value="ecommerce">Ecommerce</option>
                                                <option value="portfolio">Portfolio</option>
                                                <option value="commercial">Commercial</option>
                                                <option value="newsfeed">Newsfeed</option>
                                                <option value="business">Business</option>
                                                <option value="educational">Educational</option>
                                                <option value="entertainment">Entertainment</option>
                                                <option value="personal">Personal</option>

                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <input v-model="form.client" type="text" name="client"
                                                   placeholder="Client"
                                                   class="form-control" :class="{ 'is-invalid': form.errors.has('client') }">
                                            <has-error :form="form" field="client"></has-error>
                                        </div>

                                        <div class="form-group">
                                            <input v-model="form.link" type="text" name="client"
                                                   placeholder="link"
                                                   class="form-control" :class="{ 'is-invalid': form.errors.has('link') }">
                                            <has-error :form="form" field="link"></has-error>
                                        </div>
                                        <div class="form-group">
                                            <input v-model="form.completed" type="date" name="completed"
                                                   placeholder="link"
                                                   class="form-control" :class="{ 'is-invalid': form.errors.has('completed') }">
                                            <has-error :form="form" field="completed"></has-error>
                                        </div>


                                        <div v-if="editMode===true" class="row col-md-12" >
                                            <div class="col-md-3" v-for="image in images">
<!--                                                <a class="btn btn-danger" href="#" @click="deleteImage(image.id)"><i class="fas fa-trash"></i></a>-->
                                                <a href="#" @click="deleteImage(image.id)"><i class="fas fa-times-circle"></i></a>

                                                <img v-bind:src="'images/portfolio/'+image['images']" alt="" height="80px" width="80px">


                                            </div>

                                        </div>

                                        <div class="form-group" v-if="editMode">
                                            <div id="my-strictly-unique-vue-upload-multiple-image" style="display: flex; justify-content: center;">
                                                <vue-upload-multiple-image
                                                    @upload-success="uploadImageSuccess"
                                                    @before-remove="beforeRemove"
                                                    @edit-image="editImage"
                                                    @data-change="dataChange"
                                                    :data-images="editimages"
                                                ></vue-upload-multiple-image>
                                            </div>
                                        </div>

                                        <div class="form-group" v-if="editMode===false">
                                            <div id="my-strictly-unique-vue-upload-multiple-image" style="display: flex; justify-content: center;">
                                                <vue-upload-multiple-image
                                                    @upload-success="uploadImageSuccess"
                                                    @before-remove="beforeRemove"
                                                    @edit-image="editImage"
                                                    @data-change="dataChange"
                                                    :data-images="form.images"
                                                ></vue-upload-multiple-image>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <vue-editor v-model="form.description" id="description" :class="{ 'is-invalid': form.errors.has('description') }"></vue-editor>
                                            <has-error :form="form" field="description"></has-error>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Photo</label>

                                            <div v-if="editMode===true" class="col-md-8" >
                                                <img v-bind:src="'images/portfolio/'+form.photo" alt="" height="80px" width="80px">
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
    import VueUploadMultipleImage from 'vue-upload-multiple-image'
    import { VueEditor } from "vue2-editor";
    export default {
        components: { VueUploadMultipleImage,VueEditor },
        data() {
            return {

                editMode: false,
                portfolios :{},
                images:[],
                editimages:[],
                form: new Form({
                    id:'',
                    project_name:'',
                    project_type:'',
                    client:'',
                    link:'',
                    completed:'',
                    editimages:[],
                    images: [],
                    description:'',
                    photo:'',
                })
            }
        },
        watch: {
            editimages(newValues){
                this.form.editimages=newValues;
            }
        },


        methods: {

                            // multiple image upload start

            uploadImageSuccess(formData, index, fileList) {
                // console.log('data', formData, index, fileList)
                // Upload image api
                // axios.post('api/portfolioPhoto', { data: formData }).then(response => {
                //   console.log(response)
                // })
            },
            beforeRemove (index, done, fileList) {
                // console.log('index', index, fileList)
                var r = confirm("remove image")
                if (r == true) {
                    done()
                } else {
                }
            },
            editImage (formData, index, fileList) {
                // console.log('edit data', formData, index, fileList)
            },
            dataChange (data) {
                console.log(data)
            },

            deleteImage(id){

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
                        axios.get('api/portfolio/deleteImage/'+id).then(()=> {
                            Fire.$emit('imageDelete');
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







                            // multiple image upload end


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
                axios.get('api/portfolio?page=' + page)
                    .then(response => {
                        this.portfolios = response.data;
                    });
            },

            createModal(){
                this.editMode= false;
                this.form.reset();
                $('#portfolioModal').modal('show');
            },
            editModal(portfolio){
                this.editMode= true;
                $('#portfolioModal').modal('show');
                this.form.fill(portfolio);
                axios.get('api/portfolio/existingImages/'+portfolio.id).then(({ data }) => { this.images=data })

                Fire.$on('imageDelete', () => {
                    axios.get('api/portfolio/existingImages/'+portfolio.id).then(({ data }) => { this.images=data })

                });

            },

            updateportfolio() {
                this.$Progress.start();


                this.form.put('api/portfolio/'+this.form.id).then(()=> {
                    this.$Progress.start();

                    Fire.$emit('portfolioOperation');
                    $('#portfolioModal').modal('hide');
                    Swal.fire(
                        'Updated!',
                        'portfolio has been Updated.',
                        'success'
                    )
                    this.$Progress.finish();
                });
            },


            deleteportfolio(id){
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
                        this.form.delete('api/portfolio/'+id).then(()=> {
                            Fire.$emit('portfolioOperation');
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
            loadportfolios(){
                axios.get('api/portfolio').then(({ data }) => { this.portfolios=data })
            },



            createportfolio(){


                this.$Progress.start();

                this.form.post('api/portfolio').then(()=> {
                    Fire.$emit('portfolioOperation');
                    $('#portfolioModal').modal('hide');
                    Toast.fire({
                        type: 'success',
                        title: 'portfolio Created Successfully done'
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
                    this.portfolios=data;
                }).catch(()=> {
                    console.log('not working')
                });
            });

            this.loadportfolios();
            Fire.$on('portfolioOperation', () => {
                this.$Progress.start();
                this.loadportfolios();
                this.$Progress.finish();
            });
            this.$Progress.finish();
        }
    }
</script>
