<div id="carousel_banner" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
    <?php foreach($eventos as $key => $e){ ?>
        <div class="carousel-item <?= $key == 0?'active':'' ?>">
            <?= $this->Html->image('banners/news/banner-'.$e->slug.'.jpg', ['alt' => $e->titulo,'class'=>'img-fluid d-block w-100']); ?>
            <div class="carousel-caption d-none d-md-block">
                <h4><?= $e->titulo; ?></h4>
                <p><?= substr($e->descricao, 0, 50);?> <?= $this->Html->link('Veja mais aqui',['controller' => 'eventos','action' => 'e',$e->slug],['class'=>'btn btn-sm px-3 btn-light']); ?></p>
            </div>
        </div>
    <?php } ?>
    </div>
    <a class="carousel-control-prev" href="#carousel_banner" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Prev</span>
    </a>
    <a class="carousel-control-next" href="#carousel_banner" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>