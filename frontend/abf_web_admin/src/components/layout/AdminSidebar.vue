<script setup>
import { adminMenus } from '../../data/menu'
import { usePage } from '../../composables/usePage'

defineProps({
  sidebarOpen: { type: Boolean, default: false },
})

const emit = defineEmits(['close'])

const { currentPage, navigate } = usePage()

function goTo(page, soon) {
  if (soon) return
  navigate(page)
  emit('close')
}
</script>

<template>
  <aside class="admin-sidebar" :class="{ open: sidebarOpen }">
    <div class="sidebar-brand">
      <span class="brand-icon">⚙</span>
      <div>
        <strong>Admin Panel</strong>
        <small>FotoGear Store</small>
      </div>
    </div>

    <nav class="sidebar-nav">
      <div v-for="group in adminMenus" :key="group.section" class="nav-group">
        <p class="nav-section">{{ group.section }}</p>
        <button
          v-for="item in group.items"
          :key="item.id"
          class="nav-item"
          :class="{ active: currentPage === item.id, disabled: item.soon }"
          :disabled="item.soon"
          @click="goTo(item.id, item.soon)"
        >
          <span class="nav-icon">{{ item.icon }}</span>
          <span class="nav-label">{{ item.label }}</span>
          <span v-if="item.soon" class="nav-soon">Soon</span>
        </button>
      </div>
    </nav>

    <div class="sidebar-foot">
      <a href="../abf_web/" target="_blank" rel="noopener" class="view-store-link">
        ↗ Lihat Toko
      </a>
    </div>
  </aside>

  <div
    v-if="sidebarOpen"
    class="sidebar-overlay"
    @click="emit('close')"
  />
</template>
