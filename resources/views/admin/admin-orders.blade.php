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
        <div style="position: relative; top: 60px; right: -150px;" align="center">
            <h1 align="center">Customer Orders</h1>

                <div style="padding: 8px 20px;">
                    <form action="{{ url('/searchcustomer') }}" method="get">
                        @csrf
                        <input type="text" name="search" placeholder="search customer name" style="color: black;">
                        <input type="submit" value="Search" class="btn btn-success" >
                    </form>
                </div>

            <table  bgcolor="black">
                <tr align="center">
                    <th style="padding: 8px 20px;">Name</th>
                    <th style="padding: 8px 20px;">Phone</th>
                    <th style="padding: 8px 20px;">Address</th>
                    <th style="padding: 8px 20px;">Food Name</th>
                    <th style="padding: 8px 20px;">Price</th>
                    <th style="padding: 8px 20px;">Quantity</th>
                    <th style="padding: 8px 20px;">Total Price</th>
                </tr>
                @foreach ($orders as $order)
                    <tr align="center">
                        <td style="padding: 8px 20px;">{{ $order->name }}</td>
                        <td style="padding: 8px 20px;">{{ $order->phone }}</td>
                        <td style="padding: 8px 20px;">{{ $order->address }}</td>
                        <td style="padding: 8px 20px;">{{ $order->foodname }}</td>
                        <td style="padding: 8px 20px;">Sh. {{ $order->price }}</td>
                        <td style="padding: 8px 20px;">{{ $order->quantity }}</td>
                        <td style="padding: 8px 20px;">Sh. {{ $order->price  * $order->quantity}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        

    </div>
    {{-- javascript --}}
    @include('admin.adminjs')

  </body>
</html>