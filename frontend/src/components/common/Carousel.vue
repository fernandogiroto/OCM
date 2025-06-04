<template>
    <Carousel v-bind="carouselConfig">
        <Slide v-for="(item, index) in items" :key="index">
            <slot :item="item" :index="index" />
        </Slide>
        <template #addons>
            <Pagination v-if="pagination" />
            <Navigation v-if="navigation"/>
        </template>
    </Carousel>
</template>

<script setup>

    import { computed } from 'vue'  
    import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel';

    const props = defineProps({
        items: { type: Array, required: true },
        navigation: { type: Boolean, default: false },
        pagination: { type: Boolean, default: false }
    })

    const carouselConfig = computed(() => {
        const isSingleItem = props.items.length <= 1

        return {
            height: 'auto',
            itemsToShow: 1,
            gap: 5,
            snapAlign: 'center',
            breakpoints: isSingleItem
            ? {} 
            : {
                300: { itemsToShow: 1, snapAlign: 'center' },
                400: { itemsToShow: 1, snapAlign: 'start' },
                500: { itemsToShow: 2, snapAlign: 'start' },
            }
        }
    })

</script>

<style lang="scss">

    .carousel__slide {
        padding: 5px;
    }

</style>