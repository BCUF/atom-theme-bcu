<section class="admin-message" id="error-404">

    <!-- <i class="fa fa-times"></i> -->
    <?php if ('fr' == $sf_user->getCulture()) : ?>
        <?php echo '<h2>Ce document est accessible sur le poste de consultation des Archives électroniques à la BCU-Centrale.</h2>' ?>
    <?php else : ?>
        <?php echo '<h2>Dieses Dokument ist an der Station der elektronische Archivierung in der KUB-Zentrale zu konsultieren.</h2>' ?>
    <?php endif; ?>

    <p>
    <?php if ('fr' == $sf_user->getCulture()) : ?>
        <?php echo 'Ce poste de consultation se trouve dans l’espace public de la BCU-Centrale. Il vous donne accès à une sélection d’inventaires et de documents des collections patrimoniales (archives familiales, documents sonores et films) de la BCU. Pour toute question vous pouvez <a href="mailto:fri-memoria@fr.ch">nous contacter</a>.' ?>
    <?php else : ?>
        <?php echo 'Diese öffentliche Suchstation befindet sich in der KUB-Zentrale. Sie ermöglicht einen Zugang zu einer Auswahl von Inventaren und Dokumenten der Kulturgütersammlungen der Kantons- und Universitätsbibliothek (Familienarchive, Ton- und Filmdokumente). Bitte <a href="mailto:fri-memoria@fr.ch">kontaktieren Sie uns</a> für weitere Informationen.' ?>
    <?php endif; ?>
    </p>

    <div class="tips">
        <p>
            <a href="javascript:history.go(-1)"><?php echo __('Back to previous page'); ?></a><br />
            <?php echo link_to(__('Go to homepage'), '@homepage'); ?>
        </p>
    </div>

</section>