# eZ AMP Bundle
This is an extension to the eZ Platform CMS that provides Accelerated Mobile Pages (AMP) Support.

Accelerated Mobile Pages is an initiative from Google to speed up mobile browsing. AMP is an open standard based on HTML. It enforces performance by limiting functionality and includes remote caching from Google to allow quick embedded views to search results.

Given Google's continuing dominance search both publishers and CMS vendors need to take AMP into account. This bundle enables <a href="http://ezplatform.com">eZ Platform</a> installations to have quick access to an AMP formatted version of content objects.

## Installation

Installation is similar to most Symfony Bundles:

### Install using Composer

```
composer require janit/ez-amp-bundle
```

This will download and install the package to your local environment.

### Update AppKernel

Open the Application Kernel and add the bundle:

```

<?php
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...
            new Janit\EzAmpBundle\EzAmpBundle(),
        );
    }

    // ...
}
```

This will load and enable the eZ AMP Bundle in your installation when the application bootstraps.

### Add header link to content (to make AMP pages discoverable)

To enable discovery, find your main layout template and enter the following snippet into the `head` section:

```
	{% if content is defined %}
		<link rel="amphtml" href="{{ url('ez_amp', {'objectId': content.versionInfo.contentInfo.id }) }}" />
	{% endif %}

</head>
```

This will allow the automatic discovery of your AMP versions by robots.

## Verifying installation

Open your browser and navigate to:

```
http://example.com/ez-amp/1
```

This should display a simple version of your front page, with all the fields looped.

After this verify your content pages' head section should contain a reference to the AMP version:

```
<link rel="amphtml" href="http://example.com/ez-amp/1337" />
```

The AMP version should also contain a canonical link back to the main version of the site:

```
<link rel="canonical" href="http://example.com/jared-leet-o" />
```

With these links in place search engine crawlers will now find the AMP versions of your content. If you did this in production then soon the Google mobile search results pages will start displaying links to your AMP versions.

Next if you have not yet done so, verify your site on <a href="https://www.google.com/webmasters/">Google Webmaster tools</a> and follow the state of the AMP validation.

That's it!

## Overriding with bundle inheritance

While this bundle aims to provide valid AMP output by default, it is very crude as it is. If you wish to use this version, you can use <a href="http://symfony.com/doc/current/bundles/inheritance.html">Symfony Bundle Inheritance</a> to override the templates to have a more pleasing outlook.

## Missing features

There are quite a few more things that should be added to the bundle, both on eZ Platform and AMP side, some of which are:

- Allow configuration of templates per content type
- Allow configuration of content types to be served as AMP
- Support for JSON-LD metadata
- Support for analytics
- Support for ads
