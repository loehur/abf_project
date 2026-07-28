<script setup>
import { onMounted } from 'vue'
import SiteHeader from './components/layout/SiteHeader.vue'
import SiteNav from './components/layout/SiteNav.vue'
import SiteFooter from './components/layout/SiteFooter.vue'
import HomePage from './pages/HomePage.vue'
import ShopPage from './pages/ShopPage.vue'
import { usePage } from './composables/usePage'
import { useStoreProfile } from './composables/useStoreProfile'

const { currentPage } = usePage()
const { loadStoreProfile } = useStoreProfile()

onMounted(() => {
  loadStoreProfile()
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
