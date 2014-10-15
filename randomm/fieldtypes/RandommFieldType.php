<?php
namespace Craft;

class RandommFieldType extends BaseFieldType {

    public function getName()
    {
        return Craft::t('Randomm');
    }

    public function defineContentAttribute()
    {
        return AttributeType::String;
    }

    /**
     * Returns the field's input HTML.
     *
     * @param string $name
     * @param string $value
     * @return string
     */
    public function getInputHtml($name, $value)
    {
        // Reformat the input name into something that looks more like an ID
        $id = craft()->templates->formatInputId($name);

        // Figure out what that ID is going to look like once it has been namespaced
        $namespacedId = craft()->templates->namespaceInputId($id);

        craft()->templates->includeJsResource('randomm/chance.min.js');
        craft()->templates->includeJsResource('randomm/randomm.js');
        craft()->templates->includeCssResource('randomm/randomm.css');
        craft()->templates->includeJs("Randomm.init('{$namespacedId}')");

        return craft()->templates->render('randomm/input', [
            'name'        => $name,
            'value'       => $value,
            'namespaceId' => $namespacedId,
            'settings'    => $this->getSettings(),
        ]);
    }

    public function getSettingsHtml()
    {
        return craft()->templates->render('randomm/_settings', [
            'settings' => $this->getSettings(),
            'types'    => $this->getTypes()
        ]);
    }

    protected function defineSettings()
    {
        return [
            'placeholder'   => [AttributeType::String, 'default' => 'Generate random things'],
            'type'          => [AttributeType::String],
            'typeArguments' => AttributeType::Mixed,
            'autoGenerateIfEmpty' => AttributeType::Bool,
        ];
    }

    private function getTypes()
    {
        $types = [
            'basics'     => ['optgroup' => 'Basics'],
            'floating'   => 'Floating',
            'integer'    => 'Integer',
            'natural'    => 'Natural',
            'string'     => 'String',
            'text'       => ['optgroup' => 'Text'],
            'paragraph'  => 'Paragraph',
            'sentence'   => 'Sentence',
            'syllable'   => 'Syllable',
            'word'       => 'Word',
            'person'     => ['optgroup' => 'Person'],
            'name'       => 'Name',
            'ssn'        => 'SSN',
            'web'        => ['optgroup' => 'Web'],
            'color'      => 'Color',
            'email'      => 'E-mail',
            'fbid'       => 'Facebook id',
            'hashtag'    => 'Hashtag',
            'ip'         => 'IP',
            'ipv6'       => 'IPv6',
            'twitter'    => 'Twitter handle',
            'location'   => ['optgroup' => 'Location'],
            'address'    => 'Address',
            'altitude'   => 'Altitude',
            'areacode'   => 'Areacode',
            'city'       => 'City',
            'geohash'    => 'Geohash',
            'latitude'   => 'Latitude',
            'longitude'  => 'Longitude',
            'phone'      => 'Phone',
            'postal'     => 'Postal',
            'state'      => 'State',
            'street'     => 'Street',
            'zip'        => 'Zip',
            'time'       => ['optgroup' => 'Time'],
            'date'       => 'Date',
            'hammertime' => 'Hammertime',
            'month'      => 'Month',
            'timestamp'  => 'Timestamp',
            'year'       => 'Year',
            'misc'       => ['optgroup' => 'Misc'],
            'guid'       => 'GUID',
            'hash'       => 'Hash',
            'normal'     => 'Normal',
            'weighted'   => 'Weighted',
        ];

        return $types;
    }

}