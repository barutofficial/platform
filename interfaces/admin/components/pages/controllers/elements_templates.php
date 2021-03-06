<?php

namespace CASHMusic\Admin;

use CASHMusic\Core\CASHSystem as CASHSystem;
use CASHMusic\Core\CASHRequest as CASHRequest;
use ArrayIterator;
use CASHMusic\Admin\AdminHelper;


$admin_helper = new AdminHelper($admin_primary_cash_request, $cash_admin);

// first handle add
if (isset($_POST['dotemplateset'])) {
	// form was submitted. set the template
	$effective_user = $cash_admin->effective_user_id;
	if (!isset($_POST['template_id'])) {
		$template_id = false;
	} else {
		$template_id = $_POST['template_id'];
	}
	$template_response = $cash_admin->requestAndStore(
		array(
			'cash_request_type' => 'system', 
			'cash_action' => 'settemplate',
			'template' => $_POST['template'],
			'template_id' => $template_id,
			'user_id' => $effective_user
		)
	);
	if ($template_response['payload']) {
		$admin_helper->formSuccess('Success.','/elements/templates/' . $template_response['payload']);
	} else {
		$admin_helper->formFailure('Error. Something just didn\'t work right.','/elements/templates/');
	}
}

// get all the templates 
$template_response = $cash_admin->requestAndStore(
	array(
		'cash_request_type' => 'system', 
		'cash_action' => 'gettemplatesforuser',
		'user_id' => $cash_admin->effective_user_id
	)
);

if (is_array($template_response['payload'])) {
	$page_templates = array();
	$embed_templates = array();
	foreach ($template_response['payload'] as $template) {
		if ($template['type'] == 'page') {
			$page_templates[] = $template;
		} elseif ($template['type'] == 'embed') {
			$embed_templates[] = $template;
		}
	}
	if (count($page_templates)) {
		$cash_admin->page_data['page_templates'] = new ArrayIterator($page_templates);
	} 

	if (count($embed_templates)) {
		$cash_admin->page_data['embed_templates'] = new ArrayIterator($embed_templates);
	}
}

$cash_admin->setPageContentTemplate('elements_templates');
?>