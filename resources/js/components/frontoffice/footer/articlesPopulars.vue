<script setup>
import { ref, onMounted } from 'vue';
import moment from 'moment';
import { useStore } from 'vuex';

const store = useStore();
const loading = ref(true);
const publicationsPopularsData = ref({});
const publicationsPopularsMessage = ref(null);
const empty = ref(2);

const getResults = async () => {
  loading.value = true;
  await store.dispatch('articlesPopulars/articlesPopularsDataRequest', {});

  const status = store.getters['articlesPopulars/getInfosArticlesPopularsStatus'];
  const message = store.getters['articlesPopulars/getInfosArticlesPopularsMessage'];
  const data = store.getters['articlesPopulars/getInfosArticlesPopularsData'];

  if (status === 'success') {
    publicationsPopularsData.value = data;
    empty.value = 0;
  } else {
    publicationsPopularsMessage.value = message;
    empty.value = status === 'empty' ? 1 : 3;
  }
  loading.value = false;
};

const article = (slug) => {
  window.location = `/${slug}`;
};

const author = (slug) => {
  window.location = `/authors/${slug}`;
};


const getImage = (slug) => slug;

onMounted(() => {
  getResults();
});
</script>
<template>
    <div class="d-flex justify-content-center" v-if="loading">
        <div class="spinner-border text-light"  role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <div class="tg-post" v-else v-for="info in publicationsPopularsData" :key="info.id">
      <img :src='getImage(info.image_cover_url)' :alt='info.title'>
      <div>
        <span @click="category(info.category_slug)" style="cursor: pointer" class="tag">{{ info.category_name }}</span>
        <h6 @click="article(info.slug)" style="cursor: pointer" class="btn-link text-white fw-normal" v-html="info.title"></h6>
        <small><span @click="author(info.author_slug)" style="cursor: pointer" > {{ info.author_name }} </span> • {{ moment(info.date_publish).format("DD/MM/YYYY") }}</small>
      </div>
    </div>
    <!-- Item -->

</template>
