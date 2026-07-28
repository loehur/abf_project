<script setup>
import { ref } from 'vue'
import { usePage } from '../../composables/usePage'
import { useStoreProfile } from '../../composables/useStoreProfile'

const searchQuery = ref('')
const menuOpen = ref(false)
const { navigate } = usePage()
const { storeProfile } = useStoreProfile()

function toggleMenu() {
  menuOpen.value = !menuOpen.value
}
</script>

<template>
  <header class="site-header">
    <div class="top-bar">
      <div class="container top-bar-inner">
        <p class="top-text">📍 {{ storeProfile.address }}</p>
        <div class="top-links">
          <a href="#">Bantuan</a>
          <a :href="`https://wa.me/${storeProfile.whatsapp}`" target="_blank" rel="noopener">WhatsApp</a>
          <a href="#">Lacak Pesanan</a>
        </div>
      </div>
    </div>

    <div class="main-header">
      <div class="container main-header-inner">
        <button class="menu-toggle" aria-label="Menu" @click="toggleMenu">
          <span></span>
          <span></span>
          <span></span>
        </button>

        <button class="logo" @click="navigate('home')">
          <img
            v-if="storeProfile.logoUrl"
            class="logo-image"
            :src="storeProfile.logoUrl"
            :alt="storeProfile.name"
          />
          <span v-else class="logo-icon">📸</span>
          <div class="logo-text">
            <strong>{{ storeProfile.name }}</strong>
            <small>{{ storeProfile.tagline }}</small>
          </div>
        </button>

        <div class="search-box">
          <input
            v-model="searchQuery"
            type="search"
            placeholder="Cari kamera, drone, lensa..."
          />
          <button type="button" aria-label="Cari">🔍</button>
        </div>

        <div class="header-actions">
          <a href="#" class="action-btn">
            <span class="action-icon">❤️</span>
            <span class="action-label">Favorit</span>
          </a>
          <a href="#" class="action-btn cart-btn">
            <span class="action-icon">🛒</span>
            <span class="action-label">Keranjang</span>
            <span class="cart-badge">3</span>
          </a>
        </div>
      </div>
    </div>

    <nav class="mobile-nav" :class="{ open: menuOpen }">
      <button @click="navigate('home'); menuOpen = false">Home</button>
      <button @click="navigate('shop'); menuOpen = false">Shop</button>
    </nav>
  </header>
</template>
