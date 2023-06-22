<?php $this->view("catalog/header",$data); ?>

<section class="my-5">
    <h3 class="fw-700 text-center mb-4 tm-text-primary"><?=$data['page_title']?></h3>
    <div class="container mw-100 w-50 bg-white shadow rounded p-4">
        <div class="row">
            <form method="post" class="">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>
</section>


<?php $this->view("catalog/footer",$data); ?>

    