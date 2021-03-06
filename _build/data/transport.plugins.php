<?php
/**
 * Package in plugins
 *
 * @package modxtalks
 * @subpackage build
 */
$plugins = array();

/* create the plugin object */
$plugins[0] = $modx->newObject('modPlugin');
$plugins[0]->set('id',1);
$plugins[0]->set('name','modxTalksPlugin');
$plugins[0]->set('description','Handles FURLs for modxTalks.');
$plugins[0]->set('plugincode', getSnippetContent($sources['plugins'] . 'plugin.modxtalksplugin.php'));
$plugins[0]->set('category',0);

$events = include $sources['events'].'events.modxtalks.php';
if (is_array($events) && !empty($events)) {
    $plugins[0]->addMany($events);
    $modx->log(xPDO::LOG_LEVEL_INFO,'Packaged in '.count($events).' Plugin Events for modxTalksPlugin.'); flush();
} else {
    $modx->log(xPDO::LOG_LEVEL_ERROR,'Could not find plugin events for modxTalksPlugin!');
}
unset($events);

return $plugins;
