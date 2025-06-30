import React from 'react';
import ReactDOM from 'react-dom/client';
import AdminDropdown from './components/AdminDropdown.jsx';
import KursusDetail from './components/KursusDetail.jsx';
import KursusPage from './components/pages/KursusPage.jsx';

// 👉 Render AdminDropdown jika ditemukan
const adminDropdownEl = document.getElementById('admin-dropdown');
if (adminDropdownEl) {
  const root = ReactDOM.createRoot(adminDropdownEl);
  root.render(<AdminDropdown />);
}

// 👉 Render KursusDetail jika ditemukan
const kursusDetailEl = document.getElementById('kursus-detail');
if (kursusDetailEl) {
  const data = JSON.parse(kursusDetailEl.dataset.kursus);
  const root = ReactDOM.createRoot(kursusDetailEl);
  root.render(<KursusDetail data={data} />);
}

// 👉 Render KursusPage jika ditemukan
const kursusPage = document.getElementById('kursus-page');
if (kursusPage) {
  const groupedCourses = JSON.parse(kursusPage.dataset.groupedCourses);
  const root = ReactDOM.createRoot(kursusPage);
  root.render(<KursusPage groupedCourses={groupedCourses} />);
}
