<script setup>
import { ref } from 'vue'
import { sidebarCategories } from '../../data/store'

const props = defineProps({
  activeCategory: { type: String, default: null },
  activeChild: { type: String, default: null },
})

const emit = defineEmits(['select'])

const openCategories = ref(
  sidebarCategories
    .filter(c => c.children.length > 0)
    .slice(0, 1)
    .map(c => c.id)
)

function toggleCategory(id) {
  const cat = sidebarCategories.find(c => c.id === id)
  if (!cat || cat.children.length === 0) {
    emit('select', { categoryId: id, child: null })
    return
  }
  const idx = openCategories.value.indexOf(id)
  if (idx >= 0) {
    openCategories.value.splice(idx, 1)
  } else {
    openCategories.value.push(id)
  }
  emit('select', { categoryId: id, child: null })
}

function selectChild(categoryId, child) {
  emit('select', { categoryId, child })
}

function isOpen(id) {
  return openCategories.value.includes(id)
}
</script>

<template>
  <aside class="shop-sidebar">
    <div class="sidebar-heading">
      <span class="sidebar-icon">▤</span>
      BROWSE
    </div>

    <ul class="sidebar-menu">
      <li
        v-for="cat in sidebarCategories"
        :key="cat.id"
        class="sidebar-item"
        :class="{ active: activeCategory === cat.id }"
      >
        <button
          class="sidebar-cat-btn"
          :class="{ open: isOpen(cat.id) }"
          @click="toggleCategory(cat.id)"
        >
          <span>{{ cat.name }}</span>
          <span v-if="cat.children.length" class="chevron">
            {{ isOpen(cat.id) ? '∧' : '∨' }}
          </span>
        </button>

        <ul v-if="cat.children.length && isOpen(cat.id)" class="sidebar-children">
          <li
            v-for="child in cat.children"
            :key="child"
            :class="{ active: activeChild === child && activeCategory === cat.id }"
            @click="selectChild(cat.id, child)"
          >
            {{ child }}
          </li>
        </ul>
      </li>
    </ul>
  </aside>
</template>
