<script setup>
defineProps({
  pageTitle: { type: String, default: 'Dashboard' },
  onMenuToggle: { type: Function, default: null },
})
</script>

<template>
  <header class="admin-header">
    <button type="button" class="menu-btn" aria-label="Menu" @click="onMenuToggle?.()">
      <span></span>
      <span></span>
      <span></span>
    </button>

    <div class="header-title">
      <h1>{{ pageTitle }}</h1>
      <p class="header-sub">Kelola data toko dan konten website</p>
    </div>

    <div class="header-actions">
      <span class="dev-badge">Tanpa login (dev)</span>
      <div class="user-chip">
        <span class="user-avatar">A</span>
        <span class="user-name">Admin</span>
      </div>
    </div>
  </header>
</template>
