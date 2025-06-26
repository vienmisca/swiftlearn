import { useEffect, useState } from 'react';

const KursusDetail = ({ kursusId }) => {
  const [kursus, setKursus] = useState(null);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    fetch(`/api/kursus/${kursusId}`)
      .then((res) => res.json())
      .then((data) => {
        setKursus(data);
        setLoading(false);
      });
  }, [kursusId]);

  if (loading) return <p>Loading...</p>;
  if (!kursus) return <p>Kursus tidak ditemukan.</p>;

  return (
    <div className="min-h-screen bg-blue-100 font-poppins">
      {/* Header Section */}
      <div className="relative bg-gradient-to-r from-blue-700 to-blue-500 text-white p-8 rounded-b-3xl">
        <div className="flex items-center gap-6">
          <img
            src={`/storage/${kursus.sampul_kursus}`}
            alt="Sampul"
            className="w-48 h-32 rounded-2xl object-cover shadow-lg border border-white"
          />
          <div className="flex flex-col gap-2">
            <h1 className="text-3xl font-bold leading-snug">{kursus.nama_kursus}</h1>
            <p className="text-sm text-white/80">Oleh: {kursus.mentor?.name ?? 'Tanpa Nama'}</p>
          </div>
        </div>
        {/* Rating */}
        <div className="absolute top-8 right-10 flex items-center gap-2 bg-white text-blue-900 rounded-full px-4 py-1 shadow-lg">
          <span className="text-sm font-semibold">Beri Rating:</span>
          <div className="flex text-yellow-400 text-lg">★ ★ ★ ★ ★</div>
          <span className="ml-2 font-bold">5.0</span>
        </div>
      </div>

      {/* Daftar Materi */}
      <div className="p-8">
        <h2 className="text-xl font-bold text-blue-900 mb-4">Daftar Materi</h2>
        <div className="space-y-4">
          {kursus.materis.map((materi) => (
            <div
              key={materi.id}
              className="bg-white flex items-center gap-4 px-6 py-4 rounded-2xl shadow cursor-pointer hover:bg-gray-50 transition"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                className="w-5 h-5 text-blue-800"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                strokeWidth="2"
                strokeLinecap="round"
                strokeLinejoin="round"
              >
                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20" />
                <path d="M4 4.5A2.5 2.5 0 0 1 6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5z" />
              </svg>
              <span className="text-blue-900 font-medium">{materi.judul}</span>
            </div>
          ))}
        </div>
      </div>
    </div>
  );
};

export default KursusDetail;