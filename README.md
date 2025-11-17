<h1>🧾 Janji</h1>
Saya **[Nama Anda]** dengan NIM **[NIM Anda]** mengerjakan Tugas Praktikum 7
dalam mata kuliah Desain Pemrograman Berbasis Objek untuk keberkahanNya maka
saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin

<h2>🌐 Deskripsi Proyek</h2>

Proyek ini adalah implementasi sederhana dari aplikasi **CRUD (Create, Read, Update, Delete)** untuk mengelola database **Dosen (Lecturers)** dan **Mata Kuliah (Courses)** serta relasi antara keduanya. Aplikasi ini dibangun menggunakan bahasa pemrograman **PHP** dengan koneksi database **MySQL/MariaDB** melalui ekstensi **PDO**.

Proyek ini menerapkan konsep **Object-Oriented Programming (OOP)** dengan memisahkan logika database ke dalam Class terpisah (Model) sesuai entitas tabel.

## 📚 Hubungan Antar Entitas (Relasi Many-to-Many)

Skema database menunjukkan relasi **Many-to-Many** antara `tp_mvc25_lecturers` dan `tp_mvc25_courses`, dihubungkan oleh tabel perantara `tp_mvc25_lecturer_courses`.
* Satu **Dosen** dapat mengajar banyak **Mata Kuliah**.
* Satu **Mata Kuliah** dapat diajar oleh banyak **Dosen**.

<h2>🖼️ Design Database</h2>


> **Keterangan Tabel:**
> 1.  `tp_mvc25_lecturers`: Menyimpan data Dosen (id, name, nidn, phone, join_date).
> 2.  `tp_mvc25_courses`: Menyimpan data Mata Kuliah (id, code, name, sks).
> 3.  `tp_mvc25_lecturer_courses`: Tabel pivot yang menyimpan relasi Dosen dan Mata Kuliah (lecturer_id, course_id).

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
      <td><code>config/db.php</code></td>
      <td>Koneksi Database</td>
      <td>Berisi Class **Database** untuk koneksi ke MySQL menggunakan PDO.</td>
    </tr>
    <tr>
      <td><code>view/header.php</code></td>
      <td>Header &amp; Navigasi</td>
      <td>Berisi navigasi utama (Dosen, Mata Kuliah).</td>
    </tr>
    <tr>
      <td><code>view/footer.php</code></td>
      <td>Footer</td>
      <td>Berisi informasi *copyright*.</td>
    </tr>
    <tr>
      <td><code>style.css</code></td>
      <td>Styling</td>
      <td>Mengatur tampilan CSS dasar.</td>
    </tr>
    <tr>
      <td><code>class/Lecturer.php</code></td>
      <td>Model Dosen</td>
      <td>Berisi fungsi CRUD Dosen (createLecturer, getAllLecturers, updateLecturer, deleteLecturer) dan fungsi relasi.</td>
    </tr>
    <tr>
      <td><code>class/Course.php</code></td>
      <td>Model Mata Kuliah</td>
      <td>Berisi fungsi CRUD Mata Kuliah (createCourse, getAllCourses, updateCourse, deleteCourse) dan fungsi relasi.</td>
    </tr>
    <tr>
      <td><code>view/lecturers.php</code></td>
      <td>View Dosen</td>
      <td>Menampilkan daftar Dosen dan form untuk menambah/mengedit Dosen.</td>
    </tr>
    <tr>
      <td><code>view/courses.php</code></td>
      <td>View Mata Kuliah</td>
      <td>Menampilkan daftar Mata Kuliah dan form untuk menambah/mengedit Mata Kuliah.</td>
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
    > **Catatan Relasi:** Penghapusan Dosen atau Mata Kuliah akan mempengaruhi data di tabel perantara `tp_mvc25_lecturer_courses` sesuai dengan pengaturan *Foreign Key* (disarankan menggunakan **ON DELETE CASCADE** agar data relasi juga terhapus).
</p>

<h2>⚙️ Cara Menjalankan</h2>
    <ol>
      <li>Setup Database: Impor file SQL database Anda (misalnya `db_kampus.sql`) ke server MySQL/MariaDB lokal Anda. Pastikan nama database sesuai dengan konfigurasi di `config/db.php`.</li>
      <li>Konfigurasi PHP: Sesuaikan kredensial database di `config/db.php` (hostname, username, password, dbname).</li>
      <li>Akses Aplikasi: Tempatkan semua file proyek di folder root server web lokal Anda (misalnya `htdocs/tugas_mvc_7`).</li>
      <li>Akses melalui browser dengan URL: `http://localhost/tugas_mvc_7/index.php` atau sesuai konfigurasi server Anda.</li>
    </ol>
    
<h2>🎮 Tampilan GUI Program</h2>


<h2>🧭 Run Program</h2>

[Link to a video demonstration of the program's CRUD features]
