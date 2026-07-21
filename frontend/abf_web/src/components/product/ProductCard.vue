<script setup>
import { calcDiscount, formatPrice } from '../../data/store'

defineProps({
  product: {
    type: Object,
    required: true,
  },
})

function formatSold(count) {
  if (count >= 1000) return `${(count / 1000).toFixed(1)}rb+`
  return `${count}+`
}
</script>

<template>
  <article class="product-card">
    <a href="#" class="product-image-wrap">
      <img :src="product.image" :alt="product.name" loading="lazy" />
      <span v-if="product.badge" class="product-badge">{{ product.badge }}</span>
      <span
        v-if="calcDiscount(product.price, product.originalPrice)"
        class="discount-badge"
      >
        {{ calcDiscount(product.price, product.originalPrice) }}%
      </span>
    </a>

    <div class="product-body">
      <a href="#" class="product-name">{{ product.name }}</a>

      <div class="product-price">
        <strong>{{ formatPrice(product.price) }}</strong>
        <del v-if="product.originalPrice">{{ formatPrice(product.originalPrice) }}</del>
      </div>

      <div class="product-meta">
        <span class="rating">⭐ {{ product.rating }}</span>
        <span class="sold">Terjual {{ formatSold(product.sold) }}</span>
      </div>

      <div class="product-store">
        <span class="store-badge">🏪 Official Store</span>
        <span class="store-location">{{ product.location }}</span>
      </div>
    </div>
  </article>
</template>
