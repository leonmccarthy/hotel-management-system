<x-app-layout>
    
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    
    {{-- css --}}
    @include('admin.admincss')

  </head>
  <body>
      
    <div class="container-scroller">

        {{-- sidebar --}}
        @include('admin.sidebar')

        {{-- reservation table --}}
        <div style=" position: relative; top: 60px; right:-150px;">
            <table style="background-color: grey; border: 3px;">
                <tr>
                    <th style="padding: 20px;">Name</th>
                    <th style="padding: 20px;">Email</th>
                    <th style="padding: 20px;">Phone</th>
                    <th style="padding: 20px;">Guest</th>
                    <th style="padding: 20px;">Date</th>
                    <th style="padding: 20px;">Time</th>
                    <th style="padding: 20px;">Message</th>
                </tr>
                @foreach ($reservationdata as $reservationdata)
                    <tr>
                        <td style="padding:10px 20px;">{{ $reservationdata->name }}</td>
                        <td style="padding:10px 20px;">{{ $reservationdata->email }}</td>
                        <td style="padding:10px 20px;">{{ $reservationdata->phone }}</td>
                        <td style="padding:10px 20px;">{{ $reservationdata->guest }}</td>
                        <td style="padding:10px 20px;">{{ $reservationdata->date }}</td>
                        <td style="padding:10px 20px;">{{ $reservationdata->time }}</td>
                        <td style="padding:10px 20px;">{{ $reservationdata->message }}</td>
                    </tr>
                @endforeach
            </table>
        </div>

    </div>
    {{-- javascript --}}
    @include('admin.adminjs')

  </body>
</html>