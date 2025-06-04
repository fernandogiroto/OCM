<template>
    <footer>
        <div class="footer-links">
            <a href="https://www.linkedin.com/in/fernandogiroto/"  target="_blank" class="footer-links__label">
              <IconBrandLinkedinFilled />
              @fernandogiroto
            </a>
        </div>
    </footer>
</template>

<script setup>

  import { IconBrandLinkedinFilled } from '@tabler/icons-vue';

</script>
    
<style lang="scss">

  @use '@/scss/mixings';
  @use '@/scss/variables';

  footer {
    @include mixings.flexbox(column, center, center);
    width: 100%;
    height: 50px;
    padding: 20px;
    border-top:  1px solid var(--text-color);
    .footer-links {
      @include mixings.flexbox(row, center, center);
      gap: 10px;
      &__label {
        @include mixings.flexbox(row, center, center);
        text-decoration: none;
        font-size: 14px;
      }
    }
  }

</style>