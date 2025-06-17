// src/pages/CourseMaterialDetailPage.jsx
export default function CourseMaterialDetailPage() {
  return (
    <div className="min-h-screen bg-[#d6eeff]">
      <div className="bg-gradient-to-r from-[#5b5ef2] to-[#184fc2] p-6 text-white flex flex-col md:flex-row justify-between">
        <div>
          <h1 className="text-2xl font-bold">Belajar tentang apa itu Gravitasi</h1>
          <p className="mt-2">Oleh: Jhoes</p>
        </div>
      </div>

      <div className="px-6 py-8 flex flex-col md:flex-row gap-6">
        <div className="flex-shrink-0">
          <img
            src="/gravity-thumbnail.jpg"
            alt="materi-thumbnail"
            className="rounded-xl w-full max-w-md"
          />
        </div>
        <div className="flex flex-col justify-center">
          <div className="space-y-4">
            <div className="bg-white p-4 rounded-xl shadow">
              <h2 className="font-bold text-md">Penjelasan hukum Gravitasi Artikel</h2>
            </div>
            <div className="bg-white p-4 rounded-xl shadow">
              <h2 className="font-bold text-md">Kerjakan Tugas</h2>
            </div>
          </div>
        </div>
      </div>

      <div className="px-6 pb-10">
        <h3 className="text-xl font-bold text-[#1e2a4f] mb-2">About</h3>
        <p className="text-gray-700 leading-relaxed">
          Materi ini membahas sejarah dan konsep dasar dari penemuan gaya gravitasi, salah satu fenomena alam paling mendasar yang memengaruhi kehidupan sehari-hari.
          Dalam pembelajaran ini, siswa akan mengenal tokoh-tokoh penting seperti Isaac Newton dan Albert Einstein, yang merumuskan hukum gravitasi universal,
          serta memahami bagaimana penemuan ini mengubah cara manusia melihat alam semesta. Materi ini juga akan mengajak siswa mengeksplorasi contoh-contoh nyata dari gaya gravitasi
          dalam kehidupan sehari-hari serta penerapannya dalam ilmu pengetahuan dan teknologi modern.
        </p>
      </div>
    </div>
  );
}
