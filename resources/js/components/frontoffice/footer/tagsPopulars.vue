<script setup>
import { ref, onMounted } from 'vue'; 
import { useStore } from 'vuex';

const store = useStore();
const loading = ref(true);
const tagsPopularsData = ref({});
const tagsPopularsMessage = ref(null);
const empty = ref(2);

const getResults = async () => {
  loading.value = true;
  await store.dispatch('tagsPopulars/tagsPopularsDataRequest', {});

  const status = store.getters['tagsPopulars/getInfosTagsPopularsStatus'];
  const message = store.getters['tagsPopulars/getInfosTagsPopularsMessage'];
  const data = store.getters['tagsPopulars/getInfosTagsPopularsData'];

  if (status === 'success') {
    tagsPopularsData.value = data;
    empty.value = 0;
  } else {
    tagsPopularsMessage.value = message;
    empty.value = status === 'empty' ? 1 : 3;
  }
  loading.value = false;
};
 
const tag = (slug) => {
  window.location = `/tags/${slug}`;
};
 
onMounted(() => {
  getResults();
});
</script>

<template>
    <li v-for="info in tagsPopularsData" :key="info.id" v-if="!loading" ><a href="#" style="cursor: pointer" @click="category(info.slug)" > {{ info.name.toUpperCase() }} </a></li>

</template>
 