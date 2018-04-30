<script type="text/javascript" src="../../js/forms/MdlSelect.js"></script>
<link type="text/css" href="../../css/plugins/mdl-inputs/mdl-input-styles.css" />

<?php

/**
 * States Dropdown
 *
 * @uses check_select
 * @return string
 */
function stateDropdown()
{
    $states = array(
        array('AL', 'Alabama'),
        array('AK', 'Alaska'),
        array('AR', 'Arkansas'),
        array('AZ', 'Arizona'),
        array('CA', 'California'),
        array('CO', 'Colorado'),
        array('CT', 'Connecticut'),
        array('DC', 'District of Columbia'),
        array('DE', 'Delaware'),
        array('FL', 'Florida'),
        array('GA', 'Georgia'),
        array('HI', 'Hawaii'),
        array('ID', 'Idaho'),
        array('IL', 'Illinois'),
        array('IN', 'Indiana'),
        array('IA', 'Iowa'),
        array('KS', 'Kansas'),
        array('KY', 'Kentucky'),
        array('LA', 'Louisiana'),
        array('ME', 'Maine'),
        array('MD', 'Maryland'),
        array('MA', 'Massachusetts'),
        array('MI', 'Michigan'),
        array('MN', 'Minnesota'),
        array('MS', 'Mississippi'),
        array('MO', 'Missouri'),
        array('MT', 'Montana'),
        array('NC', 'North Carolina'),
        array('ND', 'North Dakota'),
        array('NE', 'Nebraska'),
        array('NV', 'Nevada'),
        array('NH', 'New Hampshire'),
        array('NJ', 'New Jersey'),
        array('NM', 'New Mexico'),
        array('NY', 'New York'),
        array('OH', 'Ohio'),
        array('OK', 'Oklahoma'),
        array('OR', 'Oregon'),
        array('PA', 'Pennsylvania'),
        array('PR', 'Puerto Rico'),
        array('RI', 'Rhode Island'),
        array('SC', 'South Carolina'),
        array('SD', 'South Dakota'),
        array('TN', 'Tennessee'),
        array('TX', 'Texas'),
        array('UT', 'Utah'),
        array('VA', 'Virginia'),
        array('VT', 'Vermont'),
        array('WA', 'Washington'),
        array('WI', 'Wisconsin'),
        array('WV', 'West Virginia'),
        array('WY', 'Wyoming')
    );

    $options = '';
    foreach ($states as $state) {
        $options .= '<li class="mdl-menu__item" data-val="' . $state[0] . '" >' . $state[1] . '</li>';
    }

    $options .= '';
    return $options;

}

/**
 * Check Select Element
 *
 * @param $selected
 * @param $state
 * @return string
 * @internal param string $i , POST value
 * @internal param string $m , input element's value
 * @internal param string $e , return=false, echo=true
 */
function check_select($selected, $state)
{
    if ($selected == $state) {
        $val = ' selected="selected" ';
    } else {
        $val = '';
    }

    return $val;
}
