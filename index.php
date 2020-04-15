<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <title>Rapid Test Covid-19</title>
	  <!-- Tell the browser to be responsive to screen width -->
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <!-- Font Awesome -->
	  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	  <!-- Ionicons -->
	  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	  <!-- Tempusdominus Bbootstrap 4 -->
	  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	  <!-- iCheck -->
	  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	  <!-- JQVMap -->
	  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
	  <!-- Theme style -->
	  <link rel="stylesheet" href="dist/css/adminlte.min.css">
	  <!-- overlayScrollbars -->
	  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	  <!-- Daterange picker -->
	  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
	  <!-- summernote -->
	  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
	  <!-- Google Font: Source Sans Pro -->
	  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<style type="text/css">
	body{
		background-image:url(Covid19.jpg);
		 background-size: cover;
		background-position: absolute;
		background-repeat: no-repeat;

	}
</style>
<body >
	<?php
	
	//pernyataan
	$jenis_isi = ['POTENSI TERTULAR DI LUAR RUMAH :', 'POTENSI TERTULAR DI DALAM RUMAH :', 'DAYA TAHAN TUBUH (IMUNITAS) :'];
	$isi_data_1 = ['Saya pergi keluar rumah', 'Saya menggunakan transportasi umum: online, angkot, bus, taksi, kereta api', 'Saya tidak memakai masker pada saat berkumpul dengan orang lain', 'Saya berjabat tangan dengan orang lain', 'Saya tidak membersihkan tangan dengan hand sanitizer / tissue basah sebelum pegang kemudi mobil / motor', 'Saya menyentuh benda / uang yang juga disentuh orang lain', 'Saya tidak menjaga jarak 1,5 meter dengan orang lain ketika : belanja, bekerja, belajar, ibadah', 'Saya makan diluar rumah (warung / restaurant)', 'Saya tidak minum hangat & cuci tangan dengan sabun setelah tiba di tujuan', 'Saya berada di wilayah kelurahan tempat pasien tertular' ];
	$isi_data_2 = ['Saya tidak pasang hand sanitizer di depan pintu masuk, untuk bersihkan tangan sebelum pegang gagang (handle) pintu masuk rumah', 'Saya tidak mencuci tangan dengan sabun setelah tiba dirumah', 'Saya tidak menyediakan : tissue basah / antiseptic, masker, sabun antiseptic bagi keluarga di rumah', 'Saya tidak segera merendam baju & celana bekas pakai di luar rumah kedalam air panas / sabun', 'Saya tidak segera mandi keramas setelah saya tiba di rumah', 'Saya tidak mensosialisasikan check list penilaian resiko pribadi ini kepada keluarga di rumah'];
	$isi_data_3 = ['Saya dalam sehari tidak kena cahaya matahari minimal 15 menit', 'Saya tidak jalan kaki / berolah raga minimal 30 menit setiap hari', 'Saya jarang minum vitamin C & E, dan kurang tidur', 'Usia saya diatas 60 tahun', 'Saya mempunyai penyakit : jantung / diabetes / gangguan pernafasan kronik'];
	
	//hubungin database
	$con = mysqli_connect("localhost", "root", "", "covid19_yarra");

	if(isset($_POST['nama'])){
		$nama_inputan = $_POST['nama'];
		$yes_inputan = $_POST['yes'];
		$no_inputan = $_POST['no'];
		$resiko_inputan = $_POST['resiko'];
		$input_data = mysqli_query($con, "INSERT INTO covid_yarra (nama, yes, no, resiko)VALUES('$nama_inputan', '$yes_inputan', '$no_inputan', '$resiko_inputan')");
	}

	?>
	<br id="rapi1">
	<br id="rapi2">
	<br id="rapi3">
	<br id="rapi4">
	<br id="rapi5">
	<br id="rapi6">
	<br id="rapi7">
