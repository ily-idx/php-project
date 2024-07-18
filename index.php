<?php
// Mengambil data dari API
$url = "https://bmkg-cuaca-api.vercel.app/cuaca?provinceId=bali&districtId=501162&receive=humidity";
$response = file_get_contents($url);

// Mengubah JSON menjadi array PHP
$data = json_decode($response, true);

// Memastikan data tersedia
if (isset($data['data']['humidity']['data'])) {
    $humidity_data = $data['data']['humidity']['data'];
} else {
    echo "Data tidak ditemukan atau terjadi kesalahan.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
<!-- Suggested code may be subject to a license. Learn more: ~LicenseLog:3693755539. -->
    <link href="node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>
<!-- Suggested code may be subject to a license. Learn more: ~LicenseLog:568522292. -->
    <script src="node_modules/datatables.net/js/jquery.dataTables.min.js"></script>

    <div class="container">
        <div class="row">
            <div class="col-md-6">

            <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Kelembapan (%)</th>
            </tr>
        </thead>
        </table>
        <script>
            $(document).ready(function() {
                $('#example').DataTable({
                    data: <?php echo json_encode($humidity_data); ?>,
                    columns: [
                        { data: 'date' },
                        { data: 'time' },
                        { data: 'value' }
                    ]
                });
            });
            
                        
                        </script>
            </div>
        </div>
    </div>
    

    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
