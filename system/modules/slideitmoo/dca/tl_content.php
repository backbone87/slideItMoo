<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2011 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  MEN AT WORK 2012  
 * @package    slideItMoo
 * @license    GNU/LGPL 
 * @filesource
 */

/**
 * Table tl_content 
 */
// replace palettes
$GLOBALS['TL_DCA']['tl_content']['palettes']['slideItStart'] = '{type_legend},type,headline;{siGenerel_legend},si_itemsVisible,si_elementsSlide,si_startIndex,si_itemsSelector;{siDimensions_legend},si_itemsDimension,si_itemsMargin;{siEffect_legend},si_duration,si_autoEffectTransition;{siAuto_legend:hide},si_elementDirection,si_verticalSlide,si_autoSlideDefault;{siControls_legend:hide},si_showControls,si_mouseWheelNav;{siTemplate_legend:hide},si_templateDefault;{expert_legend:hide},cssID,space';
$GLOBALS['TL_DCA']['tl_content']['palettes']['slideItEnd'] = '{type_legend},type;';

// extend selector
$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'si_autoSlideDefault';
$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'si_templateDefault';
$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'si_autoEffectTransition';

// extend subpalettes
$GLOBALS['TL_DCA']['tl_content']['subpalettes']['si_autoSlideDefault'] = 'si_autoSlide';
$GLOBALS['TL_DCA']['tl_content']['subpalettes']['si_templateDefault'] = 'si_cssTemplate';
$GLOBALS['TL_DCA']['tl_content']['subpalettes']['si_autoEffectTransition'] = 'si_effectTransition,si_effectEase';

//callbacks
$GLOBALS['TL_DCA']['tl_content']['config']['onsubmit_callback'][] = array('tl_content_si', 'siWrite');
$GLOBALS['TL_DCA']['tl_content']['config']['ondelete_callback'][] = array('tl_content_si', 'siDelete');

