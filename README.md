# Simple Commerce Documentation
This is the repository that contains the [Simple Commerce](https://github.com/doublethreedigital/simple-commerce) documentation.

## Local Development

1. Fork this repository
2. Run `composer install` to install Composer dependencies
3. Install and compile front-end assets with `npm install && npm run dev`
4. And copy over your new `.env` file... `cp .env.example .env && php artisan key:generate`

## Contributing

If you find a typo or something that's not documented, please either report it as an issue or fix it with a pull request. All contributions are welcome!

## Versioning
The Documentation is seperated into versions so we can have different versions of documentation between Simple Commerce releases. For this functionality, a site is configured per release. For example, there's one for `v2.0`, another for `v2.1` and so on.

When it's time to add a new release to the documentation, follow these steps:

* Create a new site in `config/statamic/sites.php`, with the latest release being at the top of the array.
* Go to each of the entries you wish to have versions of and copy the content to the latest release site.
* In the `routes/web.php` file, change references to the previous release to the new one. The latest release should only be hard coded in a single place but best to double check.

## Resources

* [Documentation](https://sc-docs.doublethree.digital)
* [Simple Commerce Issues](https://github.com/doublethreedigital/simple-commerce/issues)
* [Simple Commerce Discussions](https://github.com/doublethreedigital/simple-commerce/discussions)
