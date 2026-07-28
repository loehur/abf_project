<script setup>
import { onMounted } from 'vue'
import AdminLayout from './components/layout/AdminLayout.vue'
import DashboardPage from './pages/DashboardPage.vue'
import StoreSettingsPage from './pages/StoreSettingsPage.vue'
import PlaceholderPage from './pages/PlaceholderPage.vue'
import { usePage } from './composables/usePage'

const APP_META_URL = 'https://api.asiabarufoto.com'
const { currentPage } = usePage()

async function loadAppTitle() {
  try {
    const response = await fetch(APP_META_URL, {
      headers: {
        Accept: 'application/json',
      },
    })

    const payload = await response.json().catch(() => null)
    const appName = payload?.data?.name

    if (response.ok && appName) {
      document.title = `Admin - ${appName}`
    }
  } catch {
    // Keep fallback title from index.html if API meta fails.
  }
}

onMounted(() => {
  loadAppTitle()
})
</script>

<template>
  <AdminLayout>
    <DashboardPage v-if="currentPage === 'dashboard'" />
    <StoreSettingsPage v-else-if="currentPage === 'store'" />
    <PlaceholderPage v-else />
  </AdminLayout>
</template>
