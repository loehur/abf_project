import { reactive } from 'vue'
import { storeInfo } from '../data/store'

const defaultProfile = {
  name: storeInfo.name,
  tagline: storeInfo.tagline,
  description: 'Toko perlengkapan fotografi terpercaya. Kamera, drone, lensa, lighting, dan aksesoris original dengan garansi resmi.',
  logoUrl: '',
  phone: storeInfo.phone,
  email: storeInfo.email,
  whatsapp: storeInfo.whatsapp,
  address: storeInfo.address,
  city: '',
  province: '',
  postalCode: '',
  instagram: '',
  tiktok: '',
  youtube: '',
  openHours: 'Sen-Sab, 09.00-18.00 WIB',
}

const profile = reactive({ ...defaultProfile })

const state = reactive({
  loading: false,
  loaded: false,
  error: '',
})

function applyProfile(data = {}) {
  Object.assign(profile, defaultProfile, data)
}

async function loadStoreProfile() {
  if (state.loading) return

  state.loading = true
  state.error = ''

  try {
    const response = await fetch('/api/Store/Profile/show', {
      headers: {
        Accept: 'application/json',
      },
    })

    const payload = await response.json().catch(() => null)

    if (!response.ok || !payload?.status) {
      throw new Error(payload?.message || 'Gagal memuat data toko.')
    }

    if (payload.data) {
      applyProfile(payload.data)
    }

    state.loaded = true
  } catch (error) {
    state.error = error.message || 'Gagal memuat data toko.'
  } finally {
    state.loading = false
  }
}

export function useStoreProfile() {
  return {
    storeProfile: profile,
    state,
    loadStoreProfile,
  }
}
