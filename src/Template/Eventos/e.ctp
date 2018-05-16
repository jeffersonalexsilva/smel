<div class="banner">
    <?= $this->element('side_banner_evento', ['evento' => $evento]);?>
</div>
<div class="col-12" id="event">
    <section class="row py-4 detail">
            <div class="col-9 info">
                <h1 class="title"><?= $evento->titulo; ?></h1>
                <p class="intro"><?= $evento->descricao;?></p>
                <div class="contact">
                    <div class="org-name"><strong>Organização:</strong> <span class="organization"><?= $evento->organizado_por;?></span></div>
                    <div class="org-contact"><strong>Contato:</strong>
                        <ul>
                            <li class="contact"><?= $evento->email_evento;?></li>
                            <li class="site"><?= $evento->site_evento;?></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-3 calendar">
                <div class="card">
                    <h3 class="card-header">Agenda</h3>
                    <div cass="card-body">
                        <ul class="card-text">
                            <li class="nav-item"><strong>De:</strong> <?= date_format($evento -> data_hora_inicio, 'd/m/Y') ?></li>
                            <li class="nav-item"><strong>Até:</strong> <?= date_format($evento -> data_hora_fim, 'd/m/Y') ?></li>
                            <li class="nav-item"><strong>Local:</strong> <?= $evento -> local_evento; ?></li>
                        </ul>
                    </div>
                    <div class="card-footer"><strong><?= $evento ->gratuito?'Gratuito':'Pago'; ?></strong></div>
                <div>
            </div>
    </section>
    <section class="row activities">
        <h2 class="col-md-12 sub-title">Atividades</h2>
        <?= $this->element('lista_oficinas', ['oficinas' => $evento->oficina_cursos,'datas'=>$evento->data_horas]);?>
    </section>
</div>