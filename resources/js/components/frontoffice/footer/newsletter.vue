<script setup>
import { ref, onMounted } from 'vue';
import moment from 'moment';
import { useStore } from 'vuex';

const store = useStore();
const loading = ref(false);
const data = ref({email: null});
const errors = ref({});
const captchaRandomNumber = ref(null)
const captchaRandomVerify = ref(null)
const messageCaptcha = ref(null) 

const storeH = async () => { 
  loading.value = true;
  await store.dispatch('newsletter/newsletterRequest', {email: data.value.email});

  const status = store.getters['newsletter/getInfosNewsletterStatus'];
  const message = store.getters['newsletter/getInfosNewsletterMessage'];
  const errors = store.getters['newsletter/getInfosNewsletterErrors'];

  if (status === 'success') {

    loading.value = false
    publicationsPopularsData.value = errors;
    publicationsPopularsMessage.value = message;
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
        title: message
    })

    data.value.email = null

  } else {
    loading.value = false
    if (status === 'error') {

        publicationsPopularsErrors.value = errors;
        publicationsPopularsMessage.value = message;

    }else{
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
            icon: 'error',
            title: message
        })
        publicationsPopularsMessage.value = message;
    }
  }
  loading.value = false;
};
const verifyCaptchaNewsLetterClose = () =>{
    generateCaptcha()
    messageCaptcha.value = null
    captchaRandomVerify.value = null
    $('#verifyCaptchaNewsLetter').modal('hide');
};

const verifyCaptchaNewsLetterShow = () =>{
    generateCaptcha()
    $('#verifyCaptchaNewsLetter').modal('show');
};

const reloadcaptchaRandomNumber = () =>{
    generateCaptcha()
};

const generateCaptcha = () =>{
    const randomString = Math.random().toString(36).substring(2, 7);
    const randomStringArray = randomString.split("");
    const changeString = randomStringArray.map((char) =>
        Math.random() > 0.5
        ? char.toUpperCase()
        : char
    );

    captchaRandomNumber.value = changeString.join("");
};

const saveNewsletter = () => {
    generateCaptcha()
    verifyCaptchaNewsLetterShow()
};

const save = () => {

    if(captchaRandomVerify.value != captchaRandomNumber.value){

        messageCaptcha.value="Veuillez entrer un captcha valide."

    }else{

        verifyCaptchaNewsLetterClose()

        storeH()

    }
};

onMounted(() => {
    generateCaptcha()
});
</script>
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
