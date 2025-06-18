// src/pages/CourseContentPage.jsx
import { Star } from "lucide-react";

const materials = [
  "Belajar tentang apa itu Gravitasi",
  "Hukum Gravitasi Newton",
  "Gravitasi dalam Skala Sehari hari",
  "Gravitasi di Luar angkasa",
  "Teori Relativitas Dan Gravitasi",
];

export default function CourseContentPage() {
  return (
    <div className="min-h-screen bg-[#d6eeff]">
      <div className="bg-gradient-to-r from-[#5b5ef2] to-[#184fc2] p-6 text-white flex flex-col md:flex-row items-center justify-between gap-4">
        <div className="flex items-center gap-4">
          <img
            src="/earth-thumbnail.jpg"
            alt="thumbnail"
            className="rounded-xl w-44 h-28 object-cover"
          />
          <div>
            <h2 className="text-xl font-semibold">Teori Relativitas Umum Einstein: Gravitasi dan Benda Langit</h2>
            <p className="text-sm mt-1">Oleh: Jhoes</p>
          </div>
        </div>
        <div className="flex items-center gap-2 bg-white text-yellow-500 font-bold px-4 py-1 rounded-full shadow">
          Beri Rating:{" "}
          <div className="flex items-center gap-1 ml-2">
            {Array(5).fill(0).map((_, i) => <Star key={i} size={18} fill="#facc15" stroke="#facc15" />)}
            <span className="text-black ml-2">5.0</span>
          </div>
        </div>
      </div>

      <div className="px-6 py-8">
        <h3 className="text-lg font-bold text-[#1e2a4f] mb-6">Daftar Materi</h3>
        <div className="space-y-4">
          {materials.map((title, index) => (
            <div key={index} className="bg-white px-6 py-4 rounded-xl shadow flex items-center gap-3">
              <span className="text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" className="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M12 20h9M12 4h9M4 4h.01M4 20h.01M4 12h16M4 8h16M4 16h16" />
                </svg>
              </span>
              <span className="font-medium">{title}</span>
            </div>
          ))}
        </div>
      </div>
    </div>
  );
}
