<!DOCTYPE html>
<html lang="en">
<head>

</head>
    <body>
        
     {{-- <img src="{{ asset('assets/img/bankmelati.png')}}" style="width: 60px; height:auto; position: absolute;" alt=""> --}}

     <table style="width: 100%;">
        <tr>
            <td align="center">
                <span style="line-height:1.6; font-wight:bold">
                  BANK SAMPAH MELATI BERSIH INDONESIA<br>
                    Tangerang selatan pamulang no 12
                </span>
            </td>
        </tr>
     </table>
     <hr>
     <br>

        <table class="static" align="center" rules="all" border="1px" style="width:95%;">
            <tr>
                <th>No</th>
                <th>Nama Nasabah</th>
                <th>Email</th>
                <th>Saldo</th>
            </tr>
            @foreach ($users as $key => $user)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>Rp. {{ number_format($user->saldo)}}</td>
                </tr>
            @endforeach
        </table>

        <script type="text/javascript">
            window.print();
        </script>
       
    </body>
</html>