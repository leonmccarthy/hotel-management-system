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
            <form action="{{ url('/updatechefaction', $chefdata->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="name">Name: </label>
                    <input style="color: black;" type="text" name="name" placeholder="Enter Chef name" value="{{ $chefdata->name }}" required>
                </div>
                <div>
                    <label for="speciality">Speciality: </label>
                    <input style="color: black;" type="text" name="speciality" placeholder="Enter Chef speciality" value="{{ $chefdata->speciality }}" required>
                </div>
                <div>
                    <label for="image">Old Image: </label>
                    <img height="100" width="100" src="/chefimage/{{ $chefdata->image }}">
                </div>
                <div>
                    <label for="image">New Image: </label>
                    <input type="file" name="image" required>
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