<?php

namespace App\Tags;

use Statamic\Tags\Tags;

class Canonical extends Tags
{
    /**
     * {{ canonical }}
     *
     * This tag will output the canonical URL for the current entry. This is used to
     * make sure search engines are aware of the latest versions of content.
     */
    public function index(): string
    {
        // TODO: make this work if content doesn't exist in latest version

        $baseUrl = config('app.url') . rtrim(array_first(config('statamic.sites.sites'))['url'], '/');

        $slug = $this->context->get('slug')->value() === 'home' ?
            '' :
            '/' . (string) $this->context->get('slug');

        return $baseUrl . $slug;
    }
}
