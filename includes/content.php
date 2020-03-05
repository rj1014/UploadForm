<div class="body text-center">
        <div class="card-header bg-secondary"  >
            <div class=" mt-2 btn-primary" >
            <h1 style="border:2px solid blue; margin:auto; padding:2px">UPLOADING FILE FORM</h1>
        </div>
<div class="container">
        <div class="card p-2 mt-2" style="margin:30%">
            <form action="validation.php" method="POST" enctype="multipart/form-data">
                <label for="input">Select image to upload:</label>
                    <div class="card p-2">
                        <input type="file" name="img_upload[]" multiple required>
                    </div>
                    <div>
                        <input type="submit" value="upload" class="btn btn-primary mt-2">
                    </div>
            </form>
        </div>
</div>
<div class="card-footer text-center">
    Copyright &copy; 2020
</div>