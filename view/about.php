<?php
global $global, $config;
if(!isset($global['systemRootPath'])){
    require_once '../videos/configuration.php';
}
?>
<!DOCTYPE html>
<html lang="<?php echo $config->getLanguage(); ?>">
    <head>
        <title><?php echo $config->getWebSiteTitle(); ?> :: <?php echo __("About"); ?></title>
        <?php
        include $global['systemRootPath'] . 'view/include/head.php';
        ?>
    </head>

    <body class="<?php echo $global['bodyClass']; ?>">
        <?php
        include $global['systemRootPath'] . 'view/include/navbar.php';
        ?>

        <div class="container">
            <div class="bgWhite">
                <?php
                $custom = "";
                if (YouPHPTubePlugin::isEnabled("c4fe1b83-8f5a-4d1b-b912-172c608bf9e3")) {
                    require_once $global['systemRootPath'] . 'plugin/Customize/Objects/ExtraConfig.php';
                    $ec = new ExtraConfig();
                    $custom = $ec->getAbout();
                }
                if(empty($custom)){
                ?>
                <h1><?php echo __("This demo site is for signed-up teachers/tutors to test publishing and sharing video tutorials for eLearn. No other videos are allowed."); ?></h1>
                <blockquote class="blockquote">
                    <h1><?php echo __("We help individuals and businesses to build and host their own video server, so that all video productions remain their private property, and they can share with anyone in anywhere without unwanted distracting advertisements."); ?></h1>
                    <footer class="blockquote-footer">The Ubodoo.Com <cite title="Source Title">TEAM</cite></footer>
                </blockquote>
                <div class="btn-group btn-group-justified">
                    <a href="https://ubodoo.com/" class="btn btn-success" target="_blank" rel="noopener noreferrer">Main Site</a>
                    <a href="https://elearn.ubodoo.com/" class="btn btn-danger" target="_blank" rel="noopener noreferrer">eLearn Demo</a>
                    <a href="https://bbb.ubodoo.com/" class="btn btn-primary" target="_blank" rel="noopener noreferrer">WebClass Demo</a>
                    <a href="https://erp.ubodoo.com/" class="btn btn-warning" target="_blank" rel="noopener noreferrer">ERP Demo</a>
                </div>
                <span class="label label-success"><?php printf(__("You are running script version %s!"), $config->getVersion()); ?></span>

                <span class="label label-success">
                    <?php printf(__("You can upload max of %s!"), get_max_file_size()); ?>
                </span>
                <span class="label label-success">
                    <?php printf(__("You can storage %s minutes of videos!"), (empty($global['videoStorageLimitMinutes']) ? "unlimited" : $global['videoStorageLimitMinutes'])); ?>
                </span>
                <span class="label label-success">
                    <?php printf(__("You have %s minutes of videos!"), number_format(getSecondsTotalVideosLength() / 6, 2)); ?>
                </span>
                <?php
                }else{
                    echo $custom;
                }
                ?>

            </div>

        </div><!--/.container-->
        <?php
        include $global['systemRootPath'] . 'view/include/footer.php';
        ?>

        <script>
            $(document).ready(function () {



            });

        </script>
    </body>
</html>
