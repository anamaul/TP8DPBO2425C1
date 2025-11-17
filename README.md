<h1>🧾 Janji</h1>
Saya Muhammad Maulana Adrian dengan NIM 2408647 mengerjakan Tugas Praktikum 8
dalam mata kuliah Desain Pemrograman Berbasis Objek untuk keberkahanNya maka
saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin

<h2>🌐 Deskripsi Proyek</h2>

Proyek ini adalah implementasi sederhana dari aplikasi **CRUD (Create, Read, Update, Delete)** untuk mengelola database **Dosen (Lecturers)** dan **Mata Kuliah (Courses)** serta relasi antara keduanya. Aplikasi ini dibangun menggunakan bahasa pemrograman **PHP** dengan koneksi database **MySQL/MariaDB** melalui ekstensi **PDO**.

Proyek ini menerapkan konsep **Object-Oriented Programming (OOP)** dengan memisahkan logika database ke dalam Class terpisah (Model) sesuai entitas tabel.

## 📚 Hubungan Antar Entitas (Relasi Many-to-Many)

Skema database menunjukkan relasi **Many-to-Many** antara `lecturers` dan `courses`, dihubungkan oleh tabel perantara `lecturer_courses`.
* Satu **Dosen** dapat mengajar banyak **Mata Kuliah**.
* Satu **Mata Kuliah** dapat diajar oleh banyak **Dosen**.

<h2>🖼️ Design Database</h2>

<img width="793" height="240" alt="image" src="https://github.com/user-attachments/assets/e1500825-ba00-4c9e-9727-46c68d009403" />


> **Keterangan Tabel:**
> 1.  `lecturers`: Menyimpan data Dosen (id, name, nidn, phone, join_date).
> 2.  `courses`: Menyimpan data Mata Kuliah (id, code, name, sks).
> 3.  `lecturer_courses`: Tabel pivot yang menyimpan relasi Dosen dan Mata Kuliah (lecturer_id, course_id).

<h2>🛠️ Persyaratan Sistem</h2>

* Web Server: **Apache** atau **Nginx**
* Database: **MySQL / MariaDB**
* Bahasa Pemrograman: **PHP** (Versi 7.4 ke atas disarankan)

<h2>📝 Desain Program & Struktur File</h2>

Aplikasi ini menggunakan struktur **MVC (Model-View-Controller)** yang ringan:

<h3>Struktur File Proyek Dosen & Mata Kuliah CRUD</h3>

