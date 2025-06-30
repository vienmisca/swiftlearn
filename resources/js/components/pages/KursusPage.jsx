import React, { useState } from 'react';
import KursusPerKategori from '../KursusPerKategori';

export default function KursusPage({ groupedCourses }) {
  const categories = Object.keys(groupedCourses);
  const [searchTerm, setSearchTerm] = useState('');
  const [activeCat, setActiveCat] = useState(''); // Track selected category

  const handleSearch = (e) => setSearchTerm(e.target.value.toLowerCase());
  const toggleCategory = (cat) => setActiveCat(prev => (prev === cat ? '' : cat));

  return (
    <div>
      {/* Search Input */}
      <div className="flex justify-between mb-6 items-center">
        <div className="flex flex-wrap gap-2">
          {categories.map(cat => (
            <button
              key={cat}
              onClick={() => toggleCategory(cat)}
              className={`px-4 py-2 rounded-full transition ${
                activeCat === cat ? 'bg-blue-700 text-white' : 'bg-gray-300'
              }`}
            >
              {cat}
            </button>
          ))}
        </div>

        <input
          type="text"
          placeholder="Search..."
          value={searchTerm}
          onChange={handleSearch}
          className="rounded-full px-6 py-2 border shadow focus:outline-none focus:ring focus:border-blue-400"
        />
      </div>

      {/* Render filtered category */}
      <div className="space-y-16">
        {categories
          .filter(cat => !activeCat || cat === activeCat)
          .map(cat => {
            const list = groupedCourses[cat].filter(k =>
              k.nama_kursus.toLowerCase().includes(searchTerm)
            );
            return list.length ? (
              <KursusPerKategori
                key={cat}
                kategori={cat}
                kursus={list}
              />
            ) : null;
          })
        }
      </div>
    </div>
  );
}
