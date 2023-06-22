<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
    <figure class="effect-ming tm-video-item">
        <img src="<?php echo ROOT . $data->image; ?>" alt="Image" class="img-fluid">
        <figcaption class="d-flex align-items-center justify-content-center">
            <h2><?=$data->image_title?></h2>
            <a href="<?=ROOT?>photo_detail?image_id=<?=$data->image_id?>">View more</a>
        </figcaption>                    
    </figure>
    <div class="d-flex justify-content-between tm-text-gray">
        <span class="tm-text-gray-light"><?=date("j M Y",strtotime($data->date))?></span>
        <span><?=$data->views?> views</span>
    </div>
</div>