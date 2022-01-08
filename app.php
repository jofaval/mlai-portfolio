<?php

/**
 * Global APP files
 */

/**
 * Class that holds all the logic to the asset usage
 */
class Assets
{
    /**
     * All the styles of the system
     * 
     * @var string[]
     */
    private static $styles = [];
    
    /**
     * All the scripts of the system
     * 
     * @var string[]
     */
    private static $scripts = [];

    /**
     * Returns all the styles
     * 
     * @return string[]
     */
    public static function get_styles(): array
    {
        return static::$styles;
    }

    /**
     * Returns all the scripts
     * 
     * @return string[]
     */
    public static function get_scripts(): array
    {
        return static::$scripts;
    }

    /**
     * Pre-processes an asset
     * 
     * @param string $asset The asset to preprocess
     * 
     * @return string the preprocessed asset
     */
    private static function preprocess(string $asset): string
    {
        $preprocessed = trim($asset);

        return $preprocessed;
    }

    /**
     * Compares two asset strings
     * 
     * @param string $original The original asset
     * @param string $candidate The candidate asset to compare
     * 
     * @return bool
     */
    private static function compare(string $original, string $candidate): bool
    {
        $are_equal = strtolower($original) == strtolower($candidate);

        return $are_equal;
    }

    /**
     * Does the array already have the asset?
     * 
     * @param array $haystack The array in which to search
     * @param string $needle The asset to find
     * 
     * @return bool If the array already has the asset
     */
    private static function has_asset(array $haystack, string $needle): bool
    {
        // Compare the assets waiting for a match, it's implied that both are preprocessed
        foreach ($haystack as $candidate) {
            if (static::compare($needle, $candidate)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Adds an style
     * 
     * @param string $asset The asset to add
     * 
     * @return bool Could it be added?
     */
    public static function add_style(string $asset): bool
    {
        // Preprocess the wanted asset
        $original = static::preprocess($asset);

        // If it's already there, return false, because it wasn't added
        if (static::has_asset(static::get_styles(), $original)) return false;

        // Add the asset
        self::$styles[] = $original;

        return true;
    }

    /**
     * Adds an script
     * 
     * @param string $asset The asset to add
     * 
     * @return bool Could it be added?
     */
    public static function add_script(string $asset): bool
    {
        // Preprocess the wanted asset
        $original = static::preprocess($asset);

        // If it's already there, return false, because it wasn't added
        if (static::has_asset(static::get_scripts(), $original)) return false;

        // Add the asset
        self::$scripts[] = $original;

        return true;
    }

    /**
     * Clean all the assets
     * 
     * @return void
     */
    public static function clean_styles(): void
    {
        static::$styles = [];
    }

    /**
     * Clean all the assets
     * 
     * @return void
     */
    public static function clean_scripts(): void
    {
        static::$scripts = [];
    }

    /**
     * Clean all the assets
     * 
     * @return void
     */
    public static function clean_assets(): void
    {
        static::clean_styles();
        static::clean_scripts();
    }
}
