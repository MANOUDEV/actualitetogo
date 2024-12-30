<script setup>
import { ref, onMounted } from 'vue';
import moment from 'moment';
import { useStore } from 'vuex';

const store = useStore();
const loading = ref(true);
const internationalData = ref({});
const internationalMessage = ref(null);
const internationalState = ref(true);
const afriqueState = ref(false);
const mondeState = ref(false);
const empty = ref(2);

const getResults = async () => { 
  await store.dispatch('international/internationalDataRequest', {});

  const status = store.getters['international/getInfosInternationalStatus'];
  const message = store.getters['international/getInfosInternationalMessage'];
  const data = store.getters['international/getInfosInternationalData'];

  if (status === 'success') {
    internationalData.value = data;
    empty.value = 0;
  } else {
    internationalMessage.value = message;
    empty.value = status === 'empty' ? 1 : 3;
  }
  loading.value = false;
};

const international = () => {
  mondeState.value= false
  afriqueState.value= false
  internationalState.value= true
  getResults();
}
const monde = async () => {
  mondeState.value= true
  afriqueState.value= false
  internationalState.value= false 
  await store.dispatch('international/mondeDataRequest', {});

  const status = store.getters['international/getInfosMondeStatus'];
  const message = store.getters['international/getInfosMondeMessage'];
  const data = store.getters['international/getInfosMondeData'];

  if (status === 'success') {
    internationalData.value = data;
    empty.value = 0;
  } else {
    internationalMessage.value = message;
    empty.value = status === 'empty' ? 1 : 3;
  } 
};

const afrique = async () => {
  mondeState.value= false
  afriqueState.value= true
  internationalState.value= false 
  await store.dispatch('international/afriqueDataRequest', {});

  const status = store.getters['international/getInfosAfriqueStatus'];
  const message = store.getters['international/getInfosAfriqueMessage'];
  const data = store.getters['international/getInfosAfriqueData'];

  if (status === 'success') {
    internationalData.value = data;
    empty.value = 0;
  } else {
    internationalMessage.value = message;
    empty.value = status === 'empty' ? 1 : 3;
  } 
};

const author = (slug) => {
  window.location = `/authors/${slug}`;
};

const article = (slug) => {
  window.location = `/${slug}`;
};

const getImage = (slug) => slug;

onMounted(() => {
  getResults();
});
</script>
<template>
    <div class="container">

        <div v-if="loading">
            <br><br><br>
            <div class="d-flex justify-content-center mt-3">
                <div class="spinner-border text-success" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <br><br><br>
        </div>
        <div v-else class="row g-4 p-3 flex-fill">

            <div  v-if="empty === 1">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                      <div style="position: relative; height: 250px;">
                          <img src="https://actualitetogo.com/assets/images/empty.png" style="width: 100px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);" alt="empty">
                      </div>
                      <h5 style="text-align: center; margin-top: -50px"> {{ internationalMessage  }} </h5>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>

            <div  v-if="empty === 3">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                      <div style="position: relative; height: 250px;">
                          <img src="https://actualitetogo.com/assets/images/error.png" style="width: 100px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);" alt="empty">
                      </div>
                      <h5 style="text-align: center; margin-top: -50px"> {{ internationalMessage  }} </h5>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
            <!-- Card item START -->
            <div class="col-sm-6 col-lg-3" v-else-if="empty === 0" v-for="result in internationalData" :key="result.id">
                <div class="card bg-transparent" v-if="result.image_cover_url">
                    <!-- Card img -->
                    <img class="card-img rounded" :src='getImage(result.image_cover_url)' style="height: 150px; object-fit: cover" :alt='result.title'>
                    <div class="card-body px-0 pt-3">
                        <h6 class="card-title mb-0"><span @click="article(result.slug)" style="cursor: pointer" class="btn-link text-reset fw-bold" v-html="result.title"></span></h6>
                        <!-- Card info -->
                        <ul class="nav nav-divider align-items-center text-uppercase small mt-2"> 
                            <li class="nav-item">
                                <span @click="author(result.author_slug)" style="cursor: pointer" class="text-reset btn-link">{{ result.author_name }}</span>
                            </li>
                            <li class="nav-item">{{ moment(result.date_publish).format("DD/MM/YYYY") }}</li>
                        </ul>
                    </div>
                </div>
                <div v-else>
                    <div class="card mb-4">
                        <div class="card-body border rounded-3">
                            
                            <h6 class="card-title mb-0"><span @click="article(result.slug)" style="cursor: pointer" class="btn-link text-reset fw-bold" v-html="result.title"></span></h6>
                            <p class="card-text" v-html="truncate_content"> </p>
                            <!-- Card info -->
                            <ul class="nav nav-divider align-items-center text-uppercase small mt-2">
                                <li class="nav-item">
                                    <span @click="author(result.author_slug)" style="cursor: pointer" class="text-reset btn-link">{{ result.author_name }}</span>
                                </li>
                                <li class="nav-item">{{ moment(result.date_publish).format("DD/MM/YYYY") }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row px-3">
                <div class="col-12">
                    <ul class="list-inline mt-3">
                        <li class="list-inline-item">
                            <span style="cursor: pointer" v-if="internationalState" @click="international" class="btn btn-sm btn-success">International </span>
                            <span style="cursor: pointer" v-else @click="international" class="btn btn-sm btn-primary-soft">International </span>
                        </li>
                        <li class="list-inline-item">
                            <span style="cursor: pointer" v-if="afriqueState" @click="afrique" class="btn btn-sm btn-success">Afrique</span>
                            <span style="cursor: pointer" v-else @click="afrique" class="btn btn-sm btn-primary-soft">Afrique</span>
                        </li>
                        <li class="list-inline-item">
                            <span style="cursor: pointer" v-if="mondeState" @click="monde" class="btn btn-sm btn-success">Monde</span>
                            <span style="cursor: pointer" v-else @click="monde" class="btn btn-sm btn-primary-soft">Monde</span>
                        </li>
                    </ul>
                </div>
            </div> <!-- Row END -->
        </div>
    </div>
</template>
