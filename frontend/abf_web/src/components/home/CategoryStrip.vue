<script setup>
import { categories } from '../../data/store'
</script>

<template>
  <section class="category-strip">
    <div class="container">
      <div class="section-head">
        <h2>Kategori</h2>
        <a href="#">Lihat Semua</a>
      </div>
      <div class="category-grid">
        <a
          v-for="cat in categories"
          :key="cat.id"
          :href="`#${cat.id}`"
          class="category-item"
        >
          <span class="category-icon">{{ cat.icon }}</span>
          <span class="category-name">{{ cat.name }}</span>
        </a>
      </div>
    </div>
  </section>
</template>
