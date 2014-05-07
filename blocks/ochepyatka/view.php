<?php  defined('C5_EXECUTE') or die(_("Access Denied."));

// Helpers
$uh = Loader::helper('concrete/urls');

// Get block tools URL for ajax request script
$och_tool = $uh->getToolsURL('ochepyatka', 'ochepyatka');
?>
<script>och_url="<?=$och_tool?>";</script>
<script src="<?php echo DIR_REL ?>/packages/ochepyatka/ochepyatka.js"></script>
<link rel="stylesheet" href="<?php echo DIR_REL ?>/packages/ochepyatka/ochepyatka.css" />
<img src="<?php echo DIR_REL ?>/packages/ochepyatka/ochepyatka_btn.gif" width="117" height="92">