<?php defined('C5_EXECUTE') or die("Access Denied.");

/**
 * Lets think if we want to use facebook icon and
 * want to use different icon html than <i class="fa fa-facebook"></i>,
 * say <i class="my-facebook-icon"></i>
 * 
 * Then here, we check if $service is of service facebook then we put our custom html.
 * But, wouldnt it be also possible if we could set a custom html on dashboard,
 * and then use it everywhere.
 */

?>

<!-- core template -->
<div id="ccm-block-social-links<?php echo $bID; ?>" class="ccm-block-social-links">
    <ul class="list-inline">
    <?php foreach ($links as $link) {
    $service = $link->getServiceObject();
    if ($service) {
        ?>
            <li>
                <a target="_blank" rel="noopener noreferrer" href="<?php echo h($link->getURL()); ?>"
                    aria-label="<?php echo $service->getDisplayName(); ?>"><?php echo $service->getServiceIconHTML(); ?></a>
            </li>
        <?php
    }
}?>
    </ul>
</div>

<!-- undesired option -->
<div id="ccm-block-social-links<?php echo $bID; ?>" class="ccm-block-social-links">
    <ul class="list-inline">
    <?php foreach ($links as $link) {
    $service = $link->getServiceObject();
    if ($service) {
        switch($service->getHandle()) {
            case 'facebook':
                $customHTML = '<i class="my-custom-facebook-icon"></i>';
                break;
            default:
                break;
            ?>
                <li>
                    <a target="_blank" rel="noopener noreferrer" href="<?php echo h($link->getURL()); ?>"
                        aria-label="<?php echo $service->getDisplayName(); ?>"><?php echo $customHTML ? $customHTML : $service->getServiceIconHTML(); ?></a>
                </li>
            <?php
        }
    }
}?>
    </ul>
</div>


<!-- desired feature using a set function-->
<div id="ccm-block-social-links<?php echo $bID; ?>" class="ccm-block-social-links">
    <ul class="list-inline">
    <?php foreach ($links as $link) {
    $service = $link->getServiceObject();
    if ($service) {
        switch($service->getHandle()) {
            // we can define our custom html here and
            // if we have a set function we can use it 
            // but if we can do this on dashboard, much better..
            // then we dont need even a custom block template
            case 'facebook':
                $customHTML = '<i class="my-custom-facebook-icon"></i>';
                $service->setServiceIconHTML($customHTML);
                break;
            default:
                break;
            ?>
                <li>
                    <a target="_blank" rel="noopener noreferrer" href="<?php echo h($link->getURL()); ?>"
                        aria-label="<?php echo $service->getDisplayName(); ?>"><?php echo $service->getServiceIconHTML(); ?></a>
                </li>
            <?php
        }
    }
}?>
    </ul>
</div>