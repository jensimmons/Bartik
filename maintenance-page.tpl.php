<?php
// $Id$

// Last conformed to D7 Head - v 1.8 2009/08/03 03:04:33 webchick

/**
 * @file
 * Theme implementation to display a single Drupal page while offline.
 *
 * All the available variables are mirrored in page.tpl.php. Some may be left
 * blank but they are provided for consistency.
 *
 * @see template_preprocess()
 * @see template_preprocess_maintenance_page()
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">

<head>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <?php print $scripts; ?>
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <div id="skip-link">
    <a href="#main-content"><?php print t('Skip to main content'); ?></a>
  </div>
  <?php print $page_top; ?>

<div id="page-wrapper"><div id="page">

  <div id="header"><div class="section clearfix">

    <?php if ($logo): ?>
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
        <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
      </a>
    <?php endif; ?>

    <?php if ($site_name || $site_slogan): ?>
      <div id="name-and-slogan"<?php if ($hide_site_name && $hide_site_slogan) { print ' class="element-invisible"'; } ?>>

        <?php if ($site_name): ?>
          <?php if ($title): ?>
            <div id="site-name"<?php if ($hide_site_name) { print ' class="element-invisible"'; } ?>>
              <strong>
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
              </strong>
            </div>
          <?php else: /* Use h1 when the content title is empty */ ?>
            <h1 id="site-name"<?php if ($hide_site_name) { print ' class="element-invisible"'; } ?>>
              <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
            </h1>
          <?php endif; ?>
        <?php endif; ?>

        <?php if ($site_slogan): ?>
          <div id="site-slogan"<?php if ($hide_site_slogan) { print ' class="element-invisible"'; } ?>>
            <?php print $site_slogan; ?>
          </div>
        <?php endif; ?>

      </div> <!-- /#name-and-slogan -->
    <?php endif; ?>

    <?php print $header; ?>

  </div></div> <!-- /.section, /#header -->

  <?php if ($messages): ?>
    <div id="messages"><div class="section clearfix">
      <?php print $messages; ?>
    </div></div> <!-- /.section, /#messages -->
  <?php endif; ?>

  <?php if ($featured): ?>
    <div id="featured" class="region"><div class="section clearfix">
      <?php print $featured; ?>
    </div></div> <!-- /.section, /#featured -->
  <?php endif; ?>

  <div id="main-wrapper"><div id="main" class="clearfix">

    <div id="content" class="column"><div class="section">
      <?php if ($highlight): ?><div id="highlight"><?php print $highlight; ?></div><?php endif; ?>
      <a id="main-content"></a>
      <?php if ($title): ?>
        <h1 class="title" id="page-title">
          <?php print $title; ?>
        </h1>
      <?php endif; ?>
      <?php print $content; ?>

    </div></div> <!-- /.section, /#content -->

    <?php if ($sidebar_first): ?>
      <div id="sidebar-first" class="column sidebar"><div class="section">
        <?php print $sidebar_first; ?>
      </div></div> <!-- /.section, /#sidebar-first -->
    <?php endif; ?>

  </div></div> <!-- /#main, /#main-wrapper -->

  <?php if ($triptych_first || $triptych_middle || $triptych_last): ?>
    <div id="triptych-wrapper"><div id="triptych" class="clearfix">

      <?php if ($triptych_first): ?>
        <div id="triptych-first" class="region triptych"><div class="section">
          <?php print $triptych_first; ?>
        </div></div> <!-- /.section, /#triptych-first -->
      <?php endif; ?>

      <?php if ($triptych_middle): ?>
        <div id="triptych-middle" class="region triptych"><div class="section">
          <?php print $triptych_middle; ?>
        </div></div> <!-- /.section, /#triptych-middle -->
      <?php endif; ?>

      <?php if ($triptych_last): ?>
        <div id="triptych-last" class="region triptych"><div class="section">
          <?php print $triptych_last; ?>
        </div></div> <!-- /.section, /#triptych-last -->
      <?php endif; ?>

    </div></div> <!-- /#triptych, /#triptych-wrapper -->
  <?php endif; ?>

  <div id="footer-wrapper"><div class="section">

    <?php if ($footer_firstcolumn || $footer_secondcolumn || $footer_thirdcolumn || $footer_fourthcolumn): ?>
      <div id="footer-columns" class="clearfix">

        <?php if ($footer_firstcolumn): ?>
          <div id="footer-firstcolumn" class="region sitemap"><div class="section">
            <?php print $footer_firstcolumn; ?>
          </div></div> <!-- /.section, /#footer-firstcolumn -->
        <?php endif; ?>

        <?php if ($footer_secondcolumn): ?>
          <div id="footer-secondcolumn" class="region sitemap"><div class="section">
            <?php print $footer_secondcolumn; ?>
          </div></div> <!-- /.section, /#footer-secondcolumn -->
        <?php endif; ?>

        <?php if ($footer_thirdcolumn): ?>
          <div id="footer-thirdcolumn" class="region sitemap"><div class="section">
            <?php print $footer_thirdcolumn; ?>
          </div></div> <!-- /.section, /#footer-thirdcolumn -->
        <?php endif; ?>

        <?php if ($footer_fourthcolumn): ?>
          <div id="footer-fourthcolumn" class="region sitemap"><div class="section">
            <?php print $footer_fourthcolumn; ?>
          </div></div> <!-- /.section, /#footer-fourthcolumn -->
        <?php endif; ?>

      </div><!-- /#footer-columns -->
    <?php endif; ?>

    <?php if ($footer): ?>
      <div id="footer" class="clearfix">
        <?php print $footer; ?>
      </div><!-- /#footer -->
    <?php endif; ?>

  </div></div> <!-- /.section, /#footer-wrapper -->

</div></div> <!-- /#page, /#page-wrapper -->

  <?php print $page_bottom; ?>
</body>
</html>
