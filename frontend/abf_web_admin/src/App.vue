<script setup>
import AdminLayout from './components/layout/AdminLayout.vue'
import DashboardPage from './pages/DashboardPage.vue'
import StoreSettingsPage from './pages/StoreSettingsPage.vue'
import PlaceholderPage from './pages/PlaceholderPage.vue'
import { usePage } from './composables/usePage'

const { currentPage } = usePage()
</script>

<template>
  <AdminLayout>
    <DashboardPage v-if="currentPage === 'dashboard'" />
    <StoreSettingsPage v-else-if="currentPage === 'store'" />
    <PlaceholderPage v-else />
  </AdminLayout>
</template>
