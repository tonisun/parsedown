<?php

class UnsafeExtension extends Parsedown
{
    protected function blockFencedCodeComplete($Block)
    {
        $text = $Block['element']['text']['text'];
        unset($Block['element']['text']['text']);

        // WARNING: There is almost always a better way of doing things!
        //
        // This example is one of them, unsafe behaviour is NOT needed here.
        // Only use this if you trust the input and have no idea what
        // the output HTML will look like (e.g. using an external parser).
        $Block['element']['text']['rawHtml'] = "<p>$text</p>";

        return $Block;
    }
}


class TrustDelegatedExtension extends Parsedown
{
    protected function blockFencedCodeComplete($Block)
    {
        $text = $Block['element']['text']['text'];
        unset($Block['element']['text']['text']);

        // WARNING: There is almost always a better way of doing things!
        //
        // This example is one of them, unsafe behaviour is NOT needed here.
        // Only use this if you trust the input and have no idea what
        // the output HTML will look like (e.g. using an external parser).
        $Block['element']['text']['rawHtml'] = "<p>$text</p>";
        $Block['element']['text']['allowRawHtmlInSafeMode'] = true;

        return $Block;
    }
}
