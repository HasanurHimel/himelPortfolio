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
                        <h3 class="card-title">My Offer Management</h3>

                        <div class="card-tools">

                            <div><a href="#" @click="createModal" class="btn btn-success">Add new <i class="fas fa-user-plus"></i></a></div>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <tbody><tr>
                                <th>Sl no:</th>
                                <th>Offer name</th>
                                <th>Description</th>
                                <th>Icon</th>
                                <th>Animation</th>
                                <th>Delay</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>


                            <div hidden>
                                {{ $i=1 }}
                            </div>
                            <tr v-for="offer in offers.data">
                                <td>{{ $i++ }}</td>
                                <td>{{ offer.offer_name }}</td>
                                <td>{{ offer.offer_description }}</td>
                                <td>{{ offer.icon }}</td>
                                <td>{{ offer.animation }}</td>
                                <td>{{ offer.delay }}</td>
                                <td v-if="offer.publication_status===1">Published</td>
                                <td v-if="offer.publication_status===0">UnPublished</td>

                                <td>
                                    <a class="btn btn-secondary" href="#" @click="editModal(offer)"><i class="fas fa-user-edit"></i></a>
                                    <a class="btn btn-danger" href="#" @click="deleteoffer(offer.id)"><i class="fas fa-trash"></i></a>

                                </td>
                            </tr>

                            </tbody></table>
                    </div>
                    <div class="card-footer">
                        <pagination :data="offers" @pagination-change-page="getResults"></pagination>
                    </div>

                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>



        </div>


        <div class="container">
            <div class="col-md-9 col-md-offset-3">
                <div class="modal fade" id="offerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" v-show="editMode">Update offer Data</h5>
                                <h5 class="modal-title" v-show="!editMode">Create offer data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form @submit.prevent="editMode ? updateoffer() : createoffer() ">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input v-model="form.offer_name" type="text" name="offer_name"
                                                   placeholder="offer name"
                                                   class="form-control" :class="{ 'is-invalid': form.errors.has('offer_name') }">
                                            <has-error :form="form" field="offer_name"></has-error>
                                        </div>


                                        <div class="form-group">
                                      <textarea v-model="form.offer_description" name="offer_description" id="offer_description"
                                                placeholder="offer description"
                                                class="form-control" :class="{ 'is-invalid': form.errors.has('offer_description') }"></textarea>
                                            <has-error :form="form" field="offer_description"></has-error>
                                        </div>

                                        <div class="form-group">
                                            <input v-model="form.icon" type="text" name="icon"
                                                   placeholder="icon"
                                                   class="form-control" :class="{ 'is-invalid': form.errors.has('icon') }">
                                            <has-error :form="form" field="icon"></has-error>
                                        </div>
                                        <div class="form-group">
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
                offers :{},
                animations:[],
                form: new Form({
                    id:'',
                    offer_name:'',
                    offer_description:'',
                    animation:'',
                    icon:'',
                    publication_status:'',
                    delay:''
                })
            }
        },
        methods: {


            getResults(page = 1) {
                axios.get('api/offer?page=' + page)
                    .then(response => {
                        this.permissions = response.data;
                    });
            },

            createModal(){
                this.editMode= false;
                this.form.reset();
                $('#offerModal').modal('show');
            },
            editModal(offer){
                this.editMode= true;
                $('#offerModal').modal('show');
                this.form.fill(offer);
            },

            updateoffer() {
                this.$Progress.start();
                this.form.put('api/offer/'+this.form.id).then(()=> {
                    this.$Progress.start();
                    Fire.$emit('offerOperation');
                    $('#offerModal').modal('hide');
                    Swal.fire(
                        'Updated!',
                        'offer has been Updated.',
                        'success'
                    )
                    this.$Progress.finish();
                });
            },


            deleteoffer(id){
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
                        this.form.delete('api/offer/'+id).then(()=> {
                            Fire.$emit('offerOperation');
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
            loadoffers(){
                axios.get('api/offer').then(({ data }) => { this.offers=data.offers })
            },

            loadAnimations(){
                axios.get('api/offer')
                    .then(({ data })=>{ this.animations=data.animations })
            },


            createoffer(){
                this.$Progress.start();

                this.form.post('api/offer').then(()=> {
                    Fire.$emit('offerOperation');
                    $('#offerModal').modal('hide');
                    Toast.fire({
                        type: 'success',
                        title: 'offer Created Successfully done'
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
                    this.offers=data;
                }).catch(()=> {
                    console.log('not working')
                });
            });
            this.loadAnimations();

            this.loadoffers();
            Fire.$on('offerOperation', () => {
                this.$Progress.start();
                this.loadoffers();
                this.$Progress.finish();
            });
            this.$Progress.finish();
        }
    }
</script>
