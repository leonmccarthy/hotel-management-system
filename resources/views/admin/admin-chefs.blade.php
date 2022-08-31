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
                    <form action="{{ url('/uploadchef') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="name">Name: </label>
                            <input style="color: black;" type="text" name="name" placeholder="Enter chef name" required>
                        </div>
                        <div>
                            <label for="speciality">Speciality: </label>
                            <input style="color: black;" type="text" name="speciality" placeholder="Enter chef speciality" required>
                        </div>
                        <div>
                            <label for="image">Image: </label>
                            <input type="file" name="image" required>
                        </div>
                        <div>
                            <input type="submit"value="Save">
                        </div>
                    </form>

                    {{-- food menu table --}}
                    <div>
                        <table style="background-color: black;">
                            <tr>
                                <th style="padding: 20px;">Chef Name</th>
                                <th style="padding: 20px;">Chef Speciality</th>
                                <th style="padding: 20px;">Chef Image</th>
                                <th style="padding: 20px;">Action</th>
                                <th style="padding: 20px;">Action 2</th>
                            </tr>
                            @foreach ($chefdata as $chefdata)
                                <tr style="align: center;">
                                    <td style="padding:8px 20px;">{{ $chefdata->name }}</td>
                                    <td style="padding:8px 20px;">{{ $chefdata->speciality }}</td>
                                    <td style="padding:8px 20px;"><img height="70" width="70" src="/chefimage/{{ $chefdata->image }}"></td>
                                    <td style="padding:8px 20px;"><a href="{{ url('/deletechef', $chefdata->id) }}">Delete</a></td>
                                    <td style="padding:8px 20px;"><a href="{{ url('/updatechefview', $chefdata->id) }}">Update</a></td>
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