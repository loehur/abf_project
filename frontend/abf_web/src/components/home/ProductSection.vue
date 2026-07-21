<script setup>
import { computed, ref } from 'vue'
import { products } from '../../data/store'
import ProductCard from '../product/ProductCard.vue'

const filters = [
  { id: 'all', label: 'Semua' },
  { id: 'kamera', label: 'Kamera' },
  { id: 'drone', label: 'Drone' },
  { id: 'lensa', label: 'Lensa' },
  { id: 'lighting', label: 'Lighting' },
  { id: 'aksesoris', label: 'Aksesoris' },
]

const activeFilter = ref('all')
const sortBy = ref('popular')

const filteredProducts = computed(() => {
  let list = [...products]

  if (activeFilter.value !== 'all') {
    list = list.filter((p) => p.category === activeFilter.value)
  }

  if (sortBy.value === 'price-low') {
    list.sort((a, b) => a.price - b.price)
  } else if (sortBy.value === 'price-high') {
    list.sort((a, b) => b.price - a.price)
  } else if (sortBy.value === 'rating') {
    list.sort((a, b) => b.rating - a.rating)
  } else {
    list.sort((a, b) => b.sold - a.sold)
  }

  return list
})
</script>

<template>
  <section id="produk" class="product-section">
    <div class="container">
      <div class="section-head">
        <div>
          <h2>Rekomendasi Untuk Anda</h2>
          <p>Produk pilihan dari {{ filteredProducts.length }} item tersedia</p>
        </div>
        <select v-model="sortBy" class="sort-select">
          <option value="popular">Paling Laris</option>
          <option value="rating">Rating Tertinggi</option>
          <option value="price-low">Harga Terendah</option>
          <option value="price-high">Harga Tertinggi</option>
        </select>
      </div>

      <div class="filter-tabs">
        <button
          v-for="filter in filters"
          :key="filter.id"
          :class="{ active: activeFilter === filter.id }"
          @click="activeFilter = filter.id"
        >
          {{ filter.label }}
        </button>
      </div>

      <div class="product-grid">
        <ProductCard
          v-for="product in filteredProducts"
          :key="product.id"
          :product="product"
        />
      </div>

      <div class="load-more-wrap">
        <button type="button" class="load-more-btn">Muat Lebih Banyak</button>
      </div>
    </div>
  </section>
</template>
