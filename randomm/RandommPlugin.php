<?php
namespace Craft;

class RandommPlugin extends BasePlugin {

    function getName()
    {
        return Craft::t('Randomm');
    }

    function getVersion()
    {
        return '1.0';
    }

    function getDeveloper()
    {
        return 'Fred Carlsen';
    }

    function getDeveloperUrl()
    {
        return 'http://sjelfull.no';
    }

}
