// src/pages/CourseContentPage.jsx
import { Star } from "lucide-react";

const materials = [
  "Belajar tentang apa itu Gravitasi",
  "Hukum Gravitasi Newton",
  "Gravitasi dalam Skala Sehari hari",
  "Gravitasi di Luar angkasa",
  "Teori Relativitas Dan Gravitasi",
  "Teori Relativitas Dan Gravitasi",
];

export default function CourseContentPage() {
  return (
    <div className="min-h-screen bg-[#d6eeff] font-poppins">
      {/* Header */}
      <div className="relative bg-gradient-to-r from-[#5b5ef2] to-[#184fc2] p-8 text-white rounded-b-3xl shadow">
        <div className="flex flex-col md:flex-row justify-between items-center gap-6">
          {/* Kiri: Gambar + Judul */}
          <div className="flex items-center gap-4">
            <img
              src="/earth-thumbnail.jpg"
              alt="thumbnail"
              className="w-40 h-28 rounded-xl object-cover border-2 border-white"
            />
            <div>
              <h2 className="text-xl md:text-2xl font-bold leading-snug">
                Teori Relativitas Umum Einstein: <br />
                Gravitasi dan Benda Langit
              </h2>
              <p className="text-sm mt-2 font-medium">Oleh: Jhoes</p>
            </div>
          </div>

          {/* Kanan: Rating */}
          <div className="bg-white text-yellow-500 px-4 py-2 rounded-full shadow flex items-center space-x-2">
            <span className="text-[#184fc2] font-semibold">Beri Rating:</span>
            <div className="flex items-center gap-1">
              {Array(5)
                .fill(0)
                .map((_, i) => (
                  <Star key={i} size={18} fill="#facc15" stroke="#facc15" />
                ))}
              <span className="text-black font-semibold ml-1">5.0</span>
            </div>
          </div>
        </div>

        {/* Background hiasan (optional, seperti bentuk bintang/gelombang) */}
        <div className="absolute inset-0 z-[-1]">
          {/* bisa tambahkan SVG atau background pattern */}
        </div>
      </div>

      {/* Daftar Materi */}
      <div className="px-6 py-10">
        <h3 className="text-lg font-bold text-[#0B0B7C] mb-6">Daftar Materi</h3>
        <div className="space-y-4">
          {materials.map((title, index) => (
            <div
              key={index}
              className="bg-white px-6 py-4 rounded-xl shadow hover:shadow-md transition border border-blue-100 flex items-center gap-3"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                className="h-5 w-5 text-blue-600"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  strokeLinecap="round"
                  strokeLinejoin="round"
                  strokeWidth="2"
                  d="M12 20h9M12 4h9M4 4h.01M4 20h.01M4 12h16M4 8h16M4 16h16"
                />
              </svg>
              <span className="font-medium text-[#1e2a4f]">{title}</span>
            </div>
          ))}
        </div>
      </div>
    </div>
  );
}
