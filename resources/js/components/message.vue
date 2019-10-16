<template>
    <div class="col-md-10 col-md-offset-1">
        <form id="contact-form" @submit.prevent="sendMessage()" class="wow fadeInDown" data-wow-delay="1.2s">

            <div class="messages"></div> <!--you can change the message in contact.php file -->

            <div class="controls">

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <input id="form_name" v-model="form.name" type="text" name="name"
                                   placeholder="Enter your full name *"
                                   class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">

                            <has-error :form="form" field="name" style="color: red"></has-error>
                        </div>
                    </div>


                    <div class="col-md-6">

                    <div class="form-group">
                        <input v-model="form.email" type="email" name="email"
                               placeholder="Enter your valid email *"
                               class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                        <has-error :form="form" field="email" style="color: red"></has-error>
                    </div>
                    </div>




<!--                    <div class="col-md-6">-->
<!--                        <div class="form-group">-->
<!--                            <input id="form_email" type="email" name="email" class="form-control" placeholder="Enter your email *" required="required" data-error="Valid email is required.">-->
<!--                            <div class="help-block with-errors"></div>-->
<!--                        </div>-->
<!--                    </div>-->
                </div>
                <div class="row">
                    <div class="col-md-12">


                        <div class="form-group">
                                      <textarea v-model="form.message" rows="4" name="message" id="message"
                                                placeholder="Enter your message"
                                                class="form-control" :class="{ 'is-invalid': form.errors.has('message') }"></textarea>
                            <has-error :form="form" field="message" style="color: red"></has-error>
                        </div>





<!--                        <div class="form-group">-->
<!--                            <textarea id="form_message" name="message" class="form-control" placeholder="Your Message *" rows="4" required="required" data-error="Leave a message for me"></textarea>-->
<!--                            <div class="help-block with-errors"></div>-->
<!--                        </div>-->
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-send" value="">Send message</button>
                    </div>
                </div>
            </div>

        </form>
    </div>
</template>



<script>
    import Form from 'vform'
    export default {

        data() {
            return {
                editMode: false,
                designations :{},
                form: new Form({
                    id:'',
                    name : '',
                    email : '',
                    message : '',

                })
            }
        },
        methods: {





            sendMessage(){
                this.$Progress.start();
                this.form.post('api/message').then(()=> {

                    Toast.fire({
                        type: 'success',
                        title: 'Thank you for Your Valuable message'
                    });


                }).catch(()=> {
                    Toast.fire({
                        type: 'error',
                        title: 'Some error'
                    });

                });

                this.form.reset();

                this.$Progress.finish();

            }
        },


        // created() {
        //
        //
        //
        // }
    }
</script>
