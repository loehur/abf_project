<script setup>
import { reactive, ref } from 'vue'
import { defaultStoreForm } from '../data/storeForm'

const form = reactive({ ...defaultStoreForm })
const logoPreview = ref('')
const savedMessage = ref('')

function onLogoChange(event) {
  const file = event.target.files?.[0]
  if (!file) return

  const reader = new FileReader()
  reader.onload = (e) => {
    logoPreview.value = e.target?.result
    form.logoUrl = logoPreview.value
  }
  reader.readAsDataURL(file)
}

function removeLogo() {
  logoPreview.value = ''
  form.logoUrl = ''
}

function handleSave() {
  // Placeholder — API nanti
  savedMessage.value = 'Perubahan disimpan secara lokal (belum ke database).'
  setTimeout(() => {
    savedMessage.value = ''
  }, 3000)
}
</script>

<template>
  <div class="store-page">
    <p v-if="savedMessage" class="toast">{{ savedMessage }}</p>

    <form class="form-stack" @submit.prevent="handleSave">
      <!-- Logo -->
      <section class="panel">
        <div class="panel-head">
          <h2>Logo Toko</h2>
          <p>Upload logo yang akan tampil di header website toko.</p>
        </div>

        <div class="logo-upload-area">
          <div v-if="logoPreview || form.logoUrl" class="logo-preview">
            <img :src="logoPreview || form.logoUrl" alt="Preview logo" />
            <button type="button" class="btn-ghost" @click="removeLogo">Hapus</button>
          </div>
          <label v-else class="logo-dropzone">
            <input type="file" accept="image/*" hidden @change="onLogoChange" />
            <span class="drop-icon">＋</span>
            <span>Klik untuk upload logo</span>
            <small>PNG, JPG — disarankan persegi, min. 200×200px</small>
          </label>
        </div>
      </section>

      <!-- Identitas -->
      <section class="panel">
        <div class="panel-head">
          <h2>Identitas Toko</h2>
          <p>Informasi dasar yang ditampilkan di website.</p>
        </div>

        <div class="form-grid">
          <label class="field full">
            <span>Nama Toko</span>
            <input v-model="form.name" type="text" placeholder="Contoh: FotoGear Store" />
          </label>
          <label class="field full">
            <span>Tagline</span>
            <input v-model="form.tagline" type="text" placeholder="Slogan singkat toko" />
          </label>
          <label class="field full">
            <span>Deskripsi</span>
            <textarea
              v-model="form.description"
              rows="4"
              placeholder="Ceritakan tentang toko Anda..."
            />
          </label>
        </div>
      </section>

      <!-- Kontak -->
      <section class="panel">
        <div class="panel-head">
          <h2>Kontak</h2>
          <p>Nomor dan email yang bisa dihubungi pelanggan.</p>
        </div>

        <div class="form-grid">
          <label class="field">
            <span>Telepon</span>
            <input v-model="form.phone" type="tel" placeholder="0812-xxxx-xxxx" />
          </label>
          <label class="field">
            <span>WhatsApp</span>
            <input v-model="form.whatsapp" type="text" placeholder="62812xxxx (tanpa +)" />
          </label>
          <label class="field full">
            <span>Email</span>
            <input v-model="form.email" type="email" placeholder="info@tokoanda.com" />
          </label>
        </div>
      </section>

      <!-- Alamat -->
      <section class="panel">
        <div class="panel-head">
          <h2>Alamat</h2>
        </div>

        <div class="form-grid">
          <label class="field full">
            <span>Alamat Lengkap</span>
            <textarea v-model="form.address" rows="2" placeholder="Jl. ..." />
          </label>
          <label class="field">
            <span>Kota</span>
            <input v-model="form.city" type="text" />
          </label>
          <label class="field">
            <span>Provinsi</span>
            <input v-model="form.province" type="text" />
          </label>
          <label class="field">
            <span>Kode Pos</span>
            <input v-model="form.postalCode" type="text" />
          </label>
          <label class="field">
            <span>Jam Operasional</span>
            <input v-model="form.openHours" type="text" placeholder="Sen–Sab, 09.00–18.00" />
          </label>
        </div>
      </section>

      <!-- Sosial media -->
      <section class="panel">
        <div class="panel-head">
          <h2>Media Sosial</h2>
          <p>Opsional — link profil toko.</p>
        </div>

        <div class="form-grid">
          <label class="field">
            <span>Instagram</span>
            <input v-model="form.instagram" type="url" placeholder="https://instagram.com/..." />
          </label>
          <label class="field">
            <span>TikTok</span>
            <input v-model="form.tiktok" type="url" placeholder="https://tiktok.com/@..." />
          </label>
          <label class="field full">
            <span>YouTube</span>
            <input v-model="form.youtube" type="url" placeholder="https://youtube.com/..." />
          </label>
        </div>
      </section>

      <div class="form-actions">
        <button type="submit" class="btn-primary">Simpan Perubahan</button>
        <p class="form-hint">Data belum tersimpan ke server — koneksi API menyusul.</p>
      </div>
    </form>
  </div>
</template>
