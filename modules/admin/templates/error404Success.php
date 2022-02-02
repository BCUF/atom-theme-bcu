<section class="admin-message" id="error-404">

    <!-- <h2> -->
        <!-- <i class="fa fa-times"></i> -->
        <?php if ('fr' == $sf_user->getCulture()) : ?>
            <?php echo '<h2>Ce document est accessible sur le poste de consultation des Archives électroniques à la BCU-Centrale.</h2>' ?>
        <?php else : ?>
            <?php echo '<h2>Dieses Dokument ist an der Station der elektronische Archivierung in der KUB-Zentrale zu konsultieren.</h2>' ?>
        <?php endif; ?>
    <!-- </h2> -->

    <p>
        <?php echo __('Did you type the URL correctly?'); ?><br />
        <?php echo __('Did you follow a broken link blablabla?'); ?>
    </p>

    <div class="tips">
        <p>
            <a href="javascript:history.go(-1)"><?php echo __('Back to previous page'); ?></a><br />
            <?php echo link_to(__('Go to homepage'), '@homepage'); ?>
        </p>
    </div>

</section>