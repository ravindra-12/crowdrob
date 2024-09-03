<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Career</title>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

  </head>
  <body>
    @extends('dashboardlayout')

    
    @section('content')
    <form action="{{ route('update.career.page', ['id' => 1]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <input type="text" class="form-control" name="pageName"  value="{{$pageName}}" placeholder="Enter Page Name" >
        </div>
        {{-- <div id="summernote" name="pageContent"> --}}
            {{-- <p>{{ $pageContent }}</p> --}}
            <textarea name="pageContent" id="summernote">
              {{ $pageContent }}
            </textarea>
        {{-- </div> --}}
       {{-- <div class="m-5">
        <button class="btn btn-primary" type="submit">
            Submit
        </button>
       </div> --}}
      <div class="m-3">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
        </form>
     
    <script>
      $('#summernote').summernote({
        placeholder: 'Enter You Content',
        tabsize: 2,
        height: 300,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
    </script>
  </body>
  @endsection
</html>

