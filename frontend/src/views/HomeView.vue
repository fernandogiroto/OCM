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
    <div class="users-list">
      <div class="user-list__table">
        <Table
          :titles="titles"
          :data="filteredUsers"
          :actions="true"
          @action="openModal"/>
      </div>
      <div class="user-list__cards">
        <h1>Card Users</h1>
      </div>
    </div>
    <Modal v-model:isModalOpen="isModalVisible">
      <template #content>
        <p>{{userDetail}} </p>
      </template>
    </Modal>
  </div>
</template>

<script setup>

  import { ref, onMounted, computed } from 'vue'
  import Table from '@/components/Table.vue'
  import Input from '@/components/form/Input.vue'
  import Modal from '@/components/common/Modal.vue';

  const users = ref([]);
  const usersData = ref([]);
  const titles = ['ID', 'Name', 'Username', 'Email', 'City'];

  const filterText = ref('');
  const isModalVisible = ref(false);
  const userDetail = ref(null);

  const filteredUsers = computed(() => {
    if (!filterText.value) return users.value
    const lowerFilter = filterText.value.toLowerCase()
    return users.value.filter(user => {
      return Object.values(user).some(val =>
        String(val).toLowerCase().includes(lowerFilter)
      )
    })
  })

  function openModal(id) {
    const userItem = usersData.value.find(user => user.id === id);
    if (userItem) {
      userDetail.value = userItem;
      isModalVisible.value = true;
    }
  }

  onMounted(async () => {
    const res = await fetch('https://jsonplaceholder.typicode.com/users')
    usersData.value = await res.json()

    users.value = usersData.value.map(user => ({
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
      @media (max-width: 768px) {
        @include mixings.flexbox(column, initial, initial);
      }
    }
    .user-list {
      &__table {
        display: none;
        @media (min-width: 768px) {
          @include mixings.flexbox(column, initial, initial);
        }
      }
      &__cards {
        @media (min-width: 768px) {
          display: none;
        }
      }
    }
  }

</style>