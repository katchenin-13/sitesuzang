
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>sitesuzang</title>
  {{-- <link href="{{asset('assets/css/summernote-bs4.min.css')}}" rel="stylesheet"> --}}
  <link rel="shortcut icon" type="image/png" href="{{asset('vendor/laravel-filemanager/img/72px color.png')}}">
  {{-- <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet"> --}}
  <link rel="stylesheet" href="{{asset('plugin/css/summernote.css')}}"/>
 <style>
    #holder img {
        height: 100%;
        width: 100%;
    }
  </style>
    <link rel="stylesheet" href="{{mix('css/app.css')}}" />
    {{-- <link rel="stylesheet" href=" https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"> --}}
    <!-- <link rel="stylesheet" href="{{asset('plugins/codemirror/codemirror.css')}}"/>
    <link rel="stylesheet" href="{{asset('plugins/codemirror/theme/monokai.css')}}"/>
    <link rel="stylesheet" href="{{asset('plugins/simplemde/simplemde.min.css')}}"/>-->
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script> --}}
    
    {{-- <script src="{{asset('ckeditor/ckeditor.js')}}"></script> --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    {{-- <script src=https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js charset=utf-8></script>
        {!! $chart->script() !!} --}}
    @livewireStyles

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  
  <!-- Navbar -->
    <x-topnav />
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #64350d !important;">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
      <img src="{{asset('images/logo.png')}} " alt="User Avatar" class=" img-size-50 logo" style=" width: 100%;
      aspect-ratio: auto 200 / 150;
      height: 120px;
      "/>
     </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!-- <div class="image">
              <img src="{{asset('images/logo.png')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
        </div> -->
        <div class="info mr-5 ">
          <div  class="d-block" style="color:#fff;" ><h3 class="ellipsis"  >{{ userFullName() }}</h3> </div>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <x-menu />
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        @yield("contenu")
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <x-sidebar />
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      &copy;SKMCODING&copy;
    </div>
    <!-- Default to the left -->
    <strong class="text-center">Copyright &copy;   <a href="https://www.appatam.com/">APPATAM SOLUTION DIGITAL</a>.</strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
{{-- <script src="{{asset('assets/js/summernote-bs4.min.js')}}"></script> --}}
<script src="{{ mix('js/app.js') }}"></script>

<script src="{{asset('plugin/js/jquery.js')}}"></script>
{{-- <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script> --}}
  {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script> --}}
  <script src="{{asset('plugin/js/tinymce.min.js')}}" ></script>
  {{-- <script src="//cdn.tinymce.com/4/tinymce.min.js"></script> --}}
  {{-- <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script> --}}

  <script src="{{asset('plugin/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('plugin/js/tinymce.min.js')}}"></script>
  <script src="{{asset('plugin/js/speakingurl.min.js')}}"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.tiny.cloud/1/s1zy0vzr5s60apc16erybgropuxhxq7b0nmekh4qrct3nzq1/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> --}}

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/speakingurl/14.0.1/speakingurl.min.js"></script> --}}


@livewireScripts
@stack('scripts')
{{-- @yield('ck-editor') --}}

</body>
</html>
