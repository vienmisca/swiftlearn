import React from 'react';
import ReactDOM from 'react-dom/client';
import AdminDropdown from './components/AdminDropdown.jsx';
import KursusDetail from './components/KursusDetail.jsx';

// 👉 Render AdminDropdown jika ditemukan
const adminDropdownEl = document.getElementById('admin-dropdown');
if (adminDropdownEl) {
  const root = ReactDOM.createRoot(adminDropdownEl);
  root.render(<AdminDropdown />);
}

// 👉 Render KursusDetail jika ditemukan
const kursusDetailEl = document.getElementById('kursus-detail');
if (kursusDetailEl) {
  const root = ReactDOM.createRoot(kursusDetailEl);

  // Ambil data dari atribut data-kursus
  const data = JSON.parse(kursusDetailEl.dataset.kursus);

  root.render(<KursusDetail data={data} />);
}
