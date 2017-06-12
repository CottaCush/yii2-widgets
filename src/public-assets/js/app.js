var App = (function ($, window) {
    var pub = {
        /**
         * Extend namespace on the App object
         * @param {object} object
         */
        extend: function (object) {
            if (typeof object !== 'object') return;
            $.extend(true, App, object);
        },

        /**
         * Initialize a App module
         *
         * Each module follows the guidelines for creating yii modules with the following additions:
         *  i.  a compulsory `name` attribute on [[pub]] which is a string representing the module's namespace in
         *      dot-notation for eg. a module App.Ajax.get should have a name attribute of 'App.Ajax.get'.
         *  ii. an optional `depends` attribute which is an array of module-names (i. above) that are required
         *      for the module to work properly. The module would not initialize if any of it's required modules aren't
         *      loaded when initModule is being called.
         *
         * @param {object} module
         */
        initModule: function (module) {
            /* Return if module doesn't have a name */
            if (!module.name) {
                console.error("The following module doesn't have a name and wasn't initialized: ", module);
                return;
            }

            var moduleName = 'Module: ' + module.name;

            /* Return if the module is already initialized */
            if (module.isInitialized) {
                console.log(moduleName + ' is already initialized');
                return;
            }

            if (!isRequiredModulesLoaded(module)) {
                console.error(moduleName + " wasn't initialized because " + module.missingModule + " couldn't be found");
                delete module.missingModule;
                return;
            }
            if (module.isActive === undefined || module.isActive) {
                var events = namespaceModuleEvents(module);
                if ($.isFunction(module.init)) {
                    module.init();
                }
                module.isInitialized = true;
                $.each(module, function () {
                    if ($.isPlainObject(this) && events !== this) {
                        pub.initModule(this);
                    }
                });
            }

        }
    };

    /**
     * Check if all the required modules are loaded before initializing.
     *
     * @param {object} module
     * @returns {boolean}
     */
    function isRequiredModulesLoaded(module) {
        var modules = module.depends || [];

        if (modules.length) {
            for (var i = 0, length = modules.length; i < length; i++) {
                var item = modules[i],
                    parts = item.split('.');

                for (var j = 0, partsLength = parts.length, obj = window; j < partsLength; j++) {
                    if (typeof obj[parts[j]] === 'undefined') {
                        module.missingModule = item;
                        return false;
                    }
                    obj = obj[parts[j]];
                }

            }
        }
        return true;
    }

    /**
     * Namespace provided modules when the module is initialized.
     * Converts a simple array of event names into an object where the key is the event name and the value is the
     * namespaced event name.
     * For eg. ['click'] becomes {'click': 'click.namespace'} where the namespace is the module's name in lowercase.
     *
     * @param {object} module
     * @returns {object|boolean} the namespaced object or false
     */
    function namespaceModuleEvents(module) {
        var events = module.events, newEvents = {}, name = module.name;
        if (name && events && $.isArray(events)) {
            for (var i = 0, l = events.length; i < l; i++) {
                var event = events[i];
                newEvents[event] = event + '.' + name.toLowerCase();
            }
            module.events = newEvents;

            return newEvents;
        }
        return false;
    }

    return pub;

})(jQuery, window);
