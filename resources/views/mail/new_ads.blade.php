<body>
    <div style="text-align: center;">
        <h1>cash<span style="color: red;">bekas</span></h1>
   </div>
   <div style="margin-top:20px;" >
        <p>Hello, Admin</p>
        <p>Ada iklan baru masuk nih, dicek dulu yuk!</p>
        <h3>Details Iklan:</h3>
        <div>Judul Iklan : {{$data['title']}} </div>
        <div>Harga : {{$data['price']}} </div>
        <div>Kategori Iklan : {{$data['category']}} </div>
        <div>Lokasi Iklan : {{$data['location']}} </div>
        <div>Deskripsi Iklan : {{$data['desc']}} </div>
        <div>Status Iklan : {{$data['status']}} </div>
        <div>ID Iklan : {{$data['ads_id']}} </div>
        <h3>Details Pengguna</h3>
        <div>Nama Pengguna : {{$data['name']}} </div>
        <div>Alamat Pengguna : {{$data['address']}} </div>
        <div>Kontak Pengguna : {{$data['phone']}} </div>
        <div>ID Pengguna : {{$data['user_id']}} </div>
        <div style="margin-top: 20px;">
            <div>Jika anda login menggunakan user admin, silahkan klik link dibawah ini untuk mengkonfirmasi penayangan iklan.</div>
            <a style="font-size: 14pt; margin-top:30px;" href="http://192.168.5.10:8000/preview_ads/{{$data['user_id']}}/{{$data['ads_id']}}"> Buka Iklan </a>
        </div>
        <div style="margin-top:40px;">
            <div>cashbekas.com</div>
        </div>
        <p style="padding: 10px;">Ini adalah pesan otomatis yang dibuat oleh sistem. Semua informasi yang disertakan dipesan ini adalah hasil input oleh pengguna yang telah menyetujui semua syarat dan ketentuan dalam beriklan di cashbekas.com.</p>
    </div>
</body>