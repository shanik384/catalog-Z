<?php $this->view("catalog/header",$data); ?>

<section class="my-5">
    <h3 class="fw-700 text-center mb-4 tm-text-primary"><?=$data['page_title']?></h3>
    <div class="container mw-100 w-50 bg-white shadow rounded p-5">
        <div class="row">
            <form method="post">
                <div class="mb-3">
                    <label for="eamilAddress" class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control" id="eamilAddress" aria-describedby="textHelp" placeholder="example@email.com">
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Create Password</label>
                  <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                </div>
                <div class="mb-3 text-center">
                    <input class="btn btn-primary" name="submit" type="submit" value="Login">
                </div>
              </form>
        </div>
    </div>
</section>

<?php $this->view("catalog/footer",$data); ?>