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
                </div>
            </div>

            {{-- javascript --}}
            @include('admin.adminjs')

        </body>
        </html>
</body>
</html>