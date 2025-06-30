import React, { useState } from 'react';

const KursusPerKategori = ({ kategori, kursus }) => {
  const [currentPage, setCurrentPage] = useState(1);
  const perPage = 4;
  const totalPages = Math.ceil(kursus.length / perPage);

  const paginated = kursus.slice((currentPage - 1) * perPage, currentPage * perPage);

  return (
    <div className="mb-12">
      <div className="flex justify-between items-center mb-4">
        <h3 className="text-xl font-bold text-gray-800">{kategori}</h3>
        <div className="flex gap-2">
          <button
            onClick={() => setCurrentPage((p) => Math.max(1, p - 1))}
            className="bg-blue-600 text-white w-8 h-8 rounded-full flex items-center justify-center hover:bg-blue-700 transition"
          >&lt;</button>
          <button
            onClick={() => setCurrentPage((p) => Math.min(totalPages, p + 1))}
            className="bg-blue-600 text-white w-8 h-8 rounded-full flex items-center justify-center hover:bg-blue-700 transition"
          >&gt;</button>
        </div>
      </div>

      <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        {paginated.map((course) => (
          <a
            key={course.id}
            href={`/kursus/${course.id}`}
            className="block bg-white rounded-2xl shadow-md hover:shadow-xl hover:scale-[1.02] hover:-translate-y-1 transition duration-300 overflow-hidden"
          >
            <img src={`/storage/${course.sampul_kursus}`} className="w-full h-40 object-cover" alt={course.nama_kursus} />
            <div className="p-4">
              <h4 className="font-semibold text-navy text-base mb-2 leading-snug">{course.nama_kursus}</h4>
              <p className="text-sm text-gray-600">
                <span className="font-semibold text-gray-400">Kursus :</span>
                <span className="font-bold text-gray-800">{course.kategori}</span>
              </p>
            </div>
          </a>
        ))}
      </div>
    </div>
  );
};

export default KursusPerKategori;
