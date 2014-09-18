(function ($) {

    Randomm = function () {}

    Randomm.setFieldName = function () {
        this.fieldname = arguments[0];

        return this.fieldname;
    }

    Randomm.getFieldName = function () {
        return this.fieldname;
    }

    Randomm.init = function () {
        var namespace = arguments[0];
        var $link = $('#' + namespace + '-randomize');

        $link.on('click', function (e) {
            e.preventDefault();
            var $link = $(this),
                randomType = $link.data('randomm-type');

            if (typeof chance !== 'undefined' && typeof chance[randomType] === 'function') {
                // Check if there is any custom arguments set
                var arguments = $link.data('randomm-arguments')
                var value = chance[randomType](arguments)
                $('#' + namespace).val(value);
            }
        });

        $link.parent().children().wrapAll('<div class="randomm-input-wrapper"></div>');
    }

})(jQuery);
