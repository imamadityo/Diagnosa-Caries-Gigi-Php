<div class="container">
    <div class="row">
        <h1>Caries on Teeth
            <hr>
            <hr>
        </h1>
        <div class="container">
            <label>
                Karies adalah salah satu penyakit gigi dan mulut yang banyak ditemukan di masyarakat, dimana yang terkena penyakit tersebut
                tidak hanya orang dewasa tetapi dapat pula terjadi pada anak. Karies gigi merupakan suatu penyakit pada jaringan keras gigi, yaitu email,
                dentin, dan sementum yang disebabkan aktifitas jasad renik yang ada dalam suatu karbohidrat yang diragikan. Permulaan terjadinya karies
                ditandai dengan larutnya permukaan email karena asam hasil metabolisme karbohidrat yang terolah oleh kuman. Namun karena adanya saliva,
                plak, dan karang gigi, asam yang terjadi akan dinetralkan kembali (Achmad,2015). Menurut WHO, karies adalah suatu proses patologis yang
                dimulai pada bagian luar gigi, terbatas pada suatu tempat, terjadi setelah erupsi gigi dan menyebabkan penghancuran dari gigi sehingga
                terbentuk lubang.
            </label>
        </div>
        <div class="container" style="margin-left: 50px;"><br>
            <div class="row">
                <h4>Seberapa umum kondisi ini ?
                    <hr>
                    <hr>
                </h4>
            </div>
            <div class="container">
                <label>
                    Karies gigi merupakan penyakit yang paling banyak dijumpai di rongga mulut bersama-sama dengan penyakit periodontal,
                    sehingga merupakan masalah utama kesehatan gigi dan mulut. Penyakit ini terjadi karena demineralisasi jaringan permukaan gigi oleh
                    asam organis yang berasal dari makanan yang mengandung gula. Karies gigi bersifat kronis dan dalam perkembangannya membutuhkan waktu
                    yang lama, sehingga sebagian besar penderita mempunyai potensi mengalami gangguan seumur hidup (Solikin,2018).

                    Sebagaimana diketahui bahwa salah satu komponen dalam pembentukan karies adalah plak.
                    Insiden karies dapat dikurangi dengan melakukan penyingkiran plak secara mekanis dari permukaan gigi,
                    Peningkatan oral hygiene dapat dilakukan dengan menggunakan alat pembersih gigi yang dikombinasi dengan pemeriksaan gigi
                    secara teratur. Pemeriksaan gigi rutin ini dapat membantu mendeteksi dan memonitor masalah gigi yang berpotensi menjadi karies.
                    Sejak erupsi/tumbuh di dalam mulut, gigi sudah mempunyai risiko untuk terjadinya karies. Berat ringannya karies yang dapat terjadinya
                    pada seseorang tergantung faktor-faktor yang ada pada manusia dan lingkungannya.
                </label>
            </div>
        </div>

        <div class="container" style="margin-left: 50px;"><br>
            <div class="row">
                <h4>Tanda dan gejala Caries
                    <hr>
                    <hr>
                </h4>
            </div>
            <div class="container">
                <label class="text-dark">
                    Gejala Caries pada gigi akan berbeda pada setiap orang, tergantung pada tingkat keparahan orang yang mengalaminya. Gejala caries pun bervariasi, mulai dari yang ringan hingga berat.
                    <br>
                    Umumnya, penyakit Caries Superficialis, Caries Madian, Caries Profunda, Caries Pulpilis, Caries Mati dan Gingivitis ditandai dengan gejala berupa:
                    <div class="container">
                        <?php
                        $query = mysqli_query($kon, "SELECT * FROM gejala ORDER BY idg ASC ")
                            or die('Ada kesalahan pada query tampil Data barang: ' . mysqli_error($kon));
                        while ($data = mysqli_fetch_assoc($query)) {
                        ?>
                            <li><?php echo $data['nama_g'] ?></li>
                        <?php } ?>
                    </div>
                </label>
            </div>
        </div>

        <div class="container" style="margin-left: 50px;"><br>
            <div class="row">
                <h4>Penyebab dan faktor risiko
                    <hr>
                    <hr>
                </h4>
            </div>
            <div class="container">
                <label>
                    Selain malas menggosok gigi, ada berbagai faktor lain yang dapat membuat perkembangan bakteri dalam gigi semakin meningkat dan menyebabkan penyakit. Berikut di antaranya.
                    <h6>1. Sering mengonsumsi makanan dan minuman manis</h6>
                    <h6>2. Faktor usia</h6>
                    <h6>3. Lokasi gigi</h6>
                    <h6>4. Kekurangan fluoride</h6>
                    <h6>5. Mulut kering</h6>
                    <h6>7. Gangguan makan</h6>
                </label>
            </div>
        </div>
        <br><br>
    </div>
</div>