# Changelog

All notable changes to the LetsBot PHP package will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [2.0.0] - 2023-06-06

### Added
- Comprehensive documentation with separate markdown files for each feature category
- Complete test suite with unit and integration tests
- GitHub Actions workflow for continuous integration
- PHPStan static analysis support
- Support for PHP 8.0, 8.1, and 8.2
- Enhanced error handling and response parsing
- New fluent interface for all API methods
- Extended media handling capabilities
- Interactive message support (buttons, lists)
- Group management features
- Product catalog integration
- QR code and session management
- Rate limiting support
- Webhook handling

### Changed
- Improved package structure with better separation of concerns
- Enhanced Laravel integration with dedicated service provider
- More intuitive and consistent API method naming
- Better type hinting and return type declarations
- Updated dependencies to latest versions
- Comprehensive README with clearer installation and usage instructions

### Fixed
- SSL certificate verification issues
- Response parsing for complex data structures
- Error handling for rate limiting scenarios
- Inconsistent parameter naming

## [1.0.0] - 2022-11-15

### Added
- Initial release
- Basic WhatsApp messaging functionality
- Simple media support
- Laravel integration 