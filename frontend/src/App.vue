<template>
  <Header />
  <router-view v-slot="{ Component }">
    <transition :name="'fade'" mode="out-in">
      <component :is="Component" :key="Component" />
    </transition>
  </router-view>
  <Footer />
</template>

<script setup lang="ts">

  import Header from '@/layouts/Header.vue';
  import Footer from '@/layouts/Footer.vue';

  import 'vue3-carousel/carousel.css'

</script>

<style>
  @import '@/scss/theme.scss';
</style>
