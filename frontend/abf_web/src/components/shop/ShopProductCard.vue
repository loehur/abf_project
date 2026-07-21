<script setup>
import { calcDiscount, formatPrice } from '../../data/store'

defineProps({
  product: { type: Object, required: true },
})
</script>

<template>
  <article class="sp-card">
    <a href="#" class="sp-image-wrap">
      <img :src="product.image" :alt="product.name" loading="lazy" />
      <div v-if="product.stock === false" class="sp-out-of-stock">OUT OF STOCK</div>
      <span
        v-if="calcDiscount(product.price, product.originalPrice)"
        class="sp-discount-dot"
      >
        -{{ calcDiscount(product.price, product.originalPrice) }}%
      </span>
    </a>

    <div class="sp-body">
      <p class="sp-category">{{ product.categoryLabel || product.category.toUpperCase() }}</p>
      <a href="#" class="sp-name">{{ product.name }}</a>
      <div class="sp-price-row">
        <strong>{{ formatPrice(product.price) }}</strong>
        <del v-if="product.originalPrice">{{ formatPrice(product.originalPrice) }}</del>
      </div>
      <div class="sp-meta">
        <span class="sp-rating">⭐ {{ product.rating }}</span>
        <span>{{ product.sold }}+ terjual</span>
      </div>
    </div>
  </article>
</template>
