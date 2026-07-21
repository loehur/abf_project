<script setup>
import { navMenus } from '../../data/store'
import { usePage } from '../../composables/usePage'

const { currentPage, navigate } = usePage()
</script>

<template>
  <nav class="site-nav">
    <div class="container nav-inner">
      <button
        v-for="item in navMenus"
        :key="item.page"
        class="nav-link"
        :class="{ active: currentPage === item.page }"
        @click="navigate(item.page)"
      >
        {{ item.label }}
      </button>
    </div>
  </nav>
</template>
