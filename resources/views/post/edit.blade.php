@extends('adminlte::page')

@section('title', 'Edit Post')


@section('content_header')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Edit Post Post</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ url('/admin/post') }}">Post</a></li>
          <li class="breadcrumb-item active">Edit Post</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
@stop

  @section('content')
  @include('blog::layouts.error')
  <section class="content">
    <div class="container-fluid">
      <div class="card card-outline card-info">
        <div class="card-header">
          <h3 class="card-title">Edit Post Blog</h3>
        </div>
        <div class="card-body">
          <form action="{{ url('/admin/post').'/'.$post->id }}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            @include('blog::layouts.post.create-edit')
          </form>
        </div>
        {{-- --------------------------------------------------------------------------------------------------------------------- --}}
      </div>

    </div>
  </section>


  @stop

    @section('css')
    <link rel="stylesheet" href="{{asset('/css/admin_custom.css')}}">
    @stop

      @section('js')
      <script>
        $(function () {
          //Initialize Select2 Elements
          $('.select2').select2()
          //Intialize Summernote Text Editor
          $('.textarea').summernote()
          //Initialize Bootstrap Switch
          $("input[data-bootstrap-switch]").each(function () {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
          });

          $(document).ready(function(){
        $('#keywords').selectize({
            plugins: ['restore_on_backspace'],
            plugins: ['remove_button'],
            delimiter: ',',
            persist: false,
            valueField: 'keyword',
            labelField: 'keyword',
            searchField: 'keyword',
            options: keywords,
            items : keywords,
            create: function(input,callback) {
                return {
                    keyword: input
                },
                callback({ keyword: input });
            }
        });
    });
        });
      </script>
      @stop