<section class="admin-message" id="error-404">

    <h2>
        <!-- <i class="fa fa-times"></i> -->
        <?php if ('fr' == $sf_user->getCulture()) : ?>
            <li><?php echo '<h3>Ce document est accessible sur le poste de consultation des Archives électroniques à la BCU-Centrale.</h3>' ?></li>
        <?php else : ?>
            <li><?php echo '<h3>Dieses Dokument ist an der Station der elektronische Archivierung in der KUB-Zentrale zu konsultieren.</h3>' ?></li>
        <?php endif; ?>
    </h2>

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