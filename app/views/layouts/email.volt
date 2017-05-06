<html>
<head></head>
<body style="background-color: #E4E4E4;padding: 20px; margin: 0; min-width: 640px;">
<table border="0" cellspacing="0" width="530" style="color:#262626;background-color:#fff;
		padding:27px 30px 20px 30px;margin:auto; border:1px solid #e1e1e1;">
    <tbody>
    <!-- header -->
    <tr style="background:#D44413">
        <td style="padding-left:20px">
            <a target="_blank" style="text-decoration:none;color:inherit;font-family:'HelveticaNeue','Helvetica Neue',Helvetica,Arial,sans-serif;font-weight:normal;">
                <h1 style="color:#fff">Zakat For Life</h1>
            </a>
        </td>
    </tr>
    </tbody>

    {{ content() }}
    <p>
    {{ name }}, terima kasih atas donasi Anda untuk program "{{ program }}".
    <br>
    Mohon segera transfer sebelum:<br>
    Kamis, 20 April 2017, 10:53 WIB<br>
    <br>
    Lakukan Transfer sebesar:<br>
    {{ donation }}<br>
    Tepat hingga 3 digit terakhir<br>
    (perbedaan nilai transfer akan menghambat proses verifikasi donasi)<br>
    Ke:<br>
    {{ bank_dest }}<br>
    Cabang xxx<br>
    No Rek. xxx<br>
    a.n xx<br>
    Donasi Anda akan terverifikasi oleh sistem dalam 1 hari kerja*.<br>
    Bila hingga Kamis, 20 April 2017, 10:53 WIB donasi belum kami terima, maka donasi akan dibatalkan oleh sistem.<br>
    *Apabila transfer di luar jam kerja bank atau pada hari libur, maka verifikasi donasi akan mengalami keterlambatan.<br>
    Jika butuh bantuan, hubungi saya dengan membalas email ini atau telepon ke xxx.
    </p>
    <!--footer-->
    <tbody>
    <tr>
        <td align="right" style="padding:25px 0  0 0;">
            <table border="0" cellspacing="0" cellpadding="0" style="padding-bottom:9px;" align="right">
                <tbody>
                <tr style="border-bottom:1px solid #999999;">
                    <td width="24" style="padding:0 7px 0 0;">
                        <a href="http://www.facebook.com/zakatforlife" style="border-width:0;">
                            <img src="http://{{ publicUrl }}/img/facebook.gif" width="24" height="24" alt="Facebook Image">
                        </a>
                    </td>
                    <td width="24">
                        <a href="http://twitter.com/zakatforlife" style="border-width:0;">
                            <img src="http://{{ publicUrl }}/img/twitter.gif" width="24" height="24" alt="Twitter Image">
                        </a>
                    </td>
                </tr>
                <tr style="height:1px; background:#000;padding-top:15px">
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>

</body>
</html>