// add fields
$GLOBALS['TL_DCA']['tl_content']['fields']['si_itemsVisible'] = array
    (
    'label' => &$GLOBALS['TL_LANG']['tl_content']['si_itemsVisible'],
    'inputType' => 'text',
    'exclude' => true,
    'eval' => array('mandatory' => true, 'maxlength' => '4', 'rgxp' => 'digit', 'tl_class' => 'w50')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['si_elementsSlide'] = array
    (
    'label' => &$GLOBALS['TL_LANG']['tl_content']['si_elementsSlide'],
    'inputType' => 'text',
    'exclude' => true,
    'eval' => array('mandatory' => true, 'maxlength' => '4', 'rgxp' => 'digit', 'tl_class' => 'w50')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['si_startIndex'] = array
    (
    'label' => &$GLOBALS['TL_LANG']['tl_content']['si_startIndex'],
    'inputType' => 'text',
    'exclude' => true,
    'eval' => array('tl_class' => 'w50')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['si_itemsSelector'] = array
    (
    'label' => &$GLOBALS['TL_LANG']['tl_content']['si_itemsSelector'],
    'inputType' => 'text',
    'exclude' => true,
    'eval' => array('maxlength' => '200', 'rgxp' => 'extnd', 'tl_class' => 'w50')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['si_itemsDimension'] = array
    (
    'label' => &$GLOBALS['TL_LANG']['tl_content']['si_itemsDimension'],
    'inputType' => 'text',
    'exclude' => true,
    'eval' => array('mandatory' => true, 'multiple' => true, 'size' => 2, 'rgxp' => 'digit', 'nospace' => true, 'tl_class' => 'w50')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['si_itemsMargin'] = array
    (
    'label' => &$GLOBALS['TL_LANG']['tl_content']['si_itemsMargin'],
    'inputType' => 'trbl',
    'options' => array('px'),
    'exclude' => true,
    'eval' => array('rgxp' => 'digit', 'tl_class' => 'w50')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['si_duration'] = array
    (
    'label' => &$GLOBALS['TL_LANG']['tl_content']['si_duration'],
    'inputType' => 'text',
    'exclude' => true,
    'eval' => array('mandatory' => true, 'maxlength' => '6', 'rgxp' => 'digit', 'tl_class' => 'w50')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['si_autoEffectTransition'] = array
    (
    'label' => &$GLOBALS['TL_LANG']['tl_content']['si_autoEffectTransition'],
    'inputType' => 'checkbox',
    'exclude' => true,
    'eval' => array('submitOnChange' => true, 'tl_class' => 'clr w50')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['si_effectTransition'] = array
    (
    'label' => &$GLOBALS['TL_LANG']['tl_content']['si_effectTransition'],
    'inputType' => 'select',
    'exclude' => true,
    'options' => array('Quad', 'Cubic', 'Quart', 'Quint', 'Sine', 'Expo', 'Circ', 'Bounce', 'Back', 'Elastic'),
    'eval' => array('tl_class' => 'clr w50')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['si_effectEase'] = array
    (
    'label' => &$GLOBALS['TL_LANG']['tl_content']['si_effectEase'],
    'inputType' => 'select',
    'exclude' => true,
    'options' => array('In', 'Out', 'InOut'),
    'eval' => array('tl_class' => 'w50')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['si_elementDirection'] = array
    (
    'label' => &$GLOBALS['TL_LANG']['tl_content']['si_elementDirection'],
    'inputType' => 'checkbox',
    'exclude' => true,
    'eval' => array('tl_class' => 'w50')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['si_verticalSlide'] = array
    (
    'label' => &$GLOBALS['TL_LANG']['tl_content']['si_verticalSlide'],
    'inputType' => 'checkbox',
    'exclude' => true,
    'eval' => array('tl_class' => 'w50')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['si_autoSlideDefault'] = array
    (
    'label' => &$GLOBALS['TL_LANG']['tl_content']['si_autoSlideDefault'],
    'inputType' => 'checkbox',
    'exclude' => true,
    'eval' => array('submitOnChange' => true, 'tl_class' => 'm12 w50')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['si_autoSlide'] = array
    (
    'label' => &$GLOBALS['TL_LANG']['tl_content']['si_autoSlide'],
    'inputType' => 'text',
    'exclude' => true,
    'eval' => array('maxlength' => '10', 'rgxp' => 'digit', 'tl_class' => 'w50')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['si_showControls'] = array
    (
    'label' => &$GLOBALS['TL_LANG']['tl_content']['si_showControls'],
    'default' => 0,
    'inputType' => 'checkbox',
    'exclude' => true,
    'eval' => array('tl_class' => 'w50')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['si_mouseWheelNav'] = array
    (
    'label' => &$GLOBALS['TL_LANG']['tl_content']['si_mouseWheelNav'],
    'default' => 0,
    'inputType' => 'checkbox',
    'exclude' => true,
    'eval' => array('tl_class' => 'w50')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['si_templateDefault'] = array
    (
    'label' => &$GLOBALS['TL_LANG']['tl_content']['si_templateDefault'],
    'inputType' => 'checkbox',
    'exclude' => true,
    'eval' => array('submitOnChange' => true, 'tl_class' => 'clr w50')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['si_cssTemplate'] = array
    (
    'label' => &$GLOBALS['TL_LANG']['tl_content']['si_cssTemplate'],
    'default' => 'slideitmoo_horizontal',
    'exclude' => true,
    'inputType' => 'select',
    'options_callback' => array('tl_content_si', 'loadCssFiles'),
    'eval' => array('tl_class' => 'w50')
);

/**
 * Erweiterung für die tl_content-Klasse
 */
class tl_content_si extends Backend
{

    /**
     * @param mixed
     * @param object
     * @return string
     */
    public function siWrite(DC_Table $dc)
    {
        $id = $dc->id;

        //Aktuelles Element aus der Datenbank holen
        $objElement = $this->Database->prepare("SELECT * FROM tl_content WHERE id=?")
                ->execute($id)
                ->fetchAssoc();

        //Prüfen, ob containerId schon gesetzt ist
        if ($objElement['si_containerId'] == "")
        {
            //Container id fehlt. Vorhandenen IDs laden und neue ID erstellen
            $objSlider = $this->Database->prepare('SELECT *, CAST(SUBSTRING_INDEX(si_containerId, "_", -1) AS UNSIGNED ) as counter FROM tl_content WHERE type ="slideItStart" AND id!=? ORDER BY counter desc LIMIT 0,1')
                    ->execute($id)
                    ->fetchAssoc();

            if ($objSlider == "")
            {
                //dies ist der erste Slider, also id slider_1
                $objElement['si_containerId'] = "slider_1";
            }
            else
            {
                //höchste ID rausfinden, und neue containerID setzen
                $sliderId = explode("_", $objSlider['si_containerId']);
                $objElement['si_containerId'] = "slider_" . ($sliderId[1] + 1);
            }

            //update containerId
            $this->Database->prepare("UPDATE tl_content SET si_containerId = ? WHERE id=?")
                    ->execute($objElement['si_containerId'], $id);
        }

        //auf child-Element prüfen
        if ($objElement['si_children'] == "" && $objElement['type'] == 'slideItStart')
        {
            //Erstelle slideItEnd
            $result = $this->Database->prepare('INSERT INTO tl_content (pid, tstamp, sorting,  type, si_containerId, si_children) VALUES (?,?,?,"slideItEnd",?,?)')
                    ->execute($objElement['pid'], time(), ($objElement['sorting'] + 1), $objElement['si_containerId'], $id);

            //update element
            $this->Database->prepare("UPDATE tl_content SET si_children = ? WHERE id=?")
                    ->execute($result->insertId, $id);
        }
    }

    public function siDelete(DC_Table $dc)
    {

        $delRecord = $this->Database->prepare("SELECT * FROM tl_content WHERE id=?")
                ->execute($dc->id)
                ->fetchAssoc();

        if ($delRecord['type'] == 'slideItStart' || $delRecord['type'] == 'slideItEnd')
        {

            /**
             * Wird ein Element gelöscht, werden alle Kindelemente ebenfalls gelöscht
             */
            $eraseId = ($delRecord['si_children'] != "") ? $delRecord['si_children'] : false;


            if ($eraseId)
            {
                $this->Database->prepare("DELETE FROM tl_content WHERE id=?")
                        ->execute($eraseId);
            }
        }
    }

    /**
     * read all available css-files and return them as an array
     * @return array
     */
    public function loadCssFiles()
    {

        $arrFiles = scan(TL_ROOT . '/plugins/slideitmoo/css/');
        $arrCss = array();
        foreach ($arrFiles as $k => $file)
        {
            if (strtolower(substr($file, -3) == "css"))
            {
                $tmp = substr($file, 0, strlen($file) - 4);
                $arrCss[$tmp] = $tmp;
            }
        }
        return $arrCss;
    }

}

?>