<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.minmalista
 *
 * @copyright   (C) 2017 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;
use Joomla\CMS\Language\Text;
/** @var Joomla\CMS\Document\HtmlDocument $this */
include_once JPATH_THEMES . '/minimalista/logic.php';
?>
<!doctype html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">

<head>
    <jdoc:include type="metas" />
    <jdoc:include type="styles" />
    <jdoc:include type="scripts" />
</head>

<body class="<?php echo $bodyClasses; ?>">
    <?php echo $startBodyCode; ?>
    <!-- head with menu, main, sidebars, footer -->
    <header class="header">
        <div class="container<?php echo $containerFluid; ?>">
            <div class="row">
                <jdoc:include type="modules" name="header" style="<?php echo $this->template . '-default'; ?>" />
            </div>
        </div>
        <div class="container<?php echo $containerFluid; ?>">
            <!-- navbar offcanvas bootstrap 5 -->
            <nav class="navbar navbar-expand<?php echo $defaultBoostrapDesktop; ?>">
                <div class="container-fluid">
                    <?php if ($logo): ?>
                    <a class="navbar-brand" href="<?php echo $this->baseurl; ?>">
                        <img src="<?php echo $logo; ?>" alt="<?php echo $logo_alt; ?>" />
                    </a>
                    <?php endif;?>
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="offcanvas offcanvas-<?php echo $offcanvasDirection; ?>" tabindex="-1"
                        id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header">
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <jdoc:include type="modules" name="menu" style="<?php echo $this->template . '-default'; ?>" />
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <main class="main">
        <?php if ($this->countModules('slideshow')): ?>
        <div class="container-fluid">
            <div class="slideshow row">
                <jdoc:include type="modules" name="slideshow" style="<?php echo $this->template . '-default'; ?>" />
            </div>
        </div>
        <?php endif;?>
        <?php

// Sections before the component section
$sectionsBeforeComponent = $templateParams->get('sectionsbeforecomponent', '');

if ($sectionsBeforeComponent) {
    foreach ($sectionsBeforeComponent as $section) {
        renderSection($section, $defaultBoostrapDesktop, $this);
    }
}

?>
        <div class="container<?php echo $containerFluid; ?>">
            <section class="component-section">
                <div class="container<?php echo $containerFluid; ?>">
                    <?php if ($this->countModules('main-top')): ?>
                    <div class="main-top row">
                        <jdoc:include type="modules" name="main-top" style="<?php echo $this->template . '-default'; ?>" />
                    </div>
                    <?php endif;?>
                    <div class="row">
                        <?php if ($this->countModules('sidebar-left')): ?>
                        <div class="sidebar-left col-12 col<?php echo $sidebarWidth; ?>">
                            <div class="row">
                                <jdoc:include type="modules" name="sidebar-left" style="<?php echo $this->template . '-default'; ?>" />
                            </div>
                        </div>
                        <?php endif;?>
                        <div class="component col-12 col<?php echo $mainWidth; ?>">
                            <?php if ($this->countModules('content-top')): ?>
                            <div class="row">
                                <jdoc:include type="modules" name="content-top" style="<?php echo $this->template . '-default'; ?>" />
                            </div>
                            <?php endif;?>
                            <jdoc:include type="message" />
                            <jdoc:include type="component" />
                            <?php if ($this->countModules('content-bottom')): ?>
                            <div class="row">
                                <jdoc:include type="modules" name="content-bottom" style="<?php echo $this->template . '-default'; ?>" />
                            </div>
                            <?php endif;?>
                        </div>
                        <?php if ($this->countModules('sidebar-right')): ?>
                        <div class="sidebar-right col-12 col<?php echo $sidebarWidth; ?>">
                            <div class="row">
                                <jdoc:include type="modules" name="sidebar-right" style="<?php echo $this->template . '-default'; ?>" />
                            </div>
                        </div>
                        <?php endif;?>
                    </div>
                    <?php if ($this->countModules('main-bottom')): ?>
                    <div class="main-bottom row">
                        <jdoc:include type="modules" name="main-bottom" style="<?php echo $this->template . '-default'; ?>" />
                    </div>
                    <?php endif;?>
                </div>
            </section>
        </div>
        <?php
// Sections after the component section
$sectionsAfterComponent = $templateParams->get('sectionsaftercomponent', '');

if ($sectionsAfterComponent) {
    foreach ($sectionsAfterComponent as $section) {
        renderSection($section, $defaultBoostrapDesktop, $this);
    }
}

?>
    </main>
    <footer class="footer">
        <div class="container<?php echo $containerFluid; ?>">
            <?php if ($this->countModules('footer')): ?>
            <div class="row">
                <jdoc:include type="modules" name="footer" style="<?php echo $this->template . '-default'; ?>" />
            </div>
            <?php endif;?>
        </div>
    </footer>
    <?php echo $endBodyCode; ?>
    <?php if ($backtotop): ?>
    <button href="#top" id="back-top" class="btn back-to-top-link"
        aria-label="<?php echo Text::_('TPL_MINIMALISTA_BACKTOTOP'); ?>">
        <i class="fas fa-arrow-up" aria-hidden="true"></i>
    </button>
    <?php endif;?>
    <jdoc:include type="modules" name="debug" style="none" />
</body>

</html>
