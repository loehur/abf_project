<script setup>
import { computed, ref } from 'vue'
import AdminSidebar from './AdminSidebar.vue'
import AdminHeader from './AdminHeader.vue'
import { pageTitles } from '../../data/menu'
import { usePage } from '../../composables/usePage'

const sidebarOpen = ref(false)
const { currentPage } = usePage()

const pageTitle = computed(() => pageTitles[currentPage.value] || 'Admin')
</script>

<template>
  <div class="admin-shell">
    <AdminSidebar
      :sidebar-open="sidebarOpen"
      @close="sidebarOpen = false"
    />

    <div class="admin-main-wrap">
      <AdminHeader
        :page-title="pageTitle"
        :on-menu-toggle="() => (sidebarOpen = !sidebarOpen)"
      />

      <main class="admin-content">
        <slot />
      </main>
    </div>
  </div>
</template>
