import React, { useState } from 'react';

export default function AdminDropdown() {
  const [open, setOpen] = useState(false);

  const toggleDropdown = () => setOpen(!open);

  const handleLogout = async () => {
    try {
      await fetch('/logout', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
      });

      // Redirect to login page after logout
      window.location.href = '/admin-mentor/login';
    } catch (error) {
      console.error('Logout failed:', error);
    }
  };

  return (
    <div className="relative inline-block text-left">
      <button
        onClick={toggleDropdown}
        className="flex items-center space-x-4 bg-gradient-to-r from-blue-600 to-blue-500 px-6 py-3 rounded-full text-white shadow-md"
      >
        <span className="text-sm font-semibold">ADMIN ▾</span>
        <div className="w-10 h-10 rounded-full bg-white p-1">
          <img
            src="/images/avatar.png"
            alt="Avatar"
            className="w-full h-full rounded-full object-cover"
          />
        </div>
      </button>

      {open && (
        <div className="absolute right-0 mt-2 w-40 bg-white rounded-xl shadow-lg z-50">
          <button
            onClick={handleLogout}
            className="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
          >
            Logout
          </button>
        </div>
      )}
    </div>
  );
}
