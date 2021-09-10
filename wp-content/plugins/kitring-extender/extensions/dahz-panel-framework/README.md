# dahz-panel-framework

### Installing

How To Use / Install Dahz Panel Framework

```
require_once( 'dahz-panel-framework/dahz-panel-framework.php' );
```
## Getting Option Value
```
$dpf = DPF_Core::getInstance( 'option-name' );
$myValue = $dpf->getOption( 'my_textarea_option' );
```

## Documentation Option To Use

### Create Admin Panel
```
$dpf = DPF_Core::getInstance( 'option-name' );
$adminPanel = $dpf->createAdminPanel( array(
	'name' => 'admin-page-name',
	'desc' => 'Description Here',
) );
```

or as submenu page
```
$dpf = DPF_Core::getInstance( 'option-name' );
$adminPanel = $dpf->createAdminPanel( array(
	'name' => 'admin-page-name',
	'desc' => 'Description Here',
	'parent' => 'options-general.php',
) );
```

### Create Tab
```
$generalTab = $adminPanel->createTab( array(
    'name' => 'Tab Name',
) );
$generalTab2 = $adminPanel->createTab( array(
    'name' => 'Tab Name',
) );
```

## Creating Option
Option can be added both to Admin Panel only for Tab

for Admin Panel you can use 
```
$adminPanel->createOption( array(
    'name' => 'My Option Name',
    'id' => 'my_id_option',
    'type' => 'option-type',
    'desc' => 'This is our option'
) );
```

or you can use for each tab assigned
```
$generalTab->createOption( array(
    'name' => 'My Option Name',
    'id' => 'my_id_option',
    'type' => 'option-type',
    'desc' => 'This is our option'
) );

$generalTa2b->createOption( array(
    'name' => 'My Option Name',
    'id' => 'my_id_option',
    'type' => 'option-type',
    'desc' => 'This is our option'
) );
```
### Creating Text Option
```
$adminPanel->createOption( array(
    'name' => 'My Text Option',
    'id' => 'my_text_option',
    'type' => 'text',
    'desc' => 'This is our option'
) );
```
### Creating Select Option
```
$adminPanel->createOption( array(
	'name' => 'My Select Option',
	'id' => 'my_select_option_port',
	'type' => 'select',
	'desc' => 'This is our option',
	'options' => array(
		'1' => 'Option one',
		'2' => 'Option two',
		'3' => 'Option three',
	),
	'default' => '2',
) );
```
or with select option group
```
$adminPanel->createOption( array(
	'name' => 'My Select Option',
	'id' => 'my_select_option',
	'type' => 'select',
	'desc' => 'This is our option',
	'options' => array(
		'Group 1' => array(
			'1' => 'Option one',
			'2' => 'Option two',
		),
		'Group 2' => array(
			'3' => 'Option three',
		),
	),
	'default' => '2',
) );
```
### Creating Select Page Option
```
$adminPanel->createOption( array(
    'name' => 'My Select Page Option',
    'id' => 'my_selectpage_option',
    'type' => 'select-pages',
    'desc' => 'Select a page'
) );
```
### Creating Textarea Option
```
$adminPanel->createOption( array(
    'name' => 'My Textarea Option',
    'id' => 'my_textarea_option',
    'type' => 'textarea',
    'desc' => 'This is our option'
) );
```
### Creating Enable or disable Option
```
$adminPanel->createOption( array(
    'name' => 'Enable Feature X',
    'id' => 'is_enabled',
    'type' => 'enable',
    'default' => true,
    'desc' => 'Enable or disable our X feature',
) );
```
### Creating Save Option
```
$adminPanel->createOption( array(
    'type' => 'save',
) );
```