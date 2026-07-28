<script setup>
import { onMounted } from 'vue'
import SiteHeader from './components/layout/SiteHeader.vue'
import SiteNav from './components/layout/SiteNav.vue'
import SiteFooter from './components/layout/SiteFooter.vue'
import HomePage from './pages/HomePage.vue'
import ShopPage from './pages/ShopPage.vue'
import { usePage } from './composables/usePage'
import { useStoreProfile } from './composables/useStoreProfile'

const APP_META_URL = 'https://api.asiabarufoto.com'
const { currentPage } = usePage()
const { loadStoreProfile } = useStoreProfile()

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
      document.title = appName
    }
  } catch {
    // Keep fallback title from index.html if API meta fails.
  }
}

onMounted(() => {
  loadStoreProfile()
  loadAppTitle()
})
</script>

<template>
  <div class="store-app">
    <SiteHeader />
    <SiteNav />
    <main>
      <HomePage v-if="currentPage === 'home'" />
      <ShopPage v-else-if="currentPage === 'shop'" />
    </main>
    <SiteFooter />
  </div>
</template>
