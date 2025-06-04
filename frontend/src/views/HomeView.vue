<template>
  <div class="home-view">
    <div class="home-view__filters">
      <Input 
        @debounce="filterText = $event"
        label="Filter by frontend" 
        placeholder="Filter Users (FRONT)"
        inputWidth="300px"  
      />
      <Input 
        @debounce="backendSearch = $event"
        label="Filter by backend" 
        placeholder="Search Users (API)"
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
      <div class="user-list__cards bottom-to-top--effect">
        <Carousel :items="filteredUsers" :navigation="true">
          <template #default="{ item }">
            <Card :id="item.id" :title="item.name" :username="item.username" :email="item.email" :city="item.city">
              <template #footer>
                <button class="button__secondary" @click="openModal(item.id)">View More</button>
              </template>
            </Card>
          </template>
        </Carousel>
      </div>
    </div>
    <Modal v-model:isModalOpen="isModalVisible">
      <template #content>
        <div class="user-detail">
          <img src="@/assets/images/avatar.webp" class="user-detail--avatar" :alt="userDetail.name">
          <span class="user-detail__title">#{{userDetail.id}} {{userDetail.name}} </span>
          <span class="user-detail__item">{{userDetail.username}} </span>
          <span class="user-detail__item">{{userDetail.email}} </span>
          <span class="user-detail__item">{{userDetail.phone}} </span>
          <span class="user-detail__item">{{userDetail.city}} </span>
          <span class="user-detail__item">{{userDetail.company}} </span>
        </div>
      </template>
    </Modal>
  </div>
</template>

<script setup>

  import { ref, onMounted, computed, watch } from 'vue'
  import { fetchUsers } from '@/services/userService'

  import Table from '@/components/Table.vue'
  import Input from '@/components/form/Input.vue'
  import Modal from '@/components/common/Modal.vue';
  import Card from '@/components/common/Card.vue'
  import Carousel from '@/components/common/Carousel.vue'

  const users = ref([]);
  const usersData = ref([]);
  const titles = ['ID', 'Name', 'Username', 'Email', 'City'];

  const filterText = ref('');
  const backendSearch = ref('')
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

  watch(backendSearch, async (newValue) => {
    try {
      const data = await fetchUsers(newValue) 
      users.value = data
      usersData.value = data 
    } catch (error) {
      console.error('Error to fetch users:', error)
    }
  })


  onMounted(async () => {
    try {
      const data = await fetchUsers()
      users.value = data
      usersData.value = data
    } catch (error) {
      console.error('Error to load users:', error)
    }
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
        resize: horizontal;
        border: 2px dashed gray;
        overflow: auto;
        max-width: 100%;
        padding: 2px;
      &__table {
        display: none;
        @media (min-width: 768px) {
          @include mixings.flexbox(column, initial, initial);
        }
      }
      &__cards {
          overflow: auto;
        @media (min-width: 768px) {
          display: none;
        }
      }
    }
  }

  .user-detail {
    @include mixings.flexbox(column, center, center);
    &__title {
      font-size: 1.5rem;
      font-weight: 600;
      margin-bottom: 10px;
    }
    &__item {
      font-size: 1.2rem;
    }
    &--avatar {
      width: 100px;
      height: 100px;
    }
  }

</style>