<table>
  <thead>
    <tr>
      <th>Folder/File</th>
      <th>Peran Utama</th>
      <th>Keterangan</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><code>index.php</code></td>
      <td>Entry Point &amp; Router</td>
      <td>Titik masuk utama aplikasi, mengatur *routing* halaman berdasarkan parameter <code>?page=...</code> dan menginstansi Class utama.</td>
    </tr>
    <tr>
      <td><code>config/database.php</code></td>
      <td>Koneksi Database</td>
      <td>Berisi Class **Database** untuk koneksi ke MySQL menggunakan PDO.</td>
    </tr>
    <tr>
      <td><code>models/Lecturer.php</code></td>
      <td>Model Dosen</td>
      <td>Berisi fungsi **CRUD** (Create, Read, Update, Delete) data Dosen dan *query* database terkait Dosen.</td>
    </tr>
    <tr>
      <td><code>models/Course.php</code></td>
      <td>Model Mata Kuliah</td>
      <td>Berisi fungsi **CRUD** (Create, Read, Update, Delete) data Mata Kuliah dan *query* database terkait Mata Kuliah.</td>
    </tr>
    <tr>
      <td><code>models/LecturerCourses.php</code></td>
      <td>Model Relasi Many-to-Many</td>
      <td>Berisi fungsi untuk mengelola **relasi** (*assignment*)/penugasan Dosen ke Mata Kuliah (`create`, `getAll`, `delete`). Bertanggung jawab atas tabel *pivot* (`lecturer_courses`).</td>
    </tr>
    <tr>
      <td><code>controllers/LecturerController.php</code></td>
      <td>Controller Dosen</td>
      <td>Menerima input Dosen, memanggil `Lecturer.php` (Model), dan memuat *View* Dosen.</td>
    </tr>
    <tr>
      <td><code>controllers/CourseController.php</code></td>
      <td>Controller Mata Kuliah</td>
      <td>Menerima input Mata Kuliah, memanggil `Course.php` (Model), dan memuat *View* Mata Kuliah.</td>
    </tr>
    <tr>
      <td><code>controllers/Lecturer_CoursesController.php</code></td>
      <td>Controller Relasi</td>
      <td>Menerima input penugasan, memproses data *summary*, memanggil `LecturerCourses.php` (Model), dan memuat *View* Relasi.</td>
    </tr>
    <tr>
      <td><code>views/lecturers/</code></td>
      <td>View Dosen</td>
      <td>Berisi *template* UI (HTML/PHP) untuk daftar Dosen dan *form* CRUD Dosen.</td>
    </tr>
    <tr>
      <td><code>views/courses/</code></td>
      <td>View Mata Kuliah</td>
      <td>Berisi *template* UI (HTML/PHP) untuk daftar Mata Kuliah dan *form* CRUD Mata Kuliah.</td>
    </tr>
    <tr>
      <td><code>views/lecturer_courses/</code></td>
      <td>View Assignment</td>
      <td>Berisi *template* UI (HTML/PHP) untuk menampilkan daftar penugasan relasi </td>
    </tr>
  </tbody>
</table>

<h2>🚀 Fitur CRUD Utama</h2>

<p>Aplikasi ini menyediakan antarmuka untuk mengelola dua entitas utama:</p>

<ol>
  <li>
    <strong>Dosen (Lecturers):</strong>
    <ul>
      <li>**Menampilkan:** Melihat daftar semua Dosen beserta detailnya.</li>
      <li>**Menambah:** Memasukkan data Dosen baru (Nama, NIDN, No. HP, Tanggal Gabung).</li>
      <li>**Mengedit:** Mengubah data Dosen berdasarkan ID.</li>
      <li>**Menghapus:** Menghapus data Dosen.</li>
    </ul>
  </li>
  <li>
    <strong>Mata Kuliah (Courses):</strong>
    <ul>
      <li>**Menampilkan:** Melihat daftar semua Mata Kuliah (Kode, Nama, SKS).</li>
      <li>**Menambah:** Memasukkan data Mata Kuliah baru.</li>
      <li>**Mengedit:** Mengubah data Mata Kuliah berdasarkan ID.</li>
      <li>**Menghapus:** Menghapus data Mata Kuliah.</li>
    </ul>
  </li>
</ol>
<p>
    > **Catatan Relasi:** Penghapusan Dosen atau Mata Kuliah akan mempengaruhi data di tabel perantara `lecturer_courses` sesuai dengan pengaturan *Foreign Key*.
</p>

<h2>⚙️ Cara Menjalankan</h2>
    <ol>
      <li>Setup Database: Impor file SQL database Anda (misalnya `db_kampus.sql`) ke server MySQL/MariaDB lokal Anda. Pastikan nama database sesuai dengan konfigurasi di `config/db.php`.</li>
      <li>Konfigurasi PHP: Sesuaikan kredensial database di `config/db.php` (hostname, username, password, dbname).</li>
      <li>Akses Aplikasi: Tempatkan semua file proyek di folder root server web lokal Anda (misalnya `htdocs/tugas_mvc_7`).</li>
      <li>Akses melalui browser dengan URL: `http://localhost/tugas_mvc_7/index.php` atau sesuai konfigurasi server Anda.</li>
    </ol>
    
<h2>🎮 Tampilan Landing Page Program</h2>

<img width="1919" height="1047" alt="image" src="https://github.com/user-attachments/assets/de984661-28df-4241-ac12-8cb470cd9824" />

<h2>🧭 Run Program</h2>

