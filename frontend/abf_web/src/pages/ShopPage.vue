<script setup>
import { computed, ref } from 'vue'
import { products, sidebarCategories } from '../data/store'
import ShopSidebar from '../components/shop/ShopSidebar.vue'
import ShopProductCard from '../components/shop/ShopProductCard.vue'

const activeCategory = ref(null)
const activeChild = ref(null)
const sortBy = ref('popular')
const showMobileSidebar = ref(false)

function onSelect({ categoryId, child }) {
  activeCategory.value = categoryId
  activeChild.value = child
}

function clearFilter() {
  activeCategory.value = null
  activeChild.value = null
}

const breadcrumb = computed(() => {
  if (!activeCategory.value) return null
  const cat = sidebarCategories.find(c => c.id === activeCategory.value)
  if (!cat) return null
  if (activeChild.value) return `${cat.name} > ${activeChild.value}`
  return cat.name
})

const filtered = computed(() => {
  let list = [...products]
  if (activeCategory.value) {
    list = list.filter(p => p.category === activeCategory.value)
  }
  if (sortBy.value === 'price-low') list.sort((a, b) => a.price - b.price)
  else if (sortBy.value === 'price-high') list.sort((a, b) => b.price - a.price)
  else if (sortBy.value === 'rating') list.sort((a, b) => b.rating - a.rating)
  else list.sort((a, b) => b.sold - a.sold)
  return list
})
</script>

<template>
  <div class="shop-page">
    <div class="container shop-container">

      <!-- Mobile filter toggle -->
      <div class="shop-mobile-bar">
        <button class="filter-toggle-btn" @click="showMobileSidebar = !showMobileSidebar">
          ☰ Filter Kategori
        </button>
        <div class="shop-sort-inline">
          <label>Urutkan:</label>
          <select v-model="sortBy">
            <option value="popular">Paling Laris</option>
            <option value="rating">Rating Tertinggi</option>
            <option value="price-low">Harga Terendah</option>
            <option value="price-high">Harga Tertinggi</option>
          </select>
        </div>
      </div>

      <div class="shop-layout">
        <!-- Sidebar -->
        <div class="sidebar-wrap" :class="{ 'sidebar-open': showMobileSidebar }">
          <ShopSidebar
            :activeCategory="activeCategory"
            :activeChild="activeChild"
            @select="onSelect"
          />
        </div>

        <!-- Main content -->
        <div class="shop-main">
          <!-- Toolbar -->
          <div class="shop-toolbar">
            <div class="shop-breadcrumb">
              <button v-if="breadcrumb" class="crumb-link" @click="clearFilter">Semua Produk</button>
              <span v-if="breadcrumb"> / {{ breadcrumb }}</span>
              <span v-else>Semua Produk</span>
            </div>

            <div class="shop-sort">
              <label>Urutkan:</label>
              <select v-model="sortBy">
                <option value="popular">Paling Laris</option>
                <option value="rating">Rating Tertinggi</option>
                <option value="price-low">Harga Terendah</option>
                <option value="price-high">Harga Tertinggi</option>
              </select>
            </div>
          </div>

          <!-- Product count -->
          <p class="shop-count">Menampilkan {{ filtered.length }} produk</p>

          <!-- Grid -->
          <div v-if="filtered.length" class="shop-grid">
            <ShopProductCard
              v-for="product in filtered"
              :key="product.id"
              :product="product"
            />
          </div>

          <div v-else class="shop-empty">
            <p>Tidak ada produk di kategori ini.</p>
            <button @click="clearFilter">Lihat Semua Produk</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
