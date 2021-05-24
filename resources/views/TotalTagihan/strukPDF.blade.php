<!DOCTYPE html>
<html>
<head>
	<title>Struk Pembayaran Rekening Air</title>
</head>
<body>
	<strong><center>Struk Pembayaran Rekening Air</center></strong>
    <strong><center>HIPPAM Tirto Nur Abadi</center></strong>
    <center>Dsn. Basekan - Ds. Banjarsari Wetan</center>
    <center>Kec. Dagangan - Kab. Madiun</center>
    <hr>
	<br>
	<br>
	<table width="100%">
		<tbody>


		    <tr>
				<td width="20%">KODE METER</td>
				<td width="2%">:</td>
				<td width="30%">{{  $data['tagihan']['pelanggan']['kodeMeter'] }}</td>
				<td width="20%">GOL</td>
				<td width="2%">:</td>
				<td width="26%">{{ $data['tagihan']['golongan']['namaGolongan'] }}</td>
			</tr>
		    <tr>
				<td width="20%">NAMA</td>
				<td width="2%">:</td>
				<td width="30%">{{ $data['tagihan']['pelanggan']['namaPelanggan'] }}</td>
				<td width="20%">METER KINI</td>
				<td width="2%">:</td>
				<td width="26%">{{ $data['tagihan']['jumlahMeter'] }}</td>
			</tr>
		    <tr>
				<td width="20%">ALAMAT</td>
				<td width="2%">:</td>
				<td width="30%">{{ $data['tagihan']['pelanggan']['alamat'] }}</td>
			</tr>

		</tbody>

	</table>
    <br>
    <table width="100%">
        <tbody>

		    <tr>
				<td width="20%">PERIODE</td>
				<td width="2%">:</td>
				<td width="30%">{{ $data['tagihan']['bulan'] }}</td>
				<td width="20%"></td>
				<td width="2%"></td>
				<td width="26%"></td>
			</tr>
		    <tr>
				<td width="20%">TAGIHAN AIR</td>
				<td width="2%">:</td>
				<td width="30%">{{ $data['subTotal'] }}</td>
				<td width="20%"></td>
				<td width="2%"></td>
				<td width="26%"></td>
			</tr>

		</tbody>
    </table>
    <br>
    <table width="100%">
        <tbody>

		    <tr>
				<td width="20%">TOTAL TAGIHAN</td>
				<td width="2%">:</td>
				<td width="30%">{{ $data['subTotal'] }}</td>
				<td width="20%"></td>
				<td width="2%"></td>
				<td width="26%"></td>
			</tr>

		</tbody>
    </table>
</body>
</html>
