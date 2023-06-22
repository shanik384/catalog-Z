<?php $this->view("catalog/header",$data); ?>

<section class="my-5">
    <h3 class="fw-700 text-center mb-4 tm-text-primary"><?=$data['page_title']?></h3>
    <div class="container mw-100 w-50 bg-white shadow rounded p-5">
        <div class="row">
            <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="exampleInputText1" class="form-label">Image Title</label>
                  <input type="text" name="title" class="form-control" id="exampleInputText1" aria-describedby="textHelp">
                </div>
                <div class="mb-3">
                    <label for="formFileSingle" class="form-label">Select a image file</label>
                    <input class="form-control" name="file" type="file" id="formFileSingle">
                  </div>
                <button type="submit" class="btn btn-primary">Upload Image</button>
              </form>
        </div>
    </div>
</section>

<?php $this->view("catalog/footer",$data); ?>
