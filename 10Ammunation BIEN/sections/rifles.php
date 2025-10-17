
<?php foreach ($rifles as $rifle)   {?>
<div class="container-fluid text-center">
  <div class="row align-items-center">
    <div class="col-sm-4">
        <div class="card" style="width: 18rem;">
            <img src="<?=BASE_URL;?>img/m4.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text"><?= $rifle; ?></p>
            </div>
        </div>
    </div>
<?php }  ?>