<div class="container-fluid">
	<div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Covid-19 Rapid Test</h3>

          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
              	<div class="card-body">
              		<div id="inputan_nama">
              		<div class="row">
	              		<div class="col-md-6">
			              	<div>
			                    <label >Nama anda</label>
			                    <input type="text" class="form-control" id="nama" name="nama" placeholder="masukkan nama anda" >
			                    <br>
			                    <label >Umur anda</label>
			                    <input type="number" class="form-control" id="umur" name="umur" placeholder="masukkan umur anda" >
			              	</div>
		              	</div>
		              	<div class="col-md-6">
			              	<div >
			                    <label >alamat</label>
			                   <textarea class="form-control" name="alamat" rows="5" id="alamat" placeholder="masukkan alamat anda"></textarea>
			              	</div>
		              	</div>
	              	</div>
	              	<br>
		              	<button  type="submit"  onclick="button_nama()" class="btn btn-primary form-control">masuk penilaian</button>
		             </div>
              	</div>

              	  <div id="inputan_hasil" class="form-group">
                	<div class="card-body table table-responsive p-0">
	                	<table align="center" class="table table-hover text-nowrap">
	                		<thead id="inputan_hasil_nama">
	                			
	                		</thead>
	                		<tbody id="inputan_hasil_resiko">
	                			
	                		</tbody>

	                	</table>
	                	<br>
	               			<button  type="submit"  onclick="button_kembali()" class="btn btn-primary form-control">kembali penilaian</button>
	                </div>
	            </div>

                <div id="inputan_pernyataan" class="form-group">
                	<div class="card-body table table-responsive p-0">
	                	<table align="center" class="table table-hover text-nowrap">
	                		
	                		<thead>
	                			<tr>
	                				<td><b>A</b></td>
	                				<td><b><?php echo $jenis_isi[0]; ?></b></td>
	                			</tr>
	                		</thead>
	                		<tbody>
		                		<?php
		                			$no = 1;
		                			for ($i=0; $i < count($isi_data_1); $i++) { 
		                				
		                				?>
		                				<tr>
		                					<td><?php echo $no; ?></td><td><?php echo $isi_data_1[$i]; ?></td><td><input type="radio" name="covid<?php echo $no ?>" value="yes"> Yes </td><td><input type="radio" name="covid<?php echo $no ?>" value="no"> No </td>
		                				</tr>
		               					<?php
		               					$no++;
		               				}
		               			?>
	                		</tbody>

	                		<thead>
	                			<tr>
	                				<td><b>B</b></td>
	                				<td><b><?php echo $jenis_isi[1]; ?></b></td>
	                			</tr>
	                		</thead>
	                		<tbody>
		                		<?php
		                			
		                			for ($i=0; $i < count($isi_data_2); $i++) { 
		                				
		                				?>
		                				<tr>
		                					<td><?php echo $no; ?></td><td><?php echo $isi_data_2[$i]; ?></td><td><input type="radio" name="covid<?php echo $no ?>" value="yes"> Yes </td><td><input type="radio" name="covid<?php echo $no ?>" value="no"> No </td>
		                				</tr>
		               					<?php
		               					$no++;
		               				}
		               			?>
	                		</tbody>

	                		<thead>
	                			<tr>
	                				<td><b>C</b></td>
	                				<td><b><?php echo $jenis_isi[2]; ?></b></td>
	                			</tr>
	                		</thead>
	                		<tbody>
		                		<?php
		                			for ($i=0; $i < count($isi_data_3); $i++) { 
		                				?>
		                				<tr>
		                					<td><?php echo $no; ?></td><td><?php echo $isi_data_3[$i]; ?></td><td><input type="radio" name="covid<?php echo $no ?>" value="yes"> Yes </td><td><input type="radio" name="covid<?php echo $no ?>" value="no"> No </td>
		                				</tr>
		               					<?php
		               					$no++;
		               				}
		               			?>
	                		</tbody>
	                		<tr>
	                			<td colspan="4"><button  type="submit"  onclick="button_resiko()" class="btn btn-primary form-control">kirim penilaian</button></td>
	                		</tr>
	                	</table>
         			</div>
                </div>      
              </div>
            

              
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
         
        </div>
	
