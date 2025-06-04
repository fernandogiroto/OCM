<template>
  <div class="card">
    <div class="card__header">
        #{{ id }} {{ title }}
    </div>
    <div class="card__content">
       <span class="card__content--item"><IconUser size="16" /> {{ username }}</span> 
       <span class="card__content--item"><IconMail size="16"/> {{ email }}</span> 
       <span class="card__content--item"><IconMapPinFilled size="16" /> {{ city }} </span> 
    </div>
    <slot />
    <div class="card__footer">
        <slot name="footer" />
    </div>
  </div>
</template>

<script setup>

    import { IconUser,IconMail,IconMapPinFilled } from '@tabler/icons-vue';

    defineProps({
        title: { type: String},
        id: { type: Number},
        email: { type: String},
        city: { type: String},
        username: { type: String},
        width: { type: String,default: '100%'},
        padding: { type: String, default: '20px'},
        shadow: { type: String, default: '0 4px 12px rgba(0, 0, 0, 0.1)' },
        radius: { type: String, default: '12px'},
        background: { type: String, default: '#fff'}
    })

</script>

<style lang="scss">

    @use '@/scss/mixings';

    .card {
        width: v-bind(width);
        padding: v-bind(padding);
        background-color: v-bind(background);
        border-radius: v-bind(radius);
        box-shadow: v-bind(shadow);
        transition: box-shadow 0.3s ease;
        &__header {
            margin-bottom: 16px;
            font-weight: 600;
            font-size: 1.2rem;
        }
        &__content {
            @include mixings.flexbox(column, initial, initial);
            &--item {
                @include mixings.flexbox(row, initial, center);
                gap: 5px;
                font-size: 12px;
            }
        }
         &__footer {
            margin-top: 16px;
        }
    
    
        &:hover {
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
        }
    }

</style>
