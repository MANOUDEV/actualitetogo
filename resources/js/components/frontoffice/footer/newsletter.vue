<template>
    <form class="input-group mt-2" >
        <input v-if="errors.email" required type="email" name="email" v-model="data.email" class="form-control is-invalid" placeholder="Entrez votre email " />
        <input v-else required type="email" name="email" v-model="data.email" class="form-control " placeholder="Entrez votre email " />
        <button type="submit"  class="btn btn-primary m-0" @click.prevent="saveNewsletter"  v-if="!loading"><i class="bi bi-send"></i></button>
        <button type="button"  class="btn btn-primary m-0" v-else>
            <i  style="color: #fff" class="fa fa-spinner fa-1x fa-spin fa-fw"></i>
            <span class="sr-only">Loading...</span>
        </button>
    </form>
    <div v-if="errors.email">
        <div v-for="errorName in errors.email" :key="errorName" class="form-text mt-2 text-white">
            {{ errorName }}
        </div>
    </div>
    <div v-else class="form-text mt-2 text-white">
        En vous abonnant, vous acceptez notre politique de confidentialité.
    </div>
    <div class="modal fade" id="verifyCaptchaNewsLetter" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content" >
                <div class="modal-header">
                    <h5 class="modal-title">Vérification CAPTCHA</h5>
                    <button type="button" class="btn-close" @click="verifyCaptchaNewsLetterClose" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3"  >
                        <div class="input-btn">
                            <div class="input-img">
                              <input type="text" class="form-control captcha-text" v-model="captchaRandomNumber" disabled />
                              <img :src="`/assets/images/captcha.jpg`" alt=""/>
                            </div>
                            <button class="refresh-btn" @click="reloadcaptchaRandomNumber">
                              <i class="fas fa-rotate-right"></i>
                            </button>
                        </div>
                    </div>
                    <div class="mb-3"  >
                        <div class="input-btn">
                            <div class="input-img">
                              <input type="text" class="form-control " v-model="captchaRandomVerify" />
                            </div>
                            <button class="refresh-btn" @click="save">
                              <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                        <small class="text-danger" v-if="messageCaptcha">{{ messageCaptcha }}</small>
                    </div>
                </div>
                <div class="modal-footer"> </div>
                <div  style="margin-top: -15px">
                    <p class="text-center">Verifions si vous n'êtes pas un robot</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {mapActions, mapGetters} from 'vuex';
export default{
    data() {
        return {
            data: {
                email: null,
            },
            errors: {},
            loading: false,
            captchaRandomNumber: null,
            captchaRandomVerify: null,
            messageCaptcha:null,
        }
    },
    computed:{
        ...mapGetters('newsletter',{
            getterNewsletterStatus:'getNewsletterStatus',
            getterNewsletterMessage:'getNewsletterMessage',
            getterNewsletterErrors:'getNewsletterErrors',
        }),
    },
    methods:{

        ...mapActions('newsletter',{
            actionNewsletterRequest:'newsletterRequest'
        }),

        verifyCaptchaNewsLetterClose(){
            this.generateCaptcha()
            this.messageCaptcha = null
            this.captchaRandomVerify = null
            $('#verifyCaptchaNewsLetter').modal('hide');
        },

        verifyCaptchaNewsLetterShow(){
            this.generateCaptcha()
            $('#verifyCaptchaNewsLetter').modal('show');
        },

        reloadcaptchaRandomNumber(){
            this.generateCaptcha()
        },

        generateCaptcha(){
            const randomString = Math.random().toString(36).substring(2, 7);
            const randomStringArray = randomString.split("");
            const changeString = randomStringArray.map((char) =>
                Math.random() > 0.5
                ? char.toUpperCase()
                : char
            );

            this.captchaRandomNumber = changeString.join("");
        },


        saveNewsletter(){
            this.generateCaptcha()
            this.verifyCaptchaNewsLetterShow()
        },

        save(){
            if(this.captchaRandomVerify != this.captchaRandomNumber){

                this.messageCaptcha="Veuillez entrer un captcha valide."

            }else{
                this.verifyCaptchaNewsLetterClose()
                this.store()
            }
        },

        async store(){


                this.errors = []
                this.loading = true
                await this.actionNewsletterRequest({email: this.data.email})

                if (this.getterNewsletterStatus == "success") {

                    this.errors = []

                    this.loading = false

                    const Toast = this.$swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 4000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', this.$swal.stopTimer)
                            toast.addEventListener('mouseleave', this.$swal.resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'success',
                        title: this.getterNewsletterMessage
                    })

                    this.data.email = null

                }else if (this.getterNewsletterStatus == "error") {

                    this.loading = false

                    this.errors = this.getterNewsletterErrors

                }else if (this.getterNewsletterStatus == "failed") {

                    this.loading = false

                    const Toast = this.$swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 4000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', this.$swal.stopTimer)
                            toast.addEventListener('mouseleave', this.$swal.resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'success',
                        title: this.getterNewsletterMessage
                    })

                }

        },
    },


}
</script>
<style>
.input-btn {
    width: 100%;
    height: 50px;
    border: 1px solid #ccc;
    border-radius: 5px;
    display: flex;
    overflow: hidden;
  }

  .input-img {
    position: relative;
    width: 80%;
    height: 100%;
  }

  .input-img input {
    width: 100%;
    height: 100%;
    outline: none;
    border: none;
    background: none;
    font-size: 25px;
    padding: 0 20px;
    font-family: "Ga Maamli";
  }

  .input-img img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0.6;
  }

  .refresh-btn {
    width: 20%;
    height: 100%;
    border: none;
    background: #4070f4;
    color: #fff;
    font-size: 20px;
    cursor: pointer;
    transition: 0.3s;
  }

  .refresh-btn:hover {
    opacity: 0.9;
  }
  .captcha-text{
    color: #000;
    font-weight:bold;
    font-style: italic;
  }
</style>
