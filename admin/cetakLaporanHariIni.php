<?php 
require_once __DIR__ . '/vendor/autoload.php';

session_start();
require 'functions.php'; 


if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu')
        window.location = '../login/index.php';
    </script>
    ";
}

$transaksi = query("SELECT * FROM transaksi WHERE DATE(tanggal_transaksi) = CURDATE() AND status='dikirim' || status='diterima'");

$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'format' => 'A4-L',
    'orientation' => 'L'
]);


$html = '<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Data Laporan Harian - PrinterCaca</title>
      <link rel="preconnect" href="https://fonts.googleapis.com" />
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
      
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet" />
      <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  </head>
  <body>
  <div class="container-fluid">
  <div class="dashboard-heading">
    <h1 class="dashboard-title text-center mb-4" style="text-align: center;">Laporan Transaksi Harian <br />PrinterCaca</h1>
  </div>
  
    
    <div class="container-fluid">
            <div class="">
              <table class="table" border="1" cellpadding="10" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama Pembeli</th>
                    <th>Alamat</th>
                    <th>Nomor WhatsApp</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah Barang</th>
                    <th>Total Harga</th>
                    </tr>
               
                </thead>';
  
              
                $i = 1;
                $jumlahPendapatan = 0;
                foreach( $transaksi as $row){
                $totalHarga = $row["harga"] * $row["jumlah_barang"];
                $jumlahPendapatan += $totalHarga;
                $html .= '<tr>
                  
                  <td>'. $i++  .'</td>
                  <td>'. $row["tanggal_transaksi"].'</td>
                  <td>'. $row["nama_lengkap"].'</td>
                  <td>'. $row["alamat"].'</td>
                  <td>'. $row["nomor_whatsapp"].'</td>
                  <td>'. $row["nama_produk"].'</td>
                  <td>'. number_format($row["harga"]).'</td>
                  <td>'. $row["jumlah_barang"].'</td>
                  <td>Rp. '. number_format($row["subtotal"]).'</td>
                  </tr>';
                }
                
   $html .= '<tr style="background: #ff0090;;">
      <th colspan="7" style="color: white; text-align: right;">Total Pendapatan</th>
      <td style="color: white; font-weight: bold;" colspan="4">Rp. '.number_format($jumlahPendapatan).'</td>
   </tr>';


   $html .= '</table>
    </div>
    
    <div class="mengetahui">
        <p style="font-weight: bold; font-size: 16px;">Mengetahui,</p>
    </div>
    
    <div class="penanggungjawab">
       <p>Founder PrinterCaca</p><br /> <br />
       <p>Rafa Maritza</p>
    </div>
  </body>
  </html>';
  $mpdf->WriteHTML($html);
  $mpdf->Output('laporan-harian.pdf', 'I');
  
?>