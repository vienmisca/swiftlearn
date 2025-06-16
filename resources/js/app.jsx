import React from 'react';
import ReactDOM from 'react-dom/client';
import AdminDropdown from './components/AdminDropdown.jsx'; // make sure path is correct

const el = document.getElementById('admin-dropdown');

if (el) {
  const root = ReactDOM.createRoot(el);
  root.render(<AdminDropdown />);
}
