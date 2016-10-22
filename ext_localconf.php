<?php
defined ('TYPO3_MODE') or die ('Access denied.');

$TYPO3_CONF_VARS['SC_OPTIONS']['tslib/class.tslib_fe.php']['tslib_fe-contentStrReplace'][] = 'tx_jareplacer->hook_strreplace';