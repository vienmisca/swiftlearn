import React, { useState } from 'react';
import KursusPerKategori from '../KursusPerKategori';
import '../../../css/app.css';

const kategoriStyle = {
  IPA: { bg: 'bg-gradient-to-r from-green-400 to-green-600 text-white', emoji: '⛳️' },
  Matematika: { bg: 'bg-gradient-to-r from-blue-400 to-blue-600 text-white', emoji: '📐' },
  Bahasa: { bg: 'bg-gradient-to-r from-cyan-400 to-teal-500 text-white', emoji: '📖' },
  Kimia: { bg: 'bg-gradient-to-r from-rose-500 to-pink-600 text-white', emoji: '🧪' },
  Fisika: { bg: 'bg-gradient-to-r from-orange-500 to-amber-600 text-white', emoji: '🔭' },
  Informatika: { bg: 'bg-gradient-to-r from-purple-500 to-indigo-600 text-white', emoji: '💻' },
};

export default function KursusPage({ groupedCourses }) {
  const categories = Object.keys(groupedCourses);
  const [searchTerm, setSearchTerm] = useState('');
  const [activeCat, setActiveCat] = useState('');

  const handleSearch = (e) => setSearchTerm(e.target.value.toLowerCase());
  const toggleCategory = (cat) => setActiveCat(prev => (prev === cat ? '' : cat));

  return (
    <div className="mt-16 px-6">
      {/* Header: Judul & Search */}
      <div className="flex justify-between items-center mb-8 flex-wrap gap-4">
        {/* Judul + Garis */}
        <div className="flex items-center gap-6">
          <h2 className="text-3xl font-extrabold text-navy">Kategori</h2>
          <div className="w-64 h-2 bg-navy rounded-full"></div>
        </div>

        {/* Search Bar */}
        <input
          type="text"
          placeholder="Search"
          value={searchTerm}
          onChange={handleSearch}
          className="rounded-full px-6 py-2 border shadow focus:outline-none focus:ring focus:border-blue-400"
        />
      </div>

      {/* Kategori Buttons */}
      <div className="flex flex-wrap gap-4 mb-12">
        {categories.map(cat => {
          const style = kategoriStyle[cat] || kategoriStyle['IPA'];

          return (
            <button
              key={cat}
              onClick={() => toggleCategory(cat)}
              className={`relative w-40 h-24 rounded-2xl shadow-md px-4 py-3 text-left transition-all duration-300 transform hover:scale-105 hover:shadow-xl ${style.bg}`}
            >
              {/* Emoji Polygon */}
              <div className="absolute top-0 right-0 translate-x-2 -translate-y-2 w-12 h-12">
                <svg viewBox="0 0 100 100" className="w-full h-full drop-shadow-md">
                  <defs>
                    <clipPath id="pentagon-clip">
                      <path d="M0,0 L100,0 L100,60 L50,100 L0,60 Z" />
                    </clipPath>
                  </defs>

                  <rect
                    width="100"
                    height="100"
                    fill="white"
                    clipPath="url(#pentagon-clip)"
                    rx="8"
                    ry="8"
                  />
                  <text
                    x="50"
                    y="55"
                    textAnchor="middle"
                    dominantBaseline="middle"
                    fontSize="36"
                  >
                    {style.emoji}
                  </text>
                </svg>
              </div>

              <div className="flex flex-col justify-between h-full">
                <span className="text-sm font-semibold">{cat}</span>
                <span className="text-xs font-bold">{groupedCourses[cat].length} Kursus</span>
              </div>
            </button>
          );
        })}
      </div>

      {/* Kursus List (pastikan KursusPerKategori punya hover shadow) */}
      <div className="space-y-16 ">
        {categories
          .filter(cat => !activeCat || cat === activeCat)
          .map(cat => {
            const list = groupedCourses[cat].filter(k =>
              k.nama_kursus.toLowerCase().includes(searchTerm)
            );
            return list.length ? (
              <KursusPerKategori key={cat} kategori={cat} kursus={list} />
            ) : null;
          })}
      </div>
    </div>
  );
}
