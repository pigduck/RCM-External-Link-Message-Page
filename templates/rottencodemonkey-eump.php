<?php /* Template Name: EUMP */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title><?php esc_html_e(get_theme_mod('rcm_eump_title'));?></title>
    <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
<!--body-->
<?php if(get_theme_mod('rcm_eump_header') == 1): ?>
    <div class="rcm-header">
        <img class="logo" src="<?php esc_html_e(get_theme_mod('rcm_eump_logo'));?>" alt="">
    </div>
<?php endif; ?>
<div class="rcm-body-container">
    <?php echo wp_kses_post(get_theme_mod('rcm_eump_text_1')); ?>
</div>
<!--transparencyreport.google.com-->
<?php if(get_theme_mod('rcm_eump_transparencyreport') == 1 && $url = esc_url(isset($_GET['url']))): ?>
    <div class="rcm-transparencyreport">
        <a href="https://transparencyreport.google.com/safe-browsing/search?url=<?php echo esc_url($url) ?>"><?php echo esc_html_e(get_theme_mod('rcm_eump_text5')); ?></a>
    </div>
<?php endif; ?>
<!--RCM Center-->
<div class="rcm-center">
    <?php echo wp_kses_post(get_theme_mod('rcm_eump_text_2')); ?>
</div>

<!--go to url-->
<div class="rcm-button-container">
    <?php if($url = esc_url(isset($_GET['url']))): ?>
    <a href="<?php echo esc_url($url) ?>"><button class="rcm-button" role="button"><?php esc_html_e(get_theme_mod('rcm_eump_text6')); ?></button></a>
    <?php endif; ?>
</div>
<!--RCM Footer-->
<div class="rcm-footer">
    <?php echo wp_kses_post(get_theme_mod('rcm_eump_text_3')); ?>
</div>
<?php if(get_theme_mod('rcm_eump_poweredby') != 1 ): ?>
    <div id="rottenCodeMonkey">
        Powered by RottenCodeMonkey
    </div>
<?php endif; ?>
<?php wp_footer(); ?>
<style>
    <?php echo esc_html(get_theme_mod('rcm_eump_css')); ?>
</style>
</body>
</html>
