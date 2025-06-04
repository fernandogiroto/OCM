<template>
  <div class="home-view">
    <div class="home-view__filters">
      <Input 
        @debounced-input="filterText = $event"
        label="Filter by frontend" 
        placeholder="Filter Users"
        inputWidth="300px"  
      />
          <Input 
        @debounced-input="filterText = $event"
        label="Filter by backend" 
        placeholder="Filter Users"
        inputWidth="300px"  
      />
    </div>
    <Table
      :titles="titles"
      :data="filteredUsers"
      :actions="true"
      @action="handleAction"
    />
  </div>
</template>

<script setup>

  import { ref, onMounted, computed } from 'vue'
  import Table from '@/components/Table.vue'
  import Input from '@/components/form/Input.vue'

  const users = ref([]);
  const titles = ['ID', 'Name', 'Username', 'Email', 'City'];

  const filterText = ref('')

  const filteredUsers = computed(() => {
    if (!filterText.value) return users.value
    const lowerFilter = filterText.value.toLowerCase()
    return users.value.filter(user => {
      return Object.values(user).some(val =>
        String(val).toLowerCase().includes(lowerFilter)
      )
    })
  })

  function handleAction(user) {
    alert(`Você clicou no usuário: ${user.name}`)
  }

  onMounted(async () => {
    const res = await fetch('https://jsonplaceholder.typicode.com/users')
    const data = await res.json()

    users.value = data.map(user => ({
      id: user.id,
      name: user.name,
      username: user.username,
      email: user.email,
      city: user.address.city
    }))
  })

</script>


<style lang="scss">

  @use '@/scss/mixings';
  @use '@/scss/variables';

  .home-view {
    @include mixings.flexbox(column, initial, initial);
    gap: 20px;
    padding: 20px;
    height: 100%;
    width: 100%;
    @include mixings.scrollbar-none();
    &__filters {
      @include mixings.flexbox(row, initial, initial);
      gap: 20px;
    }
  }

</style>