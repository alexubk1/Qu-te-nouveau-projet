var Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('web/build/')
    .setPublicPath('/web')
    .addEntry('main', './assets/scss/main.scss')
    .addEntry('app', './assets/js/app.js')
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSassLoader()
    .autoProvidejQuery();

module.exports = Encore.getWebpackConfig();