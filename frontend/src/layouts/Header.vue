<template>
    <header>
      <img src="../assets/images/logo.jpg" alt="OCM" class="logo">
    </header>
</template>

<script setup lang="ts">

</script>

<style lang="scss">

  @use '@/scss/mixings';
  @use '@/scss/variables';

  header {
    @include mixings.flexbox(row, center, center);
    width: 100%;
    height: 50px;
    padding: 20px;
    border-bottom: 1px solid var(--text-color);
    .logo {
      width: 130px;
      height: auto;
      object-fit: cover;
    }
    
  }

</style>