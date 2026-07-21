import { ref } from 'vue'

const currentPage = ref('dashboard')

export function usePage() {
  function navigate(page) {
    currentPage.value = page
    window.scrollTo({ top: 0, behavior: 'smooth' })
  }

  return { currentPage, navigate }
}
