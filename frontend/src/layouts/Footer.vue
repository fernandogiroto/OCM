<template>
    <footer>
        <div class="footer-links">
            <a href="https://www.linkedin.com/in/fernandogiroto/"  target="_blank" class="footer-links__label">@fernandogiroto</a>
        </div>
    </footer>
</template>
    
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
        text-decoration: none;
        font-size: 14px;
      }
    }
  }

</style>