<?php
/**
 * Helper: Slug
 *
 * Generates a URI friendly slug from a string (like a blog post title)
 *
 * @author Johnathan Tiong <johnathan.tiong@gmail.com>
 * @copyright 2020 Johnathan Tiong
 *
 */
namespace spark\Helpers;

use \R as R;

/**
 * Slug
 *
 * Used as Slug::generate(blog.post.title)
 * Will convert "Hello World" to "hello-world"
 */
class Slug
{
    /**
     * generate slug
     * converts "A Normal String" to "a-normal-string"
     *
     * @param string $text
     * @return string
     */
    public static function generate($text)
    {
        if (empty($text)) {
            return null;
        }

        // replace non letter or digits by -
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
        $text = trim($text, '-');
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = strtolower($text);
        $text = preg_replace('~[^-\w]+~', '', $text);

        return $text;
    }
}