</div>
</body>
<script src="jquery-3.4.1.min.js"></script>
<script type="text/javascript">
	
	var jenis_isi = ['POTENSI TERTULAR DI LUAR RUMAH :', 'POTENSI TERTULAR DI DALAM RUMAH :', 'DAYA TAHAN TUBUH (IMUNITAS) :'];
	var isi_data_1 = ['Saya pergi keluar rumah', 'Saya menggunakan transportasi umum: online, angkot, bus, taksi, kereta api', 'Saya tidak memakai masker pada saat berkumpul dengan orang lain', 'Saya berjabat tangan dengan orang lain', 'Saya tidak membersihkan tangan dengan hand sanitizer / tissue basah sebelum pegang kemudi mobil / motor', 'Saya menyentuh benda / uang yang juga disentuh orang lain', 'Saya tidak menjaga jarak 1,5 meter dengan orang lain ketika : belanja, bekerja, belajar, ibadah', 'Saya makan diluar rumah (warung / restaurant)', 'Saya tidak minum hangat & cuci tangan dengan sabun setelah tiba di tujuan', 'Saya berada di wilayah kelurahan tempat pasien tertular' ];
	var isi_data_2 = ['Saya tidak pasang hand sanitizer di depan pintu masuk, untuk bersihkan tangan sebelum pegang gagang (handle) pintu masuk rumah', 'Saya tidak mencuci tangan dengan sabun setelah tiba dirumah', 'Saya tidak menyediakan : tissue basah / antiseptic, masker, sabun antiseptic bagi keluarga di rumah', 'Saya tidak segera merendam baju & celana bekas pakai di luar rumah kedalam air panas / sabun', 'Saya tidak segera mandi keramas setelah saya tiba di rumah', 'Saya tidak mensosialisasikan check list penilaian resiko pribadi ini kepada keluarga di rumah'];
	var isi_data_3 = ['Saya dalam sehari tidak kena cahaya matahari minimal 15 menit', 'Saya tidak jalan kaki / berolah raga minimal 30 menit setiap hari', 'Saya jarang minum vitamin C & E, dan kurang tidur', 'Usia saya diatas 60 tahun', 'Saya mempunyai penyakit : jantung / diabetes / gangguan pernafasan kronik'];

	document.getElementById("inputan_pernyataan").style.display = 'none';
	document.getElementById("inputan_hasil").style.display = 'none';
	
	var isi_nama;
	var isi_umur;


	function button_nama() {
		var nama = document.getElementsByName("nama");
		var pre_isi_nama = nama[0];
		isi_nama = pre_isi_nama["value"];

		var umur = document.getElementsByName("umur");
		var pre_isi_umur = umur[0];
		isi_umur = pre_isi_umur["value"];
		
		var alamat = document.getElementsByName("alamat");
		var pre_isi_alamat = alamat[0];
		var isi_alamat = pre_isi_alamat["value"];

		//console.log(isi_nama);
		//console.log(isi_umur);
		//console.log(isi_alamat);
		
		if( isi_nama  === "" || isi_umur  === "" || isi_alamat  === ""){
			alert('data tidak boleh kosong')
		}else {
			//alert("data berhasil dimuat")
			for (var i = 2; i <= 7; i++) {
				document.getElementById("rapi"+i).style.display = 'none';
			}
			document.getElementById("inputan_nama").style.display = 'none';
			document.getElementById("inputan_pernyataan").style.display = 'inherit';
		}
		

	}


	function button_resiko () {
		var yes = 0;
		var no = 0;

		var nomor = 1;
		for (var i = 1; i <= isi_data_1.length; i++) {

			var jawaban = document.getElementsByName("covid"+nomor);
			var pre_isi_jawaban1 = jawaban[0];
			var pre_isi_jawaban2 = jawaban[1];
			var isi_jawaban1 = pre_isi_jawaban1["checked"];
			var isi_jawaban2 = pre_isi_jawaban2["checked"];
			//console.log(isi_jawaban1);
			//console.log(isi_jawaban2);
			if(isi_jawaban1 === true){
				yes += 1;
			}else if (isi_jawaban2 === true) {
				no += 1;
			}
			nomor++;

		}
		for (var i = 1; i <= isi_data_2.length; i++) {

			var jawaban = document.getElementsByName("covid"+nomor);
			var pre_isi_jawaban1 = jawaban[0];
			var pre_isi_jawaban2 = jawaban[1];
			var isi_jawaban1 = pre_isi_jawaban1["checked"];
			var isi_jawaban2 = pre_isi_jawaban2["checked"];
			//console.log(isi_jawaban1);
			//console.log(isi_jawaban2);
			if(isi_jawaban1 === true){
				yes += 1;
			}else if (isi_jawaban2 === true) {
				no += 1;
			}
			nomor++
		}
		for (var i = 1; i <= isi_data_3.length; i++) {

			var jawaban = document.getElementsByName("covid"+nomor);
			var pre_isi_jawaban1 = jawaban[0];
			var pre_isi_jawaban2 = jawaban[1];
			var isi_jawaban1 = pre_isi_jawaban1["checked"];
			var isi_jawaban2 = pre_isi_jawaban2["checked"];
			//console.log(isi_jawaban1);
			//console.log(isi_jawaban2);
			if(isi_jawaban1 === true){
				yes += 1;
			}else if (isi_jawaban2 === true) {
				no += 1;
			}
			nomor++;
		}
		//console.log(yes);
		//console.log(no);
		var total = isi_data_1.length + isi_data_2.length + isi_data_3.length;
		if(total === yes + no){
			var resiko = "";
			if(yes <= 7){
				resiko = "rendah, tingkatkan terus dan terapkan social distancing";
			}else if (yes <= 14) {
				resiko = "sedang, batasi aktifitas diluar rumah dan terapkan social distancing"
			}else{
				resiko = "tinggi, batasi aktifitas diluar rumah dan terapkan social distancing";
			}
			//console.log(resiko);

			var penambah_halaman_nama = $("#inputan_hasil_nama");
			penambah_halaman_nama.html("");
			penambah_halaman_nama.append("<tr>");
			penambah_halaman_nama.append("<td align='center'>Hi, "+isi_nama+"</td>");

			var penambah_halaman_resiko = $("#inputan_hasil_resiko");
			penambah_halaman_resiko.html("");
			penambah_halaman_nama.append("<tr>");
			penambah_halaman_nama.append("<td align='center'>Resiko anda "+resiko+"</td>");


			$.ajax({
			    	type : "POST",
	                data : "nama="+isi_nama+"&yes="+yes+"&no="+no+"&resiko="+resiko,
	                url : 'index.php',
	                success: function(result){

	                }
			    });

			for (var i = 2; i <= 7; i++) {
				document.getElementById("rapi"+i).style.display = 'inherit';
			}
			document.getElementById("inputan_pernyataan").style.display = 'none';
			document.getElementById("inputan_hasil").style.display = 'inherit';
		}else {
			alert("data harus diisi lengkap")
		}
		
		
	}
		function button_kembali(){

			document.getElementById("nama").value = "";
			document.getElementById("umur").value = "";
			document.getElementById("alamat").value = "";
			for (var i = 2; i <= 7; i++) {
				document.getElementById("rapi"+i).style.display = 'inherit';
			}
			document.getElementById("inputan_hasil").style.display = 'none';
			document.getElementById("inputan_nama").style.display = 'inherit';
		}

</script>

</html>