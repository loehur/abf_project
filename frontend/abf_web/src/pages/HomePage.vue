<script setup>
import HeroBanner from '../components/home/HeroBanner.vue'
import CategoryStrip from '../components/home/CategoryStrip.vue'
import PromoBar from '../components/home/PromoBar.vue'
import ProductSection from '../components/home/ProductSection.vue'
import { usePage } from '../composables/usePage'

const { navigate } = usePage()
</script>

<template>
  <div>
    <HeroBanner @go-shop="navigate('shop')" />
    <PromoBar />
    <CategoryStrip />
    <ProductSection />
  </div>
</template>
