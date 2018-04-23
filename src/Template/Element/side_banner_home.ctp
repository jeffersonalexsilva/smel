<div id="carousel_banner" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <?= $this->Html->image('banners/news/banner-1.jpg', ['alt' => 'Primeiro Slide','class'=>'d-block w-100']); ?>
            <div class="carousel-caption d-none d-md-block">
                <h4>Título desse banner</h4>
                <p>descrição e um link nesse banner <a href="#" class="btn btn-light">Link 1</a></p>
            </div>
        </div>
        <div class="carousel-item">
            <?= $this->Html->image('banners/news/banner-2.jpg', ['alt' => 'Segundo Slide','class'=>'d-block w-100']); ?>
            <div class="carousel-caption d-none d-md-block">
                <h4>Título 2 desse banner</h4>
                <p>descrição e um link nesse banner <a href="#" class="btn btn-light">Link 2</a></p>
            </div>
        </div>
        <div class="carousel-item">
            <?= $this->Html->image('banners/news/banner-3.jpg', ['alt' => 'Terceiro Slide','class'=>'d-block w-100']); ?>
            <div class="carousel-caption d-none d-md-block">
                <h4>Título 3 desse banner</h4>
                <p>descrição e um link nesse banner <a href="#" class="btn btn-light">Link 3</a></p>
            </div>
        </div>
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