<?php

/**
 * Skeleton - The ultimate symphony for web art architecture!
 *
 * @package     Theme
 * @subpackage  Skeleton
 * @version     1.0.0
 * @author      Selçuk Çukur <hk@selcukcukur.com.tr>
 * @copyright   (C) 2010 - 2022 Example Company Inc.
 *
 * @see https://docs.example.com/ Skeleton : Docs
 */
class Skeleton_Theme
{
    /**
     * The directory name where the theme files are located.
     *
     * @var string
     */
    public $name = 'Skeleton';

    /**
     * Customized configuration values for the theme.
     *
     * @var array
     */
    public $config = [];

    /**
     * The variable to use for exceptions that occur for the theme.
     *
     * @var mixed
     */
    public $error = null;

    /**
     * Default language lines customized for the theme.
     *
     * @var array
     */
    public $language;

    /**
     * Array where all available translations for the theme are stored.
     *
     * @var array
     */
    public $languages;

    /**
     * Create a new theme instance.
     *
     * @return void
     */
    function __construct()
    {
        // Let's include all available language lines for the theme.
        if(!$this->languages)
            $this->languages = View::$init->theme_language_loader($this->name);

        // Let's include the language lines available for the theme by system default.
        if(!$this->language)
            $this->language = View::$init->theme_lang(Bootstrap::$lang->clang, $this->languages);
        
        // Let's include the customization configurations for the theme.
        $this->config = include __DIR__.DIRECTORY_SEPARATOR."theme-config.php";
    }
    
    /**
     * Update customized configuration settings for theme.
     *
     * @return mixed
     */
    public function change_settings()
    {
        $themeSettings = isset($this->config["settings"]) ? $this->config["settings"] : [];

        return $themeSettings;
    }
}
