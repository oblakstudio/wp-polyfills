<?php
/**
 * Singleton_Trait trait.
 *
 * @package WP Polyfills
 * @subpackage Traits
 */

namespace Oblak\WP\Traits;

/**
 * Enables the singleton pattern.
 */
trait Singleton_Trait {
    /**
     * Class instance
     *
     * @var array<int, static>
     */
    protected static $instances = array();

    /**
     * Class Constructor
     */
    abstract protected function __construct();

    /**
     * Returns the singleton instance
     *
     * @return static
     */
    final public static function instance() {
        return static::$instances[ static::class_basename( static::class ) ] ??= new static();
    }

    /**
     * Get the class "basename" of the given object / class.
     *
     * @param  string|object $classname Class name or object.
     * @return string
     */
    private static function class_basename( $classname ) {
        $classname = is_object( $classname ) ? get_class( $classname ) : $classname;

        return basename( str_replace( '\\', '/', $classname ) );
    }

    /**
     * Disallow cloning
     */
    final public function __clone() {
        _doing_it_wrong( __FUNCTION__, 'Cloning is disabled', 'WP Polyfills' );
    }

    /**
     * Disallow serialization
     */
    final public function __wakeup() {
        _doing_it_wrong( __FUNCTION__, 'Unserializing is disabled', 'WP Polyfills' );
    }
}
