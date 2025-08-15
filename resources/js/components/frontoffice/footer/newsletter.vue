<script setup>
import { ref, onMounted } from 'vue'; 
import { useStore } from 'vuex';

const store = useStore();
const loading = ref(false);
const data = ref({email: null});
const errors = ref({});

const saveNewsletter = async () => { 
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
    
</template>
