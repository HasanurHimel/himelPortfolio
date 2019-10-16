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
                        <h3 class="card-title">Home Display</h3>

                        <div class="card-tools">

                            <div v-if="banners.length===0"><a href="#" @click="createModal" class="btn btn-success">Add new <i class="fas fa-user-plus"></i></a></div>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <tbody><tr>
                                <th>Sl no:</th>
                                <th>Site name</th>
                                <th>Banner title</th>
                                <th>Banner photo</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>


                            <div hidden>
                                {{ $i=1 }}
                            </div>
                            <tr v-for="banner in banners">
                                <td>{{ $i++ }}</td>
                                <td>{{ banner.site_name }}</td>
                                <td>{{ banner.banner_title }}</td>
                                <td><img v-bind:src="'images/banner/'+banner.photo" alt="" height="80px" width="80px"></td>
                                <td v-if="banner.publication_status===1">Published</td>
                                <td v-if="banner.publication_status===0">UnPublished</td>

                                <td>
                                    <a class="btn btn-secondary" href="#" @click="editModal(banner)"><i class="fas fa-user-edit"></i></a>
                                    <a class="btn btn-danger" href="#" @click="deletebanner(banner.id)"><i class="fas fa-trash"></i></a>

                                </td>
                            </tr>

                            </tbody></table>
                    </div>
<!--                    <div class="card-footer">-->
<!--                        <pagination :data="banners" @pagination-change-page="getResults"></pagination>-->
<!--                    </div>-->

                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>



        </div>


        <div class="container">
            <div class="col-md-9 col-md-offset-3">
                <div class="modal fade" id="bannerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" v-show="editMode">Update banner Data</h5>
                                <h5 class="modal-title" v-show="!editMode">Create banner data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form @submit.prevent="editMode ? updatebanner() : createbanner() " enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input v-model="form.site_name" type="text" name="site_name"
                                                   placeholder="banner name"
                                                   class="form-control" :class="{ 'is-invalid': form.errors.has('site_name') }">
                                            <has-error :form="form" field="site_name"></has-error>
                                        </div>

                                        <div class="form-group">
                                            <input v-model="form.banner_title" type="text" name="banner_title"
                                                   placeholder="banner title"
                                                   class="form-control" :class="{ 'is-invalid': form.errors.has('banner_title') }">
                                            <has-error :form="form" field="banner_title"></has-error>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Banner Photo</label>

                                            <div v-if="editMode===true" class="col-md-8" >
                                                <img v-bind:src="'images/banner/'+form.photo" alt="" height="80px" width="80px">
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

                                        <div class="form-group">
                                            <label>Status</label>
                                            <div class="radio">
                                                <label><input type="radio" v-model="form.publication_status" name="publication_status" value="1" class="flat-red" :class="{ 'is-invalid': form.errors.has('publication_status') }">Published</label>
                                                <label><input type="radio" v-model="form.publication_status" name="publication_status" value="0" class="flat-red" :class="{ 'is-invalid': form.errors.has('publication_status') }">UnPublished</label>
                                                <has-error :form="form" field="publication_status"></has-error>
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
    export default {

        data() {
            return {

                editMode: false,
                banners :{},
                form: new Form({
                    id:'',
                    site_name:'',
                    banner_title:'',
                    photo:'',
                    publication_status:''
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

            // getResults(page = 1) {
            //     axios.get('api/banner?page=' + page)
            //         .then(response => {
            //             this.banners = response.data;
            //         });
            // },

            createModal(){
                this.editMode= false;
                this.form.reset();
                $('#bannerModal').modal('show');
            },
            editModal(banner){
                this.editMode= true;
                $('#bannerModal').modal('show');
                this.form.fill(banner);
            },

            updatebanner() {
                this.$Progress.start();
                this.form.put('api/banner/'+this.form.id).then(()=> {
                    this.$Progress.start();
                    Fire.$emit('bannerOperation');
                    $('#bannerModal').modal('hide');
                    Swal.fire(
                        'Updated!',
                        'banner has been Updated.',
                        'success'
                    )
                    this.$Progress.finish();
                });
            },


            deletebanner(id){
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
                        this.form.delete('api/banner/'+id).then(()=> {
                            Fire.$emit('bannerOperation');
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
            loadbanners(){
                axios.get('api/banner').then(({ data }) => { this.banners=data })
            },



            createbanner(){


                this.$Progress.start();

                this.form.post('api/banner').then(()=> {
                    Fire.$emit('bannerOperation');
                    $('#bannerModal').modal('hide');
                    Toast.fire({
                        type: 'success',
                        title: 'banner Created Successfully done'
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
                    this.banners=data;
                }).catch(()=> {
                    console.log('not working')
                });
            });

            this.loadbanners();
            Fire.$on('bannerOperation', () => {
                this.$Progress.start();
                this.loadbanners();
                this.$Progress.finish();
            });
            this.$Progress.finish();
        }
    }
</script>
