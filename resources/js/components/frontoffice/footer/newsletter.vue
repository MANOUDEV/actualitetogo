<script setup>
import { ref, onMounted } from 'vue';
import Swal from 'sweetalert2'
import 'sweetalert2/dist/sweetalert2.min.css';
import { useStore } from 'vuex';

const store = useStore();
const loading = ref(false);
const newsletterData = ref({email: null});
const newsletterErrors = ref({}); 
const newsletterMessage = ref(null)

const saveNewsletter = async () => { 
    loading.value = true;
    newsletterMessage.value = null;
    newsletterErrors.value = [];

    await store.dispatch('newsletter/newsletterRequest', {email: newsletterData.value.email});
 
    const status = store.getters['newsletter/getNewsletterStatus'];
    const message = store.getters['newsletter/getNewsletterMessage'];
    const errors = store.getters['newsletter/getNewsletterErrors'];
 
    if (status === 'success') {

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: message
        })

        newsletterData.value.email = null

    }else{
        if (status === 'error') {

            newsletterErrors.value = errors;
            newsletterMessage.value = message;
            
        }else{
  
            newsletterMessage.value = message;
        }

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'error',
            title: message
        })
    }

    
    loading.value = false;
}; 

onMounted(() => { 
});
</script>
<template>
    <form class="input-group mt-2" >
        <input v-if="newsletterErrors.email" required type="email" name="email" v-model="newsletterData.email" class="form-control is-invalid" placeholder="Entrez votre email " />
        <input v-else required type="email" name="email" v-model="newsletterData.email" class="form-control " placeholder="Entrez votre email " />
        <button type="submit"  class="btn btn-primary m-0" @click.prevent="saveNewsletter"  v-if="!loading"><i class="bi bi-send"></i></button>
        <button type="button"  class="btn btn-primary m-0" v-else>
            <i  style="color: #fff" class="fa fa-spinner fa-1x fa-spin fa-fw"></i>
            <span class="sr-only">Loading...</span>
        </button>
    </form>
    <div v-if="newsletterErrors.email">
        <div v-for="errorName in newsletterErrors.email" :key="errorName" class="form-text mt-2 text-white">
            {{ errorName }}
        </div>
    </div>
    <div v-else class="form-text mt-2 text-white">
        En vous abonnant, vous acceptez notre politique de confidentialité.
    </div>
</template>
