<?php
// if (! function_exists('localized_route')) {
//     function localized_route($name, $parameters = [], $absolute = true)
//     {
//         if (!is_array($parameters)) {
//             $parameters = [$parameters];
//         }
//         $parameters = array_merge(['locale' => app()->getLocale()], $parameters);
//         return route($name, $parameters, $absolute);
//     }
// }
if (!function_exists('localized_route')) {
    function localized_route($name, $parameters = [], $locale = null, $absolute = true)
    {
        // Route parametrlari array bo'lishini tekshir
        if (!is_array($parameters)) {
            $parameters = [$parameters];
        }

        // Agar 'locale' allaqachon bor bo‘lsa — o‘chirib yuboramiz (override qilish uchun)
        unset($parameters['locale']);

        // Locale qo‘shamiz (yoki joriy locale)
        $parameters = array_merge(['locale' => $locale ?? app()->getLocale()], $parameters);

        return route($name, $parameters, $absolute);
    }
}
