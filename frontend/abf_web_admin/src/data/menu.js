export const adminMenus = [
  {
    section: 'Utama',
    items: [
      { id: 'dashboard', label: 'Dashboard', icon: '◫' },
    ],
  },
  {
    section: 'Toko',
    items: [
      { id: 'store', label: 'Data Toko', icon: '◎' },
      { id: 'products', label: 'Produk', icon: '▣', soon: true },
      { id: 'categories', label: 'Kategori', icon: '▤', soon: true },
    ],
  },
  {
    section: 'Pengaturan',
    items: [
      { id: 'banners', label: 'Banner & Promo', icon: '◇', soon: true },
      { id: 'orders', label: 'Pesanan', icon: '◈', soon: true },
    ],
  },
]

export const pageTitles = {
  dashboard: 'Dashboard',
  store: 'Data Toko',
  products: 'Produk',
  categories: 'Kategori',
  banners: 'Banner & Promo',
  orders: 'Pesanan',
}
