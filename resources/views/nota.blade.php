<html>
    <head>
    <title>Faktur Pembayaran</title>
        <style>
            #tabel
            {
            font-size:15px;
            border-collapse:collapse;
            }
            #tabel  td
            {
            padding-left:5px;
            border: 1px solid black;
            }
        </style>
    </head>
<body style='font-family:tahoma; font-size:8pt;' onload="javascript:window.print()">
<center>
    <table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border = '0'>
        <td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
        <span style='font-size:12pt'><b>Bejo Futsal</b></span></br>
        Plaosan RT02 RW20 Tlogoadi Mlati Sleman Yogyakarata </br>
        Telp : 0815 4835 8353
        </td>
        <td style='vertical-align:top' width='30%' align='left'>
        <b><span style='font-size:12pt'>NOTA PENYEWAAN FUTSAL</span></b></br>
        No Trans. : {{ $transaksi->transaction_id }}</br>
        Tanggal : {{ date('d M Y') }}</br>
        </td>
    </table>

    <table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border = '0'>
        <td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
            Nama : {{ strtoupper($transaksi->pemesanan->user->nama) }}</br>
            Email : {{ $transaksi->pemesanan->user->email }}
        </td>
        <td style='vertical-align:top' width='30%' align='left'>
            No Telp : {{ $transaksi->pemesanan->user->no_hp }}  
        </td>
    </table>

    <table cellspacing='0' style='width:550px; font-size:8pt; font-family:calibri;  border-collapse: collapse;' border='1'>
    
        <tr align='center'>
            <td width='10%'>No</td>
            <td width='20%'>Nama</td>
            <td width='13%'>Jam Sewa</td>
            <td width='13%'>Total Harga</td>
        </tr>
        @php
            $pemesanan = app\Models\Pemesanan::where('order_id', $transaksi->pemesanan_id)->get();
            $total = 0;
        @endphp
        @foreach ($pemesanan as $item)
        <tr>
            <td>{{ $transaksi->pemesanan_id }}</td>
            <td>{{ strtoupper($transaksi->pemesanan->user->nama) }}</td>
            <td>{{ $item->jam->jam_mulai."-".$item->jam->jam_selesai }}</td>
            <td style='text-align:right'>Rp{{ number_format($item->harga, 0, 0, '.') }}</td>
        </tr>
        @php
            $total += $item->harga;
        @endphp
        @endforeach
        <tr>
            <td colspan = '3'>
                <div style='text-align:right'>Total Yang Harus Di Bayar Adalah : </div>
            </td>
            <td style='text-align:right'>Rp{{ number_format($total, 0, 0, '.') }}</td>
        </tr>
        <tr>
            <td colspan = '3'>
                <div style='text-align:right'>Cash : </div>
            </td>
            <td style='text-align:right'>Rp{{ number_format($total, 0, 0, '.') }}</td>
        </tr>

    </table>
    
    <table style='width:650; font-size:7pt;' cellspacing='2'>
        <tr>
            <td align='center'>Diterima Oleh,</br></br><u>(............)</u></td>
            <td style='border:1px solid black; padding:5px; text-align:left; width:30%'></td>
            <td align='center'>TTD,</br></br><u>(...........)</u></td>
        </tr>
    </table>
</center>
</body>
</html>