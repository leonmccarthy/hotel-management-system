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

    </div>
    {{-- javascript --}}
    @include('admin.adminjs')

  </body>
</html>