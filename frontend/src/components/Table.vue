<template>
  <table border="1" cellpadding="8" cellspacing="0">
    <thead>
      <tr>
        <th v-for="(title, index) in titles" :key="index">{{ title }}</th>
        <th v-if="actions">Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="(item, rowIndex) in data" :key="item.id || rowIndex">
        <td v-for="(title, colIndex) in titles" :key="colIndex">
          {{ item[title.toLowerCase()] }}
        </td>
        <td v-if="actions">
          <button
            @click="$emit('action', item)"
            style="background: none; border: none; cursor: pointer; color: #007bff;"
            title="Ação"
          >
            ℹ️
          </button>
        </td>
      </tr>
    </tbody>
  </table>
</template>

<script setup>

  defineProps({
    titles: {
      type: Array,
      required: true
    },
    data: {
      type: Array,
      required: true
    },
    actions: {
      type: Boolean,
      default: false
    }
  })

</script>

<style lang="scss">

  table {
    width: 100%;
    border-collapse: collapse;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    border-radius: 8px;
    overflow: hidden;
    background-color: #fff;

    th, td {
      padding: 12px 16px;
      text-align: left;
    }

    th {
      background-color: #f5f5f5;
    }

    tbody tr {
      &:hover {
        background-color: var(--primary-color);
      }
    }
  }

</style>