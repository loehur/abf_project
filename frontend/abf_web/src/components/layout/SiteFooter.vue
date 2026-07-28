<script setup>
import { useStoreProfile } from '../../composables/useStoreProfile'

const { storeProfile } = useStoreProfile()
</script>

<template>
  <footer class="site-footer">
    <div class="container footer-grid">
      <div class="footer-brand">
        <div class="footer-logo">
          <img
            v-if="storeProfile.logoUrl"
            class="footer-logo-image"
            :src="storeProfile.logoUrl"
            :alt="storeProfile.name"
          />
          <span v-else>📸</span>
          <strong>{{ storeProfile.name }}</strong>
        </div>
        <p>
          {{ storeProfile.description }}
        </p>
        <div class="social-links">
          <a v-if="storeProfile.instagram" :href="storeProfile.instagram" target="_blank" rel="noopener">Instagram</a>
          <a v-if="storeProfile.tiktok" :href="storeProfile.tiktok" target="_blank" rel="noopener">TikTok</a>
          <a v-if="storeProfile.youtube" :href="storeProfile.youtube" target="_blank" rel="noopener">YouTube</a>
        </div>
      </div>

      <div>
        <h4>Belanja</h4>
        <ul>
          <li><a href="#kamera">Kamera</a></li>
          <li><a href="#drone">Drone</a></li>
          <li><a href="#lensa">Lensa</a></li>
          <li><a href="#lighting">Lighting</a></li>
          <li><a href="#aksesoris">Aksesoris</a></li>
        </ul>
      </div>

      <div>
        <h4>Bantuan</h4>
        <ul>
          <li><a href="#">Cara Belanja</a></li>
          <li><a href="#">Pengiriman</a></li>
          <li><a href="#">Garansi Produk</a></li>
          <li><a href="#">Pengembalian</a></li>
          <li><a href="#">FAQ</a></li>
        </ul>
      </div>

      <div>
        <h4>Hubungi Kami</h4>
        <ul class="contact-list">
          <li>📞 {{ storeProfile.phone }}</li>
          <li>✉️ {{ storeProfile.email }}</li>
          <li>📍 {{ storeProfile.address }}</li>
          <li>🕐 {{ storeProfile.openHours }}</li>
        </ul>
      </div>
    </div>

    <div class="footer-bottom">
      <div class="container footer-bottom-inner">
        <p>&copy; 2026 {{ storeProfile.name }}. Semua hak dilindungi.</p>
        <div class="payment-badges">
          <span>BCA</span>
          <span>Mandiri</span>
          <span>QRIS</span>
          <span>COD</span>
        </div>
      </div>
    </div>
  </footer>
</template>
