<template>
    <div class="input-type">
        <span class="input-type__label" v-if="label">{{label}}</span>
        <input type="text" :placeholder="placeholder" @input="handleInput":class="inputClass"/>
    </div>
</template>

<script setup>

    const props = defineProps({
        label: {
            type: String,
        },
        placeholder: {
            type: String,
            default: "Search..."
        },
        inputClass: {
            type: String,
            default: "input-type__search"
        },
        inputDebounce: {
            type: Number,
            default: 500
        },
        inputWidth: {
            type: String,
            default: "100%"
        }
    })
  
    const emit = defineEmits(['debounced-input'])

    let debounceTimer = null

    function handleInput(event) {
        const value = event.target.value
        clearTimeout(debounceTimer)
        debounceTimer = setTimeout(() => {
            emit('debounced-input', value)
        }, props.inputDebounce)
    }

</script>


<style lang="scss">
  @use '@/scss/mixings';
  @use '@/scss/variables';

    .input-type {
        @include mixings.flexbox(column, initial, initial);
        gap: 2px;
        &__search {
            width: 100%;
            max-width: v-bind(inputWidth);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            font-size: 16px;
            transition: border-color 0.3s;
            &:focus {
                border-color: #007bff;
                outline: none;
            }
        }
        &__label {
            font-size: 12px;
            color: #afafaf;
        }
    }

</style>