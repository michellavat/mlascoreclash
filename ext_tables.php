<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'MLA.' . $_EXTKEY,
	'Scoreclash',
	'ScoreClash'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'MLA.' . $_EXTKEY,
	'Stats',
	'Stats'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'MLA scoreclash');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_mlascoreclashnewtest_domain_model_clash', 'EXT:mlascoreclashnewtest/Resources/Private/Language/locallang_csh_tx_mlascoreclashnewtest_domain_model_clash.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_mlascoreclashnewtest_domain_model_clash');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_mlascoreclashnewtest_domain_model_activity', 'EXT:mlascoreclashnewtest/Resources/Private/Language/locallang_csh_tx_mlascoreclashnewtest_domain_model_activity.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_mlascoreclashnewtest_domain_model_activity');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_mlascoreclashnewtest_domain_model_tournament', 'EXT:mlascoreclashnewtest/Resources/Private/Language/locallang_csh_tx_mlascoreclashnewtest_domain_model_tournament.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_mlascoreclashnewtest_domain_model_tournament');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_mlascoreclashnewtest_domain_model_point', 'EXT:mlascoreclashnewtest/Resources/Private/Language/locallang_csh_tx_mlascoreclashnewtest_domain_model_point.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_mlascoreclashnewtest_domain_model_point');
