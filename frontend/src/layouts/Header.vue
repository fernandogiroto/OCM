<template>
    <header>
      <span>Logo</span>
    </header>
</template>

<script setup lang="ts">

</script>

<style lang="scss">

  @use '@/scss/mixings';
  @use '@/scss/variables';

  header {
    @include mixings.flexbox(row, space-between, center);
    width: 100%;
    height: 50px;
    padding: 20px;
    border-bottom: 1px solid var(--text-color);
  }

</style>