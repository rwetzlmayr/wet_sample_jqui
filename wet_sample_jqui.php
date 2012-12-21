<?php
$plugin['version'] = '0.2';
$plugin['author'] = 'Robert Wetzlmayr';
$plugin['author_uri'] = 'http://wetzlmayr.com/';
$plugin['description'] = 'Sample Textpattern plugin showcasing jQuery UI';
$plugin['type'] = 3;

@include_once('zem_tpl.php');

if (0) {
?>
# --- BEGIN PLUGIN HELP ---

h3. Purpose

A showcase for patterns and interfaces around Textpattern and jQuery UI. Work in progress.

h3. Licence

This plugin is released under the "Gnu General Public Licence":http://www.gnu.org/licenses/gpl.txt.

# --- END PLUGIN HELP ---

<?php
}

# --- BEGIN PLUGIN CODE ---

class wet_sample_jqui
{
	/**
	 * Hook UI, setup privileges
	 */
	function __construct()
	{
		if (txpinterface == 'admin') {
			add_privs('wet_sample_jqui', '1');
			register_tab('extensions', 'wet_sample_jqui', gTxt('wet_sample_jqui'));
			register_callback(array(__CLASS__, 'ui'), 'wet_sample_jqui');
		}
	}

	/**
	 * User interface
	 */
	static function ui($event, $step)
	{
		pagetop(gTxt(__CLASS__));
		echo self::dialog();
		echo self::form();
	}

	/**
	 * Dialogues.
	 */
	static function dialog()
	{
		return
			// Build the markup for a non-modal dialog
			tag('I enjoy your site very much', 'div', array('class' => 'txp-dialog', 'id' => 'dialog1', 'title' => 'Donald Swain says')).
			// Associate a trigger link with this dialog trough the selector in the 'data-txp-dialog' attribute
			graf(href('open dialogue', '#', array('data-txp-dialog' => '#dialog1'))).

			// Build the markup for a modal dialog and its trigger
			tag('I enjoy your site very much', 'div', array('class' => 'txp-dialog modal', 'id' => 'modal1', 'title' => 'Donald Swain says')).
			graf(href('open modal dialogue', '#', array('data-txp-dialog' => '#modal1')));

	}

	/**
	 * Form elements.
	 */
	static function form()
	{
		return
			// Build the markup for a non-modal dialog
			form(
				inputLabel('date1', fInput('text', 'date1', '2012-12-24', 'txp-datepicker', '', '', INPUT_REGULAR, '', 'date1'), 'And so this is&hellip;')
			);
	}
}

new wet_sample_jqui;

# --- END PLUGIN CODE ---

?>