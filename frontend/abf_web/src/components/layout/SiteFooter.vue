<script setup>
import { storeInfo } from '../../data/store'
</script>

<template>
  <footer class="site-footer">
    <div class="container footer-grid">
      <div class="footer-brand">
        <div class="footer-logo">
          <span>📸</span>
          <strong>{{ storeInfo.name }}</strong>
        </div>
        <p>
          Toko perlengkapan fotografi terpercaya. Kamera, drone, lensa,
          lighting, dan aksesoris original dengan garansi resmi.
        </p>
        <div class="social-links">
          <a href="#">Instagram</a>
          <a href="#">TikTok</a>
          <a href="#">YouTube</a>
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
          <li>📞 {{ storeInfo.phone }}</li>
          <li>✉️ {{ storeInfo.email }}</li>
          <li>📍 {{ storeInfo.address }}</li>
          <li>🕐 Sen–Sab, 09.00–18.00 WIB</li>
        </ul>
      </div>
    </div>

    <div class="footer-bottom">
      <div class="container footer-bottom-inner">
        <p>&copy; 2026 {{ storeInfo.name }}. Semua hak dilindungi.</p>
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
