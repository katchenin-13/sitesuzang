<script>
  $('textarea[name=ce]').ckeditor({
    height: 100,
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
 filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
 filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
 filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
  });
</script>