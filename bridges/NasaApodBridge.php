<?php

class NasaApodBridge extends FeedExpander
{
    const MAINTAINER = 'corenting';
    const NAME = 'NASA APOD';
    const URI = 'https://science.nasa.gov/apod/';
    const CACHE_TIMEOUT = 43200; // 12h
    const DESCRIPTION = 'Returns the 3 latest NASA APOD pictures and explanations';

    public function collectData()
    {
        $this->collectExpandableDatas('https://science.nasa.gov/feed/apod-basic/', 3);
    }

    protected function parseItem(array $item)
    {
        // NASA embeds a complete HTML document in each feed item's content.
        $html = str_get_html($item['content']);
        $body = $html ? $html->find('body', 0) : null;
        if (!$body) {
            throw new \Exception('Unable to find APOD feed item body: ' . $item['uri']);
        }

        defaultLinkTo($body, $item['uri']);
        foreach ($body->find('iframe, video, source') as $media) {
            if ($media->src) {
                $media->src = urljoin($item['uri'], $media->src);
            }
        }
        $item['content'] = $body->innertext;
        return $item;
    }

    public function getName()
    {
        return self::NAME;
    }

    public function getURI()
    {
        return self::URI;
    }
}
