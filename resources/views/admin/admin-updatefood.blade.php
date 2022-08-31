<x-app-layout>
    
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    
    <base href="/public">
    {{-- css --}}
    @include('admin.admincss')

  </head>
  <body>
      
    <div class="container-scroller">

        {{-- sidebar --}}
        @include('admin.sidebar')

        {{-- update form --}}
        <div style="position: relative; top: 60px; right: -150px;">
            <form action="{{ url('/updatefoodaction', $fooddata->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="title">Title: </label>
                    <input style="color: black;" type="text" name="title" placeholder="Enter food title" value="{{ $fooddata->title }}" required>
                </div>
                <div>
                    <label for="price">Price: </label>
                    <input style="color: black;" type="num" name="price" placeholder="Enter food price" value="{{ $fooddata->price }}" required>
                </div>
                <div>
                    <label for="image">Old Image: </label>
                    <img height="100" width="100" src="/foodimage/{{ $fooddata->image }}">
                </div>
                <div>
                    <label for="image">New Image: </label>
                    <input type="file" name="image" required>
                </div>
                <div>
                    <label for="description">Description: </label>
                    <input style="color: black;" type="text" name="description" placeholder="Enter food description" value="{{ $fooddata->description }}" required>
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