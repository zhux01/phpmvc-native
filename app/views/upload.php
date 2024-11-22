
<!-- Batas antara nav dan konten -->
 <div class="card my-2 mx-2">
  <div class="card-body">
  <h1 style="
  text-align: center; 
  color: #3c8aef;
  margin-bottom: 50px;
  transform: translateY(%80);">File Uploader</h1>
  <?php $flasher ?>
<form action="/uploader" method="post" accept-charset="utf-8" enctype="multipart/form-data">
  
  <div class="input-group">
  <input type="file" class="form-control" name="files" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
  </div>
  <button style="transform: translateX(380%);" type="submit" class="btn btn-primary my-3">Upload</button>
</form>
</div>