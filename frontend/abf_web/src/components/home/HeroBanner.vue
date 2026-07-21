<script setup>
import { onMounted, onUnmounted, ref } from 'vue'
import { banners } from '../../data/store'

const activeIndex = ref(0)
let timer = null

function goTo(index) {
  activeIndex.value = index
}

function next() {
  activeIndex.value = (activeIndex.value + 1) % banners.length
}

onMounted(() => {
  timer = setInterval(next, 5000)
})

onUnmounted(() => {
  if (timer) clearInterval(timer)
})
</script>

<template>
  <section class="hero-banner">
    <div class="container">
      <div class="banner-wrapper">
        <div
          v-for="(banner, index) in banners"
          :key="banner.id"
          class="banner-slide"
          :class="{ active: index === activeIndex }"
        >
          <img
            class="banner-image"
            :src="banner.image"
            :alt="`Banner sample ${index + 1}`"
          />
          <div class="banner-visual" aria-hidden="true">
            <div class="banner-sample-tag">Sample Banner</div>
          </div>
        </div>

        <div class="banner-dots">
          <button
            v-for="(banner, index) in banners"
            :key="banner.id"
            :class="{ active: index === activeIndex }"
            :aria-label="`Slide ${index + 1}`"
            @click="goTo(index)"
          />
        </div>
      </div>
    </div>
  </section>
</template>
