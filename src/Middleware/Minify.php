<?php

namespace Ken\BladeMinify\Middleware;

use Closure;
use Config;

class Minify
{
    const DEFAULT_REPLACEMENT = [
        '/<!--[^\[](.*?)[^\]]-->/s' => '',
        "/<\?php/"                  => '<?php ',
        "/\n([\S])/"                => '$1',
        "/\r/"                      => '',
        "/\n/"                      => '',
        "/\t/"                      => '',
        '/ +/'                      => ' ',
        '/> +</'                    => '><',
    ];

    const SPECIFIC_REPLACEMENT = [
        '/<!--[^\[](.*?)[^\]]-->/s' => '',
        "/<\?php/"                  => '<?php ',
        "/\r/"                      => '',
        "/>\n</"                    => '><',
        "/>\s+\n</"                 => '><',
        "/>\n\s+</"                 => '><',
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        //ini_set('zlib.output_compression', 'On');

        return $this->html($response);
    }

    public function html($response)
    {
        $buffer = $response->getContent();
        $replace = $this->shouldReplaceSpecial($buffer)
            ? self::SPECIFIC_REPLACEMENT
            : self::DEFAULT_REPLACEMENT;

        $buffer = preg_replace(array_keys($replace), array_values($replace), $buffer);

        $response->setContent($buffer);

        return $response;
    }

    /**
     * Check should special RegEx rules be applied
     *
     * @param string $buffer
     *
     * @return bool
     */
    private function shouldReplaceSpecial($buffer)
    {
        return strpos($buffer, '<pre') !== false
            || strpos($buffer, '&lt;pre') !== false
            || strpos($buffer, '//') !== false;
    }
}
