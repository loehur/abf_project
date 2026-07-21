<template>
  <div class="dashboard-page">
    <div class="stat-grid">
      <article class="stat-card">
        <span class="stat-label">Status Toko</span>
        <strong class="stat-value">Draft</strong>
        <p>Data toko belum disimpan ke server</p>
      </article>
      <article class="stat-card">
        <span class="stat-label">Produk</span>
        <strong class="stat-value">—</strong>
        <p>Menunggu koneksi database</p>
      </article>
      <article class="stat-card">
        <span class="stat-label">Kategori</span>
        <strong class="stat-value">—</strong>
        <p>Menunggu koneksi database</p>
      </article>
      <article class="stat-card">
        <span class="stat-label">Pesanan</span>
        <strong class="stat-value">—</strong>
        <p>Fitur belum tersedia</p>
      </article>
    </div>

    <section class="panel">
      <div class="panel-head">
        <h2>Mulai dari sini</h2>
        <p>Lengkapi informasi toko sebelum mengisi produk dan kategori.</p>
      </div>
      <ul class="checklist">
        <li>
          <span class="check done">✓</span>
          <div>
            <strong>Layout admin siap</strong>
            <p>Panel admin dapat diakses tanpa login (sementara).</p>
          </div>
        </li>
        <li>
          <span class="check pending">○</span>
          <div>
            <strong>Isi Data Toko</strong>
            <p>Nama, kontak, alamat, jam operasional, dan logo toko.</p>
          </div>
        </li>
        <li>
          <span class="check pending">○</span>
          <div>
            <strong>Koneksi API & Database</strong>
            <p>Penyimpanan data akan dihubungkan pada tahap berikutnya.</p>
          </div>
        </li>
      </ul>
    </section>
  </div>
</template>
