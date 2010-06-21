<?php
/**
 * @version $Id$
 * @author CHNM
 * @license http://www.gnu.org/licenses/gpl-3.0.txt
 * @copyright Center for History and New Media, 2010
 * @package Contribution
 */
 
/**
 * Gets all available contribution types, displayed by their alias.
 *
 * @return array Array of ContributionType records
 */
function contribution_get_types()
{
    return get_db()->getTable('ContributionType')->findAll();
}

/**
 * Returns HTML for select box for contribution types.
 *
 * @return string HTML for select element
 */
function contribution_select_type($props=array(), $value=null, $label=null)
{
    return _select_from_table('ContributionType', $props, $value, $label);
}

/**
 * Gets all ContributionTypeElements for the given ContributionType.
 *
 * @return array Array of ContributionTypeElement records.
 */
function contribution_get_elements_for_type($type)
{
    // Allow an id or an object to be passed
    if (is_int($type)) {
        $type = get_db()->getTable('ContributionType')->find($type);
    }
    
    return $type->getTypeElements();
}