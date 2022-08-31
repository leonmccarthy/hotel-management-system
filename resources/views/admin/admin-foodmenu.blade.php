<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Food management</title>
</head>
<body>
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
                
                {{-- food menu form --}}
                <div style="position: relative; top: 60px; right: -150px;">
                    <form action="{{ url('/uploadfood') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="title">Title: </label>
                            <input style="color: black;" type="text" name="title" placeholder="Enter food title" required>
                        </div>
                        <div>
                            <label for="price">Price: </label>
                            <input style="color: black;" type="num" name="price" placeholder="Enter food price" required>
                        </div>
                        <div>
                            <label for="image">Image: </label>
                            <input type="file" name="image" required>
                        </div>
                        <div>
                            <label for="description">Description: </label>
                            <input style="color: black;" type="text" name="description" placeholder="Enter food description" required>
                        </div>
                        <div>
                            <input type="submit"value="Save">
                        </div>
                    </form>

                    {{-- food menu table --}}
                    <div>
                        <table style="background-color: black;">
                            <tr>
                                <th style="padding: 20px;">Food name</th>
                                <th style="padding: 20px;">Food price</th>
                                <th style="padding: 20px;">Food description</th>
                                <th style="padding: 20px;">Food image</th>
                                <th style="padding: 20px;">Action</th>
                                <th style="padding: 20px;">Action 2</th>
                            </tr>
                            @foreach ($fooddata as $fooddata)
                                <tr style="align: center;">
                                    <td style="padding:8px 20px;">{{ $fooddata->title }}</td>
                                    <td style="padding:8px 20px;">{{ $fooddata->price }}</td>
                                    <td style="padding:8px 20px;">{{ $fooddata->description }}</td>
                                    <td style="padding:8px 20px;"><img height="70" width="70" src="/foodimage/{{ $fooddata->image }}"></td>
                                    <td style="padding:8px 20px;"><a href="{{ url('/deletefood', $fooddata->id) }}">Delete</a></td>
                                    <td style="padding:8px 20px;"><a href="{{ url('/updatefoodview', $fooddata->id) }}">Update</a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

            </div>

            {{-- javascript --}}
            @include('admin.adminjs')

        </body>
        </html>
</body>
</html>